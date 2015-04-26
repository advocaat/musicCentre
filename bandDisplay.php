<?php

include("connectdb.php");

$sql = "select * from artist";
$select = $dat->query($sql);

$result = $select->fetchAll(PDO::FETCH_ASSOC);


foreach($result as $row){






        $name =$row["artist_name"] ;
       $cat = $row["artist_category"];
       $genre = $row["artist_genre"];
       $info = $row["artist_info"];
       $phone = $row["artist_phone"];
       $email = $row["artist_email"];
       $website = "http://www.". str_replace('www.','', $row['artist_website']);
       $website = str_replace('.com', '', $website) . ".com";



       $photo = $row['artist_photo'];
       $featured = $row['artist_featured'];


echo '<div id="display" width="200" height="200" style="border:1px solid #655876">';
echo '<h3>'.$name.'</h3>';
echo '<a href="index.php"><img src="' . $photo .'" width="100" height="100" class="photo" ></a>';
echo '<p><em>Genre:</em> '.$genre.'<p>';
echo'<p><em>About us: </em>'.$info.'</p>';
if(filter_var($website, FILTER_VALIDATE_URL)){
echo '<p><em>Find out more at:<a href="'. $website.'">'. $website.'</a></em></p>';
}
echo'<p><em>Ring us up: </em>'.$phone.'</p>';
echo'<p><em>Send fan-mail to: </em>'.$email.'</p>';

echo "</div>";






}



?>
