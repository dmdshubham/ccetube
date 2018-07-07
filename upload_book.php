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
			  <!-----------------------------------working area for uploading file ---------------------------------------->
   <div class="row">
     <div class="col-sm-2"></div>
     <div class="col-sm-8 center">
        <h1>UPLOAD</h1>
        <form role="form" method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
               <input type="text" id="book_name" name="book_name" required="required" placeholder="Book Name" class="form-control">
            </div>
           <div class="form-group">
               <input type="text" id="author" name="author" required="required" placeholder="Author's Name" class="form-control">
            </div>
            <div class="form-group">
               <input type="number" id="edition" name="edition" required="required" placeholder="Book's Edition" class="form-control">
            </div>
            <div class="form-group">
                <select name="c" class="selection" class="form-control">
                    <option value="-1" style="text-align:center;">Choose Subject</option>
                    <option value="-1" style="text-align:center; color:#fff; background:royalblue;">BCA</option>
                    	   <option class="course" value="bca1\maths\">---------- BCA I<sup>st</sup> ----------</option>
				<option value="bca1\maths\">MATHMATICS I(BCA 101)</option>
				<option value="bca1\stat\">STATICS(BCA 102)</option>
                    <option value="bca1\basic_ele\">BASIC ELECTRONICS(BCA 103)</option>
                    <option value="bca1\programming\">FUNDAMENTAL OF PROGRAMMMING(BCA 104)</option>
                    <option value="bca1\commu_skill\">COMMUNICATION SKILL(BCA 105)</option>
                    <option value="bca1\science\">FOUNDATION COURSE IN SCIENCE(BCA 106)</option>
                    <option value="bca1\lab1\">Electronics and Optics Lab.</option>
                    <option value="bca1\lab2\">Computer Lab.</option>
                    <option value="bca1\lab3\">Communication skills Lab.</option>
                    	   <option class="course" value="bca1\maths\">---------- BCA II<sup>nd</sup> ----------</option>
                    <option value="bca2\math2\">MATHMATICS II(BCA 201)</option>
                    <option value="bca2\business">BUSINESS SYSTEM(BCA 202)</option>
                    <option value="bca2\digital\">DIGITAL ELE. AND COM. ORG.(BCA 203)</option>
                    <option value="bca2\ds\">DATA STRUCTURES (BCA 204)</option>
                    <option value="bca2\linux\">LINUX AND SHELL PROGRAMMING(BCA 205)</option>
                    <option value="bca2\ppl\">PRINCIPAL OF PROGRAMMING LANG.(BCA 206)</option>
                    <option value="bca1\lab1\">Hardware Lab.</option>
                    <option value="bca1\lab2\">Programming Lab.</option>
                    <option value="bca1\lab3\">Communication skills Lab.</option>
                   		   <option class="course" value="bca1\maths\">---------- BCA III<sup>rd</sup> ----------</option>
                    <option value="bca3\dis\">DISCRETE STRUCTURE AND GRAPH THEORY(BCA 301)</option>	
                    <option value="bca3\daa\">DESIGN AND ANA OF ALGO(BCA 302)</option>	
                    <option value="bca3\sys_sof\">INTRO TO SYSTEM SOFT.(BCA 303)</option>	
                    <option value="bca3\oop\">OOP C++ (BCA 304)</option>	
                    <option value="bca3\dbms\">DATABASE MANAGEMENT SYSTEM (BCA 305)</option>	
                    <option value="bca3\microprocessor\">COMP. AND MICROPROCESSOR (BCA 306)</option>	
                    <option value="bca1\lab1\">Programming Lab.</option>
                    <option value="bca1\lab2\">Communication skills Lab.</option>
                            <option class="course" value="bca1\maths\">---------- BCA IV<sup>th</sup> ----------</option>	
                    <option value="bca4\os\">OPERATING SYSTEM (BCA 401)</option>	
                    <option value="bca4\or\">OPERATION RESEARCH (BCA 402)</option>	
                    <option value="bca4\dcn\">DATA COMMUNICATION AND NETWORK(BCA 403)</option>	
                    <option value="bca4\se\">SOFTWARE ENGINEERING(BCA 404)</option>	
                    <option value="bca4\java\">WEB PROG USING JAVA(BCA 405)</option>	
                    <option value="bca4\numerical\">NUMERICAL METHODS(BCA 406)</option>	
                    <option value="bca1\lab1\">Programming Lab.</option>
                    <option value="bca1\lab2\">Communication skills Lab.</option>
                            <option class="course" value="bca1\maths\">---------- BCA V<sup>th</sup> ----------</option>
                    <option value="bca5\c#\">.NET AND C#(BCA 501)</option>	
                    <option value="bca5\embedded\">EMBEDDED SYSTEM(BCA 502)</option>	
                    <option value="bca5\cg\">COMPUTER GRAPHICS(BCA 503)</option>	
                    <option value="bca5\secure\">SECURE COMPUTING(BCA 504)</option>	
                    <option value="bca5\ad\">ADVENCED DBMS (BCA 505)</option>	
                    <option value="bca1\lab1\">Programming Lab.</option>
                    <option value="bca1\lab2\">Communication skills Lab.</option>
                            <option class="course" value="bca1\maths\">---------- BCA VI<sup>th</sup> ----------</option>								
                    <option value="bca6\img">IMAGE PROCESSING (BCA 601)</option>
                    <option value="bca6\multimedia\">MULTIMEDIA SYSTEM(BCA 602)</option>
                    <option value="bca1\lab1\">MAIN PROJECT Lab.</option>
                    
                    	
                    	
                    <option value="-1" style="text-align:center; color:#fff; background:royalblue;">MCA</option>	
                    	<option class="course" value="bca1\maths\">---------- MCA I<sup>st</sup> ----------</option>
				<option value="bca1\maths\">MATHMATICS I(BCA 101)</option>
				<option value="bca1\stat\">STATICS(BCA 102)</option>
                    <option value="bca1\basic_ele\">BASIC ELECTRONICS(BCA 103)</option>
                    <option value="bca1\programming\">FUNDAMENTAL OF PROGRAMMMING(BCA 104)</option>
                    <option value="bca1\commu_skill\">COMMUNICATION SKILL(BCA 105)</option>
                    <option value="bca1\science\">FOUNDATION COURSE IN SCIENCE(BCA 106)</option>
                    <option value="bca1\lab1\">Programming in C in Linux environment</option>
                    <option value="bca1\lab2\">Assembly language Programming & Simulation Experiments</option>
                    <option value="bca1\lab3\">Communication skills Lab.</option>
                    	   <option class="course" value="bca1\maths\">---------- MCA II<sup>nd</sup> ----------</option>
                    <option value="bca2\math2\">MATHMATICS II(BCA 201)</option>
                    <option value="bca2\business">BUSINESS SYSTEM(BCA 202)</option>
                    <option value="bca2\digital\">DIGITAL ELE. AND COM. ORG.(BCA 203)</option>
                    <option value="bca2\ds\">DATA STRUCTURES (BCA 204)</option>
                    <option value="bca2\linux\">LINUX AND SHELL PROGRAMMING(BCA 205)</option>
                    <option value="bca2\ppl\">PRINCIPAL OF PROGRAMMING LANG.(BCA 206)</option>
                    <option value="bca1\lab1\">Data Structures Lab.</option>
                    <option value="bca1\lab2\">Programming in C++</option>
                    <option value="bca1\lab3\">Oracle Lab.</option>
                   		   <option class="course" value="bca1\maths\">---------- MCA III<sup>rd</sup> ----------</option>
                    <option value="bca3\dis\">DISCRETE STRUCTURE AND GRAPH THEORY(BCA 301)</option>	
                    <option value="bca3\daa\">DESIGN AND ANA OF ALGO(BCA 302)</option>	
                    <option value="bca3\sys_sof\">INTRO TO SYSTEM SOFT.(BCA 303)</option>	
                    <option value="bca3\oop\">OOP C++ (BCA 304)</option>	
                    <option value="bca3\dbms\">DATABASE MANAGEMENT SYSTEM (BCA 305)</option>	
                    <option value="bca3\microprocessor\">COMP. AND MICROPROCESSOR (BCA 306)</option>	
                    <option value="bca1\lab1\">Programming in Java</option>
                    <option value="bca1\lab2\">Computer Graphics Lab.</option>
                    <option value="bca1\lab2\">Systems Programming Lab.</option>
                            <option class="course" value="bca1\maths\">---------- MCA IV<sup>th</sup> ----------</option>	
                    <option value="bca4\os\">OPERATING SYSTEM (BCA 401)</option>	
                    <option value="bca4\or\">OPERATION RESEARCH (BCA 402)</option>	
                    <option value="bca4\dcn\">DATA COMMUNICATION AND NETWORK(BCA 403)</option>	
                    <option value="bca4\se\">SOFTWARE ENGINEERING(BCA 404)</option>	
                    <option value="bca4\java\">WEB PROG USING JAVA(BCA 405)</option>	
                    <option value="bca4\numerical\">NUMERICAL METHODS(BCA 406)</option>	
                    <option value="bca1\lab1\">Programming in C#</option>
                    <option value="bca1\lab2\">Networks Lab.</option>
                    <option value="bca1\lab2\">System Design Lab.</option>
                            <option class="course" value="bca1\maths\">---------- MCA V<sup>th</sup> ----------</option>
                    <option value="bca5\c#\">.NET AND C#(BCA 501)</option>	
                    <option value="bca5\embedded\">EMBEDDED SYSTEM(BCA 502)</option>	
                    <option value="bca5\cg\">COMPUTER GRAPHICS(BCA 503)</option>	
                    <option value="bca5\secure\">SECURE COMPUTING(BCA 504)</option>	
                    <option value="bca5\ad\">ADVENCED DBMS (BCA 505)</option>	
                    <option value="bca1\lab1\">MINI PROJECT Lab.</option>
                    <option value="bca1\lab2\">Image Processing Lab.</option>
                            <option class="course" value="bca1\maths\">---------- MCA VI<sup>th</sup> ----------</option>								
                    <option value="bca6\img">IMAGE PROCESSING (BCA 601)</option>
                    <option value="bca6\multimedia\">MULTIMEDIA SYSTEM(BCA 602)</option>
                    <option value="bca1\lab1\">MAIN PROJECT Lab.</option>		
                   </select>
            </div>
            <div class="form-group">
                <label class="file-upload"><input type="file" name="book" style="display:none;"/>Browse File</label>
            </div>
            <div class="form-group">
                <input type="submit" value="Upload" name="submit" class="upload"/>
            </div>
            <?php 
	                   if(isset($_POST['submit']))
                        {
                            $f_name = $_FILES['book']['name'];
			                 if(empty($f_name))
                                {
                                    echo "select a file";
                                }
                             else
                                {
                                    $book_name = $_POST['book_name'];
                                    $author = $_POST['author'];
                                    $edition = $_POST['edition'];
                                    $location = addslashes($_POST['c']);
                                    $file_name = $book_name.$edition.(strrchr($f_name,"."));
                                    $f_tmp = $_FILES['book']['tmp_name'];
                                    $store =$_POST['c'].$file_name;
                                    
                                    $query = "select * from books where book_name='$book_name' and author='$author' and edition='$edition' and location='$location' and file_name='$file_name'";
                                    $result = mysqli_query($con,$query);
                                    if(mysqli_num_rows($result) == 0)   //check for existing book
                                    {
                                        $query = "insert into books values('$book_name','$author','$edition','$location','$file_name')";                       
                                        if(move_uploaded_file($f_tmp , $store) && mysqli_query($con,$query))
                                        {
                                            echo "Book has been uploaded successfully";
                                            //echo $f_tmp . "  " . $store;
                                        }
                                        else
                                        {
                                            echo "Book hasn't uploaded";
                                        }
                                    }
                                    else
                                    {
                                        echo "Book already exist";
                                    }
                                }				 
                        }
                   ?>
         </form>
     </div>
     <div class="col-sm-2"></div>
   </div>
</div>
</body>
</html>
