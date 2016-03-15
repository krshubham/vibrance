<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_admin_logged_in(); ?>
<?php
$spend_query = "SELECT * FROM spend ";
$spend_result = mysqli_query($conn, $spend_query);
confirm_query($spend_result);
while ($spend_title = mysqli_fetch_assoc($spend_result)) {
    $table = $spend_title['event'];
    $event_query = "SELECT SUM(price) AS total_price FROM {$table} WHERE paid = 1 ";
    $event_result = mysqli_query($conn, $event_query);
		//confirm_query($event_result);
    while($event_list = mysqli_fetch_assoc($event_result)){
       $price_total = $event_list['total_price'];

       $event_table = $spend_title['event'];
       $event_part = explode("_", $event_table);
       $update_query = "UPDATE spend SET income = {$price_total} WHERE event = '{$event_table}' ";
       $update_result = mysqli_query($conn, $update_query);
            //confirm_query($update_result);  	
   }
}

$combo_query = "SELECT SUM(price) AS total_combo_price FROM combo WHERE paid = 1 ";
$combo_result = mysqli_query($conn, $combo_query);
$combo_list = mysqli_fetch_assoc($combo_result);
?>

<?php
$current_user = $_SESSION["username"];
$name_query = "SELECT * FROM admins WHERE username = '{$current_user}' LIMIT 1";
$name_result = mysqli_query($conn, $name_query);
confirm_query($name_result);
$name_title = mysqli_fetch_assoc($name_result);   

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Income</title>
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
                            <a href="event_admin.php">Participants</a>
                        </li>
                        <li>
                            <a href="onspote/index.php">On Spot Registration</a>
                        </li>
                        <li>
                            <?php echo "<a href='logout_admin.php'>Logout, ".$name_title['username']."</a>"; ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main <?php echo $view_whole; ?> >
        <section class="well well__offset-3">
            <div class="container">
                <h2><em>Accounts</em>Income</h2>
                <div class="row row__offset-2">
                    <center>
                        <div id="htmlexportPDF">
                            <h3>Accounts</h3>
                            <?php

                            $query = "SELECT * FROM spend ";
                            $result = mysqli_query($conn, $query);
                            confirm_query($result); ?>                                
                            <p>
                                <table id="exportPDF">
                                    <tr>
                                        <th>Event</th>                                                    
                                        <th>Income</th>           
                                    </tr><?php
                                    while ($list = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php $event_name = explode("_", $list['event']); echo ucfirst($event_name[0]); ?></td>

                                        <td class="count-me"><?php echo $list['income']; ?></td>             
                                    </tr><?php                                             
                                } ?>
                            </table> 
                        </p>   
                        <?php                                    
                        ?>
                        <p>
                            <h3>Total income from events = Rs. <span id="total"></span> </h3>
                        </p>
                        <p>Total income from combos = Rs. <?php echo $combo_list['total_combo_price']; ?></p>
                    </div>    
                    <button onclick="javascript:htmltopdf();">Export PDF</button>
                </center>
            </div>
        </div>
    </section>
</main>
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

