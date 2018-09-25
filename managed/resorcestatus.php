<!DOCTYPE html>
<html>
<head>
  <?php
        include('session.php');
        require("header.php");
        include('datadisplay.php'); 
        //to check if session isset
      if(!isset($_SESSION['email']) /*== TRUE*/)
      {      
        echo '<script>window.location.href="login.php";</script>';             
        }
      else 
      {
        // items from db services
       $sql =  "select * from request  where uid = '$id_profile'";    
       $result= mysqli_query($conn, $sql);        
      }
       
  ?>

</head>
<body>
<div class="container-fluid"  id="main">
  <form class="form-horizontal" role="form" id="frminput">
    <fieldset>
    <center>
       <p></legend></center>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Tickets Submitted</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Ticket Number</th>
                  <th>Item</th>
                  <th>Date Taken</th>
                  <th>Return Date</th>
                  <th>Description </th>
                  <th>Venue</th>
                  <th>Taken By</th>
                </tr>
              </thead>            
              <tbody>
                <tr>
                <?php
                  while ($row = mysqli_fetch_assoc($result)) 
                  {
                    $id = $row['id'];
                    $uid = $row['uid'];
                    $tor =$row['tor'];
                    $ddate =$row['datetaken'];
                    $rdate =$row['returndate'];
                    $description =$row['description'];
                    $venue = $row['venue'];
                 
                ?>
                  <td><?php echo $id ?></td>
                  <td><?php echo $tor ?></td>
                  <td><?php echo $ddate ?></td>
                  <td><?php echo $rdate ?></td>
                  <td><?php echo $description ?></td>
                  <td><?php echo $venue ?></td>
                  <td><?php echo $fname_proifle; ?></td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Ticket Number</th>
                  <th>Item</th>
                  <th>Date Taken</th>
                  <th>Return Date</th>
                  <th>Description </th>
                  <th>Venue</th>
                  <th>Taken By</th>
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