<?php if(isset($_SESSION['userLoggedIn']) && $_SESSION['user_status'] == '2') { ?>
    <div id="adminMenu">
        <h3>Admin Menu</h3>
        <ul>
            <li><a href ='adminUser.php'>Edit Users</a></li>
            <li><a href ='adminBulletin.php'>Edit Bulletins</a></li>
            <li><a href ='adminArtist.php'>Edit Artists</a></li>
            <li><a href ='adminEvent.php'>Edit Events</a></li>
            <li><a href ='adminer.php'>Database Admin</a></li>
        </ul>
    </div>
<?php } ?>