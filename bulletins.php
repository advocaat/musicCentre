<?php include("header.php"); ?>
    <div class="container">
        <div class="row">
            <div id="main" class="col wide">

                <h2>Community Bulletins</h2>
                <p>The Bulletin Board is a free service, intended not only for selling or advertising, but also for any items of news or general interest.</p>
                <p>Music Centre will not be involved in any way in the sale of goods advertised on this page. Bulletins will remain active for one month. You can post a bulletin from the User Menu once signed in. If you're not already a member, <a href="members.php">consider joining today.</a></p>

                <?php include("connectdb.php");

                $results = $dat->query("select * from bulletin");

                foreach($results as $result) {
                    echo '<div class="row">';
                    echo '<div class="col artistFeature">';
                    echo '<img src="' . $result['bulletin_photo'] .'">';
                    echo '<a href="bulletinDetail.php?bulletin_id='. $result['bulletin_id'] .'"><h2>'. $result['bulletin_title'] .'</h2></a>';
                    echo '<p><strong>Posted on ' . $result['bulletin_date'] . '</strong></p>';
                    echo '<p>'. substr($result['bulletin_info'], 0, 399) .'...<br />';
                    echo '<a href="bulletinDetail.php?bulletin_id='. $result['bulletin_id'] .'">More Info</a></p>';
                    echo '</div></div>';
                }
                ?>

            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>