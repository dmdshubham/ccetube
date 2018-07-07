<!DOCTYPE html>
<html lang="en">
<head>
  <title>CCETUBE-HOME</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <br><img src="images/header.jpg" alt="logo" class="img-responsive">

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
          <li class="active"><a href="default.html" target="panel"><b>ADMIN PANEL</b></a></li>
          <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">E-Books <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="upload_book.php" target="panel">Upload E-Books</a></li>
                  <li><a href="book_bank.php" target="panel">View/Delete E-Books</a></li>
              </ul>
          </li>
          <li><a href="user_manipulation.php" target="panel">Users</a></li>
          <li><a href="faculty_manipulation.php" target="panel">Faculty Members</a></li>
          <li><a href="maintenance.php" target="panel">Maintenance Members</a></li>
          <li><a href="changepass.php" target="panel">Change Password</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
            <?php
                if(!isset($_COOKIE["admin_login"]))
                    {
	                   header("location:login.php");
                    }
                else
                    {
                        session_start();
                        echo '<a href="admin_logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a>';
                    }
            ?></li>
      </ul>
    </div>
  </div>
</nav>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 center">
            <iframe class="ipanel center" src="default.html" name="panel"></iframe>
        </div>
        
    </div>
</div><br>
    
<div class="container">
    <div class="footer">
            <p>&copy; ccetube, U<sub>o</sub>A, all rights reserved.</p>
        </div>
</div>
</body>
</html>
