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
    <title>Formals</title>
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
                    <h2><em>Formal</em>EVENTS</h2>
                    <div id="cbp-so-scroller" class="cbp-so-scroller ">
                        <section class="cbp-so-section first-header" style="display:none;">
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">19th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#first"><img src="images/gandhi.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#second"><img src="images/poster.jpg" alt="img01"></a>
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
                                <a href="#third"><img src="images/brain.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#fourth"><img src="images/social.jpg" alt="img01"></a>
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
                                <a href="#fifth"><img src="images/wastecraft.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#sixth"><img src="images/enviro.jpg" alt="img01"></a>
                            </figure>
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                        </section>
                        
                        <section class="cbp-so-section">
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#seventh"><img src="images/virtual.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#eighth"><img src="images/balloon_spl.jpg" alt="img01"></a>
                            </figure>
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                        </section>
                        
                        <section class="cbp-so-section">
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">19th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#ninth"><img src="images/blind_fold.jpg" alt="img01"></a>
                            </figure>
                        </section>

                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#tenth"><img src="images/dressup.jpg" alt="img01"></a>
                            </figure>
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">19th March 2016</h2>
                            </article>
                        </section>
                    </div>
                </div>
            </section>
            <section name="first" class="parallax parallax40" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Gandhi-how far do u know him?</em>Team of 5</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>M.V. Sasank  &nbsp;&nbsp;&nbsp;9094643405</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Quiz on the Father of Our Nation.</p>
                                </li>
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
                                <li>All further rules will be given on-spot. </li>
                            </p>
                        </div>
                    </div>
                     <form>
                        <input type="text" id="event_gandhi" value="gandhi_team_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="gandhi" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="second" class="parallax parallax41" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Poster Making</em>Individuak</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>S. Bhargav Rahul &nbsp;&nbsp;&nbsp;9677091705</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Make posters to increase awareness in various fields, such as Road safety, Pollution, etc.</p>
                                </li>
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
                                <li>All further rules will be given on-spot.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_postermaking" value="postermaking_alone_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="postermaking" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="third" class="parallax parallax42" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Brain 0.0</em>Team of 2</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>J. Rohit &nbsp;&nbsp;&nbsp;9952041525<br><br>A.M.S. Deepak &nbsp;&nbsp;&nbsp;9600679300</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>If there is something like basic version of brain it is enough to play this event. The event consists of three rounds in which the participant has to use their common sense and presence of mind appropriately to pass through each and every round.This is a team event and each team has two members in it</p>
                                </li>
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
                                <li>ROUND 1: Each team will be given some questions that can be answered by using common sense.Here there will be some set of rules through which the participant should make their final score "zero". Complete rules will be announced during the commencement of event .</li>
                                <li>ROUND 2: The qualified teams will be given different tasks.Their performance will be judged by the faculty co-ordinators.</li>
                                <li>Round 3: Buzzer round. Further details will be announced at the event.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_brain" value="brain_team_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="brain" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="fourth" class="parallax parallax43" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Social Innovators</em>Team of 1-3</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Sukesh Kumar &nbsp;&nbsp;&nbsp;9962407126<br><br>Surya kasyap &nbsp;&nbsp;&nbsp;9087779062</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Are you having a innovative solution to change the world Pitch your big idea at Social Innovator . Students are invited to present their technology ideas to solve Social problems and add values to human beings and surroundings.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 150/- per team of 1.</li>
                                <li>Registration fees: Rs. 250/- per team of 2.</li>
                                <li>Registration fees: Rs. 300/- per team of 3.</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>A power point presentation should be made and pitch their Idea</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_socialinnovators" value="socialinnovators_team_150_s" style="display: none;">
                        <center>
                            <select id="parti_socialinnovators" <?php echo $event_view; ?> >
                                <option value="0">Select the number of participants in your team</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>                            
                        </center>
                        <div style="text-align: center; ">
                            <input id="socialinnovators" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>
                </div>
            </section>
            <section name="seventh" class="parallax parallax89" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Virtual Reality</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Atit S Gaonkar &nbsp;&nbsp;&nbsp;9952042455<br><br>Abhyuday Bharat &nbsp;&nbsp;&nbsp;9952042256<br><br>Gutha Sai Sameer &nbsp;&nbsp;&nbsp;8754404599</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Participants will experience a hands-on demo of the VR Headset(Google Cardboard).</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_virtualreality" value="virtualreality_alone_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="virtualreality" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="fifth" class="parallax parallax44" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Wastecraft</em>Team of 2</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Namrata Lodhi &nbsp;&nbsp;&nbsp;8681924009<br><br>Arvind Bhaskaran &nbsp;&nbsp;&nbsp;9865332186<br><br>Moditya Gupta &nbsp;&nbsp;&nbsp;8989019669</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>The aim is NOT to be able to throw out waste. Come up with innovative ideas to use all waste products.</p>
                                </li>
                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li> First, participants are allowed to collect garbage with in the campus for 45 minutes. Collected garbage is to be shaped into something creative in the next 75 minutes. Related material (paint brushes, crayons, pencils, etc) is provided if necessary.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_wastecraft" value="wastecraft_team_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="wastecraft" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="sixth" class="parallax parallax45" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>EnviroQuiz</em>Team of 2</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Mehazin Shaju &nbsp;&nbsp;&nbsp;9790725762<br><br>Syed Ameen Ahmed &nbsp;&nbsp;&nbsp;7869345920<br><br>Rohit Srivastava &nbsp;&nbsp;&nbsp;7827283424</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>A quiz based on all things environmental.</p>
                                </li>

                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>

                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Each team should contain only 2 members.</li>
                                <li>Team members are not allowed to carry mobile phones</li>
                                <li>The quiz will be divided into four different rounds:
                                    <br>1: elementary round - : each team will be asked two questions with time limit of 30 second for each question, if answered right the team will be awarded 10 points if passed the team that answer the pass will get 5 p0ints. Will consist only basic questions related to environmental science. A question cannot be passed more than twice and after each round there will be elimination.
                                    <br>2: A passed question will only get 10 seconds to answer.
                                    <br>3: second round is rapid fire. Each team will be posed with 5 questions with very less time to answer it will be around 10 seconds for each question.
                                    <br>4:The three team with highest scores will move on to the third round. It is called 30 second to go!! were a picture will be shown and question based on that will asked. The two teams that correctly answers will be moving on to the third round!!
                                    <br>5: 15 second to win- this will be a surprise round, nothing can be disclosed before the round starts.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    </div>
                    <form>
                        <input type="text" id="event_enviroquiz" value="enviroquiz_team_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="enviroquiz" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="eighth" class="parallax parallax86" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Balloon Splash</em>Team of 5</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Manikanta &nbsp;&nbsp;&nbsp;9566277845</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Team of 5 members. Pick a balloon and pass it round the amphi without breaking the balloon to all team mates in a clockwise fashion.</p>
                                </li>
                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>The balloon should be intact till the end.</li> 
                                <li>Coordinator's say is final.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_balloonsplash" value="balloonsplash_team_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="balloonsplash" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="ninth" class="parallax parallax88" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Blind Fold Drawing</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Divya Pallineni &nbsp;&nbsp;&nbsp;9505378059<br><br>Vineesha Jasti &nbsp;&nbsp;&nbsp;9092768098</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>The participant will be blind folded and will be made to draw on the on spot topic.</p>
                                </li>
                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Rules will be given on the spot.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_blindfolddrawing" value="blindfolddrawing_alone_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="blindfolddrawing" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="tenth" class="parallax parallax87" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Dress Up Your Partner</em>Team of 2</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>K. Bhavya Sri &nbsp;&nbsp;&nbsp;7092306390<br><br>Vaishnavi Priyanka &nbsp;&nbsp;&nbsp;9944366169</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Participation in group of 2 and one has to dress up other partner. Fastest will be the winner.</p>
                                </li>
                                <li><br></li>
                                <li>Registration fees: Rs. 50/- per head. [Internal]</li>
                                <li>Registration fees: Rs. 100/- per head. [External]</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Participation in group of 2 and one has to dress up other partner. Fastest will be the winner.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_dressupyourpartner" value="dressupyourpartner_team_50_d" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="dressupyourpartner" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
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