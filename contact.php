<?php include("header.php"); ?>
<div class="container">
    <div class="row">
        <div id="main" class="col wide">
               <h1>Contact us</h1>
               <p>We'd love to hear from you!</p>
               <p>
                   <strong>07 4724 2086</strong><br />
                   0402 255 182<br />
                   PO Box 1006, Townsville, Qld 4810<br />
                   <a href="mailto:admin@townsvillemusic.org.au">admin@townsvillemusic.org.au</a>
               </p>
               <form class="font-center">
                   <input type="text" class="input" placeholder="Name" id="namefield">
                   <input type="text" class="input" placeholder="Phone"/>
                   <input type="text" class="input" placeholder="Email"/>
                   <textarea rows="6" class="input" placeholder="Message"></textarea>
               	<p><button type="submit">Send</button></p>
               </form>
           </div>
        <div id="sidebar" class="col narrow">
            <?php include("sidebar.php");?>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>