<?php
require 'databaseConnection.php';


?>
<!DOCTYPE html>
<html>

<head>
	<title>ibuy Auctions</title>
	<link rel="stylesheet" href="ibuy.css" />
	<style>
		.dropdown {
			display: inline-block;
			position: relative;
		}

		.dropdown-options {
			display: none;
			position: absolute;
			overflow: auto;
		}

		.dropdown:hover .dropdown-options {
			display: block;
		}

		h1 {
			text-decoration: none;
		}

		h1:hover {
			text-decoration: none;
		}
	</style>
</head>

<body>
	<header>
		<h1><a href="index.php"><span class="i">i</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></a></h1>

		<form action="#">
			<input type="text" name="search" placeholder="Search for anything" />
			<input type="submit" name="submit" value="Search" />
		</form>
	</header>

	<!-- to display category page which specific category -->
	<?php
	
	?>

	<nav>
		<ul>
			<!-- using foreach loop to display all categories in database -->
			<?php
			foreach ($getCategory as $categories) {
				$categoryName = $categories['name'];
				$categoryID = $categories['category_id'];
				// pasting the given HTML code
				echo'<li>'.'<a class="categoryLink" href="categoryPage.php?categoryID='.$categoryID.'">'.$categoryName.'</a>'.'</li>';
			}
			?>

		</ul>
	</nav>
	<div class="dropdown">
		<button>Profile</button>
		<div class="dropdown-options">
			<a href="myAuction.php">View auction</a>
			<a href="addAuction.php">Add auction</a>
			<a href="register.php">Register</a>
			<a href="login.php">login</a>
			<a href="logout.php">logout</a>
		</div>
	</div>
	<span class="dropdown">
		<button>Admin</button>
		<div class="dropdown-options">
			<a href="adminCategories.php">Show-Categories</a>
			<!-- <a href="addCategories.php">Delete-Categories</a> -->
			<a href="addCategories.php">Add-Categories</a>
			<a href="logout.php">logout</a>
		</div>
		</div>
	</span>
	<img src="banners/1.jpg" alt="Banner" />


</body>

</html>