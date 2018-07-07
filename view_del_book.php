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
        <div class="col-sm-12">
            <?php
                $location = $_GET['loc'];
                $tmp_location = addslashes($_GET['loc']);
                $query = "select * from books where location='$tmp_location'";
                $result = mysqli_query($con,$query);
                if(mysqli_num_rows($result) > 0)
                {?>
                <form method="post">
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
                        <input type="checkbox" name="id[]" value="<?php echo $rows['file_name'] ?>">
                    </td>
                    <?php if($rows=mysqli_fetch_array($result)){?>
                    <td>
                        <a href="<?php echo $location.$rows['file_name'];?>"><img src="images/pdf.png"></a><br>
                        <h5><?php echo "Name&nbsp;:&nbsp;".$rows['book_name'];?></h5>
                        <h5><?php echo "Author&nbsp;:&nbsp;".$rows['author'];?></h5>
                        <h5><?php echo "Edition&nbsp;:&nbsp;".$rows['edition'];?></h5>
                        <input type="checkbox" name="id[]" value="<?php echo $rows['file_name'] ?>">
                    </td>
                    <?php } ?>
                    <?php if($rows=mysqli_fetch_array($result)){?>
                    <td>
                        <a href="<?php echo $location.$rows['file_name'];?>"><img src="images/pdf.png"></a><br>
                        <h5><?php echo "Name&nbsp;:&nbsp;".$rows['book_name'];?></h5>
                        <h5><?php echo "Author&nbsp;:&nbsp;".$rows['author'];?></h5>
                        <h5><?php echo "Edition&nbsp;:&nbsp;".$rows['edition'];?></h5>
                        <input type="checkbox" name="id[]" value="<?php echo $rows['file_name'] ?>">
                    </td>
                    <?php } ?>
                </tr>
                <?php
                }?>
                    <tr>
                    <td colspan="3">
                        <input type='submit' value='Delete Selected' name='sub' id='sub' class='delete'>    
                    </td>
                </tbody>
                </table>
                </form>
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
</body>
</html>
<?php 
    if(isset($_POST['sub']))
    {
        $id = implode("','" , $_POST['id']);
        $count = count($_POST['id']);
        $query = "delete from books where file_name in ('".$id."')";
        if(mysqli_query($con,$query))
        {
            for($i = 0;$i < $count; $i++)
            {
                unlink($_GET['loc'] . $_POST['id'][$i]);
            }
            header("location:msg.php");
        }
        else
        {
?> <h2>Selected Books not Deleted</h2> <?php
        }
    }
?>