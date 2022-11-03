<?php
include("vendor/autoload.php");
use Helpers\HTTP;
if (isset($_GET['namechange'])) {
  echo '<div class="alert alert-danger">
  Sorry Your acc is ...
</div>';
 };

 if (isset($_GET['pass>8'])) {
    echo 
    '<div class="alert alert-info">
    Password > 8
</div>';}

?>

<?php
define("DB_HOST","localhost");
define("DB_NAME", "seller");
define("DB_USER", "root");
define("DB_PASS", "");
session_start();
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (isset($_POST["sum"])) {
   $email = $_POST["email"];
   $pass = $_POST["pass"];
   $name = $_POST['name'];


   if ($result = $mysqli -> query("SELECT * FROM users WHERE  email='$email' ")) {
    $pass_space_remove = str_replace(' ', '', $pass); 
    $passw = md5($pass_space_remove);
    //echo "Returned rows are: " . $result -> num_rows;
    if ($result -> num_rows > 0) {
      HTTP::redirect("/reg.php", "namechange=1");
       
 }  
 elseif (strlen($pass_space_remove) < 8) {
    HTTP::redirect("/reg.php", "pass>8=" . time());
   
  }
 
 else {
  setcookie("email_worng", "$email" , time() + 86400 , "/sellers/");
    $sql = "INSERT INTO users (name, email, password)
    VALUES ('$name', '$email', '$passw')";
    if ($mysqli->query($sql) === TRUE) {
      echo '<div class="alert alert-success">
      Account created. Please login.
  </div>';
  header("Location: login.php?createdacc=1");
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }  
 } 
 $result -> free_result();

};
$mysqli -> close();
   
}
   

?>






<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<!--<link rel="stylesheet" href=".css"> -->
    <script src="https://kit.fontawesome.com/f0be33b496.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div  class="d-flex justify-content-center">
    <div style="width: 470px;" class=" p-5">
<form class="needs-validation mx-5" action="<?php $_PHP_SELF; ?>" method="post">
<div class="w-50"><h1 style="margin-left: 50%" >Register</h1></div>
   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Username</label>
    <input type="name"  required=""   name="name" class="form-control" id="exampleInputPassword1">
  </div>
  <div class=" form-floating mb-3">
  <input type="email"  required=""  name="email" class="form-control" id="floatingInput"  placeholder="name@example.com"
  value="
  <?php
    if (isset($_COOKIE['email_worng'])) {
      echo $_COOKIE['email_worng'];
    } 
  
  ?>
  
  "
  >
  <label for="floatingInput">Email address</label>
</div>
  <!--<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control col-6" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password"   name="pass" class="form-control" id="exampleInputPassword1">
  </div>-->
  <div class="form-floating">
  <input type="password"  name="pass" class="form-control pass8" id="floatingPassword"  required=""  placeholder="Password">
  <label for="floatingPassword">Password</label>
</div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="sum" class="btn btn-primary">Submit</button>
</form>
<br>

<a href="login.php">login</a>
</div>
</div>
<script>
        //  let pass = document.getElementsByClassName('pass8');
        //  if () {
            
        //  }
    </script>
</body>
</html>