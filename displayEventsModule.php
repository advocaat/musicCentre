<?php include("connectdb.php");

// )"
$results = $dat->query("select * from event left join artist on artist.artist_id = event.artist_id ");


foreach($results as $result){

    $id = $result['event_id'];
    $date = $result['event_date'];
    $name = $result['event_name'];
    $info = $result['event_info'];
    $tickets = $result['event_tickets'];
    $concess = $result['concession_tickets'];
    $tagline = $result['event_tagline'];
    $ticketsLink = $result['event_ticket_link'];
    $photo = $result['event_photo'];
    $artist = $result['artist_name'];
    echo  	'<div class="event">';
    echo   '<img src="images/'. $photo .'" class="eventImage alt="'.$name.'" >';
    echo   '<table class="eventInfo">';
    echo   '<thead>';
    echo   '<tr>';
    echo   '<th colspan="2"><a href="#">'.$name.'</a></th>';
    echo   '</tr>';
    echo    '</thead>';
    echo    '<tbody>';
    echo    '<tr>';
    echo    '<th>When:</th>';
    echo    '<td>' .$date . '</td>';
    echo     '</tr>';
    echo    '<tr>';
    echo    '<th>Where:</th>';
    echo    '<td>C2 Civic Theatre</td>';
    echo    '</tr>';
    echo    '<tr>';
    echo    '<th>Tickets:</th>';
    echo    '<td>Adults: $'. $tickets . '<br>Concession: $' . $concess ;
    echo    '</tr>';
    echo    '</tbody>';
    echo    '<tfoot>';

    echo   '</tfoot>';
    echo   '</table>';
    echo   '<table class="eventAbout">';
    echo   '<tr>';
    echo   '<th>'.$tagline.':</th>';
    echo   '<td colspan="">'.$info .' </td>';
    echo   '</tr>';
        echo    '<tr>';
        echo    '<td colspan="2"><a href="'. $ticketsLink .'"><img src="images/ticketshop.png" alt="tickets"></a></td>';
        echo    '</tr>';
    echo   '</table>';
    echo   '</div>';


}

?>