 
  <?php
 include_once('connection.php');
  
   ?>
 
 
 
<DOCTYPE HTML>
<HTML lang="en-US">
<head>
     <meta charset="UTF-8">
	 <meta http-equiv="X-UA-compatible" Content="IE-edge">
	 <meta name="viewport" content="width=device-width">
	 <link rel="stylesheet" href="css/bootstrap.css" />
	 <link rel="stylesheet" href="css/mystyle.css" />
	 <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
<title>PADHOSALA</title>



</head>
  <body>
  <!--header-->
        <div class="container-fluid top_bar">
           <div class="container">
               <div class="row">
                    <div class="col-sm-5">
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="facebook" class="social_icons"><i class ="fa fa-facebook" style="font-size:20px ; color: #fff;"></i>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="twitter" class="social_icons"><i class ="fa fa-twitter" style="font-size:20px ; color: #fff;"></i>
                     <a href="#" data-toggle="tooltip" data-placement="bottom" title="youtube-play" class="social_icons"><i class ="fa fa-youtube-play" style="font-size:20px ; color: #fff;"></i>
                 				 <a href="#" data-toggle="tooltip" data-placement="bottom" title="google-plus" class="social_icons"><i class ="fa fa-google-plus" style="font-size:20px ; color: #fff;"></i>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="twitter" class="social_icons"><i class ="fa-li fa fa-spinner fa-spin" style="font-size:20px ; color: #fff;"></i>
                 
				 </div>  
                 <div class="col-sm-7 text-right contact_info">
                
                 <?php
         if(!isset($_COOKIE["admin_login"]))
            {
	      header("location:admin_login.php");
            }
           else
           {
		//echo '  <a href="#" data-toggle="tooltip" data-placement="bottom" title="twitter" class="social_icons"><i class ="fa-li fa fa-spinner fa-spin" style="font-size:20px ; color: #fff;"></i>';	   
	     echo '<a href="admin_logout.php" data-toggle="tooltip" data-placement="bottom" title="logout" class="social_icons"><i class ="fa fa-sign-out" style="font-size:20px ; color: #fff;"></i></a>logout
';
          }
  
        ?>
				
                </div>
             </div><!--end of row-->
       </div><!--end of container-->
   </div><!--end of container fluid-->
   
  <!--logo and navigation-->
  <div class ="container">
      <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6 " style="font-size:15px; font-family:bold "><img src="images/logo.png" alt="img-responsive">UNIVERSITY OF ALLAHABAD</div><!--end of column 5-->
           <div class="col-lg-6 col-md-6 col-sm-6 my_menu">
		   <nav class="navbar navbar-default">
		   <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</div><!--end navbar header-->
		        <div class="collapse navbar-collapse" id="mynavbar">
	             <ul class="nav navbar-nav pull-right">
                        <li> <a></a></li>
						<li class="active" ><a href="index.php">HOME</a></li>
                        <li><a href="">ABOUT US</a></li>
                        <li><a href="">PRODUCT</a></li>
                        <li><a href="">CONTACT US</a></li>
						<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">LOGIN<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="login.php">USER</a></li>
                            <li><a href="faculty.php">faculty</a></li>
                            <li><a href="maintain_login.php">Maintaince</a></li>
                            <li><a href="admin_login.php">Admin</a></li>
                          
                        </ul>
                    </li>

                </ul>	
				</div><!--end of collapse-->
            </nav>				
		   </div><!--end of column 7-->		   
      </div><!--end of row-->
  </div><!--end of container>
  <!--end logo and navigation-->
  <!--end of header-->

 
 
 <div class="col-sm-3 adm" style="margin-top:5px; margin-left:5px; margin-right:5px; padding : 40px">
			<h1>SUBMIT YOUR EXCEL FILE(.xls FORMAT)</h1>
