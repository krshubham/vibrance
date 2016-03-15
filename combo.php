<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
 <?php confirm_logged_in(); ?>
<?php 
	$current_user = $_SESSION["username"];
	$name_query = "SELECT * FROM users WHERE username = '{$current_user}' LIMIT 1";
	$name_result = mysqli_query($conn, $name_query);
	confirm_query($name_result);
	$name_title = mysqli_fetch_assoc($name_result);
	$first_name = explode(" ", $name_title['name']);  
	if ($name_title['college']=="VIT") {
		$image1 = "three_int.jpg";
		$image2 = "all_int.jpg";
	} else {
		$image1 = "three_ext.jpg";
		$image2 = "all_ext.jpg";
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Combo Offers</title>
	<meta charset="utf-8">
	<meta name="format-detection" content="telephone=no" />
	<link rel="icon" href="favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" href="css/pure-min.css">
	<script src="js/jquery.js"></script>
	<script src="js/jquery-migrate-1.2.1.js"></script>
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
							<li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="aboutus.html">About Us</a>
                            </li>
                            <li class="active">
                            <a href="combo.php">Combo offers</a>
                        	</li>
                            <li >
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
								<?php echo "<a href='logout.php'>Logout, ".$first_name[0]."</a>"; ?>
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
										<div id="three_click" class="lazy-img" style="padding-bottom: 45.6140350877193%;"><img data-src="images/<?php echo $image1; ?>" alt=""></div>
									</a></p>
								</div>
							</div>
						</div>

						<div class="grid_6">
							<div class="img">
								<div id="wrapper">
									<a href="#popup2">
										<div id="all_click" class="lazy-img" style="padding-bottom: 45.6140350877193%;"><img data-src="images/<?php echo $image2; ?>" alt=""></div>
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
					<div id="divthree" >
						<form name="form">
							<div class="pure-g">
								<div class="pure-u-1-3">
									<select required id="first_event">
										<option value="">Select your first event</option>
										<option value="generalquiz_team_50_d">General Quiz</option>
										<option value="entertainmentquiz_team_50_d">Entertainment Quiz</option>
										<option value="karlpopperdebate_team_50_d">Karl Popper Debate</option>
										<option value="classicdebate_alone_50_d">Classic Debate</option>
										<option value="splitpersonality_alone_50_d">Split Personality</option>
										<option value="centrestage_alone_50_d">Centre Stage</option>
										<option value="aircrash_alone_50_d">Air Crash</option>
										<option value="lapersona_alone_50_d">La Persona</option>
										<option value="potpourri_team_50_d">Potpourri</option>
										<option value="litquiz_alone_50_d">Lit Quiz</option>
										<option value="turncourt_alone_50_d">Turn Court</option>
										<option value="scrabble_team_50_d">Dabble in Scrabble</option>
										<option value="adzap_team_50_d">Adzap</option>
										<option value="switch_team_50_d">Switch</option>
										<option value="daretodrama_team_50_d">Dare to Drama</option>
										<option value="beapicasso_alone_50_d">Be a Picasso</option>
										<option value="cupodoodle_alone_50_d">Cup O' Doodle</option>
										<option value="mehendi_team_50_d">Mehendi</option>
										<option value="paintwithoutbrush_team_50_d">Paint Without a Brush</option>
										<option value="gandhi_team_50_d">Gandhi: How far do you know him?</option>
										<option value="postermaking_alone_50_d">Poster Making</option>
										<option value="brain_team_50_d">Brain 0.0</option>
										<option value="virtualreality_alone_50_d">Virtual Reality</option>
										<option value="wastecraft_team_50_d">Wastecraft</option>
										<option value="enviroquiz_team_50_d">Enviro Quiz</option>
										<option value="balloonsplash_team_50_d">Balloon Splash</option>
										<option value="blindfolddrawing_alone_50_d">Blind Fold Drawing</option>
										<option value="dressupyourpartner_team_50_d">Dress Up Your Partner</option>
										<option value="irrelevance_alone_50_d">Irrelevance</option>
										<option value="minutetowin_team_50_d">VIT's Minute to Win it</option>
										<option value="runforbucks_team_50_d">Run for Bucks</option>
										<option value="impracticaljokers_alone_50_d">Impractical Jokers</option>
										<option value="moriarty_team_50_d">Moriarty</option>
										<option value="fivefootball_team_50_d">5's Football</option>
										<option value="buildtodestroy_team_50_d">Build to Destroy</option>
										<option value="tugofwar_team_50_d">Tug of War</option>
										<option value="vishwaroopam_team_50_d">Vishwaroopam</option>
										<option value="veta_team_50_d">Veta</option>
										<option value="chitram_team_50_d">Chitram</option>
										<option value="antaksharitelugu_team_50_d">Antakshari TELUGU</option>
										<option value="dhammu_team_50_d">Dhammu</option>
										<option value="rangam_team_50_d">Rangam</option>
										<option value="begborrowsteal_team_50_d">Beg, Borrow, Steal</option>
										<option value="comicstrip_alone_50_d">Comic Strip</option>
										<option value="creativewriting_alone_50_d">Creative Writing</option>
										<option value="poetry_alone_50_d">Poetry</option>
										<option value="jam_alone_50_d">JAM</option>
										<option value="expressionexpress_alone_50_d">Expression Express</option>
										<option value="antaksharihindi_team_50_d">Antakshari HINDI</option>
										<option value="televisionwarping_team_50_d">Television Warping</option>
										<option value="tambola_alone_50_d">Tambola</option>
										<option value="filmbuffchallenge_team_50_d">Film Buff Challenge</option>
										<option value="floattilluwin_team_50_d">Float till you Win</option>
										<option value="hellothamizha_team_50_d">Hello Thamizha</option>
										<option value="maathipesavum_alone_50_d">Maathi Pesavum</option>
										<option value="merasalaaitan_team_50_d">Merasalaaitan</option>
										<option value="therikkavidalama_team_50_d">Therikka Vidalama</option>
										<option value="nerdornewbie_team_50_d">Nerd or Newbie</option>
										<option value="treasurehunt_team_50_d">Treasure Hunt [App Based]</option>
										<option value="snakeandladder_alone_50_d">Snake and Ladder with Quiz</option>
										<option value="aimandact_team_50_d">Aim and Act</option>
										<option value="tamilworkshop_alone_50_d">Tamil Speaking Workshop</option>
									</select>
								</div>
								<div class="pure-u-1-3">
									<select required id="second_event">
										<option value="">Select your second event</option>
										<option value="generalquiz_team_50_d">General Quiz</option>
										<option value="entertainmentquiz_team_50_d">Entertainment Quiz</option>
										<option value="karlpopperdebate_team_50_d">Karl Popper Debate</option>
										<option value="classicdebate_alone_50_d">Classic Debate</option>
										<option value="splitpersonality_alone_50_d">Split Personality</option>
										<option value="centrestage_alone_50_d">Centre Stage</option>
										<option value="aircrash_alone_50_d">Air Crash</option>
										<option value="lapersona_alone_50_d">La Persona</option>
										<option value="potpourri_team_50_d">Potpourri</option>
										<option value="litquiz_alone_50_d">Lit Quiz</option>
										<option value="turncourt_alone_50_d">Turn Court</option>
										<option value="scrabble_team_50_d">Dabble in Scrabble</option>
										<option value="adzap_team_50_d">Adzap</option>
										<option value="switch_team_50_d">Switch</option>
										<option value="daretodrama_team_50_d">Dare to Drama</option>
										<option value="beapicasso_alone_50_d">Be a Picasso</option>
										<option value="cupodoodle_alone_50_d">Cup O' Doodle</option>
										<option value="mehendi_team_50_d">Mehendi</option>
										<option value="paintwithoutbrush_team_50_d">Paint Without a Brush</option>
										<option value="gandhi_team_50_d">Gandhi: How far do you know him?</option>
										<option value="postermaking_alone_50_d">Poster Making</option>
										<option value="brain_team_50_d">Brain 0.0</option>
										<option value="virtualreality_alone_50_d">Virtual Reality</option>
										<option value="wastecraft_team_50_d">Wastecraft</option>
										<option value="enviroquiz_team_50_d">Enviro Quiz</option>
										<option value="balloonsplash_team_50_d">Balloon Splash</option>
										<option value="blindfolddrawing_alone_50_d">Blind Fold Drawing</option>
										<option value="dressupyourpartner_team_50_d">Dress Up Your Partner</option>
										<option value="irrelevance_alone_50_d">Irrelevance</option>
										<option value="minutetowin_team_50_d">VIT's Minute to Win it</option>
										<option value="runforbucks_team_50_d">Run for Bucks</option>
										<option value="impracticaljokers_alone_50_d">Impractical Jokers</option>
										<option value="moriarty_team_50_d">Moriarty</option>
										<option value="fivefootball_team_50_d">5's Football</option>
										<option value="buildtodestroy_team_50_d">Build to Destroy</option>
										<option value="tugofwar_team_50_d">Tug of War</option>
										<option value="vishwaroopam_team_50_d">Vishwaroopam</option>
										<option value="veta_team_50_d">Veta</option>
										<option value="chitram_team_50_d">Chitram</option>
										<option value="antaksharitelugu_team_50_d">Antakshari TELUGU</option>
										<option value="dhammu_team_50_d">Dhammu</option>
										<option value="rangam_team_50_d">Rangam</option>
										<option value="begborrowsteal_team_50_d">Beg, Borrow, Steal</option>
										<option value="comicstrip_alone_50_d">Comic Strip</option>
										<option value="creativewriting_alone_50_d">Creative Writing</option>
										<option value="poetry_alone_50_d">Poetry</option>
										<option value="jam_alone_50_d">JAM</option>
										<option value="expressionexpress_alone_50_d">Expression Express</option>
										<option value="antaksharihindi_team_50_d">Antakshari HINDI</option>
										<option value="televisionwarping_team_50_d">Television Warping</option>
										<option value="tambola_alone_50_d">Tambola</option>
										<option value="filmbuffchallenge_team_50_d">Film Buff Challenge</option>
										<option value="floattilluwin_team_50_d">Float till you Win</option>
										<option value="hellothamizha_team_50_d">Hello Thamizha</option>
										<option value="maathipesavum_alone_50_d">Maathi Pesavum</option>
										<option value="merasalaaitan_team_50_d">Merasalaaitan</option>
										<option value="therikkavidalama_team_50_d">Therikka Vidalama</option>
										<option value="nerdornewbie_team_50_d">Nerd or Newbie</option>
										<option value="treasurehunt_team_50_d">Treasure Hunt [App Based]</option>
										<option value="snakeandladder_alone_50_d">Snake and Ladder with Quiz</option>
										<option value="aimandact_team_50_d">Aim and Act</option>
										<option value="tamilworkshop_alone_50_d">Tamil Speaking Workshop</option>
									</select>
								</div>
								<div class="pure-u-1-3">
									<select required id="third_event">
										<option value="">Select your third event</option>
										<option value="generalquiz_team_50_d">General Quiz</option>
										<option value="entertainmentquiz_team_50_d">Entertainment Quiz</option>
										<option value="karlpopperdebate_team_50_d">Karl Popper Debate</option>
										<option value="classicdebate_alone_50_d">Classic Debate</option>
										<option value="splitpersonality_alone_50_d">Split Personality</option>
										<option value="centrestage_alone_50_d">Centre Stage</option>
										<option value="aircrash_alone_50_d">Air Crash</option>
										<option value="lapersona_alone_50_d">La Persona</option>
										<option value="potpourri_team_50_d">Potpourri</option>
										<option value="litquiz_alone_50_d">Lit Quiz</option>
										<option value="turncourt_alone_50_d">Turn Court</option>
										<option value="scrabble_team_50_d">Dabble in Scrabble</option>
										<option value="adzap_team_50_d">Adzap</option>
										<option value="switch_team_50_d">Switch</option>
										<option value="daretodrama_team_50_d">Dare to Drama</option>
										<option value="beapicasso_alone_50_d">Be a Picasso</option>
										<option value="cupodoodle_alone_50_d">Cup O' Doodle</option>
										<option value="mehendi_team_50_d">Mehendi</option>
										<option value="paintwithoutbrush_team_50_d">Paint Without a Brush</option>
										<option value="gandhi_team_50_d">Gandhi: How far do you know him?</option>
										<option value="postermaking_alone_50_d">Poster Making</option>
										<option value="brain_team_50_d">Brain 0.0</option>
										<option value="virtualreality_alone_50_d">Virtual Reality</option>
										<option value="wastecraft_team_50_d">Wastecraft</option>
										<option value="enviroquiz_team_50_d">Enviro Quiz</option>
										<option value="balloonsplash_team_50_d">Balloon Splash</option>
										<option value="blindfolddrawing_alone_50_d">Blind Fold Drawing</option>
										<option value="dressupyourpartner_team_50_d">Dress Up Your Partner</option>
										<option value="irrelevance_alone_50_d">Irrelevance</option>
										<option value="minutetowin_team_50_d">VIT's Minute to Win it</option>
										<option value="runforbucks_team_50_d">Run for Bucks</option>
										<option value="impracticaljokers_alone_50_d">Impractical Jokers</option>
										<option value="moriarty_team_50_d">Moriarty</option>
										<option value="fivefootball_team_50_d">5's Football</option>
										<option value="buildtodestroy_team_50_d">Build to Destroy</option>
										<option value="tugofwar_team_50_d">Tug of War</option>
										<option value="vishwaroopam_team_50_d">Vishwaroopam</option>
										<option value="veta_team_50_d">Veta</option>
										<option value="chitram_team_50_d">Chitram</option>
										<option value="antaksharitelugu_team_50_d">Antakshari TELUGU</option>
										<option value="dhammu_team_50_d">Dhammu</option>
										<option value="rangam_team_50_d">Rangam</option>
										<option value="begborrowsteal_team_50_d">Beg, Borrow, Steal</option>
										<option value="comicstrip_alone_50_d">Comic Strip</option>
										<option value="creativewriting_alone_50_d">Creative Writing</option>
										<option value="poetry_alone_50_d">Poetry</option>
										<option value="jam_alone_50_d">JAM</option>
										<option value="expressionexpress_alone_50_d">Expression Express</option>
										<option value="antaksharihindi_team_50_d">Antakshari HINDI</option>
										<option value="televisionwarping_team_50_d">Television Warping</option>
										<option value="tambola_alone_50_d">Tambola</option>
										<option value="filmbuffchallenge_team_50_d">Film Buff Challenge</option>
										<option value="floattilluwin_team_50_d">Float till you Win</option>
										<option value="hellothamizha_team_50_d">Hello Thamizha</option>
										<option value="maathipesavum_alone_50_d">Maathi Pesavum</option>
										<option value="merasalaaitan_team_50_d">Merasalaaitan</option>
										<option value="therikkavidalama_team_50_d">Therikka Vidalama</option>
										<option value="nerdornewbie_team_50_d">Nerd or Newbie</option>
										<option value="treasurehunt_team_50_d">Treasure Hunt [App Based]</option>
										<option value="snakeandladder_alone_50_d">Snake and Ladder with Quiz</option>
										<option value="aimandact_team_50_d">Aim and Act</option>
										<option value="tamilworkshop_alone_50_d">Tamil Speaking Workshop</option>
									</select>
								</div>                                
							</div>
							<br><br>
							<div class="pure-g">
								<div class="pure-u-24-24">
									<input type="button" class="btn-reg" id="three_pass" value="Register"></input>
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
			<h2>All event Pass</h2>
			<div class="content">
			  <p style="text-align: center;">With this pass you can take part in any of the events excluding the events of Musicclub, danceclub, social innovators.</p>
			  <div class="pure-g">
				<div class="pure-u-24-24">
					<input type="button" class="btn-reg2" id="all_pass" value="Register"></input>
				</div>
			</div>
		  </div>
	  </div>
  </div>

  <script type="text/javascript">
  $(".btn-reg").click(function(){
			if(($("#first_event")[0].selectedIndex==0)||($("#second_event")[0].selectedIndex==0)||($("#third_event")[0].selectedIndex==0)){
				return false;
			}
			else{
				regevent();
			}
  });

		function regevent(){
		$(".btn-reg").attr("value","Registered!");
		$(".btn-reg").css("background-color","green");
		$(".btn-reg").css("color","black");
	  }
	 $(".btn-reg2").click(function(){
	 	$(".btn-reg2").attr("value","Registered!");
		$(".btn-reg2").css("background-color","green");
		$(".btn-reg2").css("color","black");
	 });
  </script>

  <script src="js/script.js"></script>
</body>
</html>
<?php
if (isset ($conn)){
  mysqli_close($conn);
}
?>