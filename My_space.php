<?php
session_start();
require_once 'items/server.php';
if(isset($_POST['title']) or $_SERVER['REQUEST_METHOD']=='POST'){
  $title = $_POST['title'];
  $desc= $_POST['content'];
  $err=false;
  $title_err=$desc_err='';
   if(empty($title)){
     $err = true;
     if($err){
       $title_err = 'title should not be blank, intialize the title';
     }
   }
   elseif(empty($desc)){
     $err=true;
     if($err){
       $desc_err='description should not be blank, fill the description';
     }
   }
   else{
     $sql="INSERT INTO ".$_SESSION['username']." ( `title`, `desc`) VALUES ( '$title', '$desc');";
     $result=mysqli_query($conn,$sql);
     if($result){
       $title = $_POST['title'];
       $desc = $_POST['content'];
     }
     else{
       $err = true;
       if($err){
         $desc_err = 'Something went wrong';
       }
     }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Space of notes</title>
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

<?php 
 if(isset($_POST['title'])){
   if($err == true){
     echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> Failed!</strong> '.$desc_err, $title_err.' 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
   }
  }
 ?>
<div class="container my-5 col-7">
      <form class="form-block my-2 my-lg-0 " method="POST" action="">
      <label for="title">Title</label>
      <input class="form-control mr-sm-2" type="text" placeholder="Title of the note" aria-label="title" name="title">
      <label for="content">Notes</label>
      <textarea name="content"  id="" cols="30" rows="10" class="form-control mr-sm-2" style="resize:none;" placeholder="Type content of notes here..." area-lable="content"></textarea>
      <button class="btn btn-success my-2 mr-sm-2 col-2" type="submit"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Add Note</button>
    </form>
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

<!-- <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div> -->
