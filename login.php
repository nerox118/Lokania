<?php
	session_start();
	if (isset($_SESSION['username'])) {
  		header("location: home.php");
	}
	include "connect.php";
	if (isset($_POST['login'])) {
  		$username = $_POST['username'];
  		$password = $_POST['password'];
  		$sql = $db->prepare("SELECT * FROM user WHERE username=:a AND password=:b");
  		$sql->bindParam(':a', $username);
  		$sql->bindParam(':b', $password);
  		$sql->execute();
  		$data = $sql->fetch();
  		if(!empty($data)){
  			$_SESSION['username'] = $username;
  			header('location: index.php');
  		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
		<div id="login">
			<div style="max-width: 500px; margin: auto;">
				<div class="blue-bar txt-1-2rem">Login</div>
				<form method="POST" action="" id="form-login">
					<div id="login-box">
						<p>Username</p>
						<p class="text-center">:</p>
						<input class="form-control" style="min-width: 100px" type="text" name="username" maxlength="20" required>
						<p>Password</p>
						<p class="text-center">:</p>
						<input class="form-control" style="min-width: 100px" id="password" type="password" name="password" required>
						<p></p><p></p>
						<div>
							<input class="form-control" type="checkbox" onclick="myFunction()">
							<span>Show Password</span>
						</div>
						<?php
						if (isset($_POST['login'])) {
							echo '<p class="text-center" style="grid-column: 1/4">Username or Password not found</p>';
						}
						?>
						<button class="button" style="grid-column: 1/4" type="submit" name="login">Login</button>
						<p class="text-center" style="grid-column: 1/4; margin-left: 5px; margin-right: 5px">
							<i>
								Don't have account? Register 
								<u>
									<a href="register.php">here</a>
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