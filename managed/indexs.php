<?php
  
   require 'link.php';
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Modern Business - Start Bootstrap Template</title>
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container" name="navmain">
        <a class="navbar-brand" href="index.php">Customer Support System</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="about.html"> Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.html"> New Ticket</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html"> All Tickets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html"> Request For Resources</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">  All Resource Requests</a>
            </li>
            <li class="nav-item ">
               <a class="nav-link " data-toggle="modal" data-target="#exampleModal" name="btnlogout"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>           
              </div>
            </li>
          </ul>
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
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
            <form method="post">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>            
              <a type="submit" class="btn btn-primary" href="logout.php" name="logout">Logout</a> 
              </div></div></div></div>