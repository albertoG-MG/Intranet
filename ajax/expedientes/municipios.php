<?php
include_once __DIR__ . "/../../config/conexion.php";
$object = new connection_database();

$estado = $_POST['id'];
if(!empty($estado)){
$municipios = $object -> _db->prepare("select  municipios.Id, municipios.nombre from municipios inner join estados on estados.id = municipios.estado where municipios.estado= :estado");
$municipios->bindParam("estado", $estado,PDO::PARAM_STR);
$municipios->execute();
if(isset($_POST['idUser'])){
$check = $object -> _db->prepare("select municipio_id from expedientes where users_id =:usuarioid");
$check->bindParam("usuarioid", $_POST['idUser'],PDO::PARAM_INT);
$check->execute();
$count=$check->rowCount();
$row=$check->fetch(PDO::FETCH_OBJ);
}
echo "<div class='w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center'><i class='mdi mdi-map-marker text-gray-400 text-lg'></i></div>";
echo "<select class='w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent' id='municipio' name='municipio'>";
while ($r = $municipios->fetch(PDO::FETCH_OBJ)) {
echo "<option value='".$r->Id."'"; if(isset($count)){ if($row->municipio_id == $r->Id){ echo 'selected=\"selected\"'; } } echo ">"; echo $r->nombre; echo "</option>";
}
echo "</select>";
}
?>
