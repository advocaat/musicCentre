<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide blockFull">

                <h1>Artist Details</h1>
                <hr>

                <?php
                // select artist
                include("connectdb.php");
                $select = $dat->query('select * from artist where artist_id = ' . $_GET['artist_id']);
                $artist = $select->fetch(PDO::FETCH_ASSOC);

                    echo '<img src="' . $artist['artist_photo'] .'">';
                    echo '<a href="artistDetail.php?artist_id='. $artist["artist_id"] .'"><h2>'. $artist['artist_name'] .'</h2></a>';
                    echo '<p><strong>'. $artist["artist_genre"] .'</strong></p>';
                    if($artist['artist_phone']!= null){
                        echo '<p>Phone: '. $artist["artist_phone"] .'<br/>';
                    }
                    if($artist['artist_email']!=null){
                        echo 'Email: '. $artist["artist_email"] .'<br/>';
                    }
                    if($artist['artist_website']!=null){
                        echo 'Website: <a href="http://'. $artist['artist_website'] .'">'.  $artist['artist_website'] .'</a></p>';
                    }
                    echo '<p>'. nl2br($artist["artist_info"]) .'</p>';
                ?>

                <hr>
                <a href="artists.php"><button class="rightButton">Back To Artists</button></a>
            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>