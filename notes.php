<?php
session_start();
require_once 'items/server.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://use.fontawesome.com/6336abd6da.js"></script>
  <script defer src="/your-path-to-fontawesome/js/all.js"></script>
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="font-size:20px;">
  <a class="navbar-brand" href="#"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>  TechNote.com</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/TechNote.com/My_space.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/TechNote.com/notes.php"><i class="fa fa-book" aria-hidden="true"></i>  Notes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/TechNote.com/log_out.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i>  Logout</a>
      </li>     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
        <li class="mx-3 nav-item" id="name"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $_SESSION['username']?></li>
  </div>
</nav>

<div class="container col-7 my-4">
<strong>Your Notes:</strong>
<div class="accordion" id="accordionExample">
<?php
$sql = "SELECT * FROM ".$_SESSION['username'].";";
$result=mysqli_query($conn,$sql);
if(!$result){
  echo 'error';
}
elseif(mysqli_num_rows($result)==0){
  echo 'No notes to found';
}


else{
  while ($row = mysqli_fetch_assoc($result)){
    echo '  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button"   aria-expanded="true" style="text-decoration:none; outline:none; border:none;">
          '.$row['title'].'<span  style="margin-left:70%; color:black; "><i>'.$row['DT'].'</i></span>
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
       '.$row['desc'].' 
      </div>
    </div>
  </div>';
  }
}

?>
</div>
</div>
    
</body>
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