<?php
session_start();
// requirements
require 'header.php';
require 'databaseConnection.php';
// error_reporting(0);


// starting a session for global variable 

// creating a boolean session to check if the user is logged in or not
$_SESSION['loggedin'] = false;
?>

<!-- form for login page -->
<h1>Login</h1>

<form action="#" method="POST">
    <label for="email">Email: </label> <input type="email" name="email" required /><br>
    <label for="password">Password: </label><input type="password" name="password" required><br>
    <input type="submit" value="Login" name="login" />
</form>


<?php
// the login page backend code has been cited from : https://www.youtube.com/watch?v=xDNLzcC-buE&t=258s and course resources

if (isset($_POST['login'])) {
    $result = $pdo->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $userInfo = [
        'email' => $_POST["email"],
        'password' => sha1($_POST['password'])
    ];
    $result->execute($userInfo);
    $data = $result->fetchAll();
    foreach($data as $value){
        $_SESSION['username'] = $value['name'];
        $_SESSION['userType'] = $value['role'];
        $_SESSION['userID'] = $value['id'];
    }

    // counting rows from selected data
    $countRows = $result->rowCount();
    if ($countRows > 0) {
        $_SESSION['loggedin'] = true;
        
        // header('Location : index1.php');
    }
else {
    echo "Email or Password do not match. <br/>";
}

};

if (isset($_SESSION['username'])) {
    echo 'Welcome Back, '.$_SESSION['username'];
}
else{
   echo 'Don\'t have an account? <a href="register.php"><button>Register Now!</button></a>';
}
?>