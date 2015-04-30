<?php if ($_POST['submit'] == 'new') {

    include("connectdb.php");

    //test if its a valid email
    if (!filter_var($_REQUEST['artist_email'], FILTER_VALIDATE_EMAIL) === true) {
        header('Location: editArtist.php?error=1');
        exit;

    } else {

        $fields = array();
        $values = array();

        // add keys and values to the arrays
        foreach (array_slice($_REQUEST, 0, count($_REQUEST) - 1) as $value) {

            array_push($fields, key($_REQUEST));
            array_push($values, $value);
            next($_REQUEST);
        }

        // implode arrays to build and execute insert query
        $sql = 'insert into artist ';
        $sql .= '(' . implode(', ', $fields) . ') ';
        $sql .= 'values ("' . implode('", "', $values) . '")';
        $dat->exec($sql);

        // return to page on successful registration
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

}

if ($_REQUEST['submit'] == 'update') {

    session_start();
    include("connectdb.php");

    // slice unnecessary data from $_REQUEST
    foreach (array_slice($_REQUEST, 0, count($_REQUEST) - 1) as $value) {

        $dat->exec('update artist set ' . key($_REQUEST) . ' = "' . $value . '" where artist_id is ' . $_SESSION['artist_id']);
        next($_REQUEST);
    }

    unset($_SESSION['artist_id']);

    // return with no error (success)
    header('Location: editArtist.php?error=0');
}

if ($_REQUEST['submit'] == 'delete') {

    session_start();
    include("connectdb.php");
    $dat->exec('delete from artist where artist_id is ' . $_SESSION['artist_id']);
    unset($_SESSION['artist_id']);

    // return with no error (success)
    header('Location: editArtist.php?error=0');
}