<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

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
        $event = $_POST['event'];


        $check_query = "SELECT * FROM {$event} WHERE email = '{$email}' ";
        $check_result = mysqli_query($conn, $check_query);
        confirm_query($check_result);
        $check = mysqli_fetch_assoc($check_result);
        if ($check['email']== $email) {
            $check_view = "You have already registered for this event. ";
        } else {

            $message = "Thank You for registering in Vibrance16.. Kindly confirm your registeration by paying at our payment desks in the academic block portico, VIT Chennai Campus.. Regards, Team Vibrance.";
            mail ($email, "Registration for Vibrance16", $message, "From: vibrance2016@gmail.com"); 
            $query = "INSERT INTO {$event} (name, email, college, regno, phno, paid)";
            $query .= " VALUES ('{$name}', '{$email}', '{$college}', '{$regno}', '{$phno}', 1)";
            $result = mysqli_query($conn, $query);  

            if ($result) {
                $check_view = "You have succesfully registered for Vibrance16. Please check your email for registraion slip. Your registraion will only be confirmed after you make the payment at our registration desk.";       
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
        <h1>On Spot Registration</h1>
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
                <select id="mySelect" onchange="myFunction()" name="event" required>
                    <option value="">Select Event</option>
                    <option value="adaptune_alone_100">Adaptune</option>
                    <option value="bollywoodbattle_team_200">Group Dance</option>
                </select>
            </div>
            <div id="demo"></div>
            <input class="button" type="submit" value="Submit" name="submit" />
        </form>
    </section>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
    <script type="text/javascript">
        function myFunction() {
            var event = document.getElementById("mySelect").value;
            if (event=="adaptune_alone_100") {
                document.getElementById("demo").innerHTML = "Individual Event";
            } else if (event=="bollywoodbattle_team_200") {
                var x = document.createElement("INPUT");
                x.setAttribute("type", "number");
                x.setAttribute("value", "1");
                document.body.appendChild(x);
                document.getElementById("demo").innerHTML = x;
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