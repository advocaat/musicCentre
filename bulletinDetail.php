<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide artistFull">

                <h2>Bulletin Details</h2>

                <?php
                // select artist
                include("connectdb.php");
                $select = $dat->query("select * from bulletin where bulletin_id = ".  $_GET['bulletin_id']);
                $result = $select->fetch(PDO::FETCH_ASSOC);

                echo '<img src="' . $result['bulletin_photo'] .'">';
                echo '<a href="bulletinDetail.php?bulletin_id='. $result['bulletin_id'] .'"><h2>'. $result['bulletin_title'] .'</h2></a>';
                echo '<p><strong>Posted on '. $result['bulletin_date'] .'</strong></p>';
                echo '<p>'. nl2br($result['bulletin_info']) .'</p>';

                ?>

            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>