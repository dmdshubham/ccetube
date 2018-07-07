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
        <div class="col-sm-3"></div>
        <div class="col-sm-6 center">
            <h1>CHANGE YOUR PASSWORD</h1>
			<form role="form" method="post" action="">
                <div class="form-group">
	               <input type="text" id="old_pass" name="old_pass" required="required" placeholder="Old Password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" id="new_password" name="new_password" required="required" placeholder="New Password" class="form-control">
                </div>
                <div class="form-group">
				    <input type="password" id="cnf_password" name="cnf_password" required="required" placeholder="Confirm Password" class="form-control">
                </div>
                <div class="form-group">                  
                    <button class="btn btn-success btn-md btn-block" name="update_submit">SUBMIT</button>
                </div>
                <div class="form-group">                  
                    <?php
                    if(isset($_POST['update_submit']))
                    {
                        session_start();
                        $old_pass = $_POST['old_pass'];
                        $new_pass = $_POST['new_password'];
                        $cnf_pass = $_POST['cnf_password'];
                        $id = $_SESSION['email'];
                        
                        $result = mysqli_query($con,"select * from login where email='$id' and password='$old_pass'");
                        if($new_pass == $cnf_pass)
                        {
                            if(mysqli_num_rows($result) == 1)
                            {
                                mysqli_query($con,"update login set `password`='$new_pass' where email='$id'");
                                echo "<p style='color:green;'>Password changed successfully</p>";
                            }
                            else
                            {
                                echo"<p style='color:red;'>Your old password is incorrect</p>";
                                echo "kxjhgkx";
                            }		  		  
                        }
                        else
                        {
                            echo "<p style='color:red;'>Confirm password not match</p>";
                        }   
                    }
                    ?>
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</body>
</html>
				 
				 

