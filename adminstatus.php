<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" href="table.css" type="text/css">
</head>
<body>
	<header>
		<div class="main">
			<div class="logo">
				<img src="rvcelogo.gif">
			</div>
			<ul>
				<li><a href="home.html">HOME</a></li>
			</ul>
		</div>
		
<?php
session_start();
$con=mysqli_connect('localhost','root');

if(!$con)
{

	echo "Connection failed";
}

$sem=$_POST['sem'];
$sub=$_POST['course'];
$batch=$_POST['batch'];
		
mysqli_select_db($con,'ISE_LAB');

if($sem!=2||$sem!=4||$sem!=6)
	{
		echo '<script language="javascript">';
		echo 'alert("Semester not valid");
		window.location.href="http://localhost/lab/adminstatus.html"';
		echo '</script>';
	}



if($sem==2 && $sub!="PIC")
	{
		echo '<script language="javascript">';
		echo 'alert("Sunject doesn\'t exist for the chosen semester!");
		window.location.href="http://localhost/lab/adminstatus.html"';
		echo '</script>';
	}

if($sem==4 && $sub!="USP"||$sub!="DAA")
	{
		echo '<script language="javascript">';
		echo 'alert("Sunject doesn\'t exist for the chosen semester!");
		window.location.href="http://localhost/lab/adminstatus.html"';
		echo '</script>';
	}

if($sem==6 && $sub!="DBMS"||$sub!="SET")
	{
		echo '<script language="javascript">';
		echo 'alert("Sunject doesn\'t exist for the chosen semester!");
		window.location.href="http://localhost/lab/adminstatus.html"';
		echo '</script>';
	}
if($batch!="B1"||$batch!="B2"||$batch!="B3"||$batch!="B4"){
		echo '<script language="javascript">';
		echo 'alert("Invalid Batch!");
		window.location.href="http://localhost/lab/adminstatus.html"';
		echo '</script>';
	}
	
$q1="select * from student where BATCH='$batch' AND SEMESTER='$sem' ORDER BY USN";
$res1=mysqli_query($con,$q1);

$q2="select distinct Date from attend  WHERE sem='$sem' AND subject='$sub' order by Date asc";
$res2=mysqli_query($con,$q2);


echo "<table>
<tr><td>status</td>";
while($row_u=mysqli_fetch_array($res1)){
	//$usn=$row['USN'];
	echo "<th>" . $row_u['USN'] . "</th>";
}

echo "<th>no. of students who attended</th></tr>";

$q1="select * from student where BATCH='$batch' AND SEMESTER='$sem' ORDER BY USN";
$res1=mysqli_query($con,$q1);

while( $row = mysqli_fetch_array($res1)){
    $new_array[] = $row['USN']; // Inside while loop
}


while($row_d=mysqli_fetch_array($res2)){
	$date=$row_d['Date'];
//	$count_s=0;
	echo "<tr>";
	echo "<td>" . substr($row_d['Date'],0,10) . "</td>";
	foreach($new_array as $usn){
		//$usn=$row_u['USN'];
		$q3="select * from attend WHERE Date='$date' AND usn='$usn' AND subject='$sub'";
		$res3=mysqli_query($con,$q3);
		if(mysqli_num_rows($res3)==0)
			echo "<td>0</td>";
		else if(mysqli_num_rows($res3)>0){
			//$count_s++;
			echo "<td>1</td>";
		}
	
	}
	
	$q4="select COUNT(usn) as count FROM attend WHERE Date='$date' AND usn='$usn'";
	$res4=mysqli_query($con,$q4);
	$data=mysqli_fetch_assoc($res4);
	echo "<td>" .$data['count']. "</td>";
	echo "</tr>";
}
echo "
<tr><td>student attendance</td>";

$q1="select * from student where BATCH='$batch' AND SEMESTER='$sem' ORDER BY USN";
$res1=mysqli_query($con,$q1);

while($row_u=mysqli_fetch_array($res1)){
	$usn=$row_u['USN'];
	$q4="select COUNT(usn) as count FROM attend WHERE usn='$usn' AND subject='$sub'";
	$res4=mysqli_query($con,$q4);
	$data=mysqli_fetch_assoc($res4);
	echo "<td>" .$data['count']. "</td>";
}


	echo "</table>";
	
?>

</body>
</html>
	




