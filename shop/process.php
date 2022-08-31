<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'mytodolist1');

	// initialize variables
	$mytask = "";
	$id = 0;
	$update = false;

	if (isset($_POST['submit'])) {
		$mytask = $_POST['mytask'];
        $taskdate = date("Y-m-d");

		mysqli_query($db, "INSERT INTO mytasks (task, taskdate) VALUES ('$mytask', '$taskdate')"); 
		$_SESSION['message'] = "Task added successfully"; 
		header('location: index.php');
	}


    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $mytask = $_POST['mytask'];
        $taskdate = date("Y-m-d");
    
        mysqli_query($db, "UPDATE mytask SET task='$mytask', taskdate='$taskdate' WHERE taskid=$id");
        $_SESSION['message'] = "Task updated!"; 
        header('location: index.php');
    }

    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
        mysqli_query($db, "DELETE FROM mytask WHERE taskid=$id");
        $_SESSION['message'] = "Task deleted!"; 
        header('location: index.php');
    }
