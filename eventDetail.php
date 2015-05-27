<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide blockFull">

                <h1>Event Details</h1>
                <hr>

                <?php
                // select event
                include("connectdb.php");
                $select = $dat->query("select * from event left join artist on artist.artist_id = event.artist_id where event_id = ".  $_GET['event_id']);
                $result = $select->fetch(PDO::FETCH_ASSOC);

                echo '<img src="' . $result['event_photo'] .'">';
                echo '<p><a class="font-lead" href="eventDetail.php?event_id='. $result['event_id'] .'">'. $result['event_name'] .'</a><br/>';
                echo '<strong>'. $result['event_tagline'] .'</strong></p>';

                // display featured artist if set
                if (isset($result['artist_id'])) {
                    $select = $dat->query('select artist_name from artist where artist_id='. $result['artist_id']);
                    $artist = $select->fetch(PDO::FETCH_ASSOC);
                    echo '<p>Featuring: <a href="artistDetail.php?artist_id='. $result['artist_id'] . '">'. $artist['artist_name']. '</a></p>';
                }

                echo '<p>When: '. $result['event_date'] .'<br/>';
                echo 'Where: '. $result['event_location'] .'<br/>';
                echo 'Tickets: '. $result['event_tickets'] .'<br/>';
                echo 'Concession: '. $result['event_concession'] .'<br/>';
                echo '<p>'. nl2br($result['event_info']) .'</p>';
                echo '<hr>';
                echo '<a href="'. $result['event_link'] .'" target="_blank"><button class="leftButton">Buy Tickets</button></a>';
                echo '<a href="events.php"><button class="rightButton">Back To Events</button></a>';
                ?>

            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>