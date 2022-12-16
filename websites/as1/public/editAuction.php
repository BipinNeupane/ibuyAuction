<?php
require 'header.php';
require 'databaseConnection.php';

// getting from the url
$productID = $_GET['productID'];

$getAuctionQuery = $pdo->query("SELECT `title`, `endDate`, `description`, `categoryId`, `price` FROM `auctions` WHERE product_id = $productID;");

$getAuctionQuery->execute();
$getAuction = $getAuctionQuery->fetchAll();

foreach($getAuction as $auction){
    $title = $auction['title'];
    $endDate = $auction['endDate'];
    $description = $auction['description'];
    $price = $auction['price'];
}

?>



<h2>Edit Auction</h2>


<form action="#" method="POST">
        <label for="productName">Prouct name</label>
        <input type="text" name="productName" value=<?php
        echo $title;
        ?>><br>
        <label for="productDesc">Description</label>
        <textarea name="productDesc" id="desc" cols="10" rows="6" maxlength="255"><?php
        echo $description;
        ?></textarea>
        <label for="date">Date</label>
        <input type="date" name="date" value=<?php
        echo $endDate;
        ?>><br>
        <label for="price">Price</label>
        <input type="text" name="price" value=<?php
        echo $price;
        ?>><br>
        <select name="categories">
          <?php
          // looping through categories from database
          foreach ($getCategory as $categories) {
            $categoryName = $categories['name'];
            echo '<option value="' . $categoryName . '">' . $categoryName . '</option>';
          }
          ?>
        </select><br>
          <button type="submit" name="submit">Submit</button>
</form>

<!-- After clicking submit button -->

<?php
if(isset($_POST['submit'])){
    $newTitle = $_POST['productName'];
    $newDescription =$_POST['productDesc'];
    $newDate = $_POST['date'];
    $newPrice = $_POST['price'];
    $newCategory = $_POST['categories'];

    $updateAuctionQuery = $pdo->query("UPDATE `auctions` SET `title`='$newTitle',`endDate`='$newDate',`description`='$newDescription',`categoryId`='$newCategory',`price`='$newPrice' WHERE product_id='$productID'");
    $updateAuctionQuery->execute();
    echo "Auction Updated";
}
?>