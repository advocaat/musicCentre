<?php include("header.php"); ?>
<div class="container">
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
                   <input type="text" class="input" placeholder="Your Name" id="namefield">
                   <input type="text" class="input" placeholder="Phone Number"/>
                   <input type="text" class="input" placeholder="Email Address"/>
                   <textarea rows="6" class="input" placeholder="Your Message"></textarea>
               	<button type="submit">Send Message</button>
               </form>
           </div>
        <div id="sidebar" class="col narrow">
            <?php include("sidebar.php");?>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>