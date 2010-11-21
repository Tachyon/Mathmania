<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mathmania</title>
<link rel="stylesheet" type="text/css" href="styles/style_main.css">

</head>

<body class="body">
	
<div id="container">
	<?php
		$thefile = "header.html"; /* Our filename as defined earlier */
		$openedfile = fopen($thefile, "r");
		$theData = fread($openedfile,filesize($thefile));
		echo $theData;
	?>
  
  <div id="mainContent" >

	<?php
		//session_start();
		$uid="";
		$pass="";
		if(isset($_SESSION['uid1']) && isset($_SESSION['pass1']))
			{
			$code=$_POST["code"];
			$ans=$_POST["ans"];
			$uid=$_SESSION['uid1'];
			$pass=$_SESSION['pass1'];
			}
		//echo $code.$ans.$uid.$pass;
		include_once('sql.php');
		$database=$db;
		
		$con=mysql_connect($sqlhost, $sqluser, $sqlpass);
		
		if(!$con)
			{
				die('Couldnot connect to database:\n Error recieved'.mysql_error());
			} 
			
		mysql_select_db($database,$con);
		
		$sql="SELECT * FROM user WHERE Roll='".$uid."' and pass='".$pass."'";
		$result=mysql_query($sql) or die("SELECT Error: ".mysql_error()); 
		$count=mysql_num_rows($result);

		if($count==1)
			{
			$sql="SELECT * FROM mm_user WHERE rollno='$uid'";
			$result=mysql_query($sql);
			$count=mysql_num_rows($result);
			if($count==1)
				{
				$result = mysql_query("SELECT $code FROM mm_user WHERE rollno='$uid'");
				$get_info = mysql_fetch_row($result);
				//echo $get_info[0];
				if(strcmp(!$get_info[0],NULL))
					{
					//echo "Null nahi tha";
					$result = mysql_query("SELECT * FROM mm_q WHERE code='".$code."' ");
					$get_info = mysql_fetch_row($result);
					$submit = $get_info[3];
					$submit = (int)$submit + 1;
					$result = mysql_query("UPDATE mm_q SET submissions=$submit WHERE code='$code'");
					}
				$result = mysql_query("UPDATE mm_user SET $code=$ans WHERE rollno='$uid'");
				$date = date('U');
				$result = mysql_query("UPDATE mm_user SET $code"."_t='$date' WHERE rollno='$uid'");
				}
			else
				{
				$date = date('U');
				$result = mysql_query("INSERT INTO mm_user (rollno,$code,$code"."_t) VALUES ('$uid','$ans','$date')");
				//echo "INSERT INTO mm_user (rollno,$code,$code"."_t) VALUES ('$uid','$ans','$date')"."<br/>";
				$result = mysql_query("SELECT * FROM mm_q WHERE code='".$code."' ");
				$get_info = mysql_fetch_row($result);
				$submit = $get_info[3];
				$submit = (int)$submit + 1;
				$result = mysql_query("UPDATE mm_q SET submissions=$submit WHERE code='$code'");
				}
			echo '<div style="text-align:center;"><br/><br/><img src="images/tick_mark.gif"/><br/><br/>Your Answer has been submitted<br/>It will be evaluated after the end of the contest<br/><br/></div>';
			}
		else 
			{
			echo "Wrong Username or Password";
			}
		 
	?>
	
	
	
	<!-- end #mainContent --></div>
		
	
  <div id="footer">
    <div id="bottom" class="noprint">
<a href="http://acm.itbhu.ac.in">Brought to you by IT BHU ACM Students Chapter</a>
	</div>
</div>


  <!-- end #footer -->
<!-- end #container --></div>
</body>
</html>
