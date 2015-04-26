 <div id="nav">
    <ul><img src="images/logo.png" alt="Site Logo">
        <li><a href="index.php">Home</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="theterms.php">Register Band</a></li>
        <li><a href="edit.php">Edit Band Page</a></li>

        <?php
         //display admin link if logged in as admin
         if(isset($_SESSION['userLoggedIn']) && $_SESSION['user_status']==='3'){echo "<li><a href ='admin.php'>Admin</a></li>"; }
         ?>

    </ul>
    </div>