<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php 
    if (isset($_SESSION["username"])) {
        $current_user = $_SESSION["username"];
        $name_query = "SELECT * FROM users WHERE username = '{$current_user}' LIMIT 1";
        $name_result = mysqli_query($conn, $name_query);
        confirm_query($name_result);
        $name_title = mysqli_fetch_assoc($name_result);
        $first_name = explode(" ", $name_title['name']);            
        $view = "<a href='logout.php'>Logout, ".$first_name[0]."</a>"; 
        $event_view = ""; 
        $login_view = "";      
    } else {
        $current_user = "";  
        $first_name = "";
        $name_title = "";
        $view = "<a href='login/index.php'>Login</a>";  
        $login_view = "<a href='login/index.php' class='gobutton'>Login to register</a>"; 
        $event_view = "style='display: none;'";     
    }   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Drama Club</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <meta name="theme-color" content="#A81C23">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Arvo">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style-slider.css" />
    <link rel="stylesheet" type="text/css" href="css/component-slider.css" />
    <script src="js/modernizr.custom-slider.js"></script>
    <link rel="stylesheet" type="text/css" href="css/backtotop.css">
    <script type="text/javascript" src="js/backtotop.js"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/refreshform.js"></script>
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
    <script type="text/javascript">
    $(document).ready(function() {
        $(".first-header").slideDown("slow");
    });
    </script>
</head>

