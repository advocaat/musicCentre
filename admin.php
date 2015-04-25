<?php include("connectdb.php"); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Townsville Music Centre - Admin</title>
</head>
<body>
<div>
    <h1>Administrator</h1>

     <!-- if($_SESSION['user_status']) - we'll add this later  -->

    <?php include('adminModule.php') ?>

</div>
</body>
</html>