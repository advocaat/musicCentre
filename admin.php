<?php session_start(); ?>


<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Townsville Music | Home Page</title>
<link href="css/normalize.css" rel="stylesheet" type="text/css">

</head>

<body>
	<!--Main Header-->

    <!--Main Content-->

    <div id="log">
  <?php include('moduleLogin.php'); ?>
     </div>

    <div class="container" >
   <?php include("moduleUserMenu.php");?>
       <!--actual page-->

       <br>
       <br>
       <br>
       <br>
<?php include("adminModule.php");?>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>


       <!--end-->
    </div>


</body>
</html>




</body>
</html>