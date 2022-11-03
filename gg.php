<?php

include_once('log.php');

if (isset($_POST["logout"])) {
  $logout = $_COOKIE['login'];
  $logout2 = $mysqli -> query("SELECT * FROM users WHERE login = '$logout' ");
  $logout3 = mysqli_fetch_array($logout2);
  $logout4 = $logout3['email'];
 
 // $imgn = $user3['photo'];
  $update = "UPDATE users SET login = '0' WHERE email = '$logout4' ";
  //print_r($imgn);
  $mysqli->query($update);
  $mysqli->close();
  setcookie("login", "0" , time() + 50000000 , "/sellers/gg.php");
  header("Location: login.php?logout=0" . time());
}

if ($_COOKIE['login'] !== "1") {
  setcookie("login", "0" , time() + 50000000 , "/sellers/gg.php");
  header("Location: login.php?gg=2" . time());
  
  exit;
}
/*if (!isset($_COOKIE['email'])) {
    
  header("Location: login.php?gg=2");
  
  exit;
}*/
$pf_name_email = $_COOKIE['login'];
$pf_name_email2 = $mysqli -> query("SELECT * FROM users WHERE login = '$pf_name_email' ");
$pf_name_email3 = mysqli_fetch_array($pf_name_email2);
$pf_name = $pf_name_email3['name'];
$pf_email =  $pf_name_email3['email'];

?>
<?php
/*if ($id === "1") {
  header("Location: login.php?gg=2");
}*/
 //echo "<pre>" . print_r($_FILES,true) . "</pre>";
//session_start();
/*if (!isset($_SESSION['email'])) {
  header("Location: login.php?gg=2");}*/
  /*if (isset($_COOKIE['email'])) {
    setcookie("email", "email.." , time() + 50000000 , "/sellers/");
  }*/
  
 

  /*elseif (isset($_GET['sellers'])) {
  
  
  }*/
 //unset($_COOKIE['email']);
  
//}

if (isset($_GET['error'])) {
  echo '<script>alert("Please! Choose Photo")</script>';

  
}

            if (isset($_FILES['file']['name'])) {
              
              
              $error = $_FILES['file']['error'];
              $tmp = $_FILES['file']['tmp_name'];
              $type = $_FILES['file']['type'];
              $photo_wh = $_FILES['file']['name'];
              list($width, $height, $type1, $attr) = getimagesize("photos/$photo_wh");
              if ($width > 2001 || $height < 600) {
                header('location: gg.php?photo_wh=error');
                exit;
              }
              if($error) {
                header('location: gg.php?error1=file');
                exit;
               }
               if($type === "image/jpeg" or $type === "image/png") {
               //set photo name in mysql

               $imgn1 = $_FILES['file']['name'];
               $user = $_COOKIE['login'];
               $user2 = $mysqli -> query("SELECT * FROM users WHERE login = '$user' ");
               $user3 = mysqli_fetch_array($user2);
               $user4 = $user3['email'];
               $imgn = $user3['photo'];
               $update = "UPDATE users SET photo = '$imgn1' WHERE email = '$user4' ";
               //print_r($imgn);
               $mysqli->query($update);
               $mysqli->close();
                

               //move photo file
                move_uploaded_file($tmp, 'photos/' . $imgn1);
                setcookie("photo",  $imgn1 , time() + 50000000 , "/sellers/");
                setcookie("username", "John Doe" );
                header('location: gg.php');
                
               }
              
               else {
                 header('location: gg.php?error=file');
               }
               
            }
         
/*
   define("DB_HOST","localhost");
   define("DB_NAME", "seller");
   define("DB_USER", "root");
   define("DB_PASS", "");
   $mysqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
   $result = $mysqli -> query("SELECT * FROM users WHERE email = '$email' AND password = '$passw' || password = '$pass'");
*/
?>

