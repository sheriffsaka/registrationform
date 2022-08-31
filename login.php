<?php
session_start();
// echo 'Welcome ' . $_SESSION["username"]. ' ' . $_SESSION["password"] . ' and '. $_SESSION["email"];
// if(isset($_SESSION['user_id'])) {
//     header("Location: index.php");
// }
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	if ($email && $password) {
		$_SESSION['user_id'] = $email && $password;
		echo "<h4>";
		echo "<br>" . "You are successfully Logged in";
		echo "</h4>";
	} else {

		$error_message = "Incorrect Email or Password!!!";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<body>
	<div class="container">
		<h2>Example: Login and Registration</h2>
		<div class="row">
			<div>
				<form role="form" action="login.php" method="post" name="loginform">
					<fieldset style="width: 300px;">
						<legend>Login</legend>
						<div>
							<label for="name">Email</label>
							<input type="text" size=40 name="email" placeholder="Your Email" required class="form-control" />
						</div>
						<p>
						<div>
							<label for="name">Password</label>
							<input type="password" size=40 name="password" placeholder="Your Password" required class="form-control" />
						</div>
						<div>
							<input type="submit" name="login" value="Login" class="btn btn-primary" />
						</div>
					</fieldset>
				</form>
				<span><?php if (isset($error_message)) {
							echo $error_message;
						} ?></span>
			</div>
		</div>
		<div class="row">
			<div>
				New User? <a href="index.php">Sign Up Here</a>
			</div>
			<div>
				Click here to <a href="logout.php">Logout</a>
			</div>
		</div>
	</div>


</body>

</html>