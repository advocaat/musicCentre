<!-- Admin Module -->

<fieldset>
    <legend><h3>Database Administration</h3></legend>
    <form action="test.php" method="POST">
        <select name="pageOption" id="pageOption">
        <option value="artist">Artists</option>
        <option value="bulletin">Bulletins</option>
        <option value="event">Events</option>
        <option value="user">Users</option>
        </select>
        <button type="submit" value="load">Load Table</button>
    </form>
    
    <!-- if pageOption is not already set -->
    <?php if (!isset($_REQUEST['pageOption'])) {
        echo '<p><em>Select a table to edit.</em></p>';
    }
    else {
                        
        // upadte pageOption to reflect table to be loaded
        echo '<script>document.getElementById("pageOption").value = "' . $_REQUEST["pageOption"] . '"</script>';
        
        // selects whole table
        $table = $dat->query('select * from ' . $_REQUEST['pageOption']);

        // fetch and limit by associated columns
        $result = $table->fetchAll(PDO::FETCH_ASSOC);

        // create a table and tr for each record
        echo '<table>';
        foreach ($result as $row) {   
            echo '<tr><form action="editRecord.php" method "POST">';
            
            // create headers from column names first
            if (empty($columns)) {
                echo '<tr>';
                $columns = array_keys($row);
                foreach ($columns as $each)
                    echo '<th>' . $each . '</th>';
                echo '</tr>';
            }
            
            // create an input field for each value in each row
            foreach ($row as $i => $each) {
                echo '<td><input name="' . $i . '" value="' . $each . '"></input></td>';
            }
            
            // save name of the table as hidden property for easy editing
            echo '<input type="hidden" name="table" value="' . $_REQUEST['pageOption'] . '"></input>';
            
            // value of only one button will be sent for processing
            echo '<td><button type="submit" name="submit" value="delete">Delete</button>';
            echo '<button type="submit" name="submit" value="update">Update</button></td>';
            echo '</form>';
            echo '</tr>';
        }
    }?>   
</fieldset>