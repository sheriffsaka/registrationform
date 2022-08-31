<?php

session_start();

$error = false;
if (isset($_POST['signup'])) {
	$username = ($_POST['username']);
	$email = ($_POST['email']);
	$password = ($_POST['password']);
	$cpassword = ($_POST['cpassword']);
	if (!preg_match("/^[a-zA-Z ]+$/", $username)) {
		$error = true;
		$uname_error = "Name must contain only alphabets and space";
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if (strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if ($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!$error) {
		if ($username && $email && $password) {
			$success_message = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
		} else {
			$error_message = "Error in registering...Please try again later!";
		}
	}
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = $_POST['password'];
	$_SESSION['email'] = $_POST['email'];
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Homepage: Sactech Computers - Welcome</title>
</head>

<body bgcolor="yellow">


	<section id="newsletter">
		<div class="container">
			<h1>SacTech Computers</h1>
			<h2>New Members Registration Form</h2>
			<div>
				<div>
					<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
						<fieldset style="display:inline; width:fit-content">
							<legend style="outline: 1px solid red; width:fit-content">Sign Up</legend>
							<div>
								<label for="name">Username</label>
								<input type="text" name="username" placeholder="Enter Username" required value="<?php if ($error) echo $name; ?>" class="form-control" />
								<p>
									<span><?php if (isset($uname_error)) echo $uname_error; ?></span>
							</div>
							<div>
								<label for="name">Email</label>
								<input type="text" name="email" placeholder="Email" required value="<?php if ($error) echo $email; ?>" class="form-control" />
								<p>
									<span><?php if (isset($email_error)) echo $email_error; ?></span>
							</div>
							<div>
								<label for="name">Password</label>
								<input type="password" name="password" placeholder="Password" required class="form-control" />(at least 6 characters.) <p>
									<span><?php if (isset($password_error)) echo $password_error; ?></span>
							</div>
							<div>
								<label for="name">Confirm Password</label>
								<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
								<p>
									<span><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
							</div>
							<div>
								<input type="submit" name="signup" value="Sign Up" />
							</div>
						</fieldset>
					</form>
					<span><?php if (isset($success_message)) {
								echo $success_message;
							} ?></span>
					<span><?php if (isset($error_message)) {
								echo $error_message;
							} ?></span>
				</div>
			</div>
			<div class="row">
				<div>
					Already Registered? <a href="login.php">Login Here</a>
				</div>
			</div>
		</div>
	</section>


	<!-- https://github.com/sheriffsaka/registrationTask2 -->






</body>

</html>