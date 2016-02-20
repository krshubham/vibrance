<?php require_once("includes/session.php");?>
<?php require_once("includes/db_connection.php");?>
<?php require_once("includes/functions.php");?>
<?php confirm_admin_logged_in(); ?>
<?php
    $current_user = $_SESSION["username"];
    $name_query = "SELECT * FROM admins WHERE username = '{$current_user}' LIMIT 1";
    $name_result = mysqli_query($conn, $name_query);
    confirm_query($name_result);
    $name_title = mysqli_fetch_assoc($name_result);    
?>

<?php
    if ($name_title['type']=="event_admin") {
        $link1 = "event_admin.php";
        $link2 = "onspote/index.php";
        $linkup = "";
        $page = "Participants";
    } elseif ($name_title['type']=="payment_admin") {
        $link1 = "payments.php";
        $link2 = "onspot/index.php";
        $linkup = "";
        $page = "Payments";
    } elseif ($name_title['type']=="super_admin") {
        $link1 = "payments.php";
        $link2 = "onspot/index.php";
        $page = "Payments";
        $linkup = "<a href='admin_signup.php'>Make new Admin</a>";
    }
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Payments</title>
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
        <!--========================================================
                              HEADER
    =========================================================-->
        <header>
            <div id="stuck_container" class="stuck_container">
                <div class="container">
                    <div class="brand">
                        <h1 class="brand_name">
                        <a href="./">Vibrance'16</a>
                    </h1>
                    </div>
                    <nav class="nav">
                        <ul class="sf-menu">                            
                            <li class="active">
                                <a href="admin_land.php">Admin Home</a>                               
                            </li>
                            <li>
                                <a href="<?php echo $link1; ?>"><?php echo $page; ?></a>
                            </li>
                            <li>
                                <a href="<?php echo $link2; ?>">On Spot Registration</a>
                            </li>
                            <li>
                                <?php echo "<a href='logout_admin.php'>Logout, ".$current_user."</a>"; ?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!--========================================================
                              CONTENT
    =========================================================-->
        <main>
            <section class="well well__offset-3">
                <div class="container">
                    <h2><em>Admin</em><?php echo $page; ?></h2>
                    <div class="row row__offset-2">
                        <div class="grid_6">
                            <div class="img">
                                <a href="<?php echo $link1; ?>">
                                    <div class="lazy-img" style="padding-bottom: 45.6140350877193%;"><img data-src="images/payment.jpg" alt=""></div>
                                </a>
                            </div>
                        </div>
                        <div class="grid_6">
                            <div class="img">
                                <a href="<?php echo $link2; ?>">
                                    <div class="lazy-img" style="padding-bottom: 45.6140350877193%;"><img data-src="images/onspot.jpg" alt=""></div>
                                </a>
                            </div>
                        </div>
                        <center><?php echo $linkup; ?></center>
                    </div>
                </div>
            </section>
        </main>
        <!--========================================================
                              FOOTER
    =========================================================-->
        <footer>
        </footer>
    </div>
    <script src="js/script.js"></script>
</body>

</html>
<?php
    if (isset ($conn)){
      mysqli_close($conn);
    }
?>