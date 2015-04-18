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

        // create an input field for each value in each row
        foreach ($result as $row) {
            foreach ($row as $item) {
                echo '<input value="' . $item . '"></input> ';
            }

            echo "<br />";
        }
    }?>   
</fieldset>