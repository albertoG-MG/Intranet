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
        /**
         * ? Clase gateway para insertar, editar y eliminar en la base de datos
        */
        $crud = new crud();
        /**
         * ? Conexión
        */
        $object = new connection_database();
        /**
         * ? Checa si el expediente ya existe o no
        */
        $check_table_DG = $crud->readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $this->select2]);
        /**
         * ? Si los datos existen, actualiza, si no existe, inserta
        */
        if($check_table_DG['count'] > 0){
            /**
             * ? Recuperar información almacenada de la base de datos y traerla de vuelta a la aplicación para su procesamiento; en este caso, como solo nos trae una fila, 
             * ? debemos acceder a él utilizando [0]
            */
            $results_table_DG = $check_table_DG['data'][0];
            /**
             * ? Actualiza la tabla, el primer dato que te pide es el nombre de la tabla, los campos a actualizar, la condición y el valor de la condición
            */
            $crud->update('expedientes', ['num_empleado' => $this->num_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion], "id=:idexpediente", [':idexpediente' => $fetch_results_DG['id']]);
        }else{
            /**
             * ? Crea un registro en la base de datos, los datos que te pide son el nombre de la tabla y los campos a almacenar
            */
            $crud->store('expedientes', ['users_id' => $this->select2, 'num_empleado' => $this->num_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion]);
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
        /**
         * ? Clase gateway para insertar, editar y eliminar en la base de datos
        */
        $crud = new crud();
        /**
         * ? Conexión
        */
        $object = new connection_database();
        /**
         * ? Checa si el expediente ya existe o no
        */
        $check_table_DA = $crud->readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $this->select2]);
        /**
         * ? Si los datos existen, actualiza, si no existe, inserta
        */
        if($check_table_DA['count'] > 0){
            /**
             * ? Recuperar información almacenada de la base de datos y traerla de vuelta a la aplicación para su procesamiento; en este caso, como solo nos trae una fila, 
             * ? debemos acceder a él utilizando [0]
            */
            $results_table_DA = $check_table_DA['data'][0];
            /**
             * ? Actualiza la tabla, el primer dato que te pide es el nombre de la tabla, los campos a actualizar, la condición y el valor de la condición
            */
            $crud->update('expedientes', ['fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 
            'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono,
            'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 
            'emergencia_telefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante,
            'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam], "id=:idexpediente", ['idexpediente' => $results_table_DA['id']]);
            /**
             * ? Debido a que el ID del expediente ya lo tenemos en el fetch, no es necesario usar el lastInsertId para obtener el ID
             * ? En esta parte debemos actualizar las referencias laborales, tanto si agregó nuevas, si quitó algunas ó si modificó el valor de los campos
             * ? Checa si hay referencias laborales insertadas en la base de datos
            */
            $checkreflab = $crud->readWithCount('ref_laborales', '*', 'WHERE expediente_id=:expedienteid', [':expedienteid' => $results_table_DA['id']]);

            /**
             * ? Si hay referencias laborales en la base de datos, creamos un nuevo metodo para actualizar los campos, el numero de referencias laborales tanto si el usuario agregó nuevas ó quitó referencias
             * ? laborales
            */
            if($checkreflab['count'] > 0){
                /**
                 * ? Si el usuario modificó los valores de la referencias pero no agregó más referencias ni quitó referencias, el arreglo de ID nos facilita hacer tracking de los cambios
                */
                $results_checkreflab = $checkreflab['data'];
                $array_ids = array();

                /**
                 * ? Las referencias laborales pueden ser 1 ó más, como no existe el fetchAll en el gateway class; debemos iterar sobre $results_checkreflab e insertarla en el arreglo $array_ids
                */
                foreach ($results_checkreflab as $fila_checkreflab) {
                    $array_ids[] = $fila_checkreflab['id'];
                }
                /**
                 * ? Si hay registro de referencias laborales pero la variable referencias está vacía, eso signfica que el usuario eliminó todas las referencias laborales
                */
                if(is_null($this->referencias)){
                    $crud -> delete('ref_laborales', 'expediente_id=:idexpediente', ['idexpediente' => $results_table_DA['id']]);
                }else{
                    /**
                     * ? Si el usuario modificó el valor de las variables, agregó o quitó referencias significa que tenemos que actualizar las referencias
                    */
                    /**
                     * ? Sirve para eliminar las barras invertidas (\) que pueden estar presentes en una cadena. Esto pasa por seguridad cuando mandas por lo general un json y te escapa las comillas presentes usando barras invertidas.
                    */
                    $jsonData = stripslashes(html_entity_decode($this->referencias));
                    /**
                     * ? Decodificamos el json
                    */
                    $ref = json_decode($jsonData);
                    /**
                     * ? Enviamos al metodo el id del expediente, el total de referencias laborales, el arreglo de ids y el json de las referencias laborales
                    */
                    expedientes::Editar_reflaborales($results_table_DA['id'], $checkreflab['count'], $array_ids, $ref);
                }
            }else{
                /**
                 * ? Si no hay referencias laborales registradas y el usuario no envío nada, entonces no hagas nada
                */
                if(!(is_null($this->referencias))){
                    /**
                     * ? Sirve para eliminar las barras invertidas (\) que pueden estar presentes en una cadena. Esto pasa por seguridad cuando mandas por lo general un json y te escapa las comillas presentes usando barras invertidas.
                    */
                    $jsonData = stripslashes(html_entity_decode($this->referencias));
                    /**
                     * ? Decodificamos el json
                    */
                    $ref = json_decode($jsonData);
                    /**
                     * ? Enviamos al metodo el id del expediente y el json de las referencias laborales
                    */
                    expedientes::Crear_reflaborales($results_table_DA['id'], $ref);
                }
            }
        }else{
            /**
             * ? Crea un registro en la base de datos, los datos que te pide son el nombre de la tabla y los campos a almacenar
            */
            $crud->store('expedientes', ['users_id' => $this->select2, 'fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 
            'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono,
            'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 
            'emergencia_telefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante,
            'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam]);
            /**
             * ? Obtiene el último id insertado
            */
            $id_expediente = $object -> _db -> lastInsertId();
            /**
             * ? Checa si el usuario insertó referencias laborales
            */
            if(!(is_null($this->referencias))){
                /**
                 * ? Sirve para eliminar las barras invertidas (\) que pueden estar presentes en una cadena. Esto pasa por seguridad cuando mandas por lo general un json y te escapa las comillas presentes usando barras invertidas.
                */
                $jsonData = stripslashes(html_entity_decode($this->referencias));
                /**
                 * ? Decodificamos el json
                */
                $ref = json_decode($jsonData);
                /**
                 * ? Enviamos al metodo el id del expediente y el json de las referencias laborales
                */
                expedientes::Crear_reflaborales($id_expediente, $ref);
            }
        }
    }

    /**
	 * *	====================================================
	 * *	Metodo encargado de crear las referencias laborales
	 * *    ====================================================
	*/
    public static function Crear_reflaborales($id_expediente, $ref){
        /**
         * ? Clase gateway para insertar, editar y eliminar en la base de datos
        */
        $refcrud = new crud();

        /**
         * ? Se define un arreglo llamado $columnas que se utiliza para mantener un seguimiento de las columnas de la tabla ref_laborales. El arreglo se inicializa con valores 'NULL' para todas las 
         * ? columnas de referencias laborales (nombre1, apellido_pat1, nombre2, etc.)
        */
        $columnas = array(
            'nombre1' => 'NULL',
            'apellido_pat1' => 'NULL',
            'apellido_mat1' => 'NULL',
            'relacion1' => 'NULL',
            'telefono1' => 'NULL',
            'nombre2' => 'NULL',
            'apellido_pat2' => 'NULL',
            'apellido_mat2' => 'NULL',
            'relacion2' => 'NULL',
            'telefono2' => 'NULL',
            'nombre3' => 'NULL',
            'apellido_pat3' => 'NULL',
            'apellido_mat3' => 'NULL',
            'relacion3' => 'NULL',
            'telefono3' => 'NULL'
        );

        /**
         * ? A continuación, se itera sobre el arreglo $ref, que contiene la información de las referencias laborales enviadas. Para cada referencia, se actualiza el arreglo $columnas con los valores 
         * ? proporcionados en $referencia. Esto garantiza que las columnas relevantes se llenen con la información correcta de las referencias
        */

        foreach ($ref as $indice => $referencia) {
            $columnas["nombre$indice"] = "'" . $referencia->nombre . "'";
            $columnas["apellido_pat$indice"] = "'" . $referencia->apellidopat . "'";
            $columnas["apellido_mat$indice"] = "'" . $referencia->apellidomat . "'";
            $columnas["relacion$indice"] = "'" . $referencia->relacion . "'";
            $columnas["telefono$indice"] = "'" . $referencia->telefono . "'";
        }

        /**
         * ? Luego, se construye una consulta SQL para insertar los datos en la tabla ref_laborales. El SQL se construye de la siguiente manera:
         * ? Se establece la parte fija de la consulta con "INSERT INTO ref_laborales"
         * ? Se agregan los nombres de las columnas al SQL utilizando implode(', ', array_keys($columnas)). Esto generará una cadena que representa las columnas en la base de datos
         * ? Se agrega la parte de los valores con "VALUES ($id_expediente, "
         * ? Se agregan los valores correspondientes a cada columna desde el arreglo $columnas utilizando implode(', ', $columnas). Esto generará una cadena que representa los valores que se insertarán en la base de datos
         * ? Se cierra la consulta SQL con ")"
        */

        $sql = "INSERT INTO ref_laborales (expediente_id, ";
        $sql .= implode(', ', array_keys($columnas)); // Columnas
        $sql .= ") VALUES ($id_expediente, ";
        $sql .= implode(', ', $columnas); // Valores
        $sql .= ")";
    }

    /**
	 * *	=====================================================
	 * *	Metodo encargado de editar las referencias laborales
	 * *    =====================================================
	*/
    public static function Editar_reflaborales($id_expediente, $countreflab, $array, $ref) {
        $crud = new crud();
        
        /**
         * ? Itera sobre las referencias enviadas
        */
        foreach ($ref as $i => $referencia) {
            /**
             * ? Para cada referencia, crea un arreglo $columnas que contendrá los valores de las columnas de la tabla ref_laborales para esa referencia en particular
            */
            $columnas = [];
            $columnPrefix = $i + 1;
    
            $ref_nombre = $referencia->nombre;
            $ref_apellidopat = $referencia->apellidopat;
            $ref_apellidomat = $referencia->apellidomat;
            $ref_relacion = $referencia->relacion;
            $ref_telefono = $referencia->telefono;
    
            $columnas["nombre$columnPrefix"] = $ref_nombre;
            $columnas["apellido_pat$columnPrefix"] = $ref_apellidopat;
            $columnas["apellido_mat$columnPrefix"] = $ref_apellidomat;
            $columnas["relacion$columnPrefix"] = $ref_relacion;
            $columnas["telefono$columnPrefix"] = $ref_telefono;
    
            if ($i < $countreflab) {
                /**
                 * ? Verifica si el índice actual ($i) es menor que la cantidad de referencias existentes ($countreflab) en la base de datos. Si es menor, actualiza la referencia en la base de datos 
                 * ? utilizando la función update.
                */
                $crud->update('ref_laborales', $columnas, "id=:idreferencia AND expediente_id=:expedienteid", ['idreferencia' => $array[$i]["id"], 'expedienteid' => $id_expediente]);
            } else {
                /**
                 * ? Si el índice es mayor que la cantidad de referencias existentes, significa que es una nueva referencia y se inserta en la base de datos utilizando la función store
                */
                $columnas['expediente_id'] = $id_expediente;
                $crud->store('ref_laborales', $columnas);
            }
        }
    
        /**
         * ? Luego, se verifica si hay referencias en la base de datos que no se enviaron en $ref, y se eliminan utilizando la función delete
        */
        foreach (array_slice($array, count($ref)) as $referenciaEliminar) {
            $crud->delete('ref_laborales', 'id=:idreferencia AND expediente_id=:expedienteid', ['idreferencia' => $referenciaEliminar["id"], 'expedienteid' => $id_expediente]);
        }
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
        /**
         * ? Clase gateway para insertar, editar y eliminar en la base de datos
        */
        $crud = new crud();
        /**
         * ? Conexión
        */
        $object = new connection_database();
        /**
         * ? Checa si el expediente ya existe o no
        */
        $check_table_DB = $crud->readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $this->select2]);
        /**
         * ? Si los datos existen, actualiza, si no existe, inserta
        */
        if($check_table_DB['count'] > 0){
            /**
             * ? Recuperar información almacenada de la base de datos y traerla de vuelta a la aplicación para su procesamiento, como solo trae 1 fila, tenemos que acceder a él usando [0]
            */
            $results_table_DB = $check_table_DB['data'][0];
            /**
             * ? Actualiza la tabla, el primer dato que te pide es el nombre de la tabla, los campos a actualizar, la condición y el valor de la condición
            */
            $crud->update('expedientes', ['banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 
            'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 
            'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico], "id=:idexpediente", ['idexpediente' => $results_table_DB['id']]);
            /**
             * ? Debido a que el ID del expediente ya lo tenemos en el fetch, no es necesario usar el lastInsertId para obtener el ID
             * ? En esta parte debemos actualizar los beneficiarios bancarios, tanto si agregó nuevas, si quitó algunas ó si modificó el valor de los campos
             * ? Checa si hay beneficiarios bancarios en insertados en la base de datos
            */
            $checkbenban = $crud->readWithCount('ben_bancarios', '*', 'WHERE expediente_id=:expedienteid', [':expedienteid' => $results_table_DB['id']]);

            /**
             * ? Si hay beneficiarios bancarios en la base de datos, creamos un nuevo metodo para actualizar los campos, el numero de beneficiarios bancarios tanto si el usuario agregó nuevas ó 
             * ? quitó beneficiarios bancarios
            */
            if($checkbenban['count'] > 0){
                /**
                 * ? Si el usuario modificó los valores de los beneficiarios pero no agregó más ni quitó, el arreglo de ID nos facilita hacer tracking de los cambios
                */
                $results_checkbenban = $checkbenban['data'];
                $array_ids = array();

                /**
                 * ? Los beneficiarios bancarios pueden ser 1 ó más, como no existe el fetchAll en el gateway class; debemos iterar sobre $results_checkreflab e insertarla en el arreglo $array_ids
                */
                foreach ($results_checkbenban as $fila_checkrefban) {
                    $array_ids[] = $fila_checkrefban['id'];
                }

                /**
                 * ? Si hay registro de beneficiarios bancarios pero la variable refbanc está vacía, eso signfica que el usuario eliminó todas los beneficiarios bancarios
                */
                if(is_null($this->refbanc)){
                    $crud -> delete('ben_bancarios', 'expediente_id=:idexpediente', ['idexpediente' => $results_checkbenban['id']]);
                }else{
                    /**
                     * ? Si el usuario modificó el valor de las variables, agregó o quitó beneficiarios significa que tenemos que actualizar los beneficiarios
                    */
                    /**
                     * ? Sirve para eliminar las barras invertidas (\) que pueden estar presentes en una cadena. Esto pasa por seguridad cuando mandas por lo general un json y te escapa las comillas presentes usando barras invertidas.
                    */
                    $jsonData2 = stripslashes(html_entity_decode($this->refbanc));
                    /**
                     * ? Decodificamos el json
                    */
                    $ref_banc = json_decode($jsonData2);
                    /**
                     * ? Enviamos al metodo el id del expediente, el total de beneficiarios bancarios, el arreglo de ids y el json de los beneficiarios bancarios
                    */
                    expedientes::Editar_benbanc($results_checkbenban['id'], $checkbenban['count'], $array_ids, $ref_banc);
                }
            }else{
                /**
                 * ? Si no hay beneficiarios bancarios registrados y el usuario no envío nada, entonces no hagas nada
                */
                if(!(is_null($this->refbanc))){
                    /**
                     * ? Sirve para eliminar las barras invertidas (\) que pueden estar presentes en una cadena. Esto pasa por seguridad cuando mandas por lo general un json y te escapa las comillas presentes usando barras invertidas.
                    */
                    $jsonData2 = stripslashes(html_entity_decode($this->refbanc));
                    /**
                     * ? Decodificamos el json
                    */
                    $ref_banc = json_decode($jsonData2);
                    /**
                     * ? Enviamos al metodo el id del expediente y el json de los beneficiarios bancarios
                    */
                    expedientes::Crear_benbanc($results_checkbenban['id'], $ref_banc);
                }
            }
        }else{
            /**
             * ? Crea un registro en la base de datos, los datos que te pide son el nombre de la tabla y los campos a almacenar
            */
            $crud->store('expedientes', ['users_id' => $this->select2, 'banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 
            'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 
            'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico]);
            /**
             * ? Obtiene el último id insertado
            */
            $id_expediente = $object -> _db -> lastInsertId();
            /**
             * ? Checa si el usuario insertó beneficiarios bancarios
            */
            if(!(is_null($this->refbanc))){
                /**
                 * ? Sirve para eliminar las barras invertidas (\) que pueden estar presentes en una cadena. Esto pasa por seguridad cuando mandas por lo general un json y te escapa las comillas presentes usando barras invertidas.
                */
                $jsonData2 = stripslashes(html_entity_decode($this->refbanc));
                /**
                 * ? Decodificamos el json
                */
                $ref_banc = json_decode($jsonData2);
                /**
                 * ? Enviamos al metodo el id del expediente y el json de los beneficiarios bancarios
                */
                expedientes::Crear_benbanc($id_expediente, $ref_banc);
            }
        }
    }

    /**
	 * *	========================================================
	 * *	Metodo encargado de guardar los beneficiarios bancarios
	 * *    ========================================================
	*/
    public static function Crear_benbanc($id_expediente, $ref_banc){
        /**
         * ? Clase gateway para insertar, editar y eliminar en la base de datos
        */
        $refbanc_crud = new crud();
        /**
         * ? Se define un arreglo llamado $columnas que se utiliza para mantener un seguimiento de las columnas de la tabla ben_bancarios. El arreglo se inicializa con valores 'NULL' para todas las 
         * ? columnas de beneficiarios bancarios (nombre1, apellido_pat1, nombre2, etc.)
        */
        $columnas = array(
            'nombre1' => 'NULL',
            'apellido_pat1' => 'NULL',
            'apellido_mat1' => 'NULL',
            'relacion1' => 'NULL',
            'rfc1' => 'NULL',
            'curp1' => 'NULL',
            'porcentaje1' => 'NULL',
            'nombre2' => 'NULL',
            'apellido_pat2' => 'NULL',
            'apellido_mat2' => 'NULL',
            'relacion2' => 'NULL',
            'rfc2' => 'NULL',
            'curp2' => 'NULL',
            'porcentaje2' => 'NULL'
        );

        /**
         * ? A continuación, se itera sobre el arreglo $ref_banc, que contiene la información de los beneficiarios bancarios enviados. Para cada beneficiario, se actualiza el arreglo $columnas con los valores 
         * ? proporcionados en $beneficiario. Esto garantiza que las columnas relevantes se llenen con la información correcta de los beneficiarios
        */

        foreach ($ref_banc as $indice => $beneficiario) {
            $columnas["nombre$indice"] = "'" . $beneficiario->nombre . "'";
            $columnas["apellido_pat$indice"] = "'" . $beneficiario->apellidopat . "'";
            $columnas["apellido_mat$indice"] = "'" . $beneficiario->apellidomat . "'";
            $columnas["relacion$indice"] = "'" . $beneficiario->relacion . "'";
            $columnas["rfc$indice"] = "'" . $beneficiario->rfc . "'";
            $columnas["curp$indice"] = "'" . $beneficiario->curp . "'";
            $columnas["porcentaje$indice"] = "'" . $beneficiario->porcentaje . "'";
        }

        /**
         * ? Luego, se construye una consulta SQL para insertar los datos en la tabla ben_bancarios. El SQL se construye de la siguiente manera:
         * ? Se establece la parte fija de la consulta con "INSERT INTO ben_bancarios"
         * ? Se agregan los nombres de las columnas al SQL utilizando implode(', ', array_keys($columnas)). Esto generará una cadena que representa las columnas en la base de datos
         * ? Se agrega la parte de los valores con "VALUES ($id_expediente, "
         * ? Se agregan los valores correspondientes a cada columna desde el arreglo $columnas utilizando implode(', ', $columnas). Esto generará una cadena que representa los valores que se insertarán en la base de datos
         * ? Se cierra la consulta SQL con ")"
        */

        $sql = "INSERT INTO ben_bancarios (expediente_id, ";
        $sql .= implode(', ', array_keys($columnas)); // Columnas
        $sql .= ") VALUES ($id_expediente, ";
        $sql .= implode(', ', $columnas); // Valores
        $sql .= ")";        
    }

    /**
	 * *	=======================================================
	 * *	Metodo encargado de editar los beneficiarios bancarios
	 * *    =======================================================
	*/
    public static function Editar_benbanc($id_expediente, $countbenban, $array, $ref_banc) {
        /**
         * ? Clase gateway para insertar, editar y eliminar en la base de datos
        */
        $crud = new crud();
        /**
         * ? Itera sobre los beneficiarios enviados
        */
        foreach ($ref_banc as $i => $beneficiario) {
            /**
             * ? Para cada referencia, crea un arreglo $columnas que contendrá los valores de las columnas de la tabla ben_bancarios para ese beneficiario en particular
            */
            $columnas = [];
            $columnPrefix = $i + 1;
    
            $ref_nombre = $beneficiario->nombre;
            $ref_apellidopat = $beneficiario->apellidopat;
            $ref_apellidomat = $beneficiario->apellidomat;
            $ref_relacion = $beneficiario->relacion;
            $ref_rfc = $beneficiario->rfc;
            $ref_curp = $beneficiario->curp;
            $ref_porcentaje = $beneficiario->porcentaje;
    
            $columnas["nombre$columnPrefix"] = $ref_nombre;
            $columnas["apellido_pat$columnPrefix"] = $ref_apellidopat;
            $columnas["apellido_mat$columnPrefix"] = $ref_apellidomat;
            $columnas["relacion$columnPrefix"] = $ref_relacion;
            $columnas["rfc$columnPrefix"] = $ref_rfc;
            $columnas["curp$columnPrefix"] = $ref_curp;
            $columnas["porcentaje$columnPrefix"] = $ref_porcentaje;
    
            if ($i < $countbenban) {
                /**
                 * ? Verifica si el índice actual ($i) es menor que la cantidad de beneficiarios existentes ($countbenban) en la base de datos. Si es menor, actualiza el benficiario en la base de datos 
                 * ? utilizando la función update.
                */
                $crud->update('ben_bancarios', $columnas, "id=:idbeneficiario AND expediente_id=:expedienteid", ['idbeneficiario' => $array[$i]["id"], 'expedienteid' => $id_expediente]);
            } else {
                /**
                 * ? Si el índice es mayor que la cantidad de beneficiarios existentes, significa que es una nuevo beneficiario y se inserta en la base de datos utilizando la función store
                */
                $columnas['expediente_id'] = $id_expediente;
                $crud->store('ben_bancarios', $columnas);
            }
        }
    
        /**
         * ? Luego, se verifica si hay beneficiarios en la base de datos que no se enviaron en $ref_banc, y se eliminan utilizando la función delete
        */
        foreach (array_slice($array, count($ref_banc)) as $beneficiarioEliminar) {
            $crud->delete('ben_bancarios', 'id=:idbeneficiario AND expediente_id=:expedienteid', ['idbeneficiario' => $beneficiarioEliminar["id"], 'expedienteid' => $id_expediente]);
        }
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
        /**
         * ? Clase gateway para insertar, editar y eliminar en la base de datos
        */
        $crud = new crud();
        /**
         * ? Conexión
        */
        $object = new connection_database();
        /**
         * ? SET_LOGGED_USER es utilizado para tener un historial de quién hace cambios en los expedientes, obtiene el nombre de la persona que está creando el expediente
        */
        $set_logged_user = $object -> _db -> prepare("SET @logged_user = :loggeduser");
        $set_logged_user -> execute(array(':loggeduser' => $logged_user));
        /**
         * ? Primero checar si el usuario tiene un expediente ya guardado
        */
        $check_expediente = $crud->readWithCount('expedientes', '*', 'WHERE users_id=:userid', [':userid' => $this->select2]);
        
        if($check_expediente['count'] > 0){
            /**
             * ? Como solo nos trae una fila el $check_expediente hay que acceder a él usando [0]
            */
            $results_expediente = $check_expediente['data'][0];
            /**
             * ? Actualizamos el expediente
            */
            $crud->update('expedientes', ['users_id' => $this->select2, 'num_empleado' => $this->num_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion, 'fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono, 'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 'emergencia_telefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante, 'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam, 'banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico], "id=:expedienteid", [':expedienteid' => $results_expediente["id"]]);
        
            /**
                * ? Referencias laborales
            */

            $checkreflab = $crud->readWithCount('ref_laborales', '*', 'WHERE expediente_id=:expedienteid', [':expedienteid' => $results_expediente['id']]);

            if($checkreflab['count'] > 0){
                /**
                 * ? Si el usuario modificó los valores de las referencias pero no agregó más ni quitó, el arreglo de ID nos facilita hacer tracking de los cambios
                */
                $results_checkreflab = $checkreflab['data'];
                $array_ids = array();

                /**
                 * ? Las referencias laborales pueden ser 1 ó más, como no existe el fetchAll en el gateway class; debemos iterar sobre $results_checkreflab e insertarla en el arreglo $array_ids
                */
                foreach ($results_checkreflab as $fila_checkreflab) {
                    $array_ids[] = $fila_checkreflab['id'];
                }

                /**
                 * ? Si hay registro de referencias laborales pero la variable referencias está vacía, eso signfica que el usuario eliminó todas las referencias laborales
                */
                if(is_null($this->referencias)){
                    $crud -> delete('ref_laborales', 'expediente_id=:idexpediente', ['idexpediente' => $results_checkreflab['id']]);
                }else{
                    /**
                     * ? Sirve para eliminar las barras invertidas (\) que pueden estar presentes en una cadena. Esto pasa por seguridad cuando mandas por lo general un json y te escapa las comillas presentes usando barras invertidas.
                    */
                    $jsonData = stripslashes(html_entity_decode($this->referencias));
                    /**
                     * ? Decodificamos el json
                    */
                    $ref = json_decode($jsonData);
                    /**
                     * ? Llamamos al método correspondiente enviando el id, las filas de las referencias laborales en la base de datos, el arreglo de ids y el json de las referencias
                    */
                    expedientes::Editar_reflaborales($results_checkreflab['id'], $checkreflab['count'], $array_ids, $ref);
                }
            }else{

                if(!(is_null($this->referencias))){
                    /**
                     * ? Sirve para eliminar las barras invertidas (\) que pueden estar presentes en una cadena. Esto pasa por seguridad cuando mandas por lo general un json y te escapa las comillas presentes usando barras invertidas.
                    */
                    $jsonData = stripslashes(html_entity_decode($this->referencias));
                    /**
                     * ? Decodificamos el json
                    */
                    $ref = json_decode($jsonData);
                    /**
                     * ? Enviamos al metodo el id del expediente y el json de las referencias laborales
                    */
                    expedientes::Crear_reflaborales($results_checkreflab['id'], $ref);
                }
            }

            /**
             * ? Referencias bancarias
            */

            $checkbenban = $crud->readWithCount('ben_bancarios', '*', 'WHERE expediente_id=:expedienteid', [':expedienteid' => $results_expediente['id']]);

            if($checkbenban['count'] > 0){
                /**
                 * ? Si el usuario modificó los valores de los beneficiarios pero no agregó más ni quitó, el arreglo de ID nos facilita hacer tracking de los cambios
                */
                $results_checkbenban = $checkbenban['data'];
                $array_banc_ids = array();

                /**
                 * ? Los beneficiarios bancarios pueden ser 1 ó más, como no existe el fetchAll en el gateway class; debemos iterar sobre $results_checkbenban e insertarla en el arreglo $array_ids
                */
                foreach ($results_checkbenban as $fila_checkbenban) {
                    $array_banc_ids[] = $fila_checkbenban['id'];
                }

                /**
                 * ? Si hay registro de beneficiarios bancarios pero la variable beneficiarios está vacía, eso signfica que el usuario eliminó todas los beneficiarios bancarios
                */
                if(is_null($this->refbanc)){
                    $crud -> delete('ben_bancarios', 'expediente_id=:idexpediente', ['idexpediente' => $results_checkbenban['id']]);
                }else{
                    /**
                     * ? Sirve para eliminar las barras invertidas (\) que pueden estar presentes en una cadena. Esto pasa por seguridad cuando mandas por lo general un json y te escapa las comillas presentes usando barras invertidas.
                    */
                    $jsonData = stripslashes(html_entity_decode($this->refbanc));
                    /**
                     * ? Decodificamos el json
                    */
                    $ref_banc = json_decode($jsonData);
                    /**
                     * ? Llamamos al método correspondiente enviando el id, las filas de los beneficiarios en la base de datos, el arreglo de ids y el json de los beneficiarios
                    */
                    expedientes::Editar_benbanc($results_checkbenban['id'], $checkbenban['count'], $array_banc_ids, $ref_banc);
                }
            }else{
                if(!(is_null($this->refbanc))){
                    /**
                     * ? Sirve para eliminar las barras invertidas (\) que pueden estar presentes en una cadena. Esto pasa por seguridad cuando mandas por lo general un json y te escapa las comillas presentes usando barras invertidas.
                    */
                    $jsonData = stripslashes(html_entity_decode($this->refbanc));
                    /**
                     * ? Decodificamos el json
                    */
                    $ref_banc = json_decode($jsonData);
                    /**
                     * ? Enviamos al metodo el id del expediente y el json de las referencias laborales
                    */
                    expedientes::Crear_benbanc($results_checkreflab['id'], $ref_banc);
                }
            }
        }else{
            /**
             * ? Guardamos el expediente en caso de que no exista
            */
            $crud->store('expedientes', ['users_id' => $this->select2, 'num_empleado' => $this->num_empleado, 'puesto' => $this->puesto, 'estudios' => $this->estudios, 'posee_correo' => $this->posee_correo, 'correo_adicional' => $this->correo_adicional, 'calle' => $this->calle, 'num_interior' => $this->ninterior, 'num_exterior' => $this->nexterior, 'colonia' => $this->colonia, 'estado_id' => $this->estado, 'municipio_id' => $this->municipio, 'codigo' => $this->codigo, 'tel_dom' => $this->teldom, 'posee_telmov' => $this->posee_telmov, 'tel_mov' => $this->telmov, 'posee_telempresa' => $this->posee_telempresa, 'marcacion' => $this->marcacion, 'serie' => $this->serie, 'sim' => $this->sim, 'numerored_empresa' => $this->numred, 'modelotel_empresa' => $this->modelotel, 'marcatel_empresa' => $this->marcatel, 'imei' => $this->imei, 'posee_laptop' => $this->posee_laptop, 'marca_laptop' => $this->marca_laptop, 'modelo_laptop' => $this->modelo_laptop, 'serie_laptop' => $this->serie_laptop, 'casa_propia' => $this->casa_propia, 'ecivil' => $this->ecivil, 'posee_retencion' => $this->posee_retencion, 'monto_mensual' => $this->monto_mensual, 'fecha_nacimiento' => $this->fechanac, 'fecha_inicioc' => $this->fechacon, 'fecha_alta' => $this->fechaalta, 'salario_contrato' => $this->salario_contrato, 'salario_fechaalta' => $this->salario_fechaalta, 'observaciones' => $this->observaciones, 'curp' => $this->curp, 'nss' => $this->nss, 'rfc' => $this->rfc, 'tipo_identificacion' => $this->identificacion, 'num_identificacion' => $this->numeroidentificacion, 'fecha_enuniforme' => $this->fechauniforme, 'cantidad_polo' => $this->cantidadpolo, 'talla_polo' => $this->tallapolo, 'emergencia_nombre' => $this->emergencianom, 'emergencia_apellidopat' => $this->emergenciaapat, 'emergencia_apellidomat' => $this->emergenciaamat, 'emergencia_relacion' => $this->emergenciarelacion, 'emergencia_telefono' => $this->emergenciatelefono, 'emergencia_nombre2' => $this->emergencianom2, 'emergencia_apellidopat2' => $this->emergenciaapat2, 'emergencia_apellidomat2' => $this->emergenciaamat2, 'emergencia_relacion2' => $this->emergenciarelacion2, 'emergencia_telefono2' => $this->emergenciatelefono2, 'capacitacion' => $this->capacitacion, 'resultado_antidoping' => $this->antidoping, 'tipo_sangre' => $this->tipo_sangre, 'vacante' => $this->vacante, 'fam_dentro_empresa' => $this->radio2, 'fam_nombre' => $this->nomfam, 'fam_apellidopat' => $this->apellidopatfam, 'fam_apellidomat' => $this->apellidomatfam, 'banco_personal' => $this->banco_personal, 'cuenta_personal' => $this->cuenta_personal, 'clabe_personal' => $this->clabe_personal, 'plastico_personal' => $this->plastico_personal, 'banco_nomina' => $this->banco_nomina, 'cuenta_nomina' => $this->cuenta_nomina, 'clabe_nomina' => $this->clabe_nomina, 'plastico' => $this->plastico]);
            /**
             * ? Obtenemos el id del último expediente insertado
            */
            $id_expediente = $object -> _db -> lastInsertId();

            /**
             * ? Checamos si las referencias laborales no están vacías
            */
            if(!(is_null($this->referencias))){
                $jsonData = stripslashes(html_entity_decode($this->referencias));
                $referencias = json_decode($jsonData);
                expedientes::Crear_reflaborales($id_expediente, $referencias);
            }
            /**
             * ? Checamos si las beneficiarios bancarios no están vacíos
            */
            if(!(is_null($this->refbanc))){
                $jsonData2 = stripslashes(html_entity_decode($this->refbanc));
                $refbanc = json_decode($jsonData2);
                expedientes::Crear_benbanc($id_expediente, $refbanc);
            }
        }

        /**
         * ? Verifica cuantos documentos hay en la base de datos
        */
        $checktipospapeleria = $object -> _db -> prepare("SELECT * FROM tipo_papeleria");
        $checktipospapeleria -> execute();
        $counttipospapeleria = $checktipospapeleria -> rowCount();

        /**
         * ? Se utiliza un bucle foreach para iterar a través de un arreglo de documentos llamado $this->arraypapeleria. Cada elemento en este arreglo representa un documento que se cargará
         * ? Dentro del bucle, se verifica si el documento no está vacío utilizando la función !empty($documento). Esto garantiza que solo se procesen los documentos que realmente se han proporcionado
         * ? Se crea una instancia de la clase crud, lo que sugiere que esta clase se utiliza para interactuar con la base de datos
         * ? Se obtiene el valor de $i, que probablemente se refiere a un tipo de documento o alguna forma de identificador para el tipo de papelería
         * ? Se obtiene el nombre original del archivo que se está cargando, utilizando $documento["name"]
         * ? Se define una ubicación de directorio en la variable $location, donde se guardarán los archivos. Supongo que "../src/documents/" es la ubicación donde se almacenarán los archivos cargados
         * ? Se utiliza la función pathinfo para extraer la extensión del nombre del archivo original. Esto se almacena en la variable $ext
         * ? Se llama a la función tempnam_sfx para generar un nombre de archivo único en la ubicación de destino ($location) utilizando la extensión del archivo ($ext). Esto se almacena en la variable $uploadfile
         * ? Se utiliza move_uploaded_file para mover el archivo cargado desde su ubicación temporal (especificada en $documento['tmp_name']) a la ubicación definitiva especificada en $uploadfile
         * ? Se establece la zona horaria actual en "America/Monterrey" utilizando date_default_timezone_set. Esto se hace para obtener la fecha y hora actual en esta zona horaria
         * ? Se obtiene la fecha y hora actual en el formato "yy-mm-dd hh:mm:ss" y se almacena en la variable $fecha_subida
         * ? Se utiliza la instancia de la clase crud para almacenar la información del documento en la tabla papeleria_empleado de la base de datos. Los datos que se almacenan incluyen el ID del expediente al que se asocia el documento, el tipo de archivo, el nombre del archivo original, un identificador del archivo (probablemente el nombre generado único), y la fecha de subida
        */
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
        $row = $object->_db->prepare("SELECT expedientes.id as expid, expedientes.users_id as userid, expedientes.num_empleado as enum_empleado, expedientes.estudios as eestudios, expedientes.puesto as epuesto, expedientes.posee_correo as eposee_correo, expedientes.correo_adicional as ecorreo_adicional, expedientes.calle as ecalle, expedientes.num_interior as enum_interior, expedientes.num_exterior as enum_exterior, expedientes.colonia as ecolonia, expedientes.estado_id as eestado, expedientes.municipio_id as emunicipio, expedientes.codigo as ecodigo, expedientes.tel_dom as etel_dom, expedientes.posee_telmov as eposee_telmov, expedientes.tel_mov as etel_mov, expedientes.posee_telempresa as eposee_telempresa, expedientes.marcacion as emarcacion, expedientes.serie as eserie, expedientes.sim as esim, expedientes.numerored_empresa as enumred, expedientes.modelotel_empresa as modeltel, expedientes.marcatel_empresa as marcatel, expedientes.imei as eimei, expedientes.posee_laptop as eposee_laptop, expedientes.marca_laptop as emarca_laptop, expedientes.modelo_laptop as emodelo_laptop, expedientes.serie_laptop as eserie_laptop, expedientes.casa_propia as ecasa_propia, expedientes.ecivil as eecivil, expedientes.posee_retencion as eposee_retencion, expedientes.monto_mensual as emonto_mensual, expedientes.fecha_nacimiento as efecha_nacimiento, expedientes.fecha_inicioc as efecha_inicioc, expedientes.fecha_alta as efecha_alta, expedientes.salario_contrato as esalario_contrato, expedientes.salario_fechaalta as esalario_fechaalta, expedientes.observaciones as eobservaciones, expedientes.curp as ecurp, expedientes.nss as enss, expedientes.rfc as erfc, expedientes.tipo_identificacion as etipo_identificacion, expedientes.num_identificacion as enum_identificacion, expedientes.capacitacion as ecapacitacion, expedientes.fecha_enuniforme as efecha_enuniforme, expedientes.cantidad_polo as ecantidad_polo, expedientes.talla_polo as etalla_polo, expedientes.emergencia_nombre as eemergencia_nombre, expedientes.emergencia_apellidopat as eemergencia_appelidopat, expedientes.emergencia_apellidomat as eemergencia_appelidomat, expedientes.emergencia_relacion as eemergencia_relacion, expedientes.emergencia_telefono as eemergencia_telefono, expedientes.emergencia_nombre2 as eemergencia_nombre2, expedientes.emergencia_apellidopat2 as eemergencia_appelidopat2, expedientes.emergencia_apellidomat2 as eemergencia_appelidomat2, expedientes.emergencia_relacion2 as eemergencia_relacion2, expedientes.emergencia_telefono2 as eemergencia_telefono2, expedientes.resultado_antidoping as eresultado_antidoping, expedientes.tipo_sangre as etipo_sangre, expedientes.vacante as evacante, expedientes.fam_dentro_empresa as efam_dentro_empresa, expedientes.fam_nombre as efam_nombre, expedientes.fam_apellidopat as efam_apellidopat, expedientes.fam_apellidomat as efam_apellidomat, expedientes.banco_personal as ebanco_personal, expedientes.cuenta_personal as ecuenta_personal, expedientes.clabe_personal as eclabe_personal, expedientes.plastico_personal as eplastico_personal, expedientes.banco_nomina as ebanco_nomina, expedientes.cuenta_nomina as ecuenta_nomina, expedientes.clabe_nomina as eclabe_nomina, expedientes.plastico as eplastico, estatus_empleado.situacion_del_empleado as esituacion_del_empleado, estatus_empleado.estatus_del_empleado as eestatus_del_empleado, estatus_empleado.motivo as emotivo, estatus_empleado.fecha as eestatus_fecha from expedientes left join estatus_empleado on estatus_empleado.expedientes_id = expedientes.id where expedientes.id=:expedienteid");
        $row->bindParam("expedienteid", $id, PDO::PARAM_INT);
        $row->execute();
        $editar = $row->fetch(PDO::FETCH_OBJ);
        return $editar;
    }

    public static function FetchTempEditExpediente($id){
        $object = new connection_database();
        $check_temp = $object->_db->prepare("SELECT * FROM expedientes_temporales LEFT JOIN estatus_empleado_temporal ON estatus_empleado_temporal.expedientes_id = expedientes_temporales.id WHERE expedientes_temporales.id = :expedienteid");
        $check_temp->execute(array(':expedienteid' => $id));
        $tempedit = $check_temp->fetch(PDO::FETCH_ASSOC);
        return $tempedit;
    }

    public static function Fetchtokenexpediente($id){
        $object = new connection_database();
        $row = $object->_db->prepare("SELECT expedientes.id as expid, expedientes.users_id as userid, expedientes.num_empleado as enum_empleado, expedientes.estudios as eestudios, expedientes.puesto as epuesto, expedientes.posee_correo as eposee_correo, expedientes.correo_adicional as ecorreo_adicional, expedientes.calle as ecalle, expedientes.num_interior as enum_interior, expedientes.num_exterior as enum_exterior, expedientes.colonia as ecolonia, expedientes.estado_id as eestado, expedientes.municipio_id as emunicipio, expedientes.codigo as ecodigo, expedientes.tel_dom as etel_dom, expedientes.posee_telmov as eposee_telmov, expedientes.tel_mov as etel_mov, expedientes.posee_telempresa as eposee_telempresa, expedientes.marcacion as emarcacion, expedientes.serie as eserie, expedientes.sim as esim, expedientes.numerored_empresa as enumred, expedientes.modelotel_empresa as modeltel, expedientes.marcatel_empresa as marcatel, expedientes.imei as eimei, expedientes.posee_laptop as eposee_laptop, expedientes.marca_laptop as emarca_laptop, expedientes.modelo_laptop as emodelo_laptop, expedientes.serie_laptop as eserie_laptop, expedientes.casa_propia as ecasa_propia, expedientes.ecivil as eecivil, expedientes.posee_retencion as eposee_retencion, expedientes.monto_mensual as emonto_mensual, expedientes.fecha_nacimiento as efecha_nacimiento, expedientes.fecha_inicioc as efecha_inicioc, expedientes.fecha_alta as efecha_alta, expedientes.salario_contrato as esalario_contrato, expedientes.salario_fechaalta as esalario_fechaalta, expedientes.observaciones as eobservaciones, expedientes.curp as ecurp, expedientes.nss as enss, expedientes.rfc as erfc, expedientes.tipo_identificacion as etipo_identificacion, expedientes.num_identificacion as enum_identificacion, expedientes.capacitacion as ecapacitacion, expedientes.fecha_enuniforme as efecha_enuniforme, expedientes.cantidad_polo as ecantidad_polo, expedientes.talla_polo as etalla_polo, expedientes.emergencia_nombre as eemergencia_nombre, expedientes.emergencia_apellidopat as eemergencia_appelidopat, expedientes.emergencia_apellidomat as eemergencia_appelidomat, expedientes.emergencia_relacion as eemergencia_relacion, expedientes.emergencia_telefono as eemergencia_telefono, expedientes.emergencia_nombre2 as eemergencia_nombre2,expedientes.emergencia_apellidopat2 as eemergencia_appelidopat2, expedientes.emergencia_apellidomat2 as eemergencia_appelidomat2, expedientes.emergencia_relacion2 as eemergencia_relacion2, expedientes.emergencia_telefono2 as eemergencia_telefono2, expedientes.resultado_antidoping as eresultado_antidoping, expedientes.tipo_sangre as etipo_sangre, expedientes.vacante as evacante, expedientes.fam_dentro_empresa as efam_dentro_empresa, expedientes.fam_nombre as efam_nombre, expedientes.fam_apellidopat as efam_apellidopat, expedientes.fam_apellidomat as efam_apellidomat, expedientes.banco_personal as ebanco_personal, expedientes.cuenta_personal as ecuenta_personal, expedientes.clabe_personal as eclabe_personal, expedientes.plastico_personal as eplastico_personal, expedientes.banco_nomina as ebanco_nomina, expedientes.cuenta_nomina as ecuenta_nomina, expedientes.clabe_nomina as eclabe_nomina, expedientes.plastico as eplastico, estatus_empleado.situacion_del_empleado as esituacion_del_empleado, estatus_empleado.estatus_del_empleado as eestatus_del_empleado, estatus_empleado.motivo as emotivo, estatus_empleado.fecha as eestatus_fecha from expedientes left join estatus_empleado on estatus_empleado.expedientes_id = expedientes.id where expedientes.id=:expedienteid");
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
        $row = $object->_db->prepare("SELECT expedientes.id as expid, expedientes.users_id as userid, expedientes.num_empleado as enum_empleado, expedientes.estudios as eestudios, expedientes.puesto as epuesto, expedientes.posee_correo as eposee_correo, expedientes.correo_adicional as ecorreo_adicional, expedientes.calle as ecalle, expedientes.num_interior as enum_interior, expedientes.num_exterior as enum_exterior, expedientes.colonia as ecolonia, expedientes.estado_id as eestado, expedientes.municipio_id as emunicipio, expedientes.codigo as ecodigo, expedientes.tel_dom as etel_dom, expedientes.posee_telmov as eposee_telmov, expedientes.tel_mov as etel_mov, expedientes.posee_telempresa as eposee_telempresa, expedientes.marcacion as emarcacion, expedientes.serie as eserie, expedientes.sim as esim, expedientes.numerored_empresa as enumred, expedientes.modelotel_empresa as modeltel, expedientes.marcatel_empresa as marcatel, expedientes.imei as eimei, expedientes.posee_laptop as eposee_laptop, expedientes.marca_laptop as emarca_laptop, expedientes.modelo_laptop as emodelo_laptop, expedientes.serie_laptop as eserie_laptop, expedientes.casa_propia as ecasa_propia, expedientes.ecivil as eecivil, expedientes.posee_retencion as eposee_retencion, expedientes.monto_mensual as emonto_mensual, expedientes.fecha_nacimiento as efecha_nacimiento, expedientes.fecha_inicioc as efecha_inicioc, expedientes.fecha_alta as efecha_alta, expedientes.salario_contrato as esalario_contrato, expedientes.salario_fechaalta as esalario_fechaalta, expedientes.observaciones as eobservaciones, expedientes.curp as ecurp, expedientes.nss as enss, expedientes.rfc as erfc, expedientes.tipo_identificacion as etipo_identificacion, expedientes.num_identificacion as enum_identificacion, expedientes.capacitacion as ecapacitacion, expedientes.fecha_enuniforme as efecha_enuniforme, expedientes.cantidad_polo as ecantidad_polo, expedientes.talla_polo as etalla_polo, expedientes.emergencia_nombre as eemergencia_nombre, expedientes.emergencia_apellidopat as eemergencia_appelidopat, expedientes.emergencia_apellidomat as eemergencia_appelidomat, expedientes.emergencia_relacion as eemergencia_relacion, expedientes.emergencia_telefono as eemergencia_telefono, expedientes.emergencia_nombre2 as eemergencia_nombre2, expedientes.emergencia_apellidopat2 as eemergencia_appelidopat2, expedientes.emergencia_apellidomat2 as eemergencia_appelidomat2, expedientes.emergencia_relacion2 as eemergencia_relacion2, expedientes.emergencia_telefono2 as eemergencia_telefono2, expedientes.resultado_antidoping as eresultado_antidoping, expedientes.tipo_sangre as etipo_sangre, expedientes.vacante as evacante, expedientes.fam_dentro_empresa as efam_dentro_empresa, expedientes.fam_nombre as efam_nombre, expedientes.fam_apellidopat as efam_apellidopat, expedientes.fam_apellidomat as efam_apellidomat, expedientes.banco_personal as ebanco_personal, expedientes.cuenta_personal as ecuenta_personal, expedientes.clabe_personal as eclabe_personal, expedientes.plastico_personal as eplastico_personal, expedientes.banco_nomina as ebanco_nomina, expedientes.cuenta_nomina as ecuenta_nomina, expedientes.clabe_nomina as eclabe_nomina, expedientes.plastico as eplastico from expedientes inner join usuarios on usuarios.id=expedientes.users_id where usuarios.id=:sessionid");
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

    public static function Insertar_expediente_token($token, $logged_user, $estudios, $posee_correo, $correo_adicional, $calle, $ninterior, $nexterior, $colonia, $estado, $municipio, $codigo, $teldom, $posee_telmov, $telmov, $casa_propia, $ecivil, $posee_retencion, $monto_mensual, $fechanac, $fechacon, $fechaalta, $curp, $nss, $rfc, $identificacion, $numeroidentificacion, $referencias, $capacitacion, $fechauniforme, $cantidadpolo, $tallapolo, $emergencianom, $emergenciaapat, $emergenciaamat, $emergenciaparentesco, $emergenciatel, $emergencianom2, $emergenciaapat2, $emergenciaamat2, $emergenciaparentesco2, $emergenciatel2, $antidoping, $tipo_sangre, $vacante, $posee_familiar, $nomfam, $apellidopatfam, $apellidomatfam, $banco_personal, $cuenta_personal, $clabe_personal, $plastico_personal, $refbanc, $arraypapeleria){
        $crud = new crud();
        $object = new connection_database();
        $set_logged_user = $object -> _db -> prepare("SET @logged_user = :loggeduser");
        $set_logged_user -> execute(array(':loggeduser' => $logged_user));
		$retrieve_expediente_id = $object -> _db -> prepare("SELECT expedientes.id AS expedienteid FROM token_expediente INNER JOIN expedientes ON expedientes.id=token_expediente.expedientes_id WHERE token_expediente.token=:token");
		$retrieve_expediente_id -> execute(array(':token' => $token));
		$fetch_expediente_id = $retrieve_expediente_id -> fetch(PDO::FETCH_ASSOC);
		$id_expediente = $fetch_expediente_id["expedienteid"];
        //SE ACTUALIZA LA INFORMACIÓN DEL EXPEDIENTE
        $crud->update('expedientes', ['estudios' => $estudios, 'posee_correo' => $posee_correo, 'correo_adicional' => $correo_adicional, 'calle' => $calle, 'num_interior' => $ninterior, 'num_exterior' => $nexterior, 'colonia' => $colonia, 'estado_id' => $estado, 'municipio_id' => $municipio, 'codigo' => $codigo, 'tel_dom' => $teldom, 'posee_telmov' => $posee_telmov, 'tel_mov' => $telmov, 'casa_propia' => $casa_propia, 'ecivil' => $ecivil, 'posee_retencion' => $posee_retencion, 'monto_mensual' => $monto_mensual, 'fecha_nacimiento' => $fechanac, 'fecha_inicioc' => $fechacon, 'fecha_alta' => $fechaalta, 'curp' => $curp, 'nss' => $nss, 'rfc' => $rfc, 'tipo_identificacion' => $identificacion, 'num_identificacion' => $numeroidentificacion, 'capacitacion' => $capacitacion, 'fecha_enuniforme' => $fechauniforme, 'cantidad_polo' => $cantidadpolo, 'talla_polo' => $tallapolo, 'emergencia_nombre' => $emergencianom, 'emergencia_apellidopat' => $emergenciaapat, 'emergencia_apellidomat' => $emergenciaamat, 'emergencia_relacion' => $emergenciarelacion, 'emergencia_telefono' => $emergenciatel, 'emergencia_nombre2' => $emergencianom2, 'emergencia_apellidopat2' => $emergenciaapat2, 'emergencia_apellidomat2' => $emergenciaamat2, 'emergencia_relacion2' => $emergenciarelacion2, 'emergencia_telefono2' => $emergenciatel2, 'resultado_antidoping' => $antidoping, 'tipo_sangre' => $tipo_sangre, 'vacante' => $vacante, 'fam_dentro_empresa' => $posee_familiar, 'fam_nombre' => $nomfam, 'fam_apellidopat' => $apellidopatfam,'fam_apellidomat' => $apellidomatfam, 'banco_personal' => $banco_personal, 'cuenta_personal' => $cuenta_personal, 'clabe_personal' => $clabe_personal, 'plastico_personal' => $plastico_personal], "id=:idexpediente", ['idexpediente' => $id_expediente]);	
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
        $checkrefbanc = $object -> _db ->prepare("SELECT id FROM ben_bancarios WHERE expediente_id=:expedienteid");
        $checkrefbanc -> execute(array(':expedienteid' => $id_expediente));
        $countrefbanc = $checkrefbanc -> rowCount();
        if($countrefbanc > 0){
            $array_ids = $checkrefbanc->fetchAll(PDO::FETCH_ASSOC);
            if(is_null($refbanc)){
                $crud -> delete('ben_bancarios', 'expediente_id=:idexpediente', ['idexpediente' => $id_expediente]);
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