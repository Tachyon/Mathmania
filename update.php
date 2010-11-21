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
  
  <div id="mainContent">

	<?php
		$code=$_POST["code"];
		$title=$_POST["title"];
		$quest=$_POST["ques"];
		$ansr=$_POST["ans"];
		$visible=$_POST["type"];
		
		include_once('sql.php');
		$database=$db;
		$con=mysql_connect ($sqlhost, $sqluser, $sqlpass);
		
		if(!$con)
			{
				die('Couldnot connect to database:\n Error recieved'.mysql_error());
			} 
			
		mysql_select_db($database,$con);
		
		$myquery="INSERT INTO mm_q(code,title,question,submissions,visible) VALUES('$code','$title','$quest',0,'$visible')";
		$result=mysql_query($myquery,$con);
		if(!$result)
		  {
		
			die('Error in query:'.mysql_error());
		  }
		$myquery="INSERT INTO mm_a(code,ans) VALUES('$code','$ansr')";
		$result=mysql_query($myquery,$con);
		if(!$result)
		  {
			die('Error in query:'.mysql_error());
		  }
		$myquery="ALTER TABLE mm_user ADD $code VARCHAR(50) DEFAULT NULL;";
		$result=mysql_query($myquery,$con);
		if(!$result)
		  {
			die('Error in query:'.mysql_error());
		  }
		$myquery="ALTER TABLE mm_user ADD $code"."_t VARCHAR(20) DEFAULT NULL;";
		$result=mysql_query($myquery,$con);
		if(!$result)
		  {
			die('Error in query:'.mysql_error());
		  }
		echo "Question Successfully Added !!";
		 
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
