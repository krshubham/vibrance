<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php confirm_admin_logged_in(); ?>

<?php
    $current_user = $_SESSION["username"];
    $name_query = "SELECT * FROM admins WHERE username = '{$current_user}' LIMIT 1";
    $name_result = mysqli_query($conn, $name_query);
    confirm_query($name_result);
    $name_title = mysqli_fetch_assoc($name_result);    
?>
<?php
    $query = "SELECT * FROM combo ";
    $result = mysqli_query($conn, $query);
    confirm_query($result);
?>
<?php
    if (($name_title['type']=="payment_admin") | ($name_title['type']=="super_admin")) {
        $view_whole = "";         
    } else {
        $view_whole = "style='display: none;'";        
    }
    if ($name_title['type']=="super_admin") {
        $view_cnf = "";
    } else {
        $view_cnf = "style='display: none;'";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Payments</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="favicon.png" type="image/x-icon">
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
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
th {
    text-align: left;
}
</style>
    <div class="page">
        <!--========================================================
                              HEADER
    =========================================================-->
        <header>
            <div id="stuck_container" class="stuck_container">
                <div class="container">
                    <div class="brand">
                        <h1 class="brand_name">
                        <a href="#"><img src="images/vib_banner_small.png" style="width: 50%;height: 50%"></a>
                    </h1>
                    </div>
                    <nav class="nav">
                        <ul class="sf-menu">
                            <li>
                                <a href="admin_land.php">Admin Home</a>                                
                            </li>
                            <li class="active">
                                <a href="payments.php">Payments</a>
                            </li>
                            <li>
                                <a href="onspot/index.php">On Spot Registration</a>
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
        <main <?php echo $view_whole; ?> >
            <section class="well well__offset-3">
                <div class="container">
                    <h2><em>Combo</em>Section</h2>
                    <div class="row row__offset-2">
                        <center>
                            <table>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>College</th>
                                    <th>Reg No.</th>
                                    <th>Ph. No.</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                    while ($list = mysqli_fetch_assoc($result)) { ?>
                                       <tr>
                                           <td><?php echo $list['name']; ?></td>
                                           <td><?php echo $list['email']; ?></td>
                                           <td><?php echo $list['college']; ?></td>
                                           <td><?php echo $list['regno']; ?></td>
                                           <td><?php echo $list['phno']; ?></td>
                                           <td><?php echo $list['paid']; ?></td>
                                           <td><?php echo $list['type']; ?></td>
                                           <td><?php echo $list['price']; ?></td>
                                           <td>
                                               <a href="comboconfirm.php?id=<?php echo urlencode($list["id"]); ?>&events=<?php echo urlencode($list['events']); ?>&price=<?php echo urlencode($list['price']); ?>&type=<?php echo urlencode($list['type']); ?>" onclick="return confirm('Are you sure?');"><?php
                                                    if ($list['paid']==0) {
                                                        echo "<font color='red'>"."Pay"."</font>";
                                                    } else {
                                                        echo "<font color='green'>"."Paid"."</font>";
                                                    } ?>
                                                </a>
                                           </td>
                                       </tr> 
                                   <?php }
                                ?>
                            </table>
                        </center>
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