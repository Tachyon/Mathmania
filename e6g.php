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
    <h2>Rank List </h2>
		<?php
			$noq=0;
			function cmp($a, $b) 
				{
				$result = mysql_query( "SELECT * FROM mm_q where visible=1" );
				$index=mysql_num_rows($result)+3;
				//$index = $noq + 1;
				//echo $index." ";
				//echo $a." ".$b."<br/>";
				if ((int)$a[$index] == (int)$b[$index]) 
					{
					//echo $a[9]." ".$b[9]."<br/>";
					if ((int)$a[$index-1] == (int)$b[$index-1])
						return 0;
					return ((int)$a[$index-1] > (int)$b[$index-1]) ? 1 : -1;
					}
				return ((int)$a[$index] < (int)$b[$index]) ? 1 : -1;
				}
			
			include_once('sql.php');
			$database=$db;
			mysql_connect ($sqlhost, $sqluser, $sqlpass);
			@mysql_select_db($database) or die( "Unable to select database");
			$result = mysql_query( "SELECT * FROM mm_q where visible=1" ) or die("SELECT Error: ".mysql_error());
			while ($get_info = mysql_fetch_row($result))
				{
				$qcode[$noq++]= $get_info[0];
				}

			$nom=0;
			$result = mysql_query( "SELECT * FROM mm_user" ) or die("SELECT Error: ".mysql_error());
			
			while ($get_info = mysql_fetch_assoc($result))
				{
				$name = mysql_query( "SELECT * FROM user where Roll='".$get_info['rollno']."'" ) or die("SELECT Error: ".mysql_error());
				$name_info = mysql_fetch_assoc($name);
				$score[$nom][0] = "<a href=user.php?user=".$name_info['Roll'].">".$name_info['FName']." ".$name_info['LName']."</a>";;
				$score[$nom][1] = strtoupper($name_info['Roll']);
				$sum = 0;
				$nos = 0;
				
				for($i=0;$i<$noq;$i++)
					{
					$correct_ans = mysql_query( "SELECT ans FROM mm_a where code='".$qcode[$i]."'" ) or die("SELECT Error: ".mysql_error());
					$right_ans = mysql_fetch_assoc($correct_ans);
					if(strlen($get_info[$qcode[$i]])!=0)
						if(strcmp($get_info[$qcode[$i]],$right_ans['ans'])==0)
							{
							$score[$nom][$i+2] = '<div style="font-size:10px;text-align:center"><img src=images/correct.gif width=25px/><br/>('.date('H:i:s', (int)$get_info[$qcode[$i]."_t"]).")</div>";
							$nos++;
							$sum = $sum + (int)$get_info[$qcode[$i]."_t"];
							}
						else
							{
							$score[$nom][$i+2] = '<div style="font-size:10px;text-align:center"><img src=images/wrong.gif width=15px/><br/>('.date('H:i:s', (int)$get_info[$qcode[$i]."_t"]).")</div>";
							//$nos++;
							}
					else
						$score[$nom][$i+2] = "";
					
					}
				$score[$nom][$i+2] = $sum;
				$score[$nom][$i+3] = $nos;
				$nom++;
				}
			//echo cmp($score[2],$score[0])." <br/>";
				
			usort($score, 'cmp');
			echo '<table width=780px border=0 class=bg_table style="font-size:14px;"><tr><th style="text-align:center;">Name</td><th style="text-align:center;">Roll No</td>';
			for($j=1;$j<=$noq;$j++)
				echo '<th style="text-align:center;">Q.'.$j.'</td>';
			echo '<th style="text-align:center;">Time</td><th style="text-align:center;">Correct</td></tr>';
			for($i=0;$i<$nom;$i++)
				{
				echo '<tr>';
				for($j=0;$j<$noq+4;$j++)
					echo '<td style="text-align:center;">'.$score[$i][$j]."</td>";
				echo "</tr>";
				}
			echo "</table>";
			
		?>
		<br/><br/>
		The Contest is over now. And these are the final rankings. 
		<br/><br/>
		</div>
  <div id="footer">
    <div id="bottom" class="noprint">
<a href="http://acm.itbhu.ac.in">Brought to you by IT BHU ACM Students Chapter</a>
	</div>
</div>
