<!-- New User Registration Module -->

<?php if (isset($_REQUEST['submit'])) {

    // only connect db once we know we need it
    include("connectdb.php");

    // test if email already registered
    $select = $dat->query('select 1 from user where user_email ="' . $_REQUEST['user_email'] . '"');
    $test = $select->fetch();
    if ($test != 0) {
        header('Location: register.php?error=1');
    }

    // test if password is long enough
    else if (strlen($_REQUEST['user_pass']) < 5) {
        header('Location: register.php?error=2');
    }

    // test passwords match
    else if ($_REQUEST['user_pass'] != $_REQUEST['confirm_pass']) {
        header('Location: register.php?error=3');

    //and if its a valid email
    }else if(!filter_var($_REQUEST['user_email'], FILTER_VALIDATE_EMAIL )=== true){
        header('Location: register.php?error=4');
    }

    else {
        $_REQUEST['user_pass'] = md5($_REQUEST['user_pass']);
        $fields = array();
        $values = array();

        // add keys and values to the arrays
        foreach (array_slice($_REQUEST, 0, count($_REQUEST) - 2) as $value) {

            // skip password confirmation field, we dont need it
            if (key($_REQUEST) == 'confirm_pass') {
                next($_REQUEST);
                continue;
            }

            array_push($fields, key($_REQUEST));
                     array_push($values, $value);
                     next($_REQUEST);
                 }

        // implode arrays to build and execute insert query
        $sql = 'insert into ' . $_REQUEST['table'] . ' ';
        $sql .= '(' . implode(', ', $fields) . ') ';
        $sql .= 'values ("' . implode('", "', $values) . '")';
        $dat->exec($sql);

        // return to homepage on successful registration
        header('Location: index.php');
    }
}
else { ?>

<div id="registerModule">
    <fieldset>
        <legend>Register</legend>

        <!-- display registration errors -->
        <?php if (isset($_REQUEST['error'])) {
            if ($_REQUEST['error'] == '1') {
                echo "<em>Email address is already registered.</em>";
            }
            if ($_REQUEST['error'] == '2') {
                echo "<em>Passwords must be at least five characters.</em>";
            }
            if ($_REQUEST['error'] == '3') {
                echo "<em>Passwords do not match.</em>";
            }
            if ($_REQUEST['error'] == '4') {
               echo "<em>Email is not valid.</em>";
            }
        } ?>

        <form method="POST">
            <table>
                <tr>
                    <td><label for="user_email">Email Address</label></td>
                    <td><input name="user_email" id="user_email"></td>
                </tr>
                <tr>
                    <td><label for="user_pass">Password</label></td>
                    <td><input name="user_pass" id="user_pass"></td>
                </tr>
                <tr>
                    <td><label for="confirm_pass">Confirm Password</label></td>
                    <td><input name="confirm_pass" id="confirm_pass"></td>
                </tr>
                <tr>
                    <td><label for="user_firstname">First Name</label></td>
                    <td><input name="user_firstname" id="user_firstname"></td>
                </tr>
                <tr>
                    <td><label for="user_lastname">Last Name</label></td>
                    <td><input name="user_lastname" id="user_lastname"></td>
                </tr>
                <tr>
                    <td><label for="user_address">Postal Address</label></td>
                    <td><input name="user_address" id="user_address"></td>
                </tr>
                <tr>
                    <td><label for="user_city">City</label></td>
                    <td><input name="user_city" id="user_city"></td>
                </tr>
                <tr>
                    <td><label for="user_state">State</label></td>
                    <td><input name="user_state" id="user_state"></td>
                </tr>
                <tr>
                    <td><label for="user_postcode">Postcode</label></td>
                    <td><input name="user_postcode" id="user_postcode"></td>
                </tr>
                <tr>
                    <td><label for="user_phone">Phone Number</label></td>
                    <td><input name="user_phone" id="user_phone"></td>
                </tr>
                <tr>
                    <td><label for="user_mobile">Mobile Number</label></td>
                    <td><input name="user_mobile" id="user_mobile"></td>
                </tr>
            </table>

            <!-- set default new account status -->
            <input type="hidden" name="user_status" value="0">
            <input type="hidden" name="table" value="user">
            <button type="submit" name="submit" value="register">Register</button>
        </form>
    </fieldset>
</div>
<?php } ?>