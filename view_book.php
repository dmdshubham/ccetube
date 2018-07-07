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
<div class="container">
    <br><img src="images/header.jpg" alt="logo" class="img-responsive">
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
        <li class="active"><a href=""><span class="glyphicon glyphicon-home"></span> Welcome</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
            <?php
                if(!isset($_COOKIE["user_login"]))
                    {
	                   header("location:user_login.php");
                    }
                else
                    {
                        session_start();
                        echo '<a href="user_logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a>';
                    }
            ?></li>
      </ul>
    </div>
  </div>
</nav>
</div>
<div class="container"><br>
    <div class="row">
        <div class="col-sm-12">
            <?php
                $location = $_GET['loc'];
                $tmp_location = addslashes($_GET['loc']);
                $query = "select * from books where location='$tmp_location'";
                $result = mysqli_query($con,$query);
                if(mysqli_num_rows($result) > 0)
                {?>
                <table class="books">
                    <thead>
                        <tr>
                            <th colspan="3">---Available Books---</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                while($rows = mysqli_fetch_array($result))
                {
                ?>
                <tr>
                    <td>
                        <a href="<?php echo $location.$rows['file_name'];?>"><img src="images/pdf.png"></a><br>
                        <h5><?php echo "Name&nbsp;:&nbsp;".$rows['book_name'];?></h5>
                        <h5><?php echo "Author&nbsp;:&nbsp;".$rows['author'];?></h5>
                        <h5><?php echo "Edition&nbsp;:&nbsp;".$rows['edition'];?></h5>
                    </td>
                    <?php if($rows=mysqli_fetch_array($result)){?>
                    <td>
                        <a href="<?php echo $location.$rows['file_name'];?>"><img src="images/pdf.png"></a><br>
                        <h5><?php echo "Name&nbsp;:&nbsp;".$rows['book_name'];?></h5>
                        <h5><?php echo "Author&nbsp;:&nbsp;".$rows['author'];?></h5>
                        <h5><?php echo "Edition&nbsp;:&nbsp;".$rows['edition'];?></h5>
                    </td>
                    <?php } ?>
                    <?php if($rows=mysqli_fetch_array($result)){?>
                    <td>
                        <a href="<?php echo $location.$rows['file_name'];?>"><img src="images/pdf.png"></a><br>
                        <h5><?php echo "Name&nbsp;:&nbsp;".$rows['book_name'];?></h5>
                        <h5><?php echo "Author&nbsp;:&nbsp;".$rows['author'];?></h5>
                        <h5><?php echo "Edition&nbsp;:&nbsp;".$rows['edition'];?></h5>
                    </td>
                    <?php } ?>
                </tr>
                <?php
                }?>
                </tbody>
                </table>
                <?php
                }
                else{
                    ?>
                    <table class="books">
                      <thead>
                        <tr>
                            <th colspan="3" style="color:#fff;background:#b00;">---Books Not Available---</th>
                        </tr>
                      </thead>
                    </table>
                    <?php
                }
            ?>
        </div>
    </div>
</div><br>
    <div class="container">
        <h4 class="footer">&copy; CCETUBE, UoA</h4>
    </div>
</body>
</html>
