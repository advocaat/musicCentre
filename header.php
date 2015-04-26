<!-- site header -->

    <div id="header">
    	<div id="navigation">
        	<div id="menu">
        		<ul>
            		<li><img src="images/disc.png" class="navIcon"><a href="index.php" id="a0">Home </a></li>
            		<li id="a1"><img src="images/speaker.png" class="navIcon"><a href="events.php" id="a1">Events </a></li>
            		<li><img src="images/deck.png" class="navIcon" ><a href="artists.php" id="a2">Artists </a></li>
                	<li><img src="images/sheet.png" class="navIcon"><a href="members.php" id="a3">Members </a></li>
            		<li><img src="images/mic.png" class="navIcon"><a href="contact.php"  id="a4">Contact </a></li>
            		 <?php
                       $pos = ["index.php", "events.php", "artists.php", "members.php", "contact.php"];

                        for($i = 0;  $i < 5; $i++){

                          if (strpos($_SERVER['SCRIPT_NAME'],$pos[$i]) !== false ){

                          ?>


                       <script type="text/javascript">
                           var t = "<?php echo $i; ?>";
                         var thislink = document.getElementById('a'+ t);
                         console.log(thislink);
                         thislink.className = "active";
                       </script>
                       <?php
                         }

                       }
                     ?>



         		</ul>
 	        </div>
        </div>
    </div>
