<?php
    include("connectdb.php");
?>
    if(!isset($_SESSION['user_name'])){
        echo "<script>(function(){alert('You must be logged in as a Registered User to perform this task.)'}());<script>";
        header("Location: registerModule.php");
    }
<div id="termsAndConds">
    <h1>Terms and Conditions</h1>
    <p>blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah</p>

    <form method="POST" action="processData.php">

    <label for="accept_terms">Accept terms</label>
    <input type="checkbox" name="accept_terms" id="accept_terms" checked="checked">
    <label for="sign_up">Sign me up!</label>
    <button type="submit" name="submit" id="submit" value="signup">Continue<button>


<div>