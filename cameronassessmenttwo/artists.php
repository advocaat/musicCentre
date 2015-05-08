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
                    <li><img src="images/disc.png" class="navIcon"><a href="index.php" class="">Home </a></li>
                    <li><img src="images/speaker.png" class="navIcon"><a href="events.php" class="">Events </a></li>
                    <li><img src="images/deck.png" class="navIcon" ><a href="artists.php" class="">Artists </a></li>
                    <li><img src="images/sheet.png" class="navIcon"><a href="members.php" class="">Members </a></li>
                    <li><img src="images/mic.png" class="navIcon"><a href="contact.php" class="">Contact </a></li>
                </ul>
            </div>
        </div>
    </div>    <div class="container">
        <div class="row">
            <div id="main" class="col wide">
                <div class="row">
                <div class="col artistFeature"><img src="images/artists/default.png"><a href="artistDetail.php?artist_id=19"><h2>Dead Kelly</h2></a><p><strong>Metal</strong></p><p>Phone: 34612435642<br/>Email: dead@kelly.com<br/>Website: <a href="http://www.deadkelly.net">http://www.deadkelly.net</a></p><p>Dead Kelly was formed when one little bloke called Pine Cone Throat decided to write some metal after having played for years in bands with different...<br /><a href="artistDetail.php?artist_id=19">More info</a></p></div></div><div class="row"><div class="col narrow artist"><a href="artistDetail.php?artist_id=17"><img src="images/artists/default.png"><h3>The Hives</h3></a><p><strong>Rock</strong></p><p>The Hives are a Swedish rock band from Fagersta that first garnered attention in the early 2000s as...<br /><a href="artistDetail.php?artist_id=17">More info</a></p></div><div class="col narrow artist"><a href="artistDetail.php?artist_id=19"><img src="images/artists/default.png"><h3>Dead Kelly</h3></a><p><strong>Metal</strong></p><p>Dead Kelly was formed when one little bloke called Pine Cone Throat decided to write some metal aft...<br /><a href="artistDetail.php?artist_id=19">More info</a></p></div><div class="col narrow artist"><a href="artistDetail.php?artist_id=20"><img src="images/artists/default.png"><h3>Bliss N Eso</h3></a><p><strong>Hip Hop</strong></p><p>Bliss n Eso are a Multi Platinum ARIA Award-winning Australian hip hop band based in Sydney, and we...<br /><a href="artistDetail.php?artist_id=20">More info</a></p></div></div><div class="row"><div class="col narrow artist"><a href="artistDetail.php?artist_id=21"><img src="images/artists/default.png"><h3>Etherwood</h3></a><p><strong>Electronic</strong></p><p>Etherwood is the most recent signing to Med School and is undoubtedly one of the most promising you...<br /><a href="artistDetail.php?artist_id=21">More info</a></p></div><div class="col narrow artist"><a href="artistDetail.php?artist_id=22"><img src="images/artists/default.png"><h3>The Heavy</h3></a><p><strong>Rock</strong></p><p>The Heavy are a British indie rock band from Bath, England signed to Ninja Tune imprint Counter Rec...<br /><a href="artistDetail.php?artist_id=22">More info</a></p></div><div class="col narrow artist"><a href="artistDetail.php?artist_id=23"><img src="images/artists/default.png"><h3>KOAN Sound</h3></a><p><strong>Electronic</strong></p><p>KOAN Sound is an electronic music production duo from Bristol, United Kingdom. The duo consists of ...<br /><a href="artistDetail.php?artist_id=23">More info</a></p></div></div><div class="row"><div class="col narrow artist"><a href="artistDetail.php?artist_id=24"><img src="images/artists/default.png"><h3>Parkway Drive</h3></a><p><strong>Hardcore</strong></p><p>Parkway Drive is an Australian metalcore band from Byron Bay, New South Wales, formed in 2002.[1][2...<br /><a href="artistDetail.php?artist_id=24">More info</a></p></div><div class="col narrow artist"><a href="artistDetail.php?artist_id=25"><img src="images/artists/default.png"><h3>Dada Life</h3></a><p><strong>Electronic</strong></p><p>Dada Life is a Swedish DJ duo from Stockholm. The duo consists of Olle Cornéer and Stefan Engblom ...<br /><a href="artistDetail.php?artist_id=25">More info</a></p></div><div class="col narrow artist"><a href="artistDetail.php?artist_id=27"><img src="images/artists/default.png"><h3>Rise Against</h3></a><p><strong>Punk Rock</strong></p><p>Rise Against is an American melodic hardcore band from Chicago, Illinois, formed in 1999. The band ...<br /><a href="artistDetail.php?artist_id=27">More info</a></p></div></div>
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