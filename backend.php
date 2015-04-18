<?php
include("connectdb.php");
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Townsville Music Centre - Admin</title>
</head>
<body>
    <div #header>
        <h1>Administrator</h1>
    </div>
    <div #mainbody>


         <div #backendNav>
           <p>

           <fieldset>
           <legend><h3>Site Map </h3></legend>
           <form id="panelSelect" name="panelSelect" action="processPageData.php" method="POST">
           <select name="pageOption">
                <option value="bulletin">Bulletin Board</option>
                <option value="events">Events</option>
                <option value="bands">Bands</option>
                <option value="users">Users</option>
                <option value="page">Page Data</option>
            </select>


            </p>

         </div>


    </div>

    <div id="backendBody">



            <p><label for="actions">Perform Tasks</label></p>
            <label for="view">View Items</label>

            <input type="radio" id="view" name="actions" value="viewitems" checked="checked">
            <label for="remove">Remove Item</label>
            <input type="radio" id="remove" name="actions" value="removeitem">
            <label for="add">Add Item</label>
            <input type="radio" id="add" name="actions" value="additem">

            <input type="submit" name="submit" id = "submit" value="Edit">
        </fieldset>


        </form>

    </div>



</body>
<html>