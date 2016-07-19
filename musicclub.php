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
    <title>Music Club</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <meta name="theme-color" content=" #0000ff">
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

        <main>
            <section class="well well__offset-3">
                <div class="container">
                    <h2><em>Music Club</em>EVENTS</h2>
                    <div id="cbp-so-scroller" class="cbp-so-scroller ">
                        <section class="cbp-so-section first-header" style="display:none;">
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#first"><img src="images/dumb.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#second"><img src="images/soundhunt.jpg" alt="img01"></a>
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
                                <a href="#third"><img src="images/rap.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#fourth"><img src="images/lyric.jpg" alt="img01"></a>
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
                                <a href="#fifth"><img src="images/artiste.jpg" alt="img01"></a>
                            </figure>
                        </section>
                    </div>
                </div>
            </section>
            <section name="first" class="parallax parallax7" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Dumb Charades</em>Team</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Sarvansh Prasher &nbsp;&nbsp;&nbsp;9952038260<br><br>A. Sangeetha &nbsp;&nbsp;&nbsp;8754178466<br><br>Rishabh Yadav&nbsp;&nbsp;&nbsp;9453033738<br><br>Poornima Kapoor &nbsp;&nbsp;&nbsp;9092972209</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:<p>The traditional Dumb Charades is a Movie Guessing game, which involves different teams. In the form most played, it is an acting game in which one player acts out a word or phrase by miming similar sounding words, and the other players guess the word or phrase. The 2.0 version includes few more surprises in the event.<br>Bonafide to be produced for external participants.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 50/- per participant. [Internal]</li>
                                <li>Registration fees: Rs. 50/- per participant. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>4 to 5 rounds (depending on number of registrations; first 2 or 3 rounds will be elimination rounds)</li>
                                <li>One participant per team will be allowed to act at a time.</li>
                                <li>The participant acting, cannot talk or murmur. Lip sync is not allowed. It will lead to deduction in points.</li>
                                <li>The participants will have to act out the name by using different gestures, facial expressions, and body language.</li>
                                <li>Breaking words into parts is allowed but the word/s  cannot be broken down into single letters; will lead to points deduction (e.g. if the word is “ear” the word cannot be broken like “e” , “a”, “r”) . Also gestures signifying alphabets will lead to deduction in points.</li>
                                <li>Total 90 seconds will be given to the teams to guess the phrase/movie/song (depending upon the round).</li>
                                <li>Any kind of unruly or vulgar gestures will lead to disqualification of the team.</li>

                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_dumbcharades" value="dumbcharades_team_50_s" style="display: none;">   
                        <center>
                            <select id="parti_dumbcharades" <?php echo $event_view; ?> >
                                <option value="1">Select the number of participants in your team</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>                            
                        </center>                   
                        <div style="text-align: center; ">
                            <input id="dumbcharades" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="second" class="parallax parallax8" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Sound Hunt</em>Team</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Madhav Bhatia &nbsp;&nbsp;&nbsp;99628759270<br><br>Aseem Sameer &nbsp;&nbsp;&nbsp;8939490614<br><br>Shivam Kartikeya &nbsp;&nbsp;&nbsp;9710408175<br><br>Alex Martin &nbsp;&nbsp;&nbsp;8124334394</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:<p>In this event, a list of 30-40 sounds will be given to a team, and in a time period of 1 hour or one and half hour (depending on the registration), they have to record a video of the sound, along with their faces in the video, so that the participants don’t cheat.<br>Bonafide to be produced for external participants.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Team of 3.</li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 50/- per participant. [Internal]</li>
                                <li>Registration fees: Rs. 50/- per participant. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>The list will be provided during the event itself. As soon as they get the list, the time starts. </li>
                                <li>People have to record a video (max. 10-15 seconds) which should have the sound, along with the faces of all the participants so as to avoid any malpractice. </li>
                                <li>After the time gets over, people have to assemble back and submit all the recordings. The coordinators will be present along with their laptops.</li>
                                <br>
                            </p>

                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_soundhunt" value="soundhunt_team_50_s" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="soundhunt" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="third" class="parallax parallax9" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Super Singer</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Sagorika Nandi &nbsp;&nbsp;&nbsp;8220189964<br><br>Parthivi Gupta &nbsp;&nbsp;&nbsp;9472921021</h4>
                    <div class="row">
                        <div class="grid_4">
                            <ul class="indents-3">
                                <li>Description of Event:<p>Showcase your talent by mesmerising all, by hitting the correct notes in an awe inspiring melody.<br>Bonafide to be produced for external participants. </p>
                                </li>

                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 100/- per participant. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per participant. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_4">
                            <p class="indents-3">Rules:
                                <br>
                                <li>A maximum time limit of 3 minutes must be adhered to, which otherwise may lead to disqualification.</li>
                                <li>Song of any genre is permitted.</li>
                                <li>Singers may be accompanied by any one instrumentalist, sing with a karaoke, or not avail any of those.</li>
                                <li>A screening round may be held depending upon the number of registrations.</li>
                                <li>A second round may be held based on the number of registrations where the singers would be asked to sing a song belonging to any genre by the judges.</li>
                                <br>
                            </p>                            
                        </div>
                        <div class="grid_4">
                            <p>
                            Varun Parandhaman is an Indian musician and songwriter based in Chennai, Tamil Nadu. He, along with fellow singer/songwriter Josh Vivian, co-founded Namma Ooru Boy Band (NOBB), the first ever Tamil Boy Band in Chennai with their single "Cosmopolitan" being a massive hit. He has sung back-up for reputed music directors in the industry today such as A. R. Rahman, D. Imman, Anirudh Ravichander, Pradeep Vijay, Sean Roldon, Siddharth Vipin etc and has collaborated and produced music for various artists based in Chennai. After his success with Cosmopolitan, he gained another milestone in Tamil film music with his work "Takku Takku" and many others.
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_supersinger" value="supersinger_alone_100_s" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="supersinger" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="fourth" class="parallax parallax10" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Battle of Bands</em>Team</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Rhys Axl Pereira &nbsp;&nbsp;&nbsp;9677274230<br><br>Abhilash Mohanty&nbsp;&nbsp;&nbsp;8678931994<br><br>Abhayjeet&nbsp;&nbsp;&nbsp;9176858568</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:<p> The event will be divided into two main categories: Western Music Bands and Indian Music Bands.<br>Bonafide to be produced for external participants.</p></li>

                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 1000/- per band <br> ("Minimum of 3 members, max no limit.")</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Both events will take place one after the other with 20 minutes allocated to each band: 15 Onstage time and 5 for soundcheck.</li>
                                <li>Distortion and double bass will be allowed.Common band members will be allowed.Own compositions are recommended.</li>
                                <li>No use of foul language.</li> 
                                <li>Screening of external participants will take place through online video submission through email and auditions for internal participants.</li> 
                                <li>Two winners in each individual genre will be selected.</li>
                                <li>Kindly submit your videos on vibrance16.battleofbands@gmail.com </li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                    <input type="text" id="event_battleofbands" value="battleofbands_team_1000_s" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="battleofbands" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="fifth" class="parallax parallax85" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>The Artist&eacute;</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Pranesh &nbsp;&nbsp;&nbsp;8754563804<br><br>Aarushi Shonik &nbsp;&nbsp;&nbsp;9952039297<br><br>Gyanu Gautam &nbsp;&nbsp;&nbsp;07033584042</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event: <p>Mesmerize the judges and crowd with the magical sound of instruments. If you know how to play any instrument and wish to embezzle people " Artist&eacute; " is the right event to choose. In this event participants have to showcase their talent in their own choice of instrument. Again the time limit is 3 minutes. If the number of participants is more, then a screening round would be held which would be decided later.<br>Bonafide to be produced for external participants.</p></li>
                                <li><br></li>
                                <li>Registration fees: Rs. 100/- per participant. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per participant. [External]</li>

                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Any instrument can be played.</li>
                                <li>A screening round may be held depending on number of registrations.</li>
                                <li>A maximum time limit of 4 minutes must be adhered to. Otherwise may lead to disqualification.</li>
                                <li>Any genre of music can be played.</li>
                                <li>Accompaniying Karoke track is allowed.</li>
                                <li>Prelims will be conducted.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_artiste" value="artiste_alone_100_s" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="artiste" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
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