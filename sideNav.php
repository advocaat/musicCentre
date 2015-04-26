 <div id="nav">
    <ul><img src="images/logo.png" alt="Site Logo">
        <li><a href="index.php">Home</a></li>
        <li><a href="registerModule.php">Register</a></li>
        <li><a href="terms.php">Register Band</a></li>
        <li><a href="bandEditModule.php">Edit Band Page</a></li>

        <?php
         //display admin link if logged in as admin
         if(isset($_SESSION['userLoggedIn']) && $_SESSION['user_status']==='3'){echo "<li><a href ='adminModule.php'>Admin</a></li>"; }
         ?>

    </ul>
    </div>