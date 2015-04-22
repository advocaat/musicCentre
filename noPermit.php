
<?php


    if(!isset($_SESSION['user_name'])){
        echo "<h3>No dice</h3>";
        echo "<p>You must be logged as a <a href='registerModule.php'><em>registered user</em></a> to do that";

        echo "<p><button name='send_back' id='send_back' onclick='(function(){ document.location.href = \"registerModule.php\";}())'>Okay</button>";
        echo " ";
        echo "<button name='go_back' id='go_back' onclick='(function(){ document.location.href = \"index.php\";}())'>Forget it</button></p>";
        }

    ?>