<?php
$pagename="Sign Up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


echo "<table style='border: 0px'>";
echo "<form action=signup_process.php method=post>";

echo "<tr>";
	echo "<td style='border: 0px'> First Name </td>";
	echo "<td style='border: 0px'>";
		echo "<input type=text name='fname'>";
	echo "</td>";
echo "</tr>";


echo "<tr>";
	echo "<td style='border: 0px'> Last Name </td>";
	echo "<td style='border: 0px'>";
		echo "<input type=text name='lname'>";
	echo "</td>";
echo "</tr>";


echo "<tr>";
	echo "<td style='border: 0px'> Address </td>";
	echo "<td style='border: 0px'>";
		echo "<input type=text name='address'>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
	echo "<td style='border: 0px'> Postcode </td>";
	echo "<td style='border: 0px'>";
		echo "<input type=text name='pcode'>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
	echo "<td style='border: 0px'> Tel No : </td>";
	echo "<td style='border: 0px'>";
		echo "<input type=text name='number'>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
	echo "<td style='border: 0px'> Email Adress </td>";
	echo "<td style='border: 0px'>";
		echo "<input type=text name='email'>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
	echo "<td style='border: 0px'> Password </td>";
	echo "<td style='border: 0px'>";
		echo "<input type=password name='password'>";
	echo "</td>";
echo "</tr>";

echo "<tr>";
	echo "<td style='border: 0px'> Confirm Password </td>";
	echo "<td style='border: 0px'>";
		echo "<input type=password name='cpassword'>";
	echo "</td>";
echo "</tr>";
echo "</table>";
echo "<input type=submit name='submitbtn' value='Sign Up' id='submitbtn' >";
echo "<input type=reset name='clear' value='Clear Form' id='submitbtn' style=' margin-left: 10%'>";
echo "</form>";


//pass the product id to the next page basket.php as a hidden value
//echo "<input type=hidden name=h_prodid value=".$prodid.">";





include("footfile.html"); //include head layout
echo "</body>";
?>	