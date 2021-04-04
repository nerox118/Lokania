<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }
	include "connect.php";
    if (!isset($_GET['id'])) {
        header("location: index.php");
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
		<button class="sidebar-close" onclick="closeNav()">☰</button>
		<a class="margin60"></a>
		<a href="home.php">Home</a>
		<a href="">Product</a>
		<a href="">History</a>
		<hr style="margin-top: 5px; margin-bottom: 5px">
		<a href="">Profile</a>
		<a href="logout.php">Logout</a>
	</div>
	<div class="content-container">
        <div class="product-flex">
            <?php
                $result = $conn->query("SELECT * FROM product WHERE id='$_GET[id]'");
                $data = mysqli_fetch_array($result);
            ?>
            <img class="product-image" src="product/<?php echo $data['image'];?>">
            <div>
                <h2 class="product-name"><?php echo $data['name'];?></h2>
                <div class="description">
                    <h4 class="title-description">Description :</h4>
                    <p class="product-description"><?php echo $data['description'];?></p>
                </div>
                <form action="transaction.php" method="post">
				    <input type="hidden" name="id" value="<?php echo $data['id'];?>">
				    <input type="submit" class="button home-button" style="border: 0;" value="Buy Product">
                </form>
            </div>
        </div>
    </div>
</body>
</html>