<?php 
require_once 'items/server.php';
    session_start();
    if(!isset($_SESSION['login'])|| $_SESSION['login']!= true ){
        header('location:http://localhost/TechNote.com/log_in.php');
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to TechNote.com</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="font-size:20px;">
  <a class="navbar-brand" href="#">TechNote.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/TechNote.com/welcome.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/TechNote.com/log_out.php">Logout</a>
      </li>     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="container my-4">
  <div class="jumbotron">
  <h1 class="display-4">Welcome <strong><?php echo $_SESSION['username'];?></strong></h1>
  <p class="lead">This website is used note the some important notes. </p>
  <hr class="my-4">
  <p>Your sign up in<b> <?php
    $uname = $_SESSION['username'];
    $sql = "SELECT dt FROM users WHERE username ='$uname'";
    $result= mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        echo $row['dt'];
    }
   
  ?></b></p>
<a href="http://localhost/TechNote.com/My_space.php"><button class="btn btn-primary" >
        Notification <span class="badge badge-primary"></span>
</button></a>
</div>
</div>
</body>
    <script src="https://use.fontawesome.com/6336abd6da.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</html>