<?php
session_start();
// requirements
require 'header.php';
// include_once('databaseConnection.php');

if (isset($_SESSION['username'])) {
    if ($_SESSION['userType'] === "admin") {
        include_once('databaseConnection.php');
        // var_dump($getCategory);
        // to show list of categories
        foreach ($getCategory as $categories) {
            $categoryName = $categories['name'];
            // getting the category id
            $categoryID = $categories['category_id'];
            // using the categroyID as parameter to navigate the user 
            $strHTML = '<li>' . $categoryName . '</li><a href=editCategories.php?categoryID=' . $categoryID . '>edit    /</a><a href=deleteCategory.php?categoryID=' . $categoryID . '>delete</a>';
            echo $strHTML;
        }
    } else {
        echo 'This account does not have rights to access admin panel.';
    }
} else {
    echo 'You are not logged in <a href="login.php"><button>Login Now!</button></a>';
}
require 'footer.php';