<?php
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
  
   <style>
    body{
      overflow-x: hidden;
     
    }

       .searchsm{
        display: none;
       }
       @media(max-width: 380px){
        .searchsm{
            display: block;
             }

             .searchb{
                display: none;
             }
        }

        .mma2{
            display:none;
        }
       @media(max-width: 450px){
            .search2{
               
                
            }
        
             .mma{
                display: none;
             }
             .mma2{
                display: block;
             }
             .searchb{
                
                display: none;
             }

             .s{
                margin-left: 10%;
             }

            
        }

        .mainbar{
            flex-wrap: nowrap;
        }

        @media(max-width: 450px){
            .mainbar{ 
                display: flex;
                flex-wrap: wrap;
            
            }
            
        }
       .img{
        color: black;
    height: 100px;
    width: 100px;
    background-color: brown;
    background-color: ;
    position: relative;
            top: -60px;
    border-radius: 50%;
    border: 3px solid white;
       }


       .iddd{
        /*overflow: scroll;*/
        background-color: ;
 display: flex;
 flex-direction: column;
 justify-content: center;
 align-items: center;
 width: 250px;
 box-shadow: 0 0 15px black;
 margin-left: 10px;
 margin-top: 20px;
 padding-top: ;
 height: 400px;
       }

  

       .circle{
     
       }

       /*.tits {
    cursor: pointer;
    font-size: 14px;
    width: 80%;
    margin-top: px;
    cursor: pointer;
}*/

.name{
   position: relative;
   top: -50px;
   text-align: center;
   width: 250px;
}

.imgb{
 
  width: 250px;
            height: 135px;
           
           /*border-top-left-radius: 1px;
            border-top-right-radius: 1px;*/
        
            
}

@media(max-width: 788px){
  .iddd{
        margin-left: 70px;
       }
}
@media(max-width: 648px){
  .iddd{
        margin-left: 20px;
       }
}


.circle{

}
.msw{
  width: 40px; 
}

.fbw{
  width: 200px;
}
.width{
  font-size: 13px;
}
@media(max-width: 548px){
       .iddd{
        width: 155px;
        height: 300px;
       }
       
       .width{
        font-size: 9px;
       }

       .imgb{
        width: 155px;
        height: 100px;
           
       }

       .img{
        width: 65px;
        height: 65px;
        top: -50px;
       }

       .msw{
         width: 30px; 
       }

       .fbw{
         width: 116px;
       }

       .namef{
        font-size: 15px;
       }
       .iddd{
        margin-left: 50px;
       }
      }

      @media(max-width: 418px){
  .iddd{
        margin-left: 15px;
       }
}

.mglb{
  width: 50%;
}
.girl{
  width: 50%;
}
@media(max-width: 501px){
        .mmafbct{
          margin-left: 50px;
        }

        .mglb{
          width: auto;
        }

        .girl{
          width: 100%;
        }
}

.name{
  color: white;
}

.homem{
  display: flex;
}
@media(max-width: 500px){
   .homem{
    display: flex;
    flex-wrap: wrap;
   }

   .homefb{
    display: flex;
    flex-wrap: wrap;
    justify-content:center;
    align-items:center;
   }
}

.ml:hover{
  box-shadow: 1px 1px 15px black;
  background-color: dark;
}

.pg:hover{
  box-shadow: 1px 1px 15px black;
  background-color: dark;
}

.home1:hover{
  box-shadow: 1px 1px 15px black;
  background-color: dark;
}

.pg1:hover{
  box-shadow: 1px 1px 15px black;
  background-color: dark;
}

.ml1:hover{
  box-shadow: 1px 1px 15px black;
  background-color: dark;
}

.rcidsborder{
  border-bottom: 1px solid black;
  height: 30px;
  display: flex;
  align-items: center;
}

.tits2{
  display: flex;
  align-items: center;
  color: #ffb3b3;
}

.img1{

}

