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
    if ($name_title['type']=="event_admin") {
        $view_whole = "";
        $last_name = explode("_", $current_user);
        $event_name = $last_name[1];
        $event_table = $last_name[1]."_".$last_name[2]."_".$last_name[3]."_".$last_name[4];          
    } else {
        $view_whole = "style='display: none;'";
        $event_name = "";
        $event_table = "";
    }
    if ($last_name[4]=="s") {
        $view_combo = "style='display: none;'";
    } else {
        $view_combo = "";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Events</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="favicon.png" type="image/x-icon">
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
                        <a href="#"><img src="images/vib_banner_small.png" style="width: 50%;height: 50%">w</a>
                    </h1>
                    </div>
                    <nav class="nav">
                        <ul class="sf-menu">                            
                            <li>
                                <a href="admin_land.php">Admin Home</a>                                
                            </li>
                            <li class="active">
                                <a href="event_admin.php">Participants</a>
                            </li>
                            <li>
                                <a href="onspote/index.php">On Spot Registration</a>
                            </li>
                            <li>
                                <?php echo "<a href='logout_admin.php'>Logout, ".$last_name[0]."</a>"; ?>
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
                    <h2><em>Event</em>Participants</h2>
                    <div class="row row__offset-2">
                        <center>
                            <div id="htmlexportPDF">
                                <h3><?php echo ucfirst($event_name); ?></h3>
                                <h4>Confirmed List</h4>
                                <?php
                                    
                                    $query = "SELECT * FROM {$event_table} WHERE paid = 1";
                                    $result = mysqli_query($conn, $query);
                                    confirm_query($result); ?>                                
                                        <p>
                                            <table id="exportPDF">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>College</th>
                                                    <th>Reg. No.</th>
                                                    <th>Ph. No.</th>
                                                    <th>Alternate No.</th>
                                                    <th>Participants</th> 
                                                    <th>Combo</th>                                            
                                                </tr><?php
                                            while ($list = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $list['name']; ?></td>
                                                    <td><?php echo $list['email']; ?></td>
                                                    <td><?php echo $list['college']; ?></td>
                                                    <td><?php echo $list['regno']; ?></td>
                                                    <td><?php echo $list['phno']; ?></td>
                                                    <td><?php echo $list['altphno']; ?></td>  
                                                    <td><?php echo $list['parti']; ?></td>                                          
                                                    <td><?php echo $list['combo']; ?></td>
                                                </tr><?php                                             
                                            } ?>
                                            </table> 
                                        </p>   
                                    <?php                                    
                                ?>                                
                            </div>   
                            <p><button onclick="javascript:htmltopdf();">Export PDF</button></p><hr>                           
                            <div >                                
                                <h4>Unconfirmed List</h4>
                                <?php                                    
                                    $query = "SELECT * FROM {$event_table} WHERE paid = 0";
                                    $result = mysqli_query($conn, $query);
                                    confirm_query($result); ?>                                
                                        <p>
                                            <table >
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>College</th>
                                                    <th>Reg. No.</th>
                                                    <th>Ph. No.</th>
                                                    <th>Alternate No.</th>
                                                    <th>Participants</th> 
                                                    <th>Action</th>                                            
                                                </tr><?php
                                            while ($list = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $list['name']; ?></td>
                                                    <td><?php echo $list['email']; ?></td>
                                                    <td><?php echo $list['college']; ?></td>
                                                    <td><?php echo $list['regno']; ?></td>
                                                    <td><?php echo $list['phno']; ?></td>
                                                    <td><?php echo $list['altphno']; ?></td>  
                                                    <td><?php echo $list['parti']; ?></td>                                          
                                                    <td>
                                                        <?php $email_part = explode("@", $list['email']); ?>
                                                        <a href="intimate.php?email1=<?php echo urlencode($email_part[0]); ?>&email2=<?php echo urlencode($email_part[1]); ?>&event=<?php echo urlencode($event_name); ?>&price=<?php echo urlencode($list['price']); ?>" onclick="return confirm('Send an intimation mail?');">Intimate</a>
                                                    </td>
                                                </tr><?php                                             
                                            } ?>
                                            </table> 
                                        </p>   
                                    <?php                                    
                                ?>                                
                            </div>    
                            <div <?php echo $view_combo; ?> >                                
                                <h4>Combo confirmed List</h4>
                                <?php                                    
                                    $query = "SELECT * FROM combo WHERE paid = 1 AND WHERE type = 'all' ";
                                    $result = mysqli_query($conn, $query);
                                    ?>                                
                                        <p>
                                            <table>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>College</th>
                                                    <th>Reg. No.</th>
                                                    <th>Ph. No.</th>
                                                    <th>Alternate No.</th>
                                                    <th>Participants</th> 
                                                    <th>Type</th>                                            
                                                </tr><?php
                                            while ($list = mysqli_fetch_assoc($result)) { ?>
                                                <tr>
                                                    <td><?php echo $list['name']; ?></td>
                                                    <td><?php echo $list['email']; ?></td>
                                                    <td><?php echo $list['college']; ?></td>
                                                    <td><?php echo $list['regno']; ?></td>
                                                    <td><?php echo $list['phno']; ?></td>
                                                    <td><?php echo $list['altphno']; ?></td>  
                                                    <td><?php echo $list['parti']; ?></td>  
                                                    <td><?php echo $list['type']; ?></td> 
                                                </tr><?php                                             
                                            } ?>
                                            </table> 
                                        </p>   
                                    <?php                                    
                                ?>                                
                            </div>
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