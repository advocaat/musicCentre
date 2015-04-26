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
   <div class="col-wide">
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
           <div class="col-narrow">
           	<div id="donate">
               	<h3>Donate Here</h3>
                   <p>Townsville Community Music Center is a registered <em>Deductible Gift Recipiant</em></p>
                   <a href="https://www.paypal.com/au/cgi-bin/webscr?cmd=_flow&SESSION=WkGQVOwZ9FoJxWnt-yv5MXQ5jQXyKVm5LJtAiFPTqJ3Vd8sExDX3NIjkxHy&dispatch=5885d80a13c0db1f8e263663d3faee8d96f000117187ac9edec8a65b311f447e"><img src="images/Donate_Button.png" width="150px"></a>
               </div>
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