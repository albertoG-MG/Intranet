<?php
   session_start(); 

   if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            exit("true");
   }else{
        $_SESSION['redirectURL']=$_POST["pagina"];
        exit("false");
   }
?>