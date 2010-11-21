<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mathmania</title>
<link rel="stylesheet" type="text/css" href="../styles/style_main.css">

</head>

<body class="body">

<div id="container">
	<?php
		$thefile = "header.html"; /* Our filename as defined earlier */
		$openedfile = fopen($thefile, "r");
		$theData = fread($openedfile,filesize($thefile));
		echo $theData;
	?>
	<div id="mainContent" style="text-align:center;">
<?php
ob_start();
include_once('sql.php');
$host=$sqlhost; // Host name
$username=$sqluser; // Mysql username
$password=$sqlpass; // Mysql password
$db_name=$db; // Database name
$tbl_name="user"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword
$myusername=$_POST['pma_username'];
$mypassword=$_POST['pma_password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE Roll='$myusername' and pass='$mypassword'";
//echo $sql;
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
// session_register("myusername");
// session_register("mypassword");
session_start();

$_SESSION['uid1'] = $myusername;
$_SESSION['pass1'] = $mypassword;
header("location:../");


}
else {
echo "<br/><br/><img src=images/wrong.png width=50px><br/><br/>Wrong Username or Password <br/> <br/> <a href=index.php>Click Here</a> to retry !!<br/><br/>";
}

ob_end_flush();
?>
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