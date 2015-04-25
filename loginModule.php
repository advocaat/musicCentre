<!-- Login Module -->

<?php include("connectdb.php"); ?>

<?php if (isset($_REQUEST['submit'])) {

    // user login


    if ($_REQUEST['submit'] == 'login') {

            // get user info based on login
            $select = $dat->query('select * from user where user_email = "' . $_REQUEST['user_email'] . '" and user_pass ="' . md5($_REQUEST['user_pass']) . '" limit 1');
            $result = $select->fetch(PDO::FETCH_ASSOC);

            // set session variables
            if (boolval($result)) {
                $_SESSION['userLoggedIn'] = true;
                $_SESSION['user_id'] = $result['user_id'];
                $_SESSION['user_firstname'] = $result['user_firstname'];
                $_SESSION['user_status'] = $result['user_status'];

                header('Location: index.php');
            }

            // login failed
            else {
                header('Location: index.php?error=login');
            }
        }

    // user logout
        else if ($_REQUEST['submit'] == 'logout') {
            session_destroy();
            header('Location: index.php');
    }
}
else {

    echo '<fieldset>';
    echo '<legend><h3>Login</h3></legend>';
    echo '<form method="post">';

    // check if user is already logged in
    if (isset($_SESSION['userLoggedIn'])) {

        //format name for output
        $name = strtolower($_SESSION['user_firstname']);
        $chars = str_split($name);
        $firstLetter = strtoupper($chars[0]);
        $chars[0] = $firstLetter;
        $name = implode($chars, '');

        echo "<p>Logged in as: ".$name ."</p>";



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

            <form  method="post">
                <table>
                    <tr>
                        <td><label for="user_email">Email</label></td>
                        <td><input name="user_email"></td>
                    </tr>
                    <tr>
                        <td><label for="user_pass">Password</label></td>
                        <td><input type="password" name="user_pass"></td>
                    </tr>
                </table>
                <button type="submit" name="submit" value="login">Login</button>
            </form>
        </fieldset>

<?php }} ?>