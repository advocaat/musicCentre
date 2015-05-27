<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide">

                <?php if(!isset($_SESSION['userLoggedIn']) || $_SESSION['user_status'] !== '2'){
                    include('moduleNoAccess.php');
                } else {

                    // display any errors
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == '0') {
                            echo '<p class="success">Process completed successfully.</p>';
                        }
                        if ($_GET['error'] == '1') {
                            echo '<p class="error">Error in photo file.</p>';
                        }
                        if ($_GET['error'] == '2') {
                            echo '<p class="error">Photo wrong file type.</p>';
                        }
                        if ($_GET['error'] == '3') {
                            echo '<p class="error">Email is not valid.</p>';
                        }
                    }

                    include("connectdb.php");
                    $select = $dat->query('select * from artist');
                    $artists = $select->fetchAll(PDO::FETCH_ASSOC);
                    $select = $dat->query('select * from settings');
                    $settings = $select->fetch(PDO::FETCH_ASSOC);
                    ?>

                    <div class="blockMy">
                        <h1>Edit Artists</h1>
                        <hr>
                        <form method="post" action="processSettings.php" class="row">
                            <div class="col twothird">
                                <label for="artist_categories">Artist Categories (comma separated):</label>
                                <input id="artist_categories" name="artist_categories" value="<?php echo $settings['artist_categories'] ?>">
                            </div>
                            <div class="col narrow">
                                <label for="artist_featured">Featured Artist:</label>
                                <select id="artist_featured" name="artist_featured">
                                    <?php
                                    // get artist names
                                    foreach ($artists as $row) {
                                        // automatically select current featured artist
                                        if ($row['artist_featured'] == 'true') {
                                            echo '<option selected>'. $row['artist_name'] .'</option>';
                                            continue;
                                        }
                                        echo '<option>'. $row['artist_name'] .'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="submit" name="submit" value="artist" style="float:right;margin: 1.5em 1.5em .5em 0;">Save</button>
                        </form>
                        <hr>

                    <?php

                    // if no artists
                    if(empty($artists)){
                        echo '<em>You haven\'t created any artists yet!</em>';
                    }

                    // build table of existing artists
                    echo '<table>';
                    foreach ($artists as $row){
                        echo '<tr>';
                        echo '<td><img src="'. $row['artist_photo'] .'"></td>';
                        echo '<td><strong>'. $row['artist_name'] .'</strong></td>';
                        echo '<td>'. substr($row["artist_info"], 0, 49) .'...' .'</td>';
                        echo '<td><a href="adminArtist.php?artist_id='. $row['artist_id'] .'#edit"><button>Edit</button></a></td>';
                        echo '</tr>';
                    }
                    echo '</table></div><hr>';

                    // wrap the  form in a div so we have an anchor to link to
                    echo '<div id="edit">';

                    // if editing, display correct text
                    if (isset($_GET['artist_id'])){
                        echo '<h1>Edit Artist</h1>';
                    }
                    else {
                        echo '<h1>Add New Artist</h1>';
                    } ?>

                    <form method="post" action="processArtist.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col half">
                                    <label for="artist_name">Artist Name</label>
                                    <input name="artist_name" id="artist_name" required>
                                    <label for="artist_category">Category</label>
                                    <select name="artist_category" id="artist_category">
                                        <?php
                                        // get artist categories from database
                                        $select = $dat->query('select * from settings');
                                        $list = $select->fetch(PDO::FETCH_ASSOC);
                                        $options = explode(',', $list['artist_categories']);
                                        foreach($options as $option){
                                            echo '<option>' . $option .'</option>';
                                        } ?>
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
                                <textarea rows="19" name="artist_info" id="artist_info"></textarea>
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
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                <hr>
                                <button type="submit" name="submit" id="submit" value="new">Submit</button>
                                <?php if (isset($_GET['artist_id'])) {
                                    // if editing add a delete button
                                    echo '<button type="submit" name="submit" id="submit" value="delete">Delete</button>';
                                } ?>
                            </div>
                        </div>
                    </form>
                    </div>
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

        // set user_id correctly so we don't overwrite it with our own
        echo 'document.getElementById("user_id").value="' . $result['user_id'] . '";';
        echo '</script>';

        // set artist_id as session variable, we'll need it for processing
        $_SESSION['artist_id'] = $_GET['artist_id'];
    }

include("footer.php"); ?>