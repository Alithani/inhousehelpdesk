<!DOCTYPE html>
<html>

<head>
<?php
      include('session.php');
      include('loginscript.php'); 
      require("header.php"); 
      

      //to check if session isset
      if(!isset($_SESSION['email']) /*== TRUE*/)
      {      
        echo '<script>window.location.href="login.php";</script>';             
      }
      else 
      {    
        
        $sql = "select * from services  ";
        $result = mysqli_query($conn, $sql );
         
          while ($row  = mysqli_fetch_assoc($result)) 
          {
            $uid = $row_services['uid'];
          }
        //to display fields from db services table
        $sql_services = "select * from services where uid = '$id_profile'";
        $result_services = mysqli_query($conn, $sql_services); 
      }
      //for solution
      if(isset($_POST['solution']))
      {
        $solution = $_POST['solution'];
        $id = $_POST['labelid'];
        $sql_solve ="update services set solution='$solution' where id='$id' ";
        $result_solve = mysqli_query($conn,$sql_solve);
        if($result_solve)
        {
            echo"uploaded";
        }
        else
        {
          echo mysqli_error($conn);
        }
      }  
 ?>
   
</head>

<body>
<div class="container-fluid">
  <!-- <form class="form-horizontal" role="form" id="frminput"> -->
    <fieldset>
    <center>
       <p> </center>
      <!--Table-->
      <div class="card mb-3">
        <div class="card-header"> <i class="fa fa-table"></i> All Tickets Submitted </div>         
        <div class="card-body"> 
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Ticket Number</th>
                  <th> First Name
                  <th> Extension Number
                  <th>Date</th>
                  <th>Attachment</th>
                  <th>Type Of Service</th>
                  <th>Description </th>
                  <th>Priority</th>
                  <th>Solution</th>
                </tr>
              </thead>             
              <tbody>
                 
              <?php 
                    while ($row_services = mysqli_fetch_assoc($result_services)) 
                    {
               ?>
                <tr>
                    <td><?php echo $row_services["id"]; ?>
                    <td><?php echo $fname; ?>
                    <td> <?php echo  $extension;  ?>
                    <td><?php echo $row_services["reportdate"]; ?> 
                    <td>  <?php echo $row_services["attachment"]; ?><a>
                    
                    <td><?php echo $row_services["tos"]; ?>
                    <td><?php echo $row_services["description"]; ?>
                    <td><?php echo $row_services["priority"]; ?>
                    <td> <textarea disabled name="solution" style="width:400px; height:30px;" required id="solutions"><?php echo $row_services['solution']; ?></textarea>                    
              </tbody>
              <?php
                 
                   }
              ?>
              <tfoot>
                <tr>
                  <th>Ticket Number</th>
                  <th> First Name
                  <th> Extension Number
                  <th>Date</th> 
                  <th>Attachment</th>
                  <th>Type Of Service</th>
                  <th>Description </th>
                  <th>Priority</th>
                  <th>Sloution</th>
                </tr>
                 
                 
              </tfoot>
              
                
            </table>
          </div>
        </div>
    </div> 
     
  </fieldset>
  </form>
</div>
</body>

</html>