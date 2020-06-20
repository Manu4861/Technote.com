<?php
require_once 'items/server.php';
       $sql = "SELECT username,pass FROM users WHERE username = 'Manu kumar';";
       $result= mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result)){
             echo $row['pass'];
            //  echo var_dump($row);
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>