<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class expedientes {

    /**
     * &    █████  ████████ ██████  ██ ██████  ██    ██ ████████  ██████  ███████ 
     * &   ██   ██    ██    ██   ██ ██ ██   ██ ██    ██    ██    ██    ██ ██      
     * &   ███████    ██    ██████  ██ ██████  ██    ██    ██    ██    ██ ███████ 
     * &   ██   ██    ██    ██   ██ ██ ██   ██ ██    ██    ██    ██    ██      ██ 
     * &   ██   ██    ██    ██   ██ ██ ██████   ██████     ██     ██████  ███████                                                                            
    */

    /**
	 * *	=======================================================================================================================================================================================
	 * *	Son variables que representan características o datos asociados a objetos creados a partir de esa clase. Pueden tener diferentes tipos de visibilidad como public, private o protected,
     * *    un tipo de dato que específica que valor puede obtener ejemplo: public string $puesto y un valor inicial. Los atributos de una clase se utilizan para representar las columnas de una 
     * *    base de datos en una aplicación y sus valores se obtienen a través de una instancia u objeto de esa clase; en este caso, Class_search. 
	 * *    =======================================================================================================================================================================================
	*/

    public $select2;
    public $numero_expediente;
    public $numero_nomina;
    public $asistencia_empleado;
    public $puesto;
    public $estudios;
    public $posee_correo;
    public $correo_adicional;
    public $calle;
    public $ninterior;
    public $nexterior;
    public $colonia;
    public $estado;
    public $municipio;
    public $codigo;
    public $teldom;
    public $posee_telmov;
    public $telmov;
    public $posee_telempresa;
    public $marcacion;
    public $serie;
    public $sim;
    public $numred;
    public $modelotel;
    public $marcatel;
    public $imei;
    public $posee_laptop;
    public $marca_laptop;
    public $modelo_laptop;
    public $serie_laptop;
    public $casa_propia;
    public $ecivil;
    public $posee_retencion;
    public $monto_mensual;
    public $fechanac;
    public $fechacon;
    public $fechaalta;
    public $salario_contrato;
    public $salario_fechaalta;
    public $observaciones;
    public $curp;
    public $nss;
    public $rfc;
    public $identificacion;
    public $numeroidentificacion;
    public $referencias;
    public $fechauniforme;
    public $cantidadpolo;
    public $tallapolo;
    public $emergencianom;
    public $emergenciaapat;
    public $emergenciaamat;
    public $emergenciarelacion;
    public $emergenciatelefono;
    public $emergencianom2;
    public $emergenciaapat2;
    public $emergenciaamat2;
    public $emergenciarelacion2;
    public $emergenciatelefono2;
    public $capacitacion;
    public $antidoping;
    public $tipo_sangre;
    public $vacante;
    public $radio2;
    public $nomfam;
    public $apellidopatfam;
    public $apellidomatfam;
    public $refbanc;
    public $banco_personal;
    public $cuenta_personal;
    public $clabe_personal;
    public $plastico_personal;
    public $banco_nomina;
    public $cuenta_nomina;
    public $clabe_nomina;
    public $plastico;
    public $arraypapeleria;

    /**
     * &    ██████  ██████  ███    ██ ███████ ████████ ██████  ██    ██  ██████ ████████  ██████  ██████  
     * &   ██      ██    ██ ████   ██ ██         ██    ██   ██ ██    ██ ██         ██    ██    ██ ██   ██ 
     * &   ██      ██    ██ ██ ██  ██ ███████    ██    ██████  ██    ██ ██         ██    ██    ██ ██████  
     * &   ██      ██    ██ ██  ██ ██      ██    ██    ██   ██ ██    ██ ██         ██    ██    ██ ██   ██ 
     * &    ██████  ██████  ██   ████ ███████    ██    ██   ██  ██████   ██████    ██     ██████  ██   ██                                                                                                   
    */

    /**
	 * *	=======================================================================================================================================================================================
	 * *	Es un método especial en programación orientada a objectos para inicializar los objectos ó atributos de una clase. En la sección de parámetros del constructor se encuentran las
     * *    variables que recibe de a través de una instancia(pueden ser opcionales si se igualan a null) y después se asignan a los atributos de una clase usando $this Ejemplo:
     * *    $this->select2=select2;
	 * *    =======================================================================================================================================================================================
	*/

    public function __construct($select2, $numero_expediente = null, $numero_nomina = null,  $asistencia_empleado = null, $puesto = null, $estudios = null, $posee_correo = null, $correo_adicional = null, $calle = null, $ninterior = null, $nexterior = null, $colonia = null, $estado = null, $municipio = null, $codigo = null, $teldom = null, $posee_telmov = null, $telmov = null, $posee_telempresa = null, $marcacion = null, $serie = null, $sim = null, $numred = null, $modelotel = null, $marcatel = null, $imei = null, $posee_laptop = null, $marca_laptop = null, $modelo_laptop = null, $serie_laptop = null, $casa_propia = null, $ecivil = null, $posee_retencion = null, $monto_mensual = null, $fechanac = null, $fechacon = null, $fechaalta = null, $salario_contrato = null, $salario_fechaalta = null, $observaciones = null, $curp = null, $nss = null, $rfc = null, $identificacion = null, $numeroidentificacion = null, $referencias = null, $fechauniforme = null, $cantidadpolo = null, $tallapolo = null, $emergencianom = null, $emergenciaapat = null, $emergenciaamat = null, $emergenciarelacion = null, $emergenciatelefono = null, $emergencianom2 = null, $emergenciaapat2 = null, $emergenciaamat2 = null, $emergenciarelacion2 = null, $emergenciatelefono2 = null, $capacitacion = null, $antidoping = null, $tipo_sangre = null, $vacante = null, $radio2 = null, $nomfam = null, $apellidopatfam = null, $apellidomatfam = null, $refbanc = null, $banco_personal = null, $cuenta_personal = null, $clabe_personal = null, $plastico_personal = null, $banco_nomina = null, $cuenta_nomina = null, $clabe_nomina = null, $plastico = null, $arraypapeleria = null) {
        $this->select2 = $select2;
        $this->numero_expediente = $numero_expediente;
        $this->numero_nomina = $numero_nomina;
        $this->asistencia_empleado = $asistencia_empleado;
        $this->puesto = $puesto;
        $this->estudios = $estudios;
        $this->posee_correo = $posee_correo;
        $this->correo_adicional = $correo_adicional;
        $this->calle = $calle;
        $this->ninterior = $ninterior;
        $this->nexterior = $nexterior;
        $this->colonia = $colonia;
        $this->estado = $estado;
        $this->municipio = $municipio;
        $this->codigo = $codigo;
        $this->teldom = $teldom;
        $this->posee_telmov = $posee_telmov;
        $this->telmov = $telmov;
        $this->posee_telempresa = $posee_telempresa;
        $this->marcacion = $marcacion;
        $this->serie = $serie;
        $this->sim = $sim;
        $this->numred = $numred;
        $this->modelotel = $modelotel;
        $this->marcatel = $marcatel;
        $this->imei = $imei;
        $this->posee_laptop = $posee_laptop;
        $this->marca_laptop = $marca_laptop;
        $this->modelo_laptop = $modelo_laptop;
        $this->serie_laptop = $serie_laptop;
        $this->casa_propia = $casa_propia;
        $this->ecivil = $ecivil;
        $this->posee_retencion = $posee_retencion;
        $this->monto_mensual = $monto_mensual;
        $this->fechanac = $fechanac;
        $this->fechacon = $fechacon;
        $this->fechaalta = $fechaalta;
        $this->salario_contrato = $salario_contrato;
        $this->salario_fechaalta = $salario_fechaalta;
        $this->observaciones = $observaciones;
        $this->curp = $curp;
        $this->nss = $nss;
        $this->rfc = $rfc;
        $this->identificacion = $identificacion;
        $this->numeroidentificacion = $numeroidentificacion;
        $this->referencias = $referencias;
        $this->fechauniforme = $fechauniforme;
        $this->cantidadpolo = $cantidadpolo;
        $this->tallapolo = $tallapolo;
        $this->emergencianom = $emergencianom;
        $this->emergenciaapat = $emergenciaapat;
        $this->emergenciaamat = $emergenciaamat;
        $this->emergenciarelacion = $emergenciarelacion;
        $this->emergenciatelefono = $emergenciatelefono;
        $this->emergencianom2 = $emergencianom2;
        $this->emergenciaapat2 = $emergenciaapat2;
        $this->emergenciaamat2 = $emergenciaamat2;
        $this->emergenciarelacion2 = $emergenciarelacion2;
        $this->emergenciatelefono2 = $emergenciatelefono2;
        $this->capacitacion = $capacitacion;
        $this->antidoping = $antidoping;
        $this->tipo_sangre = $tipo_sangre;
        $this->vacante = $vacante;
        $this->radio2 = $radio2;
        $this->nomfam = $nomfam;
        $this->apellidopatfam = $apellidopatfam;
        $this->apellidomatfam = $apellidomatfam;
        $this->refbanc = $refbanc;
        $this->banco_personal = $banco_personal;
        $this->cuenta_personal = $cuenta_personal;
        $this->clabe_personal = $clabe_personal;
        $this->plastico_personal = $plastico_personal;
        $this->banco_nomina = $banco_nomina;
        $this->cuenta_nomina = $cuenta_nomina;
        $this->clabe_nomina = $clabe_nomina;
        $this->plastico = $plastico;
        $this->arraypapeleria = $arraypapeleria;
    }

    /**
     * &   ██████   █████  ████████  ██████  ███████  ██████  
     * &   ██   ██ ██   ██    ██    ██    ██ ██      ██       
     * &   ██   ██ ███████    ██    ██    ██ ███████ ██   ███ 
     * &   ██   ██ ██   ██    ██    ██    ██      ██ ██    ██ 
     * &   ██████  ██   ██    ██     ██████  ███████  ██████                                                     
    */

    /**
	 * *	=======================================================================================================================================================================================
	 * *	Recibe los datos de la primera pestaña a través del class search una vez hecha todas las validaciones; su función es crear el expediente y en caso de que ya exista, actualizarlo.
	 * *    =======================================================================================================================================================================================
	*/

    public function Crear_expediente_datosG(){
        $crud = new crud();
        $object = new connection_database();
        $check_table_DG = $crud->readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $this->select2]);
        if($check_table_DG['count'] > 0){
            $results_table_DG = $check_table_DG['data'][0];
            $crud->update('expedientes', ['numero_expediente' => $this->numero_expediente, 'numero_nomina' => $this->numero_nomina, 'numero_asistencia' => $this->asistencia_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion], "id=:idexpediente", [':idexpediente' => $results_table_DG['id']]);
        }else{
            $crud->store('expedientes', ['users_id' => $this->select2, 'numero_expediente' => $this->numero_expediente, 'numero_nomina' => $this->numero_nomina, 'numero_asistencia' => $this->asistencia_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion]);
        }
    }

    /**
     * &   ██████   █████  ████████  ██████  ███████  █████  
     * &   ██   ██ ██   ██    ██    ██    ██ ██      ██   ██ 
     * &   ██   ██ ███████    ██    ██    ██ ███████ ███████ 
     * &   ██   ██ ██   ██    ██    ██    ██      ██ ██   ██ 
     * &   ██████  ██   ██    ██     ██████  ███████ ██   ██                                                     
    */

    /**
	 * *	=======================================================================================================================================================================================
	 * *	Recibe los datos de la segunda pestaña a través del class search una vez hecha todas las validaciones; su función es crear el expediente y en caso de que ya exista, actualizarlo.
	 * *    =======================================================================================================================================================================================
	*/

    public function Crear_expediente_datosA(){
        $crud = new crud();
        $object = new connection_database();
        $check_table_DA = $crud->readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $_SESSION['id']]);
        if($check_table_DA['count'] > 0){
            $results_table_DA = $check_table_DA['data'][0];
            $crud->update('expedientes', ['fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 
            'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono,
            'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 
            'emergencia_telefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante,
            'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam], "id=:idexpediente", ['idexpediente' => $results_table_DA['id']]);
            $checkreflab = $crud->readWithCount('ref_laborales', '*', 'WHERE expediente_id=:expedienteid', [':expedienteid' => $results_table_DA['id']]);
            if($checkreflab['count'] > 0){
                $results_checkreflab = $checkreflab['data'];
                if(is_null($this->referencias)){
                    $crud -> delete('ref_laborales', 'expediente_id=:idexpediente', ['idexpediente' => $results_table_DA['id']]);
                }else{
                    $jsonData = stripslashes(html_entity_decode($this->referencias));
                    $ref = json_decode($jsonData);
                    expedientes::Editar_reflaborales($results_table_DA['id'], $ref);
                }
            }else{
                if(!(is_null($this->referencias))){
                    $jsonData = stripslashes(html_entity_decode($this->referencias));
                    $ref = json_decode($jsonData);
                    expedientes::Crear_reflaborales($results_table_DA['id'], $ref);
                }
            }
        }else{
            $crud->store('expedientes', ['users_id' => $_SESSION['id'], 'fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 
            'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono,
            'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 
            'emergencia_telefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante,
            'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam]);
            $id_expediente = $object -> _db -> lastInsertId();
            if(!(is_null($this->referencias))){
                $jsonData = stripslashes(html_entity_decode($this->referencias));
                $ref = json_decode($jsonData);
                expedientes::Crear_reflaborales($id_expediente, $ref);
            }
        }
    }

    /**
	 * *	====================================================
	 * *	Metodo encargado de crear las referencias laborales
	 * *    ====================================================
	*/
    public static function Crear_reflaborales($id_expediente, $ref) {
        $crud = new crud();
    
        // Insertar el valor de expediente_id una vez
        $expediente_id = $id_expediente;
    
        // Crear un arreglo para una fila de datos
        $row = [
            'nombre1' => null,
            'apellido_pat1' => null,
            'apellido_mat1' => null,
            'relacion1' => null,
            'telefono1' => null,
            'nombre2' => null,
            'apellido_pat2' => null,
            'apellido_mat2' => null,
            'relacion2' => null,
            'telefono2' => null,
            'nombre3' => null,
            'apellido_pat3' => null,
            'apellido_mat3' => null,
            'relacion3' => null,
            'telefono3' => null,
            'expediente_id' => $expediente_id
        ];
    
        // Llenar el arreglo con los valores de las referencias
        for ($indice = 1; $indice <= 3; $indice++) {
            if (isset($ref[$indice - 1])) {
                $referencia = $ref[$indice - 1];
                $row['nombre' . $indice] = $referencia->nombre;
                $row['apellido_pat' . $indice] = $referencia->apellidopat;
                $row['apellido_mat' . $indice] = $referencia->apellidomat;
                $row['relacion' . $indice] = $referencia->relacion;
                $row['telefono' . $indice] = $referencia->telefono;
            }
        }
    
        // Insertar una fila en la base de datos
        $crud->store('ref_laborales', $row);
    }

    /**
	 * *	=====================================================
	 * *	Metodo encargado de editar las referencias laborales
	 * *    =====================================================
	*/
    public static function Editar_reflaborales($id_expediente, $ref) {
        $crud = new crud();
    
        // Insertar el valor de expediente_id una vez
        $expediente_id = $id_expediente;
    
        // Crear un arreglo para una fila de datos
        $row = [
            'nombre1' => null,
            'apellido_pat1' => null,
            'apellido_mat1' => null,
            'relacion1' => null,
            'telefono1' => null,
            'nombre2' => null,
            'apellido_pat2' => null,
            'apellido_mat2' => null,
            'relacion2' => null,
            'telefono2' => null,
            'nombre3' => null,
            'apellido_pat3' => null,
            'apellido_mat3' => null,
            'relacion3' => null,
            'telefono3' => null,
            'expediente_id' => $expediente_id
        ];
    
        // Llenar el arreglo con los valores de las referencias
        for ($indice = 1; $indice <= 3; $indice++) {
            if (isset($ref[$indice - 1])) {
                $referencia = $ref[$indice - 1];
                $row['nombre' . $indice] = $referencia->nombre;
                $row['apellido_pat' . $indice] = $referencia->apellidopat;
                $row['apellido_mat' . $indice] = $referencia->apellidomat;
                $row['relacion' . $indice] = $referencia->relacion;
                $row['telefono' . $indice] = $referencia->telefono;
            }
        }
    
        // Insertar una fila en la base de datos
        $crud->update('ref_laborales', $row, 'expediente_id=:idexpediente', [':idexpediente' => $id_expediente]);
    }

    /**
     * &   ██████   █████  ████████  ██████  ███████ ██████  
     * &   ██   ██ ██   ██    ██    ██    ██ ██      ██   ██ 
     * &   ██   ██ ███████    ██    ██    ██ ███████ ██████  
     * &   ██   ██ ██   ██    ██    ██    ██      ██ ██   ██ 
     * &   ██████  ██   ██    ██     ██████  ███████ ██████                                                       
    */

    /**
	 * *	===================================================================================================================================================================================
	 * *	Recibe los datos de la tercera pestaña a través del class search una vez hecha todas las validaciones; su función es crear el expediente y en caso de que ya exista, actualizarlo.
	 * *    ===================================================================================================================================================================================
	*/
    public function Crear_expediente_datosB(){
        $crud = new crud();
        $object = new connection_database();
        $check_table_DB = $crud->readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $this->select2]);
        if($check_table_DB['count'] > 0){
            $results_table_DB = $check_table_DB['data'][0];
            $crud->update('expedientes', ['banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 
            'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 
            'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico], "id=:idexpediente", ['idexpediente' => $results_table_DB['id']]);
            $checkbenban = $crud->readWithCount('ben_bancarios', '*', 'WHERE expediente_id=:expedienteid', [':expedienteid' => $results_table_DB['id']]);
            if($checkbenban['count'] > 0){
                $results_checkbenban = $checkbenban['data'];
                if(is_null($this->refbanc)){
                    $crud -> delete('ben_bancarios', 'expediente_id=:idexpediente', ['idexpediente' => $results_table_DB['id']]);
                }else{
                    $jsonData2 = stripslashes(html_entity_decode($this->refbanc));
                    $ref_banc = json_decode($jsonData2);
                    expedientes::Editar_benbanc($results_table_DB['id'], $ref_banc);
                }
            }else{
                if(!(is_null($this->refbanc))){
                    $jsonData2 = stripslashes(html_entity_decode($this->refbanc));
                    $ref_banc = json_decode($jsonData2);
                    expedientes::Crear_benbanc($results_table_DB['id'], $ref_banc);
                }
            }
        }else{
            $crud->store('expedientes', ['users_id' => $this->select2, 'banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 
            'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 
            'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico]);
            $id_expediente = $object -> _db -> lastInsertId();
            if(!(is_null($this->refbanc))){
                $jsonData2 = stripslashes(html_entity_decode($this->refbanc));
                $ref_banc = json_decode($jsonData2);
                expedientes::Crear_benbanc($id_expediente, $ref_banc);
            }
        }
    }

    /**
	 * *	========================================================
	 * *	Metodo encargado de guardar los beneficiarios bancarios
	 * *    ========================================================
	*/
    public static function Crear_benbanc($id_expediente, $ref_banc) {
        $crud = new crud();
    
        // Insertar el valor de expediente_id una vez
        $expediente_id = $id_expediente;
    
        // Crear un arreglo para una fila de datos
        $row = [
            'nombre1' => null,
            'apellido_pat1' => null,
            'apellido_mat1' => null,
            'relacion1' => null,
            'rfc1' => null,
			'curp1' => null,
			'porcentaje1' => null,
			'nombre2' => null,
            'apellido_pat2' => null,
            'apellido_mat2' => null,
            'relacion2' => null,
            'rfc2' => null,
			'curp2' => null,
			'porcentaje2' => null,
            'expediente_id' => $expediente_id
        ];
    
        // Llenar el arreglo con los valores de las referencias
        for ($indice = 1; $indice <= 3; $indice++) {
            if (isset($ref_banc[$indice - 1])) {
                $referencia = $ref_banc[$indice - 1];
                $row['nombre' . $indice] = $referencia->nombre;
                $row['apellido_pat' . $indice] = $referencia->apellidopat;
                $row['apellido_mat' . $indice] = $referencia->apellidomat;
                $row['relacion' . $indice] = $referencia->relacion;
                $row['rfc' . $indice] = $referencia->rfc;
				$row['curp' . $indice] = $referencia->curp;
				$row['porcentaje' . $indice] = $referencia->porcentaje;
            }
        }
    
        // Insertar una fila en la base de datos
        $crud->store('ben_bancarios', $row);
    }

    /**
	 * *	=======================================================
	 * *	Metodo encargado de editar los beneficiarios bancarios
	 * *    =======================================================
	*/
    public static function Editar_benbanc($id_expediente, $ref_banc) {
        $crud = new crud();
    
        // Insertar el valor de expediente_id una vez
        $expediente_id = $id_expediente;
    
        // Crear un arreglo para una fila de datos
        $row = [
            'nombre1' => null,
            'apellido_pat1' => null,
            'apellido_mat1' => null,
            'relacion1' => null,
            'rfc1' => null,
			'curp1' => null,
			'porcentaje1' => null,
			'nombre2' => null,
            'apellido_pat2' => null,
            'apellido_mat2' => null,
            'relacion2' => null,
            'rfc2' => null,
			'curp2' => null,
			'porcentaje2' => null,
            'expediente_id' => $expediente_id
        ];
    
        // Llenar el arreglo con los valores de los beneficiarios
        for ($indice = 1; $indice <= 3; $indice++) {
            if (isset($ref_banc[$indice - 1])) {
                $referencia = $ref_banc[$indice - 1];
                $row['nombre' . $indice] = $referencia->nombre;
                $row['apellido_pat' . $indice] = $referencia->apellidopat;
                $row['apellido_mat' . $indice] = $referencia->apellidomat;
                $row['relacion' . $indice] = $referencia->relacion;
                $row['rfc' . $indice] = $referencia->rfc;
				$row['curp' . $indice] = $referencia->curp;
				$row['porcentaje' . $indice] = $referencia->porcentaje;
            }
        }
    
        // Insertar una fila en la base de datos
        $crud->update('ben_bancarios', $row, 'expediente_id=:idexpediente', [':idexpediente' => $id_expediente]);
    }

    /**
     * &    ██████ ██████  ███████  █████  ██████      ███████ ██   ██ ██████  ███████ ██████  ██ ███████ ███    ██ ████████ ███████ 
     * &   ██      ██   ██ ██      ██   ██ ██   ██     ██       ██ ██  ██   ██ ██      ██   ██ ██ ██      ████   ██    ██    ██      
     * &   ██      ██████  █████   ███████ ██████      █████     ███   ██████  █████   ██   ██ ██ █████   ██ ██  ██    ██    █████   
     * &   ██      ██   ██ ██      ██   ██ ██   ██     ██       ██ ██  ██      ██      ██   ██ ██ ██      ██  ██ ██    ██    ██      
     * &    ██████ ██   ██ ███████ ██   ██ ██   ██     ███████ ██   ██ ██      ███████ ██████  ██ ███████ ██   ████    ██    ███████                                                                                                                             
    */

    /**
	 * *	=========================================================================
	 * *	Metodo encargado para crear expedientes desde el botón de guardado final
	 * *    =========================================================================
	*/
    public function Crear_expediente($logged_user){
        $crud = new crud();
        $object = new connection_database();
        $set_logged_user = $object -> _db -> prepare("SET @logged_user = :loggeduser");
        $set_logged_user -> execute(array(':loggeduser' => $logged_user));
        $check_expediente = $crud->readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $this->select2]);
        if($check_expediente['count'] > 0){
            $results_expediente = $check_expediente['data'][0];
            $crud->update('expedientes', ['users_id' => $this->select2, 'numero_expediente' => $this->numero_expediente, 'numero_nomina' => $this->numero_nomina, 'numero_asistencia' => $this->asistencia_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion, 'fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono, 'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 'emergencia_telefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante, 'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam, 'banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico], "id=:expedienteid", [':expedienteid' => $results_expediente["id"]]);
            $checkreflab = $crud->readWithCount('ref_laborales', '*', 'WHERE expediente_id=:expedienteid', [':expedienteid' => $results_expediente['id']]);
            if($checkreflab['count'] > 0){
                $results_checkreflab = $checkreflab['data'];
                if(is_null($this->referencias)){
                    $crud -> delete('ref_laborales', 'expediente_id=:idexpediente', ['idexpediente' => $results_expediente['id']]);
                }else{
                    $jsonData = stripslashes(html_entity_decode($this->referencias));
                    $ref = json_decode($jsonData);
                    expedientes::Editar_reflaborales($results_expediente['id'], $ref);
                }
            }else{
                if(!(is_null($this->referencias))){
                    $jsonData = stripslashes(html_entity_decode($this->referencias));
                    $ref = json_decode($jsonData);
                    expedientes::Crear_reflaborales($results_expediente['id'], $ref);
                }
            }
            $checkbenban = $crud->readWithCount('ben_bancarios', '*', 'WHERE expediente_id=:expedienteid', [':expedienteid' => $results_expediente['id']]);
            if($checkbenban['count'] > 0){
                $results_checkbenban = $checkbenban['data'];
                if(is_null($this->refbanc)){
                    $crud -> delete('ben_bancarios', 'expediente_id=:idexpediente', ['idexpediente' => $results_expediente['id']]);
                }else{
                    $jsonData = stripslashes(html_entity_decode($this->refbanc));
                    $ref_banc = json_decode($jsonData);
                    expedientes::Editar_benbanc($results_expediente['id'], $ref_banc);
                }
            }else{
                if(!(is_null($this->refbanc))){
                    $jsonData = stripslashes(html_entity_decode($this->refbanc));
                    $ref_banc = json_decode($jsonData);
                    expedientes::Crear_benbanc($results_expediente['id'], $ref_banc);
                }
            }
            $checktipospapeleria = $object -> _db -> prepare("SELECT * FROM tipo_papeleria");
            $checktipospapeleria -> execute();
            $counttipospapeleria = $checktipospapeleria -> rowCount();
            foreach ($this->arraypapeleria as $i => $documento) {
                if (!empty($documento)) {
                    $crud = new crud();
                    $papeleria = $i;
                    $filename = $documento["name"];
                    $location = "../src/documents/";
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $uploadfile = Expedientes::tempnam_sfx($location, $ext);
                    
                    if (move_uploaded_file($documento['tmp_name'], $uploadfile)) {
                        date_default_timezone_set("America/Monterrey");
                        $fecha_subida = date('y-m-d h:i:s');
                        $crud->store('papeleria_empleado', ['expediente_id' => $results_expediente['id'], 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'identificador' => basename($uploadfile), 'fecha_subida' => $fecha_subida]);
                    }
                }
            }
            $check_estatus_expediente = $crud -> readWithCount('estatus_empleado', '*', 'WHERE expedientes_id=:expedienteid', [':expedienteid' => $results_expediente['id']]);
            if($check_estatus_expediente['count'] == 0) {
                date_default_timezone_set("America/Monterrey");
                $fecha_estatus = date('Y/m/d');
                $crud -> store('estatus_empleado', ['expedientes_id' => $results_expediente['id'], 'situacion_del_empleado' => "ALTA", 'estatus_del_empleado' => "NUEVO INGRESO", 'fecha' => $fecha_estatus]);
            }
        }else{
            $crud->store('expedientes', ['users_id' => $this->select2, 'numero_expediente' => $this->numero_expediente, 'numero_nomina' => $this->numero_nomina, 'numero_asistencia' => $this->asistencia_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion, 'fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono, 'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 'emergencia_telefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante, 'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam, 'banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico]);
            $id_expediente = $object -> _db -> lastInsertId();
            if(!(is_null($this->referencias))){
                $jsonData = stripslashes(html_entity_decode($this->referencias));
                $referencias = json_decode($jsonData);
                expedientes::Crear_reflaborales($id_expediente, $referencias);
            }
            if(!(is_null($this->refbanc))){
                $jsonData2 = stripslashes(html_entity_decode($this->refbanc));
                $refbanc = json_decode($jsonData2);
                expedientes::Crear_benbanc($id_expediente, $refbanc);
            }
            $checktipospapeleria = $object -> _db -> prepare("SELECT * FROM tipo_papeleria");
            $checktipospapeleria -> execute();
            $counttipospapeleria = $checktipospapeleria -> rowCount();
            foreach ($this->arraypapeleria as $i => $documento) {
                if (!empty($documento)) {
                    $crud = new crud();
                    $papeleria = $i;
                    $filename = $documento["name"];
                    $location = "../src/documents/";
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $uploadfile = Expedientes::tempnam_sfx($location, $ext);
                    
                    if (move_uploaded_file($documento['tmp_name'], $uploadfile)) {
                        date_default_timezone_set("America/Monterrey");
                        $fecha_subida = date('y-m-d h:i:s');
                        $crud->store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'identificador' => basename($uploadfile), 'fecha_subida' => $fecha_subida]);
                    }
                }
            }
            $check_estatus_expediente = $crud -> readWithCount('estatus_empleado', '*', 'WHERE expedientes_id=:expedienteid', [':expedienteid' => $id_expediente]);
            if($check_estatus_expediente['count'] == 0) {
                date_default_timezone_set("America/Monterrey");
                $fecha_estatus = date('Y/m/d');
                $crud -> store('estatus_empleado', ['expedientes_id' => $id_expediente, 'situacion_del_empleado' => "ALTA", 'estatus_del_empleado' => "NUEVO INGRESO", 'fecha' => $fecha_estatus]);
            }
        }
    }

    public static function Estatus_expediente($expediente_id, $situacion, $estatus_empleado, $estatus_fecha, $numero_baja, $fijo_mensual, $tipo_esquema, $motivo){
        $crud = new Crud();
        $check_estatus = $crud -> readWithCount('estatus_empleado', '*', 'WHERE expedientes_id = :expedienteid',  [':expedienteid' => $expediente_id]);
        if($check_estatus['count'] > 0){
            if ($situacion === null && $estatus_empleado === null && $estatus_fecha === null && $numero_baja === null && $fijo_mensual === null && $tipo_esquema === null && $motivo === null) {
                $crud -> delete('estatus_empleado', 'expedientes_id=:expedienteid', [':expedienteid' => $id_expediente]);
            }else{
                $crud -> update('estatus_empleado', ['situacion_del_empleado' => $situacion, 'estatus_del_empleado' => $estatus_empleado, 'numero_baja' => $numero_baja, 'fijo_mensual' => $fijo_mensual, 'tipo_esquema' => $tipo_esquema, 'motivo' => $motivo, 'fecha' => $estatus_fecha], 'expedientes_id=:expedienteid', [':expedienteid' => $expediente_id]);
            }
        }else{
            if ($situacion !== null || $estatus_empleado !== null || $estatus_fecha !== null || $numero_baja !== null || $fijo_mensual !== null || $tipo_esquema !== null || $motivo !== null) {
                $crud -> store('estatus_empleado', ['expedientes_id' => $expediente_id, 'situacion_del_empleado' => $situacion, 'estatus_del_empleado' => $estatus_empleado, 'numero_baja' => $numero_baja, 'fijo_mensual' => $fijo_mensual, 'tipo_esquema' => $tipo_esquema, 'motivo' => $motivo, 'fecha' => $estatus_fecha]);
            }
        }
    }

    public static function tempnam_sfx($path, $suffix){
        do {
            $file = $path."/".mt_rand().".".$suffix;
            $fp = @fopen($file, 'x');
        }
        while(!$fp);
    
        fclose($fp);
        return $file;
    }

    public static function EliminarExpediente($id, $logged_user){
        $object = new connection_database();
        $crud = new crud();
        $set_logged_user = $object -> _db -> prepare("SET @logged_user = :loggeduser");
        $set_logged_user -> execute(array(':loggeduser' => $logged_user));
        $selectarchivos = $object -> _db ->prepare("SELECT identificador from papeleria_empleado WHERE expediente_id=:expedienteid");
        $selectarchivos -> execute(array(":expedienteid" => $id));
        while($fetcharchivos = $selectarchivos -> fetch(PDO::FETCH_OBJ)){
            $path = __DIR__ . "/../src/documents/" .$fetcharchivos -> identificador; 
            if(file_exists($path)){
                unlink($path);
            }
        }
        $selectarchivosenhistorial = $object -> _db ->prepare("SELECT viejo_identificador from historial_papeleria_empleado WHERE expediente_id=:expedienteid2");
        $selectarchivosenhistorial -> execute(array(":expedienteid2" => $id));
        while($fetcharchivosenhistorial = $selectarchivosenhistorial -> fetch(PDO::FETCH_OBJ)){
            $path2 = __DIR__ . "/../src/documents/" .$fetcharchivosenhistorial -> viejo_identificador;
            if(file_exists($path2)){
                unlink($path2);
            }
        }
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

    public static function Checkifcurrentuserxexpediente($id){
	    $object = new connection_database();
	    $sql = "SELECT * FROM expedientes INNER JOIN usuarios ON expedientes.users_id = usuarios.id WHERE usuarios.id=:sessionid";
	    $fetchexpedientexcurrentuser = $object-> _db ->prepare($sql);
	    $fetchexpedientexcurrentuser -> execute(array(":sessionid" => $id));
	    $count_expedientexcurrentuser = $fetchexpedientexcurrentuser->rowCount();
	    return $count_expedientexcurrentuser;
    }

    public static function Checkpapeleria($id){
        $object = new connection_database();
	    $sql = "SELECT * FROM tipo_papeleria WHERE id=:papeleriaid";
        $checkthis = $object->_db->prepare($sql);
        $checkthis->execute(array(':papeleriaid' => $id));
        $papeleriacount = $checkthis->rowCount();
	    return $papeleriacount;
    }

    public static function Check_records_papeleria($expedienteid, $tipo_papeleria_id){
		$object = new connection_database();
	    $sql = "SELECT * FROM historial_papeleria_empleado WHERE expediente_id=:expedienteid AND tipo_archivo=:tipo UNION SELECT * FROM papeleria_empleado WHERE expediente_id=:expedienteid2 AND tipo_archivo=:tipo2";
        $check_records = $object->_db->prepare($sql);
        $check_records->execute(array(':expedienteid' => $expedienteid, ':tipo' => $tipo_papeleria_id, ':expedienteid2' => $expedienteid, ':tipo2' => $tipo_papeleria_id));
        $recordscount = $check_records->rowCount();
	    return $recordscount;
	}

    public static function Eliminar_Historial_Papeleria($id, $rowdefault, $logged_user){
        $object = new connection_database();
        $crud = new Crud();
        $set_logged_user = $object -> _db -> prepare("SET @logged_user = :loggeduser");
        $set_logged_user -> execute(array(':loggeduser' => $logged_user));
        if($rowdefault == "vinculado"){
            $check_if_doc_exist = $object -> _db -> prepare("SELECT identificador FROM papeleria_empleado WHERE id=:idpapeleria");
            $check_if_doc_exist -> execute(array(':idpapeleria' => $id));
            $fetch_if_doc_exist = $check_if_doc_exist -> fetch(PDO::FETCH_OBJ);
            $filepath = __DIR__ . "/../src/documents/"; 
            if(is_file($filepath.$fetch_if_doc_exist -> identificador)){ 
                unlink($filepath.$fetch_if_doc_exist -> identificador);
            }
            $crud -> delete('papeleria_empleado', "id=:id", [":id" => $id]);
        }else{
            $check_if_doc_exist = $object -> _db -> prepare("SELECT viejo_identificador FROM historial_papeleria_empleado WHERE id=:idhistorial");
            $check_if_doc_exist -> execute(array(':idhistorial' => $id));
            $fetch_if_doc_exist = $check_if_doc_exist -> fetch(PDO::FETCH_OBJ);
            $filepath = __DIR__ . "/../src/documents/"; 
            if(is_file($filepath.$fetch_if_doc_exist -> viejo_identificador)){ 
                unlink($filepath.$fetch_if_doc_exist -> viejo_identificador);
            }
            $crud -> delete('historial_papeleria_empleado', "id=:id", [":id" => $id]);
        }
    }
    
    public static function Fetcheditexpediente($id){
        $object = new connection_database();
        $row = $object->_db->prepare("SELECT expedientes.id as expid, expedientes.users_id as userid, expedientes.numero_expediente AS enum_expediente, expedientes.numero_nomina AS enum_nomina, expedientes.numero_asistencia AS enum_asistencia, expedientes.estudios as eestudios, expedientes.puesto as epuesto, expedientes.posee_correo as eposee_correo, expedientes.correo_adicional as ecorreo_adicional, expedientes.calle as ecalle, expedientes.num_interior as enum_interior, expedientes.num_exterior as enum_exterior, expedientes.colonia as ecolonia, expedientes.estado_id as eestado, expedientes.municipio_id as emunicipio, expedientes.codigo as ecodigo, expedientes.tel_dom as etel_dom, expedientes.posee_telmov as eposee_telmov, expedientes.tel_mov as etel_mov, expedientes.posee_telempresa as eposee_telempresa, expedientes.marcacion as emarcacion, expedientes.serie as eserie, expedientes.sim as esim, expedientes.numerored_empresa as enumred, expedientes.modelotel_empresa as modeltel, expedientes.marcatel_empresa as marcatel, expedientes.imei as eimei, expedientes.posee_laptop as eposee_laptop, expedientes.marca_laptop as emarca_laptop, expedientes.modelo_laptop as emodelo_laptop, expedientes.serie_laptop as eserie_laptop, expedientes.casa_propia as ecasa_propia, expedientes.ecivil as eecivil, expedientes.posee_retencion as eposee_retencion, expedientes.monto_mensual as emonto_mensual, expedientes.fecha_nacimiento as efecha_nacimiento, expedientes.fecha_inicioc as efecha_inicioc, expedientes.fecha_alta as efecha_alta, expedientes.salario_contrato as esalario_contrato, expedientes.salario_fechaalta as esalario_fechaalta, expedientes.observaciones as eobservaciones, expedientes.curp as ecurp, expedientes.nss as enss, expedientes.rfc as erfc, expedientes.tipo_identificacion as etipo_identificacion, expedientes.num_identificacion as enum_identificacion, expedientes.capacitacion as ecapacitacion, expedientes.fecha_enuniforme as efecha_enuniforme, expedientes.cantidad_polo as ecantidad_polo, expedientes.talla_polo as etalla_polo, expedientes.emergencia_nombre as eemergencia_nombre, expedientes.emergencia_apellidopat as eemergencia_appelidopat, expedientes.emergencia_apellidomat as eemergencia_appelidomat, expedientes.emergencia_relacion as eemergencia_relacion, expedientes.emergencia_telefono as eemergencia_telefono, expedientes.emergencia_nombre2 as eemergencia_nombre2, expedientes.emergencia_apellidopat2 as eemergencia_appelidopat2, expedientes.emergencia_apellidomat2 as eemergencia_appelidomat2, expedientes.emergencia_relacion2 as eemergencia_relacion2, expedientes.emergencia_telefono2 as eemergencia_telefono2, expedientes.resultado_antidoping as eresultado_antidoping, expedientes.tipo_sangre as etipo_sangre, expedientes.vacante as evacante, expedientes.fam_dentro_empresa as efam_dentro_empresa, expedientes.fam_nombre as efam_nombre, expedientes.fam_apellidopat as efam_apellidopat, expedientes.fam_apellidomat as efam_apellidomat, expedientes.banco_personal as ebanco_personal, expedientes.cuenta_personal as ecuenta_personal, expedientes.clabe_personal as eclabe_personal, expedientes.plastico_personal as eplastico_personal, expedientes.banco_nomina as ebanco_nomina, expedientes.cuenta_nomina as ecuenta_nomina, expedientes.clabe_nomina as eclabe_nomina, expedientes.plastico as eplastico, estatus_empleado.situacion_del_empleado as esituacion_del_empleado, estatus_empleado.estatus_del_empleado as eestatus_del_empleado, estatus_empleado.motivo as emotivo, estatus_empleado.fecha as eestatus_fecha from expedientes left join estatus_empleado on estatus_empleado.expedientes_id = expedientes.id where expedientes.id=:expedienteid");
        $row->bindParam("expedienteid", $id, PDO::PARAM_INT);
        $row->execute();
        $editar = $row->fetch(PDO::FETCH_OBJ);
        return $editar;
    }

    public static function Fetchtokenexpediente($id){
        $object = new connection_database();
        $row = $object->_db->prepare("SELECT expedientes.id as expid, expedientes.users_id as userid, expedientes.numero_expediente AS enum_expediente, expedientes.numero_nomina AS enum_nomina, expedientes.numero_asistencia AS enum_asistencia, expedientes.estudios as eestudios, expedientes.puesto as epuesto, expedientes.posee_correo as eposee_correo, expedientes.correo_adicional as ecorreo_adicional, expedientes.calle as ecalle, expedientes.num_interior as enum_interior, expedientes.num_exterior as enum_exterior, expedientes.colonia as ecolonia, expedientes.estado_id as eestado, expedientes.municipio_id as emunicipio, expedientes.codigo as ecodigo, expedientes.tel_dom as etel_dom, expedientes.posee_telmov as eposee_telmov, expedientes.tel_mov as etel_mov, expedientes.posee_telempresa as eposee_telempresa, expedientes.marcacion as emarcacion, expedientes.serie as eserie, expedientes.sim as esim, expedientes.numerored_empresa as enumred, expedientes.modelotel_empresa as modeltel, expedientes.marcatel_empresa as marcatel, expedientes.imei as eimei, expedientes.posee_laptop as eposee_laptop, expedientes.marca_laptop as emarca_laptop, expedientes.modelo_laptop as emodelo_laptop, expedientes.serie_laptop as eserie_laptop, expedientes.casa_propia as ecasa_propia, expedientes.ecivil as eecivil, expedientes.posee_retencion as eposee_retencion, expedientes.monto_mensual as emonto_mensual, expedientes.fecha_nacimiento as efecha_nacimiento, expedientes.fecha_inicioc as efecha_inicioc, expedientes.fecha_alta as efecha_alta, expedientes.salario_contrato as esalario_contrato, expedientes.salario_fechaalta as esalario_fechaalta, expedientes.observaciones as eobservaciones, expedientes.curp as ecurp, expedientes.nss as enss, expedientes.rfc as erfc, expedientes.tipo_identificacion as etipo_identificacion, expedientes.num_identificacion as enum_identificacion, expedientes.capacitacion as ecapacitacion, expedientes.fecha_enuniforme as efecha_enuniforme, expedientes.cantidad_polo as ecantidad_polo, expedientes.talla_polo as etalla_polo, expedientes.emergencia_nombre as eemergencia_nombre, expedientes.emergencia_apellidopat as eemergencia_appelidopat, expedientes.emergencia_apellidomat as eemergencia_appelidomat, expedientes.emergencia_relacion as eemergencia_relacion, expedientes.emergencia_telefono as eemergencia_telefono, expedientes.emergencia_nombre2 as eemergencia_nombre2,expedientes.emergencia_apellidopat2 as eemergencia_appelidopat2, expedientes.emergencia_apellidomat2 as eemergencia_appelidomat2, expedientes.emergencia_relacion2 as eemergencia_relacion2, expedientes.emergencia_telefono2 as eemergencia_telefono2, expedientes.resultado_antidoping as eresultado_antidoping, expedientes.tipo_sangre as etipo_sangre, expedientes.vacante as evacante, expedientes.fam_dentro_empresa as efam_dentro_empresa, expedientes.fam_nombre as efam_nombre, expedientes.fam_apellidopat as efam_apellidopat, expedientes.fam_apellidomat as efam_apellidomat, expedientes.banco_personal as ebanco_personal, expedientes.cuenta_personal as ecuenta_personal, expedientes.clabe_personal as eclabe_personal, expedientes.plastico_personal as eplastico_personal, expedientes.banco_nomina as ebanco_nomina, expedientes.cuenta_nomina as ecuenta_nomina, expedientes.clabe_nomina as eclabe_nomina, expedientes.plastico as eplastico, estatus_empleado.situacion_del_empleado as esituacion_del_empleado, estatus_empleado.estatus_del_empleado as eestatus_del_empleado, estatus_empleado.motivo as emotivo, estatus_empleado.fecha as eestatus_fecha from expedientes left join estatus_empleado on estatus_empleado.expedientes_id = expedientes.id where expedientes.id=:expedienteid");
        $row->bindParam("expedienteid", $id, PDO::PARAM_INT);
        $row->execute();
        $editar = $row->fetch(PDO::FETCH_OBJ);
        return $editar;
    }

    public static function Fetchverexpediente($id){
        $object = new connection_database();
        $row = $object->_db->prepare("SELECT expedientes.id AS expid, expedientes.users_id AS userid, expedientes.numero_expediente AS enum_expediente, expedientes.numero_nomina AS enum_nomina, expedientes.numero_asistencia AS enum_asistencia, expedientes.puesto AS epuesto, expedientes.estudios AS eestudios, expedientes.posee_correo AS eposee_correo, expedientes.correo_adicional AS ecorreo_adicional, expedientes.calle AS ecalle, expedientes.num_interior AS enum_interior, expedientes.num_exterior AS enum_exterior, expedientes.colonia AS ecolonia, expedientes.estado_id AS eestado, expedientes.municipio_id AS emunicipio, expedientes.codigo AS ecodigo, expedientes.tel_dom AS etel_dom, expedientes.posee_telmov AS eposee_telmov, expedientes.tel_mov AS etel_mov, expedientes.posee_telempresa AS eposee_telempresa, expedientes.marcacion AS emarcacion, expedientes.serie AS eserie, expedientes.sim AS esim, expedientes.numerored_empresa AS enumred, expedientes.modelotel_empresa AS modeltel, expedientes.marcatel_empresa AS marcatel, expedientes.imei AS eimei, expedientes.posee_laptop AS eposee_laptop, expedientes.marca_laptop AS emarca_laptop, expedientes.modelo_laptop AS emodelo_laptop, expedientes.serie_laptop AS eserie_laptop, expedientes.casa_propia AS ecasa_propia, expedientes.ecivil AS eecivil, expedientes.posee_retencion AS eposee_retencion, expedientes.monto_mensual AS emonto_mensual, expedientes.fecha_nacimiento AS efecha_nacimiento, expedientes.fecha_inicioc AS efecha_inicioc, expedientes.fecha_alta AS efecha_alta, expedientes.salario_contrato AS esalario_contrato, expedientes.salario_fechaalta AS esalario_fechaalta, expedientes.observaciones AS eobservaciones, expedientes.curp AS ecurp, expedientes.nss AS enss, expedientes.rfc AS erfc, expedientes.tipo_identificacion AS etipo_identificacion, expedientes.num_identificacion AS enum_identificacion, expedientes.fecha_enuniforme AS efecha_enuniforme, expedientes.cantidad_polo AS ecantidad_polo, expedientes.talla_polo AS etalla_polo, expedientes.emergencia_nombre AS eemergencia_nombre, expedientes.emergencia_apellidopat AS eemergencia_apellidopat, expedientes.emergencia_apellidomat AS eemergencia_apellidomat, expedientes.emergencia_relacion AS eemergencia_relacion, expedientes.emergencia_telefono AS eemergencia_telefono, expedientes.emergencia_nombre2 AS eemergencia_nombre2, expedientes.emergencia_apellidopat2 AS eemergencia_apellidopat2, expedientes.emergencia_apellidomat2 AS eemergencia_apellidomat2, expedientes.emergencia_relacion2 AS eemergencia_relacion2, expedientes.emergencia_telefono2 AS eemergencia_telefono2, expedientes.capacitacion AS ecapacitacion, expedientes.resultado_antidoping AS eeresultado_antidoping, expedientes.tipo_sangre AS eetipo_sangre, expedientes.vacante AS evacante, expedientes.fam_dentro_empresa AS efam_dentro_empresa, expedientes.fam_nombre AS efam_nombre, expedientes.fam_apellidopat AS efam_apellidopat, expedientes.fam_apellidomat AS efam_apellidomat, expedientes.banco_personal AS ebanco_personal, expedientes.cuenta_personal AS ecuenta_personal, expedientes.clabe_personal AS eclabe_personal, expedientes.plastico_personal AS eplastico_personal, expedientes.banco_nomina AS ebanco_nomina, expedientes.cuenta_nomina AS ecuenta_nomina, expedientes.clabe_nomina AS eclabe_nomina, expedientes.plastico AS eplastico, estatus_empleado.situacion_del_empleado AS esituacion_del_empleado, estatus_empleado.estatus_del_empleado AS eestatus_del_empleado, estatus_empleado.motivo AS emotivo, estatus_empleado.fecha AS eestatus_fecha from expedientes left join estatus_empleado on estatus_empleado.expedientes_id = expedientes.id where expedientes.id=:expedienteid");
        $row->bindParam("expedienteid", $id, PDO::PARAM_INT);
        $row->execute();
        $ver = $row->fetch(PDO::FETCH_OBJ);
        return $ver;
    }

    public static function Fetchownexpediente($id){
        $object = new connection_database();
        $row = $object->_db->prepare("SELECT expedientes.id as expid, expedientes.users_id as userid, expedientes.numero_expediente AS enum_expediente, expedientes.numero_nomina AS enum_nomina, expedientes.numero_asistencia AS enum_asistencia, expedientes.estudios as eestudios, expedientes.puesto as epuesto, expedientes.posee_correo as eposee_correo, expedientes.correo_adicional as ecorreo_adicional, expedientes.calle as ecalle, expedientes.num_interior as enum_interior, expedientes.num_exterior as enum_exterior, expedientes.colonia as ecolonia, expedientes.estado_id as eestado, expedientes.municipio_id as emunicipio, expedientes.codigo as ecodigo, expedientes.tel_dom as etel_dom, expedientes.posee_telmov as eposee_telmov, expedientes.tel_mov as etel_mov, expedientes.posee_telempresa as eposee_telempresa, expedientes.marcacion as emarcacion, expedientes.serie as eserie, expedientes.sim as esim, expedientes.numerored_empresa as enumred, expedientes.modelotel_empresa as modeltel, expedientes.marcatel_empresa as marcatel, expedientes.imei as eimei, expedientes.posee_laptop as eposee_laptop, expedientes.marca_laptop as emarca_laptop, expedientes.modelo_laptop as emodelo_laptop, expedientes.serie_laptop as eserie_laptop, expedientes.casa_propia as ecasa_propia, expedientes.ecivil as eecivil, expedientes.posee_retencion as eposee_retencion, expedientes.monto_mensual as emonto_mensual, expedientes.fecha_nacimiento as efecha_nacimiento, expedientes.fecha_inicioc as efecha_inicioc, expedientes.fecha_alta as efecha_alta, expedientes.salario_contrato as esalario_contrato, expedientes.salario_fechaalta as esalario_fechaalta, expedientes.observaciones as eobservaciones, expedientes.curp as ecurp, expedientes.nss as enss, expedientes.rfc as erfc, expedientes.tipo_identificacion as etipo_identificacion, expedientes.num_identificacion as enum_identificacion, expedientes.capacitacion as ecapacitacion, expedientes.fecha_enuniforme as efecha_enuniforme, expedientes.cantidad_polo as ecantidad_polo, expedientes.talla_polo as etalla_polo, expedientes.emergencia_nombre as eemergencia_nombre, expedientes.emergencia_apellidopat as eemergencia_appelidopat, expedientes.emergencia_apellidomat as eemergencia_appelidomat, expedientes.emergencia_relacion as eemergencia_relacion, expedientes.emergencia_telefono as eemergencia_telefono, expedientes.emergencia_nombre2 as eemergencia_nombre2, expedientes.emergencia_apellidopat2 as eemergencia_appelidopat2, expedientes.emergencia_apellidomat2 as eemergencia_appelidomat2, expedientes.emergencia_relacion2 as eemergencia_relacion2, expedientes.emergencia_telefono2 as eemergencia_telefono2, expedientes.resultado_antidoping as eresultado_antidoping, expedientes.tipo_sangre as etipo_sangre, expedientes.vacante as evacante, expedientes.fam_dentro_empresa as efam_dentro_empresa, expedientes.fam_nombre as efam_nombre, expedientes.fam_apellidopat as efam_apellidopat, expedientes.fam_apellidomat as efam_apellidomat, expedientes.banco_personal as ebanco_personal, expedientes.cuenta_personal as ecuenta_personal, expedientes.clabe_personal as eclabe_personal, expedientes.plastico_personal as eplastico_personal, expedientes.banco_nomina as ebanco_nomina, expedientes.cuenta_nomina as ecuenta_nomina, expedientes.clabe_nomina as eclabe_nomina, expedientes.plastico as eplastico from expedientes inner join usuarios on usuarios.id=expedientes.users_id where usuarios.id=:sessionid");
        $row->bindParam("sessionid", $id, PDO::PARAM_INT);
        $row->execute();
        $view = $row->fetch(PDO::FETCH_OBJ);
        return $view;
    }

    public function Editar_expediente($id_user, $id_expediente, $delete, $situacion, $estatus_empleado, $fecha_estatus, $motivo_estatus, $logged_user){
        $crud = new crud();
        $object = new connection_database();
        $set_logged_user = $object -> _db -> prepare("SET @logged_user = :loggeduser");
        $set_logged_user -> execute(array(':loggeduser' => $logged_user));
        //SE ACTUALIZA LA INFORMACIÓN DEL EXPEDIENTE
        $crud->update('expedientes', ['users_id' => $id_user, 'num_empleado' => $this->num_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->num_interior, 'num_exterior' => $this->num_exterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado_id, 'municipio_id' => $this->municipio_id, 'codigo' => $this->codigo, 'tel_dom' => $this->tel_dom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->tel_mov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fecha_nacimiento, 'fecha_inicioc' => $this->fecha_inicioc, 'fecha_alta' => $this->fecha_alta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->tipo_identificacion, 'num_identificacion' => $this->num_identificacion, 'capacitacion' => $this->capacitacion, 'fecha_enuniforme' => $this->fecha_enuniforme, 'cantidad_polo' => $this->cantidad_polo, 'talla_polo' => $this->talla_polo, 'emergencia_nombre' => $this->emergencia_nombre, 'emergencia_parentesco' => $this->emergencia_parentesco, 'emergencia_telefono' => $this->emergencia_telefono, 'emergencia_nombre2' => $this->emergencia_nombre2, 'emergencia_parentesco2' => $this->emergencia_parentesco2, 'emergencia_telefono2' => $this->emergencia_telefono2, 'resultado_antidoping' => $this->resultado_antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante, 'fam_dentro_empresa' => $this->fam_dentro_empresa, 'fam_nombre' => $this->fam_nombre, 'banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico], "id=:idexpediente", ['idexpediente' => $id_expediente]);	
        //SE ACTUALIZA LAS REFERENCIAS LABORALES
        $checkreflab = $object -> _db ->prepare("SELECT id FROM ref_laborales WHERE expediente_id=:expedienteid");
        $checkreflab -> execute(array(':expedienteid' => $id_expediente));
        $countreflab = $checkreflab -> rowCount();
        if($countreflab > 0){
            $array_ids = $checkreflab->fetchAll(PDO::FETCH_ASSOC);
            if(is_null($this->referencias)){
                $crud -> delete('ref_laborales', 'expediente_id=:idexpediente', ['idexpediente' => $id_expediente]);
            }else{
                $jsonData = stripslashes(html_entity_decode($this->referencias));
                $ref = json_decode($jsonData);
                expedientes::Editar_referenciaslab($id_expediente, $countreflab, $array_ids, $ref);
            }
        }else{
            if(!(is_null($this->referencias))){
                $jsonData = stripslashes(html_entity_decode($this->referencias));
                $ref = json_decode($jsonData);
                expedientes::Crear_referenciaslab($id_expediente, $ref);
            }
        }
        //SE ACTUALIZA LAS REFERENCIAS BANCARIAS
        $checkrefbanc = $object -> _db ->prepare("SELECT id FROM ref_bancarias WHERE expediente_id=:expedienteid");
        $checkrefbanc -> execute(array(':expedienteid' => $id_expediente));
        $countrefbanc = $checkrefbanc -> rowCount();
        if($countrefbanc > 0){
            $array_ids = $checkrefbanc->fetchAll(PDO::FETCH_ASSOC);
            if(is_null($this->ref_banc)){
                $crud -> delete('ref_bancarias', 'expediente_id=:idexpediente', ['idexpediente' => $id_expediente]);
            }else{
                $jsonData2 = stripslashes(html_entity_decode($this->ref_banc));
                $ref_banc = json_decode($jsonData2);
                expedientes::Editar_referenciasbanc($id_expediente, $countrefbanc, $array_ids, $ref_banc);
            }
        }else{
            if(!(is_null($this->ref_banc))){
                $jsonData2 = stripslashes(html_entity_decode($this->ref_banc));
                $ref_banc = json_decode($jsonData2);
                expedientes::Crear_referenciasbanc($id_expediente, $ref_banc);
            }
        }
        //PAPELERÍA
        $checktipospapeleria = $object -> _db -> prepare("SELECT * FROM tipo_papeleria");
        $checktipospapeleria -> execute();
        $counttipospapeleria = $checktipospapeleria -> rowCount();
        for($i = 1; $i <= $counttipospapeleria; $i++){
            $selectarchivo = $object -> _db -> prepare("select nombre_archivo, identificador, fecha_subida from papeleria_empleado where tipo_archivo=:tipo and expediente_id=:idexpediente");
            $selectarchivo -> execute(array(':tipo' => $i, ':idexpediente' => $id_expediente));
            $fetch_row_archivo = $selectarchivo -> fetch(PDO::FETCH_OBJ);
            //Cuando existe el archivo y se sube algo
            if(isset($fetch_row_archivo -> nombre_archivo) && isset($fetch_row_archivo -> identificador) && isset($this->arraypapeleria[$i]) && isset($this->arraypapeleria[$i]["name"])){
                $directory = "../src/documents/";
                $path = "../src/documents/".$fetch_row_archivo -> identificador;
                $ext = pathinfo($this->arraypapeleria[$i]["name"], PATHINFO_EXTENSION);
                $uploadfile = Expedientes::tempnam_sfx($directory, $ext);
                date_default_timezone_set("America/Monterrey");
				$date = date('Y-m-d H:i:s');
                if(move_uploaded_file($this->arraypapeleria[$i]['tmp_name'],$uploadfile)){
                    $crud->update('papeleria_empleado', ['nombre_archivo' => $this->arraypapeleria[$i]["name"],
                    'identificador' => basename($uploadfile), 'fecha_subida' => $date], "tipo_archivo=:tipo AND expediente_id=:idexpediente", [":tipo" => $i, 'idexpediente' => $id_expediente]);
                    if(file_exists($path)){
                        $crud->store('historial_papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $i, 'viejo_nombre_archivo' => $fetch_row_archivo -> nombre_archivo, 'viejo_identificador' => $fetch_row_archivo -> identificador, 'vieja_fecha_subida' => $fetch_row_archivo -> fecha_subida]);
                    }
                }
            //Cuando existe el archivo y no se sube nada
            }else if(isset($fetch_row_archivo -> nombre_archivo) && isset($fetch_row_archivo -> identificador) && !(isset($this->arraypapeleria[$i])) && !(isset($this->arraypapeleria[$i]["name"]))){
                if($delete[$i-1] == "true"){
                    $directory = "../src/documents/";
                    $path = "../src/documents/".$fetch_row_archivo -> identificador;
                    if(!file_exists($path)){
                        $crud -> delete('papeleria_empleado', "tipo_archivo=:tipo AND expediente_id=:idexpediente", [":tipo" => $i, ":idexpediente" => $id_expediente]);
                    }else{
                        unlink($directory.$fetch_row_archivo -> identificador);
                        $crud -> delete('papeleria_empleado', "tipo_archivo=:tipo AND expediente_id=:idexpediente", [":tipo" => $i, ":idexpediente" => $id_expediente]);
                    }
                }
            //cuando no existe el archivo y se sube algo
            }else if(!isset($fetch_row_archivo -> nombre_archivo) && !isset($fetch_row_archivo -> identificador) && isset($this->arraypapeleria[$i]) && isset($this->arraypapeleria[$i]["name"])){
                $directory = "../src/documents/";
                $ext = pathinfo($this->arraypapeleria[$i]["name"], PATHINFO_EXTENSION);
                $uploadfile = Expedientes::tempnam_sfx($directory, $ext);
                date_default_timezone_set("America/Monterrey");
				$date = date('Y-m-d H:i:s');
                if(move_uploaded_file($this->arraypapeleria[$i]['tmp_name'],$uploadfile)){
                    $crud->store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $i, 'nombre_archivo' => $this->arraypapeleria[$i]["name"],
                    'identificador' => basename($uploadfile), 'fecha_subida' => $date]);
                }
            }
        }
        //AQUÍ VA EL ESTATUS DE EL EMPLEADO
        $check_not_duplicated = $object -> _db -> prepare("SELECT * from estatus_empleado WHERE NOT EXISTS(SELECT 1 FROM estatus_empleado WHERE expedientes_id=:expedienteid AND situacion_del_empleado = :situacion AND estatus_del_empleado = :estatus)");
        $check_not_duplicated -> execute(array(':expedienteid' => $id_expediente, ':situacion' => $situacion, 'estatus' => $estatus_empleado));
        $row_count = $check_not_duplicated -> rowCount();
        if($row_count > 0){
        $insertar_historial = $object -> _db -> prepare("INSERT INTO historial_estatus_empleado(historial_estatus_empleado.estatus_empleado_id, historial_estatus_empleado.vieja_situacion_del_empleado, historial_estatus_empleado.viejo_estatus_del_empleado, historial_estatus_empleado.viejo_motivo, historial_estatus_empleado.vieja_fecha) SELECT estatus_empleado.id, estatus_empleado.situacion_del_empleado, estatus_empleado.estatus_del_empleado, estatus_empleado.motivo, estatus_empleado.fecha FROM estatus_empleado WHERE estatus_empleado.expedientes_id=:expedienteid");
        $insertar_historial -> execute(array(':expedienteid' => $id_expediente));
        }
        $crud -> update('estatus_empleado', ['situacion_del_empleado' => $situacion, 'estatus_del_empleado' => $estatus_empleado, 'motivo' => $motivo_estatus,  'fecha' => $fecha_estatus], 'expedientes_id=:expediente', ['expediente' => $id_expediente]);
    }

    public static function Asignar_token($id){
        $crud = new crud();
        $object = new connection_database();
        $token = bin2hex(random_bytes(16));
        date_default_timezone_set("America/Monterrey");
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+7, date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $path = $protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
        $path = dirname($path);
        $links = $path. "/layouts/expediente_modo_edicion.php?token=$token";
        
        
        $crud -> store('token_expediente', ["expedientes_id" => $id, "token" => $token, "link" => $links, "exp_date" => $expDate]);

    /** 
     * & AQUI SE CAMBIA EL ESTATUS DEL EXPEDIENTE A "ASIGNADO"
     */
        $crud -> update('expedientes', ['estatus_expediente' => 3], "id=:idexpediente", [':idexpediente' => $id]);
    }

    public static function Eliminar_Token($eliminar_token){
        $crud = new crud();
        $object = new connection_database();
        
        $crud->delete('token_expediente', 'token=:token', [':token' => $eliminar_token]);
    }


/**
 * &   ███████ ██   ██ ██████  ███████ ██████  ██ ███████ ███    ██ ████████ ███████     ███    ███  ██████  ██████   ██████      ███████ ██████  ██  ██████ ██  ██████  ███    ██ 
 * *   ██       ██ ██  ██   ██ ██      ██   ██ ██ ██      ████   ██    ██    ██          ████  ████ ██    ██ ██   ██ ██    ██     ██      ██   ██ ██ ██      ██ ██    ██ ████   ██ 
 * &   █████     ███   ██████  █████   ██   ██ ██ █████   ██ ██  ██    ██    █████       ██ ████ ██ ██    ██ ██   ██ ██    ██     █████   ██   ██ ██ ██      ██ ██    ██ ██ ██  ██ 
 * *   ██       ██ ██  ██      ██      ██   ██ ██ ██      ██  ██ ██    ██    ██          ██  ██  ██ ██    ██ ██   ██ ██    ██     ██      ██   ██ ██ ██      ██ ██    ██ ██  ██ ██ 
 * &   ███████ ██   ██ ██      ███████ ██████  ██ ███████ ██   ████    ██    ███████     ██      ██  ██████  ██████   ██████      ███████ ██████  ██  ██████ ██  ██████  ██   ████                                                                                                                                                                                 
*/

    //DATOS GENERALES 
    public function Insertar_expedientetoken_datosG(){
        $crud = new crud();
        $object = new connection_database();
        $check_table_DG = $crud->readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $_SESSION['id']]);
        if($check_table_DG['count'] > 0){
            $results_table_DG = $check_table_DG['data'][0];
            $crud->update('expedientes', ['estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion, 'estatus_expediente' => 4], "id=:idexpediente", [':idexpediente' => $results_table_DG['id']]);
        }
    }

   //DATOS ADICIONALES
   public function Insertar_expediente_datosA(){
    $crud = new crud();
    $object = new connection_database();
    $check_table_DA = $crud->readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $_SESSION['id']]);
    if($check_table_DA['count'] > 0){
        $results_table_DA = $check_table_DA['data'][0];
        $crud->update('expedientes', ['fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono,'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 'emergencia_telefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante,'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam, 'estatus_expediente' => 4], "id=:idexpediente", ['idexpediente' => $results_table_DA['id']]);
        $checkreflab = $crud->readWithCount('ref_laborales', '*', 'WHERE expediente_id=:expedienteid', [':expedienteid' => $results_table_DA['id']]);
        if($checkreflab['count'] > 0){
            $results_checkreflab = $checkreflab['data'];
            if(is_null($this->referencias)){
                $crud -> delete('ref_laborales', 'expediente_id=:idexpediente', ['idexpediente' => $results_table_DA['id']]);
            }else{
                $jsonData = stripslashes(html_entity_decode($this->referencias));
                $ref = json_decode($jsonData);
                expedientes::Insertar_reflaborales($results_table_DA['id'], $ref);
                $results_table_DA = $referencias->fetchAll(PDO::FETCH_ASSOC);
            }
        }else{
            if(!(is_null($this->referencias))){
                $jsonData = stripslashes(html_entity_decode($this->referencias));
                $ref = json_decode($jsonData);
                expedientes::Insertar_tokenreflaborales($results_table_DA['id'], $ref);
            }
        }
    }
}

public static function Insertar_tokenreflaborales($id_expediente, $ref) {
    $crud = new crud();

    // Insertar el valor de expediente_id una vez
    $expediente_id = $id_expediente;

    // Crear un arreglo para una fila de datos
    $row = [
        'nombre1' => null,
        'apellido_pat1' => null,
        'apellido_mat1' => null,
        'relacion1' => null,
        'telefono1' => null,
        'nombre2' => null,
        'apellido_pat2' => null,
        'apellido_mat2' => null,
        'relacion2' => null,
        'telefono2' => null,
        'nombre3' => null,
        'apellido_pat3' => null,
        'apellido_mat3' => null,
        'relacion3' => null,
        'telefono3' => null,
        'expediente_id' => $expediente_id
    ];

    // Llenar el arreglo con los valores de las referencias
    for ($indice = 1; $indice <= 3; $indice++) {
        if (isset($ref[$indice - 1])) {
            $referencia = $ref[$indice - 1];
            $row['nombre' . $indice] = $referencia->nombre;
            $row['apellido_pat' . $indice] = $referencia->apellidopat;
            $row['apellido_mat' . $indice] = $referencia->apellidomat;
            $row['relacion' . $indice] = $referencia->relacion;
            $row['telefono' . $indice] = $referencia->telefono;
        }
    }

    // Insertar una fila en la base de datos
    $crud->store('ref_laborales', $row);
}

public static function Insertar_reflaborales($id_expediente, $ref) {
    $crud = new crud();

    // Insertar el valor de expediente_id una vez
    $expediente_id = $id_expediente;

    // Crear un arreglo para una fila de datos
    $row = [
        'nombre1' => null,
        'apellido_pat1' => null,
        'apellido_mat1' => null,
        'relacion1' => null,
        'telefono1' => null,
        'nombre2' => null,
        'apellido_pat2' => null,
        'apellido_mat2' => null,
        'relacion2' => null,
        'telefono2' => null,
        'nombre3' => null,
        'apellido_pat3' => null,
        'apellido_mat3' => null,
        'relacion3' => null,
        'telefono3' => null,
        'expediente_id' => $expediente_id
    ];

    // Llenar el arreglo con los valores de las referencias
    for ($indice = 1; $indice <= 3; $indice++) {
        if (isset($ref[$indice - 1])) {
            $referencia = $ref[$indice - 1];
            $row['nombre' . $indice] = $referencia->nombre;
            $row['apellido_pat' . $indice] = $referencia->apellidopat;
            $row['apellido_mat' . $indice] = $referencia->apellidomat;
            $row['relacion' . $indice] = $referencia->relacion;
            $row['telefono' . $indice] = $referencia->telefono;
        }
    }

    // Insertar una fila en la base de datos
    $crud->update('ref_laborales', $row, 'expediente_id=:idexpediente', [':idexpediente' => $id_expediente]);
} 

public function Insertar_expediente_datosB(){
    $crud = new crud();
    $object = new connection_database();
    $check_table_DB = $crud->readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $_SESSION['id']]);
    if($check_table_DB['count'] > 0){
        $results_table_DB = $check_table_DB['data'][0];
        $crud->update('expedientes', ['banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal,'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'estatus_expediente' => 4], "id=:idexpediente", ['idexpediente' => $results_table_DB['id']]);
        $checkbenban = $crud->readWithCount('ben_bancarios', '*', 'WHERE expediente_id=:expedienteid', [':expedienteid' => $results_table_DB['id']]);
        if($checkbenban['count'] > 0){
            $results_checkbenban = $checkbenban['data'];
            if(is_null($this->refbanc)){
                $crud -> delete('ben_bancarios', 'expediente_id=:idexpediente', ['idexpediente' => $results_table_DB['id']]);
            }else{
                $jsonData2 = stripslashes(html_entity_decode($this->refbanc));
                $ref_banc = json_decode($jsonData2);
                expedientes::Editar_tokenbenbanc($results_table_DB['id'], $ref_banc);
            }
        }else{
            if(!(is_null($this->refbanc))){
                $jsonData2 = stripslashes(html_entity_decode($this->refbanc));
                $ref_banc = json_decode($jsonData2);
                expedientes::Crear_tokenbenbanc($results_table_DB['id'], $ref_banc);
            }
        }
    }else{
        $crud->store('expedientes', ['users_id' => $this->$_SESSION['id'], 'banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'estatus_expediente' => 4]);
        $id_expediente = $object -> _db -> lastInsertId();
        if(!(is_null($this->refbanc))){
            $jsonData2 = stripslashes(html_entity_decode($this->refbanc));
            $ref_banc = json_decode($jsonData2);
            expedientes::Crear_tokenbenbanc($id_expediente, $ref_banc);
        }
    }
}

public static function Crear_tokenbenbanc($id_expediente, $ref_banc) {
    $crud = new crud();

    // Insertar el valor de expediente_id una vez
    $expediente_id = $id_expediente;

    // Crear un arreglo para una fila de datos
    $row = [
        'nombre1' => null,
        'apellido_pat1' => null,
        'apellido_mat1' => null,
        'relacion1' => null,
        'rfc1' => null,
        'curp1' => null,
        'porcentaje1' => null,
        'nombre2' => null,
        'apellido_pat2' => null,
        'apellido_mat2' => null,
        'relacion2' => null,
        'rfc2' => null,
        'curp2' => null,
        'porcentaje2' => null,
        'expediente_id' => $expediente_id
    ];

    // Llenar el arreglo con los valores de las referencias
    for ($indice = 1; $indice <= 3; $indice++) {
        if (isset($ref_banc[$indice - 1])) {
            $referencia = $ref_banc[$indice - 1];
            $row['nombre' . $indice] = $referencia->nombre;
            $row['apellido_pat' . $indice] = $referencia->apellidopat;
            $row['apellido_mat' . $indice] = $referencia->apellidomat;
            $row['relacion' . $indice] = $referencia->relacion;
            $row['rfc' . $indice] = $referencia->rfc;
            $row['curp' . $indice] = $referencia->curp;
            $row['porcentaje' . $indice] = $referencia->porcentaje;
        }
    }

    // Insertar una fila en la base de datos
    $crud->store('ben_bancarios', $row);
}

public static function Editar_tokenbenbanc($id_expediente, $ref_banc) {
    $crud = new crud();

    // Insertar el valor de expediente_id una vez
    $expediente_id = $id_expediente;

    // Crear un arreglo para una fila de datos
    $row = [
        'nombre1' => null,
        'apellido_pat1' => null,
        'apellido_mat1' => null,
        'relacion1' => null,
        'rfc1' => null,
        'curp1' => null,
        'porcentaje1' => null,
        'nombre2' => null,
        'apellido_pat2' => null,
        'apellido_mat2' => null,
        'relacion2' => null,
        'rfc2' => null,
        'curp2' => null,
        'porcentaje2' => null,
        'expediente_id' => $expediente_id
    ];

    // Llenar el arreglo con los valores de los beneficiarios
    for ($indice = 1; $indice <= 3; $indice++) {
        if (isset($ref_banc[$indice - 1])) {
            $referencia = $ref_banc[$indice - 1];
            $row['nombre' . $indice] = $referencia->nombre;
            $row['apellido_pat' . $indice] = $referencia->apellidopat;
            $row['apellido_mat' . $indice] = $referencia->apellidomat;
            $row['relacion' . $indice] = $referencia->relacion;
            $row['rfc' . $indice] = $referencia->rfc;
            $row['curp' . $indice] = $referencia->curp;
            $row['porcentaje' . $indice] = $referencia->porcentaje;
        }
    }

    // Insertar una fila en la base de datos
    $crud->update('ben_bancarios', $row, 'expediente_id=:idexpediente', [':idexpediente' => $id_expediente]);
}

public function Submit_tokenexpediente($logged_user){
    $crud = new crud();
        $object = new connection_database();
        $set_logged_user = $object -> _db -> prepare("SET @logged_user = :loggeduser");
        $set_logged_user -> execute(array(':loggeduser' => $logged_user));
        $check_expediente = $crud->readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $_SESSION['id'],]);
        if($check_expediente['count'] > 0){
            $results_expediente = $check_expediente['data'][0];
            $crud->update('expedientes', ['users_id' => $_SESSION['id'], 'numero_expediente' => $this->numero_expediente, 'numero_nomina' => $this->numero_nomina, 'numero_asistencia' => $this->asistencia_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion, 'fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono, 'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 'emergencia_telefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante, 'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam, 'banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico], "id=:expedienteid", [':expedienteid' => $results_expediente["id"]]);
            if (!empty($_POST["estudios"]) && !empty($_POST["posee_correo"]) && !empty($_POST["calle"]) && !empty($_POST["nexterior"]) && !empty($_POST["colonia"]) && !empty($_POST["estado"]) && !empty($_POST["estadotext"]) && !empty($_POST["municipio"]) && !empty($_POST["municipiotext"]) && !empty($_POST["codigo"]) && !empty($_POST["radio"]) && !empty($_POST["ecivil"]) && !empty($_POST["posee_retencion"]) && !empty($_POST["fechanac"]) && !empty($_POST["curp"]) && !empty($_POST["nss"]) && !empty($_POST["rfc"]) && !empty($_POST["identificacion"]) && !empty($_POST["numeroidentificacion"]) && !empty($_POST["numeroreferenciaslab"]) && !empty($_POST["emergencianom"]) && !empty($_POST["emergenciaapat"]) && !empty($_POST["emergenciaamat"]) && !empty($_POST["emergenciarelacion"]) && !empty($_POST["emergenciatelefono"]) && !empty($_POST["emergencianom2"]) && !empty($_POST["emergenciaapat2"]) && !empty($_POST["emergenciaamat2"]) && !empty($_POST["emergenciarelacion2"]) && !empty($_POST["emergenciatelefono2"]) && !empty($_POST["numeroreferenciasban"])) 
		    {
                if(Roles::FetchSessionRol($_SESSION['rol']) == "Tecnico"){ //Campos únicos de tecnicos
                    if (!empty($_POST["banco_personal"]) && !empty($_POST["cuenta_personal"]) && !empty($_POST["clabe_personal"]) && !empty($_POST["plastico_personal"])) {
                        $crud -> update('expedientes', ['estatus_expediente' => 6], "id=:idexpediente", [':idexpediente' => $results_expediente['id']]);
                    }
                }else{ //En caso de no ser tecnico
                        $crud -> update('expedientes', ['estatus_expediente' => 6], "id=:idexpediente", [':idexpediente' => $results_expediente['id']]);
                    }
                
               
            }else{ //En caso de no tener los campos obligatorios llenos se guarda como "En revisión"
                $crud -> update('expedientes', ['estatus_expediente' => 4], "id=:idexpediente", [':idexpediente' => $results_expediente['id']]);
            }

            //revisa las ref laborales
            $checkreflab = $crud->readWithCount('ref_laborales', '*', 'WHERE expediente_id=:expedienteid', [':expedienteid' => $results_expediente['id']]);
            if($checkreflab['count'] > 0){
                $results_checkreflab = $checkreflab['data'];
                if(is_null($this->referencias)){
                    $crud -> delete('ref_laborales', 'expediente_id=:idexpediente', ['idexpediente' => $results_expediente['id']]);
                }else{
                    $jsonData = stripslashes(html_entity_decode($this->referencias));
                    $ref = json_decode($jsonData);
                    expedientes::Editar_reflaborales($results_expediente['id'], $ref);
                }
            }else{
                if(!(is_null($this->referencias))){
                    $jsonData = stripslashes(html_entity_decode($this->referencias));
                    $ref = json_decode($jsonData);
                    expedientes::Crear_reflaborales($results_expediente['id'], $ref);
                }
            }
            $checkbenban = $crud->readWithCount('ben_bancarios', '*', 'WHERE expediente_id=:expedienteid', [':expedienteid' => $results_expediente['id']]);
            if($checkbenban['count'] > 0){
                $results_checkbenban = $checkbenban['data'];
                if(is_null($this->refbanc)){
                    $crud -> delete('ben_bancarios', 'expediente_id=:idexpediente', ['idexpediente' => $results_expediente['id']]);
                }else{
                    $jsonData = stripslashes(html_entity_decode($this->refbanc));
                    $ref_banc = json_decode($jsonData);
                    expedientes::Editar_benbanc($results_expediente['id'], $ref_banc);
                }
            }else{
                if(!(is_null($this->refbanc))){
                    $jsonData = stripslashes(html_entity_decode($this->refbanc));
                    $ref_banc = json_decode($jsonData);
                    expedientes::Crear_benbanc($results_expediente['id'], $ref_banc);
                }
            }
            $checktipospapeleria = $object -> _db -> prepare("SELECT * FROM tipo_papeleria");
            $checktipospapeleria -> execute();
            $counttipospapeleria = $checktipospapeleria -> rowCount();
            foreach ($this->arraypapeleria as $i => $documento) {
                if (!empty($documento)) {
                    $crud = new crud();
                    $papeleria = $i;
                    $filename = $documento["name"];
                    $location = "../src/documents/";
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $uploadfile = Expedientes::tempnam_sfx($location, $ext);
                    
                    if (move_uploaded_file($documento['tmp_name'], $uploadfile)) {
                        date_default_timezone_set("America/Monterrey");
                        $fecha_subida = date('y-m-d h:i:s');
                        $crud->store('papeleria_empleado', ['expediente_id' => $results_expediente['id'], 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'identificador' => basename($uploadfile), 'fecha_subida' => $fecha_subida]);
                    }
                }
            }
            date_default_timezone_set("America/Monterrey");
            $fecha_estatus = date('Y-m-d');
            $crud -> store('estatus_empleado', ['expedientes_id' => $results_expediente['id'], 'situacion_del_empleado' => "ALTA", 'estatus_del_empleado' => "NUEVO INGRESO", 'fecha' => $fecha_estatus]);
        }else{
            $crud->store('expedientes', ['users_id' => $_SESSION['id'], 'numero_expediente' => $this->numero_expediente, 'numero_nomina' => $this->numero_nomina, 'numero_asistencia' => $this->asistencia_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion, 'fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono, 'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 'emergencia_telefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante, 'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam, 'banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico]);
            $id_expediente = $object -> _db -> lastInsertId();
            if(!(is_null($this->referencias))){
                $jsonData = stripslashes(html_entity_decode($this->referencias));
                $referencias = json_decode($jsonData);
                expedientes::Crear_reflaborales($id_expediente, $referencias);
            }
            if(!(is_null($this->refbanc))){
                $jsonData2 = stripslashes(html_entity_decode($this->refbanc));
                $refbanc = json_decode($jsonData2);
                expedientes::Crear_benbanc($id_expediente, $refbanc);
            }
            $checktipospapeleria = $object -> _db -> prepare("SELECT * FROM tipo_papeleria");
            $checktipospapeleria -> execute();
            $counttipospapeleria = $checktipospapeleria -> rowCount();
            foreach ($this->arraypapeleria as $i => $documento) {
                if (!empty($documento)) {
                    $crud = new crud();
                    $papeleria = $i;
                    $filename = $documento["name"];
                    $location = "../src/documents/";
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $uploadfile = Expedientes::tempnam_sfx($location, $ext);
                    
                    if (move_uploaded_file($documento['tmp_name'], $uploadfile)) {
                        date_default_timezone_set("America/Monterrey");
                        $fecha_subida = date('y-m-d h:i:s');
                        $crud->store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'identificador' => basename($uploadfile), 'fecha_subida' => $fecha_subida]);
                    }
                }
            }
            date_default_timezone_set("America/Monterrey");
            $fecha_estatus = date('Y-m-d');
            $crud -> store('estatus_empleado', ['expedientes_id' => $id_expediente, 'situacion_del_empleado' => "ALTA", 'estatus_del_empleado' => "NUEVO INGRESO", 'fecha' => $fecha_estatus]);
        }
    }

}
?>
