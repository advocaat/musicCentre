<?php session_start(); ?>


<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Townsville Music Centre</title>
</head>
<body>

<h1>Townsville Music Centre</h1>

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="registerModule.php">Register</a></li>
    <li><a href="terms.php">Register Band</a></li>
    <li><a href="bandEditModule.php">Edit Band Page</a></li>
</ul>
<?php
    if(isset($_REQUEST['update'])){
        echo "<em>Table updated</em>";

    }
    if(isset($_REQUEST['error'])){
        echo "<em>Problem updating account</em>";

    }
?>
<?php include('loginModule.php'); ?>

<em>&copy; Townsville Music Centre 2015</em>
</body>
</html>