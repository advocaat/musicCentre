<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide">

                <?php if(!isset($_SESSION['userLoggedIn']) || $_SESSION['user_status'] !== '2'){
                    include('moduleNoAccess.php');
                } else {

                    // display any errors
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == '0') {
                            echo '<p class="success">Process completed successfully.</p>';
                        }
                        if ($_GET['error'] == '1') {
                            echo '<p class="error">Error in photo file.</p>';
                        }
                        if ($_GET['error'] == '2') {
                            echo '<p class="error">Photo wrong file type.</p>';
                        }
                    }

                    include("connectdb.php");

                    // select all events
                    $select = $dat->query('select * from event order by event_date asc');
                    $events = $select->fetchAll(PDO::FETCH_ASSOC);

                    echo '<h1>Edit Events</h1>';
                    echo '<hr><div class="blockMy">';

                    // if no events
                    if(empty($events)){
                        echo '<em>You haven\'t created any events yet!</em>';
                    }

                    // build table of existing events
                    echo '<table>';
                    foreach ($events as $row){
                        echo '<tr>';
                        echo '<td><img src="'. $row['event_photo'] .'"></td>';
                        echo '<td><strong>'. $row['event_name'] .'</strong></td>';
                        echo '<td>'. $row['event_date'] .'</td>';
                        echo '<td>'. substr($row["event_info"], 0, 29) .'...' .'</td>';
                        echo '<td><a href="adminEvent.php?event_id='. $row['event_id'] .'#edit"><button>Edit</button></a></td>';
                        echo '</tr>';
                    }
                    echo '</table></div><hr>';

                    // wrap the  form in a div so we have an anchor to link to
                    echo '<div id="edit">';

                    // if editing, display correct text
                    if (isset($_GET['event_id'])){
                        echo '<h1>Edit Event</h1>';
                    }
                    else {
                        echo '<h1>Add New Event</h1>';
                    }

                    // select artists for featured artist field
                    $select = $dat->query('select * from artist');
                    $artists = $select->fetchAll(PDO::FETCH_ASSOC);

                    ?>
                    <form method="post" action="processEvent.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col half">
                                    <label for="event_name">Event Name</label>
                                    <input name="event_name" id="event_name" required>
                                    <label for="event_date">Date Of Event</label>
                                    <input type="date" name="event_date" id="event_date" title="YYYY-MM-DD" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required>
                                    <label for="event_location">Location</label>
                                    <input name="event_location" id="event_location">
                                    <label for="event_tagline">Tagline</label>
                                    <input name="event_tagline" id="event_tagline">
                            </div>
                            <div class="col half">
                                    <label for="artist_id">Featured Artist</label>
                                    <select name="artist_id" id="artist_id">
                                        <option value=""></option>
                                        <?php foreach($artists as $artist) {
                                            echo '<option value="'. $artist['artist_id'] .'">'. $artist['artist_name'] .'</option>';
                                        } ?>
                                    </select>
                                    <label for="event_tickets">Ticket Price</label>
                                    <input name="event_tickets" id="event_tickets">
                                    <label for="event_concession">Concession Price</label>
                                    <input name="event_concession" id="event_concession">
                                    <label for="event_link">Link To Buy Tickets</label>
                                    <input name="event_link" id="event_link">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col half">
                                <label for="event_info">Event Information</label>
                                <textarea rows="19" name="event_info" id="event_info"></textarea>
                            </div>
                            <div class="col half">
                                <label for="event_photo">Photo</label>
                                <input type="file" name="event_photo" id ="event_photo">
                                <img src="images/default.gif" id="display_photo"  width="100%">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <button type="submit" name="submit" id="submit" value="new">Submit</button>
                                <?php if (isset($_GET['event_id'])) {
                                    // if editing add a delete button
                                    echo '<button type="submit" name="submit" id="submit" value="delete">Delete</button>';
                                } ?>
                            </div>
                        </div>
                    </form>
                    </div>
                <?php } ?>
            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
    </div>
<?php

    // if editing artist details, populate fields
    if (isset($_GET['event_id'])) {

        // get artist details
        include("connectdb.php");
        $select = $dat->query('select * from event where event_id = "' . $_GET['event_id'] . '"');
        $result = $select->fetch(PDO::FETCH_ASSOC);

        // use javascript to update the values of fields
        echo '<script type="text/javascript">';
        foreach (array_slice($result, 1, 9) as $i => $value) {

            // fix line breaks
            $value = nl2br($value);
            $value = str_replace("\r\n",'',$value);
            echo 'var text = "' . $value .'";';
            echo 'document.getElementById("' . $i . '").value = text.replace(/<br \/>/ig,"\\n");';
            next($result);
        }

        // switch submit value to update to enable correct processing
        echo 'document.getElementById("submit").value = "update";';

        // display photo from database
        echo 'document.getElementById("display_photo").src="' . $result['event_photo'] . '";';

        // set user_id correctly so we don't overwrite it with our own
        echo 'document.getElementById("user_id").value="' . $result['user_id'] . '";';
        echo '</script>';

        // set event_id as session variable, we'll need it for processing
        $_SESSION['event_id'] = $_GET['event_id'];
    } else {

        // if not editing, set date to todays date by default
        echo '<script>var today = new Date();var dd = today.getDate();var mm = today.getMonth()+1;var yyyy = today.getFullYear();';
        echo 'if(dd<10){dd="0"+dd} if(mm<10){mm="0"+mm} var today = yyyy+"-"+mm+"-"+dd;';
        echo 'document.getElementById("event_date").value = today</script>';
    }

include("footer.php"); ?>