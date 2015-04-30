<!-- login module -->
<div id="login">

    <!-- this code needs to removed after marking of m1 -->
    <p>Hi Kim! You will need to login to test adding, editing and removing of artists. Use the email: <strong>member@email.com</strong> and password: <strong>password</strong>.</p>

    <h3>Login</h3>
    <form method="post" action="processLogin.php">

    <?php
    // check if user is already logged in
    if (isset($_SESSION['userLoggedIn'])) {

        //format name for output
        $name = strtolower($_SESSION['user_firstname']);
        $chars = str_split($name);
        $firstLetter = strtoupper($chars[0]);
        $chars[0] = $firstLetter;
        $name = implode($chars, '');

        echo "<p>Welcome back, ".$name .".</p>";
        echo '<button type="submit" name="submit" value="logout">Logout</button>';
        echo '</form>';
        echo '</div>';
    }
    else { ?>
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
    <?php }?>