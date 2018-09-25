<?php
      include('session.php');
      include('loginscript.php'); 
     require("header.php");
     include('datadisplay.php'); 
     
     
    //  require("dislpaydata.php");
     if(!isset($_SESSION['email']) /*== TRUE*/)
      {      
        header("location:login.php");             
       }
      else 
      { 
        $set_email =$_SESSION['email'];
       
        //to display fields from db profile table
        $sql = "select * from profile where email = '".$_SESSION['email']."'";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
                $fname = $row["fname"];
                $lname = $row["lname"];
                $gender = $row["gender"];
                $dept = $row["dept"];
                $profession = $row["profession"];
                $extension = $row["extension"];
                $uid = $row["id"];
                $picture = $row["picture"];
                

            }
                

        }
        //to display fields from db services table
        $sql = "select * from services";
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            while ($row = mysqli_fetch_assoc($result)) 
            {
              $ticket = $row["id"];
              
            }
                

        }
      }    
      //for submit button
      if(isset($_POST['send']) ) 
      {
        $tos = stripslashes($_POST['tos']);
        $description =stripslashes($_POST['description']);
        $priority = stripslashes($_POST['priority']);   
             
        //image upload
          $target_dir = "../images/tickets/";
          $target_file = $target_dir.$ticket."_".basename($_FILES["avatar"]["name"]);
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $new_name = $target_dir.$ticket."_".basename($_FILES["avatar"]["name"]);        
          
          // Check if image file is a actual image or fake image
          if(isset($_POST["submit"]))
          {
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
          if (file_exists($target_file)) 
          {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          // Check file size
          if ($_FILES["avatar"]["size"] > 5000000)
          {
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
          } else {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $new_name)) {
              echo "The file ".$ticket."_". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
           
          } 
          $avatarimg = $ticket."_".basename($_FILES["avatar"]["name"]);
          echo "<br>".$avatarimg."uploaded"."<br>"; 
          $reported_date = date("Y/m/d");
          //create SQL query string for inserting data into the database
          $sql = "insert into services (uid, tos, description, attachment, priority,reportdate) 
                  values ('$uid','$tos', '$description','$avatarimg','$priority','$reported_date')";          
        
        $result = mysqli_query($conn,$sql);
        if($result)
        {
          $message = " Thank you!!"."Your ticket number is".$ticket;
          echo "<script type='text/javascript'>confirm('$message');</script>";  
            // echo $tos.$uid.$description.$priority."success";
        }
        else
        {
          echo mysqli_error($conn);        
        }
         
      }
?>

<!DOCTYPE html>
<html>

<head>
  <title> Book Assets</title>
</head>

<body id="main" onload="myFunction()">
<div class="card row justify-content-center bg-primary mb-3 text-white"  id="items">
        <div class="container-fluid" >
          <form class="form-horizontal" role="form" id="frminput" method="post" action="bookassets.php" enctype="multipart/form-data">
            <fieldset >
            <center>
              <legend id="legticket">Submit a ticket</legend>
            </center>
          <div class="form-group" >
              <label class="col-sm-3 control-label" for="fname">First Name</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="email" id="email" placeholder="<?php echo $set_email;?>"  readonly>
              </div>
          </div>     
          </div> 
          <div class="form-group">
            <label class="col-sm-3 control-label" for="email">Email</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="email" id="email" placeholder="<?php echo $set_email;?>"  readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="dept">Department</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="dept" id="dept" placeholder="<?php echo $dept;?>"  readonly>
            </div>
           </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="tos">Type Of Service</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-xs-3">
                  <select class="form-control col-sm-6" name="tos" id="tos">
                    <option value="SAP">SAP</option></option>
                    <option value="Network">Network</option>
                    <option value="IT Support">IT Support</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="desc">Description</label>
            <div class="col-sm-3 text-dark">
              <textarea name="description" style="width:400px; height:200px;" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="avatar">Attachments</label>
            <div class="col-sm-3">
            <input type="file" name="avatar" value="fileupload" id="fileupload" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="priority">Priority</label>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-xs-3">
                  <select class="form-control col-sm-6" name="priority" id="priority" required>
                    
                    <option value="LOW">LOW</option></option>
                    <option value="MEDIUM">MEDIUM</option>
                    <option value="HIGH"> HIGH</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button type="submit" class="btn btn-lg  btn-success " name="send" >Submit Ticket</button>
            </div>
          </div>
        </fieldset>
      </form>
</div>
</body>

</html>