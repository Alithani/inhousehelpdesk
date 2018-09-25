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
        
       
        //to display fields from db services table
        $sql_services = "select * from services  ";
        $result_services = mysqli_query($conn, $sql_services);
         
          while ($row_services = mysqli_fetch_assoc($result_services)) 
          {
            $uid = $row_services['uid'];
          }
        
        
        // items from db services
          $sql = "select services.id,services.tos,services.description,services.attachment,services.priority,services.reportdate,services.solution ,profile.fname, profile.extension
          FROM services INNER JOIN profile  ON profile.id=services.uid order by services.id desc";
          $result = mysqli_query($conn, $sql);
      }
      //for solution
      if(isset($_POST['solve']))
      {
        $solution = $_POST['solution'];
        echo $solution;
        $id = $_POST['labelid'];
        $sql_solve ="update services set solution='$solution' where id='$id'";
        $result_solve = mysqli_query($conn,$sql_solve);
        if($result_solve)
        {
            echo"uploaded";
            echo '<script type="text/javascript">
                    window.location.href="alltickets.php";
                </script>';
        }
        else
        {
          echo mysqli_error($conn);
          echo '<script type="text/javascript">
          window.location.href="alltickets.php";
      </script>';

        }
      }
     
   
 ?>
   
</head>

<body>
<div class="container-fluid">
  <!-- <form class="form-horizontal" role="form" id="frminput"> -->
    <fieldset>
    <center>
      <legend>All Tickets</legend></center>
      <!--Table-->
      <div class="card mb-3">
        <div class="card-header"> <i class="fa fa-table"></i> All Tickets Submitted </div>         
        <div class="card-body"> 
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Solve</th>
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
                  while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                    <td> <a class="quote btn btn-md btn-primary" href="#quote_modal_<?php echo $row['id']; ?>" title="">Solve</a>
                          <!--Quote Popup Window like Modal-->
                            <div id="quote_modal_<?php echo $row['id']; ?>" class="QuoteModal">
                              <div class="popup_modal">
                                <div>
                                  <a href="#close" title="Close" class="fclose">X</a>
                                  <h3>Type your solution here</h3>
                                </div>
                                <div>
                                  <form role="form" class="text-center" method="post" action="alltickets.php">
                                      <div class="form-group">
                                        <input type="text"  class="form-control"  name=" labelid"  readonly value="<?php echo $row['id']; ?>">
                                      </div>
                                      <div class="form-group">
                                        <textarea rows="10" required class="form-control" placeholder="Message"   name="solution"></textarea>
                                      </div>
                                  </div>
                                  <div>

                                    <button type="submit" id="solve_<?php echo $row['id']; ?>"class="btn btn-warning"name="solve">Post Solution</button>
                                  </div>
                                </form> 
                              </div>
                            </div>
                    
        
                    <td><?php echo $row["id"]; ?>
                    <td><?php echo $row['fname'] ;  ?>
                    <td> <?php echo $row['extension']; ?>
                    <td><?php echo $row["reportdate"]; ?>
                    <td> <a href="#quote_modals_<?php echo $row['id']; ?>"> <?php echo $row["attachment"]; ?><a>
                    <div id="quote_modals_<?php echo $row['id']; ?>" class="QuoteModal">
                              <div class="popup_modal">
                                <div>
                                  <a href="#close" title="Close" class="fclose">X</a>
                                  <h3>Type your solution here</h3>
                                </div>
                                <div>
                                  <form role="form" class="text-center" method="post" action="alltickets.php">
                                    <div class="form-group">
                                    <?php
                                    // to display pic corrections to be made 
                                                    
                                                    $files = glob("images/tickets/*.*");
                                                    $picture = $row['attachment'];
                                                    for ($i=0; $i<count($files); $i++) {
                                                        $image = $files[$i];
                                                        
                                                        }
                                                        if($image = $picture)
                                                        {
                                                            // print $image ."<br />";?>
                                                        <img class="img-fluid" src="images/tickets/<?php echo $image;?>" alt="Random image" /><br /><br />
                                                 <?php }?>
                                    </div>
                                   <!-- </div> -->
                                
                       </form> 
                    <td><?php echo $row["tos"]; ?>
                    <td><?php echo $row["description"]; ?>
                    <td><?php echo $row["priority"]; ?>
                    <td> <textarea disabled name="solution" style="width:400px; height:30px;" required id="solutions"><?php echo $row['solution']; ?></textarea>                    
              </tbody>
              <?php
                      //  }
                   }?>
              <tfoot>
                <tr>
                  <th>Solve</th>
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
<?php require("footer.php"); ?>
</body>

</html>