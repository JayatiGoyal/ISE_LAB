<?php

	session_start();
	$con=mysqli_connect('localhost','root');

	/*if($con)
		{
			echo "Connection Successful";
		}
	else
		{
			echo "Connection couldn't be established";
		}
	*/
	mysqli_select_db($con,'ise_lab');
	
	if(isset($_POST['usn'])){
	    $name = $_POST['usn']; 
	 }
	 else{
	      $name = "Name not set in POST Method";
	 }
	$pass = $_POST['password'];

	$q = "select * from STUDENT where USN ='$name' && PASSWORD ='$pass' ";
	
	$result = mysqli_query($con,$q);
	
	$num = mysqli_num_rows($result);

	if($num==1)
	{
		$_SESSION['username']=$name;
		header('location:http://localhost/lab/studentafterlogin.html');
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Wrong username || password!");
		window.location.href="http://localhost/lab/studentlogin.html"';
		echo '</script>';
	}
	
?>