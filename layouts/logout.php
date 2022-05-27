<?php
session_start();
if($_SESSION['loggedin'] == true)
{
unset($_SESSION['loggedin']);
session_destroy();
}
header("Location:Login.php");
?>