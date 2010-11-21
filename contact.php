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
	<h1>Contacts</h1><br/><br/>
	<h3>For any Queries related to problems</h3>
	<p>Gaurav Kumar : gaurav.kumar.cse06@itbhu.ac.in</p>
	<h3>In case of any problem during submission or in any suggestion regarding website</h3>
	<p>Saket Saurabh : saket.saurabh.cse07@itbhu.ac.in</p>
	<br/>
	<h3>Feel free to contact for any queries or sugestions !!</h3>
	<br/><br/>
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