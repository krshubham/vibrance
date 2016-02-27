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
?>

<?php
    if ($name_title['type']=="event_admin") {
        $view_whole = "";  
        $last_name = explode("_", $current_user);
        $event_name = $last_name[1]."_".$last_name[2]."_".$last_name[3];         
    } else {
        $view_whole = "style='display: none;'";  
        $event_name = "";      
    }
    if ($last_name[2]=="alone") {        
        $view_parti = "style='display: none;'";
    } else {        
        $view_parti = "";
    }  
?>

<?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $college = $_POST['college'];
        if (isset($_POST['regno'])) {
            $regno = $_POST['regno'];
        } else {
            $regno = "";
        }
        $phno = $_POST['phno'];        
        if ($last_name[2]=="alone") {
            $parti = 1;            
        } else {
            $parti = $_POST['parti'];            
        }        
        if ($parti==1) {
            $event_type = "Individual";
        } else {
            $event_type = "Team";
        }
        $price = $parti*$last_name[3];
        $billno = "A".rand();        

        $check_query = "SELECT * FROM {$event_name} WHERE email = '{$email}' ";
        $check_result = mysqli_query($conn, $check_query);
        confirm_query($check_result);
        $check = mysqli_fetch_assoc($check_result);
        if ($check['email']== $email) {
            $check_view = "You have already registered for this event. ";
        } else {

            $query = "INSERT INTO {$event_name} (name, email, college, regno, phno, paid, parti, cnfby)";
            $query .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', 1, {$parti}, '{$current_user}')";
            $result = mysqli_query($conn, $query);  

            if ($result) {

                // registration bill html code starts

                $content = "<!DOCTYPE html> ";
                $content .= "<html> ";
                $content .= "<head> ";
                $content .= "<title>Bill</title> "; 
                $content .= "</head> ";
                $content .= "<body style='overflow: hidden;'> ";    
                $content .= "<div style='background-color: #20202F; margin-right: 230px;'> ";
                $content .= "<header> ";
                $content .= "<img src='http://vitchennaivibrance.com/reg/images/vib_banner_small.png' style='width: 180px;height: 60px;margin-right: 190px;'> ";
                $content .= "<img src='http://vitchennaivibrance.com/reg/images/vit_logo.png' style='width: 150px;height: 60px;'> ";
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
                $content .= "<span>".ucfirst($last_name[1])."</span> ";
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
                $content .= "<td style='padding-top: 5px;padding-bottom: 5px; color: #ffffff;'>Event Type: </td> ";
                $content .= "<td style='padding-right: 12px; color: #ffffff;'> ".$event_type."</td> ";
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


                $check_view = "You have succesfully registered for Vibrance16. ";       
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
        color: #B6B6B6;
    }
    
    body section {
        background: white;
        margin: 60px auto 120px;
        border-top: 15px solid #313A3D;
        text-align: center;
        padding: 50px 0 110px;
        width: 80%;
        max-width: 1100px;
    }
    
    body section h1 {
        margin-bottom: 40px;
        font-size: 4em;
        text-transform: uppercase;
        font-family: 'Lato', sans-serif;
        font-weight: 100;
    }
    
    form {
        width: 58.33333%;
        margin: 0 auto;
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
</head>

<body>

    <section id="hire" <?php echo $view_whole; ?> >
        <h1>On Spot Registration &nbsp;<?php echo ucfirst($last_name[1]); ?></h1>
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
            <div class="field name-box">
                <input type="text" id="regno" name="regno" placeholder="Only for VIT students" />
                <label for="regno">Reg. No.</label>
            </div>
            <div class="field name-box">
                <input type="text" id="phno" name="phno" placeholder="What should I dial?" required />
                <label for="phno">Phone No.</label>
            </div>   
            <div class="field name-box">
            <input type="number" placeholder="Team Size" min="2" name="parti" <?php echo $view_parti; ?> >
            </div>         
            
            <input class="button" type="submit" value="Submit" name="submit" />
        </form>
    </section>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>

</html>
<?php
    if (isset ($conn)){
      mysqli_close($conn);
    }
?>