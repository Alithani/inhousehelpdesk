<?php
 if(!isset($_SESSION)) 
 { 
    ob_start();
    session_start();  
 } 
         
    if(!isset($_SESSION['email'])) 
    { 
        header('Location:login.php');
    }
?>