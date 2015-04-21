<!-- Login Module -->

<?php include("connectdb.php"); ?>
<?php

echo '<fieldset>';
echo '<legend><h3>Login</h3></legend>';
echo '<form method="POST" action="processData.php">';

// check if user is already logged in
if (isset($_SESSION['userLoggedIn'])) {
    echo 'Welcome back, ' . $_SESSION['user_firstname'] . '<br />';
    echo '<button type="submit" name="submit" value="logout">Logout</button>';
    echo '</form>';
    echo '</fieldset>';
}

else {
    if (isset($_REQUEST['error'])) {
        if ($_REQUEST['error'] == 'login') {
            echo "<em>Login failed.</em>";
        }
    } ?>

        <form  method="POST" action="processData.php">
            <table>
                <tr>
                    <td><label for="user_email">Email</label></td>
                    <td><input name="user_email"></td>
                </tr>
                <tr>
                    <td><label for="user_pass">Password</label></td>
                    <td><input name="user_pass"></td>
                </tr>
            </table>
            <button type="submit" name="submit" value="login">Login</button>
        </form>
    </fieldset>

<?php } ?>