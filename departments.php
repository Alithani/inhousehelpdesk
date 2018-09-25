<!DOCTYPE html>
<html>

<head>
<?php
      include('session.php');
      include('loginscript.php'); 
      require("header.php"); 
      $sql_services = "select * from departments  order by `deptName` asc";
      $result_services = mysqli_query($conn, $sql_services);
      if(isset($_POST['addDept']))
      {
        $deptName = $_POST['deptName'];          
        $sql_check ="select * from departments where deptName ='$deptName'";
        $result_check =mysqli_query($conn,$sql_check);
        $num_rows = mysqli_num_rows($result_check);
        if($num_rows==0)
        {
          $sql_solve =" insert into departments (deptName) values ('$deptName')";
            $result_solve = mysqli_query($conn,$sql_solve);
            if($result_solve)
            {
                $message = "Saved" ;
                echo "<script type='text/javascript'>alert('$message');</script>";
                echo '<script type="text/javascript">
                    window.location.href="departments.php";
                </script>';
            }
            else
            {
            echo mysqli_error($conn);
            }            
        }
        else if($num_rows==1)
        {
          $message = "Department already stored" ;
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
        
      } 
      if(isset($_POST['updateName']))
      {
        $name = $_POST['solution'];
        $idDept = $_POST['idDept'];       
        $sql_verify ="select * from departments where deptName ='$name'";
        $result_verify =mysqli_query($conn,$sql_verify); 
        $num_rows_update = mysqli_num_rows($result_verify);
        if($num_rows_update==1)
        {
          $message = "Department already stored" ;
          echo "<script type='text/javascript'>alert('$message');</script>";
          
        }
        else
        {
          $sql_update ="update departments set deptName ='$name' where id='$idDept'";
          $result_update = mysqli_query($conn,$sql_update);
          if($result_update)
          {
            echo mysqli_error($conn);
            echo '<script type="text/javascript">
            window.location.href="departments.php";
            </script>';
          }
          else  if($num_rows_update==0)
          {
            echo"uploaded";
              echo '<script type="text/javascript">
                      window.location.href="departments.php";
                  </script>';
           

          }
         
         
        } 
      }

     
      

      
 ?>
   
</head>

<body>
<div class="container-fluid">
  <fieldset>
    <center>
      <legend>Add Departments</legend></center>
      <!--Table-->
      <div class="card mb-3">
        <div class="card-header"> <i class="fa fa-table"></i> Stored Department  </div>         
        <div class="card-body"> 
          <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Delete</th>
                  <th>Department Name</th>
                </tr>
              </thead>             
              <tbody>
             <?php
                    while ($row = mysqli_fetch_assoc($result_services)) 
                    {
                    echo "<tr>";
                    echo "<td height='10'>"; ?> <a class="quote  " href="#quote_modal_<?php echo $row['id']; ?>" title="">Edit Department Name</a>
                    <!--Quote Popup Window update Modal-->
                      <div id="quote_modal_<?php echo $row['id']; ?>" class="QuoteModal">
                        <div class="popup_modal">
                          <div>
                            <a href="#close" title="Close" class="fclose">X</a>
                            <h3>Type your Department Name here</h3>
                          </div>
                          <div>
                            <form role="form" class="text-center" action=""  method="post" >
                                <div class="form-group">
                                  <input type="text"  class="form-control"  name=" idDept"  readonly value="<?php echo $row['id']; ?>">
                                </div>
                                <div class="form-group">
                                  <input type="text"  class="form-control"  name=" solution">
                                </div>
                            </div>
                            <div>

                              <button type="submit" id="updateName_<?php echo $row['id']; ?>"class="btn btn-primary"name="updateName">Update Name</button>
                            </div>
                          </form> 
                        </div>
                      </div> <?php echo "</td>";
                    echo "<td>"; echo $row["deptName"]; echo "</td>";
                    echo "</tr>";
                    }
                ?>
                </tbody>
                <?php
                        //  }
                    ?>
                <tfoot>
                 <tr>
                    <th>Delete</th>
                    <th>Department Name</th>
                 </tr>
                </tfoot>
                </table>
              <a class="quote btn btn-md btn-primary" href="#quote_modal" title="">Add Department</a>
                          <!--Quote Popup Window like Modal-->
                            <div id="quote_modal" class="QuoteModal">
                              <div class="popup_modal">
                                <div>
                                  <a href="#close" title="Close" class="fclose">X</a>
                                  <h3>New Department</h3>
                                </div>
                                <div>
                                  <form role="form" class="text-center" method="post" action="departments.php">
                                      <div class="form-group">
                                        <input required class="form-control" placeholder="Enter Department Name"   name="deptName"></input>
                                      </div>
                                  </div>
                                  <div>

                                    <button type="submit" id="addDept"class="btn btn-primary"name="addDept">Add Department</button>
                                  </div>
                                </form> 
                              </div>
                            </div>
          </div>
        </div>
    </div> 
     
  </fieldset>
  
</div>
<?php require("footer.php"); ?>
</body>

</html>