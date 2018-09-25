<?php 
  require 'link.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title> Forgot Password</title>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <form method="post" action="forgot-password.php">
        <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="upass" type="password" placeholder="Password" required name="upass"required>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="cpass" type="password" placeholder="Confirm password" name="cpass" onChange="isPasswordMatch();" required/>
                <div id="divCheckPassword"></div> 
              </div>
            </div>
          </div>
          <a type="submit" class="btn btn-primary btn-block" name="resetpassword"  >Reset Password</a>
        </form>
        <div class="text-center" id="reg">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="login.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>
 
</body>

</html>