<?php 
	// session_start();
    // // initialize errors variable
	// $errors = "";

	// // connect to database
	// $db = mysqli_connect("localhost", "root", "", "mytodolist1");

	// // insert a quote if submit button is clicked
	// if (isset($_POST['submit'])) {
	// 	if (empty($_POST['mytask'])) {
	// 		$errors = "You must fill in the task field";
	// 	}else{
            
	// 		$mytask = $_POST['mytask'];
    //         $taskdate = date("Y-m-d");
	// 		$sql = "INSERT INTO mytasks (task,taskdate) VALUES ('$mytask','$taskdate')";
	// 		mysqli_query($db, $sql);
	// 		header('location: index.php');
    //         //echo "Your task has been posted successfully...";
	// 	}
	// }

    // delete task
    // if (isset($_GET['del_task'])) {
    //     $id = $_GET['del_task'];

    //     mysqli_query($db, "DELETE FROM mytasks WHERE taskid=".$id);
    //     header('location: index.php');
    // }

	// Attempt update query execution
// 	if (isset($_GET['edit'])) {
//         $id = $_GET['edit'];

// 	$sql = "UPDATE mytasks SET task='$tasks' WHERE taskid=".$id;
// 	if(mysqli_query($db, $sql)){
// 		echo "Records were updated successfully.";
// 	} else {
// 		echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
// 	}
// }
 
// Close connection
//mysqli_close($db);

?>
<?php  include_once('process.php'); ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM mytasks WHERE taskid=$id");

		if (count($record) == 1 ) {
			$sql = mysqli_fetch_array($record);
			$mytask = $sql['task'];
			$taskdate = $sql['taskdate'];
		}
	}
?>
    
<!DOCTYPE html>
<html>
<head>
	<title>ToDo List Application PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List App 1.0</h2>
	</div>
	<form method="post" action="index.php" class="input_form">
        <?php if (isset($errors)) { ?>
            <p><?php echo $errors; ?></p>
        <?php } ?>
		<input type="text" name="mytask" class="task_input">
		<!-- <button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button> -->
		<?php if ($update == true): ?> 
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="submit" >Save</button>
<?php endif ?>
	</form>

    <table>
	<thead>
		<tr>
			<th>SN</th>
			<th>My Tasks</th>
            <th>Task Date</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM mytasks");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
                <td class="task"> <?php echo $row['taskdate']; ?> </td>
				<td>
					<a href="index.php?edit=<?php echo $row['taskid']; ?>" class="edit_btn" >Edit</a>
				</td>
				<td class="delete"> 
					<a href="index.php?del_task=<?php echo $row['taskid'] ?>">Delete</a> 
				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>

    
</body>
</html>