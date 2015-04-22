<?php
    include("connects.php");
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

         <?php
            if($_SESSION['accessLevel'] === '3'){
                include('adminPanel.php');
             }else{
                echo "<p>you dont have required privelleges</p>";
             }

             ?>
           </div>
       </body>
       </html>