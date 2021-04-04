<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
	include "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="css/style.css">
	<script>
		function openNav() {
			document.getElementById("mySidebar").style.width = "250px";
		}

		function closeNav() {
  			document.getElementById("mySidebar").style.width = "0";
		}
	</script>
</head>
<body>
	<div class="topbar">
		<div class="topbar-left">
			<button class="sidebar-open" onclick="openNav()">☰</button>
		</div>
		<div class="topbar-right">
			<?php
				echo '<p class="logout">Welcome, '.array_values(mysqli_fetch_array($conn->query("SELECT names FROM user WHERE username='$_SESSION[username]'")))[0].'</p>';
			?>
			<a href="logout.php">
				<button class="button logout" name="logout">Logout</button>
			</a>
		</div>
	</div>
	<div id="mySidebar" class="sidebar">
		<button class="sidebar-close" onclick="closeNav()">X</button>
		<a class="margin60"></a>
		<a href="index.php">Home</a>
		<a href="">Product</a>
		<a href="">History</a>
		<hr style="margin-top: 5px; margin-bottom: 5px">
		<a href="">Profile</a>
		<a href="logout.php">Logout</a>
	</div>
	<div class="content-container">
		<div class="index-flex">
			<?php
				$result = $conn->query("SELECT * FROM product ORDER BY id DESC");
				while($data = mysqli_fetch_array($result)) {
			?>
			<div>
				<img class="index-image" src="product/<?php echo $data['image'];?>">
				<p class="index-name"><?php echo $data["name"];?></p>
				<p class="index-price">Rp<?php echo number_format($data['price']);?></p>
				<a href="product.php?id=<?php echo $data['id'] ?>">
					<input type="submit" class="button index-button" style="border: 0;" value="See Details">
				</a>
			</div>
			<?php } ?>
		</div>
	</div>
</body>
</html>