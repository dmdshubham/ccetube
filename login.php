<?php
 include_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADMIN-LOGIN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <br><img src="images/header.jpg" alt="logo" class="img-responsive headimg">
</div>
    <div class="container">
   <nav class="navbar navbar-inverse" style="border-radius: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand" href="#">CCETUBE</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../ccetube/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="contacts.php"><span class="glyphicon glyphicon-earphone"></span> Contacts</a></li>
        <li><a href="about.php"><span class="glyphicon glyphicon-user"></span> About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 formarea">
            <div class="form">
            <h2>LOGIN</h2>				
            <form method="post" action="">
            <div class="form-group">
                <input type="email" id="email" name="email" required="required" placeholder="E-mail" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-group center">
                <button class="btn btn-success btn-sm btn-block" name="submit" style="width:50%; margin:auto;">Login</button>
            </div>
		    <div class="errmsg">
			   <?php 
                if(isset($_REQUEST["err"])){echo"Invalid Username or Password";}
                if(isset($_POST['submit']))
	               {
                       $username = $_POST['email'];
                       $pass =  $_POST['password'];
                       $query = mysqli_query($con,"select * from login where email='$username' AND password='$pass'");
                       if(mysqli_num_rows($query) == 1)
                        {
                            $row = mysqli_fetch_array($query);
                            if(strcmp($row['type'],"admin") == 0)
                            {
                                session_start();
                                $_SESSION['email']=$username;
                                setcookie("admin_login","1"); 
                                header("Location:admin_home.php");
                            }
                            else if(strcmp($row['type'],"user") == 0)
                            {
                            	  session_start();
                                $_SESSION['email']=$username;
                                setcookie("user_login","1"); 
                                header("Location:user_home.php");
                            }
                            else
                            {
                            	  session_start();
                                $_SESSION['email']=$username;
                                setcookie("member_login","1"); 
                                header("Location:member_home.php");
                            }
                        }
                       else
		                {
			                 echo "Invalid Username or Password";	 
                        }      
                   } 
							
               ?>	
            </div>
            </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
    </div>
    <br><br><br>
    
    
<div class="container">
    <div class="footer">
            <p>&copy; ccetube, U<sub>o</sub>A, all rights reserved.</p>
        </div>
</div>
</body>
</html>
