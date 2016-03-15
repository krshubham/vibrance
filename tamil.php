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
    <title>Tamil Events</title>
    <meta charset="utf-8">
    <meta name="theme-color" content="#A81C23">
    <meta name="format-detection" content="telephone=no" />
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
    <link rel="stylesheet" type="text/css" href="css/backtotop.css">
    <script type="text/javascript" src="js/backtotop.js"></script>
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
                    <h2><em>Tamil</em>EVENTS</h2>
                    <div id="cbp-so-scroller" class="cbp-so-scroller ">
                        <section class="cbp-so-section first-header" style="display:none;">
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#first"><img src="images/tamiliya.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#second"><img src="images/block.jpg" alt="img01"></a>
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
                                <a href="#third"><img src="images/tamilword.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#fourth"><img src="images/tamilquiz.jpg" alt="img01"></a>
                            </figure>
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">19th March 2016</h2>
                            </article>
                        </section>
                    </div>
                </div>
            </section>
            <section name="first" class="parallax parallax32" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Hello Thamizha</em>Team of 2-3</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Sonali N. &nbsp;&nbsp;&nbsp;9566085482<br><br>Sowmiyasree R R &nbsp;&nbsp;&nbsp;9952971039<br><br>Aishvarya R &nbsp;&nbsp;&nbsp;9025099967</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>A fun event completely based on the knowledge of Tamil words, songs and acting skills, humour sense.</p>
                                </li>
                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Round1: Song Paadu<br>- General Rules of Tamil Antakshari<br>- No Elimination</li>
                                <br>
                                <li>Round2: Joint Adi<br>- a Tamil letter will be given to the team and the participants can form any number of words using it as prefix &amp; suffix of words.<br>- Elimination based on marks awarded by the Juries.</li>
                                <br>
                                <li>Round 3: Channel Maathu<br>- As the names of television channels are spelled out, team member must act like the people on screen in that channel say like a cartoon or newsreader or serial actor.<br>- Elimination based on marks awarded by the Juries</li>
                                <br>
                                <li>Round 4: Scene Podu<br>- A situation will be given to a team and participants should act the way like the personality specified/choosen.<br>- Elimination based on marks awarded by the Juries</li>
                                <br>
                                <li>Final Round: Thaakurom Thookurom<br>- A list of Tamil words will be given to 1 in a team, and the other should find out the words based on the clues given by the team member.</li>
                                <br>
                                <li>Tie Breaker: Forming words from given tamil letters</li>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_hellothamizha" value="hellothamizha_team_50_d" style="display: none;">
                        <center>
                            <select id="parti_hellothamizha" <?php echo $event_view; ?> >
                                <option value="0">Select the number of participants in your team</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>                            
                        </center>
                        <div style="text-align: center; ">
                            <input id="hellothamizha" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>    
                </div>
            </section>
            <section name="second" class="parallax parallax33" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Maathi Pesavum</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Vedhavel &nbsp;&nbsp;&nbsp;9444306908<br><br>Keerti M &nbsp;&nbsp;&nbsp;9677593250</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:<p>On a given topic, the participants are required to speak in support for a particular period of time and when the judge gives the signal, has to go against the topic in mid sentence.</p>
                                </li>
                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- pe head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>The time shall be reduced by 10-15 seconds every time the judge gives the signal.</li>
                                <li>Total time at the beginning: 3 minutes.</li>
                                <li>The person who can last the longest time without repeating the points is considered the winner.</li>

                             <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_maathipesavum" value="maathipesavum_alone_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="maathipesavum" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="third" class="parallax parallax34" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Merasalaaitan</em>Team of 2-4</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Priyanka R &nbsp;&nbsp;&nbsp;9789121477<br><br>K.P. Komalavalli &nbsp;&nbsp;&nbsp;9043195088<br><br>Vishnu Priya &nbsp;&nbsp;&nbsp;7418930295</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>There are 5 rounds involving translations from Tamil to “namma Madras Tamil” tamil to english and word to senthamizh enacting the word given to your team,finding out the maximum words from the picture identifying the word from the picture your team member draws. The last round will be identifying the actors directors etc from the given tamil movie dialogue, BGM/Karoke (buzzer round).</p>
                                </li>
                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- pe head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>ROUND 1: <br>Spot the maximum number of words from the displayed picture.</li>
                                <li>ROUND 2: <br>Translation of words: * Normal Tamil to Madras Tamil * Normal Tamil to Senthamizl * English to Tamil 
                                <li>ROUND 3: Joint Family Round (Pictorial connections).</li> 
                                <li>ROUND 4: Pictorial Representation The teams will be given with the tamil word. They should draw some related pictures to identity the given tamil word.</li> 
                                <li>ROUND 5: BUZZER ROUND * Movie Dialogue * BGM/Karaoke.<br> The team should find the Movie name, Director name, Actor.</li>
                                <br>
                            </p>                            
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_merasalaaitan" value="merasalaaitan_team_50_d" style="display: none;">
                        <center>
                            <select id="parti_merasalaaitan" <?php echo $event_view; ?> >
                                <option value="0">Select the number of participants in your team</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>                            
                        </center>
                        <div style="text-align: center; ">
                            <input id="merasalaaitan" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>    
                </div>
            </section>
            <section name="fourth" class="parallax parallax35" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Therikka Vidalama</em>Team of 2-3</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Keerthana V. &nbsp;&nbsp;&nbsp;8870094518</h4>
                    <div class="row">   
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>An entertaining game show based on Tamil cinema. There are 4 rounds.</p>
                                </li>
                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- pe head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Time constraint for each round is applicable.</li> 
                                <li>Rounds: <br>1. Konjam Nadinga Boss: This round is similar to dumb charades to find the cine songs (No elimination). <br>2.Adrasaka: Find the movie name by giving clue of 3 words (only tamil words, Elimination based on scores). <br>3. Mathi Yosi: Find the song from the given shuffled lyrics of the cine song (Elimination based on scores). <br>4.Connection Killadi:(Final Round) Find the similarity from the list of videos, Winner based on top score.</li>
                                <br>
                            </p>                            
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_therikkavidalama" value="therikkavidalama_team_50_d" style="display: none;">
                        <center>
                            <select id="parti_therikkavidalama" <?php echo $event_view; ?> >
                                <option value="0">Select the number of participants in your team</option>
                                <option value="2">2</option>
                                <option value="3">3</option>                                
                            </select>                            
                        </center>
                        <div style="text-align: center; ">
                            <input id="therikkavidalama" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
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