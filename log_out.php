<?php
session_start();
session_unset();
session_destroy();
header("location:http://localhost/TechNote.com/log_in.php");
?>