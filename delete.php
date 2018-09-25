<?php
     require 'link.php';
    if(isset($_POST["delDept"]))
        {
            $checkbox=$_POST['delvalue'];
            echo $checkbox."<br>";
            $sql ="delete from departments where id='$checkbox'";
            $result = mysqli_query($conn,$sql);
            if($result)
            {
                echo "deleted";
                echo '<script type="text/javascript">
                    window.location.href="dept.php";
                </script>';
            }
            else
            {
                echo"not deleted";
            }
           
        }
       
        