/*.gg{
            background-color: black;
            height: 100%;
            width: 100%;
            position: fixed;
            right: -100%;
           display: none;
        }

        .ii{
          display: block;
            right: 0px;
            position: ;
            transition: all 0.8s ease-in-out;
        }

        .ii1{
          right: -100%;
            position: relative;
            transition: all 3s ease-in-out;
        }*/
       .gg{
        top: -100%;
            height: 10%;
            width: 50%;
            background: rgb(220, 53, 69, 0.4);
            position: absolute;
           /* right: -100%;*/
           
          left: 50%;
           margin-top: 10px
        }

        .ok100{
          /*top: -100%;*/
            height: 5%;
            width: 50%;
            background: rgb(220, 53, 69, 0.4);
            position: fixed;
            top: -100%;
           
          left: 50%;
           margin-top: 10px
        }

        .ii{
          
          background: rgb(220, 53, 69, 0.4);
          top: 0px;
            transition: all 0.8s ease-in-out;
        }

        .ii1{
          height: 10%;
            width: 50%;
            top: -100%;
            position: relative;
            position: fixed;
            transition: all 1s ease-in-out;
        }

        /* .gg{
            background-color: black;
            height: 100px;
            width: 100%;
            position: absolute;
            right: -100%;
            top: 0px;
        }

        .ii{
          top: 0px;
            right: 0px;
            position: relative;
            transition: all 0.8s ease-in-out;
        }

        .ii1{
           
            right: -100%;
            position: relative;
           
            transition: all 1s ease-in-out;
        }*/

        .ok11{
         
          opacity: 0;
          height: 25%;
          width: 50%;
          background: rgb(92, 99, 106, 1);
        }

        .ok12{
          opacity: 1;
          transition: all 1s ease-in-out;
        }

        .b{
          margin-left: 80%;
       
        }

        /*222222*/
        body {
  background-color: #343a40;
  color: #fff;
  height: 100vh;
}

.container {
  display: flex;
  height: 100%;
  justify-content: center;
  align-items: center;
}

.parent {
  width: 100%;
  position: fixed;
  display: flex;
  justify-content: center;
  background: rgb(0, 0, 0, 0.5);
  box-shadow: 1px 1px 15px black;
  transition: bottom 0.4s ease-in-out;
}

.toastAlertContainer {
  display: flex;
  align-items: center;
  padding: 10px;
}

.toastAlertText {
  margin-right: 10px;
}
.offcanvas-header{
  box-shadow: 1px 1px 10px black;
  background-color: dark;
}
.pfimg{
  /*box-shadow: 1px 1px 5px white;
  background-color: dark;*/
  color: black;
    height: 77px;
    width: 77px;
    background-color: #595959;
    background-color: ;
    position: relative;
            top: -40%;
    border-radius: 50%;
    border: 3px double white;
       }

       .pfimgbg{
        position: relative;
            top: -40px;
            width: 100%;
       }

       .file{
       
        background: none;
         position: absolute;
        top: 76px;
        left: 52%;
        width: 30px;
        height: 30px;
        line-height: 12px;
        text-align: center;
        border-radius: 50%;
        overflow: hidden;
       }

       .file input[type = "file"]{
        position: absolute;
        transform: scale(3);
        opacity: 0;
       }
       input[type=file]::-webkit-file-upload-botton{
        cursor: pointer;
       }
    
       /*#menu456{
        height: 80%;  
       }
      
        @media(max-width: 800px){
          .menu11{
           background-color: light;
        height: 10%;  
       }
       }; */
      

       .offcanvas{ 
        transition-duration: .5s;

       
      }
      .logout{
      box-shadow:3px 3px 10px 3px black;
      }
      
      .logout{
        box-shadow:1px 1px 10px 1px #0E61E1;
      }
      
      .menuw{
      background-image: url('https://t4.ftcdn.net/jpg/04/21/44/29/360_F_421442912_e9dARIDF7CnBKKcB1Ooy0aNcEOJ13eVY.jpg');
       /*background-color: transparent;*/
       
        
      }

      .btn-close{
        position: absolute;
        top: 5px;
        left: 90%;
        width:20px;
        height: 20px;
      }

      .webname:hover{
        transform: scale(1.1) rotate(5deg);
        transition: transform 0.2s ease-in-out;
      }
    </style>
</head>

<body class="bg-dark body">



<nav style="height: 55px; box-shadow: 1px 1px 15px black;" class="text-primary bg-dark mx-1 navbar mainbar fixed-top">


<div style="" class="container-fluid">
   
  



