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
                <h2>Are you <strong>NEW</strong> to Townsville?</h2>
                                <img src="images/strand.gif" width="250px" align="right">
                <p>Popular attractions include "The Strand", a long tropical beach and garden strip; Riverway, a riverfront parkland attraction located on the banks of Ross River; Reef HQ, a large tropical aquarium holding many of the Great Barrier Reef's native flora and fauna; the Museum of Tropical Queensland, built around a display of relics from the sunken British warship HMS Pandora; The Townsville Sports Reserve; and Magnetic Island, a large neighbouring island, the vast majority of which is national park.</p>
                <hr>
                <h2>The Music Scene in Townsville</h2>

                <p>Townsville has a population of about 200,000 and is growing at about 1 suburb per year, so there is a lot of musical activity. All private schools and most government schools have music teachers. The larger private schools are Townsville Grammar, the Cathedral School and Ryan Catholic College. The larger public high schools are Kirwan and Pimlico.</p>
                <hr>
                <h2>Useful Contacts</h2>

                <p>Music Teachers Association of Qld; The Townsville Branch<br>Ms Margery Jorgensen<br><strong>Phone: </strong>(07) 4779 0382<br><strong>Email: </strong>mjo11750@bigpond.net.au</p>
                <p>Kodaly Music Education Institute of Australia<br><Strong>Website: </Strong><a href="http://www.kodaly.org.au">kodaly.org.au</a></p> 
                <p>Some local businesses also employ or assist music teachers<br><a href="mailto:heather@thekeyboardshop.com.au">heather@thekeyboardshop</a><br><a href="http://www.artiesmusiconline.com.au">Arties Music</a></p>
                <hr>
                <h2>Busking</h2>
                <p>Busking is permitted at several public spaces around the city with a Buskers Permit from the city council - phone 4727 9680.
There is no age limit, but buskers 16 and under will need to be accompanied by a parent/guardian.</p>
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