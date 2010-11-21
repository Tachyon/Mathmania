<?php session_start();
	if(isset($_SESSION['uid1']) && isset($_SESSION['pass1']))
		header("location:http://itlib.bhu.ac.in/acm/mm/");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mathmania</title>
<link rel="stylesheet" type="text/css" href="styles/style_main.css">
<script type="text/javascript" src="js/register.js"></script>

<script type="text/javascript">

function validate_fname(input)
	{
	with(input)
		{
		 if(value.length != 0)
		   return true;
		 else
		   return false;
		  }
	}
	
function validate_email(input)
{
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


 with(input)
  {
     ampersand=value.indexOf("@");
	 dot=value.lastIndexOf(".");
     space=value.indexOf(" ");
    if(ampersand<1 || dot-ampersand<2||space>0)
      return false;	
   }  
}


function validate_telephone(input)
{
 with(input)
  {
	 if((value.length == 10) && (IsNumeric(value)== true))
	   return true;
	 else
	   return false;
   }  
}

function validate_roll(input)
{
 with(input)
  {
	 if(value.length != 0)
	   return true;
	 else
	   return false;
   }  
}

function validate_pass(input,input1)
{
	var flag = 1;
	with(input)
		{
		var passwd = value;
		if(value.length == 0)
			flag = 3;
		}  
	with(input1)
		{
		var passwd1 = value;
		if(value.length == 0)
			flag = 3;
		}
	if(flag == 3)
		return 3;
	else if(passwd != passwd1)
		return false;
	else
		return true;
}

function validate(thisform)
{
 with(thisform)
 {
	if(validate_fname(roll)==false)
	   {
	    fname.focus();
		 alert("Roll Number cannot be left empty !!"); 
		 return false;
	   }
	   
   	if(validate_fname(fname)==false)
	   {
	    fname.focus();
		 alert("First name cannot be left empty !!"); 
		 return false;
	   }
	if(validate_pass(pass,pass1)==3)
	   {
	    telephone.focus();
		 alert("Password could not be left empty !"); 
		 return false;
	   }
	 if(validate_pass(pass,pass1)==false)
	   {
	    pass1.focus();
		 alert("Values in password field do not match !!"); 
		 return false;
	   }

  
	 if(validate_email(email)==false )
	   {
		 email.focus();
		 alert("Input correct email address"); 
		 return false;
	   }
     if(validate_telephone(telephone)==false)
	   {
	    telephone.focus();
		 alert("Phone number must be of 10 digits !"); 
		 return false;
	   }
	   
	if(validate_roll(roll)==false)
	   {
	    roll.focus();
		 alert("Roll Number field could not be left empty !"); 
		 return false;
	   }  
 }
}
</script>
</head>

<body class="body">

<div id="container" >
	<?php
		$thefile = "header.html"; /* Our filename as defined earlier */
		$openedfile = fopen($thefile, "r");
		$theData = fread($openedfile,filesize($thefile));
		echo $theData;
	?>
  <div id="mainContent" style="text-align:left;">
      <h2>Register </h2>
		
		<br/>
		<br/>
		
		<?php
		if(isset($_SESSION['uid1']) || isset($_SESSION['pass1']))
			header("location:/mm");
		?>
		 <form  onsubmit="return validate(this)" action="adduser.php" method="POST"  >
		   <table id="data">
		  <tr><td ><strong>Roll No : </strong></td><td><input  id="color" type="text" name="roll"/></td></tr>
		  <tr><td></td><td></td></tr>
		  
		  <tr><td ><strong>First Name:</strong> </td> <td>  <input id="color" type="text" name="fname" /></td></tr>
		  <tr><td></td><td></td></tr>
		  
		  <tr><td><strong>Last Name:</strong></td><td><input  id="color" type="text" name="lname" /></td></tr>
		  <tr><td></td><td></td></tr>
		  
		  <tr><td><strong>Choose a Password:</strong></td>  <td>  <input  id="color" type="password" name="pass" /></td>
		 <tr><td></td><td></td></tr>
		  
		  <tr><td ><strong>Retype Password:</strong></td><td><input id="color"  type="password" name="pass1" /></td></tr>
		  <tr><td></td><td></td></tr>
			<tr>
				<td><strong>Department:</strong> </td>
				<td>
				  <SELECT NAME="branch">
					<OPTION VALUE="">Select One..
					<?php
					include_once('./sql.php');
					$con=mysql_connect($sqlhost,$sqluser,$sqlpass);
					if(!$con)
							die('Couldnot connect to database:\n Error recieved'.mysql_error());
					mysql_select_db($db,$con);
					$result = mysql_query( "SELECT * FROM branch" ) or die("SELECT Error: ".mysql_error());
					while ($get_info = mysql_fetch_row($result))
							{
							echo '<OPTION VALUE="'.$get_info[0].'">'.$get_info[1];							
							}	
					?>
				  </SELECT>
				</td>
			</tr>
			<tr>
				<td><strong>Year:</strong> </td>
				<td>
					<SELECT NAME="year">
						<OPTION VALUE="">Select One..
						<OPTION VALUE="1">1
						<OPTION VALUE="2">2
						<OPTION VALUE="3">3
						<OPTION VALUE="4">4
						<OPTION VALUE="5">5
					</SELECT>
				</td>
			</tr> 
		  <tr><td ><strong>E-mail:  </strong></td><td>  <input id="color" type="text" name="email" ></td></tr> 
		  <tr><td></td><td></td></tr>
		  
		  <tr><td ><strong>Mobile : </strong></td><td><input  id="color" type="text" name="telephone"/></td></tr>
		  <tr><td></td><td></td></tr>
		  
		  
		  <tr><td> </td><td style="text-align:right"><input type="submit" value="Submit"></td></tr>

		</table>
	 </form> 
	<br/>
		<br/>
   


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
