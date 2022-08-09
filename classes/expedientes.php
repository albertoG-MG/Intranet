<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class expedientes {
    private $num_empleado;
    private $puesto;
    private $estudios;
    private $calle;
    private $num_interior;
    private $num_exterior; 
    private $colonia;
    private $estado_id; 
    private $municipio_id; 
    private $codigo;
    private $tel_dom;
    private $tel_mov; 
    private $casa_propia;
    private $fecha_nacimiento; 
    private $fecha_inicioc; 
    public $fecha_alta; 
    private $observaciones; 
    private $curp; 
    private $nss; 
    private $rfc; 
    private $tipo_identificacion; 
    private $num_identificacion;
    private $referencias; 
    private $capacitacion; 
    private $fecha_enuniforme; 
    private $cantidad_polo; 
    private $talla_polo; 
    private $emergencia_nombre; 
    private $emergencia_telefono; 
    private $resultado_antidoping; 
    private $vacante; 
    private $fam_dentro_empresa; 
    private $fam_nombre;
    private $ref_banc;
    private $p_curriculum;
    private $p_evaluacion;
    private $p_nacimiento;
    private $p_curp;
    private $p_identificacion;
    private $p_comprobante;
    private $p_rfc;
    private $p_cartal;
    private $p_cartap;
    private $p_retencion;
    private $p_strabajo;
    private $p_imss;
    private $p_nomina;

    public function __construct($number_e, $job, $studies, $street, $interior_num, $exterior_ext, $suburb, $state, $city, $postal_address, $phone_home, $phone_mobile, $own_house, $birth_date, $contract_date, $discharge_date, $observations, $uprk, $social_security_number, $rfcs, $identification_type, $identification_number, $referencies, $capacitation, $date_uniform, $quantity_polo, $size_polo, $emergency_name, $emergency_phone, $antidoping_result, $vacancy, $family_inside_bussiness, $family_fib, $referencies_banc, $curr, $eval, $nac, $cup, $identi, $comp, $rc, $cal, $cap, $reten, $strab, $iss, $nomin){
        $this->num_empleado= $number_e;
        $this->puesto= $job;
        $this->estudios= $studies;
        $this->calle= $street;
        $this->num_interior= $interior_num;
        $this->num_exterior= $exterior_ext; 
        $this->colonia= $suburb;
        $this->estado_id= $state; 
        $this->municipio_id= $city; 
        $this->codigo= $postal_address;
        $this->tel_dom= $phone_home;
        $this->tel_mov= $phone_mobile; 
        $this->casa_propia= $own_house;
        $this->fecha_nacimiento= $birth_date; 
        $this->fecha_inicioc= $contract_date; 
        $this->fecha_alta= $discharge_date; 
        $this->observaciones= $observations; 
        $this->curp= $uprk; 
        $this->nss= $social_security_number; 
        $this->rfc= $rfcs; 
        $this->tipo_identificacion= $identification_type; 
        $this->num_identificacion= $identification_number;
        $this->referencias= $referencies; 
        $this->capacitacion= $capacitation; 
        $this->fecha_enuniforme= $date_uniform; 
        $this->cantidad_polo= $quantity_polo; 
        $this->talla_polo= $size_polo; 
        $this->emergencia_nombre= $emergency_name; 
        $this->emergencia_telefono= $emergency_phone; 
        $this->resultado_antidoping= $antidoping_result; 
        $this->vacante= $vacancy; 
        $this->fam_dentro_empresa= $family_inside_bussiness; 
        $this->fam_nombre= $family_fib;
        $this->ref_banc= $referencies_banc;
        $this->p_curriculum = $curr;
        $this->p_evaluacion = $eval;
        $this->p_nacimiento = $nac;
        $this->p_curp = $cup;
        $this->p_identificacion = $identi;
        $this->p_comprobante = $comp;
        $this->p_rfc = $rc;
        $this->p_cartal = $cal;
        $this->p_cartap = $cap;
        $this->p_retencion = $reten;
        $this->p_strabajo = $strab;
        $this->p_imss = $iss;
        $this->p_nomina = $nomin;
    }

    public function Crear_expediente($id){
        $crud = new crud();
        $object = new connection_database();
        $crud->store('expedientes', ['users_id' => $id, 'num_empleado' => $this->num_empleado, 'puesto' => $this->puesto,
		'estudios' => $this->estudios, 'calle' => $this->calle, 'num_interior' => $this->num_interior, 'num_exterior' => $this->num_exterior, 'colonia' => $this->colonia,
		'estado_id' => $this->estado_id, 'municipio_id' => $this->municipio_id, 'codigo' => $this->codigo, 'tel_dom' => $this->tel_dom, 'tel_mov' => $this->tel_mov, 'casa_propia' => $this->casa_propia,
        'fecha_nacimiento' => $this->fecha_nacimiento, 'fecha_inicioc' => $this->fecha_inicioc, 'fecha_alta' => $this->fecha_alta, 'observaciones' => $this->observaciones, 'curp' => $this->curp,
        'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->tipo_identificacion, 'num_identificacion' => $this->num_identificacion,
        'capacitacion' => $this->capacitacion, 'fecha_enuniforme' => $this->fecha_enuniforme, 'cantidad_polo' => $this->cantidad_polo, 'talla_polo' => $this->talla_polo,
        'emergencia_nombre' => $this->emergencia_nombre, 'emergencia_telefono' => $this->emergencia_telefono, 'resultado_antidoping' => $this->resultado_antidoping, 'vacante' => $this->vacante, 
        'fam_dentro_empresa' => $this->fam_dentro_empresa, 'fam_nombre' => $this->fam_nombre]);
        $exp_id = $object -> _db -> lastInsertId();
	    $jsonData = stripslashes(html_entity_decode($this->referencias));
	    $ref = json_decode($jsonData);
        if(!(empty($ref))){
            expedientes::Crear_referenciaslab($exp_id, $ref);
        }
        $jsonData2 = stripslashes(html_entity_decode($this->ref_banc));
        $ref_banc = json_decode($jsonData2);
        if(!(empty($ref_banc))){
            expedientes::Crear_referenciasbanc($exp_id, $ref_banc);
        }
        if(!(empty($this->p_curriculum))){
            expedientes::Curriculum($exp_id, $this->p_curriculum);
        }
        if(!(empty($this->p_evaluacion))){
            expedientes::Evaluacion($exp_id, $this->p_evaluacion);
        }
        if(!(empty($this->p_nacimiento))){
            expedientes::Nacimiento($exp_id, $this->p_nacimiento);
        }
        if(!(empty($this->p_curp))){
            expedientes::Curp($exp_id, $this->p_curp);
        }
        if(!(empty($this->p_identificacion))){
            expedientes::Identificacion($exp_id, $this->p_identificacion);
        }
        if(!(empty($this->p_comprobante))){
            expedientes::Comprobante($exp_id, $this->p_comprobante);
        }
        if(!(empty($this->p_rfc))){
            expedientes::Rfc($exp_id, $this->p_rfc);
        }
        if(!(empty($this->p_cartal))){
            expedientes::Cartal($exp_id, $this->p_cartal);
        }
        if(!(empty($this->p_cartap))){
            expedientes::Cartap($exp_id, $this->p_cartap);
        }
        if(!(empty($this->p_retencion))){
            expedientes::Retencion($exp_id, $this->p_retencion);
        }
        if(!(empty($this->p_strabajo))){
            expedientes::Strabajo($exp_id, $this->p_strabajo);
        }
        if(!(empty($this->p_imss))){
            expedientes::Imss($exp_id, $this->p_imss);
        }
        if(!(empty($this->p_nomina))){
            expedientes::Nomina($exp_id, $this->p_nomina);
        }
    }

    public static function Crear_referenciaslab($exp_id, $ref){
        $refcrud = new crud();
        $numero  = count($ref);
        try{
            for($i=0; $i<$numero; $i++){
                $refnombre= $ref[$i]->nombre;
                $refparentesco = $ref[$i]->parentesco;
                $reftelefono = $ref[$i]->telefono;
                $refcrud->store('ref_laborales', ['nombre' => $refnombre, 'telefono' => $reftelefono, 'parentesco' => $refparentesco, 'expediente_id' => $exp_id]);
            }
        } catch (Exception $e) {
                $refcrud -> delete ('expedientes', 'id=:id', ['id' => $exp_id]);
                exit('Ocurrio un error al momento de grabar las referencias laborales');   
        }
    }

    public static function Crear_referenciasbanc($exp_id, $ref_banc){
        $refcrud_banc = new crud();
        $numerocont  = count($ref_banc);
        try{
            for($a=0; $a<$numerocont; $a++){
                $brefnombre= $ref_banc[$a]->nombre;
                $brefparentesco = $ref_banc[$a]->parentesco;
                $brefrfc = $ref_banc[$a]->rfc;
                $brefcurp = $ref_banc[$a]->curp;
                $brefporcentaje = $ref_banc[$a]->porcentaje;

                $refcrud_banc->store('ref_bancarias', ['expediente_id' => $exp_id, 'nombre' => $brefnombre, 'parentesco' => $brefparentesco, 'rfc' => $brefrfc, 'curp' => $brefcurp, 'prcnt_derecho' => $brefporcentaje]);
            }
        } catch (Exception $e) {
                $refcrud_banc -> delete ('expedientes', 'id=:id', ['id' => $exp_id]);
                exit('Ocurrio un error al momento de grabar las referencias laborales');   
        }
    }

    public static function Curriculum($exp_id, $p_curriculum){
        $crudcurriculum = new crud();
        $papeleria = 1;
        $filename = $p_curriculum["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_curriculum['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcurriculum -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Evaluacion($exp_id, $p_evaluacion){
        $crudevaluacion = new crud();
        $papeleria = 2;
        $filename = $p_evaluacion["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_evaluacion['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudevaluacion -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Nacimiento($exp_id, $p_nacimiento){
        $crudnacimiento = new crud();
        $papeleria = 3;
        $filename = $p_nacimiento["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_nacimiento['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudnacimiento -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Curp($exp_id, $p_curp){
        $crudcurp = new crud();
        $papeleria = 4;
        $filename = $p_curp["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_curp['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcurp -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Identificacion($exp_id, $p_identificacion){
        $crudidentificacion = new crud();
        $papeleria = 5;
        $filename = $p_identificacion["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_identificacion['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudidentificacion -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Comprobante($exp_id, $p_comprobante){
        $crudcomprobante = new crud();
        $papeleria = 6;
        $filename = $p_comprobante["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_comprobante['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcomprobante -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Rfc($exp_id, $p_rfc){
        $crudrfc = new crud();
        $papeleria = 7;
        $filename = $p_rfc["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_rfc['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudrfc -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Cartal($exp_id, $p_cartal){
        $crudcartal = new crud();
        $papeleria = 8;
        $filename = $p_cartal["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_cartal['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcartal -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Cartap($exp_id, $p_cartap){
        $crudcartap = new crud();
        $papeleria = 9;
        $filename = $p_cartap["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_cartap['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcartap -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Retencion($exp_id, $p_retencion){
        $crudretencion = new crud();
        $papeleria = 10;
        $filename = $p_retencion["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_retencion['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudretencion -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Strabajo($exp_id, $p_strabajo){
        $crudstrabajo = new crud();
        $papeleria = 11;
        $filename = $p_strabajo["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_strabajo['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudstrabajo -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Imss($exp_id, $p_imss){
        $crudimss = new crud();
        $papeleria = 12;
        $filename = $p_imss["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_imss['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudimss -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Nomina($exp_id, $p_nomina){
        $crudnomina = new crud();
        $papeleria = 13;
        $filename = $p_nomina["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_nomina['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudnomina -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function EliminarExpediente($id){
        $crud = new crud();
        $crud -> delete ('expedientes', 'id=:id', ['id' => $id]);
    }

    public static function Checkusuarioxexpediente($id){
        $object = new connection_database();
	    $sql = "SELECT * FROM expedientes INNER JOIN usuarios ON expedientes.users_id = usuarios.id WHERE expedientes.id=:expedienteid";
        $fetchusex = $object->_db->prepare($sql);
	    $fetchusex -> bindParam('expedienteid', $id, PDO::PARAM_INT);
        $fetchusex->execute();
        $usuarioexp_count = $fetchusex->rowCount();
	    return $usuarioexp_count;
    }
    
    public static function Fetcheditexpediente($id){
        $object = new connection_database();
        $row = $object->_db->prepare("SELECT expedientes.id as expid, expedientes.users_id as userid, expedientes.num_empleado as enum_empleado, expedientes.estudios as eestudios, expedientes.puesto as epuesto, expedientes.calle as ecalle, expedientes.num_interior as enum_interior, expedientes.num_exterior as enum_exterior, expedientes.colonia as ecolonia, expedientes.estado_id as eestado, expedientes.municipio_id as emunicipio, expedientes.codigo as ecodigo, expedientes.tel_dom as etel_dom, expedientes.tel_mov as etel_mov, expedientes.casa_propia as ecasa_propia, expedientes.fecha_nacimiento as efecha_nacimiento, expedientes.fecha_inicioc as efecha_inicioc, expedientes.fecha_alta as efecha_alta, expedientes.observaciones as eobservaciones, expedientes.curp as ecurp, expedientes.nss as enss, expedientes.rfc as erfc, expedientes.tipo_identificacion as etipo_identificacion, expedientes.num_identificacion as enum_identificacion, expedientes.capacitacion as ecapacitacion, expedientes.fecha_enuniforme as efecha_enuniforme, expedientes.cantidad_polo as ecantidad_polo, expedientes.talla_polo as etalla_polo, expedientes.emergencia_nombre as eemergencia_nombre, expedientes.emergencia_telefono as eemergencia_telefono, expedientes.resultado_antidoping as eresultado_antidoping, expedientes.vacante as evacante, expedientes.fam_dentro_empresa as efam_dentro_empresa, expedientes.fam_nombre as efam_nombre from expedientes where expedientes.id=:expedienteid");
        $row->bindParam("expedienteid", $id, PDO::PARAM_INT);
        $row->execute();
        $editar = $row->fetch(PDO::FETCH_OBJ);
        return $editar;
    }

    public function Editar_expediente($id_user, $id_expediente){
        print_r($this->num_empleado);
    }
}
?>