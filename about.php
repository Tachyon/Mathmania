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
   <br/>
	<h3>What is Mathmania?</h3>
	<p>Mathmania is a series of challenging mathematical/computer
	programming problems that will require more than just mathematical
	insights to solve. Although mathematics will help you arrive at elegant
	and efficient methods, the use of a computer and programming skills
	will be required to solve most problems.<br><br>
	The motivation behind Mathmania is to provide a platform for the 
	inquiring mind to delve into unfamiliar areas and learn new concepts 
	in a fun and recreational context.</p>
	<br/>
	<h3>Ranking</h3>
	<p>Ranking is done on the basis of number of questions correctly solved by a person. In case of a tie person with less time will be the winner</p>
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
