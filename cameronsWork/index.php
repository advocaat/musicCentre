<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Townsville Music Centre</title>
    <link href="css/normalize.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="header">
        <div class="container">
            <div id="navigation" class="row col">
                <ul>
                    <li><img src="images/navIcons/home.gif" class="navIcon"><a href="index.php" class="">Home </a></li>
                    <li><img src="images/navIcons/events.gif" class="navIcon"><a href="events.php" class="">Events </a></li>
                    <li><img src="images/navIcons/artists.gif" class="navIcon" ><a href="artists.php" class="">Artists </a></li>
                    <li><img src="images/navIcons/members.gif" class="navIcon"><a href="members.php" class="">Members </a></li>
                    <li><img src="images/navIcons/bulletins.gif" class="navIcon"><a href="bulletins.php" class="">Bulletins </a></li>
                    <li><img src="images/navIcons/contact.gif" class="navIcon"><a href="contact.php" class="">Contact </a></li>
                </ul>
            </div>
        </div>
    </div>    <div class="container">
        <div class="row">
            <div id="main" class="col wide font-justify">
                <h2>Welcome to the MUSIC CENTRE!</h2>
                <p>Based in Townsville, North Qld, the Music Centre presents concerts and workshops throughout the year, in a diverse range of genres including classical, jazz, folk, blues, world and contemporary music, featuring touring artists and locally-based professional and emerging artists. </p>
                <hr>
                <h2>2013 marked 30 years for the Music Centre!</h2>
                <img src="images/30years.png" width="150px" align="right">
                <p>It has been constantly changing over the years to keep up to date with the musical tastes and needs of the Townsville community. As part of the relocation of the Music Centre to the Civic Theatre, Bronia Renison and Jean Dartnall, both librarians, have assessed the old collection of sheet music, books and recorded music which the centre has been storing, unused, for many years. Sometimes older things have to be discarded to make way for the new, but the Music Centre is aware that older material may still have value. </p>
                <p>The National Library of Australia has an online catalogue (TROVE) that lists not only its own holdings but also information about items held by many other libraries around Australia. Using this catalogue Bronia and Jean have identified at least 150 items of music that are not held by any of the country's major libraries. These items have been donated to the National Library to include in their collection and thus made available to all historians and musicians.</p>
                <img src="images/old-music.jpg" width="200px" align="right">
                <p>Also discovered in the old collection were some pieces relevant to North Queensland. Local musicians performed these at a musical social afternoon on Sunday April 21st in C2 at the Civic Theatre. The remaining sheet music, books and CDs were put on display and distributed free of charge to the local music community.</p>
                <hr>
                <p>More history on the Music Centre can be found <a href="history.php">HERE</a></p>
            </div>
            <div id="sidebar" class="col narrow">
                <!-- login module -->
<div id="login">

    <!-- this code needs to removed after marking of m1 -->
    <p>Hi Kim! You will need to login to test adding, editing and removing of artists. Use the email: <strong>member@email.com</strong> and password: <strong>password</strong>.</p>

    <h3>Login</h3>
    <form method="post" action="processLogin.php">

            <form method="post" action="processLogin.php">
            <p>
                <label for="user_email">Email:</label><br/>
                <input id = "user_email" name="user_email">
            </p>
            <p>
                <label for="user_pass">Password:</label><br/>
                <input id="user_pass" type="password" name="user_pass">
            </p>
            <p>
                <button type="submit" name="submit" value="login">Login</button>
            </p>
        </form>
        <p>Not registered yet? <a href="editUser.php">Click here.</a></p>
        </div>
                </div>
        </div>
    </div>
    <div id="footer" class="container row col">
    	<p>&copy; 2015 Townsville Community Music Centre | Website designed by CivL</p>
    </div>
</body>
</html>