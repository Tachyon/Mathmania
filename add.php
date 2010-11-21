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
    <h2>Add Problem </h2>
	<br /><br />

	<form enctype="multipart/form-data" action="update.php" method="POST">
		<table>
			<tr>
				<td>Question Code: </td>
				<td><input name="code" type="input" /></td>
			</tr>
			<tr>
				<td>Question Title: </td>
				<td><input name="title" type="input" /></td>
			</tr>
			<tr>
				<td>Question: </td>
				<td><textarea name="ques" cols="40" rows="5"></textarea><br /></td>
			</tr>
			<tr>
				<td>Answer: </td>
				<td><input name="ans" type="input" /></td>
			</tr>
			<tr>
				<td>Type: </td>
				<td>
					<SELECT NAME="type">
					<OPTION VALUE="">Select One..
					<OPTION VALUE="1"                     >Visible
					<OPTION VALUE="0"                          >Hidden
					</SELECT>
				</td>
			</tr>
		</table>
		<br /><br />
		<input type="submit" value="Add" />
	</form>

    <p></p>
    <h2></h2>
    <p></p>
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
