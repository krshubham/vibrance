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
    <title>Quiz Club</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <meta name="theme-color" content="#A81C23">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
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
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="aboutus.html">About Us</a>
                            </li>
                            <li class="active">
                                <a href="#events">Events</a>
                                <ul>
                                    <li>
                                        <a href="danceclub.html">Dance</a>
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
                    <h2><em>Quiz Club</em>EVENTS</h2>
                    <div id="cbp-so-scroller" class="cbp-so-scroller ">
                        <section class="cbp-so-section first-header" style="display:none;">
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">18th March 2016</h2>
                            </article>
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#first"><img src="images/genquiz.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#second"><img src="images/entain.jpg" alt="img01"></a>
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
                                <a href="#third"><img src="images/karl.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#fourth"><img src="images/classicdeb.jpg" alt="img01"></a>
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
                                <a href="#fifth"><img src="images/split.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#sixth"><img src="images/center.jpg" alt="img01"></a>
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
                                <a href="#seventh"><img src="images/aircrash.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#eighth"><img src="images/persona.jpg" alt="img01"></a>
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
                                <a href="#ninth"><img src="images/potpuri.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#tenth"><img src="images/litquiz.jpg" alt="img01"></a>
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
                                <a href="#eleventh"><img src="images/court.jpg" alt="img01"></a>
                            </figure>
                        </section>
                        <section class="cbp-so-section">
                            <figure class="cbp-so-side cbp-so-side-left">
                                <a href="#twelvth"><img src="images/scrabble.jpg" alt="img01"></a>
                            </figure>
                            <article class="cbp-so-side cbp-so-side-right">
                                <h2 style="padding-top:20%;">19th March 2016</h2>
                            </article>
                        </section>
                    </div>
                </div>
            </section>
            <section name="first" class="parallax parallax17" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>General Quiz</em>Team</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Anaga Krishnan &nbsp;&nbsp;&nbsp;8681868407</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>All you know quiz featuring questions from any and all walks of life.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs. 100/- per team.</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Teams of 2 or 3 members. </li>
                                <li>No lone wolf.</li>
                                <li>Preliminary round followed by Finals for the top 6 teams.</li>
                                <li>Quiz Master is God.</li>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_generalquiz" value="generalquiz_alone_100" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="generalquiz" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>    
                </div>
            </section>
            <section name="second" class="parallax parallax18" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Entertainment Quiz</em>Team</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Nikhil Nambiar &nbsp;&nbsp;&nbsp;9757290426</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Quiz with questions from Music, Entertainment, Literature, Arts and Sports World.</p>
                                </li>
                                <li>
                                    <br>
                                </li>
                                <li>Registration fees: Rs.50/- per member</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Open to Everyone.</li>
                                <li>Teams of 2-3. (No Lonewolf)</li>
                                <li>Prelims (Will consist of 25-30 questions).</li>
                                <li>Top 6 teams from the prelims would qualify for the Finals. </li>
                                <br>
                            </p>
                        </div>
                    </div>
                    <form>
                        <input type="text" id="event_entertainmentquiz" value="entertainmentquiz_team_50" style="display: none;">
                        <center>
                            <select id="parti_entertainmentquiz" <?php echo $event_view; ?> >
                                <option value="0">Select the number of participants in your team</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </center>
                        <div style="text-align: center; ">
                            <input id="entertainmentquiz" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>  
                </div>
            </section>
            <section name="third" class="parallax parallax19" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Karl Popper Debate</em>Team</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Kasturi Burman &nbsp;&nbsp;&nbsp;9600103145<br><br>Rujuta Barve &nbsp;&nbsp;&nbsp;9223380868</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Karl Popper debate focuses on relevent and often deeply divisive propositions, emphasizing on development of critical thinking skills and tolerancefor differing view-points.Two teams participate in each debate. One team follows role of affirmative party while other team that of negative party. Debators work together in teams and must research both sides of the issue. Each team is given opportunity yo offer arguments and direct questions to opposing team. Distinguishing feature of this format of debate are cross-examination, where four out of six debators ask their opponents questions and preparing time when the debators can prepare before their speeches</p>
                                </li>
                                <li>Registration Fees: Rs. 50</li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Two teams participate in each debate.</li>
                                <li>One team is given the role of affirmative party, otherone the negative.</li>
                                <li>Each team shall consist of three debators (A1, A2, A3 in affirmative party & N1, N2, N3 in negative party).</li>
                                <li>Every speaker can speak only once.</li>
                                <li>A1 defines a resolution and gives introduction on criterion if the motion is proposal or value motion</li>
                                <li>N1 must accept the motion and either accept or reject the criterion proposed by A1.</li>
                                <li>At the end of speeches of A1 & N1; A3 cross-questiones N1 & N3 cross-questions A1 </li>
                                <li>Speech of A1 & N1 shall last to maximum of 6 minutes followed by cross-questioning for 3 minutes.</li>
                                <li>A2 should primarily support motion put forth by A1 and secondly give new argument in support of primary argument.</li>
                                <li>N2 should counter argue argument of A2 so that it opposes motion of affirmative party.</li>
                                <li>Speech of A2 & N2 shall last to maximum of 6 minutes followed by cross-questioning for 3 minutes.</li>
                                <li>At the end of speeches of A2 & N2; A1 cross-questiones N2 & N1 cross-questions A2.</li>
                                <li>A3 concludes argument of affirmative party and puts forward points to support how effectively affirmative party proved the resolution. New argument or new piece of evidence should not be brought in by A3.</li>
                                <li>N3 concludes argument of negative party and puts forward points to support how effectively affirmative party proved the resolution. New argument or new piece of evidence should not be brought in by N3.</li>
                                <li>Speech of A3 & N3 shall last to maximum of 5 minutes.</li>
                                <br>
                            </p>
                            <p class="indents-3">Judging criteria:
                                <br>
                                <li>Logical flow in argument</li>
                                <li>Quantity and quality of evidences </li>
                                <li>Co-ordination and understanding between team members.</li>
                            </p>
                        </div>
                    </div>
                     <form>
                        <input type="text" id="event_karlpopperdebate" value="karlpopperdebate_alone_100" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="karlpopperdebate" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>   
                </div>
            </section>
            <section name="fourth" class="parallax parallax20" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Classic Debate</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Rohith Santhosh &nbsp;&nbsp;&nbsp;9446650078<br><br>Anandita Misra &nbsp;&nbsp;&nbsp;8400146614</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>This vintage debate format has 2 speakers pitted against each other where one speaker speaks in favor of the motion while the second speaker speaks against the motion. After receiving the motion each speaker gets a total of 10 minutes of preparation time. Each speaker shall get a total of 5 minutes to present their case in favor or against the motion.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Only individual registrations are allowed.</li>
                                <li>Speakers are pitted against each other and the competition shall proceed on a knock-out basis.</li>
                                <li>The topic for each debate is given on the spot.</li>
                                <li>10 minutes of preparation time is given.</li>
                                <li>Each speaker gets 5 minutes to make his/her speech.</li>
                                <li>On the completion of both speakers’ speeches, each speaker further gets 3 minutes for rebuttal and to summarize facts.</li>
                                <li>Any changes in the rules and procedures will be intimated before the debate.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                   <form>
                        <input type="text" id="event_classicdebate" value="classicdebate_alone_50" style="display: none;">                    
                        <div style="text-align: center; ">
                            <input id="classicdebate" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
                            <?php echo $login_view; ?>
                        </div>
                    </form>    
                </div>
            </section>
            <section name="fifth" class="parallax parallax21" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Split Personality</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Yamini Harsola &nbsp;&nbsp;&nbsp;9717987586<br><br>Akanksha Upadhyay &nbsp;&nbsp;&nbsp;9962407499</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>We have all been in debates against each other, but haven't thought of debating ourselves , have we?Well that's not true at all; we are in constant conversation with ourselves and most of that is argument because we have to make a decision fly. The converstaion heard out loud, would be something to behold, wouldn't it?May be, or may be not.
                                        <br>
                                        <br>Why don't you all come and find out?</p>
                                </li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Only individual registrations allowed.</li>
                                <li>Participants shall be allotted personalities.</li>
                                <li>The motion to be debated will be given on the spot.</li>
                                <li>Participants shall be required to present views of the allotted personality according to the motion.</li>
                                <li>The participant will be given 2 min to speak for the motion, and then 2 min to speak against the motion.</li>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section name="sixth" class="parallax parallax22" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Centre Stage</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Pooja Wath &nbsp;&nbsp;&nbsp;9962408590<br><br>Siddhant Mukerjee &nbsp;&nbsp;&nbsp;9087777274</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Welcome to the ultimate speech contest with almost zero preparation. You have to defend your speech right after you came up with it. The Audience will question you about everything you say. And that is only if you yourself dont question yourself first! If you love talking a lot, and think logically sound as well, come give this event a shot! Atleast you will have a great time ripping off other speakers while you hear them ruining their chance of winning!</p>
                                </li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Only Individual registrations Allowed.</li>
                                <li>Participants are given their topic when they come up to speak.</li>
                                <li>Participants must start speaking immediately on given the topic.</li>
                                <li>No Prep. time will be given to any participants.</li>
                                <li>Each Participant shall have a total time of 6 minutes to make their speech.</li>
                                <li>On completion of the speech, the audience will be allowed to question the speaker on his/her speech.</li>
                                <br>
                            </p>
                            <p class="indents-3">Judging criteria:
                                <br>
                                <li>Speaker will be marked on his speech and his/her to the audience questions.</li>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section name="seventh" class="parallax parallax23" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Air Crash</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Krishna Dayanidhi &nbsp;&nbsp;&nbsp;9962233150<br><br>Kunal Malik &nbsp;&nbsp;&nbsp;9941408779</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
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
            </section>
            <section name="eighth" class="parallax parallax24" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>La Persona</em>Individual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Gokul Nair &nbsp;&nbsp;&nbsp;7358663364<br><br>Hriday Agarwal &nbsp;&nbsp;&nbsp;Number<br><br>Kanishka Nambiar &nbsp;&nbsp;&nbsp;Number</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Series of questions to test creativity, spontaneity and wit.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Shipwreck situations, character enactments, and general roasting onstage </li>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section name="ninth" class="parallax parallax25" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Potpourri</em>Team</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Parth Jawale &nbsp;&nbsp;&nbsp;8681878995<br><br>Rahul Hazarika &nbsp;&nbsp;&nbsp;Number<br><br>Ramya P. &nbsp;&nbsp;&nbsp;Number</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>The word 'potpourri' indicates a mixture. The event is a mix of many different events.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Prelims will be written, finals will be oral. Questions will include spelling bee, quiz on words, elephant words, et cetera</li>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section name="tenth" class="parallax parallax26" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Lit Quiz</em>Inividual</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Tamoghna Ghosh &nbsp;&nbsp;&nbsp;9176298520<br><br>Ganesh Rajpal &nbsp;&nbsp;&nbsp;Number</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>How well do you know your literature? Come test your mettle.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>First round: elimination, written round</li>
                                <li>Second round: audio-visual round</li>
                                <li>Third round: final round, surprise</li>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section name="eleventh" class="parallax parallax27" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Turn Court</em>Team</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Shereen Hessa &nbsp;&nbsp;&nbsp;9092847062<br><br>Rahul Hazarika &nbsp;&nbsp;&nbsp;9840819956</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Ola Mates!
                                        <br>One particular Topic will be given to the team.Each team have to speak on the topic(For).Moment we say "TURN" the team have to go against the topic and speak and so on.
                                        <br> Proper Coordination and Team work is key to win.
                                        <br>Gather around And Speak up!
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li>Each team should have 3 speakers.</li>
                                <li>Each speaker have to speak on the topic.</li>
                                <li>Time Given to speak - 5 mins.</li>
                                <li>Unparliamentary words wont be entertained.And Hence can affect Your score.</li>
                                <li>Formal Language is only permitted.</li>
                                <br>
                            </p>
                            <p class="indents-3">Judging criteria:
                                <br>
                                <li>English Grammar </li>
                                <li>Fluency in Speaking</li>
                                <li>Confidence Level</li>
                                <li>Convincing Statements</li>
                                <li>Proper co-ordination in each team</li>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section name="twelvth" class="parallax parallax28" data-parallax-speed="-0.4">
                <div class="container">
                    <h2><em>Dabble in Scrabble</em>Team</h2>
                    <br>
                    <br>
                    <h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Manjushree Yethirajyam &nbsp;&nbsp;&nbsp;7506489639<br><br>Rajdeep Mukherjee &nbsp;&nbsp;&nbsp;9092974128</h4>
                    <div class="row">
                        <div class="grid_6">
                            <ul class="indents-3">
                                <li>Description of Event:
                                    <p>Put your vocabulary up for a test with this popular word game, except that this time, your childhood game has gotten itself a makeover.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="grid_6">
                            <p class="indents-3">Rules:
                                <br>
                                <li> There aren't any rules that you must keep in mind, except the one that matters the most - all the words used must be present in the Scrabble dictionary. </li>
                                <br>
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