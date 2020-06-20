<?php
session_start();
$_SESSION['login']=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
   require_once  "items/server.php"; 
   $username = $_POST['uname'];
   $password = $cpassword='';
   $username_err =$password_err=false;
   //intialize variable for displaying the error to the user
   $u_err = $p_err = "";
   if(empty(trim($username))){
          $username_err==true;
       if($username_err== true){
           $u_err= 'Username can not be blank';

       }
   }
   else{
       $sql = "SELECT username FROM users WHERE username = '$username'";
       $result= mysqli_query($conn,$sql);
       if($result){
           if(mysqli_num_rows($result)==1){
               $username_err=true;
               if($username_err== true){
               $u_err= 'This name is already taken, try diffrent name';
               }
            }
            else{
                $username = trim($_POST['uname']);
                $username_err=false;
                    //check the password
    if(empty(trim($_POST['password']))){
        $password_err = true;
        if($password_err==true){
        $p_err= 'Password cann\'t be blank ';
        }
    }
    else{
        $password_err = false;
        if(strlen($_POST['password'])<5){
            $password_err = true;
            if($password_err == true){
              $p_err= 'Password should be atleast 6 to 15 characters';
            }
        }
            elseif($_POST['password'] != $_POST['cpassword'] ){
                $password_err =true;
               if($password_err == true){
          
                $p_err= 'Password does not match';
               }
            }
            else{
                $password = trim(password_hash($_POST['password'],PASSWORD_DEFAULT));
                $password_err = false;
                 //There are no errors in validation when store data in database
   if($username_err==false or $password_err==false ){
       $sql = "INSERT INTO `users` ( `username`, `pass`,`dt`) VALUES ( '$username', '$password', current_timestamp());";
       $result = mysqli_query($conn,$sql);
       if($result){
           header('Location: http://localhost/TechNote.com/log_in.php/');
           $query = 'CREATE TABLE `website`.'.$username.' ( `slno` INT NOT NULL AUTO_INCREMENT ,  `title` VARCHAR(255) NOT NULL ,  `desc` TEXT NOT NULL ,  `DT` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`slno`)) ENGINE = InnoDB;';
           $result = mysqli_query($conn,$query);
           if(!$result){
             $username_err = true;
           if($username_err == true){
               $u_err = 'Something going wrong we will not create your accout';
           }

           }
       }
       else{
           $username_err = true;
           if($username_err == true){
               $u_err = 'Something going wrong';
           }

       }
   }
            }
    }
            }
        }
        else{
            $username_err=true;
            if($username_err== true){
            $u_err= 'Something went wrong';
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
        if($password_err == true or $username_err == true){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Failed!</strong> '.$p_err, $u_err.' 
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
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword"
                    placeholder="Confirm your password">
                <small id="emailHelp" class="form-text text-muted">You must type same password.</small>
            </div>
            <button type="submit" class="btn btn-primary col-lg-12">Submit</button>
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