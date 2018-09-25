<?php
require 'loginscript.php';
    // if(isset($_POST['logout']))
    // {

       // session_unset($_SESSION['email']);
       session_destroy();                                                       
       echo '<script>window.location.href="login.php";</script>';
    // }

?>
