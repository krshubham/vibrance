<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php 
if (isset($_SESSION["username"])) {
    $current_user = $_SESSION["username"];
    $name_query = "SELECT * FROM users WHERE username = '{$current_user}' LIMIT 1";
    $name_result = mysqli_query($conn, $name_query);
    confirm_query($name_result);
    $name_title = mysqli_fetch_assoc($name_result);
    $first_name = explode(" ", $name_title['name']);            
    $view = "<a href='logout.php'>Logout, ".$first_name[0]."</a>"; 
    $event_view = ""; 
    $login_view = "";      
} else {
    $current_user = "";  
    $first_name = "";
    $name_title = "";
    $view = "<a href='login/index.php'>Login</a>";  
    $login_view = "<a href='login/index.php' class='gobutton'>Login to register</a>"; 
    $event_view = "style='display: none;'";     
}  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Combo Offers</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
    <link rel="stylesheet" href="css/pure-min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <!--[if lt IE 9]>
    <html class="lt-ie9">
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/..">
            <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a> 
    </div>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
    <script src='js/device.min.js'></script>
</head>

<body>
    <div class="page">

      <header>
        <div id="stuck_container" class="stuck_container">
            <div class="container">
                <div class="brand">
                    <h1 class="brand_name">
                        <a href="#"><img src="images/vib_banner_small.png" style="width: 80%; height: 80%;
                        margin-left: -2em;margin-bottom: -1em;margin-right: -2em;"></a>
                    </h1>
                </div>
                <nav class="nav">
                    <ul class="sf-menu">                            
                        <li class="active">
                            <a href="admin_land.php">Admin Home</a>                               
                        </li>
                        <li>
                            <a href="#"></a>
                        </li>
                        <li>
                            <a href="#">On Spot Registration</a>
                        </li>
                        <li>
                            <?php echo "<a href='logout.php'>Logout, ".$current_user."</a>"; ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <section class="well well__offset-3">
            <div class="container">
                <h2><em>Combo</em>Offers</h2>
                <div id="divall" style="display: none;"> 
                </div>
                <div class="row row__offset-2">
                    <div class="grid_6">
                        <div class="img">
                            <div id="wrapper">
                            <p><a href="#popup1">
                                <div id="three_click" class="lazy-img" style="padding-bottom: 45.6140350877193%;"><img data-src="images/three_int.jpg" alt=""></div>
                            </a></p>
                            </div>
                        </div>
                    </div>

                    <div class="grid_6">
                        <div class="img">
                        <div id="wrapper">
                            <a href="#popup2">
                                <div id="all_click" class="lazy-img" style="padding-bottom: 45.6140350877193%;"><img data-src="images/all_int.jpg" alt=""></div>
                            </a>
                        </div>
                        </div>
                    </div>                                            
                </div>
            </div>
        </section>
    </main>

    <footer>
    </footer>
