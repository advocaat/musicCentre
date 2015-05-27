<?php if ($_POST['submit'] == 'new') {

    // if photo was set
    if ($_FILES['bulletin_photo']["size"] > 1) {

        // process photo
        $file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
        $upload_exts = end(explode(".", $_FILES["bulletin_photo"]["name"]));
        if ((($_FILES["bulletin_photo"]["type"] == "image/gif")
                || ($_FILES["bulletin_photo"]["type"] == "image/jpeg")
                || ($_FILES["bulletin_photo"]["type"] == "image/png")
                || ($_FILES["bulletin_photo"]["type"] == "image/pjpeg"))
            && ($_FILES["bulletin_photo"]["size"] < 2000000)
            && in_array($upload_exts, $file_exts)) {
            if ($_FILES["bulletin_photo"]["error"] > 0) {
                // error in photo file
                header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=1');
                exit;
            } else {
                // give photo unique name and move to server
                $newName = "images/bulletins/" . time() . $_FILES["bulletin_photo"]["name"];
                move_uploaded_file($_FILES["bulletin_photo"]["tmp_name"], $newName);
            }
        }
        else {
            // wrong file type error
            header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=2');
            exit;
        }
    }
    else {
        // set no image
        $newName ="";
    }

    include("connectdb.php");

    $fields = array();
    $values = array();

    // add keys and values to the arrays
    foreach (array_slice($_REQUEST, 0, count($_REQUEST) - 1) as $value) {

        // replace double quotes
        $value = str_replace(array('"'), array("'"), $value);

        array_push($fields, key($_REQUEST));
        array_push($values, $value);
        next($_REQUEST);
    }

    // add photo
    array_push($fields, 'bulletin_photo');
    array_push($values, $newName);

    // implode arrays to build and execute insert query
    $sql = 'insert into bulletin ';
    $sql .= '(' . implode(', ', $fields) . ') ';
    $sql .= 'values ("' . implode('", "', $values) . '")';
    $dat->exec($sql);
    echo $sql;

    // return with no error (success)
    header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=0');
    exit;
}

if ($_REQUEST['submit'] == 'update') {

    session_start();
    include("connectdb.php");

    if ($_FILES['bulletin_photo']["size"] > 1) {

        // process photo
        $file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
        $upload_exts = end(explode(".", $_FILES["bulletin_photo"]["name"]));
        if ((($_FILES["bulletin_photo"]["type"] == "image/gif")
                || ($_FILES["bulletin_photo"]["type"] == "image/jpeg")
                || ($_FILES["bulletin_photo"]["type"] == "image/png")
                || ($_FILES["bulletin_photo"]["type"] == "image/pjpeg"))
            && ($_FILES["bulletin_photo"]["size"] < 2000000)
            && in_array($upload_exts, $file_exts)
        ) {
            if ($_FILES["bulletin_photo"]["error"] > 0) {

                // error in photo file
                header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=1');
                exit;

            } else {

                // give photo unique name and move to server
                $newName = "images/bulletins/" . time() . $_FILES["bulletin_photo"]["name"];
                move_uploaded_file($_FILES["bulletin_photo"]["tmp_name"], $newName);

                // update photo in database
                $dat->exec('update bulletin set bulletin_photo = "' . $newName . '" where bulletin_id is ' . $_SESSION['bulletin_id']);
            }
        }
    }

    // slice unnecessary data from $_REQUEST and update remaining fields
    foreach (array_slice($_REQUEST, 0, count($_REQUEST) - 1) as $value) {

        // skip photo, we've already handled that
        if (key($_REQUEST) == 'bulletin_photo') {
            next($_REQUEST);
            continue;
        }

        // replace double quotes
        $value = str_replace(array('"'), array("'"), $value);

        $dat->exec('update bulletin set ' . key($_REQUEST) . ' = "' . $value . '" where bulletin_id is ' . $_SESSION['bulletin_id']);
        next($_REQUEST);
    }

    unset($_SESSION['bulletin_id']);

    // return with no error (success)
    header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=0');
    exit;
}

if ($_REQUEST['submit'] == 'delete') {

    session_start();
    include("connectdb.php");

    // delete photo
    $select = $dat->query('select * from bulletin where bulletin_id is ' . $_SESSION['bulletin_id']);
    $results = $select->fetch(PDO::FETCH_ASSOC);
    unlink($results['bulletin_photo']);

    $dat->exec('delete from bulletin where bulletin_id is ' . $_SESSION['bulletin_id']);
    unset($_SESSION['bulletin_id']);

    // return with no error (success)
    header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=0');
    exit;
}