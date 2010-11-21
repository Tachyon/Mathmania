<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mathmania</title>
<link rel="stylesheet" type="text/css" href="../styles/style_main.css">

</head>

<body class="body">

<div id="container" >
	<?php
		$thefile = "header.html"; /* Our filename as defined earlier */
		$openedfile = fopen($thefile, "r");
		$theData = fread($openedfile,filesize($thefile));
		echo $theData;
	?>
  <div id="mainContent" style="height:400px;text-align:center;">
      <h2>Login </h2>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<?php
		if(isset($_SESSION['uid1']) || isset($_SESSION['pass1']))
			header("location:/mm");
		?>
		<form method="post" action="checklogin.php" name="login_form" autocomplete="off" target="_top" class="login">
		<table align=center>
			<tr>
				<td><label for="input_username">Institute Roll No:</label></td>
				<td><input name="pma_username" id="input_username" size="24" class="textfield" type="text"></td>
			</tr>
			<tr>
				<td><label for="input_password">Password:</label></td>
				<td ><input name="pma_password" id="input_password" value="" size="24" class="textfield" type="password"></td>
			</tr>
			<tr>
				<td></td>
				<td align=right><input value="Login" id="input_go" type="submit"></td>
			</tr>
		</table>
        <input name="server" value="1" type="hidden">   
   
        
    
</form>

   
<script type="text/javascript">
// <![CDATA[
function PMA_focusInput()
{
    var input_username = document.getElementById('input_username');
    var input_password = document.getElementById('input_password');
    if (input_username.value == '') {
        input_username.focus();
    } else {
        input_password.focus();
    }
}

window.setTimeout('PMA_focusInput()', 500);
// ]]>
</script>

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
