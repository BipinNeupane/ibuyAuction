<?php
session_start();
require 'header.php';

?>

<?php
if (isset($_SESSION['username'])) {
    if ($_SESSION['userType'] === "admin") {
        include_once('databaseConnection.php');
?>




        <form action="#" method="POST">
            <label><strong>Edit Category:</strong></label><br><br>
            <label for="editName">Change category name : </label>
            <input type="text" name="editName" required><br>
            <button type="submit" name="submitBtn">Submit</button>
        </form>';
<?php


        if (isset($_POST['submitBtn'])) {
            // getting category id from url
            $categoryID = $_GET['categoryID'];
            // setting input and changing first letter uppercase for naming convention
            $updateTo = ucwords($_POST['editName']);
            $editCategoryquery = $pdo->prepare("UPDATE `category` SET `name`='$updateTo' WHERE category_id = '$categoryID'");
            $editCategoryquery->execute();
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