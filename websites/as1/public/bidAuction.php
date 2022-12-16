<?php
session_start();



// requirements



require 'header.php';

if (isset($_SESSION['username'])) {
	include_once('databaseConnection.php');
	$productID = $_GET['productID'];
	// echo $productID;



	// to get info
	$getBidQuery = $pdo->query("SELECT * FROM `auctions` WHERE product_id =$productID");
	$getBidQuery->execute();
	$bidInfoResult = $getBidQuery->fetchAll();



	// getting the product info through foreach loop
	foreach ($bidInfoResult as $results) {
		$name = $results['title'];
		$category = $results['categoryId'];
		$price = $results['price'];
		$description = $results['description'];
		$userID = $results['user_id'];
	}

	$getUsername =  $pdo->query("SELECT * FROM `users` WHERE  id='$userID'");
	$getUsername->execute();
	$usernameResult = $getUsername->fetchAll();

	foreach ($usernameResult as $values) {
		$username = $values['name'];
		$sellerID = $values['id'];
	}
	// echo $name;
	// echo $_SESSION['userID'];
	// echo $userID;
	// echo $sellerID;

	// after clicking submit button
	if (isset($_POST['submit'])) {
		$bidPrice = $_POST['bid'];
		// query only executes when the amound of new bid is higher than recent bid
		if ($bidPrice > $price) {
			$updatePriceQuery = $pdo->query("UPDATE `auctions` SET `price` = '$bidPrice' WHERE product_id = '$productID'");
			$updatePriceQuery->execute();
		}
		// refreshes the page 
		header('location:bidAuction.php?productID=' . $productID);
	}
?>

	<h1>Product Page</h1>
	<article class="product">

		<img src="product.png" alt="product name">
		<section class="details">
			<h2><?php
				echo $name;
				?></h2>
			<h3>Product category : <?php
									echo $category;
									?></h3>
			<p>Auction created by <a href="#"><?php
												echo $username;
												?></a></p>
			<p class="price">Current bid: £ <?php
											echo $price;
											?></p>
			<time>Time left: 8 hours 3 minutes</time>
			<form action="#" method="POST" class="bid">
				<input type="text" name="bid" placeholder="Enter bid amount" />
				<input type="submit" name="submit" value="Place bid" />
			</form>
		</section>
		<section class="description">
			<p>
				Product Description :
				<?php
				echo $description;
				?>
			</p>
		</section>

		<!-- to print reviews using loop -->
		<?php
		$getReviewsQuery = $pdo->query("SELECT u.name, r.review, r.date FROM users u , review r WHERE forUser=$sellerID AND id = postedBy");
		$getReviewsQuery->execute();
		$reviewsResults = $getReviewsQuery->fetchAll();
		?>

		<section class="reviews">
			<h2>Reviews of <?php
							echo $username;
							?> </h2>
			<ul>
				<?php
				foreach ($reviewsResults as $result2) {
					$review = $result2['review'];
					$postedBy = $result2['name'];
					$datePosted = $result2['date'];
					echo '<li><strong>'.$postedBy.'  said </strong>' . $review . ' <em>'.$datePosted.'</em></li>';
				}
				?>
			</ul>

			<form action="#" method="POST">
				<label for="reviewtext">Add your review</label> <textarea name="reviewtext"></textarea>

				<input type="submit" name="submit1" value="Add Review" />
			</form>
		</section>
	</article>

<?php
	// $getReviewsQuery = $pdo->query("SELECT * FROM `review`");
	// $getReviewsQuery->execute();
	// $reviewsResults=$getReviewsQuery->fetchAll();

	// submit reviews 

	if (isset($_POST['submit1'])) {
		$reviewsText = $_POST['reviewtext'];
		$date = date("Y-m-d");
		$reviewBy = $_SESSION['userID'];

		$postReviewQuery = $pdo->query("INSERT INTO `review`(`review`, `postedBy`, `date`, `forUser`) VALUES ('$reviewsText','$reviewBy','2022-01-10','$sellerID')");
		$postReviewQuery->execute();
	}

	// echo $userID2;
} else {
	echo 'You are not logged in <a href="login.php"><button>Login Now!</button></a>';
}
?>