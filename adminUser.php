<?php include("header.php"); ?>
    <div class="container row">
        <div id="main" class="col wide">

            <?php if(!isset($_SESSION['userLoggedIn']) || $_SESSION['user_status'] !== '2'){
                include('moduleNoAccess.php');
            } else {

            // display any registration errors
            if (isset($_GET['error'])) {
                if ($_GET['error'] == '0') {
                    echo '<p class="success">Process completed successfully.</p>';
                }
                if ($_GET['error'] == '1') {
                    echo '<p class="error">Email address is already registered.</p>';
                }
                if ($_GET['error'] == '2') {
                    echo '<p class="error">Password not long enough.</p>';
                }
                if ($_GET['error'] == '3') {
                    echo '<p class="error">Passwords do not match.</p>';
                }
                if ($_GET['error'] == '4') {
                    echo '<p class="error">Email is not valid.</p>';
                }
            }

            include("connectdb.php");
            $select = $dat->query('select * from user');
            $users = $select->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class="blockMy">
                <h1>Edit Users</h1>
                <p>To update a users membership status, first select the user to edit.</p>
                <hr>
            <?php
            // if no users
            if(empty($users)){
                echo '<em>You haven\'t created any users!</em>';
            }

            // build table of existing users
            echo '<table>';
            foreach ($users as $row){
                echo '<tr>';
                echo '<td><strong>'. $row['user_firstname'] .' '. $row['user_lastname'] .'</strong></td>';
                echo '<td>'. $row["user_email"] .'</td>';
                echo '<td>'. $row["user_phone"] .'</td>';

                if ($row["user_status"] == '0') {
                    echo '<td>User</td>';
                }
                if ($row["user_status"] == '1') {
                    echo '<td>Member</td>';
                }
                if ($row["user_status"] == '2') {
                    echo '<td>Admin</td>';
                }
                echo '<td><a href="adminUser.php?user_id='. $row['user_id'] .'#edit"><button>Edit</button></a></td>';
                echo '</tr>';
            }
            echo '</table></div><hr>';


            // if user logged in, display edit message
            if (isset($_GET['user_id'])) {
                echo '<h1>Edit User Details</h1>';
                echo '<strong>Note:</strong> For privacy reasons, you cannot view a users password.  You can however issue them with a new password by entering it here.  To update a users details without changing their password, simply leave the password fields blank.';
            } // else display registration message
            else {
                echo '<h1>Add New User</h1>';
            } ?>

            <hr>
            <form method="post" action="processUser.php" id="edit">
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
                    <div class="col third">
                        <label for="user_city">City</label>
                        <input name="user_city" id="user_city">
                    </div>
                    <div class="col third">
                        <label for="user_state">State</label>
                        <input name="user_state" id="user_state">
                    </div>
                    <div class="col third">
                        <label for="user_postcode">Postcode</label>
                        <input name="user_postcode" id="user_postcode">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col third">
                        <p><label for="user_status">User membership level:</label></p>
                    </div>
                    <div class="col twothird">
                        <select id="user_status"name="user_status">
                            <option value="0">User</option>
                            <option value="1">Member</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <input type="hidden" name="table" value="user">
                        <button type="submit" name="submit" id="submit" value="register">Submit</button>
                        <?php if (isset($_GET['user_id'])) {
                            // if editing add a delete button
                            echo '<button type="submit" name="submit" id="submit" value="delete">Delete</button>';
                        } ?>
                    </div>
                </div>
            </form>
           <?php } ?>
        </div>
        <div id="sidebar" class="col narrow">
            <?php include("sidebar.php"); ?>
        </div>
    </div>
    <?php

    // if user is logged in, populate fields for editing
    if (isset($_GET['user_id'])) {

        // get user details
        include("connectdb.php");
        $select = $dat->query('select * from user where user_id = "' . $_GET['user_id'] . '"');
        $result = $select->fetch(PDO::FETCH_ASSOC);

        // use javascript to update the values of fields
        echo '<script type="text/javascript">';
        foreach (array_slice($result, 1, 10) as $i => $value) {
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

        // set this user_id as a separate session variable, we'll need for processing
        $_SESSION['edit_user_id'] = $_GET['user_id'];
    }

include("footer.php"); ?>