<form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data"><br>
  Import file:<input type='file' name='sel_file' size='20'><br><br>
  <input type='submit' name='cs_submit' value='cs_submit'><br><br>
    
	 <?php
	 

  if(isset($_POST['cs_submit']))
  {
	 
	  $fname=$_FILES['sel_file']['name'];
      echo 'upload file name:'.$fname.' ';
	  $chk_ext = explode("." , $fname);
	  
	  
	  ini_set("display_errors",1);
require_once 'excel_reader2.php';
 if(strtolower(end($chk_ext)) == "xls")
		{
			$filename = $_FILES['sel_file']['tmp_name'];
			$handle = fopen($fname,"r");
$data = new Spreadsheet_Excel_Reader($fname);
       
echo "Total Sheets in this xls file: ".count($data->sheets)."<br /><br />";
  
 $html="<table border='1'>";
	
	
	for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
{	
	if(count($data->sheets[$i]['cells'])>0) // checking sheet not empty
	{ 
		echo "Sheet $i:<br /><br />Total rows in sheet $i  ".count($data->sheets[$i]['cells'])."<br />";
		for($j=1;$j<=count($data->sheets[$i]['cells']);$j++) // loop used to get each row of the sheet
		{ 
			$html.="<tr>";
			for($k=1;$k<=count($data->sheets[$i]['cells'][$j]);$k++) // This loop is created to get data in a table format.
			{
				$html.="<td>";
				$html.=$data->sheets[$i]['cells'][$j][$k];
				$html.="</td>";
			}
			$name = $data->sheets[$i]['cells'] [$j][1];
			$chk = str_split($name);
			$mn = "";
			for($p = 0;$p<sizeof($chk);$p+=2)
			{
				//echo $chk[$i];
				$mn = $mn.$chk[$p];
			}
			
			$p=0;
			//  echo strlen($nam);
			$email =$data->sheets[$i][ 'cells'] [$j][2];
			  $ch = str_split($email);
			$em = "";
			for($q = 0;$q<sizeof($ch);$q+=2)
			{
				//echo $chk[$i];
				$em = $em.$ch[$q];
			}
			
			$q=0;

			
			$password =$data->sheets[$i]['cells'][$j][3];
			
			$ps = str_split($password);
			$pass = "";
			for($r = 0;$r<sizeof($ps);$r+=2)
			{
				//echo $chk[$i];
				$pass = $pass.$ps[$r];
			}
			
			$r=0;
			
			
			$sem = $data->sheets[$i]['cells'][$j][4];
			$year =$data->sheets[$i]['cells'][$j][5];
             $course =$data->sheets[$i]['cells'][$j][6];
			 
			 $co = str_split($course);
			$cou = "";
			for($s = 0;$s<sizeof($co);$s+=2)
			{
				//echo $chk[$i];
				$cou = $cou.$co[$s];
			}
			
			$s=0;
			 
                   
			$query = "insert into student(name,email,password,sem,yr,cou) values('$mn','$em','$pass','$sem','$year','$cou')";
           
			mysqli_query($connection,$query);
			$html.="</tr>";
    
	
	}
		
	}
 
}
 
$html.="</table>";
echo $html;
echo "<br />Data Inserted in dababase";
       error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	   
		}
	     }

	
	
	
	
  ?>
	</div>
  </form>
 
 
 <!--footer area-->
	<div class="container-fluid" STYLE="padding:100px">
			</div>
	     
         <div class="container-fluid top_bar">
			</div>
	        <div class="container-fluid top_bar">
			</div>
			
     	   <div class="container-fluid top_bar">
           <div class="container">
               <div class="row">
                    <div class="col-md-3">
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="facebook" class="social_icons"><i class ="fa fa-facebook" style="font-size:20px ; color: #fff;"></i>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="twitter" class="social_icons"><i class ="fa fa-twitter" style="font-size:20px ; color: #fff;"></i>
                     <a href="#" data-toggle="tooltip" data-placement="bottom" title="youtube-play" class="social_icons"><i class ="fa fa-youtube-play" style="font-size:20px ; color: #fff;"></i>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="google-plus" class="social_icons"><i class ="fa fa-google-plus" style="font-size:20px ; color: #fff;"></i>
                   </div>  
                 <div class="col-md-9 text-right contact_info">
               <span class="glyphicon glyphicon-envelope"> shubham.jaiswal911@gmail.com,</span>
                <span class="glyphicon glyphicon-earphone"> 9369963956</span>
                </div>
             </div><!--end of row-->
       </div><!--end of container-->
   </div><!--end of container fluid-->
	
  <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript">
    $(document).ready(function()
	     {
		 $('[data-toggle="tooltip"]').tooltip();
		 }
    </script>
  </body>
  </html>
 
 
 
