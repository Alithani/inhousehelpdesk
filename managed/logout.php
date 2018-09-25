<?php
require 'loginscript.php';
    // if(isset($_POST['logout']))
    // {

       // session_unset($_SESSION['email']);
       session_destroy();                                                       
    header('Location:login.php');
    // }

?>
