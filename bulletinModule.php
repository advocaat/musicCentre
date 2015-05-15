<?php

include('connectdb.php');
$results = $dat->query("select * from bulletin");


foreach($results as $result){
     $date = $result['bulletin_date'];
     $title = $result['bulletin_title'];
     $info = $result['bulletin_info'];
     $photo = $result['bulletin_photo'];


echo '<div class="BulletinItem">';

echo '<img src="images/'. $photo.'"max-width="200px" max-height="140px;"  alt="'.$title.'"/>';
echo '<h2>'.$title.'</h2>';

echo '<p>'.$info.'</p>';
echo '<p>Posted '.$date.'</p>';


echo '</div>';
}

?>