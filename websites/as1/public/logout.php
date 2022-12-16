<?php
session_start();
// requirements
require 'header.php';
include_once('databaseConnection.php');
?>

<!-- form for logout -->
<form action="" method="POST">
    <label>Click here to </label>
    <button type="submit" name="logoutBtn" value="Logout">Logout</button>
</form>


<?php
// unsetting session value
if (isset($_POST['logoutBtn'])) {
    
    unset($_SESSION['username']);
    unset($_SESSION['userType']);
    unset($_SESSION['userID']);
    // unset($_SESSION['loggedIn']);
    $_SESSION['loggedin'] = false;
    echo 'You have successfully logged out';
}

// echo $_SESSION['username']; 
require 'footer.php';

?>