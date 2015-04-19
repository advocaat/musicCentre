<?php
// connect database
include("connectdb.php");

// delete record based on index and table from POST
if ($_REQUEST['submit'] == 'delete') {
    
    // set first item in array to be index
    $index = key($_REQUEST);
    $dat->exec('delete from ' . $_REQUEST['table']. ' where ' . $index . ' is ' . $_REQUEST[$index]);
    
}

// update record based on idex and table from POST
else if ($_REQUEST['submit'] == 'update') {
    
    // set first item in array to be index
    $index = key($_REQUEST);
    foreach (array_slice($_REQUEST, 0, count($_REQUEST) -2) as $value) {
        $dat->exec('update ' . $_REQUEST['table']. ' set ' . key($_REQUEST) . ' = "' . $value . '" where ' . $index . ' is ' . $_REQUEST[$index]);
        next($_REQUEST);
    }
}

// close database
$dat = null;

// return to admin page and display updated table
header('Location: test.php?pageOption='. $_REQUEST['table']);

?>