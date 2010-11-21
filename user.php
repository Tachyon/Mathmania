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
  <div id="mainContent">
    <h2>Profile </h2>
	
		<table width=750 border=0 class=bg_table >
	<?php
	
		include_once('sql.php');
		$database=$db;
		$user=$_GET["user"];
		mysql_connect ($sqlhost, $sqluser, $sqlpass);
		@mysql_select_db($database) or die( "Unable to select database");
		$result = mysql_query( "SELECT * FROM user where Roll = '".$user."'" ) or die("SELECT Error: ".mysql_error());
		

		while ($get_info = mysql_fetch_row($result))
				{
				echo '<tr>'."\n";
				echo '<th style="text-align:left;">Name</th>';
				echo "\t".'<td>'.$get_info[0].' '.$get_info[1].'</td>'."\n";
				echo "</tr>\n";
								
				echo '<tr class="">'."\n";
				echo '<th style="text-align:left;">Roll Number</th>';
				echo "\t".'<td>'.$get_info[6].'</td>'."\n";
				echo "</tr>\n";
				
				echo '<tr class="">'."\n";
				echo '<th style="text-align:left;">Department</th>';
				$branch = mysql_query( "SELECT * FROM branch where bkey = ".$get_info[3]) or die("SELECT Error: ".mysql_error());
				$branch_info = mysql_fetch_row($branch);
				echo "\t".'<td>'.$branch_info[1].'</td>'."\n";
				echo "</tr>\n";
				
				echo '<tr class="">'."\n";
				echo '<th style="text-align:left;">Year</th>';
				echo "\t".'<td>'.$get_info[4].'</td>'."\n";
				echo "</tr>\n";
				
				echo '<tr class="">'."\n";
				echo '<th style="text-align:left;">E-Mail</th>';
				echo "\t".'<td>'.$get_info[5].'</td>'."\n";
				echo "</tr>\n";
				}
		echo "</table>\n";
		
	?>

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
