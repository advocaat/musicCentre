<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide artistFull">

                <h2>Event Details</h2>

                <?php
                // select artist
                include("connectdb.php");
                $select = $dat->query("select * from event left join artist on artist.artist_id = event.artist_id where event_id = ".  $_GET['event_id']);
                $result = $select->fetch(PDO::FETCH_ASSOC);

                echo '<img src="' . $result['event_photo'] .'">';
                echo '<a href="eventDetail.php?event_id='. $result['event_id'] .'"><h2>'. $result['event_name'] .'</h2></a>';
                echo '<p><strong>'. $result['event_tagline'] .'</strong></p>';
                echo '<p>When: '. $result['event_date'] .'<br/>';
                echo 'Where: '. $result['event_location'] .'<br/>';
                echo 'Tickets: '. $result['event_tickets'] .'<br/>';
                echo 'Concession: '. $result['event_concession'] .'<br/>';
                echo '<p>'. $result['event_info'] .'</p>';
                echo '<p><a href="'. $result['event_link'] .'">Buy Tickets</a></p>';
                ?>

            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>