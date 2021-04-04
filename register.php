<?php 
	session_start();
	if (isset($_SESSION['username'])) {
  		header("location: home.php");
	}
    include "connect.php";
    if (isset($_POST['register'])) {
    	$result = $conn->query("SELECT * FROM user WHERE username='$_POST[username]'");
    	if ($result->num_rows == 0) {
    		if ($_POST['password'] == $_POST['confirm_password']) {
    			$result = $conn->query("INSERT INTO user (username, password, name)
    			VALUES ('$_POST[username]', '$_POST[password]', '$_POST[name]')");
    			$message = "Account successfully made";
    		}
    		else {
    			$message = "Password doesn't match";
    		}
    		
    	}
    	else {
    		$message = "Username already used";
    	}
    	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="css/style.css">
	<script>
		function myFunction() {
  			var x = document.getElementById("password");
  			if (x.type === "password") {
    		x.type = "text";
  			}
  			else {
    		x.type = "password";
  			}
		}
	</script>
</head>
<body>
	<div class="content">
		<div id="register">
			<div style="max-width: 500px; margin: auto;">
				<div class="blue-bar txt-1-2rem">Register</div>
				<form method="POST" action="" id="form-register">
					<div id="register-box">
						<p><a class="required">* Required</a></p><p></p><p></p>
						<p>Username<a class="required">*</a></p>
						<p class="text-center">:</p>
						<input class="form-control" style="min-width: 100px" type="text" name="username" required>
						<p>Password<a class="required">*</a></p>
						<p class="text-center">:</p>
						<input class="form-control" style="min-width: 100px" id="password" type="password" name="password" required>
						<p>Confirm Password<a class="required">*</a></p>
						<p class="text-center">:</p>
						<input class="form-control" style="min-width: 100px" id="password" type="password" name="confirm_password" required>
						<p>Name<a class="required">*</a></p>
						<p class="text-center">:</p>
						<input class="form-control" style="min-width: 100px" type="text" name="name" required>
						<?php
							if (isset($message)) {
								echo '<p class="text-center" style="grid-column: 1/4">'.$message.'</p>';
							}
						?>
						<button class="button" style="grid-column: 1/4" type="submit" name="register">Register</button>
						<p class="text-center" style="grid-column: 1/4; margin-left: 5px; margin-right: 5px">
							<i>
								Already have account? Click 
								<u>
									<a href="login.php">here</a>
								</u>
							</i>
						</p>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>