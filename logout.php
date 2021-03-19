<?php
session_start();
$pagename="LOGOUT"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
echo "Thank You,".$_SESSION['fname']." ".$_SESSION['sname'];
echo "</br>";
unset($_SESSION['userid']);
unset($_SESSION['fname']);
unset($_SESSION['sname']);
unset($_SESSION['usertype']);
echo "You are now logged out.";
include("footfile.html"); //include head layout
echo "</body>";
?>	
