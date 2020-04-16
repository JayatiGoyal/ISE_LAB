<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" href="home-style.css" type="text/css">
	

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
	
<form class="form-signin" action="http://localhost/lab/adminlogin.php" method="post"> 
<?php require ("/home/vibhanshi/vendor/autoload.php");

//Entering  google account credentials

$g_client = new Google_Client();

$g_client->setClientId("822845450110-0cevajjh7a4c71m47ta7vur0dnen4cas.apps.googleusercontent.com");
$g_client->setClientSecret("w_IWJ0eJOTBk58Cy4H3xvjlT");
$g_client->setRedirectUri("http://localhost/lab/adminafterlogin.html");
$g_client->setScopes("email");

// Creating the url
$auth_url = $g_client->createAuthUrl();
echo "<div class='butt' align='center' border='1px'><a href='$auth_url' class='btn' boredr='1px'><font size='5px'><img width='20px' style='margin-top:7px; margin-right:8px' alt='Google sign-in' 
                src='https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png' />LOGIN WITH GOOGLE</font></h3></a></div>";
		
//echo "<a href='$auth_url'>Login Through Google </a>";

// Get the authorization  code
$code = isset($_GET['code']) ? $_GET['code'] : NULL;


// Get access token
if(isset($code)) {

    try {

        $token = $g_client->fetchAccessTokenWithAuthCode($code);
        $g_client->setAccessToken($token);

    }catch (Exception $e){
        echo $e->getMessage();
    }




    try {
        $pay_load = $g_client->verifyIdToken();


    }catch (Exception $e) {
        echo $e->getMessage();
    }

} else{
    $pay_load = null;
}



if(isset($pay_load)){

;
    

}?>				


<h2 ><font color="white">&nbsp &nbsp &nbsp &nbsp Admin log in</font></h2>  <br>&nbsp &nbsp &nbsp 
<input type="text" name='usrname' class="form-control" placeholder="Username" required autofocus> <br><br>&nbsp &nbsp &nbsp 
<input type="password" name='password' class="form-control" placeholder="Password" required><br>
  <br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
   <button class="btn btn-primary" type="submit"><font color="black"><font size="4px">Log in</button><br/>    			     		


</header>
</body>
</html>
