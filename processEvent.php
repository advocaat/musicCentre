<?php if ($_POST['submit'] == 'new') {

    // if photo was set
    if ($_FILES['event_photo']["size"] > 1) {

        // process photo
        $file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
        $upload_exts = end(explode(".", $_FILES["event_photo"]["name"]));
        if ((($_FILES["event_photo"]["type"] == "image/gif")
                || ($_FILES["event_photo"]["type"] == "image/jpeg")
                || ($_FILES["event_photo"]["type"] == "image/png")
                || ($_FILES["event_photo"]["type"] == "image/pjpeg"))
            && ($_FILES["event_photo"]["size"] < 2000000)
            && in_array($upload_exts, $file_exts)
        ) {
            if ($_FILES["event_photo"]["error"] > 0) {
                // error in photo file
                header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=1');
                exit;
            } else {
                // give photo unique name and move to server
                $newName = "images/events/" . time() . $_FILES["event_photo"]["name"];
                move_uploaded_file($_FILES["event_photo"]["tmp_name"], $newName);

            }
        } else {
            // wrong file type error
            header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=2');
            exit;
        }
    } else {
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


        if(key($_REQUEST) == "event_link"){
                  $link = $value;
                  if(strpos($link, "http://") !== 0){
                      $value = "http://" . $link;
                       }
                   }

        array_push($fields, key($_REQUEST));
        array_push($values, $value);
        next($_REQUEST);
    }

    // add photo
    array_push($fields, 'event_photo');
    array_push($values, $newName);

    // implode arrays to build and execute insert query
    $sql = 'insert into event ';
    $sql .= '(' . implode(', ', $fields) . ') ';
    $sql .= 'values ("' . implode('", "', $values) . '")';
    $dat->exec($sql);

    // return with no error (success)
    header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=0');
    exit;

}

if ($_REQUEST['submit'] == 'update') {

    session_start();
    include("connectdb.php");


    // if photo was set
    if ($_FILES['event_photo']["size"] > 1) {

        // process photo
        $file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
        $upload_exts = end(explode(".", $_FILES["event_photo"]["name"]));
        if ((($_FILES["event_photo"]["type"] == "image/gif")
                || ($_FILES["event_photo"]["type"] == "image/jpeg")
                || ($_FILES["event_photo"]["type"] == "image/png")
                || ($_FILES["event_photo"]["type"] == "image/pjpeg"))
            && ($_FILES["event_photo"]["size"] < 2000000)
            && in_array($upload_exts, $file_exts)
        ) {
            if ($_FILES["event_photo"]["error"] > 0) {

                // error in photo file
                header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=1');
                exit;

            } else {

                // give photo unique name and move to server
                $newName = "images/events/" . time() . $_FILES["event_photo"]["name"];
                move_uploaded_file($_FILES["event_photo"]["tmp_name"], $newName);

                // update photo in database
                $dat->exec('update event set event_photo = "' . $newName . '" where event_id is ' . $_SESSION['event_id']);
            }
        }
    }

    // slice unnecessary data from $_REQUEST and update remaining fields
    foreach (array_slice($_REQUEST, 0, count($_REQUEST) - 1) as $value) {

        // skip photo, we've already handled that
        if (key($_REQUEST) == 'event_photo') {
            next($_REQUEST);
            continue;
        }


        if(key($_REQUEST) == "event_link"){
            $link = $value;
            if(strpos($link, "http://") !== 0){
                $value = "http://" . $link;
                 }
             }

             print($_REQUEST['event_link']);

        // replace double quotes
        $value = str_replace(array('"'), array("'"), $value);

        $dat->exec('update event set ' . key($_REQUEST) . ' = "' . $value . '" where event_id is ' . $_SESSION['event_id']);
        next($_REQUEST);
    }

    unset($_SESSION['event_id']);

    // return with no error (success)
    header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=0');
    exit;
}

if ($_REQUEST['submit'] == 'delete') {

    session_start();
    include("connectdb.php");

    // delete photo
    $select = $dat->query('select * from event where event_id is ' . $_SESSION['event_id']);
    $results = $select->fetch(PDO::FETCH_ASSOC);
    unlink($results['event_photo']);

    $dat->exec('delete from event where event_id is ' . $_SESSION['event_id']);
    unset($_SESSION['event_id']);

    // return with no error (success)
    header('Location: '. strtok($_SERVER['HTTP_REFERER'], '?')  .'?error=0');
    exit;
}