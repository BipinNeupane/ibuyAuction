<?php
session_start();
require 'header.php';
if (isset($_SESSION['username'])) {
  // requirements
  include_once('databaseConnection.php');

  if (isset($_POST['submit1'])) {
    $name = $_POST['productName'];
    $description = $_POST['productDesc'];
    $date = $_POST['date'];
    $category = $_POST['categories'];
    $price = $_POST['price'];
    $userID = $_SESSION['userID'];


    $result = $pdo->prepare("INSERT INTO `auctions`(`title`, `endDate`, `description`, `categoryId`,`price`,`user_id`) VALUES ('$name','$date','$description','$category','$price','$userID')");
    $result->execute();
    // header('Location: https://www.youtube.com/');
    // echo "Hello world";
  }
  ?>

<body>
  <main>
    <form action='#' method='POST'>
      <label for='productName'>Prouct name</label>
      <input type='text' name='productName' required><br>
      <label for='productDesc'>Description</label>
      <textarea name='productDesc' id='desc' cols='10' rows='6' maxlength='255' required></textarea>
      <label for='date'>Date</label>
      <input type='date' name='date' required><br>
      <label for='price'>Price</label>
      <input type='text' name='price' required><br>
      <select name='categories'>
        <?php
      // looping through categories from database
        foreach ($getCategory as $categories) {
          $categoryName = $categories['name'];
          echo '<option value="' . $categoryName . '">' . $categoryName . '</option>';
         }
         ?>
      </select><br>
      <button type='submit' value='submit' name='submit1'>Submit</button>
    </form>
  </main>
</body>




  <!-- getting all the form input data and passing it through INSERT statement -->
<?php
} else {
  echo 'You are not logged in <a href="login.php"><button>Login Now!</button></a>';
}
// var_dump(isset($_POST['submit']));

// if(isset($name,$description,$date,$category)){
// 

// after submit button click


// added footer
require 'footer.php';
?>