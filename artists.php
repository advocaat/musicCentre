<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide">
                <h2>Artists</h2>

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
                    echo 'Website: <a href="'. $featured['artist_website'] .'">'. $featured['artist_website'] .'</a></p>';
                    echo '<p>'. substr($featured["artist_info"], 0, 249) .'...<br />';
                    echo '<a href="artistDetail.php?artist_id='. $featured['artist_id'] .'">More Info</a></p>';
                    echo '</div>';
                }
                echo '</div>';

                // select everything but featured artist (to do)
                $select = $dat->query('select * from artist where artist_featured = "false"');
                $result = $select->fetchAll(PDO::FETCH_ASSOC);
                $selectLen = $dat->query('select count(*) from artist where artist_featured = "false"');
                while($length = $selectLen->fetch()){
                      $myLength =  $length[0];
                      echo "<script>console.log(".$length[0].")</script>";
                 }
                $count = 1;
                $i = 0;
                $pageNumber = 1;
              if(isset($_GET["page"])){
                     $pageNumber = $_GET["page"];

               }
                $countAll = ($pageNumber * 9) - 9;
                for($i = ($pageNumber * 9) - 9; $i < $pageNumber * 9; $i++){
                if($countAll < $myLength){
                    $countAll += 1;



                        // open div row
                        if ($count == 1) {
                            echo '<div class="row">';
                        }

                        echo '<div class="col narrow artist">';
                        echo '<a href="artistDetail.php?artist_id='. $result[$i]["artist_id"] .'"><img src="' . $result[$i]['artist_photo'] .'">';
                        echo '<h3>'. $result[$i]["artist_name"] .'</h3></a>';
                        echo '<p><strong>'. $result[$i]["artist_genre"] .'</strong></p>';
                        echo '<p>'. substr($result[$i]["artist_info"], 0, 199) .'...<br />';
                        echo '<a href="artistDetail.php?artist_id='. $result[$i]["artist_id"] .'">More Info</a></p>';
                        echo '</div>';

                        // close div row
                        if ($count == 3) {
                            echo '</div>';
                            $count = 0;
                        }
                        $count +=1;}

                        }

                        // close div row if didn't before
                        if ($count != 1) {
                            echo '</div>';

                }
                $pageNumber+=1;
                if($pageNumber > 2){
                 $backNumber = $pageNumber - 2;
                    echo "<a href='artists.php?page=".$backNumber."' id='backButton'>Back</a>";
                }
                if($countAll < $myLength){
                  echo "<a href='artists.php?page=". $pageNumber ."' id='nextButton'>Next</a>";
                }


                ?>


            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>