<button id="menu" class="text-white-50 navbar-toggler add#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
    <i class="fa-solid fa-bars"></i>
   
    </button>
      

    <div class=" d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
 <!--<button class="d-none border border-1 border-light-50 text-white-50 nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa-solid fa-house-chimney me-2 text-light"></i><span class="active" ><b>Home</b></span></button>-->
  <div class=" dropdown">
  <button style="height:" class="text-white-50 btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="text-white fa-brands fa-teamspeak me-2"></i><b><i>Sellers</i></b>
  </button>
  <ul style=" box-shadow: 1px 1px 15px black; background: rgb(0, 0, 0, 0.2)"  class=" dropdown-menu">
    <li><button class="text-black dropdown-item" type="button">
    <button style="height: 30px;" class="d-flex  home1 align-items-center text-start  text-white nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa-solid fa-house-chimney me-2 text-light"></i><span class="" ><b>Home</b></span></button>
   <!--<button class="border border-1 border-light-50 text-white-50 nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa-solid fa-house-chimney me-2 text-light"></i><span class="" ><b>Home</b></span></button>-->
   <button  class="text-white pg1 nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="text-light fa-solid fa-person-rifle me-2"></i><span><b><i>PUBG Sellers</i></b></span></button>
    <button class="text-white ml1 nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="text-light fa-solid fa-gamepad me-2"></i><span><b><i>ML Sellers</i></b></span></button>
    <div class="d-flex align-items-start">
  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

 </div>
</div>
</div>
    </button>
    </div>
</div>
    <!--</div>
</div>-->
<button class="search2 d-block d-sm-none text-end p-1 mb-1  btn btn-dark shadow" type="submit" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop"><i class="bi bi-search"></i></button>
 

  <!--  <h5 class="card-title">h</h5>-->
  <div style="height: 30px; " class="bg-dark offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
  <!--<p class="d-sm-none" >-->
  <nav style="box-shadow: 1px 1px 15px black;" class=" d-sm-none  navbar bg-dark " id="item">
  <div class=" container-fluid">
    <form class="w-100 d-flex" role="search">
   
    
    
    <button style="height: 32px;" type="button" class="bg-dark" data-bs-dismiss="offcanvas" aria-label="Close">
    <i class="bg-dark fa-solid text-white fa-arrow-left-long"></i>
  </button>
  
  <!--</div>-->
   <!--<div class="offcanvas-body">-->
  
  <input id="" style=" border-radius: 1px; height: 32px; width: 80%;"  class="ms-3 pe-0 form-control text-white me-1 searchh bg-transparent" type="number" placeholder="Rc ids" aria-label="Search">
   <!--</div>-->
  
   <div class="ok100">
    <div class="rcidsborder Hh" id="1"><i class="bi ms-2 text-danger bi-exclamation-triangle-fill"></i><div class="tits2 ms-2">106433389(2228)</div></div>
    </div>

       <!-- <button style="height: 32px;"  class="ms-5 text-white searchb  btn btn-outline-dark"><span><i class="bi bi-search"></i></span></button>-->
      
    </form>
  </div>
</nav>
     <!--</p>-->
<div style="box-shadow: 1px 1px 15px black; background: rgb(0, 0, 0, 0.2)  " class="d-block d-sm-none rounded mt-2 mx-5 rcid">

</div></div>
 <!--
<div  class=" d-block d-sm-none searchsm btn-group dropstart">
  <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  <span  style="height: 25px;"><i class="bi bi-search"></i></span>
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">
      <input style="height: 25px;" class="mt-2 pe-0 form-control me-1 d-none d-sm-block" type="search" placeholder="Rc ids" aria-label="Search">
      
      
    </li>
  </ul>
</div>-->

<!-- Example single danger button -->

    <nav style="height:50px;" class="navbar bg-dark">
  <div class="mb-5 container-fluid">
    <form style="height: 10px;" class=" rounded-pill d-flex" role="search">
      <div class="d-flex flex-column">
      <input style="background-color: #121212; height: 34px; border-radius: 25px 0 0 25px;" class="border-0 searchh2 pe-0 form-control me-1 d-none d-sm-block text-white ps-3" type="number" placeholder="Rc ids" aria-label="Search">
      <div style=" width: 70%; box-shadow: 1px 1px 15px black; background: rgb(0, 0, 0, 0.2) padding-left: 25%;" class="d-none d-sm-block rcid2 rounded mt-2 mx-5">
     
