<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide font-justify artistFull">

                <?php
                // select artist
                include("connectdb.php");
                $select = $dat->query('select * from artist where artist_id = ' . $_GET['artist_id']);
                $artist = $select->fetch(PDO::FETCH_ASSOC);


                    echo '<img src="' . $artist['artist_photo'] .'">';
                    echo '<a href="artistDetail.php?artist_id='. $artist["artist_id"] .'"><h2>'. $artist['artist_name'] .'</h2></a>';
                    echo '<p><strong>'. $artist["artist_genre"] .'</strong></p>';
                    echo '<p>Phone: '. $artist["artist_phone"] .'<br/>';
                        echo 'Email: '. $artist["artist_email"] .'<br/>';
                        $website = "http://www.". str_replace('www.','', $artist['artist_website']);
                        if(filter_var($website, FILTER_VALIDATE_URL)){
                        echo 'Website: <a href="'. $website.'">'. $website.'</a></p>';
                    }
                    echo '<p>'. $artist["artist_info"] .'</p>';


                ?>

            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>