</div>
<div id="popup1" class="overlay">
    <div class="popup">
        <h2>Choose events</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
        <div class="col1">
            <div id="divthree" style="display: none;">
                    <form name="form">
                        <div class="pure-g">
                            <div class="pure-u-1-8">
                                <input type="checkbox" name="event1" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event2" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event3" value="some" onclick="return KeepCount()">event3<br />
                                <input type="checkbox" name="event4" value="some" onclick="return KeepCount()">event4<br />
                                <input type="checkbox" name="event5" value="some" onclick="return KeepCount()">event5<br />
                                <input type="checkbox" name="event6" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event7" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event8" value="some" onclick="return KeepCount()">event3<br />
                            </div>
                           <div class="pure-u-1-8">
                                
                                <input type="checkbox" name="event9" value="some" onclick="return KeepCount()">event4<br />
                                <input type="checkbox" name="event10" value="some" onclick="return KeepCount()">event5<br />
                                <input type="checkbox" name="event11" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event12" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event13" value="some" onclick="return KeepCount()">event3<br>            
                                <input type="checkbox" name="event14" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event15" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event16" value="some" onclick="return KeepCount()">event3<br />
                            </div>
                            <div class="pure-u-1-8">
                                
                                <input type="checkbox" name="event17" value="some" onclick="return KeepCount()">event4<br />
                                <input type="checkbox" name="event18" value="some" onclick="return KeepCount()">event5<br />
                                <input type="checkbox" name="event19" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event20" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event21" value="some" onclick="return KeepCount()">event3<br />
                                <input type="checkbox" name="event22" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event23" vlue="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event24" vaue="some" onclick="return KeepCount()">event3<br />                                  
                            </div><div class="pure-u-1-8">

                                <input type="checkbox" name="event22" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event23" vlue="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event24" vaue="some" onclick="return KeepCount()">event3<br />
                                <input type="checkbox" name="event25" value="some" onclick="return KeepCount()">event4<br />
                                <input type="checkbox" name="event26" value="some" onclick="return KeepCount()">event5<br />
                                <input type="checkbox" name="event27" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event28" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event29" value="some" onclick="return KeepCount()">event3<br />
                                <input type="checkbox" name="event30" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event31" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event32" value="some" onclick="return KeepCount()">event3<br />                                  
                            </div><div class="pure-u-1-8">
                                
                                <input type="checkbox" name="event33" value="some" onclick="return KeepCount()">event4<br />
                                <input type="checkbox" name="event34" value="some" onclick="return KeepCount()">event5<br />
                                <input type="checkbox" name="event35" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event36" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event37" value="some" onclick="return KeepCount()">event3<br />
                                <input type="checkbox" name="event38" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event39" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event40" value="some" onclick="return KeepCount()">event3<br />                                  
                            </div><div class="pure-u-1-8">
                                
                                <input type="checkbox" name="event41" value="some" onclick="return KeepCount()">event4<br />
                                <input type="checkbox" name="event42" value="some" onclick="return KeepCount()">event5<br />
                                <input type="checkbox" name="event43" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event44" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event45" value="some" onclick="return KeepCount()">event3<br />                                  
                                <input type="checkbox" name="event46" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event47" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event48" value="some" onclick="return KeepCount()">event3<br />
                            </div><div class="pure-u-1-8">
                                
                                <input type="checkbox" name="event49" value="some" onclick="return KeepCount()">event4<br />
                                <input type="checkbox" name="event50" value="some" onclick="return KeepCount()">event5<br />
                                <input type="checkbox" name="event51" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event52" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event53" value="some" onclick="return KeepCount()">event3<br />
                                <input type="checkbox" name="event54" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event55" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event56" value="some" onclick="return KeepCount()">event3<br />                                  
                            </div><div class="pure-u-1-8">
                                <input type="checkbox" name="event57" value="some" onclick="return KeepCount()">event4<br />
                                <input type="checkbox" name="event58" value="some" onclick="return KeepCount()">event5<br />
                                <input type="checkbox" name="event59" value="some" onclick="return KeepCount()">event1<br />
                                <input type="checkbox" name="event60" value="some" onclick="return KeepCount()">event2<br />
                                <input type="checkbox" name="event61" value="some" onclick="return KeepCount()">event3<br /> 
                                <input type="checkbox" name="event62" value="some" onclick="return KeepCount()">event3<br /> 
                                <input type="checkbox" name="event63" value="some" onclick="return KeepCount()">event3<br /> 
                                <input type="checkbox" name="event64" value="some" onclick="return KeepCount()">event3<br /> 
                                </div>
                        </div>
                            <br><br>
                        <div class="pure-g">
                            <div class="pure-u-24-24">
                                <input type="submit" class="btn-reg" value="Register"></input>
                            </div>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="popup2" class="overlay light">
    <a class="cancel" href="#"></a>
    <div class="popup">
        <a class="close" href="#">&times;</a>
        <h2>What the what?</h2>
        <div class="content">
      <p>Click outside the popup to close.</p>
        </div>
    </div>
</div>

<script src="js/script.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript">
    $('#three_click').click(function() {
        $('#divthree').slideDown();
    });
    $('#all_click').click(function() {
        $('#divall').slideDown();
    });
</script>
<script language="javascript">

    function KeepCount() {

        var NewCount = 0;

        if (document.form.event1.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event2.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event3.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event4.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event5.checked)
            {NewCount = NewCount + 1;}

        if (NewCount == 4)
        {
            alert('Pick Just Two Please')
            document.form; return false;
        }
    } 
</script>
</body>
</html>
<?php
if (isset ($conn)){
  mysqli_close($conn);
}
?>