</div>
</div>
     <!-- <button  style="height: 32px;"  class="d-none d-sm-block text-white searchb  btn btn-outline-dark" type="submit"><span><i class="bi bi-search"></i></span></button>-->
     <span  style="background-color: #313131; border-radius: 0px 25px 25px 0px; height: 34px; width: 40px;"  class="d-none d-sm-block text-white searchb  d-flex justify-content-center  align-items-center"><i class=" ms-2 bi bi-search"></i></span>
    </form>
  </div>
</nav>
<h1  class="h4 mma webname text-center text-blue" style="">
  
  <i class="ms-2  fa-brands fa-angellist me-1"></i>
  <span class=" text-blue">

     <b><a href="gg.php?Home=<?= time();?>" style="text-decoration: none;" class="">

     MMA
    
     </a>
    </b>
    
    </span>
    
   </h1>
   
    <!-- menu 2 -->
    <div style="
    height: 400px; 
    width: 280px;
    "  class="menuw ms-2 bg-dark offcanvas offcanvas-top menu11 rounded mt-3 me-5"  data-bs-backdrop="static" tabindex="-1" id="offcanvasNavbar" id="menu456" aria-labelledby="offcanvasNavbarLabel">

      
      <div class="menubkg offcanvas-body">
      
      <button style="color: blue; box-shadow:3px 3px 10px 3px black;" type="button" class="bg-primary btn-close rounded" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      
   
    
      <h1 class="h4 text-center text-blue" style="">
        <div style="left:0px; height:30px;" class="d-flex flex-column  circle">
        <div style=" position: relative; height: 50px;" class="user-select-none ">

        <img class="mt-5 pfimg"
         src="photos/<?php 
          $user = $_COOKIE['login'];
          $user2 = $mysqli -> query("SELECT * FROM users WHERE login = '$user' ");
          $user3 = mysqli_fetch_array($user2);
          $imgn = $user3['photo'];
         if ($imgn === NULL) {
          echo '1665513137453.png';
         } else {
          echo $imgn;
         }
          ?>">
             <form id="form" action="<?php $_PHP_SELF?>" method="post"  enctype="multipart/form-data">
      <div class="file">
        <input type="file" id="img" name="file" >
        <!--<i class="fa fa-camera"> </i>-->
        <svg  xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg>
      </div>
      <!--<input type="submit" name="sum" value="sum">-->
    </form>
          </div>
        <div style=" margin-top: 23%;" class="d-flex flex-column">
        <h6 style="font-size: 80%;" class=" ms-2">
        <?= $pf_name; ?>
      </h6>
      <p style="font-size: 65%;" class="text-white-50 fw-lighter">
      <?=  $pf_email; ?>
      </p>
        </div>
       <div style=
       "border: 15px ; border-radius: 15px 50px 30px;" class="pfunder ">
        <div class="text-start  settings w-100 user-select-none">
            <div class="w-100 mb-2">..............................................</div>
            <div class="w-100 mb-2">..............................................</div>
            <div class="w-100 mb-2">..............................................</div>
            <div class="w-100 mb-2">..............................................</div>

        </div>
        </div>
       
       
        <!--<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
<!--in menu home/sellers-->
           <!-- <div class="d-flex text-start align-items-start">
  <div class="nav flex-column text-start nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button style="height: 30px;" class="d-flex  home1 align-items-center text-start  text-white nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa-solid fa-house-chimney me-2 text-light"></i><span class="" ><b>Home</b></span></button>
    
   
    <button style="height: 30px;" class="d-flex ml align-items-center mt-1 text-start position-relative text-white nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="text-light fa-solid fa-gamepad me-2"></i><span>ML Sellers<span  style="box-shadow: 0 0 15px black;" class="shawdow-lg position-absolute top-2 start-99 translate-middle badge rounded-pill bg-dark">
    20
    <span class="visually-hidden">unread messages</span>
  </span><!--</span></button>
    <button style="height: 30px;" class="d-flex pg align-items-center mt-1 text-start position-relative text-white nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="text-light fa-solid fa-person-rifle me-2"></i><span>PUBG Sellers<span style="box-shadow: 0 0 15px black;" class="shawdow-lg position-absolute top-10 start-100 translate-middle badge rounded-pill bg-dark">
    20
    <span class="visually-hidden">unread messages</span>
  </span>
