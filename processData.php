<?php include("connectdb.php"); ?>
<?php session_start(); ?>
<?php

// delete record
if ($_REQUEST['submit'] == 'delete') {
    
    // set first item in array to be index
    $index = key($_REQUEST);
    $dat->exec('delete from ' . $_REQUEST['table']. ' where ' . $index . ' is ' . $_REQUEST[$index]);

    // return to admin page and display updated table
    header('Location: admin.php?pageOption='. $_REQUEST['table']);
    
}

// update record
else if ($_REQUEST['submit'] == 'update') {
    
    // set first item in array to be index
    $index = key($_REQUEST);
    
    // slice unnecessary data from $_REQUEST
    foreach (array_slice($_REQUEST, 0, count($_REQUEST) -2) as $value) {
        $dat->exec('update ' . $_REQUEST['table']. ' set ' . key($_REQUEST) . ' = "' . $value . '" where ' . $index . ' is ' . $_REQUEST[$index]);
        next($_REQUEST);
    }

    // return to admin page and display updated table
    header('Location: admin.php?pageOption='. $_REQUEST['table']);
}

// add new record
else if ($_REQUEST['submit'] == 'add') {

    $fields = array();
    $values = array();

    // add keys and values to the arrays
    foreach (array_slice($_REQUEST, 0, count($_REQUEST) -2) as $value) {
        array_push($fields, key($_REQUEST));
        array_push($values, $value);
        next($_REQUEST);
    }

    // implode arrays to build and execute insert query
    $sql = 'insert into ' . $_REQUEST['table'] . ' ';
    $sql .= '(' . implode(', ', $fields) . ') ';
    $sql .= 'values ("' . implode('", "', $values) . '")';
    $dat->exec($sql);

    echo $sql;

    // return to admin page and display updated table
    //header('Location: admin.php?pageOption='. $_REQUEST['table']);
}

// new user registration
else if ($_REQUEST['submit'] == 'register') {

    // test if email already registered
    $select = $dat->query('select 1 from user where user_email ="' . $_REQUEST['user_email'] . '"');
    $test = $select->fetch();
    if ($test != 0) {
        header('Location: registerModule.php?error=1');
    }

    // test if password is long enough
    else if (strlen($_REQUEST['user_pass']) < 5) {
        header('Location: registerModule.php?error=2');
    }

    // test passwords match
    else if ($_REQUEST['user_pass'] != $_REQUEST['confirm_pass']) {
        header('Location: registerModule.php?error=3');
    }

    else {

        $fields = array();
        $values = array();

        // skip index key
        next($_REQUEST);

        // add keys and values to the arrays
        foreach (array_slice($_REQUEST, 1, count($_REQUEST) - 3) as $value) {

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

// user login
else if ($_REQUEST['submit'] == 'login') {

    // get user info based on login
    $select = $dat->query('select * from user where user_email = "' . $_REQUEST['user_email'] . '" and user_pass ="' . $_REQUEST['user_pass'] . '" limit 1');
    $result = $select->fetch(PDO::FETCH_ASSOC);

    // set session variables
    if (boolval($result)) {
        $_SESSION['userLoggedIn'] = true;
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

// close database
$dat = null;

?>
