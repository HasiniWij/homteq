<?php
	if (isset($_SESSION['userid']))
	{
		echo '<p style="float:right;">'.$_SESSION['fname']." ".$_SESSION['sname']. " | user Type:".$_SESSION['usertype']."</p>";
	}
	


?>