</span></button>
   

</div>
</div>


 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link add#" href="#">
      
           

            </a>
          </li>
          
        </ul>-->
       
        <!-- 
        <div class="card text-white-50 bg-dark mb-3" style="margin-top: 100%;  max-width: 18rem;">
        <div class="d-flex flex-row   card-header"><b class="text-white">Product by </b><a style="color: inherit;" class="ms-2 mt-2"href="https://www.facebook.com/profile.php?id=100046213381464">MyintMyatAung</a></div>
  <div class="card-body">
  <h1 style=" flexwrap: nowrap:" class="card-title">bar nyar</h1>
    <div class="mt-3" style="box-shadow: 1px 1px 15px black; height: 5px;"></div> -->
    <!--<i class="card-text ">လိမ်ခံရတာတွေများလာ <br> တာတွေ့လို့ပါ အမှန်ကန်ရောင်း/ဝယ်တဲ့Sellersတွေလည်းထည့် <br> ပေးထားပါတယ်ဗျ 
      <br>RC Idစစ်လို့ရ‌ေအာင်လည်းလုပ်‌ေပးထားပါတယ် အားလုံးအဆင်ပြေကြပါစေဗျ

    </i>-->
    
  </div>
 
      </div>
      <div style=" height: 50px; background-color: none;" class="text-center log">

   
<form style="margin-top: %;" class="" action="<?php $_PHP_SELF; ?>" method="post">
<h5 name="logout" >
<input style="border-color: #0E69F0; border-radius: 15px 50px 30px; color: #0E69F0; width: 96%;" class="text-center mx-1 btn logout" type="submit" name="logout" value="Log out">
</h5>
</form>
    
</div>
    </div>
    
    <script>/*
   if (window.location.href === 'http://localhost/sellers/gg.php?pfchange=1') {
        //document.getElementById("menu").click() 
        

//Something like this should work:

/*var spans = document.getElementsByTagName("div");
for (var i = 0; i < spans.length; i++) {
    if (spans[i].className == 'offcanvas-backdrop') {
      console.log("HHHH");
        spans[i].style.backgroundColor = '#000';
    }
}*/
        
       // let co = document.getElementsByClassName("offcanvas-backdrop");
        //console.log(co)
        /*co.innerHTML.addEventListener("click", () => {
          console.log("ok p")
        })*/
        //co.innerHTML = `<h1 class='out'>hh</h1>`;
        //let co = document.getElementsByClassName("");
        //console.log(co)
        /*co.innerHTML.addEventListener("click", () => {
          console.log("ok p")
        })*/
        //console.log(co.innerHTML);
      /* if (hh222.click()) {
         console.log("hello");
       }
       else{
        console.log("lllll")
       }
      */
       //}
</script>
  </div>
  
</nav>

   </div>

<div style="height: 20px;" class="bg-dark mt-5"></div>
<div class="mt-5 text-blue">
<h1 class="mt-5 h4 mma2 text-start text-white-50" style="">

 <i class= "ms-2 fa-brands fa-angellist me-2"></i> 
  <span class="text-blue">
       MMA
  </span>
  
   </h1>
    </div>
<div style=" opacity: ;" class="mx-1 mt-5 bg-dark text-white tab-content" id="v-pills-tabContent">

<div  class="homem bg-dark text-white tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">

