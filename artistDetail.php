<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide artistFull">

                <h2>Artist Details</h2>

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

            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>