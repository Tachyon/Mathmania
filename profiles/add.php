<html>
<head>
</head>
<body>

<?php

 $naam=$_POST["name"];
 $rolnum=$_POST["rollno"];
 $yr=$_POST["year"];
 $branch=$_POST["dept"];
 $contact=$_POST["email"];
 $telephone=$_POST["telephone"];

 echo $naam.$rolnum.$yr.$branch.$contact.$telephone;
 $con=mysql_connect("localhost","root","saket");
 
 if(!$con)
  {
   die('Couldnot connect to database:'.mysql_error());
  }  
  
  mysql_select_db("itbhunet_acm",$con);
  
  $myquery="INSERT INTO request(naam,rolnum,yr,branch,contact,ph) VALUES('$naam','$rolnum','$yr','$branch','$contact','$telephone')";
  $result=mysql_query($myquery,$con);
  if(!$result)
  {
    die('Error in query:'.mysql_error());
  }
  
  mysql_close($con);
   header( 'Location: http://acm.itbhu.ac.in' ) ;
 ?>
</body>
</html>