<!--style="overflow-y: scroll"-->
<div class="homefb d-flex justify-content-center  align-items-center bg-dark mx-100 w-100 my-5 mt-1 mglb" style="height: auto;">
<div class="h-50 girl">
<div id="carouselExampleControls" class="h-50 carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://scontent-sin6-3.xx.fbcdn.net/v/t1.15752-9/300593759_1410976839379697_4841778091490809284_n.png?_nc_cat=110&ccb=1-7&_nc_sid=ae9488&_nc_ohc=U3jFgK7XqAkAX_DUK1m&_nc_ht=scontent-sin6-3.xx&oh=03_AVIqYZcXO8dVRqZWnME6T111lq63qhxm_8cmqNTrrZNx6Q&oe=632D38C3" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://scontent-sin6-3.xx.fbcdn.net/v/t1.15752-9/300593759_1410976839379697_4841778091490809284_n.png?_nc_cat=110&ccb=1-7&_nc_sid=ae9488&_nc_ohc=U3jFgK7XqAkAX_DUK1m&_nc_ht=scontent-sin6-3.xx&oh=03_AVIqYZcXO8dVRqZWnME6T111lq63qhxm_8cmqNTrrZNx6Q&oe=632D38C3" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://scontent-sin6-3.xx.fbcdn.net/v/t1.15752-9/300593759_1410976839379697_4841778091490809284_n.png?_nc_cat=110&ccb=1-7&_nc_sid=ae9488&_nc_ohc=U3jFgK7XqAkAX_DUK1m&_nc_ht=scontent-sin6-3.xx&oh=03_AVIqYZcXO8dVRqZWnME6T111lq63qhxm_8cmqNTrrZNx6Q&oe=632D38C3" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>

<div class=" d-flex justify-content-center  align-items-center my-5 w-50  bg-dark mmafbct" style="height: auto;">
<div id="mmafb" style="display: flex; " class="me-5 iddd"><div class="circle"><img class="imgb" src="https://scontent-sin6-3.xx.fbcdn.net/v/t39.30808-6/300105975_646093503607757_568320000053353206_n.jpg?stp=dst-jpg_p960x960&_nc_cat=110&ccb=1-7&_nc_sid=e3f864&_nc_ohc=I8akFVGujNcAX89wrIE&_nc_ht=scontent-sin6-3.xx&oh=00_AT9-SPuAw_cqQ9kIa-a-6Y19KCmOhCsy7EbDydvFgQIj_Q&oe=630C1904"></div><img class="img" src="photos/profile.png"><div class="tits name"><h5 class="namef">Myint Myat Aung</h5><div> <div style="" class="width">
       W
      <br> T
      <br> F 
      <br> BRO<br><br></div><div> <div class=" mt-2  messenger">
               <a class="" href="https://www.facebook.com/htetyan.aung.7334"> <button type="button" class="btn fbw btn-primary" style=" --bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
  </svg>
   Facebook
  </button> </a>
  <a class="" href="https://m.facebook.com/messages/thread/100039265247185/?entrypoint=profile_message_button&amp;refid=17&amp;__xts__%5B0%5D=48.%7B%22event%22%3A%22message%22%2C%22intent_status%22%3Anull%2C%22intent_type%22%3Anull%2C%22profile_id%22%3A100039265247185%2C%22ref%22%3A3%7D">
  <button style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn msw btn-primary">
  <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-messenger" viewBox="0 0 16 16">
  <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"></path>
  </svg></button></a>
     </div></div></div></div></div>
</div>


</div>
</div>
<div class=" tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">
<div  style=" display: flex; flex-wrap: wrap;   justify-content:center;
    align-items:center; " class="sellers d-flex">
  
</div></div>
<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
  <div  style=" display: flex; flex-wrap: wrap;   justify-content:center;
    align-items:center;" class="mlsellers d-flex">
  
  </div></div>

</div>



<!--
<div style="margin-top: 100%; box-shadow: 1px 1px 15px black; flexwrap: nowrap:"  class="mx-3 mb-3 bg-dark  ms-1 row">
<div class="card text-bg-dark ms-1 mb-3" style=" max-width: 18rem;">
  <div class="card-header">  <div style=" display: flex; flex-wrap: nowrap;"  class="card-header text-blue">Product by <a style="color: inherit; padding-left: 5px;" href="https://www.facebook.com/profile.php?id=100046213381464">MyintMyatAung</a></div></div>
  <div style="" class="card-body ">

    <i class="card-text ">လိမ်ခံရတာတွေများလာတာတွေ့လို့ပါ အမှန်ကန်ရောင်း/ဝယ်တဲ့Sellersတွေလည်းထည့်ပေးထားပါတယ်ဗျ  | 
       <br> RC Idစစ်လို့ရ‌ေအာင်လည်းလုပ်‌ေပးထားပါတယ် အားလုံးအဆင်ပြေကြပါစေဗျ

    </i>
  </div>
</div>-->


