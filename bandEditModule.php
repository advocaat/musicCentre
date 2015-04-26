<?php

if(!isset($_SESSION['userLoggedIn'])){
    header("Location: noPermit.php");
}


include("connectdb.php");

?>

    <fieldset>
        <form method="POST" action="bandEditModule.php">
            <label for="artist_name">Enter the bands name you wish to edit:</label>
           <input  type="text" name="artist_name" value="eg: My Band Name">


            <label  for="user_password">User Password</label>
            <input type="password" id="user_password" name="user_password" value="">

            <button type="submit" name="submit_bandEdit" value="edit">Edit Band</button>

        </form>
    </fieldset>


<?php

if(isset($_REQUEST['submit_bandEdit'])){

if($_REQUEST['submit_bandEdit'] = 'edit'){


    $select = $dat->query('select * from artist natural join user where artist_name = "'. $_REQUEST['artist_name'] . '" and user_pass = "'. md5($_REQUEST['user_password']) . '" limit 1');
    $result = $select->fetch(PDO::FETCH_ASSOC);
    if(BOOLVAL($result)){
        echo "Editing: " . $result['artist_name'];
            include("bandEditPanel.php");
             }

    else{
        echo "<em>Mismatched combination</m>";


    }


}

}
if(isset($_REQUEST['error'])){
  if($_REQUEST['error'] == 'update'){
    echo "<p>Update Error</p>";
  }

}








?>