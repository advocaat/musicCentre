<!-- New User Registration Module -->

<div id="registerModule">
    <fieldset>
        <legend><h3>Register</h3></legend>

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
               echo "<em>Password is not considered valid</em>";
            }

        } ?>

        <form method="POST" action="processData.php">

            <!-- arbitrary value for index will be ignored but must exist -->
            <input type="hidden" name="user_id" value="">

            <table>
                <tr>
                    <td><label for="user_email">Email Address</label></td>
                    <td><input name="user_email"></td>
                </tr>
                <tr>
                    <td><label for="user_pass">Password</label></td>
                    <td><input name="user_pass"></td>
                </tr>
                <tr>
                    <td><label for="confirm_pass">Confirm Password</label></td>
                    <td><input name="confirm_pass"></td>
                </tr>
                <tr>
                    <td><label for="user_firstname">First Name</label></td>
                    <td><input name="user_firstname"></td>
                </tr>
                <tr>
                    <td><label for="user_lastname">Last Name</label></td>
                    <td><input name="user_lastname"></td>
                </tr>
                <tr>
                    <td><label for="user_address">Postal Address</label></td>
                    <td><input name="user_address"></td>
                </tr>
                <tr>
                    <td><label for="user_city">City</label></td>
                    <td><input name="user_city"></td>
                </tr>
                <tr>
                    <td><label for="user_state">State</label></td>
                    <td><input name="user_state"></td>
                </tr>
                <tr>
                    <td><label for="user_postcode">Postcode</label></td>
                    <td><input name="user_postcode"></td>
                </tr>
                <tr>
                    <td><label for="user_phone">Phone Number</label></td>
                    <td><input name="user_phone"></td>
                </tr>
                <tr>
                    <td><label for="user_mobile">Mobile Number</label></td>
                    <td><input name="user_mobile"></td>
                </tr>
            </table>

            <!-- set default new account status -->
            <input type="hidden" name="user_status" value="0">
            <input type="hidden" name="table" value="user">

            <button type="submit" name="submit" value="register">Register</button>
        </form>
    </fieldset>
</div>

