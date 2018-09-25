<?php
ob_start();
session_start();
require 'link.php';
if (isset($_SESSION['user']) != "") {
    header("Location: index.php");
}

//if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['signup']))
  {
      $fname = trim($_POST['fname']); // get posted data and remove whitespace
      $lname = trim($_POST['lname']);
      $email =trim($_POST['email']);
      $upass =  md5($_POST['upass']);//already hashed
      $cpass = md5($_POST['cpass']);//confirm password
      $ext = trim($_POST['extension']);
      $gender = trim($_POST['gender']);
      $dept = trim($_POST['dept']);
      $prof = trim($_POST['prof']);//for job title      
      $sql_check = "select * from profile where email ='$email'";
      $result_check =mysqli_query($conn,$sql_check);
      $num_rows_update = mysqli_num_rows($result_check);
      if($num_rows_update==1)      
      {
        $message = "Email already stored" ;
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
      else  if($num_rows_update==0) 
      {
        //image upload
        $target_dir = "../images/";
        $target_file = $target_dir.$fname."_".basename($_FILES["avatar"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $new_name = $target_dir.$fname."_".basename($_FILES["avatar"]["name"]);        
        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["avatar"]["tmp_name"]);
            if($check !== false) 
            {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            } 
            else 
            {
              echo "File is not an image.";
              $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["avatar"]["size"] > 50000000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } 
        else 
        {
          if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $new_name)) {
            echo "The file ".$fname."_". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
         
        } 
        $avatarimg = $fname."_".basename($_FILES["avatar"]["name"]);
        echo "<br>".$avatarimg."uploaded"."<br>"; 
        // to check if email exist
        $sql_email ="select * from profile where email='$email'";
        $result_email = mysqli_query($conn,$sql_email);
        $result_count = mysqli_fetch_row( $result_email );
       
        if( $result_count = 0)
        { 
          // echo  $result_email;
          echo"Sorry Email already exists"; 
        }
        else
        {
            //create SQL query string for inserting data into the database
            $sql = "insert into profile (fname, lname, email, dept, profession, extension, pass, gender,picture) 
                     values ('$fname','$lname', '$email','$dept','$prof', '$ext', '$upass', '$gender','$avatarimg' )";   
       
            $result = mysqli_query($conn,$sql);
            if($result)
            {
                echo"uploaded";
            }
            else
            {
              echo mysqli_error($conn);
            }
      }
   
    }
  }
  $sql_depts="select * from departments  order by `deptName` asc";
  $result_depts = mysqli_query($conn,$sql_depts);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require("link.php");?>
<title><?php echo $db_name?></title>
</head>

<body class="bg-dark">
  <div class="container-fluid"  id="main">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="post" autocomplete="off" action="register.php" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input class="form-control"  type="text" aria-describedby="nameHelp" placeholder="Enter first name" name="fname" required>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" type="text" aria-describedby="nameHelp" placeholder="Enter last name" name="lname" required>
              </div>
            </div>
          </div>
          <div class="form-group"> 
            <div class="form-row"> 
            <div class="col-md-6">         
                <label for="exampleInputLastName">Gender</label>
                <select class="form-control col-md-6" name="gender" >
                  <option value="male">MALE</option>
                  <option value="female"> FEMALE</option>
                </select> 
            </div>
                <div class="col-md-6">
                  <label class="control-label" for="attachment">Select your Profile Picture</label>
                  <input type="file" name="avatar" value="fileupload" id="fileupload" required>                  
                </div>
            </div>           
          </div>          
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" reuired>
          </div>
          <div class="form-group">
          <div class="col-xs-4">
            <label class="control-label" for="dept">Department</label>
          </div>
        <div class="col-xs-8">
        <select class="form-control col-sm-9" name="dept" id="dept" required>
        <option value=" ----" readonly >-----</option>
              <?php
                while ($row_depts = mysqli_fetch_assoc($result_depts)) {
                  $c_id = $rows[0];
                  echo '<option>'.$rows[1].$row_depts["deptName"].'</option>';
              ?>
               
                <!-- <option value="<?php $row_depts["deptName"];?>"><?php echo $row_depts["deptName"];?></option> -->
                <?php }?>               
              </select>
            </div> 
          </div> 
          <div class="form-group">
        <label class="control-label" for="profession">Job Title</label>
        <!-- for job title -->
        <input class="form-control"  type="text"  placeholder="Enter Job Title" name="prof" required>
          </div>
          <div class="form-group">
        <label class="control-label" for="extension">Extension</label>
        <input class="form-control"  type="text"  placeholder="Enter The Three Digits Extension Number"  name="extension" pattern="[0-9]{3}" required>
          </div>          
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
          <div class="form-group">
          <button type="submit" class="btn    btn-block btn-primary" name="signup" id="reg" >Register</button>
      </div>
          <a class="btn btn-primary btn-block" href="login.php">Login</a>

        </form>
        <div class="text-center" id="reg">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
          <a class="d-block small" href="forgot-password.php">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
 
</body>

</html>
