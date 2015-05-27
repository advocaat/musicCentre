<?php if(isset($_SESSION['userLoggedIn'])) { ?>
    <div id="userMenu">
        <h3>User Menu</h3>
        <ul>
            <?php if($_SESSION['user_status'] == '0'){
                echo "<li><a href ='members.php'>Become a member today!</a></li>";
            } ?>
            <li><a href="editUser.php">Update user details</a></li>
            <li><a href="editBulletin.php">My bulletins</a></li>
            <?php if($_SESSION['user_status'] >= '1'){
                echo "<li><a href ='editArtist.php'>My artists</a></li>";
            } ?>
            <?php if($_SESSION['user_status'] == '2'){
                echo "<li><a href ='editEvent.php'>My events</a></li>";
            } ?>
        </ul>
    </div>
<?php } ?>