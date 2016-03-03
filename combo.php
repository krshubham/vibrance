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
    <title>Combo Offers</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
    <link rel="stylesheet" href="css/pure-min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
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
</head>

<body>
    <div class="page">

      <header>
        <div id="stuck_container" class="stuck_container">
            <div class="container">
                <div class="brand">
                    <h1 class="brand_name">
                        <a href="#"><img src="images/vib_banner_small.png" style="width: 80%; height: 80%;
                            margin-left: -2em;margin-bottom: -1em;margin-right: -2em;"></a>
                        </h1>
                    </div>
                    <nav class="nav">
                        <ul class="sf-menu">                            
                            <li class="active">
                                <a href="admin_land.php">Admin Home</a>                               
                            </li>
                            <li>
                                <a href="#"></a>
                            </li>
                            <li>
                                <a href="#">On Spot Registration</a>
                            </li>
                            <li>
                                <?php echo "<a href='logout.php'>Logout, ".$current_user."</a>"; ?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <main>
            <section class="well well__offset-3">
                <div class="container">
                    <h2><em>Combo</em>Offers</h2>
                    <div id="divall" style="display: none;"> 
                    </div>
                    <div class="row row__offset-2">
                        <div class="grid_6">
                            <div class="img">
                                <div id="wrapper">
                                    <p><a href="#popup1">
                                        <div id="three_click" class="lazy-img" style="padding-bottom: 45.6140350877193%;"><img data-src="images/three_int.jpg" alt=""></div>
                                    </a></p>
                                </div>
                            </div>
                        </div>

                        <div class="grid_6">
                            <div class="img">
                                <div id="wrapper">
                                    <a href="#popup2">
                                        <div id="all_click" class="lazy-img" style="padding-bottom: 45.6140350877193%;"><img data-src="images/all_int.jpg" alt=""></div>
                                    </a>
                                </div>
                            </div>
                        </div>                                            
                    </div>
                </div>
            </section>
        </main>

        <footer>
        </footer>
    </div>
    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Choose events</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <div class="col1">
                    <div id="divthree" style="display: none;">
                        <form name="form">
                            <div class="pure-g">
                                <div class="pure-u-1-8">
                                    <input type="checkbox" name="event1" value="generalquiz_team_50_d" onclick="return KeepCount()">General Quiz<br />
                                    <input type="checkbox" name="event2" value="entertainmentquiz_team_50_d" onclick="return KeepCount()">Entertainment Quiz<br />
                                    <input type="checkbox" name="event3" value="karlpopperdebate_team_50_d" onclick="return KeepCount()">Karl Popper Debate<br />
                                    <input type="checkbox" name="event4" value="classicdebate_alone_50_d" onclick="return KeepCount()">Classic Debate<br />
                                    <input type="checkbox" name="event5" value="splitpersonality_alone_50_d" onclick="return KeepCount()">Split Personality<br />
                                    <input type="checkbox" name="event6" value="centrestage_alone_50_d" onclick="return KeepCount()">Centre Stage<br />
                                    <input type="checkbox" name="event7" value="aircrash_alone_50_d" onclick="return KeepCount()">Air Crash<br />
                                    <input type="checkbox" name="event8" value="lapersona_alone_50_d" onclick="return KeepCount()">La Persona<br />
                                </div>
                                <div class="pure-u-1-8">

                                    <input type="checkbox" name="event9" value="potpourri_team_50_d" onclick="return KeepCount()">Potpourri<br />
                                    <input type="checkbox" name="event10" value="litquiz_alone_50_d" onclick="return KeepCount()">Lit Quiz<br />
                                    <input type="checkbox" name="event11" value="turncourt_alone_50_d" onclick="return KeepCount()">Turn Court<br />
                                    <input type="checkbox" name="event12" value="scrabble_team_50_d" onclick="return KeepCount()">Dabble in Scrabble<br />
                                    <input type="checkbox" name="event13" value="adzap_team_50_d" onclick="return KeepCount()">Adzap<br />
                                    <input type="checkbox" name="event14" value="switch_team_50_d" onclick="return KeepCount()">Switch<br />
                                    <input type="checkbox" name="event15" value="daretodrama_team_50_d" onclick="return KeepCount()">Dare to Drama<br />
                                    <input type="checkbox" name="event16" value="beapicasso_alone_50_d" onclick="return KeepCount()">Be a Picasso<br />
                                </div>
                                <div class="pure-u-1-8">

                                    <input type="checkbox" name="event17" value="cupodoodle_alone_50_d" onclick="return KeepCount()">Cup O' Doodle<br />
                                    <input type="checkbox" name="event18" value="mehendi_team_50_d" onclick="return KeepCount()">Mehendi<br />
                                    <input type="checkbox" name="event19" value="paintwithoutbrush_team_50_d" onclick="return KeepCount()">Paint Without a Brush<br />
                                    <input type="checkbox" name="event20" value="gandhi_team_50_d" onclick="return KeepCount()">Gandhi: How far do you know him?<br />
                                    <input type="checkbox" name="event21" value="postermaking_alone_50_d" onclick="return KeepCount()">Poster Making<br />
                                    <input type="checkbox" name="event22" value="brain_team_50_d" onclick="return KeepCount()">Brain 0.0<br />
                                    <input type="checkbox" name="event23" vlue="virtualreality_alone_50_d" onclick="return KeepCount()">Virtual Reality<br />
                                    <input type="checkbox" name="event24" vaue="wastecraft_team_50_d" onclick="return KeepCount()">Wastecraft<br />                                  
                                </div>
                                <div class="pure-u-1-8">

                                    <input type="checkbox" name="event25" value="enviroquiz_team_50_d" onclick="return KeepCount()">Enviro Quiz<br />
                                    <input type="checkbox" name="event26" value="balloonsplash_team_50_d" onclick="return KeepCount()">Balloon Splash<br />
                                    <input type="checkbox" name="event27" value="blindfolddrawing_alone_50_d" onclick="return KeepCount()">Blind Fold Drawing<br />
                                    <input type="checkbox" name="event28" value="dressupyourpartner_team_50_d" onclick="return KeepCount()">Dress Up Your Partner<br />
                                    <input type="checkbox" name="event29" value="irrelevance_alone_50_d" onclick="return KeepCount()">Irrelevance<br />
                                    <input type="checkbox" name="event30" value="minutetowin_team_50_d" onclick="return KeepCount()">VIT's Minute to Win it<br />
                                    <input type="checkbox" name="event31" value="runforbucks_team_50_d" onclick="return KeepCount()">Run for Bucks<br />
                                    <input type="checkbox" name="event32" value="impracticaljokers_alone_50_d" onclick="return KeepCount()">Impractical Jokers<br />                                  
                                </div>
                                <div class="pure-u-1-8">

                                    <input type="checkbox" name="event33" value="moriarty_team_50_d" onclick="return KeepCount()">Moriarty<br />
                                    <input type="checkbox" name="event34" value="fivefootball_team_50_d" onclick="return KeepCount()">5's Football<br />
                                    <input type="checkbox" name="event35" value="buildtodestroy_team_50_d" onclick="return KeepCount()">Build to Destroy<br />
                                    <input type="checkbox" name="event36" value="tugofwar_team_50_d" onclick="return KeepCount()">Tug of War<br />
                                    <input type="checkbox" name="event37" value="vishwaroopam_team_50_d" onclick="return KeepCount()">Vishwaroopam<br />
                                    <input type="checkbox" name="event38" value="veta_team_50_d" onclick="return KeepCount()">Veta<br />
                                    <input type="checkbox" name="event39" value="chitram_team_50_d" onclick="return KeepCount()">Chitram<br />
                                    <input type="checkbox" name="event40" value="antaksharitelugu_team_50_d" onclick="return KeepCount()">Antakshari TELUGU<br />                                  
                                </div>
                                <div class="pure-u-1-8">

                                    <input type="checkbox" name="event41" value="dhammu_team_50_d" onclick="return KeepCount()">Dhammu<br />
                                    <input type="checkbox" name="event42" value="rangam_team_50_d" onclick="return KeepCount()">Rangam<br />
                                    <input type="checkbox" name="event43" value="begborrowsteal_team_50_d" onclick="return KeepCount()">Beg, Borrow, Steal<br />
                                    <input type="checkbox" name="event44" value="comicstrip_alone_50_d" onclick="return KeepCount()">Comic Strip<br />
                                    <input type="checkbox" name="event45" value="creativewriting_alone_50_d" onclick="return KeepCount()">Creative Writing<br />
                                    <input type="checkbox" name="event46" value="poetry_alone_50_d" onclick="return KeepCount()">Poetry<br />
                                    <input type="checkbox" name="event47" value="jam_alone_50_d" onclick="return KeepCount()">JAM<br />
                                    <input type="checkbox" name="event48" value="expressionexpress_alone_50_d" onclick="return KeepCount()">Expression Express<br />
                                </div>
                                <div class="pure-u-1-8">

                                    <input type="checkbox" name="event49" value="antaksharihindi_team_50_d" onclick="return KeepCount()">Antakshari HINDI<br />
                                    <input type="checkbox" name="event50" value="televisionwarping_team_50_d" onclick="return KeepCount()">Television Warping<br />
                                    <input type="checkbox" name="event51" value="tambola_alone_50_d" onclick="return KeepCount()">Tambola<br />
                                    <input type="checkbox" name="event52" value="filmbuffchallenge_team_50_d" onclick="return KeepCount()">Film Buff Challenge<br />
                                    <input type="checkbox" name="event53" value="floattilluwin_team_50_d" onclick="return KeepCount()">Float till you Win<br />
                                    <input type="checkbox" name="event54" value="hellothamizha_team_50_d" onclick="return KeepCount()">Hello Thamizha<br />
                                    <input type="checkbox" name="event55" value="maathipesavum_alone_50_d" onclick="return KeepCount()">Maathi Pesavum<br />
                                    <input type="checkbox" name="event56" value="merasalaaitan_team_50_d" onclick="return KeepCount()">Merasalaaitan<br />                                  
                                </div>
                                <div class="pure-u-1-8">
                                    <input type="checkbox" name="event57" value="therikkavidalama_team_50_d" onclick="return KeepCount()">Therikka Vidalama<br />
                                    <input type="checkbox" name="event58" value="nerdornewbie_team_50_d" onclick="return KeepCount()">Nerd or Newbie<br />
                                    <input type="checkbox" name="event59" value="treasurehunt_team_50_d" onclick="return KeepCount()">Treasure Hunt [App Based]<br />
                                    <input type="checkbox" name="event60" value="snakeandladder_alone_50_d" onclick="return KeepCount()">Snake and Ladder with Quiz<br />
                                    <input type="checkbox" name="event61" value="aimandact_team_50_d" onclick="return KeepCount()">Aim and Act<br /> 
                                    <input type="checkbox" name="event62" value="tamilworkshop_alone_50_d" onclick="return KeepCount()">Tamil Speaking Workshop<br /> 
                                    <input type="checkbox" name="event63" value="some" onclick="return KeepCount()">event3<br /> 
                                    <input type="checkbox" name="event64" value="some" onclick="return KeepCount()">event3<br /> 
                                </div>
                            </div>
                            <br><br>
                            <div class="pure-g">
                                <div class="pure-u-24-24">
                                    <input type="submit" class="btn-reg" value="Register"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popup2" class="overlay light">
        <a class="cancel" href="#"></a>
        <div class="popup">
            <a class="close" href="#">&times;</a>
            <h2>What the what?</h2>
            <div class="content">
              <p>Click outside the popup to close.</p>
          </div>
      </div>
  </div>

  <script src="js/script.js"></script>
  <script src="js/script.js"></script>
  <script type="text/javascript">
    $('#three_click').click(function() {
        $('#divthree').slideDown();
    });
    $('#all_click').click(function() {
        $('#divall').slideDown();
    });
