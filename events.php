<?php include("header.php"); ?>
<div class="container">
    <div class="row">
        <div id="main" class="col wide">

            <h2>Upcoming Events</h2>

            <?php include("connectdb.php");

            $results = $dat->query("select * from event left join artist on artist.artist_id = event.artist_id");

            foreach($results as $result) {
                echo '<div class="row">';
                echo '<div class="col artistFeature">';
                echo '<img src="' . $result['event_photo'] .'">';
                echo '<a href="eventDetail.php?event_id='. $result['event_id'] .'"><h2>'. $result['event_name'] .'</h2></a>';
                echo '<p><strong>'. $result['event_tagline'] .'</strong></p>';
                echo '<p>When: '. $result['event_date'] .'<br/>';
                echo 'Where: '. $result['event_location'] .'<br/>';
                echo 'Tickets: '. $result['event_tickets'] .'<br/>';
                echo 'Concession: '. $result['event_concession'] .'<br/>';
                echo '<p>'. substr($result['event_info'], 0, 399) .'...<br />';
                echo '<a href="eventDetail.php?event_id='. $result['event_id'] .'">More Info & Tickets</a></p>';
                echo '</div></div>';
            }
            ?>

        </div>
        <div id="sidebar" class="col narrow">
            <?php include("sidebar.php");?>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>