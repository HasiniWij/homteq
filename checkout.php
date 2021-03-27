<?php
session_start();
include("db.php");
$pagename="checkout"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$currentdatetime=date('Y-m-d H:i:s');
$userId=$_SESSION['userid'];
$SQL="INSERT INTO orders( userId, orderDateTime,  orderStatus) VALUES ('$userId','$currentdatetime','Placed')";


if(mysqli_query($conn, $SQL)){
		
	$sql="SELECT MAX(orderNo) as orderNo  FROM orders where userId='$userId';";
	$exeSQL=mysqli_query($conn, $sql) or die (mysqli_error($conn));
	$arrayord=mysqli_fetch_array($exeSQL);
	$orderNo=$arrayord['orderNo'];
	echo "Order  has been placed successfully! Your order Number: ".$orderNo;
	
	echo "<tr>";
	echo "<form action=basket.php method=post>";
	echo "<table style='border: 0px'>";
	echo "<th>"."product name"."</th>";
	echo "<th>"."price"."</th>";
	echo "<th>"."Quantity"."</th>";
	echo "<th>"."subtotal"."</th>";

	echo "</tr>";
		$total=0;
		foreach ($_SESSION['basket'] as $item => $item_value ){
			$index=$item;
			$value=$item_value;
			$SQL="select prodId, prodName, prodPrice from Product where prodId=$index";
			$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
			$arrayp=mysqli_fetch_array($exeSQL);
			$sub_total =$value*$arrayp["prodPrice"];
			echo "<tr>";
				echo "<td>$arrayp[prodName]</td>";
				echo "<td> $arrayp[prodPrice]</td>";
				echo "<td> $value </td>";
				echo "<td> $sub_total</td>";
				echo "</tr>";
			$total=$total+$sub_total;
			$inserSql="INSERT INTO order_line(orderNo, prodId, quantityOrdered, subTotal) VALUES ('$orderNo','$index','$value','$sub_total')";
			mysqli_query($conn, $inserSql);
			
		}
		echo "<tr>";
		
		echo "<td colspan='3'> Total</td>";
		echo "<td>$total</td>";
		echo "</tr>";
		echo "</form>";
		echo "</table>";
		echo "<br/>";
		$updateSQL="UPDATE orders SET orderTotal='$total'WHERE orderNo='$orderNo';";
		mysqli_query($conn, $updateSQL);
		unset($_SESSION['basket']);
		echo  "Logout: <a href='logout.php'>Logout</a>";
}
elseif (mysqli_error($conn)){
	
	echo "Error";	
	
}









include("footfile.html"); //include head layout
echo "</body>";
?>	