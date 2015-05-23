<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide">

                <?php if(!isset($_SESSION['userLoggedIn']) || $_SESSION['user_status'] < 1){
                    include('moduleNoAccess.php');
                } else {

                    // display any errors
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == '0') {
                            echo '<em class="success">Process completed successfully.</em>';
                        }
                        if ($_GET['error'] == '1') {
                            echo '<em class="error">Error in photo file.</em>';
                        }
                        if ($_GET['error'] == '2') {
                            echo '<em class="error">Photo wrong file type.</em>';
                        }
                        if ($_GET['error'] == '3') {
                            echo '<em class="error">Email is not valid.</em>';
                        }
                    }

                    include("connectdb.php");
                    $select = $dat->query('select * from artist where user_id = "'. $_SESSION['user_id'] .'"');
                    $artists = $select->fetchAll(PDO::FETCH_ASSOC);

                    // if no artists
                    echo '<div class="artistMy"><h2>My Artists</h2>';
                    if(empty($artists)){
                        echo '<em>You haven\'t created any artists yet!</em>';
                    }

                    // build table of existing artists
                    echo '<table>';
                    foreach ($artists as $row){
                        echo '<tr>';
                        echo '<td><img src="'. $row['artist_photo'] .'"></td>';
                        echo '<td><strong>'. $row['artist_name'] .'</strong></td>';
                        echo '<td>'. $row['artist_genre'] .'</td>';
                        echo '<td>'. substr($row["artist_info"], 0, 29) .'...' .'</td>';
                        echo '<td><a href="editArtist.php?artist_id='. $row['artist_id'] .'"><button>Edit</button></a></td>';
                        echo '</tr>';
                    }
                    echo '</table></div>';

                    // if editing, display correct text
                    if (isset($_GET['artist_id'])){
                        echo '<h2>Edit Artist</h2>';
                    }
                    else {
                        echo '<h2>Add New Artist</h2>';
                    } ?>

                    <form method="post" action="processArtist.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col half">
                                    <label for="artist_name">Artist Name</label>
                                    <input name="artist_name" id="artist_name">
                                    <label for="artist_category">Category</label>
                                    <select name="artist_category" id="artist_category">
                               <?php


                                 $select = $dat->query('select category from settings');
                                  $options = $select->fetchAll(PDO::FETCH_ASSOC);
                                     foreach($options as $option){
                                     echo "<option>" . $option['category'] .  "</option>";
                                    }
                                                      ?>

                                    </select>
                                    <label for="artist_genre">Genre</label>
                                    <input name="artist_genre" id="artist_genre">
                            </div>
                            <div class="col half">
                                    <label for="artist_phone">Phone Number</label>
                                    <input name="artist_phone" id="artist_phone">
                                    <label for="artist_email">Email Address</label>
                                    <input name="artist_email" id="artist_email">
                                    <label for="artist_website">Website URL</label>
                                    <input name="artist_website" id="artist_website">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col half">
                                <label for="artist_info">Information & Biography</label>
                                <textarea rows="16" name="artist_info" id="artist_info"></textarea>
                            </div>
                            <div class="col half">
                                <label for="artist_photo">Photo</label>
                                <input type="file" name="artist_photo" id ="artist_photo">
                                <img src="images/default.gif" id="display_photo" width="100%">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <!-- set default new artist status -->
                                <input type="hidden" name="artist_featured" value="false">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                <p>
                                    <button type="submit" name="submit" id="submit" value="new">Submit</button>

                                    <?php if (isset($_GET['artist_id'])) {
                                        // if editing add a delete button
                                        echo '<button type="submit" name="submit" id="submit" value="delete">Delete</button>';
                                    } ?>
                                </p>
                            </div>
                        </div>
                    </form>

                <?php } ?>
            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
    </div>
<?php

    // if editing artist details, populate fields
    if (isset($_GET['artist_id'])) {

        // get artist details
        include("connectdb.php");
        $select = $dat->query('select * from artist where artist_id = "' . $_GET['artist_id'] . '"');
        $result = $select->fetch(PDO::FETCH_ASSOC);

        // use javascript to update the values of fields
        echo '<script type="text/javascript">';
        foreach (array_slice($result, 1, 7) as $i => $value) {

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
        echo 'document.getElementById("display_photo").src="' . $result['artist_photo'] . '";';
        echo '</script>';

        // set artist_id as session variable, we'll need it for processing
        $_SESSION['artist_id'] = $_GET['artist_id'];
    }

include("footer.php"); ?>