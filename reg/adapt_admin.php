<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Events</title>
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
                        <a href="./">Vibrance'16</a>
                    </h1>
                    </div>
                    <nav class="nav">
                        <ul class="sf-menu">
                            <li>
                                <a href="./">Home</a>
                            </li>
                            <li class="active">
                                <a href="index-1.html">About</a>
                                <ul>
                                    <li>
                                        <a href="#">Quisque nulla</a>
                                    </li>
                                    <li>
                                        <a href="#">Vestibulum libero</a>
                                        <ul>
                                            <li>
                                                <a href="#">Lorem</a>
                                            </li>
                                            <li>
                                                <a href="#">Dolor</a>
                                            </li>
                                            <li>
                                                <a href="#">Sit amet</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Vivamus eget nibh</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="index-2.html">What We Do</a>
                            </li>
                            <li>
                                <a href="index-3.html">Menu</a>
                            </li>
                            <li>
                                <a href="index-4.html">Contacts</a>
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
                    <h2><em>Event</em>Participants</h2>
                    <div class="row row__offset-2">
                        <center>
                            <h3>Adaptune</h3>
                            <?php
                                
                                $query = "SELECT * FROM adaptune WHERE paid = 1";
                                $result = mysqli_query($conn, $query);
                                confirm_query($result); ?>
                                <p>
                                    <table>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>College</th>
                                            <th>Reg. No.</th>
                                            <th>Ph. No.</th>
                                                                                          
                                        </tr><?php
                                    while ($list = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $list['name']; ?></td>
                                            <td><?php echo $list['email']; ?></td>
                                            <td><?php echo $list['college']; ?></td>
                                            <td><?php echo $list['regno']; ?></td>
                                            <td><?php echo $list['phno']; ?></td>                                                                                          
                                        </tr><?php                                             
                                    } ?>
                                    </table>    
                                </p> <?php
                                    
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