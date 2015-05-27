<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide blockFull">

                <h1>Bulletin Details</h1>
                <hr>

                <?php
                // select bulletin
                include("connectdb.php");
                $select = $dat->query("select * from bulletin where bulletin_id = ".  $_GET['bulletin_id']);
                $result = $select->fetch(PDO::FETCH_ASSOC);

                echo '<img src="' . $result['bulletin_photo'] .'">';
                echo '<p><a class="font-lead" href="bulletinDetail.php?bulletin_id='. $result['bulletin_id'] .'">'. $result['bulletin_title'] .'</a></br/>';
                echo '<strong>Posted on ' . $result['bulletin_date'] . '</strong></p>';
                echo '<p>'. nl2br($result['bulletin_info']) .'</p>';
                ?>

                <hr>
                <a href="bulletins.php"><button class="rightButton">Back To Bulletins</button></a>

            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>