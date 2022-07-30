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

    public function __construct($number_e, $job, $studies, $street, $interior_num, $exterior_ext, $suburb, $state, $city, $postal_address, $phone_home, $phone_mobile, $own_house, $birth_date, $contract_date, $discharge_date, $observations, $uprk, $social_security_number, $rfcs, $identification_type, $identification_number, $referencies, $capacitation, $date_uniform, $quantity_polo, $size_polo, $emergency_name, $emergency_phone, $antidoping_result, $vacancy, $family_inside_bussiness, $family_fib, $referencies_banc){
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
}
?>