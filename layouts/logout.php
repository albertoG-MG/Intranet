<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
unset($_SESSION['loggedin']);
session_destroy();
}
header("Location:Login.php");
?>