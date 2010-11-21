<?php
		$fname=$_POST["fname"];
		$lname=$_POST["lname"];
		$roll=$_POST["roll"];
		$pass=$_POST["pass"];
		$branch=$_POST["branch"];
		$year=$_POST["year"];
		$email=$_POST["email"];
		$phone=$_POST["telephone"];
		include_once('./sql.php');
		
		$con=mysql_connect($sqlhost,$sqluser,$sqlpass);
		
		if(!$con)
			{
				die('Couldnot connect to database:\n Error recieved'.mysql_error());
			} 
			
		mysql_select_db($db,$con);
		
		$myquery="INSERT INTO user(FName,LName,pass,Branch,Year,email,Roll,Phone) VALUES('$fname','$lname','$pass','$branch','$year','$email','$roll','$phone')";
		$result=mysql_query($myquery,$con);
		if(!$result)
		  {
			die('Error in query:'.mysql_error());
		  }
		header("location:thanks.html");
		 
	?>