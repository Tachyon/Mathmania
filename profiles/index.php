<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- What are you looking at ..... you looser -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Author" content="Nishant Kumar and Saket Saurabh">
    <meta name="Description" content="Official Site of ITBHU Chapter of ACM" /> 
    <title>ACM ITBHU</title>
    <link href="../styles/niftycorners.css" rel="stylesheet" type="text/css" />
    <link href="../styles/styles.css" rel="stylesheet" type="text/css" />
		<link type="text/css" rel="stylesheet" href="../floatbox/floatbox.css" />	
    	<script type="text/javascript" src="../floatbox/floatbox.js"></script>	
	
 	 <!--[if IE 5]>
        <style type="text/css"> 
            .body #sidebar { width: 220px; }
        </style>
    <![endif]-->
    <!--[if IE]>
        <style type="text/css"> 
        .body #sidebar { padding-top: 30px; }
        .body #mainContent { zoom: 1; }
        </style>
    <![endif]-->
	
	
<style type="text/css">
<!--
a:link {
	color: #333;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #666;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
-->
</style>

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

	<div id="container">
  		  		<div id="header">
       	<div style="height:120px;">  
		  <div id="head" style="width:50%; float:left;  height: 120px;">
        	<table>
                <tr>
                    <td>
                    <h1><img src="images/logo.png" width="100" alt="ACM ITBHU" /></h1>
                    </td>
                    <td>
                    <h1 style="margin-left:10px;">Institute of Technology, BHU<br/> ACM Student Chapter </h1>
               </tr>
            </table>
         </div>
           
		   <div id="register" style="float:right;margin-top:125px; margin-right:10px;">
            	     <b class="rtop"><b class="r1"></b> <b class="r2"></b> <b class="r3"></b> <b class="r4"></b></b> 
			 
          	    <table style="background-color:#E3FCC6;" >
                   
				  				   
            <tr><td>    
			<a class='registerlink' href='register.html' title='register form' rel='floatbox' rev='theme:white width:550px height:400px scrolling:yes' ><strong>Not a member yet? Register</strong></a>
		   </td></tr>
				 </table>
             
		   </div>
			
		</div>	
		  
			
        <div id="nav1" style="height:30px; text-align:left; margin-top:6px; margin-left:20px; width:70%;">
            	<a href="../index.html"><img src="../images/home_1.png" width="94" height="30" alt="Home" border="0"/></a>
                <a href="../about.html" ><img src="../images/aboutus.png" width="94" height="30" alt="About US" border="0"/></a>
                <a href="../events.html" ><img src="../images/events.png" width="94" height="30" alt="Events" border="0"/></a>
              	<a href="../http://acm.itbhu.ac.in/forum.php" ><img src="../images/forum.png" width="94" height="30" alt="Forum" border="0"/></a>
              	<a href="../gallery.html" ><img src="../images/gallery.png" width="94" height="30" alt="Gallery" border="0"/></a>
                <a href="../contact.html" ><img src="../images/contacts.png" width="94" height="30" alt="Contacts" border="0"/></a>
              	<a href="../faq.html" ><img src="../images/faq.png" width="94" height="30" alt="FAQ" border="0"/></a>
   	    </div>
            
            <div style="height:5px; background-color:#3F65AA">
          </div>
  		</div>
        <!-- End of Header -->
        
  		<div id="sidebar">
            <b class="rtop"><b class="r1"></b> <b class="r2"></b> <b class="r3"></b> <b class="r4"></b></b>
               <div style="padding:8px 8px 8px 8px; background-color:#E3FCC6;">
            
				Hi IT-BHU ACM Students Chapter Member ,<br/><br/>
				In order to help us in conduct all the chapter activities more smoothly, we need some information about you. 
				So please help us and provide us the information asked. If you are not a chapter member then please register your self from the register link at top right of this page.
                </div>
            <b class="rbottom"><b class="r4"></b> <b class="r3"></b> <b class="r2"></b> <b class="r1"></b></b>
		</div>
        <!-- End of Sidebar -->
        
<div id="mainContent">
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
</div>
    	<br class="clearfloat" />
        <!-- End of Main Content -->
  		<div id="footer">
    		<p>Site best viewed in Mozilla Firefox v2.0+ at 1280 x 800 resolution or higher.
			</p>
  		</div>
	</div>
</body>
</html>
