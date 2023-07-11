<?php
    include_once __DIR__ . "/../config/conexion.php";
    include_once __DIR__ . "/crud.php";
    class vacaciones {
        
        public $periodo_vacaciones;
        
        public function __construct($holiday_period){
            $this->periodo_vacaciones = $holiday_period;
        }
        
        public function CrearSolicitudVacaciones($id, $days, $jefe_array){
            $object = new connection_database();
		    $crud = new crud();
            $crud -> store ('solicitud_vacaciones', ['users_id' => $id, 'periodo_solicitado' => $this->periodo_vacaciones, 'dias_solicitados' => $days]);
            $solicitud_id = $object -> _db -> lastInsertId();
            foreach($jefe_array as $correo){
                $selectid = $object -> _db -> prepare("SELECT id from usuarios where correo=:correo");
                $selectid -> execute(array('correo' => $correo));
                $insertid = $selectid -> fetch(PDO::FETCH_OBJ);
                $crud -> store ('notificaciones_vacaciones', ['id_solicitud_vacaciones' => $solicitud_id, 'id_notificado' => $insertid -> id]);
            }
            Vacaciones::sendEmail($solicitud_id, $jefe_array);
        }

        public static function Almacenar_estatus($solicitud_vacaciones, $estatus, $nombre_completo, $comentario){
            $object = new connection_database();
            $crud = new crud();
            $crud -> store ('accion_vacaciones', ['id_solicitud_vacaciones' => $solicitud_vacaciones, 'tipo_de_accion' => $estatus, 'comentario' => $comentario, 'evaluado_por' => $nombre_completo]);
            $update_state = $object -> _db -> prepare("UPDATE solicitud_vacaciones sv INNER JOIN (SELECT transicion_estatus_vacaciones.id_solicitud_vacaciones, transicion_estatus_vacaciones.estatus_siguiente FROM transicion_estatus_vacaciones WHERE transicion_estatus_vacaciones.id_solicitud_vacaciones=:solicitudid ORDER BY transicion_estatus_vacaciones.id desc LIMIT 1) temp ON sv.id=temp.id_solicitud_vacaciones SET sv.estatus = temp.estatus_siguiente");
            $update_state -> execute(array(':solicitudid' => $solicitud_vacaciones));
            Vacaciones::getResponse($solicitud_vacaciones, $estatus, $comentario);
        }

        public static function sendEmail($solicitud_id, $jefe_array){
            $object = new connection_database();
            $crud = new crud();
            $sql = $object->_db->prepare('SELECT solicitud_vacaciones.id as solicitudid, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre, solicitud_vacaciones.dias_solicitados AS dias_solicitados, solicitud_vacaciones.fecha_solicitud AS fecha_solicitud FROM solicitud_vacaciones INNER JOIN usuarios ON usuarios.id=solicitud_vacaciones.users_id WHERE solicitud_vacaciones.id=:solicitudid');
            $sql -> execute(array(':solicitudid' => $solicitud_id));
            $row_user_solicitud = $sql ->fetch(PDO::FETCH_OBJ);
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $path = $protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
            $path = dirname($path);
            $links = $path. "/layouts/solicitud_vacaciones.php";
            $mail=new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->SMTPDebug = 0;
            $mail->SMTPSecure = 'tls'; 
            $mail->Host = 'mail.sinttecom.com'; 
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Port = 587;
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Username = "ntf_sinttecom_noreply@sinttecom.com"; // SMTP username
            $mail->Password = "k8@SY#xR"; // SMTP password
            $mail->IsHTML(true);
            $lista_correos = Array();
            foreach($jefe_array as $correo){
                $mail->AddAddress($correo);
                $lista_correos[]=$correo;
            }
            $correos= implode(', ', $lista_correos);
            $mail->SetFrom($mail -> Username, 'Sinttecom Intranet');
            $mail->AddReplyTo($mail -> Username, 'Sinttecom Intranet');
            $mail->Subject  = "El usuario ".$row_user_solicitud -> nombre." te envió una solicitud de vacaciones (ID: ".$row_user_solicitud -> solicitudid.")";
            $mail->Body     = "Buen día ".$correos.": <br> El usuario ".$row_user_solicitud -> nombre." te ha enviado una solicitud de vacaciones con ID ".$row_user_solicitud -> solicitudid."  en la fecha ".$row_user_solicitud -> fecha_solicitud." para un total de ".$row_user_solicitud -> dias_solicitados." día(s) de vacaciones <br> Haga clic en el link a continuación para ver la solicitud y evaluarla: <br> $links";
            $mail->WordWrap = 50;
            $mail->CharSet = "UTF-8";
            if(!$mail->Send()) {
                echo 'Message was not sent.';
                echo 'Mailer error: ' . $mail->ErrorInfo;
            }
        }

        public static function getResponse($solicitud_vacaciones, $estatus, $comentario){
            $object = new connection_database();
            $crud = new crud();
            $array = [];
            $sql = $object->_db->prepare('SELECT solicitud_vacaciones.id as solicitudid, CONCAT(usuarios.nombre, " ", usuarios.apellido_pat, " ", usuarios.apellido_mat) AS nombre, usuarios.correo FROM solicitud_vacaciones INNER JOIN usuarios ON usuarios.id=solicitud_vacaciones.users_id WHERE solicitud_vacaciones.id=:solicitudid');
            $sql -> execute(array(':solicitudid' => $solicitud_vacaciones));
            $row_user_solicitud = $sql ->fetch(PDO::FETCH_OBJ);
            array_push($array, $row_user_solicitud -> correo);
            
            $check_gerente_capital_finanzas = $object -> _db -> prepare("SELECT usuarios.correo FROM usuarios INNER JOIN roles ON roles.id=usuarios.roles_id INNER JOIN departamentos ON departamentos.id=usuarios.departamento_id WHERE roles.nombre='Gerente' AND departamentos.departamento='Capital humano' || roles.nombre='Gerente' AND departamentos.departamento='Finanzas'");
            $check_gerente_capital_finanzas -> execute();
            $count_gerente_capital_finanzas = $check_gerente_capital_finanzas -> rowCount();
            $fetch_gerente_capital_finanzas = $check_gerente_capital_finanzas ->fetchAll(PDO::FETCH_ASSOC);
            if($count_gerente_capital_finanzas == 2){
                foreach($fetch_gerente_capital_finanzas as $array_gerentes){
                    foreach($array_gerentes as $correos_array){
                        array_push($array, $correos_array);
                    }
                }
            }else if($count_gerente_capital_finanzas == 1){
                foreach($fetch_gerente_capital_finanzas as $array_gerentes){
                    foreach($array_gerentes as $correos_array){
                        array_push($array, $correos_array);
                    }
                }
            }else if($count_gerente_capital_finanzas == 0){
                array_push($array, "alberto.martinez@sinttecom.com");
            }
            if($estatus == 3){
                $status = "Rechazada";
            }else if($estatus == 2){
                $status = "Cancelada";
            }else if ($estatus == 1){
                $status = "Aprobada";
            }
            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $path = $protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
            $path = dirname($path);
            $links = $path. "/layouts/vacaciones.php";		
            $mail=new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP();  // telling the class to use SMTP
            $mail->SMTPDebug = 0;
            $mail->SMTPSecure = 'tls'; 
            $mail->Host = 'mail.sinttecom.com'; 
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->Port = 587;
            $mail->SMTPAuth = true; // turn on SMTP authentication
            $mail->Username = "ntf_sinttecom_noreply@sinttecom.com"; // SMTP username
            $mail->Password = "k8@SY#xR"; // SMTP password
            $mail->IsHTML(true);
            foreach($array as $correo)
            {
                $mail->AddAddress($correo);
            }
            $mail->SetFrom($mail -> Username, 'Sinttecom Intranet');
            $mail->AddReplyTo($mail -> Username, 'Sinttecom Intranet');
            $mail->Subject  = "La solicitud de vacaciones de ".$row_user_solicitud -> nombre." ha sido evaluada (ID: ".$row_user_solicitud -> solicitudid.")";
            $mail->Body     = "Buen día: <br> La solicitud de vacaciones con ID ".$row_user_solicitud -> solicitudid." tiene el siguiente estatus: ".$status.". <br> Has clic aquí para ver los detalles: <br> <a href=".$links.">Checar solicitud de vacaciones</a> <br> Comentarios:  ".$comentario."";
            $mail->WordWrap = 50;
            $mail->CharSet = "UTF-8";
            if(!$mail->Send()) {
                echo 'Message was not sent.';
                echo 'Mailer error: ' . $mail->ErrorInfo;
            }
        }
    }
?>
