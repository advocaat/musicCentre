<?php include("header.php"); ?>
        <div class="row">
            <div id="main" class="col wide">

                <h1>Community Bulletins</h1>
                <hr>
                <p>The Bulletin Board is a free service, intended not only for selling or advertising, but also for any items of news or general interest.</p>
                <p>Music Centre will not be involved in any way in the sale of goods advertised on this page. Bulletins will remain active for one month. You can post a bulletin from the User Menu once signed in. If you're not already a member, <a href="members.php">consider joining today.</a></p>
                <hr>
                <?php include("connectdb.php");

                // select only bulletins within the last month
                $today = date('Y-m-d');
                $lastmonth = date('Y-m-d', mktime(0, 0, 0, date("m")-1, date("d"),   date("Y")));

                $results = $dat->query('select * from bulletin where bulletin_date between "'. $lastmonth .'" and "'.$today .'" order by bulletin_id desc');

                foreach($results as $result) {
                    echo '<div class="row">';
                    echo '<div class="col blockFeature">';
                    echo '<img src="' . $result['bulletin_photo'] .'">';
                    echo '<p><a class="font-lead" href="bulletinDetail.php?bulletin_id='. $result['bulletin_id'] .'">'. $result['bulletin_title'] .'</a></br/>';
                    echo '<strong>Posted on ' . $result['bulletin_date'] . '</strong></p>';
                    echo '<p>'. substr($result['bulletin_info'], 0, 249) .'...<br />';
                    echo '<a href="bulletinDetail.php?bulletin_id='. $result['bulletin_id'] .'">More Info</a></p>';
                    echo '</div></div><hr>';
                }
                ?>

            </div>
            <div id="sidebar" class="col narrow">
                <?php include("sidebar.php");?>
            </div>
        </div>
<?php include("footer.php"); ?>