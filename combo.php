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
                        <a href="#"><img src="images/vib_banner_small.png"></a>
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
                <div id="divthree" style="display: none;">
                    <form name="form">
                        <input type="checkbox" name="event[0]" value="some" onclick="return KeepCount()">event1
                        <input type="checkbox" name="event[1]" value="some" onclick="return KeepCount()">event2
                        <input type="checkbox" name="event[2]" value="some" onclick="return KeepCount()">event3
                        <input type="checkbox" name="event[3]" value="some" onclick="return KeepCount()">event4
                        <input type="checkbox" name="event[4]" value="some" onclick="return KeepCount()">event5
                    </form>
                </div>
                <div id="divall" style="display: none;"> 
                    Some text for all
                </div>
                <div class="row row__offset-2">
                    <div class="grid_6">
                        <div class="img">
                            <a href="#">
                                <div id="three_click" class="lazy-img" style="padding-bottom: 45.6140350877193%;"><img data-src="images/payment.jpg" alt=""></div>
                            </a>
                        </div>
                    </div>

                    <div class="grid_6">
                        <div class="img">
                            <a href="#">
                                <div id="all_click" class="lazy-img" style="padding-bottom: 45.6140350877193%;"><img data-src="images/onspot.jpg" alt=""></div>
                            </a>
                        </div>
                    </div>                                            
                </div>
            </div>
        </section>
    </main>

    <footer>
    </footer>
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

        var NewCount = 0

        if (document.form.event[0].checked)
            {NewCount = NewCount + 1}

        if (document.form.event[1].checked)
            {NewCount = NewCount + 1}

        if (document.form.event[2].checked)
            {NewCount = NewCount + 1}

        if (document.form.event[3].checked)
            {NewCount = NewCount + 1}

        if (document.form.event[4].checked)
            {NewCount = NewCount + 1}

        if (NewCount == 3)
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