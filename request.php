<?php
    include('loginscript.php'); 
    require("header.php");
    if(!isset($_SESSION['email']) /*== TRUE*/)
    {      
      echo '<script>window.location.href="login.php";</script>';             
      }
    else 
    { 
      $set_email =$_SESSION['email'];
      
      //to display fields from db 
      $sql = "select * from profile where email = '".$_SESSION['email']."'";
      $result = mysqli_query($conn,$sql);
      if($result)
      {
          while ($row = mysqli_fetch_assoc($result)) 
          {
              $fname = $row["fname"];              
              $dept = $row["dept"];
              $uid = $row["id"];
          }
      }
      //for submit button
      if(isset($_POST['send']) ) 
      {
        $tor = stripslashes($_POST['tor']);
        $description =stripslashes($_POST['description']);
        $from = stripslashes($_POST['from']);     
        $to = stripslashes($_POST['returndate']);   
        $venue = stripslashes($_POST['venue']);          
        //create SQL query string for inserting data into the database
        $sql = "insert into request (uid, tor, datetaken, returndate, venue,description) 
                values ('$uid','$tor','$from','$to','$venue', '$description' )";       
        $result = mysqli_query($conn,$sql);
        if($result)
        {
            $sql = "select * from request";
            $result = mysqli_query($conn,$sql);
            if($result)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $ticket = $row["id"];
                }
            }
          $message = " Thank you!!"."Your ticket number is".$ticket;
          echo "<script type='text/javascript'>confirm('$message');</script>";
           //echo $tos.$uid.$description.$priority."success";
        }
        else
        {
          echo mysqli_error($conn);        
        }
         
      }
    }    
 ?>

<!DOCTYPE html>
<html>
<head>   
</head>
<body>
<div class="container-fluid"  id="main">
  <form class="form-horizontal" role="form" id="frminput" method="post">
    <fieldset>
    <center>
      <legend>Submit a ticket</legend></center>
      <div class="form-group" >
        <label class="col-sm-3 control-label" for="fname">First Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="fname" id="card-holder-name" placeholder="<?php echo $fname;?>"  readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="email">Email</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $set_email; ?>" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="dept">Department</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="dept" id="" placeholder="<?php echo $dept;?>"  readonly>
        </div>
        </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="tor">Type Of Resource</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-8">
              <select class="form-control col-sm-4" name="tor" id="tor" required>
                <option value="new hardware">New Hardware</option></option>
                <option value="projector">Projector</option>
                <option value="cables">Power Extensions and Cables</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="description">Description</label>
        <div class="col-sm-3">
           <textarea name="description" style="width:400px; height:200px;" required></textarea>
        </div>
      </div>
       <div class="form-group">
        <label class="col-sm-3 control-label" for="from">From</label>
        <div class="col-sm-3">
        <input type="date" name="from" required> to
        <input type="date" name="returndate" required><br><br>
       </div>
      </div>
            <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Venue </label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
            <input type="text" class="form-control" name="venue" id="card-holder-name" placeholder="Venue to Use" required>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-success" name="send">Submit Ticket</button>
        </div>
      </div>
    </fieldset>
  </form>
</div>
<?php require("footer.php");?>
</body>
</html>