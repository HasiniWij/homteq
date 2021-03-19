<?php
session_start();
include("db.php");
$pagename="Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['cpassword'];
$post_code=$_POST['pcode'];
$tel_number=$_POST['number'];
$regex = '/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

if (!empty($fname) &&!empty($lname) && !empty($address)&&!empty($email) &&!empty($password)&&!empty($post_code)&&!empty($tel_number)){
	if($confirm_password==$password){
		
		if (preg_match($regex, $email)){
			$SQL="INSERT INTO users( userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword) VALUES ('$fname','$lname','$address','$post_code','$tel_number','$email','$password')";
			
			if (preg_match('/[^A-Za-z0-9]/', $fname) || preg_match('/[^A-Za-z0-9]/', $lname)){
				echo "<b>Your Sign-Up failed</b>";
				echo "<br/><br/>";
				echo "Invalid charachters used";
				echo "<br/><br/>";
				echo "Go back to: <a href='signup.php'>Sign Up</a>";
				
			}
			
			
			else if (mysqli_query($conn, $SQL)) { 
				echo "<b>Sign-Up Complete</b>";
				echo "<br/><br/>";
				echo "Go to Log in page: <a href='login.php'>Log In</a>";
			} 
			else if(mysqli_errno($conn) == 1062) { 
				echo "<b>Your Sign-Up failed</b>";
				echo "<br/><br/>";
				echo "An account with your e-mail address is alreay registered";
				echo "<br/><br/>";
				echo "Go back to: <a href='signup.php'>Sign Up</a>";
		
			}
			else if(mysqli_errno($conn) == 1064) { 
				echo "<b>Your Sign-Up failed</b>";
				echo "<br/><br/>";
				echo "Invalid charachters used";
				echo "<br/><br/>";
				echo "Go back to: <a href='signup.php'>Sign Up</a>";
			}
			
			
			
		}
		else {
			echo "<b>Your Sign-Up failed</b>";
			echo "<br/><br/>";
			echo "Please enter your email address correctly";
			echo "<br/><br/>";
			echo "Go back to: <a href='signup.php'>Sign Up</a>";
		}
	}

	else{
		echo "<b>Your Sign-Up failed</b>";
		echo "<br/><br/>";
		echo "The two passwords are not matching";
		echo "<br/><br/>";
		echo "Go back to: <a href='signup.php'>Sign Up</a>";
	}
	
}

else {
	echo "<b>Your Sign-Up failed</b>";
	echo "<br/><br/>";
	echo "All mandatary fields must be filled";
	echo "<br/><br/>";
	echo "Go back to: <a href='signup.php'>Sign Up</a>";
	
}
//or die (mysqli_error($conn))



include("footfile.html"); //include head layout
echo "</body>";
?>	