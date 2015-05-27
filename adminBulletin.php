<?php include("header.php"); ?>
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
                    }

                    include("connectdb.php");

                    // select all bulletins
                    $today = date('Y-m-d');
                    $lastmonth = date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"),   date("Y")));

                    $select = $dat->query('select * from bulletin order by bulletin_id desc');
                    $bulletins = $select->fetchAll(PDO::FETCH_ASSOC);

                    echo '<div class="blockMy"><h1>Edit Bulletins</h1>';
                    echo '<hr>';

                    // if no bulletins
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
                        echo '<td><a href="adminBulletin.php?bulletin_id='. $row['bulletin_id'] .'"><button>Edit</button></a></td>';
                        echo '</tr>';
                    }
                    echo '</table></div><hr>';

                // wrap the  form in a div so we have an anchor to link to
                echo '<div id="edit">';

                    // if editing, display correct text
                    if (isset($_GET['bulletin_id'])){
                        echo '<h1>Edit Bulletin</h1>';
                    }
                    else {
                        echo '<h1>Add New Bulletin</h1>';
                    } ?>

                    <form method="post" action="processBulletin.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col half">
                                    <input type="hidden" name="bulletin_date" id="bulletin_date" value="2015-01-01">
                                    <label for="bulletin_title">Title</label>
                                    <input name="bulletin_title" id="bulletin_title" required>
                                    <label for="bulletin_info">Information</label>
                                    <textarea rows="11" name="bulletin_info" id="bulletin_info"></textarea>
                                    <label for="bulletin_photo">Photo</label>
                                    <input type="file" name="bulletin_photo" id ="bulletin_photo" value="/images/default.gif">
                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"
                            </div>
                            </div>
                            <div class="col half">
                                    <img src="images/default.gif" id="display_photo" width="100%">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <button type="submit" name="submit" id="submit" value="new">Submit</button>
                                <?php if (isset($_GET['bulletin_id'])) {
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
        echo 'document.getElementById("display_photo").src="' . $result['bulletin_photo'] . '";';

        // set user_id correctly so we don't overwrite it with our own
        echo 'document.getElementById("user_id").value="' . $result['user_id'] . '";';
        echo '</script>';

        // set artist_id as session variable, we'll need it for processing
        $_SESSION['bulletin_id'] = $_GET['bulletin_id'];

    } else {

        // if not editing, set date to todays date by default
        echo '<script>var today = new Date();var dd = today.getDate();var mm = today.getMonth()+1;var yyyy = today.getFullYear();';
        echo 'if(dd<10){dd="0"+dd} if(mm<10){mm="0"+mm} var today = yyyy+"-"+mm+"-"+dd;';
        echo 'document.getElementById("bulletin_date").value = today</script>';
    }

include("footer.php"); ?>