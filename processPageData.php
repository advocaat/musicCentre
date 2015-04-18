<?php
//includes connect
include("connectdb.php");
$debugOn = true;
echo $_REQUEST['pageOption'];

if($_REQUEST['pageOption'] == "bulletin" ){
	$sql = "SELECT * FROM bulletin_posts";

    }
elseif($_REQUEST['pageOption'] == "events" ){
	$sql = "SELECT * FROM event_data";
	}
elseif($_REQUEST['pageOption'] == "bands" ){
	$sql = "SELECT * FROM artist_data";

	}
elseif($_REQUEST['pageOption'] == "users" ){

	$sql = "SELECT * FROM user_data";

	}
elseif($_REQUEST['pageOption'] == "page" ){
	$sql = "SELECT * FROM page_data";

    }

   if($result = $dat->exec($sql)){
            header("Location: backend.php");
        	echo "<pre>";

        	   $rows = $result->fetchall(PDO::FETCH_ASSOC);

        	echo count($rows) . "records in the table<br />\n";
            print_r($rows);
        	echo "</pre>";


        	}

/*	else}
		// set message to be printed on appropriate (results) page
*/

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Database Testing</title>
</head>
<body>

    <div id="header">
        <?php
            echo "<h1>Townsville Music Centre</h1>";
        ?>
        <div id="nav">
            <?php
                echo "<ul><li><a href='index.php'>Home</a></li><li><a href='backend.php'>Here</a></li><li><a href='processPageData.php'>There</a></li></ul>";
            ?>
        </div>
    </div>
    <div id="mainbody">
        <?php
         echo "<h2>PanelSelect</h2>";
        ?>
        //working
        <?php
            echo "<pre>";
                print_r($_REQUEST);
            echo "</pre>";



            if ($_REQUEST['submit'] == "Edit" && $_REQUEST['actions'] == "viewitems"){
                   echo "<h2>heer</h2>";
                $sql = "SELECT * FROM user_data";

                if($res = $dat->query($sql)){
                        $rows = $res->fetchall(PDO::FETCH_ASSOC);
                        echo "<pre>";
                           foreach($rows as $row){

                        echo "<h2>" . $row['user_name'] .  "</h2>";

                            }
                        echo    "</pre>";
                    }

            }
             elseif($_REQUEST['submit'] == "Edit" && $_REQUEST['actions'] == "additem"){
                $field = $_REQUEST['pageOption'];

                    switch($field){
                        case("bulletin"):
                             $field_db = "bulletin_posts";
                             break;
                        case("events"):
                             $field_db =  "event_data";
                             break;
                        case("bands"):
                             $field_db =  "artist_data";
                             break;
                        case("users"):
                            $field_db =  "user_data";
                            break;
                        case("page"):
                            $field_db =  "page_data";
                            break;
                        }


                echo "<label for='item'>"  . $field.  "</label>";
                echo "<input type='text' id='item' name='item'>";


                $sql = "SELECT * FROM " . $field_db;



                if($res = $dat->query($sql)){
                    $rows = $res->fetchall(PDO::FETCH_ASSOC);
                     echo "<pre>";
                     foreach($rows as $row){
                         if($field_db == 'bulletin_posts'){
                         echo "<p>" . $row['post_id'] .  "</p>";
                         echo "<p>" . $row['user_name'] .  "</p>";
                         echo "<p>" . $row['user_id'] .  "</p>";
                         echo "<p>" . $row['post_content'] .  "</p>";
                        }
                        elseif($field_db == 'event_data'){
                            echo "<p>" . $row['event_id'] .  "</p>";
                            echo "<p>" . $row['event_name'] .  "</p>";
                            echo "<p>" . $row['event_desc'] .  "</p>";
                            echo "<p>" . $row['event_location'] .  "</p>";
                            echo "<p>" . $row['event_dateTime'] .  "</p>";
                            echo "<p>" . $row['event_photo'] .  "</p>";
                            echo "<p>" . $row['event_logo'] .  "</p>";
                            echo "<p>" . $row['artist_id'] .  "</p>";
                        }
                        elseif($field_db == 'artist_data'){
                                echo "<p>" . $row['artist_name'] .  "</p>";
                                 echo "<p>" . $row['artist_bio'] .  "</p>";
                                  echo "<p>" . $row['artist_contact'] .  "</p>";
                                   echo "<p>" . $row['artist_photo'] .  "</p>";
                                    echo "<p>" . $row['artist_logo'] .  "</p>";
                        }
                        elseif($field_db == 'user_data'){
                             echo "<p>" . $row['user_name'] .  "</p>";
                              echo "<p>" . $row['user_id'] .  "</p>";
                               echo "<p>" . $row['user_access_level'] .  "</p>";
                                echo "<p>" . $row['band_id'] .  "</p>";
                                 echo "<p>" . $row['band_name'] .  "</p>";
                                  echo "<p>" . $row['user_photo'] .  "</p>";
                         }
                         elseif($field_db == 'page_data'){
                                echo "<p>" . $row['page_title'] .  "</p>";
                                 echo "<p>" . $row['page_id'] .  "</p>";
                                  echo "<p>" . $row['page_main_content'] .  "</p>";
                                                 }

                         echo    "</pre>";
                        }



                     }else{
                     echo "it fucked itself";


                        }
}

                     ?>

    </div>
    <div id="footer">
        <?php
            echo "<blockquote><>Townsville Community Music Center - 2015 &#169;</blockquote>";
        ?>
    </div>

</body>
</html>