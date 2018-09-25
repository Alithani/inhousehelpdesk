<?php
      include('loginscript.php'); 
      include('datadisplay.php'); 
     require("header.php");
     
        
?>
          
          <!DOCTYPE html>
    <html>

    <head>
       
        <title>Home</title>

    </head>

    <body>
     <div class="container-fluid" id="main">
            <div class=" bg-info row clearfix">
                <div class="col-md-12 column">
                    <div>
                        <br>
                        <div class="panel-group white" id="panel-profile">
                            <div class="panel panel-default white">
                                <div class="panel-heading white">
                                    <center>
                                        <a class="panel-title">Details</a>
                                    </center>
                                </div>

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-3" id="right-col" > 
                                            <div class="card card-body" height="30%">
                                               <div id="change_head" > 
                                               <h4 class="card-title"><hr>Profile photo</hr></h4><br>
                                                
                                                <?php
                                                // to display pic corrections to be made 
                                                    $files = glob("images/*.*");

                                                    for ($i=0; $i<count($files); $i++) {
                                                        $image = $files[$i];
                                                        
                                                        }
                                                        if($image = $picture)
                                                        {
                                                            // print $image ."<br />";?>
                                                        <img class="img-fluid" src="images/<?php echo $image;?>" alt="Random image" /><br /><br />
                                                 <?php }?>
                                                 </div>
                                                <!-- <img class="img-fluid" src="images/1.jpg"> -->
                                            </div>
                                        </div>
                                        <div class="col-sm-9" id="right-col" ><p></p>
                                            <div class="card card-body">
                                                <h4 class="card-title">General Information</h4>
                                                <p class="card-text">First Name: <?php echo $fname; ?></p>
                                                <p class="card-text">Last Name: <?php echo $lname; ?></p>
                                                <p class="card-text">Gender: <?php echo $gender;?></p>
                                                <p class="card-text">Email: <?php echo $set_email; ?></p>
                                                <p class="card-text">Department: <?php echo $dept;?></p>
                                                <p class="card-text">Profession: <?php echo $profession;?></p>
                                                <p class="card-text">Extension Number: <?php echo $extension?></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <?php require("footer.php");?>