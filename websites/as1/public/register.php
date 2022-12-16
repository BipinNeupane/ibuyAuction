<?php
// requirements
require 'header.php';
require 'databaseConnection.php';
?>
<!-- HTML form for registering users -->
<h1>Register</h1>

<form action="#" method="POST">
    <label for="username">Username</label> <input name="username" type="text" required /><br>
    <label for="email">Email</label> <input type="email" name="email" required/><br>
    <label for="password">Password</label><input type="password" name="password" required><br>
    <!-- for admin panel -->
    <input type="radio" name="userType" value="user"/> <label>user</label>
    <input type="radio" name="userType" value="admin"/> <label>admin</label>
    <input type="submit" value="Submit" name="submit" />
</form>



<?php
// posting user data to database when button is clicked
if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $userType = $_POST['userType'];
    // hasing the password for userproctection
    $passw = sha1($_POST['password']);
    // echo $userType;
    // storing into database
    $result = $pdo->query("INSERT INTO `users`(`name`, `email`, `password`, `role`) VALUES ('$name','$email','$passw','$userType')");
    echo 'Thank you for registering <br/> <a href="login.php"><input type="submit" value="Login Now" name="loginBtn" /> </a>';
}

require 'footer.php';
?>

