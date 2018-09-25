<?php
  //  require("dislpaydata.php");
  if(!isset($_SESSION['email']) /*== TRUE*/)
  {
    // header("location:login.php");
    echo '<script>window.location.href="login.php";</script>';             
   }
  else 
  { 
    $set_email =$_SESSION['email'];
   // echo "Success"; 
    //to display fields from db 
    $sql = "select * from profile where email = '".$_SESSION['email']."'";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        // if(mysqli_num_rows($result)>0)
        // {
        //     $fname ='fname';
        // }
        while ($row = mysqli_fetch_assoc($result)) 
        {
            $id_profile= $row["id"];
            $fname= $row["fname"];
            $lname = $row["lname"];
            $gender = $row["gender"];
            $dept = $row["dept"];
            $profession = $row["profession"];
            $extension = $row["extension"];
            $picture = $row["picture"];
        }  
    }
  } 

?>