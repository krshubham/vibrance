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
    <title>Tech Events</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <meta name="theme-color" content="#A81C23">
    <link rel="icon" href="favicon.png" type="image/x-icon">
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
                    <h2><em>Tech</em>EVENTS</h2>
                    <div id="cbp-so-scroller" class="cbp-so-scroller ">
                        <section class="cbp-so-section first-header" style="display:none;">
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#first"><img src="images/nerd.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#second"><img src="images/treasure.jpg" alt="img01"></a>
                            </figure>
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                        </section>
                        <section class="cbp-so-section">
                            <article class="cbp-so-side cbp-so-side-left">
                                <h2 style="padding-top:20%;">19th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-right">
                                <a href="#third"><img src="images/sankes.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#fourth"><img src="images/aim.jpg" alt="img01"></a>
                            </figure>
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                        </section>
                    </div>
                </div>
            </section>
            <section name="first" class="parallax parallax36" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Nerd or Newbie??</em>Team of 2</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Dhanesh Motwani &nbsp;&nbsp;&nbsp;9962411260<br><br>Sudhanva D. &nbsp;&nbsp;&nbsp;9820505616<br><br>Raghav Kakkar &nbsp;&nbsp;&nbsp;9711572035</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>A gaming quiz event for gaming nerds</p>
                                </li>
                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>"Are you ready to fight?" --- A written question and answer round.</li>
                                <li>"Choose Wisely" --- Option based oral question answers round.</li>
                                <li>"Trust your instincts" --- Audio/Visual round.</li>
                                <li>"Guess and you shall succeed" --- Guess the game or the character from the given clues.</li>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_nerdornewbie" value="nerdornewbie_team_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="nerdornewbie" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>    
                </div>
            </section>
            <section name="second" class="parallax parallax37" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Treasure Hunt</em>Team of 3</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Prasang Sharma &nbsp;&nbsp;&nbsp;8681070970<br><br>Divyang Duhan &nbsp;&nbsp;&nbsp;7837391899<br><br>Aviral Srivastava &nbsp;&nbsp;&nbsp;8004860407<br><br>Modit Garg &nbsp;&nbsp;&nbsp;7837998263</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>A conventional treasure hunt event, with a twist. The event is going to happen on an android app, which will act as a VIRTUAL MAP. On the day of event, participants would be given the android app. They would get all the questions and clues on the app.<br> Teams use their collective brainpower to solve clues. Each clue leads to a question or a location within walking distance where players must find and use a vital piece of information to answer next question.
                                    </p>
                                </li>
                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Each participating team must have at least one android phone (To run the treasure hunt application). </li>
                                <li>Each team must comprise of 3 team members.</li>
                                <li>If anything makes you think, "Is this cheating?", it probably is.  Don't do it.</li>
                                <li>If anything makes you think, "Is this a really clever loophole?", it's probably cheating. Still you can do it to brag about :p </li>
                                <li> If it is discovered that cheating has taken place, sanctions will be imposed or a team could be disqualified.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_treasurehunt" value="treasurehunt_team_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="treasurehunt" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="third" class="parallax parallax38" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Snake and Ladder with Quiz</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Rakesh &nbsp;&nbsp;&nbsp;8681952722<br><br>Varun Kumar Reddy &nbsp;&nbsp;&nbsp;9941679866<br><br>K. Lokesh Reddy &nbsp;&nbsp;&nbsp;9092365073</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>The game is all about the traditional snake and ladder. At a time 3 to 4 players will be playing the event. So the specialty of the program is snake and ladder will be on the same number so if the player goes through that number he will be asked question based on the general knowledge. If the answer is right the player is to select the ladder or else snake much fun.</p>
                                </li>
                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Any argument that leads to disqualification of the participant.Winners will be decided by the end of the day.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_snakeandladder" value="snakeandladder_alone_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="snakeandladder" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form> 
                </div>
            </section>
            <section name="fourth" class="parallax parallax39" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Aim and Act</em>Team of 3</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>G. Vineetha Chowdhary &nbsp;&nbsp;&nbsp;9092959576<br><br>B. Sai Sahithya &nbsp;&nbsp;&nbsp;9750470651<br><br>P. Sai Mounica &nbsp;&nbsp;&nbsp;8608270382<br><br>D. Manaswini &nbsp;&nbsp;&nbsp;7032327575</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Dumshras,Speed Up,Connectify will be played.</p>
                                </li>
                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Round 1:(Guess this)<br>In this round a person from each group of their own choice will enact a selected technical term using whatsapp emojis.And with in the time limit the team members should guess the answer.</li>

                                <li>Round 2:(Connectify)<br>Each group is given a choice to select a folder from thedisplayed,each folder consist of a picture riddle,group members have to identify what the riddle means with in the given time limit.Elimination is there.</li>

                                <li>Round 3:(Dumshras)<br>In this round a person from each group of their own choice will enact a selected technical term from the selected options each group will have 3 chances and marks will be awarded accordingly and elimination takes place as per the marks.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_aimandact" value="aimandact_team_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="aimandact" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
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