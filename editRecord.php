<?php
// connect database
include("connectdb.php");

// delete record based on index and table from POST
if ($_REQUEST['submit'] == 'delete') {
    
    // set first item in array to be index
    $index = key($_REQUEST);
    $dat->exec('delete from ' . $_REQUEST['table']. ' where ' . $index . ' is ' . $_REQUEST[$index]);
    
}

// update record based on index and table from POST
else if ($_REQUEST['submit'] == 'update') {
    
    // set first item in array to be index
    $index = key($_REQUEST);
    
    // slice unnecessary data from $_REQUEST
    foreach (array_slice($_REQUEST, 0, count($_REQUEST) -2) as $value) {
        $dat->exec('update ' . $_REQUEST['table']. ' set ' . key($_REQUEST) . ' = "' . $value . '" where ' . $index . ' is ' . $_REQUEST[$index]);
        next($_REQUEST);
    }
}

// add new record to table from POST
else if ($_REQUEST['submit'] == 'add') {
    
    $fields = array();
    $values = array();
    
    // add keys and values to inserted to the arrays
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
}

// close database
$dat = null;

// return to admin page and display updated table
header('Location: test.php?pageOption='. $_REQUEST['table']);

?>
