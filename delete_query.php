<?php
	require_once 'config.php';
	
	if($_GET['id']){
		$id = $_GET['id'];
		
		$conn->query("DELETE FROM `task` WHERE `id` = $id") ;
		header("location: index.php");
	}	
?>