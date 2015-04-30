<?php
    // user login
    if ($_REQUEST['submit'] == 'login') {

        include("connectdb.php");

        // get user info based on login
        $select = $dat->query('select * from user where user_email = "' . $_REQUEST['user_email'] . '" and user_pass ="' . md5($_REQUEST['user_pass']) . '" limit 1');
        $result = $select->fetch(PDO::FETCH_ASSOC);

        // set session variables
        if (!empty($result)) {
            session_start();
            $_SESSION['userLoggedIn'] = true;
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['user_firstname'] = $result['user_firstname'];
            $_SESSION['user_status'] = $result['user_status'];
        }
    }

    // user logout
    if ($_REQUEST['submit'] == 'logout') {
        session_start();
        session_destroy();
    }

    // return to previous page
    header('Location: index.php');
    exit;
?>