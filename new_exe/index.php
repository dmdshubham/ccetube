<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 center">
            <h2>ADD USER BY EXCEL FILE</h2>
            <h3>Import CSV file</h3>
            <form action='<?php echo $_SERVER["PHP_SELF"];?>' method='post' enctype="multipart/form-data">
                <div class="form-group">
                    <label class="file-upload"><input type="file"  name='sel_file' style="display:none;"/>Browse File</label>
                </div>
                <div class="form-group">
                    <input type='submit' name='cs_submit' value='Submit' class="form-group">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<?php
  include_once('connection.php');
    if(isset($_POST['cs_submit']))
  {
	 
	  $fname=$_FILES['sel_file']['name'];
	  $f_temp = $_FILES['sel_file']['tmp_name'];
	   echo "$fname";
	  $store = $fname;
     if(move_uploaded_file($f_temp , $store))
	 {
		 echo "file uploaded successfully";
		 //header("Location:uploads/sheet.php");
		 
		 //start logic
		 
           
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
			 
                   
			$stu_query = "insert into student values('','$mn','$em','$sem','$year','$cou')";
            $log_query = "insert into login values('$em','$pass','user')";
			mysqli_query($connection,$stu_query);
            mysqli_query($connection,$log_query);
            
			$html.="</tr>";
    
	
	}
		
	}
 
}
 
$html.="</table>";
echo $html;
echo "<br />Data Inserted in dababase";
       error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	   
		}
	           
		   
		 
		 //end logic
		 
		 
		 
	 }
	 else
	 {
		 echo "file not uploaded";
	 }
  }
  ?>
