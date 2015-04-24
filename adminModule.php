<!-- Database Admin Module -->

<?php if (isset($_REQUEST['submit'])) {

    // delete record
    if ($_REQUEST['submit'] == 'delete') {

        // set first item in array to be index
        $index = key($_REQUEST);
        $dat->exec('delete from ' . $_REQUEST['table']. ' where ' . $index . ' is ' . $_REQUEST[$index]);

        // return to admin page and display updated table
        header('Location: admin.php?pageOption='. $_REQUEST['table']);
    }

    // update record
    else if ($_REQUEST['submit'] == 'update') {

        // set first item in array to be index
        $index = key($_REQUEST);

        // slice unnecessary data from $_REQUEST
        foreach (array_slice($_REQUEST, 0, count($_REQUEST) -2) as $value) {
            $dat->exec('update ' . $_REQUEST['table']. ' set ' . key($_REQUEST) . ' = "' . $value . '" where ' . $index . ' is ' . $_REQUEST[$index]);
            next($_REQUEST);
        }

        // return to admin page and display updated table
        header('Location: admin.php?pageOption='. $_REQUEST['table']);
    }

    // add new record
    else if ($_REQUEST['submit'] == 'add') {

        $fields = array();
        $values = array();

        // add keys and values to the arrays
        foreach (array_slice($_REQUEST, 0, count($_REQUEST) -2) as $value) {
            array_push($fields, key($_REQUEST));
            array_push($values, $value);
            next($_REQUEST);
        }

        // implode arrays to build and execute insert query
        $sql = 'insert into ' . $_REQUEST['table'] . ' ';
        $sql .= '(' . implode(', ', $fields) . ') ';
        $sql .= 'values ("' . implode('", "', $values) . '")';
        $dat->exec($sql);

        // return to admin page and display updated table
        header('Location: admin.php?pageOption='. $_REQUEST['table']);
    }
}
else { ?>
    <fieldset>
        <legend>Database Administration</legend>
        <form action="admin.php" method="POST">
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
        } else {

            // upadte pageOption to reflect table to be loaded
            echo '<script>document.getElementById("pageOption").value = "' . $_REQUEST["pageOption"] . '"</script>';

            echo '<table>';

            // use pragma to fetch column names, even if table is empty
            $table = $dat->query('pragma table_info(' . $_REQUEST['pageOption'] . ');');
            $col = $table->fetchAll(PDO::FETCH_ASSOC);
            $columns = Array();

            foreach ($col as $each) {
                array_push($columns, $each['name']);
            }

            // create table headers from column names
            echo '<tr>';
            foreach ($columns as $each)
                echo '<th>' . $each . '</th>';
            echo '</tr>';

            // create blank row for adding new record
            echo '<tr><form method="post">';
            $indexField = false;

            foreach ($columns as $each) {

                // skip index field
                if (!$indexField) {
                    echo '<td></td>';
                    $indexField = true;
                } else {
                    echo '<td><input name="' . $each . '"></td>';
                }
            }

            echo '<input type="hidden" name="table" value="' . $_REQUEST['pageOption'] . '"></input>';
            echo '<td><button type="submit" name="submit" value="add">Add</button></td></form></tr>';

            // select whole table
            $select = $dat->query('select * from ' . $_REQUEST['pageOption']);

            // create a table and tr for each existing record
            $result = $select->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {

                // create a new form for each row
                echo '<tr><form method="post">';
                $indexField = false;

                // create an input field for each value in row
                foreach ($row as $i => $each) {

                    // disable editing of index field
                    if (!$indexField) {
                        echo '<td><input name="' . $i . '" value="' . $each . '" readonly size="5"></td>';
                        $indexField = true;
                    } else {
                        echo '<td><input name="' . $i . '" value="' . $each . '"></td>';
                    }
                }

                // save name of the table as hidden property for easy editing
                echo '<input type="hidden" name="table" value="' . $_REQUEST['pageOption'] . '"></input>';

                // value of only one button will be sent for processing
                echo '<td><button type="submit" name="submit" value="delete">Delete</button>';
                echo '<button type="submit" name="submit" value="update">Update</button></td>';
                echo '</form>';
                echo '</tr>';
            }
        } ?>
    </fieldset>
<?php } ?>