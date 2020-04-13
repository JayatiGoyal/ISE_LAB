<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" href="labview.css" type="text/css">
</head>
<body>
	<header>
<div style="width: 50%; float:left">
<br>
<br>
<h2> <font color="white">LAB 1A</h2>
<?php
session_start();
$con=mysqli_connect('localhost','root');

if(!$con)
{

	echo "Connection failed";
}
mysqli_select_db($con,'ISE_LAB');

$q="select * from LAB1";

$res=mysqli_query($con,$q);


//echo "<br></br><h1 align='center'><font color='white'>LAB 1</h1>";

echo "<table>

<tr>

<th>DAY</th>
<th>SLOT</th>
<th>SEMESTER</th>
<th>BATCH</th>
<th>COURSE</th>
<th>TEACHER 1</th>
<th>TEACHER 2</th>


</tr>";
while($row = mysqli_fetch_array($res))

  {
  
  if($row['BATCH']=="B1"){

  echo "<tr>";

  echo "<td>" . $row['DAY'] . "</td>";

  echo "<td>" . $row['TIME_SLOT'] . "</td>";

  echo "<td>" . $row['SEMESTER'] . "</td>";
  
  echo "<td>" . $row['BATCH'] . "</td>";
  
  echo "<td>" . $row['COURSE'] . "</td>";
  
  echo "<td>" . $row['TEACHER1'] . "</td>";
  
  echo "<td>" . $row['TEACHER2'] . "</td>";

  echo "</tr>";
 	}

  }

echo "</table>";
			
?>

</div>
<div style="width: 50%; float:right">
<div class="main">
			<ul>
				<li><a href="adminafterlogin.html">BACK</a></li>
			</ul>
		</div>
<div class="main">
			<ul>
				<li><a href="home.html">HOME</a></li>
			</ul>
		</div>
<br>
<br>
<h2><font color="white">LAB 1B </h2>
<?php
//session_start();
$con=mysqli_connect('localhost','root');

if(!$con)
{

	echo "Connection failed";
}
mysqli_select_db($con,'ISE_LAB');

$q="select * from LAB1";

$res=mysqli_query($con,$q);


//echo "<br></br><h1 align='center'><font color='white'>LAB 1</h1>";

echo "<table>

<tr>

<th>DAY</th>
<th>SLOT</th>
<th>SEMESTER</th>
<th>BATCH</th>
<th>COURSE</th>
<th>TEACHER 1</th>
<th>TEACHER 2</th>


</tr>";
while($row = mysqli_fetch_array($res))

  {
  
  if($row['BATCH']=="B2"){

  echo "<tr>";

  echo "<td>" . $row['DAY'] . "</td>";

  echo "<td>" . $row['TIME_SLOT'] . "</td>";

  echo "<td>" . $row['SEMESTER'] . "</td>";
  
  echo "<td>" . $row['BATCH'] . "</td>";
  
  echo "<td>" . $row['COURSE'] . "</td>";
  
  echo "<td>" . $row['TEACHER1'] . "</td>";
  
  echo "<td>" . $row['TEACHER2'] . "</td>";

  echo "</tr>";
 	}

  }

echo "</table>";
			
?>
		</body>
		</html>

