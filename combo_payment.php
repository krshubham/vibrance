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
                    <h2><em>Payments</em>Section</h2>
                    <div class="row row__offset-2">
                        <center>
                            <form action="payments.php" method="post">
                                <select name="event">
                                    <option value="">Select Combo</option>
                                    <option value="three">Three Events Pass</option>
                                    <option value="all">All Events Pass</option>
                                </select>
                                <input type="submit" name="submit" value="Go">
                            </form>
                            <?php
                                if (isset($_POST['submit'])) {
                                    $combo = $_POST['combo'];                                    
                                    $query = "SELECT * FROM spend ";
                                    $result = mysqli_query($conn, $query);
                                    confirm_query($result); ?>
                                    <h3><?php echo $combo; ?></h3>                                    
                                    <p>
                                        <table>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>College</th>
                                                <th>Reg. No.</th>
                                                <th>Ph. No.</th>
                                                <th>Status</th> 
                                                <th>Events</th>
                                                <th>Fees</th>
                                                <th>Action</th>
                                                <th <?php echo $view_cnf; ?>>Confirmed By</th>
                                            </tr><?php
                                        while ($list = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td><?php echo $list['name']; ?></td>
                                                <td><?php echo $list['email']; ?></td>
                                                <td><?php echo $list['college']; ?></td>
                                                <td><?php echo $list['regno']; ?></td>
                                                <td><?php echo $list['phno']; ?></td>
                                                <td><?php echo $list['paid']; ?></td>
                                                <td><?php echo $list['parti']; ?></td>
                                                <td><?php echo $list['combo']; ?></td>
                                                <td>
                                                    <?php
                                                       if (($list['college']!="VIT")&&($event_name[3]=="d")) {
                                                            if ($list['combo']=="three") {
                                                                $fee = 50;
                                                                echo $fees;
                                                            } elseif ($list['combo']=="all") {
                                                                $fee = 8;
                                                                echo $fees;
                                                            } else {
                                                                $fees = $list['parti']*100;
                                                                echo $fees;
                                                            }
                                                        } elseif (($list['college']=="VIT")&&($event_name[3]=="d")) {
                                                            if ($list['combo']=="three") {
                                                                $fee = 33;
                                                                echo $fees;
                                                            } elseif ($list['combo']=="all") {
                                                                $fee = 4;
                                                                echo $fees;
                                                            } else {
                                                                $fees = $list['parti']*50;
                                                                echo $fees;
                                                            }
                                                        } else {
                                                            $fees = $list['parti']*$event_name[2];
                                                            echo $fees; 
                                                        }                                                        
                                                    ?>
                                                </td>
                                                <td>                                                   
                                                    <a href="payconfirm.php?id=<?php echo urlencode($list["id"]); ?>&event=<?php echo urlencode($event); ?>&parti=<?php echo urlencode($list['parti']); ?>" onclick="return confirm('Are you sure?');"><?php
                                                    if ($list['paid']==0) {
                                                        echo "<font color='red'>"."Pay"."</font>";
                                                    } else {
                                                        echo "<font color='green'>"."Paid"."</font>";
                                                    } ?>
                                                    </a>                                                    
                                                </td>
                                                <td <?php echo $view_cnf; ?>><?php echo $list['cnfby']; ?></td>
                                            </tr><?php                                             
                                        } ?>
                                        </table>    
                                    </p> <?php
                                }    
                            ?>                            
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