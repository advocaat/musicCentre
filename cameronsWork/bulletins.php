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
                <h2>Community Bulletins</h2>
                <hr>
                <!-- DAAN put bulletin html in here mkay -->
                
                
                 <div class="BulletinItem">
                	
                  <img src="bulletins images/stjosephs.PNG" width="382" height="180" alt=""/>  
                    <h2>Volunteer Singers / Musicians</h2>
               	    
                    
               <p> Our Parish Priest, Fr Mick Peters, is trying to development and foster a community for our 6 PM Vigil Mass at St Josephs on the Strand. 
I'm helping by organising an event format, where I invite our members to bring a plate for a buffet and I provide music, or friends who can sing or perform. 
Now that we are achieving some success, we need more people who can sing or play music. 
I'm open to any kind of singing or performing so long as it is not too controversial. My preference would be for an artist to sing a medley of old time favorites. 
Mass starts at 6pm and finishes about 10 to 7.
If you would like to take part, please call Merle Trembath 0418882633 anytime. </p> 
<p>Posted 24-Mar-15</p>
				
                <button type="button">Edit</button> 
                <button type="button">Remove</button>                                    
       
			</div>
                
                <!-- -->
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



    <!--Sponsors box-->
    <div id="sponsors">
        <hr>
        <h3>Sponsors</h3>
        <p><a href="http://www.townsville.gov.au">Townsville City Council</a></p>
        <p><a href="http://www.townsville.gov.au"><img src="images/TCCLogo.gif" width="100px"></a></p>        
        <p><a href="https://www.qld.gov.au">Queensland Government</a></p>        
        <p><a href="https://www.qld.gov.au"><img src="images/qldgovtlogo.gif" width="100px"></a></p>
    </div>
            </div>
    <div id="footer" class="container row col">
    	<p>&copy; 2015 Townsville Community Music Centre | Website designed by CivL</p>
    </div>
</body>
</html>
