<?php include("header.php"); ?>
<div class="container">
    <div class="row">
        <div id="main" class="col wide">

            <?php if(!isset($_SESSION['userLoggedIn']) || $_SESSION['user_status'] < 2){
                include('moduleNoAccess.php');
            } else { ?>
                <h1>Administration</h1>
                <div class="row">
                <div class="col tiny"><button>Users</button></div>
                <div class="col tiny"><a href="admin.php?pageOption=artist"><button>Artists</button></a></div>
                <div class="col tiny"><button>Events</button></div>
                <div class="col tiny"><button>Bulletins</button></div>
                <div class="col tiny"><button>Database</button></div>
                </div>
                <hr>

                <?php if (!isset($_REQUEST['pageOption'])) {
                    echo '<p><em>Select something to edit.</em></p>';
                } else {
                    if ($_REQUEST['pageOption'] == 'user'){
                        include('moduleAdminUser.php');
                    }
                    if ($_REQUEST['pageOption'] == 'artist'){
                        include('moduleAdminArtist.php');
                    }
                    if ($_REQUEST['pageOption'] == 'event'){ }
                    if ($_REQUEST['pageOption'] == 'bulletin'){}
                }

  } ?>


        </div>
        <div id="sidebar" class="col narrow">
            <?php include("sidebar.php");?>
        </div>
    </div>
</div>
<?php include("footer.php"); ?>