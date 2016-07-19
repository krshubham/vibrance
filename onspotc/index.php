<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?> 
<?php require_once("../includes/functions.php"); ?>

<?php
function confirm_admin_logged_in_here() {
    if (!admin_logged_in()) {
        redirect_to("../admin/index.php");
    }
}
?>
<?php confirm_admin_logged_in_here(); ?>


<?php
$current_user = $_SESSION["username"];
$name_query = "SELECT * FROM admins WHERE username = '{$current_user}' LIMIT 1";
$name_result = mysqli_query($conn, $name_query);
confirm_query($name_result);
$name_title = mysqli_fetch_assoc($name_result);  
$check_view = "";  
?>

<?php
if (($name_title['type']=="payment_admin") | ($name_title['type']=="super_admin")) {
    $view_whole = "";         
} else {
    $view_whole = "style='display: none;'";        
}
?>

<?php
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name']));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
    $college = mysqli_real_escape_string($conn, htmlspecialchars($_POST['college']));
    if (isset($_POST['regno'])) {
        $regno = mysqli_real_escape_string($conn, htmlspecialchars($_POST['regno']));
    } else {
        $regno = "";
    }
    $phno = mysqli_real_escape_string($conn, htmlspecialchars($_POST['phno'])); 
    $altphno = mysqli_real_escape_string($conn, htmlspecialchars($_POST['altphno']));   
    $event = mysqli_real_escape_string($conn, htmlspecialchars($_POST['event']));
    $parti = 1;    
    $opt = mysqli_real_escape_string($conn, htmlspecialchars($_POST['opt']));
    
    if ($opt=="three") {
        $events = $_POST['event1']."+".$_POST['event2']."+".$_POST['event3'];
        $combo = "three";
        $event1 = explode("_", $_POST['event1']);
        $event2 = explode("_", $_POST['event2']);
        $event3 = explode("_", $_POST['event3']);
    } elseif ($opt=="all") {
        $events = "all";
        $combo = "all";
        $event1 = "";
        $event2 = "";
        $event3 = "";
    }   
   
    $billno = "A".rand();
    date_default_timezone_set('Asia/Calcutta');
    $confdate = date("Y/m/d");
    if (($college != "VIT")&&($opt == "three")) {
        $price = 250;
    } elseif (($college == "VIT")&&($opt == "three")) {
       $price = 100;
    } elseif (($college != "VIT")&&($opt == "all")) {
        $price = 500;
    } elseif (($college == "VIT")&&($opt == "all")) {
        $price = 250;
    }
    
    if ($opt == "all") {
        $query = "INSERT INTO combo (name, email, college, regno, phno, altphno, paid, parti, cnfby, type, price, events, confdate)";
        $query .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', '{$altphno}', 1, {$parti}, '{$current_user}', 'all', '{$price}', '{$events}', '{$confdate}')";
        $result = mysqli_query($conn, $query);

        if ($result) {               

            $content = "<!DOCTYPE html> ";
            $content .= "<html> ";
            $content .= "<head> ";
            $content .= "<title>Bill</title> "; 
            $content .= "</head> ";
            $content .= "<body style='overflow: hidden;'> ";    
            $content .= "<div style='background-color: #20202F; margin-right: 230px;'> ";
            $content .= "<header> ";
            $content .= "<img src='http://vitchennaivibrance.com/images/vib_banner_small.png' style='width: 180px;height: 60px;margin-right: 190px;'> ";
            $content .= "<img src='http://vitchennaivibrance.com/images/vit_logo.png' style='width: 150px;height: 60px;'> ";
            $content .= "</header> ";
            $content .= "<h1 style='margin-left: 120px; font-size: 40px; font-weight: 200px; margin-top: -0.5px; margin-bottom: -50px; color: #E85657;' >Vibrance 2016</h1><br> ";
            $content .= "<h3 style='margin-bottom: 0;margin-top: 0; margin-left: 10px; color: #E85657;'>Bill No: <span>".$billno."</span></h3><h3 style='margin-left: 160px;font-size: 18px;font-weight: 40px;margin-top: -2.5px;margin-bottom: 15px; color: #E85657;'>Electronic registration slip</h3> ";
            $content .= "<br> ";
            $content .= "<div style='font-size: 18px;margin-bottom: 12px;padding-bottom: 12px;margin-left: 12px;'> ";
            $content .= "<div style='margin-top: -12px;display: block;margin-right: 10px;margin-left: 10px;margin-bottom: -1px;background-color: #2292A4;'> ";
            $content .= "<form style='font-size: 18px;margin-bottom: 12px;padding-bottom: 12px;margin-left: 12px;'> ";
            $content .= "<table style='border-collapse: collapse;margin-top: 2px;'> ";
            $content .= "<tr style='margin-top: 12px;'> ";
            $content .= "<td style='padding-top: 5px;padding-bottom: 5px; color: #ffffff;'> ";
            $content .= "Event Name: ";
            $content .= "</td> ";
            $content .= "<td style='padding-right: 12px; color: #ffffff;'> ";
            $content .= "<span>".ucfirst($events)." Pass</span> ";
            $content .= "</td> ";
            $content .= "</tr> ";
            $content .= "<tr style='margin-top: 12px;'> ";
            $content .= "<td style='padding-top: 5px;padding-bottom: 5px; color: #ffffff;'>Name of the Participant: </td> ";
            $content .= "<td style='padding-right: 12px; color: #ffffff;'> ".ucfirst($name)."</td> ";
            $content .= "</tr> ";
            $content .= "<tr style='margin-top: 12px;'> ";
            $content .= "<td style='padding-top: 5px;padding-bottom: 5px; color: #ffffff;'>Number of Participant(s): </td> ";
            $content .= "<td style='padding-right: 12px; color: #ffffff;'> ".$parti."</td> ";
            $content .= "</tr> ";
            $content .= "<tr style='margin-top: 12px;'> ";            
            $content .= "</tr> ";
            $content .= "<tr style='margin-top: 12px;'> ";
            $content .= "<td style='padding-top: 5px;padding-bottom: 5px; color: #ffffff;'>Event Registration Fee: </td> ";
            $content .= "<td style='padding-right: 12px; color: #ffffff;'> ".$price."</td> ";
            $content .= "</tr> ";
            $content .= "</table> ";
            $content .= "</div> ";
            $content .= "</form> ";
            $content .= "<div style='height: 10px;'></div> ";
            $content .= "</div> ";
            $content .= "</div> ";
            $content .= "</body> ";
            $content .= "</html>";

                // registration bill html ends

            require '../PHPMailer-master/PHPMailerAutoload.php';

            $mail = new PHPMailer;

            $mail->isSMTP();                                      
            $mail->Host = 'smtp.gmail.com';                       
            $mail->SMTPAuth = true;                               
            $mail->Username = 'vibrancechennai@gmail.com';                   
            $mail->Password = 'NayaWala';               
            $mail->SMTPSecure = 'tls';                            
            $mail->Port = 587;                                    
            $mail->setFrom('vibrancechennai@gmail.com', 'Vibrance Registrations Team');
            $mail->addAddress("$email");       
            $mail->WordWrap = 50; 
            $mail->isHTML(true);                                  

            $mail->Subject = 'Vibrance event registration.';
            $mail->Body    = $content;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
             exit;
            } 
            $check_view = "You have succesfully registered for Vibrance16.";       
        } else {
            echo"Registration failed.";
        }   
    } else {
        $check_query = "SELECT * FROM {$_POST['event1']} WHERE email = '{$email}' ";
        $check_result = mysqli_query($conn, $check_query);
        confirm_query($check_result);
        $check = mysqli_fetch_assoc($check_result);
        $check2_query = "SELECT * FROM {$_POST['event2']} WHERE email = '{$email}' ";
        $check2_result = mysqli_query($conn, $check2_query);
        confirm_query($check2_result);
        $check2 = mysqli_fetch_assoc($check2_result);
        $check3_query = "SELECT * FROM {$_POST['event3']} WHERE email = '{$email}' ";
        $check3_result = mysqli_query($conn, $check3_query);
        confirm_query($check3_result);
        $check3 = mysqli_fetch_assoc($check3_result);    

        if (($check['email']== $email)||($check2['email']== $email)||($check3['email']== $email)) {
        $check_view = "You have already registered for one of these events. ";
        } else {
        
            $query1 = "INSERT INTO {$_POST['event1']} (name, email, college, regno, phno, altphno, paid, parti, cnfby, combo, confdate)";
            $query1 .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', '{$altphno}', 1, {$parti}, '{$current_user}', 'three', '{$confdate}')";
            $result1 = mysqli_query($conn, $query1);    

            $query2 = "INSERT INTO {$_POST['event2']} (name, email, college, regno, phno, altphno, paid, parti, cnfby, combo, confdate)";
            $query2.= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', '{$altphno}', 1, {$parti}, '{$current_user}', 'three', '{$confdate}')";
            $result2 = mysqli_query($conn, $query2);    

            $query3 = "INSERT INTO {$_POST['event3']} (name, email, college, regno, phno, altphno, paid, parti, cnfby, combo, confdate)";
            $query3 .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', '{$altphno}', 1, {$parti}, '{$current_user}', 'three', '{$confdate}')";
            $result3 = mysqli_query($conn, $query3);

            $query = "INSERT INTO combo (name, email, college, regno, phno, altphno, paid, parti, cnfby, type, price, events, confdate)";
            $query .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', '{$altphno}', 1, {$parti}, '{$current_user}', 'three', '{$price}', '{$events}', '{$confdate}')";
            $result = mysqli_query($conn, $query);
        }          
        

        if ($result) {               

            $content = "<!DOCTYPE html> ";
            $content .= "<html> ";
            $content .= "<head> ";
            $content .= "<title>Bill</title> "; 
            $content .= "</head> ";
            $content .= "<body style='overflow: hidden;'> ";    
            $content .= "<div style='background-color: #20202F; margin-right: 230px;'> ";
            $content .= "<header> ";
            $content .= "<img src='http://vitchennaivibrance.com/images/vib_banner_small.png' style='width: 180px;height: 60px;margin-right: 190px;'> ";
            $content .= "<img src='http://vitchennaivibrance.com/images/vit_logo.png' style='width: 150px;height: 60px;'> ";
            $content .= "</header> ";
            $content .= "<h1 style='margin-left: 120px; font-size: 40px; font-weight: 200px; margin-top: -0.5px; margin-bottom: -50px; color: #E85657;' >Vibrance 2016</h1><br> ";
            $content .= "<h3 style='margin-bottom: 0;margin-top: 0; margin-left: 10px; color: #E85657;'>Bill No: <span>".$billno."</span></h3><h3 style='margin-left: 160px;font-size: 18px;font-weight: 40px;margin-top: -2.5px;margin-bottom: 15px; color: #E85657;'>Electronic registration slip</h3> ";
            $content .= "<br> ";
            $content .= "<div style='font-size: 18px;margin-bottom: 12px;padding-bottom: 12px;margin-left: 12px;'> ";
            $content .= "<div style='margin-top: -12px;display: block;margin-right: 10px;margin-left: 10px;margin-bottom: -1px;background-color: #2292A4;'> ";
            $content .= "<form style='font-size: 18px;margin-bottom: 12px;padding-bottom: 12px;margin-left: 12px;'> ";
            $content .= "<table style='border-collapse: collapse;margin-top: 2px;'> ";
            $content .= "<tr style='margin-top: 12px;'> ";
            $content .= "<td style='padding-top: 5px;padding-bottom: 5px; color: #ffffff;'> ";
            $content .= "Event Name: ";
            $content .= "</td> ";
            $content .= "<td style='padding-right: 12px; color: #ffffff;'> ";
            $content .= "<span>".ucfirst($event1[0]).", ".ucfirst($event2[0]).", ".ucfirst($event3[0])." Pass</span> ";
            $content .= "</td> ";
            $content .= "</tr> ";
            $content .= "<tr style='margin-top: 12px;'> ";
            $content .= "<td style='padding-top: 5px;padding-bottom: 5px; color: #ffffff;'>Name of the Participant: </td> ";
            $content .= "<td style='padding-right: 12px; color: #ffffff;'> ".ucfirst($name)."</td> ";
            $content .= "</tr> ";
            $content .= "<tr style='margin-top: 12px;'> ";
            $content .= "<td style='padding-top: 5px;padding-bottom: 5px; color: #ffffff;'>Number of Participant(s): </td> ";
            $content .= "<td style='padding-right: 12px; color: #ffffff;'> ".$parti."</td> ";
            $content .= "</tr> ";
            $content .= "<tr style='margin-top: 12px;'> ";            
            $content .= "</tr> ";
            $content .= "<tr style='margin-top: 12px;'> ";
            $content .= "<td style='padding-top: 5px;padding-bottom: 5px; color: #ffffff;'>Event Registration Fee: </td> ";
            $content .= "<td style='padding-right: 12px; color: #ffffff;'> ".$price."</td> ";
            $content .= "</tr> ";
            $content .= "</table> ";
            $content .= "</div> ";
            $content .= "</form> ";
            $content .= "<div style='height: 10px;'></div> ";
            $content .= "</div> ";
            $content .= "</div> ";
            $content .= "</body> ";
            $content .= "</html>";

                // registration bill html ends

            require '../PHPMailer-master/PHPMailerAutoload.php';

            $mail = new PHPMailer;

            $mail->isSMTP();                                      
            $mail->Host = 'smtp.gmail.com';                       
            $mail->SMTPAuth = true;                               
            $mail->Username = 'vibrancechennai@gmail.com';                   
            $mail->Password = 'NayaWala';               
            $mail->SMTPSecure = 'tls';                            
            $mail->Port = 587;                                    
            $mail->setFrom('vibrancechennai@gmail.com', 'Vibrance Registrations Team');
            $mail->addAddress("$email");       
            $mail->WordWrap = 50; 
            $mail->isHTML(true);                                  

            $mail->Subject = 'Vibrance event registration.';
            $mail->Body    = $content;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
             exit;
            } 
            $check_view = "You have succesfully registered for Vibrance16.";       
        } else {
            echo"Registration failed.";
        }    
    }        
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>On Spot Registration</title>
    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href="http://dev.see8ch.com/see8ch/v3/fonts/ss-social/ss-social.css" rel="stylesheet" />
    <link href="http://dev.see8ch.com/see8ch/v3/fonts/ss-standard/ss-standard.css" rel="stylesheet" />
    <style>
        /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */

        body {
            background: #E85657;
            font-size: 62.5%;
            font-family: 'Lato', sans-serif;
            font-weight: 300;
            color: black;
            overflow-x: hidden; 
        }

        body section {
            background: white;
            /*margin: 60px auto 120px auto;*/
            margin-left: 20em;
            margin-top: 1em;
            margin-bottom: 5em;
            border-top: 15px solid #313A3D;
            text-align: center;
            padding: 50px 0 110px;
            width: 80%;
            max-width: 1100px;
        }

        body section h1 {
            margin-left: 0;
            margin-bottom: 40px;
            font-size: 4em;
            text-transform: uppercase;
            font-family: 'Lato', sans-serif;
            font-weight: 100;
            margin-left: 0;
        }

        form {
            width: 58.33333%;
        }

        form .field {
            width: 100%;
            position: relative;
            margin-bottom: 15px;
        }

        form .field label {
            text-transform: uppercase;
            position: absolute;
            top: 0;
            left: 0;
            background: #313A3D;
            width: 100%;
            padding: 18px 0;
            font-size: 1.45em;
            letter-spacing: 0.075em;
            -webkit-transition: all 333ms ease-in-out;
            -moz-transition: all 333ms ease-in-out;
            -o-transition: all 333ms ease-in-out;
            -ms-transition: all 333ms ease-in-out;
            transition: all 333ms ease-in-out;
        }

        form .field label + span {
            font-family: 'SSStandard';
            opacity: 0;
            color: white;
            display: block;
            position: absolute;
            top: 12px;
            left: 7%;
            font-size: 2.5em;
            text-shadow: 1px 2px 0 #cd6302;
            -webkit-transition: all 333ms ease-in-out;
            -moz-transition: all 333ms ease-in-out;
            -o-transition: all 333ms ease-in-out;
            -ms-transition: all 333ms ease-in-out;
            transition: all 333ms ease-in-out;
        }

        form .field input[type="text"],
        form .field textarea {
            border: none;
            background: #E8E9EA;
            width: 80.5%;
            margin: 0;
            padding: 18px 0;
            padding-left: 19.5%;
            color: #313A3D;
            font-size: 1.4em;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        form .field input[type="text"]#msg,
        form .field textarea#msg {
            height: 18px;
            resize: none;
            -webkit-transition: all 333ms ease-in-out;
            -moz-transition: all 333ms ease-in-out;
            -o-transition: all 333ms ease-in-out;
            -ms-transition: all 333ms ease-in-out;
            transition: all 333ms ease-in-out;
        }

        form .field input[type="text"]:focus,
        form .field input[type="text"].focused,
        form .field textarea:focus,
        form .field textarea.focused {
            outline: none;
        }

        form .field input[type="text"]:focus#msg,
        form .field input[type="text"].focused#msg,
        form .field textarea:focus#msg,
        form .field textarea.focused#msg {
            padding-bottom: 150px;
        }

        form .field input[type="text"]:focus + label,
        form .field input[type="text"].focused + label,
        form .field textarea:focus + label,
        form .field textarea.focused + label {
            width: 18%;
            background: #FD9638;
            color: #313A3D;
        }

        form .field input[type="text"].focused + label,
        form .field textarea.focused + label {
            color: #FD9638;
        }

        form .field:hover label {
            width: 18%;
            background: #313A3D;
            color: white;
        }

        form input[type="submit"] {
            background: #FD9638;
            color: white;
            -webkit-appearance: none;
            border: none;
            text-transform: uppercase;
            position: relative;
            padding: 13px 50px;
            font-size: 1.4em;
            letter-spacing: 0.1em;
            font-family: 'Lato', sans-serif;
            font-weight: 300;
            -webkit-transition: all 333ms ease-in-out;
            -moz-transition: all 333ms ease-in-out;
            -o-transition: all 333ms ease-in-out;
            -ms-transition: all 333ms ease-in-out;
            transition: all 333ms ease-in-out;
        }

        form input[type="submit"]:hover {
            background: #313A3D;
            color: #FD9638;
        }

        form input[type="submit"]:focus {
            outline: none;
            background: #cd6302;
        }
    </style>
    <script src="js/prefixfree.min.js"></script>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/grid.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-migrate-1.2.1.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style-slider.css" />
    <link rel="stylesheet" type="text/css" href="../css/component-slider.css" />
    <script src="../js/modernizr.custom-slider.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/backtotop.css">
    <script type="text/javascript" src="../js/backtotop.js"></script>
