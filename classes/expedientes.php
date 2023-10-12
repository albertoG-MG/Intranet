<?php
include_once __DIR__ . "/../config/conexion.php";
include_once __DIR__ . "/crud.php";
class expedientes {
    public $select2;
    public $num_empleado;
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

    public function __construct($select2, $num_empleado = null, $puesto = null, $estudios = null, $posee_correo = null, $correo_adicional = null, $calle = null, $ninterior = null, $nexterior = null, $colonia = null, $estado = null, $municipio = null, $codigo = null, $teldom = null, $posee_telmov = null, $telmov = null, $posee_telempresa = null, $marcacion = null, $serie = null, $sim = null, $numred = null, $modelotel = null, $marcatel = null, $imei = null, $posee_laptop = null, $marca_laptop = null, $modelo_laptop = null, $serie_laptop = null, $casa_propia = null, $ecivil = null, $posee_retencion = null, $monto_mensual = null, $fechanac = null, $fechacon = null, $fechaalta = null, $salario_contrato = null, $salario_fechaalta = null, $observaciones = null, $curp = null, $nss = null, $rfc = null, $identificacion = null, $numeroidentificacion = null, $referencias = null, $fechauniforme = null, $cantidadpolo = null, $tallapolo = null, $emergencianom = null, $emergenciaapat = null, $emergenciaamat = null, $emergenciarelacion = null, $emergenciatelefono = null, $emergencianom2 = null, $emergenciaapat2 = null, $emergenciaamat2 = null, $emergenciarelacion2 = null, $emergenciatelefono2 = null, $capacitacion = null, $antidoping = null, $tipo_sangre = null, $vacante = null, $radio2 = null, $nomfam = null, $apellidopatfam = null, $apellidomatfam = null, $refbanc = null, $banco_personal = null, $cuenta_personal = null, $clabe_personal = null, $plastico_personal = null, $banco_nomina = null, $cuenta_nomina = null, $clabe_nomina = null, $plastico = null, $arraypapeleria = null) {
        $this->select2 = $select2;
        $this->num_empleado = $num_empleado;
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


    public function Crear_expediente_datosG(){
        //Clase gateway para insertar, editar y eliminar en la base de datos
        $crud = new crud();
        //Conexión
        $object = new connection_database();
        //Checa si el expediente ya existe o no
        $check_temporal_table_DG = $object -> _db -> prepare("SELECT * FROM expedientes_temporales WHERE users_id=:userid");
        $check_temporal_table_DG -> execute(array(':userid' => $this->select2));
        //Contamos las filas si existen
        $count_results_DG = $check_temporal_table_DG -> rowCount();
        //Si los datos existen, actualiza, si no existe, inserta
        if($count_results_DG > 0){
            //Recuperar información almacenada de la base de datos y traerla de vuelta a la aplicación para su procesamiento
            $fetch_results_DG = $check_temporal_table_DG -> fetch(PDO::FETCH_ASSOC);
            //Actualiza la tabla, el primer dato que te pide es el nombre de la tabla, los campos a actualizar, la condición y el valor de la condición
            $crud->update('expedientes_temporales', ['num_empleado' => $this->num_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion, 'estatus_expediente' => 'Incompleto'], "id=:idexpediente", ['idexpediente' => $fetch_results['id']]);
        }else{
            //Crea un registro en la base de datos, los datos que te pide son el nombre de la tabla y los campos a almacenar
            $crud->store('expedientes_temporales', ['users_id' => $this->select2, 'num_empleado' => $this->num_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion, 'estatus_expediente' => 'Incompleto']);
        }
    }

    public function Crear_expediente_datosA(){
        //Clase gateway para insertar, editar y eliminar en la base de datos
        $crud = new crud();
        //Conexión
        $object = new connection_database();
        //Checa si el expediente ya existe o no
        $check_temporal_table_DA = $object -> _db -> prepare("SELECT * FROM expedientes_temporales WHERE users_id=:userid");
        $check_temporal_table_DA -> execute(array(':userid' => $this->select2));
        //Contamos las filas si existen
        $count_results_DA = $check_temporal_table_DA -> rowCount();
        //Si los datos existen, actualiza, si no existe, inserta
        if($count_results_DA > 0){
            //Recuperar información almacenada de la base de datos y traerla de vuelta a la aplicación para su procesamiento
            $fetch_results_DA = $check_temporal_table_DA -> fetch(PDO::FETCH_ASSOC);
            //Actualiza la tabla, el primer dato que te pide es el nombre de la tabla, los campos a actualizar, la condición y el valor de la condición
            $crud->update('expedientes_temporales', ['fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 
            'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono,
            'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 
            'emergencia_telefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante,
            'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam, 'estatus_expediente' => 'Incompleto'], "id=:idexpediente", ['idexpediente' => $fetch_results['id']]);
            //Debido a que el ID del expediente ya lo tenemos en el fetch, no es necesario usar el lastInsertId para obtener el ID
            //En esta parte debemos actualizar las referencias laborales, tanto si agregó nuevas, si quitó algunas ó si modificó el valor de los campos
            //Checa si hay referencias laborales insertadas en la base de datos temporal
            $checkreflab_temporales = $object -> _db ->prepare("SELECT * FROM ref_laborales_temporales WHERE expediente_id=:expedienteid");
            $checkreflab_temporales -> execute(array(':expedienteid' => $fetch_results['id']));
            $countreflab_temporales = $checkreflab_temporales -> rowCount();
            //Si hay referencias laborales en la base de datos, creamos un nuevo metodo para actualizar los campos, el numero de referencias laborales tanto si el usuario agregó nuevas o qutó referencias laborales
            if($countreflab_temporales > 0){
                //Si el usuario modificó los valores de la referencias pero no agregó más referencias ni quitó referencias, el arreglo de ID nos facilita hacer tracking de los cambios
                $array_ids = $checkreflab_temporales->fetchAll(PDO::FETCH_ASSOC);
                //Si hay registro de referencias laborales pero la variable referencias está vacía, eso signfica que el usuario eliminó todas las referencias laborales
                if(is_null($this->referencias)){
                    $crud -> delete('ref_laborales_temporales', 'expediente_id=:idexpediente', ['idexpediente' => $fetch_results['id']]);
                }else{
                    //Si el usuario modificó el valor de las variables, agregó o quitó referencias significa que tenemos que actualizar las referencias
                    $jsonData = stripslashes(html_entity_decode($this->referencias));
                    $ref = json_decode($jsonData);
                    //Enviamos al metodo el id del expediente, el total de referencias laborales, el arreglo de ids y el json de las referencias laborales
                    expedientes::Editar_referenciaslab_temporales($fetch_results['id'], $countreflab, $array_ids, $ref);
                }
            }else{
                //Si no hay referencias laborales registradas y el usuario no envío nada, entonces no hagas nada
                if(!(is_null($this->referencias))){
                    $jsonData = stripslashes(html_entity_decode($this->referencias));
                    $ref = json_decode($jsonData);
                    expedientes::Crear_referenciaslab_temporales($fetch_results['id'], $ref);
                }
            }
        }else{
            //Crea un registro en la base de datos, los datos que te pide son el nombre de la tabla y los campos a almacenar
            $crud->store('expedientes_temporales', ['users_id' => $this->select2, 'fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 
            'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono,
            'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 
            'emergenciatelefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante,
            'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam, 'estatus_expediente' => 'Incompleto']);
            //Obtiene el último id insertado
            $id_expediente = $object -> _db -> lastInsertId();
            //Checa si el usuario insertó referencias laborales
            if(!(is_null($this->referencias))){
                //Sirve para eliminar las barras invertidas (\) que pueden estar presentes en una cadena. Esto pasa por seguridad cuando mandas por lo general un json y te escapa las comillas presentes usando barras invertidas.
                $jsonData = stripslashes(html_entity_decode($this->referencias));
                //Decodificamos el json
                $ref = json_decode($jsonData);
                //Llamamos al metodo correspondiente obviamente con el id del expediente y las referencias laborales a insertar
                expedientes::Crear_referenciaslab_temporales($id_expediente, $ref);
            }
        }
    }

    //Metodo encargado de guardar las referencias laborales en la tabla temporal cuando se crea el expediente
    public static function Crear_referenciaslab_temporales($id_expediente, $ref){
        $refcrud = new crud();
        foreach ($ref as $referencia) {
            $ref_nombre = $referencia->nombre;
            $ref_apellidopat = $referencia->apellidopat;
            $ref_apellidomat = $referencia-> apellidomat;
            $ref_relacion = $referencia->relacion;
            $ref_telefono = $referencia->telefono;
            
            // Luego, almacena la referencia laboral en la base de datos
            $refcrud->store('ref_laborales_temporales', [
                'expediente_id' => $id_expediente, // Usar el ID del expediente proporcionado
                'nombre' => $ref_nombre,
                'apellido_pat' => $ref_apellidopat,
                'apellido_mat' => $ref_apellidomat,
                'relacion' => $ref_relacion,
                'telefono' => $ref_telefono
            ]);
        }
    }

    //Metodo encargado de editar las referencias laborales en la tabla temporal cuando se crea el expediente
    public static function Editar_referenciaslab_temporales($id_expediente, $countreflab, $array, $ref) {
        $crud = new crud();
        //Contamos el total de referencias laborales que el usuario envió
        $numero = count($ref);
    
        foreach ($ref as $i => $referencia) {
            $ref_nombre = $referencia->nombre;
            $ref_apellidopat = $referencia->apellidopat;
            $ref_apellidomat = $referencia-> apellidomat;
            $ref_relacion = $referencia->relacion;
            $ref_telefono = $referencia->telefono;

            if ($i < $countreflab) {
                // Si el índice es menor que el total de referencias en la base de datos, actualiza la referencia.
                $crud->update('ref_laborales', ['nombre' => $refnombre, 'telefono' => $reftelefono, 'relacion' => $refrelacion], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array[$i]["id"], 'expedienteid' => $id_expediente]);
            } else {
                // Si el índice es mayor que el total de referencias en la base de datos, almacena una nueva referencia.
                $crud->store('ref_laborales', ['nombre' => $refnombre, 'telefono' => $reftelefono, 'relacion' => $refrelacion, 'expediente_id' => $id_expediente]);
            }
        }

        // Si hay más referencias en la base de datos que las enviadas, elimina las referencias adicionales.
        foreach (array_slice($array, $numero) as $referenciaEliminar) {
            $crud->delete('ref_laborales', 'id=:idreferencia AND expediente_id=:expedienteid', ['idreferencia' => $referenciaEliminar["id"], 'expedienteid' => $id_expediente]);
        }
    }

    public function Crear_expediente($id, $logged_user){
        $crud = new crud();
        $object = new connection_database();
        $set_logged_user = $object -> _db -> prepare("SET @logged_user = :loggeduser");
        $set_logged_user -> execute(array(':loggeduser' => $logged_user));
        $crud->store('expedientes', ['users_id' => $id, 'num_empleado' => $this->num_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->num_interior, 'num_exterior' => $this->num_exterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado_id, 'municipio_id' => $this->municipio_id, 'codigo' => $this->codigo, 'tel_dom' => $this->tel_dom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->tel_mov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fecha_nacimiento, 'fecha_inicioc' => $this->fecha_inicioc, 'fecha_alta' => $this->fecha_alta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->tipo_identificacion, 'num_identificacion' => $this->num_identificacion, 'capacitacion' => $this->capacitacion, 'fecha_enuniforme' => $this->fecha_enuniforme, 'cantidad_polo' => $this->cantidad_polo, 'talla_polo' => $this->talla_polo, 'emergencia_nombre' => $this->emergencia_nombre, 'emergencia_parentesco' => $this->emergencia_parentesco, 'emergencia_telefono' => $this->emergencia_telefono, 'emergencia_nombre2' => $this->emergencia_nombre2, 'emergencia_parentesco2' => $this->emergencia_parentesco2, 'emergencia_telefono2' => $this->emergencia_telefono2, 'resultado_antidoping' => $this->resultado_antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante, 'fam_dentro_empresa' => $this->fam_dentro_empresa, 'fam_nombre' => $this->fam_nombre, 'banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico]); 
        $exp_id = $object -> _db -> lastInsertId();
        if(!(is_null($this->referencias))){
            $jsonData = stripslashes(html_entity_decode($this->referencias));
            $ref = json_decode($jsonData);
            expedientes::Crear_referenciaslab($exp_id, $ref);
        }
        if(!(is_null($this->ref_banc))){
            $jsonData2 = stripslashes(html_entity_decode($this->ref_banc));
            $ref_banc = json_decode($jsonData2);
            expedientes::Crear_referenciasbanc($exp_id, $ref_banc);
        }
        $checktipospapeleria = $object -> _db -> prepare("SELECT * FROM tipo_papeleria");
        $checktipospapeleria -> execute();
        $counttipospapeleria = $checktipospapeleria -> rowCount();

        for($i = 1; $i <= $counttipospapeleria; $i++){
            if(!(empty($this->arraypapeleria[$i]))){
                $crud = new crud();
                $papeleria = $i;
                $filename = $this->arraypapeleria[$i]["name"];
                $location = "../src/documents/";
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                $uploadfile = Expedientes::tempnam_sfx($location, $ext);
                if(move_uploaded_file($this->arraypapeleria[$i]['tmp_name'],$uploadfile)){
                    date_default_timezone_set("America/Monterrey");
                    $fecha_subida = date('y-m-d h:i:s');
                    $crud -> store('papeleria_empleado', ['expediente_id' => $exp_id, 'tipo_archivo' => $papeleria, 'nombre_archivo' => $filename, 'identificador' => basename($uploadfile), 'fecha_subida' => $fecha_subida]);
                }
            }
        }
        date_default_timezone_set("America/Monterrey");
		$fecha_estatus = date('Y-m-d');
        $crud -> store('estatus_empleado', ['expedientes_id' => $exp_id, 'situacion_del_empleado' => "ALTA", 'estatus_del_empleado' => "NUEVO INGRESO", 'fecha' => $fecha_estatus]);
    }

    public static function Crear_referenciaslab($exp_id, $ref){
        $refcrud = new crud();
        $numero  = count($ref);
        try{
            for($i=0; $i<$numero; $i++){
                $refnombre= $ref[$i]->nombre;
                $refrelacion = $ref[$i]->relacion;
                $reftelefono = $ref[$i]->telefono;
                $refcrud->store('ref_laborales', ['nombre' => $refnombre, 'telefono' => $reftelefono, 'relacion' => $refrelacion, 'expediente_id' => $exp_id]);
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
                $brefrelacion = $ref_banc[$a]->relacion;
                $brefrfc = $ref_banc[$a]->rfc;
                $brefcurp = $ref_banc[$a]->curp;
                $brefporcentaje = $ref_banc[$a]->porcentaje;

                $refcrud_banc->store('ref_bancarias', ['expediente_id' => $exp_id, 'nombre' => $brefnombre, 'relacion' => $brefrelacion, 'rfc' => $brefrfc, 'curp' => $brefcurp, 'prcnt_derecho' => $brefporcentaje]);
            }
        } catch (Exception $e) {
                $refcrud_banc -> delete ('expedientes', 'id=:id', ['id' => $exp_id]);
                exit('Ocurrio un error al momento de grabar las referencias laborales');   
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
        $row = $object->_db->prepare("SELECT expedientes.id as expid, expedientes.users_id as userid, expedientes.num_empleado as enum_empleado, expedientes.estudios as eestudios, expedientes.puesto as epuesto, expedientes.posee_correo as eposee_correo, expedientes.correo_adicional as ecorreo_adicional, expedientes.calle as ecalle, expedientes.num_interior as enum_interior, expedientes.num_exterior as enum_exterior, expedientes.colonia as ecolonia, expedientes.estado_id as eestado, expedientes.municipio_id as emunicipio, expedientes.codigo as ecodigo, expedientes.tel_dom as etel_dom, expedientes.posee_telmov as eposee_telmov, expedientes.tel_mov as etel_mov, expedientes.posee_telempresa as eposee_telempresa, expedientes.marcacion as emarcacion, expedientes.serie as eserie, expedientes.sim as esim, expedientes.numerored_empresa as enumred, expedientes.modelotel_empresa as modeltel, expedientes.marcatel_empresa as marcatel, expedientes.imei as eimei, expedientes.posee_laptop as eposee_laptop, expedientes.marca_laptop as emarca_laptop, expedientes.modelo_laptop as emodelo_laptop, expedientes.serie_laptop as eserie_laptop, expedientes.casa_propia as ecasa_propia, expedientes.ecivil as eecivil, expedientes.posee_retencion as eposee_retencion, expedientes.monto_mensual as emonto_mensual, expedientes.fecha_nacimiento as efecha_nacimiento, expedientes.fecha_inicioc as efecha_inicioc, expedientes.fecha_alta as efecha_alta, expedientes.salario_contrato as esalario_contrato, expedientes.salario_fechaalta as esalario_fechaalta, expedientes.observaciones as eobservaciones, expedientes.curp as ecurp, expedientes.nss as enss, expedientes.rfc as erfc, expedientes.tipo_identificacion as etipo_identificacion, expedientes.num_identificacion as enum_identificacion, expedientes.capacitacion as ecapacitacion, expedientes.fecha_enuniforme as efecha_enuniforme, expedientes.cantidad_polo as ecantidad_polo, expedientes.talla_polo as etalla_polo, expedientes.emergencia_nombre as eemergencia_nombre, expedientes.emergencia_parentesco as eemergencia_parentesco, expedientes.emergencia_telefono as eemergencia_telefono, expedientes.emergencia_nombre2 as eemergencia_nombre2, expedientes.emergencia_parentesco2 as eemergencia_parentesco2, expedientes.emergencia_telefono2 as eemergencia_telefono2, expedientes.resultado_antidoping as eresultado_antidoping, expedientes.tipo_sangre as etipo_sangre, expedientes.vacante as evacante, expedientes.fam_dentro_empresa as efam_dentro_empresa, expedientes.fam_nombre as efam_nombre, expedientes.banco_personal as ebanco_personal, expedientes.cuenta_personal as ecuenta_personal, expedientes.clabe_personal as eclabe_personal, expedientes.plastico_personal as eplastico_personal, expedientes.banco_nomina as ebanco_nomina, expedientes.cuenta_nomina as ecuenta_nomina, expedientes.clabe_nomina as eclabe_nomina, expedientes.plastico as eplastico, estatus_empleado.situacion_del_empleado as esituacion_del_empleado, estatus_empleado.estatus_del_empleado as eestatus_del_empleado, estatus_empleado.motivo as emotivo, estatus_empleado.fecha as eestatus_fecha from expedientes left join estatus_empleado on estatus_empleado.expedientes_id = expedientes.id where expedientes.id=:expedienteid");
        $row->bindParam("expedienteid", $id, PDO::PARAM_INT);
        $row->execute();
        $editar = $row->fetch(PDO::FETCH_OBJ);
        return $editar;
    }

    public static function Fetchtokenexpediente($id){
        $object = new connection_database();
        $row = $object->_db->prepare("SELECT expedientes.id as expid, expedientes.users_id as userid, expedientes.num_empleado as enum_empleado, expedientes.estudios as eestudios, expedientes.puesto as epuesto, expedientes.posee_correo as eposee_correo, expedientes.correo_adicional as ecorreo_adicional, expedientes.calle as ecalle, expedientes.num_interior as enum_interior, expedientes.num_exterior as enum_exterior, expedientes.colonia as ecolonia, expedientes.estado_id as eestado, expedientes.municipio_id as emunicipio, expedientes.codigo as ecodigo, expedientes.tel_dom as etel_dom, expedientes.posee_telmov as eposee_telmov, expedientes.tel_mov as etel_mov, expedientes.posee_telempresa as eposee_telempresa, expedientes.marcacion as emarcacion, expedientes.serie as eserie, expedientes.sim as esim, expedientes.numerored_empresa as enumred, expedientes.modelotel_empresa as modeltel, expedientes.marcatel_empresa as marcatel, expedientes.imei as eimei, expedientes.posee_laptop as eposee_laptop, expedientes.marca_laptop as emarca_laptop, expedientes.modelo_laptop as emodelo_laptop, expedientes.serie_laptop as eserie_laptop, expedientes.casa_propia as ecasa_propia, expedientes.ecivil as eecivil, expedientes.posee_retencion as eposee_retencion, expedientes.monto_mensual as emonto_mensual, expedientes.fecha_nacimiento as efecha_nacimiento, expedientes.fecha_inicioc as efecha_inicioc, expedientes.fecha_alta as efecha_alta, expedientes.salario_contrato as esalario_contrato, expedientes.salario_fechaalta as esalario_fechaalta, expedientes.observaciones as eobservaciones, expedientes.curp as ecurp, expedientes.nss as enss, expedientes.rfc as erfc, expedientes.tipo_identificacion as etipo_identificacion, expedientes.num_identificacion as enum_identificacion, expedientes.capacitacion as ecapacitacion, expedientes.fecha_enuniforme as efecha_enuniforme, expedientes.cantidad_polo as ecantidad_polo, expedientes.talla_polo as etalla_polo, expedientes.emergencia_nombre as eemergencia_nombre, expedientes.emergencia_parentesco as eemergencia_parentesco, expedientes.emergencia_telefono as eemergencia_telefono, expedientes.emergencia_nombre2 as eemergencia_nombre2, expedientes.emergencia_parentesco2 as eemergencia_parentesco2, expedientes.emergencia_telefono2 as eemergencia_telefono2, expedientes.resultado_antidoping as eresultado_antidoping, expedientes.tipo_sangre as etipo_sangre, expedientes.vacante as evacante, expedientes.fam_dentro_empresa as efam_dentro_empresa, expedientes.fam_nombre as efam_nombre, expedientes.banco_personal as ebanco_personal, expedientes.cuenta_personal as ecuenta_personal, expedientes.clabe_personal as eclabe_personal, expedientes.plastico_personal as eplastico_personal, expedientes.banco_nomina as ebanco_nomina, expedientes.cuenta_nomina as ecuenta_nomina, expedientes.clabe_nomina as eclabe_nomina, expedientes.plastico as eplastico, estatus_empleado.situacion_del_empleado as esituacion_del_empleado, estatus_empleado.estatus_del_empleado as eestatus_del_empleado, estatus_empleado.motivo as emotivo, estatus_empleado.fecha as eestatus_fecha from expedientes left join estatus_empleado on estatus_empleado.expedientes_id = expedientes.id where expedientes.id=:expedienteid");
        $row->bindParam("expedienteid", $id, PDO::PARAM_INT);
        $row->execute();
        $editar = $row->fetch(PDO::FETCH_OBJ);
        return $editar;
    }

    public static function Fetchverexpediente($id){
        $object = new connection_database();
        $row = $object->_db->prepare("SELECT expedientes.id as expid, expedientes.users_id as userid, expedientes.num_empleado as enum_empleado, expedientes.estudios as eestudios, expedientes.puesto as epuesto, expedientes.posee_correo as eposee_correo, expedientes.correo_adicional as ecorreo_adicional, expedientes.calle as ecalle, expedientes.num_interior as enum_interior, expedientes.num_exterior as enum_exterior, expedientes.colonia as ecolonia, expedientes.estado_id as eestado, expedientes.municipio_id as emunicipio, expedientes.codigo as ecodigo, expedientes.tel_dom as etel_dom, expedientes.posee_telmov as eposee_telmov, expedientes.tel_mov as etel_mov, expedientes.posee_telempresa as eposee_telempresa, expedientes.marcacion as emarcacion, expedientes.serie as eserie, expedientes.sim as esim, expedientes.numerored_empresa as enumred, expedientes.modelotel_empresa as modeltel, expedientes.marcatel_empresa as marcatel, expedientes.imei as eimei, expedientes.posee_laptop as eposee_laptop, expedientes.marca_laptop as emarca_laptop, expedientes.modelo_laptop as emodelo_laptop, expedientes.serie_laptop as eserie_laptop, expedientes.casa_propia as ecasa_propia, expedientes.ecivil as eecivil, expedientes.posee_retencion as eposee_retencion, expedientes.monto_mensual as emonto_mensual, expedientes.fecha_nacimiento as efecha_nacimiento, expedientes.fecha_inicioc as efecha_inicioc, expedientes.fecha_alta as efecha_alta, expedientes.salario_contrato as esalario_contrato, expedientes.salario_fechaalta as esalario_fechaalta, expedientes.observaciones as eobservaciones, expedientes.curp as ecurp, expedientes.nss as enss, expedientes.rfc as erfc, expedientes.tipo_identificacion as etipo_identificacion, expedientes.num_identificacion as enum_identificacion, expedientes.capacitacion as ecapacitacion, expedientes.fecha_enuniforme as efecha_enuniforme, expedientes.cantidad_polo as ecantidad_polo, expedientes.talla_polo as etalla_polo, expedientes.emergencia_nombre as eemergencia_nombre, expedientes.emergencia_parentesco as eemergencia_parentesco, expedientes.emergencia_telefono as eemergencia_telefono, expedientes.emergencia_nombre2 as eemergencia_nombre2, expedientes.emergencia_parentesco2 as eemergencia_parentesco2, expedientes.emergencia_telefono2 as eemergencia_telefono2, expedientes.resultado_antidoping as eresultado_antidoping, expedientes.tipo_sangre as etipo_sangre, expedientes.vacante as evacante, expedientes.fam_dentro_empresa as efam_dentro_empresa, expedientes.fam_nombre as efam_nombre, expedientes.banco_personal as ebanco_personal, expedientes.cuenta_personal as ecuenta_personal, expedientes.clabe_personal as eclabe_personal, expedientes.plastico_personal as eplastico_personal, expedientes.banco_nomina as ebanco_nomina, expedientes.cuenta_nomina as ecuenta_nomina, expedientes.clabe_nomina as eclabe_nomina, expedientes.plastico as eplastico, estatus_empleado.situacion_del_empleado as esituacion_del_empleado, estatus_empleado.estatus_del_empleado as eestatus_del_empleado, estatus_empleado.motivo as emotivo, estatus_empleado.fecha as eestatus_fecha from expedientes left join estatus_empleado on estatus_empleado.expedientes_id = expedientes.id where expedientes.id=:expedienteid");
        $row->bindParam("expedienteid", $id, PDO::PARAM_INT);
        $row->execute();
        $ver = $row->fetch(PDO::FETCH_OBJ);
        return $ver;
    }

    public static function Fetchownexpediente($id){
        $object = new connection_database();
        $row = $object->_db->prepare("SELECT expedientes.id as expid, expedientes.users_id as userid, expedientes.num_empleado as enum_empleado, expedientes.estudios as eestudios, expedientes.puesto as epuesto, expedientes.posee_correo as eposee_correo, expedientes.correo_adicional as ecorreo_adicional, expedientes.calle as ecalle, expedientes.num_interior as enum_interior, expedientes.num_exterior as enum_exterior, expedientes.colonia as ecolonia, expedientes.estado_id as eestado, expedientes.municipio_id as emunicipio, expedientes.codigo as ecodigo, expedientes.tel_dom as etel_dom, expedientes.posee_telmov as eposee_telmov, expedientes.tel_mov as etel_mov, expedientes.posee_telempresa as eposee_telempresa, expedientes.marcacion as emarcacion, expedientes.serie as eserie, expedientes.sim as esim, expedientes.numerored_empresa as enumred, expedientes.modelotel_empresa as modeltel, expedientes.marcatel_empresa as marcatel, expedientes.imei as eimei, expedientes.posee_laptop as eposee_laptop, expedientes.marca_laptop as emarca_laptop, expedientes.modelo_laptop as emodelo_laptop, expedientes.serie_laptop as eserie_laptop, expedientes.casa_propia as ecasa_propia, expedientes.ecivil as eecivil, expedientes.posee_retencion as eposee_retencion, expedientes.monto_mensual as emonto_mensual, expedientes.fecha_nacimiento as efecha_nacimiento, expedientes.fecha_inicioc as efecha_inicioc, expedientes.fecha_alta as efecha_alta, expedientes.salario_contrato as esalario_contrato, expedientes.salario_fechaalta as esalario_fechaalta, expedientes.observaciones as eobservaciones, expedientes.curp as ecurp, expedientes.nss as enss, expedientes.rfc as erfc, expedientes.tipo_identificacion as etipo_identificacion, expedientes.num_identificacion as enum_identificacion, expedientes.capacitacion as ecapacitacion, expedientes.fecha_enuniforme as efecha_enuniforme, expedientes.cantidad_polo as ecantidad_polo, expedientes.talla_polo as etalla_polo, expedientes.emergencia_nombre as eemergencia_nombre, expedientes.emergencia_parentesco as eemergencia_parentesco, expedientes.emergencia_telefono as eemergencia_telefono, expedientes.emergencia_nombre2 as eemergencia_nombre2, expedientes.emergencia_parentesco2 as eemergencia_parentesco2, expedientes.emergencia_telefono2 as eemergencia_telefono2, expedientes.resultado_antidoping as eresultado_antidoping, expedientes.tipo_sangre as etipo_sangre, expedientes.vacante as evacante, expedientes.fam_dentro_empresa as efam_dentro_empresa, expedientes.fam_nombre as efam_nombre, expedientes.banco_personal as ebanco_personal, expedientes.cuenta_personal as ecuenta_personal, expedientes.clabe_personal as eclabe_personal, expedientes.plastico_personal as eplastico_personal, expedientes.banco_nomina as ebanco_nomina, expedientes.cuenta_nomina as ecuenta_nomina, expedientes.clabe_nomina as eclabe_nomina, expedientes.plastico as eplastico from expedientes inner join usuarios on usuarios.id=expedientes.users_id where usuarios.id=:sessionid");
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

    public static function Editar_referenciaslab($id_expediente, $countreflab, $array, $ref){
        $crud = new crud();
        $numero  = count($ref);
        if($numero > $countreflab){
            try{
                for($i=0; $i<$numero; $i++){
                    $refnombre= $ref[$i]->nombre;
                    $refrelacion = $ref[$i]->relacion;
                    $reftelefono = $ref[$i]->telefono;
                    if($i < $countreflab){
                        $crud->update('ref_laborales', ['nombre' => $refnombre, 'telefono' => $reftelefono, 'relacion' => $refrelacion], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array[$i]["id"], 'expedienteid' => $id_expediente]);
                    }else{
                        $crud->store('ref_laborales', ['nombre' => $refnombre, 'telefono' => $reftelefono, 'relacion' => $refrelacion, 'expediente_id' => $id_expediente]);
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
                        $refrelacion = $ref[$i]->relacion;
                        $reftelefono = $ref[$i]->telefono;
                        $crud->update('ref_laborales', ['nombre' => $refnombre, 'telefono' => $reftelefono, 'relacion' => $refrelacion], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array[$i]["id"], 'expedienteid' => $id_expediente]);
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
                    $refrelacion = $ref[$i]->relacion;
                    $reftelefono = $ref[$i]->telefono;
                    $crud->update('ref_laborales', ['nombre' => $refnombre, 'telefono' => $reftelefono, 'relacion' => $refrelacion], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array[$i]["id"], 'expedienteid' => $id_expediente]);
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
                    $brefrelacion = $ref_banc[$i]->relacion;
                    $brefrfc = $ref_banc[$i]->rfc;
                    $brefcurp = $ref_banc[$i]->curp;
                    $brefporcentaje = $ref_banc[$i]->porcentaje;
                    if($i < $countrefbanc){
                        $crud->update('ref_bancarias', ['nombre' => $brefnombre, 'relacion' => $brefrelacion, 'rfc' => $brefrfc, 'curp' => $brefcurp, 'prcnt_derecho' => $brefporcentaje], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array2[$i]["id"], 'expedienteid' => $id_expediente]);
                    }else{
                        $crud->store('ref_bancarias', ['expediente_id' => $id_expediente, 'nombre' => $brefnombre, 'relacion' => $brefrelacion, 'rfc' => $brefrfc, 'curp' => $brefcurp, 'prcnt_derecho' => $brefporcentaje]);
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
                        $brefrelacion = $ref_banc[$i]->relacion;
                        $brefrfc = $ref_banc[$i]->rfc;
                        $brefcurp = $ref_banc[$i]->curp;
                        $brefporcentaje = $ref_banc[$i]->porcentaje;
                        $crud->update('ref_bancarias', ['nombre' => $brefnombre, 'relacion' => $brefrelacion, 'rfc' => $brefrfc, 'curp' => $brefcurp, 'prcnt_derecho' => $brefporcentaje], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array2[$i]["id"], 'expedienteid' => $id_expediente]);
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
                    $brefrelacion = $ref_banc[$i]->relacion;
                    $brefrfc = $ref_banc[$i]->rfc;
                    $brefcurp = $ref_banc[$i]->curp;
                    $brefporcentaje = $ref_banc[$i]->porcentaje;
                    $crud->update('ref_bancarias', ['nombre' => $brefnombre, 'relacion' => $brefrelacion, 'rfc' => $brefrfc, 'curp' => $brefcurp, 'prcnt_derecho' => $brefporcentaje], "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array2[$i]["id"], 'expedienteid' => $id_expediente]);
                }
            } catch (Exception $e) {
                    exit('Ocurrio un error al momento de grabar las referencias bancarias');   
            }
        }
    }

    public static function Asignar_token($id){
        $crud = new crud();
        $object = new connection_database();
        $token = bin2hex(random_bytes(16));
        date_default_timezone_set("America/Monterrey");
        $expFormat = mktime(date("H")+23, date("i"), date("s"), date("m") ,date("d"), date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $path = $protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
        $path = dirname($path);
        $links = $path. "/layouts/expediente_modo_edicion.php?token=$token";
        
        
        $crud -> store('token_expediente', ["expedientes_id" => $id, "token" => $token, "link" => $links, "exp_date" => $expDate]);
    }

    public static function Eliminar_Token($eliminar_token){
        $crud = new crud();
        $object = new connection_database();
        
        $crud->delete('token_expediente', 'token=:token', [':token' => $eliminar_token]);
    }

    public static function Insertar_expediente_token($token, $logged_user, $estudios, $posee_correo, $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, $casa_propia, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $capacitacion, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaparentesco, $emergenciatel, $emergencianom2, $emergenciaparentesco2, $emergenciatel2, $antidoping, $tipo_sangre, $vacante, $posee_familiar, $nomfam, $banco_personal, $cuenta_personal, $clabe_personal, $plastico_personal, $refbanc, $arraypapeleria){
        $crud = new crud();
        $object = new connection_database();
        $set_logged_user = $object -> _db -> prepare("SET @logged_user = :loggeduser");
        $set_logged_user -> execute(array(':loggeduser' => $logged_user));
		$retrieve_expediente_id = $object -> _db -> prepare("SELECT expedientes.id AS expedienteid FROM token_expediente INNER JOIN expedientes ON expedientes.id=token_expediente.expedientes_id WHERE token_expediente.token=:token");
		$retrieve_expediente_id -> execute(array(':token' => $token));
		$fetch_expediente_id = $retrieve_expediente_id -> fetch(PDO::FETCH_ASSOC);
		$id_expediente = $fetch_expediente_id["expedienteid"];
        //SE ACTUALIZA LA INFORMACIÓN DEL EXPEDIENTE
        $crud->update('expedientes', ['estudios' => $estudios, 'posee_correo' => $posee_correo, 'correo_adicional' => $correo_adicional, 'calle' => $calle, 'num_interior' => $ninterior, 'num_exterior' => $nexterior, 'colonia' => $colonia, 'estado_id' => $estado, 'municipio_id' => $municipio, 'codigo' => $codigo, 'tel_dom' => $teldom, 'posee_telmov' => $posee_telmov, 'tel_mov' => $telmov, 'casa_propia' => $casa_propia, 'ecivil' => $ecivil, 'posee_retencion' => $posee_retencion, 'monto_mensual' => $monto_mensual, 'fecha_nacimiento' => $fechanac, 'fecha_inicioc' => $fechacon, 'fecha_alta' => $fechaalta, 'curp' => $curp, 'nss' => $nss, 'rfc' => $rfc, 'tipo_identificacion' => $identificacion, 'num_identificacion' => $numeroidentificacion, 'capacitacion' => $capacitacion, 'fecha_enuniforme' => $fechauniforme, 'cantidad_polo' => $cantidadpolo, 'talla_polo' => $tallapolo, 'emergencia_nombre' => $emergencianom, 'emergencia_parentesco' => $emergenciaparentesco, 'emergencia_telefono' => $emergenciatel, 'emergencia_nombre2' => $emergencianom2, 'emergencia_parentesco2' => $emergenciaparentesco2, 'emergencia_telefono2' => $emergenciatel2, 'resultado_antidoping' => $antidoping, 'tipo_sangre' => $tipo_sangre, 'vacante' => $vacante, 'fam_dentro_empresa' => $posee_familiar, 'fam_nombre' => $nomfam, 'banco_personal' => $banco_personal, 'cuenta_personal' => $cuenta_personal, 'clabe_personal' => $clabe_personal, 'plastico_personal' => $plastico_personal], "id=:idexpediente", ['idexpediente' => $id_expediente]);	
        //SE ACTUALIZA LAS REFERENCIAS LABORALES
        $checkreflab = $object -> _db ->prepare("SELECT id FROM ref_laborales WHERE expediente_id=:expedienteid");
        $checkreflab -> execute(array(':expedienteid' => $id_expediente));
        $countreflab = $checkreflab -> rowCount();
        if($countreflab > 0){
            $array_ids = $checkreflab->fetchAll(PDO::FETCH_ASSOC);
            if(is_null($referencias)){
                $crud -> delete('ref_laborales', 'expediente_id=:idexpediente', ['idexpediente' => $id_expediente]);
            }else{
                $jsonData = stripslashes(html_entity_decode($referencias));
                $ref = json_decode($jsonData);
                Expedientes::Editar_referenciaslab($id_expediente, $countreflab, $array_ids, $ref);
            }
        }else{
            if(!(is_null($referencias))){
                $jsonData = stripslashes(html_entity_decode($referencias));
                $ref = json_decode($jsonData);
                Expedientes::Crear_referenciaslab($id_expediente, $ref);
            }
        }
        //SE ACTUALIZA LAS REFERENCIAS BANCARIAS
        $checkrefbanc = $object -> _db ->prepare("SELECT id FROM ref_bancarias WHERE expediente_id=:expedienteid");
        $checkrefbanc -> execute(array(':expedienteid' => $id_expediente));
        $countrefbanc = $checkrefbanc -> rowCount();
        if($countrefbanc > 0){
            $array_ids = $checkrefbanc->fetchAll(PDO::FETCH_ASSOC);
            if(is_null($refbanc)){
                $crud -> delete('ref_bancarias', 'expediente_id=:idexpediente', ['idexpediente' => $id_expediente]);
            }else{
                $jsonData2 = stripslashes(html_entity_decode($refbanc));
                $ref_banc = json_decode($jsonData2);
                Expedientes::Editar_referenciasbanc($id_expediente, $countrefbanc, $array_ids, $ref_banc);
            }
        }else{
            if(!(is_null($refbanc))){
                $jsonData2 = stripslashes(html_entity_decode($refbanc));
                $ref_banc = json_decode($jsonData2);
                Expedientes::Crear_referenciasbanc($id_expediente, $ref_banc);
            }
        }
        //PAPELERÍA
		$checktipospapeleria = $object -> _db -> prepare("SELECT * FROM tipo_papeleria WHERE tipo_papeleria.nombre NOT IN('CONTRATO DEFINITIVO', 'ALTA DE IMSS', 'CONTRATO NOMINA BANCARIA', 'CONTRATO DE PRUEBA', 'CONTRATO INTERNO', 'CONTRATO SUPERVIVENCIA', 'MODIFICACION SALARIAL', 'REGLAMENTO INTERIOR DEL TRABAJO', 'CARTA RESPONSIVA DE EQUIPOS ASIGNADOS', 'BAJA ANTE IMSS', 'EVALUACION PSICOMETRICA', 'CARTA DE SEGUNDO TRABAJO', 'ACTA DE MATRIMONIO')");
        $checktipospapeleria -> execute();
        $counttipospapeleria = $checktipospapeleria -> rowCount();
		$papeleria_contador = 0;
		while($fetch_papeleria = $checktipospapeleria -> fetch(PDO::FETCH_ASSOC)){
			$selectarchivo = $object -> _db -> prepare("SELECT tipo_archivo, nombre_archivo, identificador, fecha_subida FROM papeleria_empleado INNER JOIN expedientes ON expedientes.id=papeleria_empleado.expediente_id INNER JOIN token_expediente ON token_expediente.expedientes_id=expedientes.id WHERE tipo_archivo=:tipo AND token_expediente.token=:token");
            $selectarchivo -> execute(array(':tipo' => $fetch_papeleria["id"], ':token' => $token));
            $fetch_row_archivo = $selectarchivo -> fetch(PDO::FETCH_OBJ);
			//Cuando existe el archivo y se sube algo
            if(isset($fetch_row_archivo -> nombre_archivo) && isset($fetch_row_archivo -> identificador) && isset($arraypapeleria[$papeleria_contador]) && isset($arraypapeleria[$papeleria_contador]["name"])){
                $directory = "../src/documents/";
                $path = "../src/documents/".$fetch_row_archivo -> identificador;
                $ext = pathinfo($arraypapeleria[$papeleria_contador]["name"], PATHINFO_EXTENSION);
                $uploadfile = Expedientes::tempnam_sfx($directory, $ext);
                date_default_timezone_set("America/Monterrey");
				$date = date('Y-m-d H:i:s');
                if(move_uploaded_file($arraypapeleria[$papeleria_contador]['tmp_name'],$uploadfile)){
                    $crud->update('papeleria_empleado', ['nombre_archivo' => $arraypapeleria[$papeleria_contador]["name"],
                    'identificador' => basename($uploadfile), 'fecha_subida' => $date], "tipo_archivo=:tipo AND expediente_id=:idexpediente", [":tipo" => $fetch_papeleria["id"], 'idexpediente' => $id_expediente]);
					if(file_exists($path)){
						$crud->store('historial_papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $fetch_papeleria["id"], 'viejo_nombre_archivo' => $fetch_row_archivo -> nombre_archivo, 'viejo_identificador' => $fetch_row_archivo -> identificador, 'vieja_fecha_subida' => $fetch_row_archivo -> fecha_subida]);
					}
                }
            //cuando no existe el archivo y se sube algo
            }else if(!isset($fetch_row_archivo -> nombre_archivo) && !isset($fetch_row_archivo -> identificador) && isset($arraypapeleria[$papeleria_contador]) && isset($arraypapeleria[$papeleria_contador]["name"])){
                $directory = "../src/documents/";
                $ext = pathinfo($arraypapeleria[$papeleria_contador]["name"], PATHINFO_EXTENSION);
                $uploadfile = Expedientes::tempnam_sfx($directory, $ext);
                date_default_timezone_set("America/Monterrey");
				$date = date('Y-m-d H:i:s');
                if(move_uploaded_file($arraypapeleria[$papeleria_contador]['tmp_name'],$uploadfile)){
                    $crud->store('papeleria_empleado', ['expediente_id' => $id_expediente, 'tipo_archivo' => $fetch_papeleria["id"], 'nombre_archivo' => $arraypapeleria[$papeleria_contador]["name"],
                    'identificador' => basename($uploadfile), 'fecha_subida' => $date]);
                }
            }
			
			$papeleria_contador++;
		}
		//ELIMINAR EL TOKEN
        $crud -> delete('token_expediente', 'token=:token', ['token' => $token]);
    }
}
?>