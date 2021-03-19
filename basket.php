<?php
include("db.php");
session_start();

$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


if (isset($_POST['posted_prodid'])){
	
	
	$delprodid=$_POST['posted_prodid'];
	unset($_SESSION['basket'][$delprodid]);
    //$_SESSION["basket"] = array_values($_SESSION["basket"]);
	echo "1 item removed from the basket";
	
}

if ( isset($_POST['p_quantity'])){
$reququantity=$_POST['p_quantity'];
$newprodid=$_POST['h_prodid'];
//echo "<p>"."Qunitity of the selected product: ".$reququantity."</p>";
//echo "<p>"."ID of the selected product: ".$newprodid."</p>";

//create a new cell in the basket session array. Index this cell with the new product id.
//Inside the cell store the required product quantity
$_SESSION['basket'][$newprodid]=$reququantity;
echo "<p>1 item added </p>"."<br/	>";
}



if (isset($_SESSION['basket'])){
	echo "<tr>";
	echo "<form action=basket.php method=post>";
	echo "<table style='border: 0px'>";
	echo "<th>"."product name"."</th>";
	echo "<th>"."price"."</th>";
	echo "<th>"."Quantity"."</th>";
	echo "<th>"."subtotal"."</th>";
	echo "<th>"."Remove Product"."</th>";
	echo "</tr>";
		$total=0;
		foreach ($_SESSION['basket'] as $item => $item_value ){
			$index=$item;
			$value=$item_value;
			echo "<input type=hidden name=posted_prodid value=".$item.">";
			$SQL="select prodId, prodName, prodPrice from Product where prodId=$index";
			$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
			$arrayp=mysqli_fetch_array($exeSQL);
			$sub_total =$value*$arrayp["prodPrice"];
			echo "<tr>";
				echo "<td>$arrayp[prodName]</td>";
				echo "<td> $arrayp[prodPrice]</td>";
				echo "<td> $value </td>";
				echo "<td> $sub_total</td>";
				echo "<td><button type='submit'>Remove</button></td>";
				echo "</tr>";
			$total=$total+$sub_total;
				
		}
		echo "<tr>";
		
		echo "<td colspan='3'> Total</td>";
		echo "<td>$total</td>";
		echo "</tr>";
		echo "</form>";
		echo "</table>";
		echo "<br/>";
	
	echo "<a href='clearbasket.php'>Clear Basket</a>";
	echo "</br>";echo "</br>";
	if(isset($_SESSION['userid'])) {
		echo  "To finalise your Order: <a href='checkout.php'>Sign Up</a>";
	}
	else{
		echo  "New hometeq customers: <a href='signup.php'>Sign Up</a>";
		echo "</br>";echo "</br>";
		echo "Returning hometeq customers: <a href='login.php'>Checkout</a>";		
	}
	
}
else{echo "Your Basket is empty";}


include("footfile.html"); //include head layout
echo "</body>";
?>	