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
    <title>Dance Club</title>
    <meta charset="utf-8">
    <meta name="theme-color" content="#A81C23">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
                    <h2><em>Dance Club</em>EVENTS</h2>
                    <div id="cbp-so-scroller" class="cbp-so-scroller ">
                        <section class="cbp-so-section first-header" style="display:none;">
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#adapt"><img src="images/adaptune.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#second"><img src="images/bollywood.jpg" alt="img01"></a>
                            </figure>
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">19th March 2016</h2>
                            </article>
                        </section>
                        <section class="cbp-so-section">
                            <article class="cbp-so-side cbp-so-side-left">
                                <h2 style="padding-top:20%;">19th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-right">
                                <a href="#third"><img src="images/duet.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#fourth"><img src="images/group.jpg" alt="img01"></a>
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
                                <a href="#fifth"><img src="images/solo.jpg" alt="img01"></a>
                            </figure>
                        </section>
                    </div>
                </div>
            </section>
            <section name="adapt" class="parallax parallax2" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Adaptune</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Anwesh C. &nbsp;&nbsp;&nbsp;8885999805<br><br>Pragya Gupta &nbsp;&nbsp;&nbsp;9952040969<br><br>Shreya Krishna &nbsp;&nbsp;&nbsp;9176438911</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                
                                <li>
                                    <br>
                                </li>
                                <li>Description of Event:
                                    <p>It is an impromptu dance where the participants have to come up with steps on the spot adapting to the beats of the songs being played, showcasing their beat sense and creativity.<br>Bonafide to be produced for external participants.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration Fees: Rs. 100/- [Internal]</li>
                                <li>Registration Fees: Rs. 100/- [External]</li>
                            </ul>                            
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>The participant has to dance within a certain boundary that will be informed to him/her there and then!</li>
                                <li>Indecent, vulgar dance moves will be penalised by the disqualification of the participant.</li>
                                <li>Use of any kind of props, objects is strictly forbidden.</li>
                                <li>Time limit: 2.5 to 3 mins</li>
                                <li>The jury's decision is the final decision.</li>
                                <li>Songs of different genres and languages will be played and no complaints regarding the music will be entertained.</li>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_adaptune" value="adaptune_alone_100_s" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="adaptune" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>                  
                </div>
            </section>
            <section name="second" class="parallax parallax5" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Bollywood Battle</em>Group</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Karan Seth &nbsp;&nbsp;&nbsp;9962044719<br><br>Karan &nbsp;&nbsp;&nbsp;9176858992<br><br>Aishwarya &nbsp;&nbsp;&nbsp;8056517270</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Gather your friends and challenge them in this face off to prove who adapts to the tune better. no need for preparation as teams will have to dance to on spot music...
                                        <br> Gather your force and challenge them to dance.<br>Bonafide to be produced for external participants.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 100/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Each member of the team must dance at least once (minimum 30 seconds).</li>
                                <li>Team members (3-4).</li>
                                <li>Tracks will be played on spot.</li>
                                <li>Use of inflammable substances, water, sharp objects, etc. as props, will not be entertained.</li>
                                <li>The jury's decision is the final decision.</li>
                                <li>EXPOSURE AND OBSCENE gestures will not be entertained.</li>
                                <br>
                            </p>
                            <p class="indents-3">Judging criteria:
                                <br> The teams will be judged based on:
                                <li>Spontaneity.</li>
                                <li>Non repetition of steps between team members.</li>
                                <li>Kill offs (The way you finish your step and challenge the other team)</li>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_bollywoodbattle" value="bollywoodbattle_team_100_s" style="display: none;">
                        <center>
                            <select id="parti_bollywoodbattle" <?php echo $event_view; ?> >
                                <option value="0">Select the number of participants in your team</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>                            
                        </center>
                        <div style="text-align: center; ">
                            <input id="bollywoodbattle" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>    
                </div>
            </section>
            <section name="third" class="parallax parallax3" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Dancing Duo</em>Group</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Divi Mendonca &nbsp;&nbsp;&nbsp;9987087816<br><br>Shivi Gitey&nbsp;&nbsp;&nbsp;9092691207<br><br>Shreesh S. &nbsp;&nbsp;&nbsp;8124092109</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Be it a couple or a pair of crazy dancers - showcase your co-ordinated moves to the best 'Dancing Duo'. Competitive Dance event with several groups of 2 people competiting with each other:                                        
                                        <li>Use of inflammable substance and sharp objects are strictly prohibited. </li>
                                        <li>No use of any substance that can spoil the stage</li>
                                        <li>Also indecent clothes and indecent or vulgar dance is also prohibited. </li>
                                        <li>Judges decision will be the final decision. "</li>
                                        <li>&#8226;&nbsp;Duration: 3-4 min</li>
                                    <br>Bonafide to be produced for external participants.</p>
                                </li>
                                <li>
                                <br> </li>
                                <li>Registration Fees: 100/- per head. [Internal]</li>
                                <li>Registration Fees: 100/- per head. [External]</li>
                            </ul>
                        </div>
                    </div>
                     <form>
                        <input type="text" id="event_dancingduo" value="dancingduo_team_100_s" style="display: none;">
                        <center>
                            <input type="number" value="2" id="parti_dancingduo" style="display: none;" >                     
                        </center>
                        <div style="text-align: center; ">
                            <input id="dancingduo" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>   
                </div>
            </section>
            <section name="fourth" class="parallax parallax6" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Choreo Night</em>Group</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Ansh &nbsp;&nbsp;&nbsp;9176857902<br><br>Piyush Gupta &nbsp;&nbsp;&nbsp;9362229525<br><br>Shreesh S. &nbsp;&nbsp;&nbsp;8124092109<br><br>Kavita &nbsp;&nbsp;&nbsp;9941173445</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:<p>Mobs of dancers or a flare of graceful performers - All forms welcome to excite the stage and the crowd.<br>Bonafide to be produced for external participants.</p>
                                </li>
                                <li>
                                <br>
                                </li>
                                <li>Registration fees: Rs 3500/- per team. [Internal]</li>
                                <li>Registration fees: Rs 3500/- per team. [External]</li>
                                
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Two rounds (prelims and finals).</li>
                                <li>Members : Max. 20. (On stage)</li>
                                <li>Time limit: 8 minutes.</li>
                                <li>Prelims will take place on 18th Morning.</li>
                                <li>Selected teams will qualify for the finals.</li>
                                <li>Finals will take place on 18th evening at main stage.</li>
                                <li>All the teams should report one hour prior to the event.</li>
                                <li>The track should be submitted in a CD or a Pendrive.</li>
                                <li>Use of fire, water and sharp objects are not allowed.</li>
                                <li>Dance teams should not use vulgarity in any form.</li>
                                <br>
                            </p>
                            <p class="indents-3">Judging criteria:
                                <br>
                                <li>Dance teams will be judged on the criteria of:
                                    <br> &nbsp;&nbsp;&nbsp;&nbsp;i) Coordination
                                    <br> &nbsp;&nbsp;&nbsp;&nbsp;ii) Innovation
                                    <br> &nbsp;&nbsp;&nbsp;&nbsp;iii) Beat Sense
                                    <br> &nbsp;&nbsp;&nbsp;&nbsp;iv) Choreography
                                    <br>
                                </li>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_choreonight" value="choreonight_team_3500_s" style="display: none;">                   
                        <div style="text-align: center; ">
                            <input id="choreonight" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>    
                </div>
            </section>
            <section name="fifth" class="parallax parallax11" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Footloose</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Ansh Shah &nbsp;&nbsp;&nbsp;9176857902<br><br>Akshita Arora &nbsp;&nbsp;&nbsp;9893124662<br><br>Rishabh Puri &nbsp;&nbsp;&nbsp;9952038818</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>It's an opportunity where an individual can compete with other participants by showcasing a prepared dance performance which will be judged in accordance with predefined criteria and within the given time limit.<br>Bonafide to be produced for external participants.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 100/- [Internal]</li>
                                <li>Registration fees: Rs. 100/- [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>The song should be of 2.5 to 3 minutes.</li>
                                <li>Proper dress code should be followed.</li>
                                <li>Costumes have to be approved by coordinators prior to the performance. participants will be informed as to when and how this needs to be done.</li>
                                <li>Indecent, vulgar dance moves will be penalized by the disqualification of the participant.</li>
                                <li>Participants need to inform the coordinators about any props they wish to use, at the time of their registration.</li>
                                <li>Sound tracks need to be submitted an hour before the performances.</li>
                                <br>
                            </p>
                            <p class="indents-3">Judging criteria:
                                <br>
                                <li>Repetitive steps and repetitive creativity will not be appreciated.</li>
                                <li>Extra marks for costumes.</li>
                                <li>Beat sense will be checked.</li>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_footloose" value="footloose_alone_100_s" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="footloose" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
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
                        <!--hello-->
                    </li>
                </ul>
            </div>
            <br>
        </footer>
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