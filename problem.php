<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mathmania</title>
<link rel="stylesheet" type="text/css" href="styles/style_main.css">

<script type="text/javascript">
	
	function IsNumeric(sText)
		{
		var ValidChars = "0123456789";
		var IsNumber=true;
		var Char;
		for (i = 0; i < sText.length && IsNumber == true; i++) 
			{ 
			Char = sText.charAt(i); 
			if (ValidChars.indexOf(Char) == -1) 
				{
				IsNumber = false;
				}
			}
		return IsNumber;
		}


	function validate_telephone(input)
	{
	with(input)
		{
		if(value.length == 0)
			return false;
		if(IsNumeric(value)== true)
		   return true;
		 else
		   return false;
		}  
	}

	function validate(thisform)
		{
		with(thisform)
			{
			if(validate_telephone(ans)==false)
				{
				ans.focus();
				alert("Your answer must be a numeric value !"); 
				return false;
				}	  
			}
		}
</script>

</head>

<body class="body">

<div id="container">
	<?php
		$thefile = "header.html"; /* Our filename as defined earlier */
		$openedfile = fopen($thefile, "r");
		$theData = fread($openedfile,filesize($thefile));
		echo $theData;
	?>
	<div id="mainContent"><br/>

	<?php
		
		include_once('sql.php');
		$database=$db;
		mysql_connect ($sqlhost, $sqluser, $sqlpass);
		@mysql_select_db($database) or die( "Unable to select database");
		
		
		$prob=$_GET["prob"];
		$result = mysql_query( "SELECT * FROM mm_q where code='".$prob."'" ) or die("SELECT Error: ".mysql_error());

		
		$code;
		while ($get_info = mysql_fetch_row($result))
			{
			$code = $get_info[0];
			echo '<h2>'.$get_info[1].' </h2><br /><br />';
			echo $get_info[2].'<br /><br /><br /><br />';
			}
		$uid = "";
		$pass = "";
		
		if(isset($_SESSION['uid1']) && isset($_SESSION['pass1']))
			{
			$uid = $_SESSION['uid1'];
			$pass = $_SESSION['pass1'];
			}
			
		
	?>
	
	<form enctype="multipart/form-data" onsubmit="return validate(this)" action="submit.php?code=<?php echo $code?>" method="POST">
		<table >
			<tr>
				<td><input name="code" type="hidden" value="<?php echo $code?>" /></td>
			</tr>	
				<?php
					if(!isset($_SESSION['uid1']) || !isset($_SESSION['pass1']))
						{
						echo "<tr>";
						echo '<td><div style="font-size:10px;">You Must be logged in to Submit Answers !! <br/><a href=login>Click Here</a> to login</div></td>';
						echo "</tr>";
						echo "</table>";
						echo "<br /><br />";
						}
					else
						{
						echo "<tr>";
						echo  '<td>Answer: </td>';
						echo  '<td><input name="ans" type="input" /></td>';
						echo "</tr>";
						echo "</table>";
						echo "<br /><br />";
						echo '<input type="submit" value="Submit" />';
						}		
		?>
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
