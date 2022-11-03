
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

<!--html-->
<div  class="d-flex justify-content-center">
    <div style="width: 380px;" class="p-5">
<form class="needs-validation" action="<?php $_PHP_SELF; ?>" method="post">
<div class=" form-floating mb-3">
  <input type="email" name="email" class="form-control emailwrong" id="floatingInput" 
  placeholder="name@example.com" 
  value="
  <?php
    if (isset($_COOKIE['email_worng'])) {
      echo $_COOKIE['email_worng'];
    } 
  
  ?>
  
  " required="">
  <label for="floatingInput">Email address</label>
</div>
  <div class="input form-floating ">
  <input type="password" name="pass" class="form-control passwrong" id="inputPassword6" placeholder="Password" aria-describedby="passwordHelpBlock" required="">
     <?php
       if (isset($_GET['pas_wrong'])) {
        echo '    <div id="emailHelp" class="form-text text-danger">Wrong password.</div>
        ';
       }
     
     ?>
  <label for="floatingPassword">Password</label>
</div>

  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" required="" >
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit"  name="sum" class="btn btn-primary">Submit</button>
  <br>

<a href="reg.php">Register</a>
		</form>
        </div>
        </div>
        


        <?php
include_once('log.php');
?>
 
</body>
</html>