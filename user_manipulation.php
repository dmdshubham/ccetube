<?php
 include_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid"><br>
  <div class="row">
    <div class="col-sm-6 col-xs-12 center">
      <h2>INSERT USER</h2><h5>Through</h5><br>
        <a href="new_exe/" class="button" target="panel">By .XLS File</a><br><br><h5>Or</h5><br>
        <a href="insert_user.php" class="button" target="panel">Manual Details</a>
    </div>
      <div class="col-sm-6 col-xs-12 center">
        <h2>DISPLAY ALL USER AND DELETE</h2>
          <form class="center" role="form" method="post" action="">
            <div class="form-group">
              <input type="text" id="course" name="course" required="required" placeholder="ENTER COURSE NAME" class="form-control">
            </div>		  
            <div class="form-group">
                <input type="text" id="year" name="year" required="required" placeholder="year" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-md btn-block" name="all_submit">SUBMIT</button>
            </div>
		 </form>
    </div>
  </div>
  <div class="row">
      <div class="col-sm-12 center">
           <?php               
            //delete query
    
                if(isset($_POST['sub']))
                {
                    $id = implode("','" , $_POST['id']);
                    $query = "delete from student where email in ('".$id."')";
                    $query_l = "delete from login where email in ('".$id."')";
                    if(mysqli_query($con,$query) && mysqli_query($con,$query_l))
                    {
                       ?> <h2>Selected User Deleted</h2> <?php
                    }
                    else
                    {
                        ?> <h2>Selected User not Deleted</h2> <?php
                    }
                }
	  
	
            // end delete query 
 
   
                if(isset($_POST['all_submit']))
                    {
                        $course=$_POST['course'] ;
                        $year=$_POST['year'] ;
                        $s=" SELECT * FROM `student` WHERE yr=$year AND cou='$course'" ;
	 
                        echo "<form method='POST'>";
                        $resource=mysqli_query($con,$s);  
                        echo "<table class='book_bank' style='margin: auto;'>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>NAME</th>";
                        echo "<th>EMAIL</th>";
                        echo "<th>PASSWORD</th>";
                        echo "<th>SEMESTER</th>";
                        echo "<th>YEAR</th>";
                        echo "<th>COURSE</th>";
                        echo "<th>Delete</th>";
                        echo "</tr>";
	
                        while($row = mysqli_fetch_array($resource)) 
                            {
	                            $pwd_q = "select password from login where email='$row[2]'";
                                $pwd_r = mysqli_query($con,$pwd_q);
                                $row_r = mysqli_fetch_array($pwd_r);
                                echo "<tr>"; 
                                echo "<td>".$row[0]."</td>";
                                echo "<td>".$row[1]."</td>";
                                echo "<td>".$row[2]."</td>";
                                echo "<td>".$row_r[0]."</td>";
                                echo "<td>".$row[3]."</td>";
                                echo "<td>".$row[4]."</td>";
                                echo "<td>".$row[5]."</td>";
		
                                echo "<td><input type='checkbox' name='id[]' value='".$row[2]."'></td>";
                                echo "</tr>";
		
                            }
                        echo "</table>";
	 
                        echo "<br>";
                        echo "<input type='submit' value='Delete Selected' name='sub' id='sub' class='delete'/> ";
                        echo "</form>";
                    }
          ?>
      </div>
  </div>
</div><br>
</body>
</html>
