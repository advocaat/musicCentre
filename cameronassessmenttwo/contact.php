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
    </div><div class="container">
    <div class="row">
        <div id="main" class="col wide">
               <h1>Contact us</h1>
               <p>We'd love to hear from you!</p>
               <p>
                   <span class=""></span> <strong>07 4724 2086</strong><br />
                   <span class=""></span>0402 255 182<br />
                   <span class=""></span>PO Box 1006, Townsville, Qld 4810<br />
                   <span class=""></span><a href="mailto:admin@townsvillemusic.org.au">admin@townsvillemusic.org.au</a>
               </p>
               <form class="font-center">
                   <input type="text" class="input" placeholder="Your Name" id="namefield" autoficus/>
                   <input type="text" class="input" placeholder="Phone Number"/>
                   <input type="text" class="input" placeholder="Email Address"/>
                   <textarea readonly rows="6" class="input" placeholder="Your Message"></textarea>
               	<button type="submit">Send Message</button>
               </form>
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