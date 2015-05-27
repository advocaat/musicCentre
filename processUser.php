<?php if ($_POST['submit'] == 'register') {

        // test if email already registered
        include("connectdb.php");
        $select = $dat->query('select 1 from user where user_email ="' . $_REQUEST['user_email'] . '"');
        $test = $select->fetch();
        if ($test != 0) {
            header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=1');
            exit;

        } // test if password is long enough
        else if (strlen($_REQUEST['user_pass']) < 5) {
            header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=2');
            exit;

        } // test passwords match
        else if ($_REQUEST['user_pass'] != $_REQUEST['confirm_pass']) {
            header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=3');
            exit;

        } //and if its a valid email
        else if (!filter_var($_REQUEST['user_email'], FILTER_VALIDATE_EMAIL) === true) {
            header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=4');
            exit;

        } else {
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

            // return to page on successful registration
            header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=0');
            exit;
        }
    }

    if ($_REQUEST['submit'] == 'update') {

        session_start();
        $updatePassword = true;
        $id = $_SESSION['user_id'];

        // is this an admin updating a users details?
        if(isset($_SESSION['edit_user_id'])){
            $id = $_SESSION['edit_user_id'];
            // are we replacing their password?
            if (strlen($_REQUEST['user_pass']) == 0) {
                $updatePassword = false;
            }
        }

        if($updatePassword) {
            // test passwords match
            if ($_REQUEST['user_pass'] != $_REQUEST['confirm_pass']) {
                header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=3');
                exit;
            }
            // test if password is long enough
            if (strlen($_REQUEST['user_pass']) < 5) {
                header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=2');
                exit;
            }
            $_REQUEST['user_pass'] = md5($_REQUEST['user_pass']);
        }

        // slice unnecessary data from $_REQUEST
        foreach (array_slice($_REQUEST, 0, count($_REQUEST) - 2) as $value) {

            // skip password if necessary
            if(!$updatePassword && key($_REQUEST) == 'user_pass') {
                next($_REQUEST);
                continue;
            }
            // skip password confirmation regardless
            if (key($_REQUEST) == 'confirm_pass') {
                next($_REQUEST);
                continue;
            }

            include("connectdb.php");
            $dat->exec('update ' . $_REQUEST['table'] . ' set ' . key($_REQUEST) . ' = "' . $value . '" where user_id is ' . $id);
            next($_REQUEST);
        }

        // return with no error (success)
        header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=0');
        exit;
    }

    if ($_REQUEST['submit'] == 'delete') {

        session_start();
        include("connectdb.php");

        $dat->exec('delete from user where user_id is ' . $_SESSION['edit_user_id']);
        unset($_SESSION['edit_user_id']);

        // return with no error (success)
        header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=0');
        exit;
    }