</div>
<div class="card text-white-50 bg-dark mb-3 " style="margin-top: 5px;  max-width: 18rem;">
        <div class="d-flex flex-row   card-header"><b class="text-white">Product by </b><a style="color: inherit;" class="ms-2 mt-2"href="https://www.facebook.com/profile.php?id=100046213381464">MyintMyatAung</a></div>
  <div class="card-body">
  <!--  <h1 style=" flexwrap: nowrap:" class="card-title">bar nyar</h1>
    <div class="mt-3" style="box-shadow: 1px 1px 15px black; height: 5px;"></div> -->
    <!-- <i class="card-text ">လိမ်ခံရတာတွေများလာ <br> တာတွေ့လို့ပါ အမှန်ကန်ရောင်း/ဝယ်တဲ့Sellersတွေလည်းထည့် <br> ပေးထားပါတယ်ဗျ 
      <br>RC Idစစ်လို့ရ‌ေအာင်လည်းလုပ်‌ေပးထားပါတယ် အားလုံးအဆင်ပြေကြပါစေဗျ

    </i> -->
    <form action="<?php $_PHP_SELF; ?>" method="post">  
    <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <textarea name="commet" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
      
  </form>
  <button class="btn btn-primary send">Submit</button>

  </div>
      </div>
    
    </div>
   
    <div class="parent"></div>
    <div class="gg">
    <div class="rcidsborder Hh" id="1"><i class="bi ms-2 text-danger bi-exclamation-triangle-fill"></i><div class="tits2 ms-2">106433389(2228)</div></div>
    </div>
  
    <!--<div class="gg d-flex justify-content-center  align-items-center">
      <div class="ok11">
      <button type="button" class="btn btn-warning  b">Warning</button>
      </div>-->
     <!-- <div class="ok11 card">
  <img src="..." class="card-img-top" alt="...">

  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn b btn-primary">Go somewhere</a>
  </div>
</div>

    </div>
    
         
    </div>-->
    <script>
         /* if (window.location.href === 'http://localhost/sellers/gg.php?pfchange=1') {
        //document.cookie = "username=John Doe"; 
        document.getElementsByClassName("add#")[0].click();
        
        //console.log(gudj)
        
      
      //document.getElementsByClassName("offcanvas-backdrop")[0].click();
    /* if (hh222.click()) {
       console.log("hello");
     }
     else{
      console.log("lllll")
     }
   } */
    </script>
    <?php
         if (!isset($_COOKIE['username'])){
      echo "";
;          }
         elseif ($_COOKIE['username'] === 'John Doe') {
            echo '<script>
           
            document.getElementsByClassName("add#")[0].click();
            </script>';
          } 
    ?>
    <script>
       /*if (window.location.href = 'http://localhost/sellers/gg.php?menupf=1') {
        document.cookie = "username=John Doe"; 
     }*/


    

     let menuback = document.getElementsByClassName(" btn-close")[0];
   menuback.addEventListener("click", () => {
    document.cookie = "username=; expires=Thu, 18 Dec 1000 12:00:00 UTC";
    //window.location.href = 'http://localhost/sellers/gg.php'
          })
        let menuclick = document.getElementById("menu");
          menuclick.addEventListener("click", () => {
             document.cookie = "username=John Doe"; 
            //window.location.href = 'http://localhost/sellers/gg.php?menupf=1'
          })
        
         
        document.getElementById("img").onchange = function(){
          document.getElementById("form").submit();
          
        }
        
  
    </script>
    <script>
           let send = document.getElementsByClassName("send")[0];
           send.addEventListener("click", () => {
             console.log("Hello")
           })
    </script>
    <script src="sellers10.js"></script>
    <!--navbar fixed-bottom
    $commet = $_POST["commet"];
  echo $commet;
  $to = "mma@localhost";
$subject = "PHP Mail";
$message = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
</head>
<body>
    <h1>$commet</h1>
</body>
</html>

";
$header = "From: MMM@gmail.com\r\n";
$header .= "Content-Type:text/html; charset=utf-8";
$mailsend = mail($to,$subject,$message,$header);
echo $mailsend ? " Massage Sending " : "Not Send";
  -->
</body>
</html>