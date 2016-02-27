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
    if (($name_title['type']=="viewer_admin") | ($name_title['type']=="super_admin")) {
        $view_whole = "";         
    } else {
        $view_whole = "style='display: none;'";        
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
    <script type='text/javascript' src='http://code.jquery.com/jquery-git2.js'></script>
    <script type='text/javascript' src="http://codeinnovators.meximas.com/pdfexport/jspdf.debug.js"></script>
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
                                <a href="admin_land.php">Admin Home</a>                                
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
                            <form action="viewers.php" method="post">
                                <select name="event">
                                    <option value="">Select an event</option>
                                    <option value="adaptune_alone_100">Adaptune</option>
                                    <option value="bollywoodbattle_team_200">Bollywood Battle</option>
                                </select>
                                <input type="submit" name="submit" value="Go">
                            </form>
                            <?php
                                if (isset($_POST['submit'])) {
                                    $event = $_POST['event'];
                                    $event_name = explode("_", $event);
                                    $query = "SELECT * FROM {$event} WHERE paid = 1";
                                    $result = mysqli_query($conn, $query);
                                    confirm_query($result); ?>
                                    <div id="htmlexportPDF">
                                    <h3><?php echo $event_name[0]; ?></h3>
                                    <h4><?php echo $event_name[1]; ?></h4>
                                    <p>
                                        <table id="exportPDF">
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>College</th>
                                                <th>Reg. No.</th>
                                                <th>Ph. No.</th>                                                
                                                <th>Participants</th>
                                                <th>Fees</th>
                                            </tr><?php
                                        while ($list = mysqli_fetch_assoc($result)) { ?>
                                            <tr>
                                                <td><?php echo $list['name']; ?></td>
                                                <td><?php echo $list['email']; ?></td>
                                                <td><?php echo $list['college']; ?></td>
                                                <td><?php echo $list['regno']; ?></td>
                                                <td><?php echo $list['phno']; ?></td>       
                                                <td><?php echo $list['parti']; ?></td>
                                                <td class="count-me"><?php $fees = $list['parti']*$event_name[2]; echo $fees; ?></td>
                                            </tr><?php                                             
                                        } ?>
                                        </table>    
                                    </p> <?php
                                }    
                            ?>
                            <p>
                                <h3>Total Income = Rs. <span id="total"></span> </h3>
                            </p></div>
                            <p><button onclick="javascript:htmltopdf();">Export PDF</button></p>                            
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
    <script language="javascript" type="text/javascript">
    var tds = document.getElementById('exportPDF').getElementsByTagName('td');
    var sum = 0;
    for (var i = 0; i < tds.length; i++) {
        if (tds[i].className == 'count-me') {
            sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
        }
    }
    document.getElementById('total').innerHTML += sum;
    </script>  
    <script type='text/javascript'>
    function htmltopdf() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        source = $('#htmlexportPDF')[0];
        specialElementHandlers = {
            '#bypassme': function(element, renderer) {
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };
        pdf.fromHTML(
            source,
            margins.left,
            margins.top, {
                'width': margins.width,
                'elementHandlers': specialElementHandlers
            },

            function(dispose) {
                pdf.save('Download.pdf');
            }, margins);
    }
    </script>
</body>

</html>
<?php
    if (isset ($conn)){
      mysqli_close($conn);
    }
?>