<body>
    <div class="page" id="0">
        <a href="#0" id="fixed-back" style="display: none;"><img src="images/uparrow.png" title="Back to Top"></a>
        <!--========================================================
                              HEADER
    =========================================================-->
        <header>
            <div id="stuck_container" class="stuck_container">
                <div class="container">
                    <div class="brand">
                        <h1 class="brand_name">
                        <a href="index.php"><img src="images/vib_banner_small.png" style="width: 50%;height: 50%"></a>
                    </h1>
                    </div>
                    <nav class="nav">
                        <ul class="sf-menu">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="aboutus.html">About Us</a>
                            </li>
                            <li>
                            <a href="combo.php">Combo offers</a>
                            </li>
                            <li class="active">
                                <a href="#events">Events</a>
                                <ul>
                                    <li>
                                        <a href="danceclub.php">Dance</a>
                                    </li>
                                    <li>
                                        <a href="games.php">Games</a>
                                    </li>
                                    <li>
                                        <a href="musicclub.php">Music</a>
                                    </li>
                                    <li>
                                        <a href="dramaclub.php">Drama</a>
                                    </li>
                                    <li>
                                        <a href="fineartsclub.php">Fine Arts</a>
                                    </li>
                                    <li>
                                        <a href="informals.php">Informals</a>
                                    </li>
                                    <li>
                                        <a href="formals.php">Formals</a>
                                    </li>
                                    <li>
                                        <a href="tech.php">Tech Events</a>
                                    </li>
                                    <li>
                                        <a href="debnquiz.php">Debates and Quiz</a>
                                    </li>
                                    <li>
                                        <a href="sports.php">Sports</a>
                                    </li>
                                    <li>
                                        <a href="tamil.php">Tamil Events</a>
                                    </li>
                                    <li>
                                        <a href="viteach.php">Viteach Events</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="rules.html">Rules</a>
                            </li>
                            <li>
                                <a href="team.html">Meet the Team</a>
                            </li>
                            <li>
                                <?php echo $view; ?>
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
                    <h2><em>Drama Club</em>EVENTS</h2>
                    <div id="cbp-so-scroller" class="cbp-so-scroller ">
                        <section class="cbp-so-section first-header" style="display:none;">
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#first"><img src="images/adzap.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#second"><img src="images/switch.jpg" alt="img01"></a>
                            </figure>
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">19th March 2016</h2>
                            </article>
                        </section>
                        <section class="cbp-so-section">
                            <article class="cbp-so-side cbp-so-side-left">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-right">
                                <a href="#third"><img src="images/dare.jpg" alt="img01"></a>
                            </figure>
                        </section>
                    </div>
                </div>
            </section>
            <section name="first" class="parallax parallax29" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Adzap</em>Team: 3-7</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Manan Wadhawan &nbsp;&nbsp;&nbsp;9952042242<br><br>Shantanu Tripathi &nbsp;&nbsp;&nbsp;8939549860<br><br>Bhuvnesh &nbsp;&nbsp;&nbsp;9597853206<br><br>Ritesh Goyal &nbsp;&nbsp;&nbsp;9041249225</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Your team will have 1 out of the box product and you have to advertise it in the most unconventional manner.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration Fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration Fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Instructions:
                                <br>
                                <li>Round 1: The team has to advertise a product of their own for about 2 to 3 minutes. The product can be anything. The name of the product should be original and cannot be an existing one. No vulgar product or absurd slogans are allowed. </li>
                                <br>
                                <li>Round 2: Each team will be given a product on the spot. Time of 90 secs will be given for them to prepare for it. The team will be given time 3-5 minutes to advertise the product. No vulgar or absurd slogans are allowed.</li>
                            </p>
                            <p class="indents-3">Rules:
                                <br>
                                <li>The event consists of two rounds.</li>
                                <li>The selected teams will only proceed to only 2.</li>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_adzap" value="adzap_team_50_d" style="display: none;">
                        <center>
                            <select id="parti_adzap" <?php echo $event_view; ?> >
                                <option value="0">Select the number of participants in your team</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                            </select>                            
                        </center>
                        <div style="text-align: center; ">
                            <input id="adzap" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>   
                </div>
            </section>
            <section name="second" class="parallax parallax30" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Switch</em>Team</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Divyam Bajaj &nbsp;&nbsp;&nbsp;7811882373<br><br>Abhishek Mani &nbsp;&nbsp;&nbsp;9968911004<br><br>Dhanush &nbsp;&nbsp;&nbsp;9790927083</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>A team of 2 is required. You and your partner will be given situation or some characters, which you will have to behave like. When the judge says “switch” the roles of the partners will swap.
                                        <br>Bonafide to be produced for external participants.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>2 in a team.</li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Team of 2</li>
                                <li>Preparation time will be 2 minutes</li>
                                <li>Performance time will be 3-4 minutes</li>
                                <li>No vulgar or absurd language is allowed</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_switch" value="switch_team_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="switch" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>       
                </div>
            </section>
            <section name="third" class="parallax parallax31" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Dare to Drama</em>Team</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Rishabh Arya &nbsp;&nbsp;&nbsp;9953502555<br><br>Adwitiya Arora &nbsp;&nbsp;&nbsp;9952040262<br><br>Nayanja Khulbe &nbsp;&nbsp;&nbsp;8939235203</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>This is a treasure hunt with a twist. To get the next clue you don’t need to search around rather you need to act and act right to get through.
                                        <br>Bonafide to be produced for external participants.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>2 in a team.</li>
                                 <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>FIRST OF ALL, REMEMBER IT’S A GAME NOT A WAR SO, “EVERYTHING IS FAIR IN LOVE AND WAR” IDEOLOGIES ARE NOT PROMOTED</li>
                                <li>THE EVENT CAN HAVE ONLY TWO MEMBERS IN A TEAM.
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;* THE GAME IS SIMPLE, EVERY TEAM SHALL BE GIVEN CLUES AT DIFFERENT STEPS TO REACH THE FINAL DESTINATION
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;* AT EVERY STEP A DARE WILL BE GIVEN WHICH THE TEAM NEEDS TO PERFORM
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;* ONCE THE DARE IS COMPLETED AND IF THE COORDINATOR VERIFIES IT, THE TEAM WILL BE GIVEN THE NEXT CLUE.
                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;* THE TEAM WHICH REACHES ‘FIRST’ AT THE LAST STAGE WINS.</li>
                                <li>WE SUPPORT “TIME IS PRIZED” I.e. THERE IS TIME LIMIT AT EVERY STAGE WITHIN WHICH THE DARE HAS TO BE PERFORMED.</li>
                                <li>AT ANY POINT OF THE GAME, NO PARTICIPANT WILL BE ALLOWED TO VIOLATE THE CODE OF CONDUCT.</li>
                                <li>IF VIOLATED, THE TEAM SHALLL BE CONSIDERED OUT OF THE COMPETITION THERE AND THEN.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                     <form>
                        <input type="text" id="event_daretodrama" value="daretodrama_team_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="daretodrama" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>     
                </div>
            </section>
        </main>
        <!--========================================================
                              FOOTER
    =========================================================-->
        <footer style="background-color: #a95858;">
            <br>
            <div class="container-fluid" style="padding-bottom: 2%">
                <ul class="socials">
                    <li>
                        <a href="https://www.facebook.com/Vibrance-2k16-949547601794846/" class="fa fa-facebook"></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/@Vibrance2k16" class="fa fa-twitter"></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/vibrancevituniversity/" class="fa fa-instagram"></a>
                    </li>
                    <li>
                        <a href="#" class="fa fa-youtube"></a>
                    </li>
                </ul>
            </div>
            <br>
        </footer>
    </div>
    <script src="js/script.js"></script>
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
    <script src="js/classie-slider.js"></script>
    <script src="js/cbpScroller.js"></script>
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