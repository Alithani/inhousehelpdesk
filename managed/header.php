<?php  
   require 'link.php';
   require 'session.php';
   include('datadisplay.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <title>CRM</title>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top navbar-inverse">
    <a class="navbar-brand" href="index.php">Customer Support System</a>
      <div class="container" id="navmain">
       
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="index.php"><i class="fa fa-user-circle-o"></i> Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bookassets.php"><i class="fa fa-plus-square"></i> New Ticket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="alltickets.php"><i class="fa fa-navicon"></i> All Tickets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="request.php"> <i class="fa fa-plus-square"></i> Request For Resources</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="resorcestatus.php"><i class="fa fa-navicon"></i>  All Resource Requests</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-envelope"></i>Messages
                
                  <!-- <span class="badge badge-pill badge-primary"></span> -->
                <!-- </span> -->
             
                   
                <!-- </span> -->
              </a>
              <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            
                <?php              
                    $sql = "select * from services where uid = '$id_profile'";
                    $result = mysqli_query($conn, $sql);
                    while ($row_services = mysqli_fetch_assoc($result)) 
                      {
                        
                        $solution = $row_services['solution'];
                        if(empty($solution))
                        {
                          echo "No Message"."<br>";
                        }
                        else
                        {
                          // while ($row_services = mysqli_fetch_assoc($result)) 
                          // {
                            
                            echo $solution."<br>" ;
                          // }
                        }
                      }
                      
                    
                    
                ?>
              </div>
                    
        </div>  
        <a class="nav-link text-white" data-toggle="modal" data-target="#exampleModal" id="btnlogout"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
         
        </div>
      </div>
    </nav>
    <body>
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
          </button>
        </div>
        <div>
              <?php 
                  $sql_name = "select ";
              ?>      
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
            <form method="post">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>            
              <a type="submit" class="btn btn-primary" href="logout.php" name="logout">Logout</a> 
              </div></div></div></div>
              </form>