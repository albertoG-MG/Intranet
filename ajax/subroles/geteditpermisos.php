<?php
include_once __DIR__ . "/../../config/conexion.php";
$object = new connection_database();
    if(isset($_POST["rol_id"])){
        $array = [];
        $rolid= $_POST["rol_id"];
        $check_permisos = $object -> _db -> prepare("SELECT permisos_id FROM subrolesxpermisos WHERE subroles_id=:subrol");
        $check_permisos -> execute(array(':subrol' => $_POST["subrol_id"]));
        while ($fetch_permisos = $check_permisos -> fetch(PDO::FETCH_OBJ)) { 
            $array[]=array('id'=>$fetch_permisos -> permisos_id);
        }
        $checkcategorias = $object -> _db -> prepare("SELECT DISTINCT categorias.id as catid, categorias.nombre as catnom from rolesxcategorias inner join categorias ON categorias.id=rolesxcategorias.categorias_id INNER JOIN permisos ON permisos.categoria_id=categorias.id WHERE rolesxcategorias.roles_id=:rolid");
        $checkcategorias -> execute(array(':rolid' => $rolid));
        $countcategorias = $checkcategorias -> rowCount();
        $index=0;
        echo "<ul id='lista' class='flex flex-col gap-3 md:flex-row md:flex-wrap' style='list-style: none;'>";
            while ($index < $countcategorias) {
                $fetchcategorias = $checkcategorias -> fetch(PDO::FETCH_ASSOC);
                 echo "<li style='flex: 1 0 21%'>". $fetchcategorias["catnom"];
                 getpermiso($fetchcategorias["catid"], $object, $array, $rolid); 
                $index++;
            }
        echo "</ul>";
    }
    function getpermiso($categoriaid, $object, $array, $rolid){
        $checkpermissions = $object -> _db -> prepare("SELECT permisos.id as perid, permisos.nombre as pernom FROM rolesxcategorias INNER JOIN categorias ON categorias.id=rolesxcategorias.categorias_id INNER JOIN permisos ON permisos.categoria_id=categorias.id INNER JOIN roles ON roles.id=rolesxcategorias.roles_id WHERE categorias.id=:categoriaid AND roles_id=:rolid");
        $checkpermissions -> execute(array(':categoriaid' => $categoriaid, ':rolid' => $rolid));
        $countpermissions = $checkpermissions -> rowCount();
        $index2=0;
        echo "<ul style='list-style: none;'>";
            while ($index2 < $countpermissions) {
                $fetchpermissions = $checkpermissions -> fetch(PDO::FETCH_ASSOC);
                 echo "<li><input type='checkbox' value='" . $fetchpermissions['perid'] . "'"; if(is_countable($array) && count($array) > 0){ foreach($array as $key => $value){ if ($value['id'] == $fetchpermissions['perid']) {  echo "checked"; }}} echo ">". $fetchpermissions["pernom"] . "</>"; 
                $index2++;
            }
        echo "</ul>";
    }
?>