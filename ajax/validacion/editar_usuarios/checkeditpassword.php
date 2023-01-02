<?php
include_once __DIR__ . "/../../../config/conexion.php";
$object = new connection_database();

function is_sha1($str) {
    return (bool) preg_match('/^[0-9a-f]{40}$/i', $str);
}

$password = $_POST["password"];
$editarid = $_POST["editarid"];
$query = $object ->_db->prepare("SELECT password from blacklist_password");
$query->execute();
$fetch_badword = $query -> fetchAll(PDO::FETCH_ASSOC);
foreach($fetch_badword as $badword){
    if(strpos($password, $badword["password"]) !== false)
    {
        $output = "La contraseña no puede contener: " .$badword['password']. ", Por favor, modifique la contraseña";
        break;
    }else{
        $output = true;
    }
}

if($output === true){
    $sha1_password = sha1($password); 
    $repeated_password = $object ->_db->prepare("SELECT historial_password.password, historial_password.today_date FROM historial_password WHERE historial_password.user_id=:editarid");
    $repeated_password -> execute(array(':editarid' => $editarid));
    $check_repeated_password = $repeated_password -> rowCount();
    date_default_timezone_set("America/Monterrey");
    $upload_date = date('y-m-d');
    $date_upload = date_create($upload_date);
    date_format($date_upload,"y-m-d");
    if($check_repeated_password > 0){
        $fetch_repeated_password = $repeated_password -> fetchAll(PDO::FETCH_ASSOC);
        foreach($fetch_repeated_password as $password_repeated){
            if(!(is_sha1($password_repeated["password"]))){
                $hash_password = sha1($password_repeated["password"]);
            }else{
                $hash_password = $password_repeated["password"];
            }
            if($hash_password == $sha1_password){
                $date_used = date_create($password_repeated["today_date"]);
                date_format($date_used,"y-m-d");
                $diff=date_diff($date_used, $date_upload);
                if($diff -> days < 366){
                    $output = "Deben pasar más de 365 días para que esta contraseña vuelva a ser usable";
                    break;
                }
            }else{
                $output=true;
            }
        }
    }else{
        $output=true;
    }
}

echo json_encode($output);
?>