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
    private $posee_telmov; 
    private $tel_mov;
    private $posee_telempresa;
    private $marcacion;
    private $serie; 
    private $sim; 
    private $casa_propia;
    private $ecivil; 
    private $posee_retencion; 
    private $monto_mensual; 
    private $fecha_nacimiento; 
    private $fecha_inicioc; 
    public $fecha_alta;
    private $salario_contrato; 
    private $salario_fechaalta; 
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
    private $emergencia_parentesco; 
    private $emergencia_telefono;
    private $emergencia_nombre2;
	private $emergencia_parentesco2;
	private $emergencia_telefono2; 
    private $resultado_antidoping; 
    private $vacante; 
    private $fam_dentro_empresa; 
    private $fam_nombre;
    private $banco_personal;
	private $cuenta_personal;
	private $clabe_personal;
	private $banco_nomina;
	private $cuenta_nomina;
	private $clabe_nomina;
	private $plastico;
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
    private $contrato_prueba;
	private $contrato_definitivo;
	private $contrato_interno;
	private $contrato_supervivencia;
	private $comprobante_domicilio;
	private $situacion_fiscal;
	private $carta_responsiva_equipos_asignados;
	private $baja_ante_imss;
	private $modificacion_salarial;
	private $comprobante_estudios;
	private $caratula_datos_bancarios;

    public function __construct($number_e, $job, $studies, $street, $interior_num, $exterior_ext, $suburb, $state, $city, $postal_address, $phone_home, $have_own_phone, $phone_mobile, $have_business_phone, $marcation, $serial, $simi, $own_house, $civil_status, $have_retention, $money_retention, $birth_date, $contract_date, $discharge_date, $contract_money, $date_money, $observations, $uprk, $social_security_number, $rfcs, $identification_type, $identification_number, $referencies, $capacitation, $date_uniform, $quantity_polo, $size_polo, $emergency_name, $emergency_parent, $emergency_phone, $emergency_name2, $emergency_parent2, $emergency_phone2, $antidoping_result, $vacancy, $family_inside_bussiness, $family_fib, $personal_bank, $personal_account, $personal_clabe, $payroll_bank, $payroll_account, $payroll_clabe, $plastic, $referencies_banc, $curr, $eval, $nac, $cup, $identi, $comp, $rc, $cal, $cap, $reten, $strab, $iss, $nomin, $contract_test, $contract_definitive, $contract_intern, $contract_survival, $address_comprobant, $fiscal_situation, $letter_responsive_equipment_assigment, $charged_imss, $salarial_modification, $study_comprobant, $bank_data_front){
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
        $this->posee_telmov= $have_own_phone;
        $this->tel_mov= $phone_mobile;
        $this->posee_telempresa= $have_business_phone; 
	    $this->marcacion= $marcation; 
	    $this->serie= $serial; 
	    $this->sim= $simi; 
        $this->casa_propia= $own_house;
        $this->ecivil= $civil_status; 
	    $this->posee_retencion= $have_retention; 
	    $this->monto_mensual= $money_retention;
        $this->fecha_nacimiento= $birth_date; 
        $this->fecha_inicioc= $contract_date; 
        $this->fecha_alta= $discharge_date;
        $this->salario_contrato= $contract_money; 
	    $this->salario_fechaalta= $date_money; 
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
        $this->emergencia_parentesco= $emergency_parent; 
        $this->emergencia_telefono= $emergency_phone;
        $this->emergencia_nombre2= $emergency_name2;
	    $this->emergencia_parentesco2= $emergency_parent2;
	    $this->emergencia_telefono2= $emergency_phone2; 
        $this->resultado_antidoping= $antidoping_result; 
        $this->vacante= $vacancy; 
        $this->fam_dentro_empresa= $family_inside_bussiness; 
        $this->fam_nombre= $family_fib;
        $this->banco_personal= $personal_bank; 
	    $this->cuenta_personal= $personal_account; 
	    $this->clabe_personal= $personal_clabe; 
	    $this->banco_nomina= $payroll_bank; 
	    $this->cuenta_nomina= $payroll_account; 
	    $this->clabe_nomina= $payroll_clabe; 
	    $this->plastico= $plastic;
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
        $this->contrato_prueba= $contract_test; 
	    $this->contrato_definitivo= $contract_definitive; 
	    $this->contrato_interno= $contract_intern; 
	    $this->contrato_supervivencia= $contract_survival; 
	    $this->comprobante_domicilio= $address_comprobant; 
	    $this->situacion_fiscal= $fiscal_situation; 
	    $this->carta_responsiva_equipos_asignados= $letter_responsive_equipment_assigment; 
	    $this->baja_ante_imss= $charged_imss; 
	    $this->modificacion_salarial= $salarial_modification; 
	    $this->comprobante_estudios= $study_comprobant; 
	    $this->caratula_datos_bancarios= $bank_data_front;
    }

    public function Crear_expediente($id){
        $crud = new crud();
        $object = new connection_database();
        $crud->store('expedientes', ['users_id' => $id, 'num_empleado' => $this->num_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'calle' => $this->calle, 'num_interior' => $this->num_interior, 'num_exterior' => $this->num_exterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado_id, 'municipio_id' => $this->municipio_id, 'codigo' => $this->codigo, 'tel_dom' => $this->tel_dom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->tel_mov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fecha_nacimiento, 'fecha_inicioc' => $this->fecha_inicioc, 'fecha_alta' => $this->fecha_alta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->tipo_identificacion, 'num_identificacion' => $this->num_identificacion, 'capacitacion' => $this->capacitacion, 'fecha_enuniforme' => $this->fecha_enuniforme, 'cantidad_polo' => $this->cantidad_polo, 'talla_polo' => $this->talla_polo, 'emergencia_nombre' => $this->emergencia_nombre, 'emergencia_parentesco' => $this->emergencia_parentesco, 'emergencia_telefono' => $this->emergencia_telefono, 'emergencia_nombre2' => $this->emergencia_nombre2, 'emergencia_parentesco2' => $this->emergencia_parentesco2, 'emergencia_telefono2' => $this->emergencia_telefono2, 'resultado_antidoping' => $this->resultado_antidoping, 'vacante' => $this->vacante, 'fam_dentro_empresa' => $this->fam_dentro_empresa, 'fam_nombre' => $this->fam_nombre, 'banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 'clabe_personal' => $this->clabe_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico]); 
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
        if(!(empty($this->contrato_prueba))){
            expedientes::Contrato_Prueba($exp_id, $this->contrato_prueba);
        }
        if(!(empty($this->contrato_definitivo))){
                expedientes::Contrato_Definitivo($exp_id, $this->contrato_definitivo);
        }
        if(!(empty($this->contrato_interno))){
                expedientes::Contrato_Interno($exp_id, $this->contrato_interno);
        }
        if(!(empty($this->contrato_supervivencia))){
                expedientes::Contrato_Supervivencia($exp_id, $this->contrato_supervivencia);
        }
        if(!(empty($this->comprobante_domicilio))){
                expedientes::Comprobante_Domicilio($exp_id, $this->comprobante_domicilio);
        }
        if(!(empty($this->situacion_fiscal))){
                expedientes::Situacion_Fiscal($exp_id, $this->situacion_fiscal);
        }
        if(!(empty($this->carta_responsiva_equipos_asignados))){
                expedientes::Carta_Responsiva_Equipos_Asignados($exp_id, $this->carta_responsiva_equipos_asignados);
        }
        if(!(empty($this->baja_ante_imss))){
                expedientes::Baja_Ante_Imss($exp_id, $this->baja_ante_imss);
        }
        if(!(empty($this->modificacion_salarial))){
                expedientes::Modificacion_Salarial($exp_id, $this->modificacion_salarial);
        }
        if(!(empty($this->comprobante_estudios))){
                expedientes::Comprobante_Estudios($exp_id, $this->comprobante_estudios);
        }
        if(!(empty($this->caratula_datos_bancarios))){
                expedientes::Caratula_Datos_Bancarios($exp_id, $this->caratula_datos_bancarios);
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

    public static function Contrato_Prueba($exp_id, $p_contratop){
        $crudcontrato_prueba = new crud();
        $papeleria = 14;
        $filename = $p_contratop["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_contratop['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcontrato_prueba -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
	
	public static function Contrato_Definitivo($exp_id, $p_contratod){
        $crudcontrato_definitivo = new crud();
        $papeleria = 15;
        $filename = $p_contratod["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_contratod['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcontrato_definitivo -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
	
	public static function Contrato_Interno($exp_id, $p_contratoi){
        $crudcontrato_interno = new crud();
        $papeleria = 16;
        $filename = $p_contratoi["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_contratoi['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcontrato_interno -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
	
	public static function Contrato_Supervivencia($exp_id, $p_contratos){
        $crudcontrato_supervivencia = new crud();
        $papeleria = 17;
        $filename = $p_contratos["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_contratos['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcontrato_supervivencia -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
	
	public static function Comprobante_Domicilio($exp_id, $p_comprobanted){
        $crudcomprobanted = new crud();
        $papeleria = 18;
        $filename = $p_comprobanted["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_comprobanted['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcomprobanted -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
	
	public static function Situacion_Fiscal($exp_id, $p_situacionf){
        $crudsituacionf = new crud();
        $papeleria = 19;
        $filename = $p_situacionf["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_situacionf['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudsituacionf -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
	
	public static function Carta_Responsiva_Equipos_Asignados($exp_id, $p_cartarea){
        $crudcartarea = new crud();
        $papeleria = 20;
        $filename = $p_cartarea["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_cartarea['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcartarea -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
	
	public static function Baja_Ante_Imss($exp_id, $p_bajaimms){
        $crudbaja_imss = new crud();
        $papeleria = 21;
        $filename = $p_bajaimms["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_bajaimms['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudbaja_imss -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
	
	public static function Modificacion_Salarial($exp_id, $p_modificacions){
        $crudmodificacions = new crud();
        $papeleria = 22;
        $filename = $p_modificacions["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_modificacions['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudmodificacions -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
	
	public static function Comprobante_Estudios($exp_id, $p_comprobantee){
        $crudcomprobantee = new crud();
        $papeleria = 23;
        $filename = $p_comprobantee["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_comprobantee['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcomprobantee -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
	
	public static function Caratula_Datos_Bancarios($exp_id, $p_caratulad){
        $crudcaratulad = new crud();
        $papeleria = 24;
        $filename = $p_caratulad["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_caratulad['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $crudcaratulad -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
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
        $object = new connection_database();
        $crud = new crud();
        $crud->update('expedientes', ['users_id' => $id_user, 'num_empleado' => $this->num_empleado, 'puesto' => $this->puesto,
        'estudios' => $this->estudios, 'calle' => $this->calle, 'num_interior' => $this->num_interior, 'num_exterior' => $this->num_exterior, 'colonia' => $this->colonia,
        'estado_id' => $this->estado_id, 'municipio_id' => $this->municipio_id, 'codigo' => $this->codigo, 'tel_dom' => $this->tel_dom, 'tel_mov' => $this->tel_mov, 
        'casa_propia' => $this->casa_propia, 'fecha_nacimiento' => $this->fecha_nacimiento, 'fecha_inicioc' => $this->fecha_inicioc, 'fecha_alta' => $this->fecha_alta, 
        'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->tipo_identificacion, 
        'num_identificacion' => $this->num_identificacion, 'capacitacion' => $this->capacitacion, 'fecha_enuniforme' => $this->fecha_enuniforme, 'cantidad_polo' => $this->cantidad_polo, 
        'talla_polo' => $this->talla_polo, 'emergencia_nombre' => $this->emergencia_nombre, 'emergencia_telefono' => $this->emergencia_telefono, 
        'resultado_antidoping' => $this->resultado_antidoping, 'vacante' => $this->vacante, 'fam_dentro_empresa' => $this->fam_dentro_empresa, 'fam_nombre' => $this->fam_nombre], "id=:idexpediente", ['idexpediente' => $id_expediente]);
        $array = [];
        $jsonData = stripslashes(html_entity_decode($this->referencias));
        $ref = json_decode($jsonData);
        $checkreflab = $object -> _db ->prepare("SELECT * FROM ref_laborales WHERE expediente_id=:expedienteid");
        $checkreflab -> bindParam('expedienteid', $id_expediente, PDO::PARAM_INT);
        $checkreflab -> execute();
        $countreflab = $checkreflab -> rowCount();
        while ($row = $checkreflab->fetch(PDO::FETCH_OBJ)) { 
            $array[]=array('id'=>$row->id);
        }
        if($countreflab > 0){
            if(empty($ref)){
                $crud -> delete('ref_laborales', 'expediente_id=:idexpediente', ['idexpediente' => $id_expediente]);
            }else{
                expedientes::Editar_referenciaslab($id_expediente, $countreflab, $array, $ref);
            }
        }else{
            if(!(empty($ref))){
                expedientes::Crear_referenciaslab($id_expediente, $ref);
            }
        }

        $array2 = [];
        $jsonData2 = stripslashes(html_entity_decode($this->ref_banc));
        $ref_banc = json_decode($jsonData2);
        $checkrefbanc = $object -> _db ->prepare("SELECT * FROM ref_bancarias WHERE expediente_id=:expedienteid");
        $checkrefbanc -> bindParam('expedienteid', $id_expediente, PDO::PARAM_INT);
        $checkrefbanc -> execute();
        $countrefbanc = $checkrefbanc -> rowCount();
        while ($row_banc = $checkrefbanc->fetch(PDO::FETCH_OBJ)) { 
            $array2[]=array('id'=>$row_banc->id);
        }
        if($countrefbanc > 0){
            if(empty($ref_banc)){
                $crud -> delete('ref_bancarias', 'expediente_id=:idexpediente', ['idexpediente' => $id_expediente]);
            }else{
                expedientes::Editar_referenciasbanc($id_expediente, $countrefbanc, $array2, $ref_banc);
            }
        }else{
            if(!(empty($ref))){
                expedientes::Crear_referenciasbanc($id_expediente, $ref_banc);
            }
        }

        if(!(empty($this->p_curriculum))){
            expedientes::Editar_curriculum($id_expediente, $this->p_curriculum);
        }
		if(!(empty($this->p_evaluacion))){
            expedientes::Editar_evaluacion($id_expediente, $this->p_evaluacion);
        }
		if(!(empty($this->p_nacimiento))){
            expedientes::Editar_nacimiento($id_expediente, $this->p_nacimiento);
        }
		if(!(empty($this->p_curp))){
            expedientes::Editar_curp($id_expediente, $this->p_curp);
        }
		if(!(empty($this->p_identificacion))){
            expedientes::Editar_identificacion($id_expediente, $this->p_identificacion);
        }
		if(!(empty($this->p_comprobante))){
            expedientes::Editar_comprobante($id_expediente, $this->p_comprobante);
        }
		if(!(empty($this->p_rfc))){
            expedientes::Editar_rfc($id_expediente, $this->p_rfc);
        }
		if(!(empty($this->p_cartal))){
            expedientes::Editar_cartal($id_expediente, $this->p_cartal);
        }
		if(!(empty($this->p_cartap))){
            expedientes::Editar_cartap($id_expediente, $this->p_cartap);
        }
		if(!(empty($this->p_retencion))){
            expedientes::Editar_retencion($id_expediente, $this->p_retencion);
        }
		if(!(empty($this->p_strabajo))){
            expedientes::Editar_strabajo($id_expediente, $this->p_strabajo);
        }
        if(!(empty($this->p_imss))){
            expedientes::Editar_imss($id_expediente, $this->p_imss);
        }
		if(!(empty($this->p_nomina))){
            expedientes::Editar_nomina($id_expediente, $this->p_nomina);
        }
    }

    public static function Editar_referenciaslab($id_expediente, $countreflab, $array, $ref){
        $crud = new crud();
        $numero  = count($ref);
        if($numero > $countreflab){
            try{
                for($i=0; $i<$numero; $i++){
                    $refnombre= $ref[$i]->nombre;
                    $refparentesco = $ref[$i]->parentesco;
                    $reftelefono = $ref[$i]->telefono;
                    if($i < $countreflab){
                        $crud->update('ref_laborales', ['nombre' => $refnombre, 'telefono' => $reftelefono, 'parentesco' => $refparentesco], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array[$i]["id"], 'expedienteid' => $id_expediente]);
                    }else{
                        $crud->store('ref_laborales', ['nombre' => $refnombre, 'telefono' => $reftelefono, 'parentesco' => $refparentesco, 'expediente_id' => $id_expediente]);
                    }
                }
            } catch (Exception $e) {
                    exit('Ocurrio un error al momento de grabar las referencias laborales');   
            }
        }else if($numero < $countreflab){
            try{
                for($i=0; $i<$countreflab; $i++){
                    if($i < $numero){
                        $refnombre= $ref[$i]->nombre;
                        $refparentesco = $ref[$i]->parentesco;
                        $reftelefono = $ref[$i]->telefono;
                        $crud->update('ref_laborales', ['nombre' => $refnombre, 'telefono' => $reftelefono, 'parentesco' => $refparentesco], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array[$i]["id"], 'expedienteid' => $id_expediente]);
                    }else{
                        $crud->delete('ref_laborales', 'id=:idreferencia AND expediente_id=:expedienteid', ['idreferencia' => $array[$i]["id"], 'expedienteid' => $id_expediente]);	
                    }
                }
            } catch (Exception $e) {
                    exit('Ocurrio un error al momento de grabar las referencias laborales');   
            }
        }else if($numero == $countreflab){
            try{
                for($i=0; $i<$numero; $i++){
                    $refnombre= $ref[$i]->nombre;
                    $refparentesco = $ref[$i]->parentesco;
                    $reftelefono = $ref[$i]->telefono;
                    $crud->update('ref_laborales', ['nombre' => $refnombre, 'telefono' => $reftelefono, 'parentesco' => $refparentesco], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array[$i]["id"], 'expedienteid' => $id_expediente]);
                }
            } catch (Exception $e) {
                    exit('Ocurrio un error al momento de grabar las referencias laborales');   
            }
        }
    }

    public static function Editar_referenciasbanc($id_expediente, $countrefbanc, $array2, $ref_banc){
        $crud = new crud();
        $numero  = count($ref_banc);
        if($numero > $countrefbanc){
            try{
                for($i=0; $i<$numero; $i++){
                    $brefnombre= $ref_banc[$i]->nombre;
                    $brefparentesco = $ref_banc[$i]->parentesco;
                    $brefrfc = $ref_banc[$i]->rfc;
                    $brefcurp = $ref_banc[$i]->curp;
                    $brefporcentaje = $ref_banc[$i]->porcentaje;
                    if($i < $countrefbanc){
                        $crud->update('ref_bancarias', ['nombre' => $brefnombre, 'parentesco' => $brefparentesco, 'rfc' => $brefrfc, 'curp' => $brefcurp, 'prcnt_derecho' => $brefporcentaje], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array2[$i]["id"], 'expedienteid' => $id_expediente]);
                    }else{
                        $crud->store('ref_bancarias', ['expediente_id' => $id_expediente, 'nombre' => $brefnombre, 'parentesco' => $brefparentesco, 'rfc' => $brefrfc, 'curp' => $brefcurp, 'prcnt_derecho' => $brefporcentaje]);
                    }
                }
            } catch (Exception $e) {
                    exit('Ocurrio un error al momento de grabar las referencias bancarias');   
            }
        }else if($numero < $countrefbanc){
            try{
                for($i=0; $i<$countrefbanc; $i++){
                    if($i < $numero){
                        $brefnombre= $ref_banc[$i]->nombre;
                        $brefparentesco = $ref_banc[$i]->parentesco;
                        $brefrfc = $ref_banc[$i]->rfc;
                        $brefcurp = $ref_banc[$i]->curp;
                        $brefporcentaje = $ref_banc[$i]->porcentaje;
                        $crud->update('ref_bancarias', ['nombre' => $brefnombre, 'parentesco' => $brefparentesco, 'rfc' => $brefrfc, 'curp' => $brefcurp, 'prcnt_derecho' => $brefporcentaje], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array2[$i]["id"], 'expedienteid' => $id_expediente]);
                    }else{
                        $crud->delete('ref_bancarias', 'id=:idreferencia AND expediente_id=:expedienteid', ['idreferencia' => $array2[$i]["id"], 'expedienteid' => $id_expediente]);	
                    }
                }
            } catch (Exception $e) {
                    exit('Ocurrio un error al momento de grabar las referencias bancarias');   
            }
        }else if($numero == $countrefbanc){
            try{
                for($i=0; $i<$numero; $i++){
                    $brefnombre= $ref_banc[$i]->nombre;
                    $brefparentesco = $ref_banc[$i]->parentesco;
                    $brefrfc = $ref_banc[$i]->rfc;
                    $brefcurp = $ref_banc[$i]->curp;
                    $brefporcentaje = $ref_banc[$i]->porcentaje;
                    $crud->update('ref_bancarias', ['nombre' => $brefnombre, 'parentesco' => $brefparentesco, 'rfc' => $brefrfc, 'curp' => $brefcurp, 'prcnt_derecho' => $brefporcentaje], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array2[$i]["id"], 'expedienteid' => $id_expediente]);
                }
            } catch (Exception $e) {
                    exit('Ocurrio un error al momento de grabar las referencias bancarias');   
            }
        }
    }

    public static function Editar_curriculum($id_expediente, $p_curriculum){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 1;
        $filename = $p_curriculum["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_curriculum['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
    
    
    public static function Editar_evaluacion($id_expediente, $p_evaluacion){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 2;
        $filename = $p_evaluacion["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_evaluacion['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }


    public static function Editar_nacimiento($id_expediente, $p_nacimiento){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 3;
        $filename = $p_nacimiento["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_nacimiento['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }


    public static function Editar_curp($id_expediente, $p_curp){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 4;
        $filename = $p_curp["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_curp['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
    
    public static function Editar_identificacion($id_expediente, $p_identificacion){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 5;
        $filename = $p_identificacion["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_identificacion['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
    
    
    
    public static function Editar_comprobante($id_expediente, $p_comprobante){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 6;
        $filename = $p_comprobante["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_comprobante['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
    
    
    public static function Editar_rfc($id_expediente, $p_rfc){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 7;
        $filename = $p_rfc["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_rfc['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Editar_cartal($id_expediente, $p_cartal){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 8;
        $filename = $p_cartal["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_cartal['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
    
    public static function Editar_cartap($id_expediente, $p_cartap){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 9;
        $filename = $p_cartap["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_cartap['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Editar_retencion($id_expediente, $p_retencion){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 10;
        $filename = $p_retencion["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_retencion['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
    
    
    public static function Editar_strabajo($id_expediente, $p_strabajo){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 11;
        $filename = $p_strabajo["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_strabajo['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
    
    public static function Editar_imss($id_expediente, $p_imss){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 12;
        $filename = $p_imss["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_imss['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }

    public static function Editar_nomina($id_expediente, $p_nomina){
        $object = new connection_database();
        $crud = new crud();
        $papeleria = 13;
        $filename = $p_nomina["name"];
        $location = "../src/pdfs_uploaded/".$filename;
        if(move_uploaded_file($p_nomina['tmp_name'],$location)){
            $pdf_base64 = base64_encode(file_get_contents('../src/pdfs_uploaded/'.$filename));
            $pdf = 'data:application/pdf;base64,'.$pdf_base64;
            date_default_timezone_set("America/Monterrey");
            $fecha_subida = date('y-m-d h:i:s');
            $checkpapeleria = $object -> _db -> prepare("SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo");
            $checkpapeleria -> bindParam("expedienteid", $id_expediente, PDO::PARAM_INT);
            $checkpapeleria -> bindParam("tipo", $papeleria, PDO::PARAM_INT);
            $checkpapeleria -> execute();
            $countpapeleria = $checkpapeleria -> rowCount();
            if($countpapeleria > 0){
                $crud -> update('papeleria_empleado', ['nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida], "expediente_id=:expedienteid AND tipo_archivo=:tipo", ['expedienteid' => $id_expediente, 'tipo' => $papeleria]);
            }else{
                $crud -> store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'archivo' => $pdf, 'fecha_subida' => $fecha_subida]);
            }
            $files = glob('../src/pdfs_uploaded/*.pdf'); // get all file names
            foreach($files as $file){ // iterate files
                if(is_file($file)) {
                    unlink($file); // delete file
                }
            }
        }
    }
}
?>