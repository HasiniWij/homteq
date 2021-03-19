<?php
session_start();
include("db.php");
$pagename="Your Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
$email=$_POST['email'];
$password=$_POST['password'];

if (empty($email) || empty($password) ){
	echo "<b>Login failed</b>";
	echo "<br/><br/>";
	echo "Login form incomplete";
	echo "<br/><br/>";
	echo "Make sure you provide all the requiered details";
	echo "<br/><br/>";
	echo "Go back to: <a href='login.php'>Login</a>";
}
else {
	//$sql="select  userId, userType, userFName, userSName from users where userEmail=$email;";
	$sql="SELECT  userId, userType, userFName,userPassword, userSName FROM users WHERE userEmail='".$email."'";
	$exeSQL=mysqli_query($conn, $sql) or die (mysqli_error($conn));
	$arrayu=mysqli_fetch_array($exeSQL);
	$nbrecs=mysqli_num_rows($exeSQL);
	
	if ($nbrecs==0){
		echo "<b>Login failed</b>";
		echo "<br/>";
		echo "Email not recognized";
		echo "<br/><br/>";
		echo "Go back to: <a href='login.php'>Login</a>";
		
	}
	else {
		if ($arrayu['userPassword']!=$password){
			echo "<b>Login failed</b>";
			echo "<br/>";
			echo "Password not valid";
			echo "<br/><br/>";
			echo "Go back to: <a href='login.php'>Login</a>";
			
		}
		else {
			$_SESSION['userid']=$arrayu['userId'];
			$_SESSION['usertype']=$arrayu['userType'];
			$_SESSION['fname']=$arrayu['userFName'];
			$_SESSION['sname']=$arrayu['userSName'];
			echo "<b>Login Success</b>";
			echo "<br/>";
			echo "Welcome, ".$_SESSION['fname']." ".$_SESSION['sname'];
			echo "<br/><br/>";
			if ($_SESSION['usertype']=="c"){
				echo "Continue shopping for <a href='index.php'>Home Tech</a>";
				echo "<br/>";
				echo "view your smart basket <a href='basket.php'>Smart Basket</a>";
				
			}
			
			
		}
	}
	
}	







//echo "Email eneterd:".$email."<br/>";
//echo "password eneterd:".$password;


include("footfile.html"); //include head layout
echo "</body>";
?>	