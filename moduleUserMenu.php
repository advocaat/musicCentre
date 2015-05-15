<?php if(isset($_SESSION['userLoggedIn'])) { ?>
    <div id="userMenu">
        <h3>User Menu</h3>
        <ul>
            <?php if($_SESSION['user_status'] === '0'){
                echo "<li><a href ='members.php'>Become a member today!</a></li>";
            } ?>
            <li><a href="editUser.php">Update my user details</a></li>
            <li><a href="editBulletin.php">Post or edit a bulletin</a></li>
            <?php if($_SESSION['user_status'] >= '1'){
                echo "<li><a href ='editArtist.php'>Create or update your artist details</a></li>";
            } ?>
            <?php if($_SESSION['user_status'] === '2'){
                echo "<li><a href ='editArtist.php'>Create or edit an event</a></li>";
            } ?>
            <?php if($_SESSION['user_status'] === '3'){
                echo "<li><a href ='admin.php'>Administration</a></li>";
            } ?>
        </ul>
    </div>
<?php } ?>