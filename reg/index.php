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
    } else {
        $current_user = "";  
        $first_name = "";
        $name_title = "";
        $view = "<a href='login/index.php'>Login</a>";        
    }  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">

<head>
    <title>Vibrance</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="css/glow.css">
    <link rel="stylesheet" type="text/css" href="css/slideOnload.css">
    <meta name="theme-color" content=" #ff4d4d">
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <link rel="stylesheet" type="text/css" href="css/backtotop.css">
    <script type="text/javascript" src="js/backtotop.js"></script>
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
    <!--*******************************Google analytics*****************************-->
    <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-73543324-1', 'auto');
    ga('send', 'pageview');
    </script>
    <!--******************google analytics end*******************************-->
</head>

<body>
    <style>
    .brand {
        z-index: 3;
        position: relative;
    }
    
    #dot-matrix {
        background: url(http://s14.directupload.net/images/111129/44ga9qid.png);
        height: 103%;
        width: 100%;
        position: absolute;
        top: 0;
        z-index: 1;
    }
    
    .slide-up-fade-in {
        padding-top: 0%;
    }
    </style>
    <div class="page">
        <a href="#0" id="fixed-back" style="display: none;"><img src="images/uparrow.png" title="Back to Top"></a>
        <!--========================================================
                              HEADER
    =========================================================-->
        <header id="0">
            <div id="content"></div>
            <div class="camera_container">
                <div id="camera" class="camera_wrap">
                    <div data-src="images/1.jpg" id="dot-matrix">
                        <div class="camera_caption fadeIn">
                        </div>
                    </div>
                    <div data-src="images/2.jpg" id="dot-matrix">
                        <div class="camera_caption fadeIn">
                        </div>
                    </div>
                    <div data-src="images/3.jpg" id="dot-matrix">
                        <div class="camera_caption fadeIn">
                        </div>
                    </div>
                    <div data-src="images/4.jpg" id="dot-matrix">
                        <div class="camera_caption fadeIn">
                        </div>
                    </div>
                    <div data-src="images/5.jpg" id="dot-matrix">
                        <div class="camera_caption fadeIn">
                        </div>
                    </div>
                    <div data-src="images/6.jpg" id="dot-matrix">
                        <div class="camera_caption fadeIn">
                        </div>
                    </div>
                </div>
                <div class="brand wow fadeIn">
                    <h1 class="brand_name">
                    <img id="shadowfilter" class="slide-up-fade-in" src="images/vib_banner.png">
                </h1>
                </div>
            </div>
            <div class="toggle-menu-container">
                <nav class="nav">
                    <div class="nav_title"></div>
                    <a class="sf-menu-toggle fa fa-bars" href="#"></a>
                    <ul class="sf-menu">
                        <li>
                            <?php echo $view; ?>
                        </li>
                        <li class="active">
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="aboutus.html">About Us</a>
                        </li>
                        <li>
                            <a href="#events">Events</a>
                             <ul id="sf-events-menu">
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
                        <li>
                            <a href="rules.html">Rules</a>
                        </li>
                        <li>
                            <a href="#">Meet the Team</a>
                        </li>
                        <li>
                            <a href="#contacts">Contacts</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div id="dot-matrix"></div>
        </header>
        <!--========================================================
                              CONTENT
    =========================================================-->
        <main>
            <section class="well">
                <div class="container" style="padding-top:-100px;">
                    <h2><em style="line-height:0px;">Pro Shows</em></h2>
                    <div class="row">
                        <div class="grid_6">
                            <div class="img img__border">
                                <div class="lazy-img" style="padding-bottom: 63.0282%;"><img data-src="images/proshow2.jpg" alt=""></div>
                            </div>
                            <p class="center indents-1">Pro-Shows are a huge part of any cultural festival. We at the University promises its audience an atmosphere of immense pleasure and satisfaction leaving them wanting for more. Professionals who are popular within their communities will be present to entertain the crowd.</p>
                        </div>
                        <div class="grid_6">
                            <div class="img img__border">
                                <div class="lazy-img" style="padding-bottom: 63.0282%;"><img data-src="images/proshow1.png" alt=""></div>
                            </div>
                            <p class="center indents-1">Pro-Shows are a huge part of any cultural festival. We at the University promises its audience an atmosphere of immense pleasure and satisfaction leaving them wanting for more. Professionals who are popular within their communities will be present to entertain the crowd.</p>
                        </div>
                    </div>
                    <div class="event-heading-p1"></div>
                </div>
                <div class="gallery">
                    <div name="events" class="gallery_col-1">
                        <a data-fancybox-group="gallery" href="danceclub.html" class="gallery_item thumb lazy-img" style="padding-bottom: 93.96551724137931%;">
                            <img data-src="images/dance.jpg" alt="">
                            <div class="gallery_overlay">
                                <div class="gallery_caption">
                                    <p><em>Dance</em></p>
                                    <p>To showcase grace, poise, rhythm and magnificence at a stage with the added edge of competitive adrenaline.</p>
                                </div>
                            </div>
                        </a>
                        <a data-fancybox-group="gallery" href="informals.html" class="gallery_item thumb lazy-img" style="padding-bottom: 74.13793103448276%;">
                            <img data-src="images/informals.jpg" alt="">
                            <div class="gallery_overlay">
                                <div class="gallery_caption">
                                    <p><em>Informals</em></p>
                                    <p>Integer convallis orci vel mi nelaoreet, at ornare lorem consequat. Phasellus era nisl</p>
                                </div>
                            </div>
                        </a>
                        <a data-fancybox-group="gallery" href="tamil.html" class="gallery_item thumb lazy-img" style="padding-bottom: 94.6551724137931%;">
                            <img data-src="images/tamil.png" alt="">
                            <div class="gallery_overlay">
                                <div class="gallery_caption">
                                    <p><em>Tamil Events</em></p>
                                    <p>Integer convallis orci vel mi nelaoreet, at ornare lorem consequat. Phasellus era nisl</p>
                                </div>
                            </div>
                        </a>
                        <a data-fancybox-group="gallery" href="sports.html" class="gallery_item thumb lazy-img" style="padding-bottom: 94.6551724137931%;">
                            <img data-src="images/sports.jpg" alt="">
                            <div class="gallery_overlay">
                                <div class="gallery_caption">
                                    <p><em>Sports Events</em></p>
                                    <p>Integer convallis orci vel mi nelaoreet, at ornare lorem consequat. Phasellus era nisl</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="gallery_col-2">
                        <a data-fancybox-group="gallery" href="games.html" class="gallery_item thumb lazy-img" style="padding-bottom: 52.48322147651007%;">
                            <img data-src="images/games.jpg" alt="">
                            <div class="gallery_overlay">
                                <div class="gallery_caption">
                                    <p><em>Games</em></p>
                                    <p>Entertainment and hard-work go hand-in-hand to give you games from all walks of life - literally!</p>
                                </div>
                            </div>
                        </a>
                        <a data-fancybox-group="gallery" href="dramaclub.html" class="gallery_item thumb lazy-img" style="padding-bottom: 60.97315436241611%;">
                            <img data-src="images/drama.jpg" alt="">
                            <div class="gallery_overlay">
                                <div class="gallery_caption">
                                    <p><em>Drama</em></p>
                                    <p>Acting started with the first lie. It is inborn. So show-off your oscar- winning performances.</p>
                                </div>
                            </div>
                        </a>
                        <a data-fancybox-group="gallery" href="tech.html" class="gallery_item thumb lazy-img" style="padding-bottom: 65.10738255033557%;">
                            <img data-src="images/tech.jpg" alt="">
                            <div class="gallery_overlay">
                                <div class="gallery_caption">
                                    <p><em>Tech Events</em></p>
                                    <p>Integer convallis orci vel mi nelaoreet, at ornare lorem consequat. Phasellus era nisl</p>
                                </div>
                            </div>
                        </a>
                        <a data-fancybox-group="gallery" href="debnquiz.html" class="gallery_item thumb lazy-img" style="padding-bottom: 65.10738255033557%;">
                            <img data-src="images/debnquiz.jpg" alt="">
                            <div class="gallery_overlay">
                                <div class="gallery_caption">
                                    <p><em>Debates and Quiz Events</em></p>
                                    <p>Integer convallis orci vel mi nelaoreet, at ornare lorem consequat. Phasellus era nisl</p>
                                </div>
                            </div>
                        </a>
                        <br>
                        <br>
                        <br>
                        <br>
                        <h6><em style="font-size: 3em;">Events</em></h6>
                    </div>
                    <div class="gallery_col-3">
                        <a data-fancybox-group="gallery" href="musicclub.html" class="gallery_item thumb lazy-img" style="padding-bottom: 93.69676320272572%;">
                            <img data-src="images/sing.jpg" alt="">
                            <div class="gallery_overlay">
                                <div class="gallery_caption">
                                    <p><em>Music</em></p>
                                    <p>A call to all the nightingales and instrumentalists to display their talents in front of professionals who excel at the same.</p>
                                </div>
                            </div>
                        </a>
                        <a data-fancybox-group="gallery" href="formals.html" class="gallery_item thumb lazy-img" style="padding-bottom: 72.23168654173765%;">
                            <img data-src="images/workshop.jpg" alt="">
                            <div class="gallery_overlay">
                                <div class="gallery_caption">
                                    <p><em>Formals</em></p>
                                    <p>Integer convallis orci vel mi nelaoreet, at ornare lorem consequat. Phasellus era nisl</p>
                                </div>
                            </div>
                        </a>
                        <a data-fancybox-group="gallery" href="fineartsclub.html" class="gallery_item thumb lazy-img" style="padding-bottom: 93.69676320272572%;">
                            <img data-src="images/finearts.jpg" alt="">
                            <div class="gallery_overlay">
                                <div class="gallery_caption">
                                    <p><em>Fine Arts</em></p>
                                    <p>Integer convallis orci vel mi nelaoreet, at ornare lorem consequat. Phasellus era nisl</p>
                                </div>
                            </div>
                        </a>
                        <a data-fancybox-group="gallery" href="fineartsclub.html" class="gallery_item thumb lazy-img" style="padding-bottom: 93.69676320272572%;">
                            <img data-src="images/viteach.jpg" alt="">
                            <div class="gallery_overlay">
                                <div class="gallery_caption">
                                    <p><em>VITeach Events</em></p>
                                    <p>Integer convallis orci vel mi nelaoreet, at ornare lorem consequat. Phasellus era nisl</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <section class="parallax parallax1" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Our </em>Experience</h2>
                    <p class="indents-2">Vibrance'15 was an event of high grandeur. Every aspect of the event has given the students of the university ever-lasting memories of fun, experience and success. Learning from failures or reminiscing success is what our cultural fests have always been about. After last year's extravaganza, every student was pumped up to continue with academics after a refreshingly productive break.</p>
                </div>
            </section>
            <section class="well well__offset-1 bg-1">
                <div class="container">
                    <h2><em>Our </em>Patrons</h2>
                    <div class="row row__offset-1">
                        <div class="grid_4">
                            <figure>
                                <div class="img lazy-img" style="padding-bottom: 101.0810810810811%;"><img data-src="images/gv.jpg" alt=""></div>
                                <figcaption>Dr. G. Viswanathan</figcaption>
                            </figure>
                            <h3>Chancellor</h3>
                            <p>The founder-chancellor of VIT University was born on December 8, 1938 in a remote village near Vellore in Tamil Nadu. His life is a source of inspiration to the modern- day youth. He is a man of profound knowledge whose aim has been to get his students to the peak of their capabilities. Every student at VIT University is given ample opportunities to prove his academic and cultural excellence. This is well encouraged and supported in all means by our chancellor.</p>
                        </div>
                        <div class="grid_4">
                            <figure>
                                <div class="img lazy-img" style="padding-bottom: 101.0810810810811%;"><img data-src="images/vp.jpg" alt=""></div>
                                <figcaption>Mr. Sankar Viswanathan</figcaption>
                            </figure>
                            <h3>Vice President</h3>
                            <p>After his Advanced Diploma in Engineering Technology, at Chisholm Institute, Melbourne, Australia - he has held the honoured position as Chairman of Vellore Engineering College, before taking over as Pro-Chancellor (Academic VIT). He has travelled a lot and done the knowledge transfer, to the VIT. Though he is a man with a lot of responsibilities, it is one of his biggest priorities to be present whenever there is an event at our campus to shower us with all his support.</p>
                        </div>
                        <div class="grid_4">
                            <figure>
                                <div class="img lazy-img" style="padding-bottom: 101.0810810810811%;"><img data-src="images/avp.jpg" alt=""></div>
                                <figcaption>Ms. Kadhambari S. Viswanathan</figcaption>
                            </figure>
                            <h3>Assistant Vice President</h3>
                            <p>On completion of her Masters degree in Health Science, from the prestigious Bloomberg School of Public Health at Johns Hopkins University, Baltimore, USA. She has been honoured by the 'Limca Book of Records' as the youngest biographer. She is fully committed to the enrichment of the university and is completely involved with all activities in college. She encourages participation in intercollegiate events by fuelling us with constant support and is always available to the members of the University.</p>
                        </div>
                    </div>
                    <div style="cursor:pointer" name="contacts" id="contact_click">
                        <button class="btn-contacts" style="vertical-align:middle"><span>Contact Us</span></button>
                    </div>
                </div>
            </section>
            <section id="divcontact" style="display:none;" class="well well__offset-2">
                <div class="container center">
                    <h2><em><span style="font-family: 'Arvo', serif;">VIT University </span></em>Chennai Campus</h2>
                    <p class="indents-2">VIT University Chennai Campus
                        <br> Vandalur - Kelambakkam Road
                        <br> Chennai - 600 127
                        <br>
                        <address class="address-1">
                            <dl>
                                <dt>Email:</dt>
                                <dd>vibrance2k16.vit@gmail.com</dd>
                            </dl>
                            <p><em>+91 44 3993 1555</em></p>
                        </address>
                </div>
            </section>
        </main>
        <!--========================================================
                              FOOTER
    =========================================================-->
        <footer>
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
    </div>
    </footer>
    </div>
    <script src="js/script.js"></script>
    <script type="text/javascript">
    $('#contact_click').click(function() {
        $('#divcontact').slideDown();
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
</body>

</html>
<?php
    if (isset ($conn)){
      mysqli_close($conn);
    }
?>