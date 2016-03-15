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
    <title>Viteach</title>
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
                            <li class="active">
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="aboutus.html">About Us</a>
                            </li>
                            <li>
                            <a href="combo.php">Combo offers</a>
                            </li>
                            <li>
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
                                    <a href="debnquiz.php">Debates and Quiz</a>
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
                    <h2><em>Viteach</em>EVENTS</h2>
                    <div id="cbp-so-scroller" class="cbp-so-scroller ">
                        <section class="cbp-so-section first-header" style="display:none;">
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#first"><img src="images/tamil_workshop.jpg" alt="img01"></a>
                            </figure>
                        </section>
                    </div>
                </div>
            </section>
            <section name="first" class="parallax parallax90" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Tamil Speaking Workshop</em></h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Senthilnathan &nbsp;&nbsp;&nbsp;9444847024<br><br>Sarvesh &nbsp;&nbsp;&nbsp;9597687488</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:<p> The workshop will be conducted keeping in mind the large non-Tamil speaking crowd that attends VIT and other universities. There have been numerous uncomfortable and sometimes hilarious situations when they try to communicate with the workers/ canteen staff in Tamil. To warm them up to Chennai and give them something to take away when they graduate, an interactive Tamil Speaking Workshop will train them in basic conversational Tamil.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_tamilworkshop" value="tamilworkshop_alone_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="tamilworkshop" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>     
                </div>
            </section>
            <!--<section name="second" class="parallax parallax8" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Paint the World Red</em>Type</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Name &nbsp;&nbsp;&nbsp;Number</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Duration of Event&nbsp;(expected):&nbsp;0&nbsp;hours</li>
                                <li>
                                    <br>
                                </li>
                                <li>Description of Event:
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non lacus dui. Curabitur pharetra sem et felis venenatis, quis porta urna dictum. Nullam tincidunt quis enim vitae imperdiet.</p>
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
            <section name="third" class="parallax parallax9" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Not Another Brick in the Wall</em>Type</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Name &nbsp;&nbsp;&nbsp;Number</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Duration of Event&nbsp;(expected):&nbsp;0&nbsp;hours</li>
                                <li>
                                    <br>
                                </li>
                                <li>Description of Event:
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non lacus dui. Curabitur pharetra sem et felis venenatis, quis porta urna dictum. Nullam tincidunt quis enim vitae imperdiet.</p>
                                </li>
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
                                <li>Coming Soon. :P</li>
                            </p>
                        </div>
                    </div>
                </div>
            </section>-->
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