</script>
<script language="javascript">

    function KeepCount() {

        var NewCount = 0;

        if (document.form.event1.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event2.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event3.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event4.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event5.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event6.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event7.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event8.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event9.checked)
            {NewCount = NewCount +1;}

        if (document.form.event10.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event11.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event12.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event13.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event14.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event15.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event16.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event17.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event18.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event19.checked)
            {NewCount = NewCount +1;}

        if (document.form.event20.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event21.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event22.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event23.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event24.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event25.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event26.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event27.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event28.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event29.checked)
            {NewCount = NewCount +1;}

        if (document.form.event30.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event31.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event32.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event33.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event34.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event35.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event36.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event37.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event38.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event39.checked)
            {NewCount = NewCount +1;}

        if (document.form.event40.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event41.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event42.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event43.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event44.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event45.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event46.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event47.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event48.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event49.checked)
            {NewCount = NewCount +1;}

        if (document.form.event50.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event61.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event62.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event63.checked)
            {NewCount = NewCount + 1;}

        if (document.form.event64.checked)
            {NewCount = NewCount + 1;}       

        if (NewCount == 4)
        {
            alert('Pick Just Three Please')
            document.form; return false;
        }
    } 
</script>
</body>
</html>
<?php
if (isset ($conn)){
  mysqli_close($conn);
}
?>