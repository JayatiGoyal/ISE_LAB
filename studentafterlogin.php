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
				<img src="http://localhost/lab/rvcelogo.gif">
			</div>
			<ul>
				        <div id="like_button_container" ></div><li>

    <!-- Load React. -->
    <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
    <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>

    <!-- Load our React component. -->
    <script src="http://localhost/lab/like_button1.js"></script></li>
			</ul>
		</div>

		
<?php
session_start();
$con=mysqli_connect('localhost','root');
date_default_timezone_set('Asia/Kolkata');
mysqli_select_db($con,'ise_lab');
$usn = $_GET['usn'];
$batch = $_GET['batch'];
$sem=$_GET['sem'];
$lab=$_GET['lab'];
$subject=$_GET['subject'];	
$q1="SELECT * FROM attend WHERE subject='$subject' AND BATCH='$batch' GROUP BY DATE ORDER BY Date ASC";
$res1=mysqli_query($con,$q1);
$q2="SELECT * FROM attend WHERE USN='$usn' GROUP BY DATE ORDER BY Date ASC";
$res2=mysqli_query($con,$q2);

while( $row = mysqli_fetch_array($res1)){
    $new_array[] = $row['SUBJECT']; // Inside while loop
}
$res1=mysqli_query($con,$q1);
echo '<table style="width:75%">';

if(mysqli_num_rows($res2)==0)
{
		echo '<script language="javascript">';
		echo 'alert("No classes conducted yet!");
		window.location.href="http://localhost/lab/studentlogin.html"';
		echo '</script>';
}
echo "<tr>";
while($row1=mysqli_fetch_array($res1)){
	echo "<th>" . $row1['DATE'] . "</th>";
}
echo "</tr>";
echo "<tr>";
$res1=mysqli_query($con,$q1);
	while($row1=mysqli_fetch_array($res1)){
		$date=$row1['DATE'];
		$q3="SELECT * FROM attend WHERE DATE='$date' AND USN='$usn'";
		$res_3=mysqli_query($con,$q3);
		if($res_3){
			echo "<td>1</td>";
		}
		else{
			echo "<td>0</td>";
		}
	}	
echo "</tr>";
echo "</table>";

?>

</body>
</html>