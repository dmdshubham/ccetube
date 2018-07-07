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
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 center">
            <h1>ADD,UPDATE AND DELETE FACULTIES</h1><hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 center">
            <h2>ADD FACULTY</h2>
                <form role="form" method="post" action="">
                   <div class="form-group">
                       <input type="TEXT" id="user_name" name="user_name" required="required" placeholder="Enter Faculty's Name" class="form-control">
                    </div>
					<div class="form-group">	  
                        <input type="email" id="email" name="email" required="required" placeholder="E-mail" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" required="required" placeholder="Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-md btn-block" name="submit">SUBMIT</button>
                    </div>
		        </form>
			    <?php
			       if(isset($_POST['submit']))
				   {
                    $name = $_POST['user_name'];
				    $emai = $_POST['email'] ;
				    $pass = $_POST['password'];
               
			         //check email exist or not
                    $query= mysqli_query($con," select * from faculty where email='$emai'");
					  
					  if((mysqli_fetch_array($query) > 0))
						  {
			              echo "Faculty Member already exist";
						  }
						  else
						  {
			   
                              if(mysqli_query($con,"insert into faculty(name,email,password)VALUES ('$name','$emai','$pass')"))
				                {
                                    echo "Faculty member's data inserted successfully.";
				                }
                              else
                              {
                                  echo "Faculty member's data not inserted.";
                              }
				          }
                   }				
			   ?>
        </div>
        <div class="col-sm-6 center">
            <h2>DELETE FACULTY</h2>  
                <form role="form" method="post" action="">
					 <div class="form-group">
                         <input type="email" id="email" name="email" required="required" placeholder="E-mail" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-md btn-block" name="delete">SUBMIT</button>
                    </div>
		        </form>
		    <?php 
			if(isset($_POST['delete']))
			{
				$email=$_POST['email'];
				 if((mysqli_query($con,"DELETE FROM `FACULTY` WHERE email='$email'")) > 0)
				 {
					 echo "Faculty member's data successfully deleted.";
				 }
                 else
				 {
                 echo "Faculty member's data does not exist.";
				 }				 
			}
			?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 center">
            <h2>SEARCH FACULTY</h2>                  
                <form role="form" method="post" action="">
					<div class="form-group">
                        <input type="email" id="email" name="email" required="required" placeholder="E-mail" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-md btn-block" name="search">SEARCH</button>
                    </div>
		        </form>
		        <table class="book_bank" style="margin: auto;">
			    <tr>
				  <th>NAME</th>
				  <th>EMAIL</th>
				  <th>PASSWORD</th>
				  </tr>
				  <?php 
				  if(isset($_POST['search']))
				  {
					  $email=$_POST['email'];
					  $query= mysqli_query($con, "select * from FACULTY where email='$email'");
					  while($result = mysqli_fetch_array($query))
					  {
						  ?>
						  <tr>
						  
						  <td><?php echo $result['name'];?></td>
						  <td><?php echo $result['email'];?></td>
                          <td><?php echo $result['password'];?></td>
                            </tr>
						  <?php
						  
					  }
					  }
					  
				  
				  ?>
				  
				  </table>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</body>
</html>
