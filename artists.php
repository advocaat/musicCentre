<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide">
                <div class="row">
                <?php

                // select featured artist
                include("connectdb.php");
                $select = $dat->query('select * from artist where artist_featured = "true"');
                $featured = $select->fetch(PDO::FETCH_ASSOC);

                if ($featured) {
                    echo '<div class="col artistFeature">';
                    echo '<img src="' . $featured['artist_photo'] .'">';
                    echo '<a href="artistDetail.php?artist_id='. $featured["artist_id"] .'"><h2>'. $featured['artist_name'] .'</h2></a>';
                    echo '<p><strong>'. $featured["artist_genre"] .'</strong></p>';
                    echo '<p>Phone: '. $featured["artist_phone"] .'<br/>';
                    echo 'Email: '. $featured["artist_email"] .'<br/>';
                    $website = "http://www.". str_replace('www.','', $featured['artist_website']);
                    if(filter_var($website, FILTER_VALIDATE_URL)){
                        echo 'Website: <a href="'. $website.'">'. $website.'</a></p>';
                    }
                    echo '<p>'. substr($featured["artist_info"], 0, 149) .'...<br />';
                    echo '<a href="artistDetail.php?artist_id='. $featured['artist_id'] .'">More info</a></p>';
                    echo '</div></div>';
                }

                // select everything but featured artist (to do)
                $select = $dat->query('select * from artist where artist_featured = "false"');
                $result = $select->fetchAll(PDO::FETCH_ASSOC);

                $count = 1;
                foreach($result as $row){

                    // open div row
                    if ($count == 1) {
                        echo '<div class="row">';
                    }

                    echo '<div class="col narrow artist">';
                    echo '<a href="artistDetail.php?artist_id='. $row["artist_id"] .'"><img src="' . $row['artist_photo'] .'">';
                    echo '<h3>'. $row["artist_name"] .'</h3></a>';
                    echo '<p><strong>'. $row["artist_genre"] .'</strong></p>';
                    echo '<p>'. substr($row["artist_info"], 0, 99) .'...<br />';
                    echo '<a href="artistDetail.php?artist_id='. $row["artist_id"] .'">More info</a></p>';
                    echo '</div>';

                    // close div row
                    if ($count == 3) {
                        echo '</div>';
                        $count = 0;
                    }
                    $count +=1;

                }

                // close div row if didn't before
                if ($count != 1) {
                    echo '</div>';
                }?>

            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>