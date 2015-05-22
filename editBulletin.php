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
                    }

                    include("connectdb.php");
                    $select = $dat->query('select * from bulletin where user_id = "'. $_SESSION['user_id'] .'"');
                    $bulletins = $select->fetchAll(PDO::FETCH_ASSOC);

                    // if no bulletins
                    echo '<div class="artistMy"><h2>My Bulletins</h2>';
                    if(empty($bulletins)){
                        echo '<em>You haven\'t created any bulletins yet!</em>';
                    }

                    // build table of existing bulletins
                    echo '<table>';
                    foreach ($bulletins as $row){
                        echo '<tr>';
                        echo '<td><img src="'. $row['bulletin_photo'] .'"></td>';
                        echo '<td><strong>'. $row['bulletin_title'] .'</strong></td>';
                        echo '<td>'. $row['bulletin_date'] .'</td>';
                        echo '<td>'. substr($row["bulletin_info"], 0, 29) .'...' .'</td>';
                        echo '<td><a href="editBulletin.php?bulletin_id='. $row['bulletin_id'] .'"><button>Edit</button></a></td>';
                        echo '</tr>';
                    }
                    echo '</table></div>';

                    // if editing, display correct text
                    if (isset($_GET['bulletin_id'])){
                        echo '<h2>Edit Bulletin</h2>';
                    }
                    else {
                        echo '<h2>Add New Bulletin</h2>';
                    } ?>

                    <form method="post" action="processBulletin.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col half">
                                <p>
                                    <label for="bulletin_date">Date To Post</label>
                                    <input type="date" name="bulletin_date" id="bulletin_date">
                                    <label for="bulletin_title">Title</label>
                                    <input name="bulletin_title" id="bulletin_title">
                                    <label for="bulletin_info">Information</label>
                                    <textarea rows="5" name="bulletin_info" id="bulletin_info"></textarea>

                                    <label for="bulletin_photo">Photo</label>
                                    <input type="file" name="bulletin_photo" id ="bulletin_photo">

                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                <p>
                                    <button type="submit" name="submit" id="submit" value="new">Submit</button>

                                    <?php if (isset($_GET['bulletin_id'])) {
                                        // if editing add a delete button
                                        echo '<button type="submit" name="submit" id="submit" value="delete">Delete</button>';
                                    } ?>

                                </p>

                                </p>
                            </div>
                            <div class="col half">
                                <p>
                                    <img src="images/default.gif" id="display_photo" width="100%">
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">


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
    if (isset($_GET['bulletin_id'])) {

        // get artist details
        include("connectdb.php");
        $select = $dat->query('select * from bulletin where bulletin_id = "' . $_GET['bulletin_id'] . '"');
        $result = $select->fetch(PDO::FETCH_ASSOC);

        // use javascript to update the values of fields
        echo '<script type="text/javascript">';
        foreach (array_slice($result, 1, 3) as $i => $value) {
            echo 'document.getElementById("' . $i . '").value = "' . $value . '";';
            next($result);
        }

        // switch submit value to update to enable correct processing
        echo 'document.getElementById("submit").value = "update";';

        // display photo from database
        echo 'document.getElementById("display_photo").src="' . $result['bulletin_photo'] . '";';
        echo '</script>';

        // set artist_id as session variable, we'll need it for processing
        $_SESSION['bulletin_id'] = $_GET['bulletin_id'];
    } else {

        // if not editing, set date to todays date by default
        echo '<script>document.getElementById("bulletin_date").value = Date();</script>';
    }

include("footer.php"); ?>