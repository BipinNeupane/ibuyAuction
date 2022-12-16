<?php
session_start();
require 'header.php';
// require 'databaseConnection.php';

?>


<?php
if (isset($_SESSION['username'])) {
    if ($_SESSION['userType'] === "admin") {
        include_once('databaseConnection.php');
?>
        <!-- for user conformation -->
        <form action="#" method="post">
            <strong>Are you sure do you want to delete?</strong><br>
            <button type="submit" name="yes" value="Yes">Yes</button> <span>||</span> <a href="showCategories.php"><button>No</button></a>
        </form>
<?php

        // using delete query
        if (isset($_POST['yes'])) {
            // getting category id from url
            $categoryID = $_GET['categoryID'];
            $deleteCategoryquery = $pdo->prepare("DELETE FROM `category` WHERE category_id='$categoryID'");
            $deleteCategoryquery->execute();
            // echo $updateTo;
            echo '<p>Changes has been made </p> <a href="index.php"><button>Go back</button></a>';
        }
    } else {
        echo 'This account does not have rights to access admin panel.';
    }
} else {
    echo 'You are not logged in <a href="login.php"><button>Login Now!</button></a>';
}
?>