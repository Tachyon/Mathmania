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
	<h3>How does this judge work ?</h3>
	<p>Your answers will be evaluated at the end of the contest. The final ranking will be on the basis of number of correct answers. Ties will be broken on the basis of time of submission.</p>
	<br/>
	<h3>What is the ranking criteria ?</h3>
	<p>Ranking is done on the basis of number of questions correctly solved by a person. In case of a tie person with less time will be the winner.</p>
	<br/>
	<h3>What is this time in Rank page?</h3>
	<p>The time displayed there is the sum of UNIX time stamps for all the answers submitted by you. So less the value of time better wil be your rank.</p>
	<br/>
	<h3>Can I submit my answers multiple times ?</h3>
	<p>Yes, ofcourse you can !! Your last answer will be considered for evaluation.</p>
	<br/>
	<h3>Will my time change if I submit same answer again ?</h3>
	<p>Yes, your time will change if you submit same answer again. Hence if you have answered a question once then dont resubmit it till you want to submit a different answer.</p>
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
