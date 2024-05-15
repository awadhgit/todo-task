<?php
header('Content-type: application/json');

include "config.php";

 $userForm = array();

    $task = $_POST['task'];
	

	$query = "INSERT INTO task (task,status) values('$task','pending')";
    $result = $conn->query($query);

    if($result==true){
    	 echo json_encode("Todo is added successfully");
    }else{
    	 echo json_encode("fail");
    }

	

    
  
?>