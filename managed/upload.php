<?php
      include('session.php');
      include('loginscript.php'); 
     require("header.php");
     
     
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
        // if(isset($_FILES["fileToUpload"]["name"]) ) 
         //{
           /*
          $images=$_FILES['image']['name'];
          $images_tmp=$_FILES['image']['tmp_name'];
          */
          $name_img = $_FILES['image'] ['name'];
          $size = $_FILES['image'] ['size'];
          $type = $_FILES['image'] ['type'];
          $location = "../images/tickets/";
          $actual_img_nam = rand();
          $tmp_name = $_FILES['image'] ['tmp_name'];
          move_uploaded_file($tmp_name,$location.$actual_img_nam.".png");
          $images = $actual_img_nam . ".png";
          // }
          //   else
          //   {
              // echo "not set";
          
              //move_uploaded_file($images_tmp,"../images/tickets/$images");
            // }
            $reported_date = date("Y/m/d");
            //create SQL query string for inserting data into the database
          $sql = "insert into services (uid, tos, description, attachment, priority,reportdate) 
          values ('$uid','$tos', '$description','$images','$priority','$reported_date')";          

          $result = mysqli_query($conn,$sql);
          if($result)
          {
              echo"uploaded";
              // echo $tos.$uid.$description.$priority."success";
          }
          else
          {
            echo mysqli_error($conn);        
          }
  }

         
      // }     
     
?>

<!DOCTYPE html>
<html>

<head>
  <title> Book Assets</title>
</head>

<body id="main">
<div class="card row justify-content-center bg-primary mb-3 text-white"  id="items">
        <div class="container-fluid" >
          <form class="form-horizontal" role="form" id="frminput" method="post" action="upload.php" enctype="multipart/form-data">
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
            <label class="col-sm-3 control-label" for="fileToUpload">Attachments</label>
            <div class="col-sm-3">
              <input type="file" name="image" id="fileToUpload" required/>
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
              <button type="submit" class="btn btn-lg  btn-success " name="send">Submit Ticket</button>
            </div>
          </div>
        </fieldset>
      </form>
</div>
</body>

</html>