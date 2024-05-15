<?php
	require_once 'config.php';
	
	if($_GET['id'] != ""){
		$id = $_GET['id'];
		
		$conn->query("UPDATE `task` SET `status` = 'Done' WHERE `id` = $id") ;
		header('location: index.php');
	}
?>