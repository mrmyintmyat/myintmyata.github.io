<?php
include("vendor/autoload.php");
use Helpers\HTTP;
?>

<?php

session_start();

if (isset($_GET['createdacc'])) {
   echo '<div class="alert alert-success">
   Account created. Please login.
</div>';
}
if (isset($_GET['empas_wrong'])) {
   echo '  <script>
   document.getElementsByClassName("emailwrong")[0].style.borderColor = "#DC3545";
   document.getElementsByClassName("passwrong")[0].style.borderColor = "#DC3545";
 
</script>';
echo '<div class="alert alert-danger">
Your account is not found(Please create account)
</div>';
   //  echo '<div class="alert alert-danger">
   //      email or pass w
   //  </div>';
   };
   if (isset($_GET['em'])) {
      echo '  <script>
      document.getElementsByClassName("emailwrong")[0].style.borderColor = "#DC3545";
      document.getElementsByClassName("passwrong")[0].style.borderColor = "#DC3545";
   </script>';
          echo '<div class="alert alert-danger">
             Your account is not found(Please create account)
          </div>';
   }
   if (isset($_GET['pas_wrong'])) {
      
      echo '  <script>
      document.getElementsByClassName("passwrong")[0].style.borderColor = "#DC3545";
     
   </script>';
//     '<div class="alert alert-danger">
//     pass w
// </div>';
   }
define("DB_HOST","localhost");
define("DB_NAME", "seller");
define("DB_USER", "root");
define("DB_PASS", "");
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (isset($_POST["sum"])) {
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $pass_space_remove = str_replace(' ', '', $pass); 
    $passw = md5($pass_space_remove);
 
$result = $mysqli -> query("SELECT * FROM users WHERE email = '$email' AND password = '$passw' || password = '$pass'");
$emailsql = $mysqli -> query("SELECT * FROM users WHERE email = '$email' ");
$passsql = $mysqli -> query("SELECT * FROM users WHERE password = '$pass' || password = '$passw' ");
$row = mysqli_fetch_array($result);
$row1 = mysqli_fetch_array($emailsql);
$row2 = mysqli_fetch_array($passsql);
$loginemail_1 = $row1['email'];
$id = $row1['id'];
$photo = $row1['photo'];
//print_r($id);
if ($email != $row1['email'] & $passw != $row1['password']) {
    // echo  $n['email'] .  $n['password'];
    setcookie("email_worng", "$email" , time() + 86400 , "/sellers/");
     HTTP::redirect("/login.php", "empas_wrong=1");
  
 }


 elseif ($email != $row1['email']) {
   setcookie("email_worng", "$email" , time() + 86400 , "/sellers/");
  
    HTTP::redirect("/login.php", "em=1");
    
 }

 elseif ($passw != $row1['password']) {
   setcookie("email_worng", "$email" , time() + 86400 , "/sellers/");
     HTTP::redirect("/login.php", "pas_wrong=1"); 
     //let pw = document.getElementsByClassName("passwrong1")[0].classList.add("was-validated");
    
 }
 
 else {
   setcookie("email_worng", "$email" , time() + -1 , "/sellers/");
    $login2 = $mysqli -> query("SELECT * FROM users WHERE email = '$loginemail_1' ");
    $login3 = mysqli_fetch_array($login2);
    $login4 = $login3['email'];
   // $imgn = $user3['photo'];
    $update = "UPDATE users SET login = '1' WHERE email = '$login4' ";
    //print_r($imgn);
    $mysqli->query($update);
    $mysqli->close();
    setcookie("login", "1" , time() + 50000000 , "/sellers/gg.php");
    /*setcookie("email", "email.." , time() + 50000000 , "/sellers/gg.php");
    setcookie("name",  $row1['name'] , time() + 50000000 , "/sellers/gg.php");
    setcookie("email", $row1['email'], time() + 50000000 , "/sellers/gg.php");
    */
    //setcookie("pass", $row1['password'] , time() + 50000000 , "/sellers/");
    setcookie("photo",  $row1['photo'] , time() + 50000000 , "/sellers/gg.php");
    $_SESSION['name'] = $row1['name'];
     $_SESSION['email'] = $row1['email'];
    //$_SESSION['pass'] = $row1['password'];
    header("Location: gg.php?login=" . time());
    //HTTP::redirect("/gg.php", "sellers=1");
 //header("Location: gg.php");
 }
 
};



?>