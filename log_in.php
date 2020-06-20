<?php
$_SESSION['login']= true;
$showerr= false;
if($_SERVER['REQUEST_METHOD']== 'POST'){
  require_once 'items/server.php';
  $username = $_POST['uname'];
  $password= $_POST['logpass'];
  $err='';
  if(empty(trim($username))){
    $err = 'Please enter your username';
  }
  else{
       $sql = "SELECT username,pass,dt FROM users WHERE username = '$username'";
       $result= mysqli_query($conn,$sql);
       if($result){
           if(mysqli_num_rows($result)==1){
             while($row = mysqli_fetch_assoc($result)){
               if(password_verify($password,$row['pass'])){
                 session_start();
                 $_SESSION['login']= true;
                 $_SESSION['username']=$username;
                 $_SESSION['dt']=$date;
                 echo "<sript>alert(".$_SESSION["dt"].")</script>";
                 header('location:http://localhost/Technote.com/welcome.php'); 
               }
               else{
                 $showerr =true;
                 if($showerr){
                   
                   $err='Invalid password ';
                  }
               }
             }
               }else{

                 $showerr =true;
                 if($showerr){
                   
                   $err='This username is not exist ';
                  }
                }
           }
           else{
             $showerr =true;
                 if($showerr){
                   
                   $err='Something went wrong ';
                  }
           }   
  }
  
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta rel="icon" href="./img/logo.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>TechNote.com</title>
</head>

<body>
    <?php include 'items/nav.php'; ?>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){

        if($showerr==true){
                      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Failed!</strong> '.$err.' 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }
    }
        
    ?>
    <div class="container my-4 ">
        <form class="col-md-5 m-auto" action="" method="POST">
            <h2 class="text-center font-weight-bold " style="text-decoration: underline;">Sign up to our website</h2>
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" id="name" name="uname"
                    placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="logpass" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary col-lg-12">Login</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
</body>

</html>