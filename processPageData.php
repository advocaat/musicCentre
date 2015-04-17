<?php
include("connectdb.php");
$debugOn = true;

if($_REQUEST['pageOption'] == "bulletin"){
	$result = $sql = "SELECT * FROM bulletin_posts";
	if ($dat->exec($sql))
		header("Location: backend.php"); // NOTE: This must be done before ANY html is output, which is why it's right at the top!
/*	else
		// set message to be printed on appropriate (results) page
*/
}



?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Database Testing</title>
</head>
<body>

    <div id="header">
        <?php
            echo "<h1>Townsville Music Centre</h1>";
        ?>
        <div id="nav">
            <?php
                echo "<ul><li><a href='index.php'>Home</a></li><li><a href='backend.php'>Here</a></li><li><a href='processPageData.php'>There</a></li></ul>";
            ?>
        </div>
    </div>
    <div id="mainbody">
        <?php
         echo "<h2>PanelSelect</h2>";
         echo "<pre>";

         echo "</pre>";
           ?>
              <?php
                 echo "<pre>";
                 print_r($_REQUEST);
                 $rows = $result->fetchall(PDO::FETCH_ASSOC);
                 echo count($rows) . " records in  table<br />/n";
                 print_r($rows);
                           echo "</pre>";
                       ?>

    </div>
    <div id="footer">
        <?php
            echo "<blockquote><>Townsville Community Music Center - 2015 &#169;</blockquote>";
        ?>
    </div>

</body>
</html>