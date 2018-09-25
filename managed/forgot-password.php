<?php 
  require 'link.php';
  if(isset($_POST['resetpassword']))
  {
    $resetpassword = $_POST['resetpassword'];
    $email = $_POST['email'];
    // to check if email exist
    $sql_email ="select * from profile where email='$email'";
    $result_email = mysqli_query($conn,$sql_email);
    while ($row = mysqli_fetch_assoc($result_email)) 
    {
      //email from db
        $emaildb = $row["email"];  
    }
    $count = mysqli_num_rows($result_email);
    if($result_email)
    {
      $to = "$emaildb";
      $subject = "Reset Your Password";
      $txt = 'Click On this '.'<a href="http://localhost/example/resetpassword.php">Link </a>';
      $header = "From:abc@somedomain.com \r\n";        
      $header .= "MIME-Version: 1.0\r\n";
      $header .= "Content-type: text/html\r\n";
      mail($to,$subject,$txt,$headers);
    }
    else
    {
      echo"email does not exist";
    }
  }
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
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form method="post" action="forgot-password.php">
          <div class="form-group">
            <input class="form-control" name="email" id="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required>
          </div>
          <button type="submit" class="btn    btn-block btn-primary" name="resetpassword" id="reg" >Reset Password</button>
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
