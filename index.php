<?php session_start(); ?>


<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Townsville Music | Home Page</title>
<link href="normalize.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!--Main Header-->
<?php include("header.php"); ?>
    <!--Main Content-->

    <div id="log">
  <?php include('loginModule.php'); ?>
     </div>

    <div class="container">
   <?php include("sidenav.php");?>
        <div class="col-full bottom-line">
            <h2>Welcome to the MUSIC CENTRE!</h2>
            <p class="font-justify">Based in Townsville, North Qld, the Music Centre presents concerts and workshops throughout the year, in a diverse range of genres including classical, jazz, folk, blues, world and contemporary music, featuring touring artists and locally-based professional and emerging artists. </p>
        </div>
        <div class="col-wide bottom-line">
            <h2>2013 marked 30years for the Music Centre!</h2>
            <p>It has been constantly changing over the years to keep up to date with the musical tastes and needs of the Townsville community. As part of the relocation of the Music Centre to the Civic Theatre, Bronia Renison and Jean Dartnall, both librarians, have assessed the old collection of sheet music, books and recorded music which the centre has been storing, unused, for many years. Sometimes older things have to be discarded to make way for the new, but the Music Centre is aware that older material may still have value. </p>
            <p>The National Library of Australia has an online catalogue (TROVE) that lists not only its own holdings but also information about items held by many other libraries around Australia. Using this catalogue Bronia and Jean have identified at least 150 items of music that are not held by any of the country's major libraries. These items have been donated to the National Library to include in their collection and thus made available to all historians and musicians.</p>
            <p>Also discovered in the old collection were some pieces relevant to North Queensland. Local musicians performed these at a musical social afternoon on Sunday April 21st in C2 at the Civic Theatre. The remaining sheet music, books and CDs were put on display and distributed free of charge to the local music community.</p>
        </div>
        <div class="col-narrow">
            <img src="images/30years.png" width="80%">
            <img src="images/old-music.jpg" width="100%">
        </div>
        <div class="col-full clear">
            <p>More history on the Music Centre can be found <a href="history.html">HERE</a></p>
        </div>
    </div>

    <!--Footer-->

<?php include("footer.php"); ?>

</body>
</html>



<?php
    if(isset($_REQUEST['update'])){
        echo "<em>Table updated</em>";

    }
    if(isset($_REQUEST['error'])){
        echo "<em>Problem updating account</em>";

    }
?>



</body>
</html>