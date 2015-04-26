<?php include('connectdb.php');?>




<?php
      if(!isset($_SESSION['userLoggedIn'])){

            header("Location: sorry.php");
        }
?>

<?php

if(isset($_REQUEST['submit'])){
    if($_REQUEST['submit'] == 'reg_band'){


        $fields = array();
        $values = array();

        // skip index key
        next($_REQUEST);

        // add keys and values to the arrays
        foreach (array_slice($_REQUEST, 1, count($_REQUEST) - 3) as $value){


            array_push($fields, key($_REQUEST));
            array_push($values, $value);
            next($_REQUEST);
        }

        // implode arrays to build and execute insert query
        $sql = 'insert into ' . $_REQUEST['table'] . ' ';
        $sql .= '(' . implode(', ', $fields) . ') ';
        $sql .= 'values ("' . implode('", "', $values) . '")';
        $dat->exec($sql);

        // return to homepage on successful registration
        header('Location: index.php');
    }
}

?>











        <h1>Band Registration</h1>
        <fieldset>
            <legend>Register an Act</legend>


            <form method='POST' action='registerBandModule.php'>

            <input type="hidden" name="artist_id" value="">

            <p>
            <label for="artist_name">Band name</label>
            <input type="text" name="artist_name"  id="artist_name">
            </p><p>
            <label for="artist_category">Band category</label>
            <input type="text" name="artist_category"  id="artist_category">
            </p><p>
            <label for="artist_genre">Band genre</label>
            <input type="text" name="artist_genre"  id="artist_genre">
            </p><p>
             <label for="artist_info">Band bio</label>
             <textarea id="artist_info" name="artist_info" rows="7" cols="20" ></textarea>
         <!--   /* leave this for now
            <input type="button" name="addGenre" id="addGenre" value="Add a Genre" onClick="addField();">

             <script>
                    var count = -1;
                    var suffix;
                    var addField = function(){
                        if(count < 5){
                        count+=1;
                        var field = document.createElement("input");
                        var fieldId = "addGenre" + count;
                        field.id=fieldId;
                        field.type="text";
                        field.display="block";
                        switch(count+1){
                         case 1:
                            suffix = 'st ';
                            break;

                        case 2:
                            suffix = 'nd ';
                            break;

                        case 3:
                            suffix = 'rd ';
                            break;
                        case 6:
                            suffix= "Last Genre";
                            break;

                         default:
                            suffix = 'th ';
                        }
                        field.display="block";
                        var padding = document.createElement("p");

                        field.value = count+1 + suffix + "Genre";
                        if(count === 5){
                             field.value = suffix;
                        }

                        var here = document.getElementById('addHere');
                        here.insertBefore(padding, document.body.childNodes[1]);
                        here.insertBefore(field, document.body.childNodes[1]);
                        }

                    }

            </p><p>
            <div id="addHere">

            </div>

             </script> */ -->
            </p><p>
            <label for="artist_phone">Band phone contact</label>
            <input type="text" name="artist_phone"  id="artist_phone">
            </p><p>
            <label for="artist_email">Band email</label>
             <input type="text" name="artist_email"  id="artist_email">
            </p><p>
            <label for="artist_website">Band website: http://www.</label>
            <input type="text" name="artist_website"  id="artist_website">.com
            </p><p>
            <label for="artist_photo">Band photo</label>
            <input type="text" name="artist_photo"  id="artist_photo">
            </p>

                <input type="hidden" name="artist_featured" value="false">

                <p>


            <input type="radio" name="artist_contact"  id="this_email" checked="checked" value="artistEmail">
            <label for="artist_contact">Use this email for notices</label>
            </p>
                <p>
            <input type="radio" name="artist_contact"  id="that_email" value="userEmail">
            <label for="artist_contact">Use my user email for notices</label>
            </p>


                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" name="table" value="artist">

                <p>

                    <button type='submit' name='submit' value='reg_band'>Register Band</button>
            </p>



            </form>
        </fieldset>




