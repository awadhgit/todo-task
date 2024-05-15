
<?php
	$conn = new mysqli("localhost", "root", "", "todo");
	
	if(!$conn){
		die("Error: something went wrong to database connection");
	}
?>