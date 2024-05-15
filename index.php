<?php 
require 'config.php';
	
	$count = 1;

	if(ISSET($_POST['showall'])){
		$query = $conn->query("SELECT * FROM `task` ORDER BY `id` desc");

	}else{
		$query = $conn->query("SELECT * FROM `task` WHERE status='pending' ORDER BY `id` desc");
	}
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		 <meta name="viewport" content="width=device-width, initial-scale=1">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- 		   <link href="css/bootstrap.css" rel="stylesheet">
 -->		    <link href="css/style.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	</head>
<body>
	
	<div class="container">
	<div class="col-md-8 row">
		<h1 class="maintitle">PHP Simple To Do List App</h1>
		<hr>
		
		<p><span id="response"></span></p>
		<div class="col-md-8">
		
				<form id='userForm' class="form-inline">
					<input type="text" class="form-control" name="task" required/>
				
					<input class="btn btn-primary form-control" type='submit' value='Submit' />
				</form>
		</div>
		<div class="col-md-2">
			
				<form method="POST" class="form-inline">
					<button class="btn btn-success form-control" name="showall">Show All</button>
				</form>
			
		</div>

		
		<table class="table" style="margin-top: 20px">
			<thead>
				<tr>
					<th>sino</th>
					<th>Task</th>
					<th>Task Status</th>
					<th>Action</th>

				</tr>
			</thead>
			<tbody>
				<?php
					
					while($result = $query->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $count++?></td>
					<td><?php echo $result['task']?></td>
					<td><?php echo $result['status']?></td>
					<td>
						<center>
							<?php
								if($result['status'] != "Done"){
									echo 
									'<a href="update.php?id='.$result['id'].'" class="btn btn-success" ><span class="fa fa-check"></span></a> ';
								}
							?>
							 <a href="delete_query.php?id=<?php echo $result['id']?>" class="btn btn-danger" onclick="return checkDelete()"><span class="fa fa-remove"></span></a>
						</center>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	</div>
	<script>
    $(document).ready(function(){
        $('#userForm').submit(function(){
        $.ajax({
            type: 'POST',
            url: 'add_task.php',
            data: $(this).serialize() // getting filed value in serialize form
        })
        .done(function(data){ // if getting done then call.

            // show the response
            $('#response').html(data);
        })
        .fail(function() { // if fail then getting message

            // just in case posting your form failed
            alert( " failed." );
        });
        // to prevent refreshing the whole page page
        return false;

        });
    });

function checkDelete(){
    return confirm('Are you sure?');
}
</script>
</body>

</html>


