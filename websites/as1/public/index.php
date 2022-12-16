<?php

session_start();
require 'header.php';
require 'databaseConnection.php';

$getProductQuery = $pdo->query('SELECT * FROM `auctions` ORDER BY endDate ASC LIMIT 10;');
$getProductQuery->execute();
$getProuduct = $getProductQuery->fetchAll();
echo "<h1>Latest Listing</h1>";

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

//     echo '<li>'.'<img src="product.png" alt="product name">'
//     .'<article>'.
//     '<h2>'.$values['productName'].'</h2>'.
//     '<h3>'.$values['productCategory'].'</h3>'.
//     '<p>'.$values['description'].'</p>'.

//      '<a href="auctionPages.php"class="more auctionLink">More &gt;&gt;</a>'.
//     '</article>'
    
    
//     .'</li>';
}

// echo "</body>";

require 'footer.php';
?>
