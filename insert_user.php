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
<div class="container-fluid center">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 col-xs-12">
        <h1>USER DETAILS</h1>
        <form role="form" method="post" action="">
           <div class="form-group">
            <input type="TEXT" id="user_name" name="user_name" required="required" placeholder="Enter user's name" class="form-control">
            </div>
            <div class="form-group">
               <input type="email" id="email" name="email" required="required" placeholder="E-mail" class="form-control">
            </div>
           <div class="form-group">
               <input type="password" id="password" name="password" required="required" placeholder="Password" class="form-control">
            </div>
            <div class="form-group">
               <input type="password" id="cpassword" name="cpassword" required="required" placeholder="Confirm password" class="form-control">
            </div>
            <div class="form-group">
                <input type="TEXT" id="sem" name="sem" required="required" placeholder="semester" class="form-control">
            </div>
            <div class="form-group">
                <input type="TEXT" id="yr" name="yr" required="required" placeholder="year" class="form-control">
            </div>
            <div class="form-group">
                <input type="TEXT" id="course" name="course" required="required" placeholder="Course name" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-md btn-block" name="submit" onclick="return validate()">SUBMIT</button>
            </div>
        </form>
        <?php
            if(isset($_POST['submit']))
				{
                    $name = $_POST['user_name'];
				    $emai = $_POST['email'] ;
				    $pass = $_POST['password'];
                    $sem = $_POST['sem'];
                    $yr = $_POST['yr'];
                    $course = $_POST['course'];
		      
                    //check email exist or not
                    $query= mysqli_query("select * from student where email='$emai'");
				    if((mysqli_fetch_array($con,$query) > 0))
				        {
			              echo '<p style="font-family:bold font-size:1000px">email already registered</p>';
                        }
				    else
                        {
			             if(mysqli_query($con,"insert into student(name,email,password,sem,yr,cou)VALUES ('$name','$emai','$pass','$sem','$yr','$course')") && mysqli_query($con,"insert into login values ('$emai','$pass','user')"))
				            {
                                echo "User inserted successfully";
				            }
                        else
                            {
                                echo "User not inserted";
                            }
				        }
				}				
        ?>
    </div>
    <div class="col-sm-3"></div>
  </div>
</div><br>

    <script>
        function validate()
        {
            var pwd = document.getElementById('password');
            var cpwd = document.getElementById('cpassword');
            if(/\d/.test(pwd.value) && /[a-zA-Z]/.test(pwd.value))
                {
                   if(pwd.value == cpwd.value)
                    {
                        return true;
                    }
                    else
                    {
                        alert('Password not confirmed');
                        pwd.focus();
                        return false;
                    }
                }
            else
                {
                    alert('Password must contain Digits & Letters both');
                    pwd.focus();
                    return false;
                }
        }
    </script>
    
</body>
</html>
