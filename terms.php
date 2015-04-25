<?php
    include("connectdb.php");
    session_start();
?>

<?php



        if(isset($_REQUEST['submit'])){
            if($_REQUEST['submit'] == "signup"){
                if($_REQUEST['accept_terms'] == "on") {
                    header("Location: registerBandModule.php" );


                }
                else{
                    header("Location: index.php");
                }

            }
        }


    ?>


<div id="termsAndConds">
    <h1>Terms and Conditions</h1>
    <p>Termer termly term terminator termite.</p><p> Conditioner conditioning conditionallly conditions</p>

    <form method="POST" action="terms.php">

    <label for="accept_terms">Accept terms</label>
   <input type="checkbox" name="accept_terms" id="accept_terms" value="on" checked="checked">
    <label for="submit">Sign me up!</label>
    <button type="submit" name="submit" id="submit" value="signup">Continue</button>
    </form>

<div>