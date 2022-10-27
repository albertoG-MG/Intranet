<?php
include_once __DIR__ . "/../../config/conexion.php";
$object = new connection_database();
    if(isset($_POST["rol_id"])){
        $rolid= $_POST["rol_id"];
        $checkcategorias = $object -> _db -> prepare("SELECT DISTINCT categorias.id as catid, categorias.nombre as catnom from rolesxcategorias inner join categorias ON categorias.id=rolesxcategorias.categorias_id INNER JOIN permisos ON permisos.categoria_id=categorias.id WHERE rolesxcategorias.roles_id=:rolid");
        $checkcategorias -> execute(array(':rolid' => $rolid));
        $countcategorias = $checkcategorias -> rowCount();
        $index=0;
        echo "<ul id='lista' class='flex flex-col gap-3 md:flex-row md:flex-wrap' style='list-style: none;'>";
            while ($index < $countcategorias) {
                $fetchcategorias = $checkcategorias -> fetch(PDO::FETCH_ASSOC);
                 echo "<li style='flex: 1 0 21%'>". $fetchcategorias["catnom"];
                    getpermiso($fetchcategorias["catid"], $object); 
                $index++;
            }
        echo "</ul>";
    }
    function getpermiso($categoriaid, $object){
        $checkpermissions = $object -> _db -> prepare("SELECT permisos.id as perid, permisos.nombre as pernom FROM rolesxcategorias INNER JOIN categorias ON categorias.id=rolesxcategorias.categorias_id INNER JOIN permisos ON permisos.categoria_id=categorias.id INNER JOIN roles ON roles.id=rolesxcategorias.roles_id WHERE categorias.id=:categoriaid");
        $checkpermissions -> execute(array(':categoriaid' => $categoriaid));
        $countpermissions = $checkpermissions -> rowCount();
        $index2=0;
        echo "<ul style='list-style: none;'>";
            while ($index2 < $countpermissions) {
                $fetchpermissions = $checkpermissions -> fetch(PDO::FETCH_ASSOC);
                 echo "<li><input type='checkbox' value='" . $fetchpermissions['perid'] . "'>". $fetchpermissions["pernom"] . "</>"; 
                $index2++;
            }
        echo "</ul>";
    }
?>