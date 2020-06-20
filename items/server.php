<?php $name = 'localhost';
$pass = '';
$server = 'root';
$db = 'website';
$conn = mysqli_connect('localhost','root','','website');
if (!$conn) {
    echo 'connection failed';
}
?>