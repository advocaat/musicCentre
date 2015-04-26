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
       <!--actual page-->
   <?php include("bandDisplay.php");?>
       <!--end-->
    </div>

    <!--Footer-->

<?php include("footer.php"); ?>

</body>
</html>




</body>
</html>