<?php


session_start();
if(!isset($_SESSION["admin_id"]))
{
   header("location: ../../admin-module/login/login.php");
}
?>
<?php

	require_once 'dbconfig.php';
	
	if ($_REQUEST['delete']) {
		
		$pid = $_REQUEST['delete'];
		$query = "DELETE FROM event_details WHERE name=:pid";
		$stmt = $DBcon->prepare( $query );
		$stmt->execute(array(':pid'=>$pid));
		
		if ($stmt) {
			echo "Event Deleted Successfully ...";
		}
		
	}