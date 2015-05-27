<?php include("header.php"); ?>
        <div class="row">
            <div id="main" class="col wide">
                <div class="row">
                    <div class="col wide">
                        <h1>Artists</h1>
                    </div>
                    <div class="col narrow">
                        <form method="get" action="artists.php" id="artistCategories">
                            <select name="category">
                                <?php
                                include("connectdb.php");
                                // get artist categories from database
                                $select = $dat->query('select * from settings');
                                $list = $select->fetch(PDO::FETCH_ASSOC);
                                $options = explode(',', $list['artist_categories']);
                                foreach($options as $option){
                                    if (isset($_GET['category']) && $_GET['category'] == $option) {
                                        echo '<option selected>' . $option .'</option>';
                                    } else {
                                        echo '<option>' . $option .'</option>';
                                    }
                                } ?>
                            </select>
                            <button type="submit">Filter</button>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <?php
                    // select featured artist
                    $select = $dat->query('select * from artist where artist_featured = "true"');
                    $featured = $select->fetch(PDO::FETCH_ASSOC);

                    if ($featured) {
                        echo '<div class="col blockFeature">';
                        echo '<img src="' . $featured['artist_photo'] .'">';
                        echo '<a href="artistDetail.php?artist_id='. $featured["artist_id"] .'"><h2>'. $featured['artist_name'] .'</h2></a>';
                        echo '<p><strong>'. $featured["artist_genre"] .'</strong></p>';
                        echo '<p>Phone: '. $featured["artist_phone"] .'<br/>';
                        echo 'Email: '. $featured["artist_email"] .'<br/>';
                        echo 'Website: <a href="'. $featured['artist_website'] .'">'. $featured['artist_website'] .'</a></p>';
                        echo '<p>'. substr($featured["artist_info"], 0, 399) .'...<br/>';
                        echo '<a href="artistDetail.php?artist_id='. $featured['artist_id'] .'"><button>More Info</button></a></p>';
                        echo '<hr></div>';
                    }
                    echo '</div>';

                    if(isset($_GET['category'])) {
                        $sql = 'select * from artist where artist_featured = "false" and artist_category = "'. $_GET['category'] .'"';
                        $sql_count = 'select count(*) from artist where artist_featured = "false" and artist_category = "'. $_GET['category'] .'"';
                    }
                    else {
                        $sql = 'select * from artist where artist_featured = "false"';
                        $sql_count = 'select count(*) from artist where artist_featured = "false"';
                    }

                    // select everything but featured artist
                    $select = $dat->query($sql);
                    $result = $select->fetchAll(PDO::FETCH_ASSOC);

                    // get number of artists for pagination
                    $selectLen = $dat->query($sql_count);
                    while($length = $selectLen->fetch()){
                        $myLength =  $length[0];
                    }

                    $count = 1;
                    $i = 0;
                    $pageNumber = 1;

                    if(isset($_GET['page'])){
                        $pageNumber = $_GET['page'];
                    }

                    $countAll = ($pageNumber * 9) - 9;
                    for($i = ($pageNumber * 9) - 9; $i < $pageNumber * 9; $i++) {

                        if ($countAll < $myLength) {
                            $countAll += 1;

                            // open div row
                            if ($count == 1) {
                                echo '<div class="row">';
                            }

                            echo '<div class="col third block">';
                            echo '<a href="artistDetail.php?artist_id=' . $result[$i]["artist_id"] . '"><img src="' . $result[$i]['artist_photo'] . '">';
                            echo '<h3>' . $result[$i]["artist_name"] . '</h3></a>';
                            echo '<p><strong>' . $result[$i]["artist_genre"] . '</strong></p>';
                            echo '<p>' . substr($result[$i]["artist_info"], 0, 299) . '...<br />';
                            echo '<a href="artistDetail.php?artist_id=' . $result[$i]["artist_id"] . '">More Info</a></p>';
                            echo '</div>';

                            // close div row
                            if ($count == 3) {
                                echo '</div>';
                                $count = 0;
                            }

                            $count += 1;
                        }
                    }

                    // close div row if didn't before
                    if ($count != 1) {
                        echo '</div>';
                    }

                    $pageNumber+=1;

                    echo '<hr><div class="row"><div class="col">';
                    // add back button
                    if($pageNumber > 2){
                        $backNumber = $pageNumber - 2;
                        echo '<a href="artists.php?page='.$backNumber.'" class="leftButton"><button>Back</button></a>';
                    }

                    // next button
                    if($countAll < $myLength){
                        echo '<a href="artists.php?page='. $pageNumber .'" class="rightButton"><button>Next</button></a>';
                    }
                    echo '</div></div>';

                    ?>

            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
<?php include("footer.php"); ?>