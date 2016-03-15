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
    <title>Games</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <meta name="theme-color" content="#A81C23">
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
    <div class="page">
        <header>
            <div id="stuck_container" class="stuck_container">
                <div class="container">
                    <div class="brand">
                        <h1 class="brand_name">
                            <a href="./"><img src="images/vib_banner_small.png" style="width: 50%;height: 50%"></a>
                        </h1>
                    </div>
                    <nav class="nav">
                        <ul class="sf-menu">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="aboutus.php">About Us</a>
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
        <main>
            <section class="well well__offset-3">
                <div class="container">
                    <h2><em>Games</em>EVENTS</h2>
                    <div id="cbp-so-scroller" class="cbp-so-scroller ">
                        <section class="cbp-so-section first-header" style="display:none;">
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">19th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#first"><img src="images/cs.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#second"><img src="images/dota.jpg" alt="img01"></a>
                            </figure>
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th and 19th March 2016</h2>
                            </article>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th and 19th March 2016</h2>
                            </figure>
                            <article class="cbp-so-side cbp-so-side-left">
                                <a href="#third"><img src="images/fifa-intro.jpg" alt="img01" style="height: 50%;"></a>
                            </article>
                        </section>
                    </div>
                </div>
            </section>
            <section name="first" class="parallax parallax46" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Counter Strike 1.6</em>Team of 5</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>C. Aashrith &nbsp;&nbsp;&nbsp;9176727660<br><br>Hari A. &nbsp;&nbsp;&nbsp;9840148083</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>A Classic game of 5 men trying to blow up Sites into Smithereens and another set of 5 trying to stop this from happening.
                                    </p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 500/- for a team of 5.</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>5 on 5 Team game .</li>
                                <li>Bo1 Elimination .</li>
                                <li>Round to 11 (First to 11 Wins)</li>
                                <li>Fade to Black 1</li>
                                <li>No Hops/Scripts .</li>
                                <li>Finals : Best of 3 </li>
                                <li>Maps : Dust 2, Inferno, Train, Mirage(If chosen)</li>
                                <li>Judging : Teams will be drawn randomly and no Support to any Individual/team will take place and any team to Flout any rule will be Disqualified immediately.</li>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_counterstrike" value="counterstrike_team_500_s" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="counterstrike" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form> 
                </div>
            </section>
            <section name="second" class="parallax parallax47" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Dota&nbsp; 2</em>Team of 5</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Daniel Benniah. J. &nbsp;&nbsp;&nbsp;9952973606<br><br>John Silvan Churchill &nbsp;&nbsp;&nbsp;9444884724</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>The computer game DOTA 2</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 500/- for a team of 5.</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>All further rules will be given on-spot.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_dota2" value="dota2_team_500_s" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="dota2" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form> 
                </div>
            </section>
            <section name="third" class="parallax parallax50" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Fifa 15</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%;">Coordinators:<br><br>Aman Saha : &nbsp;&nbsp;&nbsp;9790714125<br><br>Aaditya Singh Rana : &nbsp;&nbsp;8939591893</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>
                                    <br>
                                </li>
                                <li>Description of Event:
                                    <p>There are 4 rounds in the game. The game is a
                                        <br> 2 day event.Round 1 and 2 will finish on Day 1
                                        <br> and Round 3 and 4 will finish on day 2.
                                    </p>
                                </li>
                                <li>Registration fees: Rs. 150 per head. </li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>This is a single player event </li>
                                <li>The player which will win are qualified for round 2.</li>
                                <li>The player which lose get a second chance to face other players who lost in the first chance.</li>
                                <li>Out of these the winning player will qualify for round 2.</li>
                                <li>Round 2: This round is a singles event and knockout stage.</li>
                                <li>Round 3: QUATERFINAL KNOCKOUT SINGLES</li>
                                <li>ROUND 4: SEMI FINAL FINAL</li>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_fifa15" value="fifa15_alone_150_s" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="fifa15" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form> 
                </div>
            </section>
        </main>
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