<?php

	session_start();
	$con=mysqli_connect('localhost','root');

	/*if($con)
		{
			echo "Connection Successful";
		}
	if(!$con)
		{
			echo "Connection couldn't be established";
		}
	*/
	mysqli_select_db($con,'ISE_LAB');
	
	if(isset($_POST['usrname'])){
	    $name = $_POST['usrname']; 
	 }
	 else{
	      $name = "Name not set in POST Method";
	 }
	$pass = $_POST['password'];

	$q = "select * from FACULTY where USERNAME ='$name' && PASSWORD ='$pass' ";
	
	$result = mysqli_query($con,$q);
	
	$num = mysqli_num_rows($result);

	if($num==1)
	{
		$_SESSION['username']=$name;
		header('location:http://localhost/lab/adminafterlogin.html');
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Wrong username || password!");
		window.location.href="http://localhost/lab/adminlogin.html"';
		echo '</script>';
	}
	
?>
