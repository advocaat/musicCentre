<?php
include("connectdb.php");
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Townsville Music Centre - Admin</title>
</head>
<body>
    <div #header>
        <h1>Administrator</h1>
    </div>
    <div #mainbody>



        <?php
         echo "<h2>SiteMap</h2>";

         ?>

         <div #backendNav>
           <p>
           <fieldset>
           <form id="panelSelect" name="panelSelect" action="processPageData.php" method="POST">
           <select name="pageOption">
                <option value="bulletin">Bulletin Board</option>
                <option value="events">Events</option>
                <option value="bands">Bands</option>
                <option value="users">Users</option>
                <option value="images">Images</option>
            </select>
            <input type=submit name=submit id=submit value="Proceed">
            <?php

             ?>
            </p>
           </form>
            </fieldset>

         </div>
            <?php
                echo "<pre>";
                print_r($_REQUEST);
                echo "</pre>";
            ?>


    </div>



</body>
<html>