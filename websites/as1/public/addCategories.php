<?php
session_start();
require 'header.php';
?>



<?php
// code only works if user has admin access
if (isset($_SESSION['username'])) {
    if ($_SESSION['userType'] === "admin") {

?>
        <!-- html form for adding categories -->
        <form action="#" method="POST">
            <label>Add Category:</label>
            <input name="category" type="text" required></br>
            <button name='add'>Add Category</button>
        </form>

<?php
        if (isset($_POST['add'])) {
            // for first word capital
            $toAdd = ucwords($_POST['category']);
            $addCategoryquery = $pdo->prepare("INSERT INTO `category`(`name`) VALUES ('$toAdd')");
            $addCategoryquery->execute();
            echo '<p>Changes has been made </p> <a href="index.php"><button>Go back</button></a>';
        }
    } else {
        echo 'This account does not have rights to access admin panel.';
    }
} else {
    echo 'You are not logged in <a href="login.php"><button>Login Now!</button></a>';
}
require 'footer.php';
?>