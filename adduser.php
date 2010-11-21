<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mathmania</title>
<link rel="stylesheet" type="text/css" href="styles/style_main.css">
<script type="text/javascript" src="js/register.js"></script>
</head>

<body class="body">

<div id="container" >
	<?php
		$thefile = "header.html"; /* Our filename as defined earlier */
		$openedfile = fopen($thefile, "r");
		$theData = fread($openedfile,filesize($thefile));
		echo $theData;
	?>
  <div id="mainContent" style="text-align:left;">
	<br/>
	<br/>
	<br/>
	<br/>
<?php
		$fname=$_POST["fname"];
		$lname=$_POST["lname"];
		$roll=$_POST["roll"];
		$pass=$_POST["pass"];
		$branch=$_POST["branch"];
		$year=$_POST["year"];
		$email=$_POST["email"];
		$phone=$_POST["telephone"];
		include_once('./sql.php');

		
		$con=mysql_connect($sqlhost,$sqluser,$sqlpass);
		
		if(!$con)
			{
				die('Couldnot connect to database:\n Error recieved'.mysql_error());
			} 
			
		mysql_select_db($db,$con);
		
		$myquery="SELECT * from mm_member where Roll='".$roll."'";
		$result=mysql_query($myquery);
       

		$count=mysql_num_rows($result);
		if(mysql_num_rows($result)==0)
			{
			$result=mysql_fetch_row($result);
			$myquery="INSERT INTO user(FName,LName,pass,Branch,Year,email,Roll,Phone) VALUES('$fname','$lname','$pass','$branch','$year','$email','$roll','$phone')";
			
			$result=mysql_query($myquery,$con);
			if(!$result)
			  {
				echo 'There was some error. Please try after sometime.';
			  }
			else
				echo 'You have been succesfully registered !! <br/><br/><a href=login>Click Here</a> to login.';
			}
		else
                        {
			
                        echo ' Roll No already registered. <br/>Please register with different usename !!<br/> <br/><a href=register.php>Click Here</a> to return to return to registration page.';
		        }
	?>
	<br/>
	<br/>
	<br/>
</div>
  <div id="footer">
    <div id="bottom" class="noprint">
<a href="http://acm.itbhu.ac.in">Brought to you by IT BHU ACM Students Chapter</a>
	</div>
</div>


  <!-- end #footer -->
<!-- end #container --></div>
</body>
</html>