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

    <!-- include admin modules,
        we can write something to load
        them based on user access level -->

    <?php include('adminModule.php') ?>

</div>
</body>
</html>