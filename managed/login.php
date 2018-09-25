<?php
  
   require 'link.php';
   require 'loginscript.php';
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
</head>

<body class="bg-dark">
  <div class="container-fluid"  id="main">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post" autocomplete="off"   enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" reuired>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name="pass" required>
          </div>
          <div class="form-group" >
            <div class="form-check">
            <label class="form-check-label"> Remember Password 	&nbsp;  </label>
              <input class="form-check-input" type="checkbox"> 
              
            </div>
          </div>
          <button type="submit" class="btn    btn-block btn-primary" name="login" id="log" >Login</button>
        </form>
        <div class="text-center" id="reg">
          <a class="d-block small mt-3" href="register.php" >Register an Account</a><!--php code to add to db-->
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
 

</html>
