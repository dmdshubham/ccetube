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
            <h1>ADD OR DELETE MEMBERS</h1><hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 center">
            <h2>ADD MEMBER</h2>
                <form role="form" method="post" action="">
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
                        $emai = $_POST['email'] ;
				    $pass = $_POST['password'];
               
			         //check email exist or not
                    $query= mysqli_query($con," select * from login where email='$emai'");
					  
					  if((mysqli_fetch_array($query) > 0))
						  {
			              echo "Member already exist";
						  }
						  else
						  {
			   
                              if(mysqli_query($con,"insert into login values('$emai','$pass','member')"))
				                {
                                    echo "Member's data inserted successfully.";
				                }
                              else
                              {
                                  echo "Member's data not inserted.";
                              }
				          }
                   }				
			   ?>
        </div>
        <div class="col-sm-6 center">
            <h2>DELETE MEMBER</h2>  
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
				 if((mysqli_query($con,"DELETE FROM `login` WHERE email='$email'")) > 0)
				 {
					 echo "Member's data successfully deleted.";
				 }
                 else
				 {
                 echo "Member's data does not exist.";
				 }				 
			}
			?>
        </div>
    </div>
</div>
</body>
</html>
