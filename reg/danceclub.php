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
        $event_view = "<input type='button' id='adaptune' value='register'>";       
    } else {
        $current_user = "";  
        $first_name = "";
        $name_title = "";
        $view = "<a href='login/index.php'>Login</a>";  
        $event_view = "<a href='login/index.php'>Login to register</a>";      
    }  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dance Club</title>
    <meta charset="utf-8">
    <meta name="theme-color" content="#A81C23">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
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
                                        <a href="danceclub.php">Dance</a>
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
                            </li>
                            <li>
                                <a href="rules.html">Rules</a>
                            </li>
                            <li>
                                <a href="#">Meet the Team</a>
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
                                <h2 style="padding-top:20%;">18th March 2016</h2>
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
                                <h2 style="padding-top:20%;">19th March 2016</h2>
                            </article>
                        </section>
                        <section class="cbp-so-section">
                            <article class="cbp-so-side cbp-so-side-left">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
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
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Pragya Gupta &nbsp;&nbsp;&nbsp;9952040969<br><br>Shreya Krishnan &nbsp;&nbsp;&nbsp;9176438911</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Duration of Event&nbsp;(expected):&nbsp;2.5&nbsp;hours</li>
                                <li>
                                    <br>
                                </li>
                                <li>Description of Event:
                                    <p>It is an impromptu dance where the participants have to come up with steps on the spot adapting to the beats of the songs being played, showcasing their beat sense and creativity.</p>
                                </li>
                            </ul>
                            <form>
                                <?php echo $event_view; ?>
                            </form>
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
                </div>
            </section>
            <section name="second" class="parallax parallax5" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Bollywood Battle</em>Group</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Anvesh C. &nbsp;&nbsp;&nbsp;8885999805<br><br>Aishwarya &nbsp;&nbsp;&nbsp;8056517270</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Duration of Event&nbsp;(expected):&nbsp;3 to 4&nbsp;hours</li>
                                <li>
                                    <br>
                                </li>
                                <li>Description of Event:
                                    <p>Gather your friends and challenge them in this face off to prove who adapts to the tune better. no need for preparation as teams will have to dance to on spot music...
                                        <br> Gather your force and challenge them to dance.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 100/-</li>
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
                </div>
            </section>
            <section name="third" class="parallax parallax3" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Dancing Duo</em>Group</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Divi Mendonca &nbsp;&nbsp;&nbsp;9987087816</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Duration of Event&nbsp;(expected):&nbsp;1 to 1.5&nbsp;hours</li>
                                <li>
                                    <br>
                                </li>
                                <li>Description of Event:
                                    <p>Be it a couple or a pair of crazy dancers - showcase your co-ordinated moves to the best 'Dancing Duo'. Competitive Dance event with several groups of 2 people competiting with each other:
                                        <li>&#8226;&nbsp;The duet category will have 2 rounds: prelims and finals.</li>
                                        <li>&#8226;&nbsp;The prelims will have a barrier between teammmates to ensure zero interaction and test co-ordination.</li>
                                        <li>&#8226;&nbsp;Duration: 2-3 min</li>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section name="fourth" class="parallax parallax6" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Group Dance</em>Group</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Anvesh C. &nbsp;&nbsp;&nbsp;8885999805<br><br>Aishwarya &nbsp;&nbsp;&nbsp;8056517270</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Duration of Event&nbsp;(expected):&nbsp;2 to 3&nbsp;hours</li>
                                <li>
                                    <br>
                                </li>
                                <li>Description of Event: Mobs of dancers or a flare of graceful performers - All forms welcome to excite the stage and the crowd.
                                    <p>Registration fees: Rs 200/-
                                        <li>
                                            <br>
                                        </li>
                                        Prize Money:
                                        <li>&#8226;&nbsp;First prize: Rs 15000/-</li>
                                        <li>&#8226;&nbsp;Second prize: Rs 7500/-</li>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Use of inflammable substances, water, sharp objects, etc. as props, will not be entertained.</li>
                                <li>EXPOSURE AND OBSCENE gestures will not be entertained.</li>
                                <br>
                            </p>
                            <p class="indents-3">Judging criteria:
                                <br>
                                <li>One round.</li>
                                <li>Members per team: 5 - 10.</li>
                                <li>Time limit: 3 - 5 minutes.</li>
                                <li>Use of fire, water and sharp objects are not allowed.</li>
                                <li>Dance teams should not use vulgarity in any form.</li>
                                <li>Dance teams will be judged on the criteria of:
                                    <br> &nbsp;&nbsp;&nbsp;&nbsp;i) Coordination
                                    <br> &nbsp;&nbsp;&nbsp;&nbsp;ii) Innovation
                                    <br> &nbsp;&nbsp;&nbsp;&nbsp;iii) Beat Sense
                                    <br> &nbsp;&nbsp;&nbsp;&nbsp;iv) Choreography
                                    <br>
                                </li>
                                <li>MIN 10 MEMBERS MAX 15</li>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section name="fifth" class="parallax parallax11" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Solo Dance</em>Type</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Name &nbsp;&nbsp;&nbsp;Phone No.</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Duration of Event&nbsp;(expected):&nbsp;0&nbsp;hours</li>
                                <li>
                                    <br>
                                </li>
                                <li>Description of Event:
                                    <p>Dance and showcase your talent. One person at a time.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. /-</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Coming Soon. :P</li>
                                <br>
                            </p>
                            <p class="indents-3">Judging criteria:
                                <br>
                                <li>Coming Soon :P</li>
                            </p>
                        </div>
                    </div>
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