<?php if ($_POST['submit'] == 'artist') {

    include("connectdb.php");

    // update artist categories
    $dat->exec('update settings set artist_categories = "' . $_REQUEST['artist_categories'] . '"');

    // update featured artist
    $dat->exec('update artist set artist_featured = "false"');
    $dat->exec('update artist set artist_featured = "true" where artist_name ="'. $_REQUEST['artist_featured'] .'"');


    header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=0');
    exit;

    }









    if ($_REQUEST['submit'] == 'update') {

        session_start();

        // test passwords match
        if ($_REQUEST['user_pass'] != $_REQUEST['confirm_pass']) {
            header('Location: editUser.php?error=3');
            exit;
        }

        // test if password is long enough
        if (strlen($_REQUEST['user_pass']) < 5) {
            header('Location: editUser.php?error=2');
            exit;
        }

        $_REQUEST['user_pass'] = md5($_REQUEST['user_pass']);

        // slice unnecessary data from $_REQUEST
        foreach (array_slice($_REQUEST, 0, count($_REQUEST) - 3) as $value) {

            // skip password confirmation field
            if (key($_REQUEST) == 'confirm_pass') {
                next($_REQUEST);
            } else {
                include("connectdb.php");
                $dat->exec('update ' . $_REQUEST['table'] . ' set ' . key($_REQUEST) . ' = "' . $value . '" where user_id is ' . $_SESSION['user_id']);
                next($_REQUEST);
            }
        }

        // return with no error (success)
        header('Location: editUser.php?error=0');
    }