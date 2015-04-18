<?php
// connect database
include("connectdb.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Townsville Music Centre - Admin</title>
    </head>
<body>
    <div>
        <h1>Administrator</h1>
        
        <!-- include admin modules, 
            we can write something to load
            them based on user access level -->
        
        <?php include('adminPanel.php'); ?>
 
    </div>
</body>
</html>