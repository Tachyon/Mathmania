<html>
	<head>
		<title>Total registrations</title>
	</head>
	<body>
		<?php
		$database="itbhunet_acm";
		mysql_connect ("localhost", "root", "saket");
		@mysql_select_db($database) or die( "Unable to select database");
		$result = mysql_query( "SELECT * FROM user" ) or die("SELECT Error: ".mysql_error());
		
		$num_rows = mysql_num_rows($result);
		echo "There are $num_rows records.<P>";
		echo "<table width=400 border=1>\n";
		while ($get_info = mysql_fetch_row($result)){
		echo "<tr>\n";
		foreach ($get_info as $field)
		echo "\t<td><font face=arial size=1/>$field</font></td>\n";
		echo "</tr>\n";
		}
		echo "</table>\n";
		?>
	</body>
</html>