</head>

<body><header>
    <div id="stuck_container" class="stuck_container">
        <div class="container">
            <div class="brand">
                <h1 class="brand_name">
                    <a href="index.html">Vibrance'16</a>
                </h1>
            </div>
            <nav class="nav">
                <ul class="sf-menu">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="aboutus.html">About Us</a>
                    </li>
                    <li class="active">
                        <a href="#events">Events</a>
                        <ul>
                            <li>
                                <a href="danceclub.html">Dance</a>
                            </li>
                            <li>
                                <a href="games.html">Games</a>
                            </li>
                            <li>
                                <a href="musicclub.html">Music</a>
                            </li>
                            <li>
                                <a href="dramaclub.html">Drama</a>
                            </li>
                            <li>
                                <a href="fineartsclub.html">Fine Arts</a>
                            </li>
                            <li>
                                <a href="informals.html">Informals</a>
                            </li>
                            <li>
                                <a href="formals.html">Formals</a>
                            </li>
                            <li>
                                <a href="tech.html">Tech Events</a>
                            </li>
                            <li>
                                <a href="debnquiz.html">Debates and Quiz</a>
                            </li>
                            <li>
                                <a href="sports.html">Sports</a>
                            </li>
                            <li>
                                <a href="tamil.html">Tamil Events</a>
                            </li>
                            <li>
                                <a href="viteach.html">Viteach Events</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="rules.html">Rules</a>
                    </li>
                    <li>
                        <a href="#">Meet the Team</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<section id="hire" <?php echo $view_whole; ?> >
    <h1 style="color: #313A3D">On Spot Registration</h1>
    <p><?php echo $check_view; ?></p>
    <form method="post" action="index.php">
        <div class="field name-box">
            <input type="text" id="name" name="name" placeholder="Who Are You?" required />
            <label for="name">Name</label>
        </div>
        <div class="field email-box">
            <input type="text" id="email" name="email" placeholder="name@email.com" required />
            <label for="email">Email</label>
        </div>
        <div class="field name-box">
            <input type="text" id="college" name="college" placeholder="Where do you study?" required />
            <label for="college">College</label>
        </div>
        <div class="field email-box">
            <input type="text" id="regno" name="regno" placeholder="Only for VIT students" />
            <label for="regno">Reg. No.</label>
        </div>
        <div class="field name-box">
            <input type="text" id="phno" name="phno" placeholder="What should I dial?" required />
            <label for="phno">Phone No.</label>
        </div>
        <div class="field name-box">
            <input type="text" id="altphno" name="altphno" placeholder="What if we can't connect?" required />
            <label for="phno">Alternate Phone No.</label>
        </div>
        
        <div class="field">
            <input type="radio" name="opt" value="three" id="tevents" style="color: black;"><font color="black">Three events</font>
            <input type="radio" name="opt" value="all" id="aevents" style="color: black;" ><font color="black">All events</font>
        </div>
        <div class="grid_12" id="events" style="display: none;">
            <div class="field email-box grid_4">
                <select id="mySelect1" name="event1" >
                    <option value="">Select Event</option>                    

                    
                    <option value="entertainmentquiz_team_50_d">Entertainment Quiz</option>
                    <option value="karlpopperdebate_team_50_d">Karl Popper Debate</option>
                    
                    <option value="splitpersonality_alone_50_d">Split Personality</option>
                    <option value="centrestage_alone_50_d">Centre Stage</option>
                    <option value="aircrash_alone_50_d">Air Crash</option>
                    <option value="lapersona_alone_50_d">La Persona</option>
                    
                   
                    <option value="scrabble_team_50_d">Dabble in Scrabble</option>
                    
                    
                    <option value="daretodrama_team_50_d">Dare to Drama</option>
                    
                    
                    
                    <option value="gandhi_team_50_d">Gandhi: How far do you know him?</option>
                    <option value="postermaking_alone_50_d">Poster Making</option>
                    
                   
                    <option value="wastecraft_team_50_d">Wastecraft</option>
                    
                    
                    <option value="blindfolddrawing_alone_50_d">Blind Fold Drawing</option>
                    <option value="dressupyourpartner_team_50_d">Dress Up Your Partner</option>
                    
                    <option value="minutetowin_team_50_d">VIT's Minute to Win it</option>
                    <option value="runforbucks_team_50_d">Run for Bucks</option>
                    
                    
                    
                    
                    <option value="vishwaroopam_team_50_d">Vishwaroopam</option>
                    <option value="veta_team_50_d">Veta</option>
                    
                    <option value="antaksharitelugu_team_50_d">Antakshari TELUGU</option>
                    
                    <option value="rangam_team_50_d">Rangam</option>
                    <option value="begborrowsteal_team_50_d">Beg, Borrow, Steal</option>
                    <option value="comicstrip_alone_50_d">Comic Strip</option>
                    
                    <option value="poetry_alone_50_d">Poetry</option>
                    <option value="jam_alone_50_d">JAM</option>
                    
                    <option value="antaksharihindi_team_50_d">Antakshari HINDI</option>
                    
                    
                    
                    <option value="maathipesavum_alone_50_d">Maathi Pesavum</option>
                    
                    <option value="therikkavidalama_team_50_d">Therikka Vidalama</option>
                    
                    <option value="snakeandladder_alone_50_d">Snake and Ladder with Quiz</option>
                    
                    
                </select>
            </div>
            <div class="field email-box grid_4">
                <select id="mySelect2" name="event2" >
                    <option value="">Select Event</option>
                    
                    
                    <option value="entertainmentquiz_team_50_d">Entertainment Quiz</option>
                    <option value="karlpopperdebate_team_50_d">Karl Popper Debate</option>
                    
                    <option value="splitpersonality_alone_50_d">Split Personality</option>
                    <option value="centrestage_alone_50_d">Centre Stage</option>
                    <option value="aircrash_alone_50_d">Air Crash</option>
                    <option value="lapersona_alone_50_d">La Persona</option>
                    
                    
                    <option value="scrabble_team_50_d">Dabble in Scrabble</option>
                    
                   
                    <option value="daretodrama_team_50_d">Dare to Drama</option>
                    
                    
                    
                    <option value="paintwithoutbrush_team_50_d">Paint Without a Brush</option>
                    <option value="gandhi_team_50_d">Gandhi: How far do you know him?</option>
                    <option value="postermaking_alone_50_d">Poster Making</option>
                   
                   
                    <option value="wastecraft_team_50_d">Wastecraft</option>
                    
                    
                    <option value="blindfolddrawing_alone_50_d">Blind Fold Drawing</option>
                    <option value="dressupyourpartner_team_50_d">Dress Up Your Partner</option>
                    
                    <option value="minutetowin_team_50_d">VIT's Minute to Win it</option>
                    <option value="runforbucks_team_50_d">Run for Bucks</option>
                    
                    
                    
                    
                    
                    <option value="vishwaroopam_team_50_d">Vishwaroopam</option>
                    <option value="veta_team_50_d">Veta</option>
                    
                    <option value="antaksharitelugu_team_50_d">Antakshari TELUGU</option>
                    
                    <option value="rangam_team_50_d">Rangam</option>
                    <option value="begborrowsteal_team_50_d">Beg, Borrow, Steal</option>
                    <option value="comicstrip_alone_50_d">Comic Strip</option>
                    
                    <option value="poetry_alone_50_d">Poetry</option>
                    <option value="jam_alone_50_d">JAM</option>
                    
                    <option value="antaksharihindi_team_50_d">Antakshari HINDI</option>
                    
                    
                    
                    
                    <option value="maathipesavum_alone_50_d">Maathi Pesavum</option>
                   
                    <option value="therikkavidalama_team_50_d">Therikka Vidalama</option>
                    
                    <option value="snakeandladder_alone_50_d">Snake and Ladder with Quiz</option>
                    
                    
                </select>
            </div>
            <div class="field email-box grid_4">
                <select id="mySelect3" name="event3" >
                    <option value="">Select Event</option>
                    
                    
                    <option value="entertainmentquiz_team_50_d">Entertainment Quiz</option>
                    <option value="karlpopperdebate_team_50_d">Karl Popper Debate</option>
                    
                    <option value="splitpersonality_alone_50_d">Split Personality</option>
                    <option value="centrestage_alone_50_d">Centre Stage</option>
                    <option value="aircrash_alone_50_d">Air Crash</option>
                    <option value="lapersona_alone_50_d">La Persona</option>
                    
                    
                    <option value="scrabble_team_50_d">Dabble in Scrabble</option>
                    
                    
                    <option value="daretodrama_team_50_d">Dare to Drama</option>
                    
                    

                    <option value="paintwithoutbrush_team_50_d">Paint Without a Brush</option>
                    <option value="gandhi_team_50_d">Gandhi: How far do you know him?</option>
                    <option value="postermaking_alone_50_d">Poster Making</option>
                    
                    
                    <option value="wastecraft_team_50_d">Wastecraft</option>
                    
                    
                    <option value="blindfolddrawing_alone_50_d">Blind Fold Drawing</option>
                    <option value="dressupyourpartner_team_50_d">Dress Up Your Partner</option>
                    
                    <option value="minutetowin_team_50_d">VIT's Minute to Win it</option>
                    <option value="runforbucks_team_50_d">Run for Bucks</option>
                    
                    
                   
                    
                    <option value="vishwaroopam_team_50_d">Vishwaroopam</option>
                    <option value="veta_team_50_d">Veta</option>
                    
                    <option value="antaksharitelugu_team_50_d">Antakshari TELUGU</option>
                    <option value="rangam_team_50_d">Rangam</option>
                    <option value="begborrowsteal_team_50_d">Beg, Borrow, Steal</option>
                    <option value="comicstrip_alone_50_d">Comic Strip</option>
                    
                    <option value="poetry_alone_50_d">Poetry</option>
                    <option value="jam_alone_50_d">JAM</option>
                    
                    <option value="antaksharihindi_team_50_d">Antakshari HINDI</option>
                    
                    
                    
                    <option value="maathipesavum_alone_50_d">Maathi Pesavum</option>
                    
                    <option value="therikkavidalama_team_50_d">Therikka Vidalama</option>
                    
                    <option value="snakeandladder_alone_50_d">Snake and Ladder with Quiz</option>
                    
                    
                </select>
            </div>
        </div>
        <div id="allevents" style="display: none;"><font color="black"><b>You will be registered for al the dynamic events.</b></font></div><br>
        <p><div><input type="submit" class="button" value="Submit" name="submit" /></div></p>
    </form>
    <p><?php echo $check_view; ?></p>
</section>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript">
    $('#tevents').click(function() {
        $('#events').slideDown();
        $('#allevents').slideUp();
        document.getElementById("mySelect1").setAttribute("required", "");
        document.getElementById("mySelect2").setAttribute("required", "");
        document.getElementById("mySelect3").setAttribute("required", "");
    });  
    $('#aevents').click(function() {
        $('#allevents').slideDown();
        $('#events').slideUp();
        document.getElementById("mySelect1").removeAttribute("required");
        document.getElementById("mySelect2").removeAttribute("required");
        document.getElementById("mySelect3").removeAttribute("required");
    });    
</script>
<script>
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
</script>
<script src="../js/classie-slider.js"></script>
<script src="../js/cbpScroller.js"></script>
<script>
    new cbpScroller(document.getElementById('cbp-so-scroller'));
</script>
</body>
</html>
<?php
if (isset ($conn)){
  mysqli_close($conn);
}
?>