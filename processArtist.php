<?php if ($_POST['submit'] == 'new') {

    // process photo
    $file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
    $upload_exts = end(explode(".", $_FILES["artist_photo"]["name"]));
    if ((($_FILES["artist_photo"]["type"] == "image/gif")
            || ($_FILES["artist_photo"]["type"] == "image/jpeg")
            || ($_FILES["artist_photo"]["type"] == "image/png")
            || ($_FILES["artist_photo"]["type"] == "image/pjpeg"))
        && ($_FILES["artist_photo"]["size"] < 2000000)
        && in_array($upload_exts, $file_exts))
    {
        if ($_FILES["artist_photo"]["error"] > 0)
        {
            // error in photo file
            header('Location: editArtist.php?error=1');
            exit;
        }
        else
        {
            // give photo unique name and move to server
            $newName = "images/artists/" . time() . $_FILES["artist_photo"]["name"];
            move_uploaded_file($_FILES["artist_photo"]["tmp_name"], $newName);

            include("connectdb.php");

            $fields = array();
            $values = array();

            // add keys and values to the arrays
            foreach (array_slice($_REQUEST, 0, count($_REQUEST) - 1) as $value) {

                array_push($fields, key($_REQUEST));
                array_push($values, $value);
                next($_REQUEST);
            }

            // add photo
            array_push($fields, 'artist_photo');
            array_push($values, $newName);

            // implode arrays to build and execute insert query
            $sql = 'insert into artist ';
            $sql .= '(' . implode(', ', $fields) . ') ';
            $sql .= 'values ("' . implode('", "', $values) . '")';
            $dat->exec($sql);
            echo $sql;

            // return with no error (success)
            header('Location: editArtist.php?error=0');
            exit;
        }
    }
    else
    {
        // wrong file type error
        header('Location: editArtist.php?error=2');
        exit;
    }
}

if ($_REQUEST['submit'] == 'update') {

    session_start();
    include("connectdb.php");

    if (isset($_FILES['artist_photo'])) {

        // process photo
        $file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
        $upload_exts = end(explode(".", $_FILES["artist_photo"]["name"]));
        if ((($_FILES["artist_photo"]["type"] == "image/gif")
                || ($_FILES["artist_photo"]["type"] == "image/jpeg")
                || ($_FILES["artist_photo"]["type"] == "image/png")
                || ($_FILES["artist_photo"]["type"] == "image/pjpeg"))
            && ($_FILES["artist_photo"]["size"] < 2000000)
            && in_array($upload_exts, $file_exts)
        ) {
            if ($_FILES["artist_photo"]["error"] > 0) {

                // error in photo file
                header('Location: editArtist.php?error=1');
                exit;

            } else {

                // give photo unique name and move to server
                $newName = "images/artists/" . time() . $_FILES["artist_photo"]["name"];
                move_uploaded_file($_FILES["artist_photo"]["tmp_name"], $newName);

                // update photo in database
                $dat->exec('update artist set artist_photo = "' . $newName . '" where artist_id is ' . $_SESSION['artist_id']);
            }
        }
    }

    // slice unnecessary data from $_REQUEST and update remaining fields
    foreach (array_slice($_REQUEST, 0, count($_REQUEST) - 1) as $value) {

        // skip photo, we've already handled that
        if (key($_REQUEST) == 'artist_photo') {
            next($_REQUEST);
            continue;
        }

        $dat->exec('update artist set ' . key($_REQUEST) . ' = "' . $value . '" where artist_id is ' . $_SESSION['artist_id']);
        next($_REQUEST);
    }

    unset($_SESSION['artist_id']);

    // return with no error (success)
    header('Location: editArtist.php?error=0');
    exit;
}

if ($_REQUEST['submit'] == 'delete') {

    session_start();
    include("connectdb.php");
    $dat->exec('delete from artist where artist_id is ' . $_SESSION['artist_id']);
    unset($_SESSION['artist_id']);

    // return with no error (success)
    header('Location: editArtist.php?error=0');
    exit;
}