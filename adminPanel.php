<!-- Admin Module -->

<fieldset>
    <legend><h3>Database Administration</h3></legend>
    <form action="test.php" method="POST">
        <select name="pageOption">
        <option value="artist">Artists</option>
        <option value="bulletin">Bulletins</option>
        <option value="event">Events</option>
        <option value="user">Users</option>
        </select>
        <button type="submit" value="load">Load Table</button>
    </form>
    
    
    <!-- if pageOption is not already set -->
    <?php if (!isset($_POST["pageOption"])) {
        echo "<p><em>Select a table to edit.</em></p>";
    }
    else {

        // selects whole table
        $table = $dat->query("select * from " . $_REQUEST["pageOption"]);

        // fetch and limit by associated columns
        $result = $table->fetchAll(PDO::FETCH_ASSOC);   

        //create new form for each row to handle update and delete 
        foreach ($result as $row) {   
            echo '<p><form action="editRecord.php" method "POST">';            
            
            // create an input field for each value in each row
            foreach ($row as $i => $item) {
                echo '<input name="' . $i . '" value="' . $item . '"></input> ';
            }
            
            // save name of the table as hidden property for easy editing
            echo '<input type="hidden" name="table" value="' . $_REQUEST["pageOption"] . '"></input>';
            
            // value of only one button will be sent for processing
            echo '<button type="submit" name="submit" value="delete">Delete</button>';
            echo '<button type="submit" name="submit" value="update">Update</button>';
            echo '</form>';
            echo "</p>";
        }
    }?>   
</fieldset>