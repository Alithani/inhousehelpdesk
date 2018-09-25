<?php 
    require("link.php");
    include('datadisplay.php');   
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!--contain formart links-->

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CRS</title>
  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Customer Support System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
          <a class="nav-link" href="index.php">
            <i class="fa fa-user-circle-o"></i>
            <span class="nav-link-text">Profile</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tickets">
          <a class="nav-link" href="bookassets.php">
            <i class="fa fa-plus-square"></i>
            <span class="nav-link-text">New Ticket</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="All">
          <a class="nav-link" href="alltickets.php">
            <i class="fa fa-navicon"></i>
            <span class="nav-link-text">All Tickets</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Requests">
          <a class="nav-link" href="request.php">
            <i class="fa fa-plus-square"></i>
            <span class="nav-link-text">Request For Resource</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="All">
          <a class="nav-link" href="resorcestatus.php">
            <i class="fa fa-navicon"></i>
            <span class="nav-link-text">All Resource Requests</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Departments</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseMulti">
              <li>
                <a href="departments.php">Add Department</a>
              </li>
              <li>
                <a href="dept.php">Delete Departments</a>
              </li>
          </li>
        </ul>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tickets">
          <a class="nav-link" href="users.php">
            <i class="fa fa-user"></i>
            <span class="nav-link-text">Users</span>
          </a>
      </ul>
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary"></span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <?php              
                $sql = "select * from services where uid = '$id_profile'";
                $result = mysqli_query($conn, $sql);
                while ($row_services = mysqli_fetch_array($result)) 
                  {
                    $solution = $row_services['solution'];
                    if(empty($solution))
                    {
                      echo"No Message"."<br>";
                    }
                    else
                    {?>
                     <?php  echo $solution."<br>";
                    }
                  }
                
            ?>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">      
  </div>

