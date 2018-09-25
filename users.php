<?php
      include('session.php');
      include('loginscript.php'); 
      require("header.php"); 
      $sql_services = "select * from profile  order by fname asc";
      $result_services = mysqli_query($conn, $sql_services);
      if(isset($_POST["delDept"]))
      {
          $checkbox=$_POST['delvalue']; 
          $sql ="delete from profile where id='$checkbox'";
          $result = mysqli_query($conn,$sql);
          if($result)
          {
              echo "deleted";
              echo '<script type="text/javascript">
                  window.location.href="users.php";
              </script>';
          }
          else
          {
              echo"not deleted";
          }
         
      }
      
 ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div class="container-fluid">
  <!-- <form class="form-horizontal" role="form" id="frminput"> -->
    <fieldset>
    <center>
      <legend>Delete Departments</legend></center>
      <!--Table-->
      <div class="card mb-3">
        <div class="card-header"> <i class="fa fa-table"></i> Please Delete one Department at a time </div>         
        <div class="card-body"> 
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Delete </th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email </th>
                  <th>Department</th>
                  <th>Profession </th>
                  <th>Gender </th>
                  <th>Password</th>
                  <th>Extension</th>
                  <th>Pictire </th>
                </tr>
              </thead>             
              <tbody>
              <form name="form1" action="users.php" method="post">
                <?php
                    while ($row = mysqli_fetch_assoc($result_services)) 
                    {

                        echo "<tr>";
                        echo "<td>"; ?> <input type="radio" name="delvalue"  value="<?php echo $row["id"]; ?>" /> <?php echo "</td>";
                        echo "<td>"; echo $row["fname"]; echo "</td>";
                        echo "<td>"; echo $row["lname"]; echo "</td>";
                        echo "<td>"; echo $row["email"]; echo "</td>";
                        echo "<td>"; echo $row["dept"]; echo "</td>";
                        echo "<td>"; echo $row["profession"]; echo "</td>";
                        echo "<td>"; echo $row["gender"]; echo "</td>";
                        echo "<td>"; echo $row["pass"]; echo "</td>";
                        echo "<td>"; echo $row["extension"]; echo "</td>";
                        // echo "</tr>";
                        ?>
                        <td> <a href="#quote_modals_<?php echo $row['id']; ?>"> <?php echo $row["picture"]; ?><a>
                        <div id="quote_modals_<?php echo $row['id']; ?>" class="QuoteModal">
                                <div class="popup_modal">
                                    <div>
                                    <a href="#close" title="Close" class="fclose">X</a>
                                    <h3>Profile Picture</h3>
                                    </div>
                                    <div>
                                    <form role="form" class="text-center" method="post" action="users.php">
                                        <div class="form-group">
                                        <?php
                                        // to display pic corrections to be made 
                                                        
                                                        $files = glob("images/*.*");
                                                        $picture = $row['picture'];
                                                        for ($i=0; $i<count($files); $i++) {
                                                            $image = $files[$i];
                                                            
                                                            }
                                                            if($image = $picture)
                                                            {
                                                                // print $image ."<br />";?>
                                                            <img class="img-fluid" src="images/<?php echo $image;?>" alt="Random image" /><br /><br />
                                                    <?php }?>
                                        </div>
                                    <!-- </div> -->
                                    
                        <!-- </form>  -->
                   <?php }?>
                ?>
                </tbody>
                <?php
                        //  }
                    ?>
                <tfoot>
                 <tr>
                    <th>Delete </th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email </th>
                    <th>Department</th>
                    <th>Profession </th>
                    <th>Gender </th>
                    <th>Password</th>
                    <th>Extension</th>
                    <th>Pictire </th>
                 </tr>
                </tfoot>
                </table> 
                <button type="submit" id="deldept"class="btn btn-primary"name="delDept">Delete Department</button>
                 
              </form>
              
          </div>
        </div>
    </div> 
     
  </fieldset>
</div>

<?php require("footer.php"); ?>
 
</body>

</html>