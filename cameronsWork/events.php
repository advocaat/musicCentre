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
    </div><div class="container">
    <div class="row">
        <div id="main" class="col wide">
               	<div class="event">
                   <img src="images/artist-Harbourside.png" class="eventImage" alt="Harbourside-Duo">
                   <table class="eventInfo">
                   	<thead>
                   	<tr>
                           <th colspan="2"><a href="#">Harbourside Duo</a></th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                       	<th>When:</th>
                           <td>2PM Sunday 14th JUNE</td>
                       </tr>
                       <tr>
                       	<th>Where:</th>
                           <td>C2 Civic Theatre</td>
                       </tr>
                       <tr>
                       	<th>Tickets:</th>
                           <td>$25 Adult<br>$20 Concession<br>Kids under 12 Free</td>
                       </tr>
                       </tbody>
                       <tfoot>
                       <tr>
                       	<td colspan="2"><a href="https://au.patronbase.com/_TVCC/Seats/NumSeats?prod_id=0782&perf_id=1&section_id=M&seat_type_id=S"><img src="images/ticketshop.png" alt="tickets"></a></td>
                       </tr>
                       </tfoot>
                   </table>
                   <table class="eventAbout">
                       <tr>
                       	<th>Dream Serenade</th>
                           <td colspan="">Music of Debussy, Ravel, Faure, Sibelius and others.<br><em>March into Sommarhagen. Enjoy a spot of Lawn Tennis. Meet the Girl with Flaxen Hair. Dance the Habanera. Be seduced by Thais</em><br>Or just relax and let the music wash over you...</td>
                       </tr>
       			</table>
                   </div>
               	<div class="event">
                   <img src="images/artist-Aviva.png" class="eventImage" alt="Aviva">
                   <table class="eventInfo">
                   	<thead>
                   	<tr>
                           <th colspan="2"><a href="#">Aviva Quartet</a></th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                       	<th>When:</th>
                           <td>2PM Sunday 17th MAY</td>
                       </tr>
                       <tr>
                       	<th>Where:</th>
                           <td>C2 Civic Theatre</td>
                       </tr>
                       <tr>
                       	<th>Tickets:</th>
                           <td>$25 Adult<br>$20 Concession<br>Kids under 12 Free</td>
                       </tr>
                       </tbody>
                       <tfoot>
                       <tr>
                       	<td colspan="2"><a href="https://au.patronbase.com/_TVCC/Seats/NumSeats?prod_id=0782&perf_id=1&section_id=M&seat_type_id=S"><img src="images/ticketshop.png" alt="tickets"></a></td>
                       </tr>
                       </tfoot>
                   </table>
                   <table class="eventAbout">
                       <tr>
                       	<th>Aviva and Friends</th>
                           <td colspan="">Grab your passport and travel with us to the Celtic Highlands and then step into the Bluegrass country in the heart of America!.
       Join us for a toe tappin', soul searchin' journey as AVIVA makes it's way around the world on the first of our two globe trotting adventures! </td>
                       </tr>
       			</table>
                   </div>
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