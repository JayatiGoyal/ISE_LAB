<?php

	session_start();
	$con=mysqli_connect('localhost','root');
	date_default_timezone_set('Asia/Kolkata');
	function extract_time($time){
		return substr($time,0,8);
	}

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

	$i_info=mysqli_fetch_row($result);

	if($num==1)
	{
		$_SESSION['username']=$name;

		$batch=$i_info[4];
		if($batch=='B1' || $batch=='B2'){
			$lab='LAB1';
		}
		else{
			$lab='LAB2';
		}

		$jd = cal_to_jd(CAL_GREGORIAN,date("m"),date("d"),date("Y"));		//Finds the date
		$day=JDDayOfWeek($jd,1);
		$time=time();
		$q = "SELECT * FROM $lab WHERE DAY='$day' AND BATCH='$batch' AND SEMESTER='$i_info[3]'";
		$result = mysqli_query($con,$q);
		$num=mysqli_num_rows($result);
	
		if($num==1){

			//check if the attendance is already taken
			$q = "SELECT * FROM attend WHERE USN='$name' AND DATE=curdate() ";
			$result1=mysqli_query($con,$q);
			$num=mysqli_num_rows($result1);

			if($num==0){

				$i_info2=mysqli_fetch_row($result);
				$allotted_time=extract_time($i_info2[1]);
				$timedif= ($time-strtotime($allotted_time));
				//echo $timedif/60;
				if(($timedif/60)<90){

					$q="INSERT INTO attend(DATE,USN,SEM,SUBJECT) VALUES (curdate(),'$name',$i_info[3],'$i_info2[4]')";
					$result=mysqli_query($con,$q);
					if(!$result)
						echo "Error";

					echo '<script language="javascript">';
					echo 'alert("Attendance taken!!");
						window.location.href="http://localhost/lab/studentafterlogin.html"';
					echo '</script>';
					mysqli_close($con);

				}
				else{
					echo '<script language="javascript">';
					echo 'alert("You were a tad bit too late! Sorry!");
					window.location.href="http://localhost/lab/studentlogin.html"';
					echo '</script>';
				}

			}
			else{
				echo '<script language="javascript">';
				echo 'window.location.href="http://localhost/lab/studentafterlogin.html"';
				echo '</script>';
			}

		}
		else{
			echo '<script language="javascript">';
			echo 'alert("There is no lab being conducted for your batch right now!");
				window.location.href="http://localhost/lab/studentlogin.html"';
			echo '</script>';
		}
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Wrong username || password!");
		window.location.href="http://localhost/lab/studentlogin.html"';
		echo '</script>';
	}
	
?>
