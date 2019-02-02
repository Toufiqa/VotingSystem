<?php
session_start();
session_destroy();//destroying the session

header("location: login.php");
?>