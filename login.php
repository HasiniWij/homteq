<?php
session_start();
$pagename="Sign Up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

echo "<div>";
echo "<table style='border: 0px'>";
echo "<form action= login_process.php method=post>";

echo "<tr>";
	echo "<td style='border: 0px'> E-mail </td>";
	echo "<td style='border: 0px'>";
		echo "<input type=text name='email'>";
	echo "</td>";
echo "</tr>";


echo "<tr>";
	echo "<td style='border: 0px'> Password: </td>";
	echo "<td style='border: 0px'>";
		echo "<input type=password name='password'>";
	echo "</td>";
echo "</tr>";
echo "</table>";
echo "<input type=submit name='submitbtn' value='Log In' id='submitbtn' >";
echo "<input type=reset name='clear' value='Clear Form' id='submitbtn' style=' margin-left: 10%'>";


echo "</form>";
echo "</div>";

include("footfile.html"); //include head layout
echo "</body>";
?>	