<?php
// requirements
include_once('databaseConnection.php');
require 'header.php';

$getCategoryFromLink = $_GET['categoryID'];
// getting name from category id
$getCategoryNameQuery = $pdo->query("SELECT name FROM category WHERE category_id='$getCategoryFromLink'");
$getCategoryNameQuery->execute();
$categoryResult = $getCategoryNameQuery->fetchAll();

// storing the value
foreach($categoryResult as $category){
    $categoryName = $category['name'];
}

// pasting the same code from index page

$getProductQuery = $pdo->query("SELECT * FROM `auctions` WHERE categoryId='$categoryName' ORDER BY endDate DESC LIMIT 10;");
$getProductQuery->execute();
$getProuduct = $getProductQuery->fetchAll();
echo "<h1>Category listing</h1>";

$productCount = $getProductQuery->rowCount();

// display product/ Message
if($productCount == 0){
    echo 'There are no product in this category yet :( <br/>';
    echo '<a href="addAuction.php"><button>Add Now</button></a>';
}else{

// loop
foreach ($getProuduct as $product){
    
    // storing all product info into a variable
    $productName = $product['title'];
    $productCategory = $product['categoryId'];
    $productDescription = $product['description'];
    $productPrice = $product['price'];
    $productID = $product['product_id'];

    echo '<ul class="productList">
    <li>
        <img src="product.png" alt="product name">.
        <article>
            <h2>'.$productName.'</h2>
            <h3>Category : '.$productCategory.'</h3>
            <p>'.$productDescription.'</p>

            <p class="price">Current bid: £'.$productPrice.'</p>
            <a href=bidAuction.php?productID='.$productID .' class="more auctionLink"> More &gt;&gt;</a>
        </article>
    </li>'; 
}
}
?>