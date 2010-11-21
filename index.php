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
	<table width=100%>
		<tr>
			<td><h2>Problems </h2></td>
			<td align=right>
			  <?php
				//session_start();
				if(isset($_SESSION['uid1']) && isset($_SESSION['pass1']))
					echo '<img src=images/icon_logout.png height=30px style="border: medium none; vertical-align: middle;" alt="Logout"/><a href=logout.php> Logout</a>';
				else
					echo '<img src=images/icon_login.png height=30px style="border: medium none ; vertical-align: middle;" alt="Login"/><a href=login> Login</a>';
					
			  ?>
			</td>
		</tr>
	</table>
		<br/>
		<table width=780px border=0 class=bg_table  >
			<tr>
				<th class="bg_table" style="text-align:center;">
					<div style="text-align:center;">
						<b>Code</b>
					</div>
				</th>
				<th class="bg_table">
					<div style="text-align:left;"><b>Description / Title</b></div></th>
				<th class="bg_table" style="width:40px;">
					<div style="text-align:left;"><b>Submissions</b></div>
				</th>
				<th class="bg_table" style="width:80px;text-align:center;">
					<div><b>Solved</b></div>
				</th>
			</tr>
	<?php
		include_once('sql.php');
		$database=$db;
		mysql_connect ($sqlhost, $sqluser, $sqlpass);
		@mysql_select_db($database) or die( "Unable to select database");
		$result = mysql_query( "SELECT * FROM mm_q" ) or die("SELECT Error: ".mysql_error());
		
		//$num_rows = mysql_num_rows($result);
		//echo "There are $num_rows records.<P>";
		while ($get_info = mysql_fetch_row($result))
			if($get_info[4]==1)
				{
				echo '<tr class="bg_table_row1">'."\n";
				echo '<td style="height:40px;text-align:center;">'.$get_info[0].'</td>';
				echo "\t".'<td><a href="problem.php?prob='.$get_info[0].'">'.$get_info[1].'</a></td>'."\n";
				echo "\t<td align=center>$get_info[3]</td>\n";
				if(isset($_SESSION['uid1']) && isset($_SESSION['pass1']))
					{
					$solved = mysql_query( "SELECT $get_info[0] FROM mm_user where rollno = '".$_SESSION['uid1']."'" ) or die("SELECT Error: ".mysql_error());
					while ($solved_info = mysql_fetch_row($solved))
						{
						if(strlen($solved_info[0])!=0)
							echo "\t<td align=center><img src=images/solved.gif height=30px /></td>\n";
						else
							echo "\t<td align=center><img src=images/unsolved.gif height=30px /></td>\n";
						}
					}
				echo "</tr>\n";
				}
		echo "</table>\n";
	?>
	
    <p>Visit our <a href="http://itlib.bhu.ac.in/acm/forum">Forum</a> in case of any doubts or queries</p>
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
