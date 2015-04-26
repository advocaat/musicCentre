

<div id="editBand">

<fieldset>
<form method="POST" action="bandEditPanel.php">
<p>
<input type="hidden" name="artist_id" value="<?php echo $result['artist_id'] ?>">
<label for="artist_name">Band Name</label>
<input type="text" cols=30 name="artist_name" value="<?php echo $result['artist_name'] ?>">
</p><p>
<label for="artist_category">Band Category</label>
<input type="text" cols=30 name="artist_category" value="<?php echo $result['artist_category']?> ">
</p><p>
<label for="artist_genre">Band Genre</label>
<input type="text" cols=30 name="artist_genre" value="<?php echo $result['artist_genre']?>">
</p><p>
<label for="artist_info">Band Bio</label>
<input type="text" cols=30 name="artist_info" value="<?php echo $result['artist_info'] ?> ">
</p><p>
<label for="artist_phone">Phone Contact</label>
<input type="text" cols=30 name="artist_phone" value="<?php echo $result['artist_phone'] ?>">
</p><p>
<label for="artist_email">Email Contact</label>
<input type="text" cols=30 name="artist_email" value=" <?php echo $result['artist_email']?>">
</p><p>
<label for="artist_website">Bands Website http://www. </label>
<input type="text" cols=30 name="artist_website" value="<?php echo $result['artist_website'] ?>">.com
</p><p>
<label for="artist_photo">Band Photo</label>
<input type="text" cols=30 name="artist_photo" value="<?php echo $result['artist_photo'] ?>">
</p><p>
<input type="hidden" name="artist_featured" value="<?php echo $result['artist_featured'] ?>">

<label for="artist_contact">Contact Me By:</label>
    <select name="artist_contact">
        <option name="artist_contact" value="true">Band email account</option>
        <option name="artist_contact" value="false">My own email account</option>
    </select>


<input type="hidden" name="user_id" value="<?php echo $result['user_id']?>">
<input type="hidden" name="table" value="artist">

</p><p>
    <button type="submit" name="submit_edit" value="confirm">Done</button>
</p>
</form>

</fieldset>


</div>
<?php

if(isset($_REQUEST['submit_edit'])){

include("connectdb.php");

if($_REQUEST['submit_edit'] == 'confirm'){

     $index = key($_REQUEST);

        // slice unnecessary data from $_REQUEST
     foreach (array_slice($_REQUEST, 0, count($_REQUEST) -1) as $value) {
     $result = $dat->exec('update ' . $_REQUEST['table']. ' set ' . key($_REQUEST) . ' = "' . $value . '" where ' . $index . ' is ' . $_REQUEST[$index]);
     next($_REQUEST);
     }



        header('Location:index.php?update');







    }


}


?>