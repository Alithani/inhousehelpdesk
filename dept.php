<!DOCTYPE html>
<html>

<head>
<?php
      include('session.php');
      include('loginscript.php'); 
      require("header.php"); 
      $sql_services = "select * from departments  order by deptName asc";
      $result_services = mysqli_query($conn, $sql_services);
    
      
 ?>
   
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
                  <th>Delete</th>
                  <th>Department Name</th>
                </tr>
              </thead>             
              <tbody>
              <form name="form1" action="delete.php" method="post">
                <?php
                    while ($row = mysqli_fetch_assoc($result_services)) 
                    {
                    echo "<tr>";
                    echo "<td>"; ?> <input type="radio" name="delvalue"  value="<?php echo $row["id"]; ?>" /> <?php echo "</td>";
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
                 
                <!-- <a  data-toggle="modal" data-target="#exampleModal1"> -->
                <button type="submit" id="deldept"class="btn btn-primary"name="delDept">Delete Department</button>
                 
              </form>
              
          </div>
        </div>
    </div> 
     
  </fieldset>
  <!-- </form> -->
  <?php



	
	?>
	<!-- <script type="text/javascript">
	window.location.href=window.location.href;
	</script> -->
	<?php
// }

?>
</div>

<?php require("footer.php"); ?> 
</body>

</html>