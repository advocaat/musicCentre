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
            <div id="main" class="col wide">
                <h2>Members</h2>
            </div>
            <div class="col narrow">
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