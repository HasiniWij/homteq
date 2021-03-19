<?php
include("db.php");
session_start();
$pagename="A smart buy for a smart home"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detectlogin.php");

echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable
//applied to the query string u_prod_id
//store the value in a local variable called $prodid
$prodid=$_GET['u_prod_id'];
//display the value of the product id, for debugging purposes
echo "<p>Selected product Id: ".$prodid;


$SQL="select prodId, prodName, prodPicNameLarge,prodDescripLong,prodPrice,prodQuantity from Product where prodId=$prodid";

$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
echo "<table style='border: 0px'>";

while ($arrayp=mysqli_fetch_array($exeSQL))
{
echo "<tr>";
echo "<td style='border: 0px'>";
//display the small image whose name is contained in the array
echo "<a href=prodbuy.php?u_prod_id=".$arrayp['prodId'].">";
echo "<img src=images/".$arrayp['prodPicNameLarge']." height=200 width=200>";
echo "</a>";
echo "</td>";
echo "<td style='border: 0px'>";
echo "<p><h5>".$arrayp['prodName']."</h5>"; //display product name as contained in the array
echo "<p>".$arrayp['prodDescripLong']."</p><br/>"; //display product description as contained in the array
echo "<p><b>"."Price:".$arrayp['prodPrice']."</p></b><br/>"; //display product price as contained in the array
echo "<p>"."Left in stock: ".$arrayp['prodQuantity']."</p><br/>"; //display product price as contained in the array


echo "<p>Number to be purchased: ";

echo "<form action=basket.php method=post>";

echo "<select name=p_quantity>";
for ($x = 1; $x <= $arrayp['prodQuantity']; $x++) {
	echo "<option value=$x>".$x." </option>";
}
echo "<select>";


echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>";
//pass the product id to the next page basket.php as a hidden value
echo "<input type=hidden name=h_prodid value=".$prodid.">";

echo "</form>";

echo "</td>";
echo "</tr>";
}
echo "</table>";



include("footfile.html"); //include head layout
echo "</body>";
?>	