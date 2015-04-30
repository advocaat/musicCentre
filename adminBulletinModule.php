<!-- Bulletin Admin Module -->

<?php if (isset($_REQUEST['submit_bulletin'])) {

    // delete record
    if ($_REQUEST['submit_bulletin'] == 'delete') {

        // set first item in array to be index
        $index = key($_REQUEST);
        $dat->exec('delete from bulletin where ' . $index . ' is ' . $_REQUEST[$index]);

        // return to admin page and display updated table
        header('Location: admin.php');
    }

    // update record
    else if ($_REQUEST['submit_bulletin'] == 'update') {

        // set first item in array to be index
        $index = key($_REQUEST);

        // slice unnecessary data from $_REQUEST
        foreach (array_slice($_REQUEST, 0, count($_REQUEST) -2) as $value) {
            $dat->exec('update bulletin set ' . key($_REQUEST) . ' = "' . $value . '" where ' . $index . ' is ' . $_REQUEST[$index]);
            next($_REQUEST);
        }

        // return to admin page and display updated table
        header('Location: admin.php');
    }

    // add new record
    else if ($_REQUEST['submit_admin'] == 'add') {

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
        header('Location: admin.php');
    }
}
else {

$select = $dat->query('select * from bulletin where user_id = "' . $_SESSION['user_id'] . '"');
$result = $select->fetchAll(PDO::FETCH_ASSOC);

?>

<fieldset>
    <legend>My Bulletins</legend>
    <table>

    <?php foreach ($result as $row) {

    // create a new form for each row
    echo '<tr><form method="post">';

    // create a td for each value in row
    foreach ($row as $i => $each) {

        echo '<td>' . $each . '</td>';
    }

    // value of only one button will be sent for processing
    echo '<td><button type="submit" name="submit_bulletin" value="delete">Delete</button>';
    echo '<button type="submit" name="submit_bulletin" value="update">Update</button></td>';
    echo '</form>';
    echo '</tr>';
    } ?>
</table>
</fieldset>

<?php } ?>