<?php
// connect database
   include("connectdb.php");
         ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Townsville Music Centre - Registration</title>
    </head>
<body>
    <div>
    <h3>Sign Up!</h3>

        <fieldset>
            <form method="POST" action="processRego.php">
               <p><label for="userName">Name:</label>
                <input type="text" name="userName" id="userName"></p>
                <p><label for="userPassword">Password:</label>
                <input type="text" name="userPassword" id="userPassword"></p>
                <p><label for="confirmPassword">Confirm Password:</label>
                <input type="text" name="confirmPassword" id="confirmPassword"></p>
                <input type="submit" name="submit" id="submit" value="Sign Up">
            </form>

        </fieldset>

        <?php


        ?>
    </div>
</body>
</html>

