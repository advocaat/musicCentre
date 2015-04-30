<?php include("header.php"); ?>
    <div class="container row">
        <div id="main" class="col wide">

            <?php

            // display any registration errors
            if (isset($_GET['error'])) {
                if ($_GET['error'] == '0') {
                    echo '<em class="success">Process completed successfully.</em>';
                }
                if ($_GET['error'] == '1') {
                    echo '<em class="error">Email address is already registered.</em>';
                }
                if ($_GET['error'] == '2') {
                    echo '<em class="error">Password not long enough.</em>';
                }
                if ($_GET['error'] == '3') {
                    echo '<em class="error">Passwords do not match.</em>';
                }
                if ($_GET['error'] == '4') {
                    echo '<em class="error">Email is not valid.</em>';
                }
            }

            // if user logged in, display edit message
            if (isset($_SESSION['userLoggedIn'])) {
                echo '<h2>Edit Your Details</h2>';
                echo '<p>You can update your account details here. Dont forget to confirm your password before submitting!</p>';
            } // else display registration message
            else {
                echo '<h2>Register</h2>';
                echo '<p>As a registered user, you can post bulletins for the community to see.</p>';
            } ?>

            <form method="post" action="processUser.php">
                <div class="row">
                    <div class="col half">
                        <p>
                            <label for="user_firstname">First Name</label>
                            <input name="user_firstname" id="user_firstname">
                            <label for="user_lastname">Last Name</label>
                            <input name="user_lastname" id="user_lastname">
                            <label for="user_phone">Phone Number</label>
                            <input name="user_phone" id="user_phone">
                        </p>
                    </div>
                    <div class="col half">
                        <p>
                            <label for="user_email">Email Address</label>
                            <input name="user_email" id="user_email">
                            <label for="user_pass">Password</label>
                            <input name="user_pass" id="user_pass" type="password">
                            <label for="confirm_pass">Confirm Password</label>
                            <input name="confirm_pass" id="confirm_pass" type="password">
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="user_address">Postal Address</label>
                        <input name="user_address" id="user_address">
                    </div>
                </div>
                <div class="row">
                    <div class="col narrow">
                        <label for="user_city">City</label>
                        <input name="user_city" id="user_city">
                    </div>
                    <div class="col narrow">
                        <label for="user_state">State</label>
                        <input name="user_state" id="user_state">
                    </div>
                    <div class="col narrow">
                        <label for="user_postcode">Postcode</label>
                        <input name="user_postcode" id="user_postcode">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!-- set default new account status -->
                        <input type="hidden" name="user_status" value="0">
                        <input type="hidden" name="table" value="user">

                        <p>
                            <button type="submit" name="submit" id="submit" value="register">Submit</button>
                        </p>
                    </div>
                </div>
            </form>
        </div>
        <div id="sidebar" class="col narrow">
            <?php include("sidebar.php"); ?>
        </div>
    </div>
    <?php

    // if user is logged in, populate fields for editing
    if (isset($_SESSION['userLoggedIn'])) {

        // get user details
        include("connectdb.php");
        $select = $dat->query('select * from user where user_id = "' . $_SESSION['user_id'] . '"');
        $result = $select->fetch(PDO::FETCH_ASSOC);

        // use javascript to update the values of fields
        echo '<script type="text/javascript">';
        foreach (array_slice($result, 1, 9) as $i => $value) {
            // skip password field
            if ($i == 'user_pass') {
                next($result);
            } else {
                echo 'document.getElementById("' . $i . '").value = "' . $value . '";';
                next($result);
            }
        }
        // switch submit value to update to enable correct processing
        echo 'document.getElementById("submit").value = "update";';
        echo '</script>';
    }

include("footer.php"); ?>