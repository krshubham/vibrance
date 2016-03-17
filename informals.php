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
	<title>Informals</title>
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
	<link rel="stylesheet" type="text/css" href="css/checkout-sidebar.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
	<script src="js/classie.js"></script>
		<script>
			(function() {
				[].slice.call( document.querySelectorAll( '.checkout' ) ).forEach( function( el ) {
					var openCtrl = el.querySelector( '.checkout__button' ),
						closeCtrls = el.querySelectorAll( '.checkout__cancel' );

					openCtrl.addEventListener( 'click', function(ev) {
						ev.preventDefault();
						classie.add( el, 'checkout--active' );
					} );

					[].slice.call( closeCtrls ).forEach( function( ctrl ) {
						ctrl.addEventListener( 'click', function() {
							classie.remove( el, 'checkout--active' );
						} );
					} );
				} );
			})();
		</script>
</head>

<body>
	<div class="page" id="0">
		<a href="#0" id="fixed-back" style="display: none;"><img src="images/uparrow.png" title="Back to Top"></a>
		<!--========================================================
							  HEADER
							  =========================================================-->
		<header style="background-color: #E85657;">
			<div id="stuck_container" class="stuck_container">
				<div class="container">
					<div class="brand">
						<h1 class="brand_name">
												<a href="index.php">Vibrance'16</a>
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
		<style type="text/css">
		th{
			text-align: center;
		}
		</style>
		<!--========================================================
							  CONTENT
	=========================================================-->
	<section class="content">
				<div class="dummy-browser">
					<div class="dummy-grid dummy-grid--filled dummy-grid--sidebar">
						<div class="dummy-sidebar">
							<div class="checkout">
								<a class="checkout__button" href="#">Informal Events<br><br><i class="fa fa-arrow-circle-o-down"></i></a>
								<div class="checkout__order">
									<div class="checkout__order-inner">
										<button class="checkout__option checkout__option--silent checkout__cancel"><h2>Back</h2></button>
										<table class="checkout__summary">
											<thead>
												<tr><th>Event Name</th><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><th>Date</th></tr>
											</thead>
											<tbody>
												<tr><td><strong><a href="#irrelevance">Irrelevance</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18<sup>th</sup> March 2016</td></tr>												<tr><td><strong><a href="#vmtw"> VIT's minute to win it</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#runfbucks"> Run for bucks</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#ijokers"> Impractical jokers</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#moriarty"> Moriarty</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#5fb"> 5's Football</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#b2d"> Build to destroy</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#tugofwar"> Tug of war</strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#vishwaroopam"> Vishwaroopam</a> </strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#veta"> Veta</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#chitram"> Chitram</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#atelugu"> Anthakshari(telugu)</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#dhammu"> Dhammu</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#rangam"> Rangam</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong> <a href="#bbs"> Beg, borrow, steal</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#cstrip"> Comic strip</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#cwriting"> Creative writing</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#poetry"> Poetry</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#jam"> JAM </a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#expexp"> Expression express</strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#ahindi"> Anthakshari(Hindi)</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#tvwarp"> Television warping</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#tambola"> Tambola</strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#fbc"> Film buff challenge</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>19<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#ftuw"> Float till U win</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18<sup>th</sup> March 2016</td></tr>
												<tr><td><strong><a href="#photo"> Photography</a></strong></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td>18 & 19<sup>th</sup> March 2016</td></tr>
												
											</tbody>
										</table><!-- /checkout__summary -->
										
									</div><!-- /checkout__order-inner -->
								</div><!-- /checkout__order -->
			</section> 
		<script src="js/classie.js"></script>
		<script>
			(function() {
				[].slice.call( document.querySelectorAll( '.checkout' ) ).forEach( function( el ) {
					var openCtrl = el.querySelector( '.checkout__button' ),
						closeCtrls = el.querySelectorAll( '.checkout__cancel' );

					openCtrl.addEventListener( 'click', function(ev) {
						ev.preventDefault();
						classie.add( el, 'checkout--active' );
					} );

					[].slice.call( closeCtrls ).forEach( function( ctrl ) {
						ctrl.addEventListener( 'click', function() {
							classie.remove( el, 'checkout--active' );
						} );
					} );
				} );
			})();
		</script>
		<main style="margin-top: -32em;">
			<section class="well well__offset-3">
				<div class="container">
					<h2><em>Informal</em>EVENTS</h2>
				</div>
			</section>
			<section name="first" class="parallax parallax55" data-parallax-speed="-0.4" id="irrelevance">
				<div class="container">
					<h2><em>Irrelevance</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Buvaneswar B.  &nbsp;&nbsp;&nbsp;9791075374<br><br>Sarvesh S. &nbsp;&nbsp;&nbsp;9444570874<br><br>Mothish Raj V.K.  &nbsp;&nbsp;&nbsp;9952683439</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>1) This event tests the mental stability and out of the box thinking of the participants.
										<br>2) The participant will be asked questions from a questioner in any of their comfortable language where the participant should answer irrelavantly.
										<br> 3) A conversation will build up between the questioner and the participant where the participant should keep answering irrelevantly to whatever question being asked.
										<br> 4) The participant surviving the highest duration answering irrelavantly will be the winner and the best mental stability.
									</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>The participant are liable to choose their comfortable language out of hindhi, tamil, telugu and english. There will be totally 3 rounds. In each round participant will be given 2 chances.</li>
								<li>Participants will be made to progress to the second round based on the highest duration spoken.</li>
								<li>Out of the two chances given to the individual, the best duration will be taken into consideration for deciding the progress to the next round.
								</li>
								<li>The number of participants progressing to the next level will be the top half of the total number of participants.</li>
								<li>The number of participants to progress to the third stage will be top 1/3rd of the participants taking part in the second round.</li>
								<li>The top 3 best durations of the participants in the third level will be declared as the winners.</li>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_irrelevance" value="irrelevance_alone_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="irrelevance" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form>    
				</div>
			</section>
			<section name="second" class="parallax parallax56" data-parallax-speed="-0.4" id="vmtw">
				<div class="container">
					<h2><em>VIT's Minute to Win it</em>Team of 2</h2>
					<br>
					<br>
					<h4 style="text-align: left;font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Chintha Vamshi &nbsp;&nbsp;&nbsp;8681882677<br><br>Ajay C.S. &nbsp;&nbsp;&nbsp;7871258605<br><br>Arun Thomas &nbsp;&nbsp;&nbsp;868165223</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>One minute! Sixty seconds!
										<br>Less than the time most people can hold their breaths. We throw at you challenges. Come! We dare you to survive 60 seconds!!
										<br>60 seconds to glory!! The clock is ticking.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Two participants in a team.</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Each team will be given tasks.</li>
								<li>Each task has to be completed in a minute.</li>
								<li>Teams which fail to complete the task are eliminated.</li>
								<li>4.In case no teams complete the task, the extent to which the task is completed determines those who qualify to the next round.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_minutetowin" value="minutetowin_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="minutetowin" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form>    
				</div>
			</section>
			<section name="third" class="parallax parallax57" data-parallax-speed="-0.4" id="runfbucks">
				<div class="container">
					<h2><em>Run for Bucks</em>Team of 2</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Manvender Singh &nbsp;&nbsp;&nbsp;8428058804<br><br>Ashu Raj &nbsp;&nbsp;&nbsp;9790717809</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>The Event consists of two rounds.
										<br>Round 1 (Elimination Round) :- In this round approx 100 balloons will be hanging from the ceiling of a room. There will be one golden balloon.4 teams will participate at a time having two members in each. One of the member of the team will be blind folded. The other member has to direct his team mate to prick the golden balloon. The one who picks the golden balloon first will be selected for the Final Round.
										<br>Round 2 (Final Round) :- In this round each of the selected teams will have an envelope. In that envelope there will be some task and one picture of any of the place of VIT .Each task will contain marks according to its difficulty level. Then the team have to follow the picture and find that place to get the next envelope. There will be four envelopes for each team in the whole game. Every envelope will contain tasks and a picture for the next step.The one who will complete the whole steps with maximum marks will be consider as Winner.
									</p>
								</li>
								<li>
									<br>
								</li>
								<li>Two participants in a team.</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Bursting one wrong Balloon will give (-2) marks.</li>
								<li>Golden Balloon contains 10 marks.</li>
								<li>Opening the eye in Round 1 will leads to disqualification.</li>
								<li>Nobody can help the other teams.</li>
								<li>Harming or destroying the clues of other teams will cause disqualification.</li>
								<li>In Final Round the team who come first will be awarded +5 bonus points.The second will be given +4.
									<br>This will Continue till the 5th team.After that no bonus point will be given.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_runforbucks" value="runforbucks_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="runforbucks" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form>    
				</div>
			</section>
			<section name="fifth" class="parallax parallax59" data-parallax-speed="-0.4" id="ijokers">
				<div class="container">
					<h2><em>Impractical Jokers</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Shrey Saraswat &nbsp;&nbsp;&nbsp;9790710709<br><br>Pushpit Bagga &nbsp;&nbsp;&nbsp;9873509661<br><br>Ayush Choudhary&nbsp;&nbsp;&nbsp;9790727796</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Let this year’s games begin with a tinge of impractical yet shameless jokes.Are you daring enough?Do you have enough guts to do a given dare?Spin the wheel to find out a dare for yourself, complete it to win or lose your honour.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Complete the given dare in respective time under given conditions, if failed to do so you lose.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_impracticaljokers" value="impracticaljokers_alone_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="impracticaljokers" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form>   
				</div>
			</section>
			<section name="sixth" class="parallax parallax60" data-parallax-speed="-0.4" id="moriarty">
				<div class="container">
					<h2><em>Moriarty</em>Team of 2-4</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Sneha Madasu &nbsp;&nbsp;&nbsp;9003126821</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>
										Moriarty is a dynamic crime investigation event packed with intelligent deductions where you have to root into a real crime scene, inspect the evidence, Sherlock it out and interact with real time characters of the game. You need to interrogate the characters, break them down catch Moriarty (sherlock holmes serial reference), to solve the case.
										<br> There is no limitation on creativity and thinking, aka you are free to use Internet, phones, cameras, pagers, anything you possibly can. So, just make a team (2-4) and get your Sherlock hats because, THE GAME IS ON. For Amateurs, please.. This is NOT a treasure hunt. The awesomeness is far beyond that level.
										<br> So, we would strongly recommend you to be there and brace yourselves because... THERE’S AN EAST WIND COMING.
									</p>
								</li>
								<li>
									<br>
								</li>
								<li>2-4 participants in a team.</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>All teams are provided with a Moriarty ID which has to be shown for any sort of access- it may be entering the evidence scene, interrogating the characters or any correspondence.</li>
								<li>The Teams are not allowed to split and carry on multiple investigation for fear of malpractice and plagiarism.</li>
								<li> The Teams are not allowed to discuss with other teams or exchange data under any circumstances at any point of time during the game. Doing so would result in immediate disqualification.</li>
								<li>Any sort of discrepancy and issue sorted by the jury is final and unquestionable.
								</li>
								<li>Any sort of physical or abusive behaviour with the team results in immediate disqualification and reporting of the team to the disciplinary committee.</li>
								<li>Any sort of indecent photography or videography of the characters would be dealt with seriously and reported to the management.
								</li>
								<li>You are fully allowed to search the web for any sort of information or who knows the story itself. #challenge_accepted.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_moriarty" value="moriarty_team_50_d" style="display: none;">
						<center>
							<select id="parti_moriarty" <?php echo $event_view; ?> >
								<option value="0">Select the number of participants in your team</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>                            
						</center>
						<div style="text-align: center; ">
							<input id="moriarty" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form>    
				</div>
			</section>
			<section name="seventh" class="parallax parallax61" data-parallax-speed="-0.4" id="5fb">
				<div class="container">
					<h2><em>5's Football</em>Team of 8</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>S. Balasubramanian &nbsp;&nbsp;&nbsp;9940551465</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>
										8 players are mandatory.
										<br>4+1 with 3 rolling substitutes.
										<br>No offside.
										<br>The match will have 2 halves with each half being 6 mins. [Subject to change].
										<br>No throw in if the ball goes out. Only kick-in.
										<br>Matches will be conducted on knockout basis.
										<br>In case of the match being tied, it will be followed with a penalty shootout. Each side will take 3 penalties. Sudden death to follow if the penalties are tied.
										<br>On field referee's decision will be final.
									</p>
								</li>
								<li>
									<br>
								</li>
								<li>8 participants in a team.</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>4 outfield players with 1 GK and 3 subtitutes are mandatory.</li>
								<li>Rolling substitutions are allowed. No offside.</li>
								<li>No throw. Only kick-in if the ball goes out.</li>
								<li>Match will have 2 halfs. Each half around 6-7 mins.</li>
								<li>The tournament will be conducted based on the knockout basis.</li>
								<li>If the match is tied a penalty shootout will be conducted with esch side taking 3 each.</li>
								<li>On field refrees decision will be final.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_fivefootball" value="fivefootball_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="fivefootball" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="eighth" class="parallax parallax62" data-parallax-speed="-0.4" id="b2d">
				<div class="container">
					<h2><em>Build to Destroy</em>Team of 2</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Aman Sharma &nbsp;&nbsp;&nbsp;9528258458</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>This event is about making the tallest and the strongest building within the given time limit with given materials, such that it should not fall down on hitting it with a ball.</p>
								</li>
								<li>
									<br>
								</li>
								<li>2 participants in a team.</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Instructions:
								<br>
								<li>Round 1: Two teams will be provided with bricks, epmty tin cans, plywood, pepsi bottles. Their task is to make the tallest building possible in given time limit of 90 seconds using all the materials provided.</li>
								<br>
								<li>Round 2: Team A will take there shot at team B building and vice versa. Each team will get 3 chance to destroy opponents building by tennis ball. The points for building with particular object and to destroy the same will be decided later. And in the final round players will be blind folded while taking 3 shots or the game will be made more difficult at each successive round.
								</li>
							</p>
							<p class="indents-3">Rules:
								<br>
								<li>Only three chances will be given for knocking to each team.</li>
								<li>Only 90 sec will be given to build.</li>
								<li>The team with maximum points after both the rounds, wins.</li>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_buildtodestroy" value="buildtodestroy_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="buildtodestroy" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="ninth" class="parallax parallax63" data-parallax-speed="-0.4" id="tugofwar">
				<div class="container">
					<h2><em>Tug of War</em>Team of 5</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Anuraj Ranjan &nbsp;&nbsp;&nbsp;9092961943</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Two teams of five, whose total mass must not exceed a maximum weight as determined for the class, align themselves at the end of a rope approximately 11 centimetres (4.3 in) in circumference. The rope is marked with a "centre line" and two markings 4 metres (13 ft) either side of the centre line. The teams start with the rope's centre line directly above a line marked on the ground, and once the contest (the "pull") has commenced, attempt to pull the other team such that the marking on the rope closest to their opponent crosses the centre line, or the opponents commit a foul (such as a team member sitting or falling down).</p>
									<li>
										<br>
									</li>
									<li>5 participants in a team.</li>
									<li>
										<br>
									</li>
									<li>Registration fees: Rs. 50/- [Internal]</li>
									<li>Registration fees: Rs. 100/- [External]</li>
								</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Lowering ones elbow below the knee during a 'pull' - known as 'Locking' - is a foul.</li>
								<li>touching the ground for extended periods of time - is a foul.</li>
								<li>The rope must go under the arms; actions such as pulling the rope over the shoulders may be considered a foul.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_tugofwar" value="tugofwar_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="tugofwar" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="tenth" class="parallax parallax64" data-parallax-speed="-0.4" id="vishwaroopam">
				<div class="container">
					<h2><em>Vishwaroopam</em>Team of 3</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Shaik Chandu &nbsp;&nbsp;&nbsp;8148504802</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Viswaroopam is an event completely based on Acting capability. </p>
								</li>
								<li>
									<br>
								</li>
								<li>3 participants in a team.</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Everyone of you who think that you can Act, you may be the one to win the prize for this fest . All further rules will be given on-spot.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_vishwaroopam" value="vishwaroopam_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="vishwaroopam" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="eleventh" class="parallax parallax65" data-parallax-speed="-0.4" id="veta">
				<div class="container">
					<h2><em>Veta</em>Team of 2</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Upendra &nbsp;&nbsp;&nbsp;8608840863</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Treasure hunt based on telugu riddles.</p>
								</li>
								<li>
									<br>
								</li>
								<li>2 participants in a team.</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Rules will be given to participants on the spot.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_veta" value="veta_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="veta" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="twelvth" class="parallax parallax66" data-parallax-speed="-0.4" id="chitram">
				<div class="container">
					<h2><em>Chitram</em>Team of 3</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>M. Narendra &nbsp;&nbsp;&nbsp;9841188231</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Chithram is an event completely based on visual capability.</p>
								</li>
								<li>
									<br>
								</li>
								<li>3 participants in a team.</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li> Everyone of you who think that you can crack visual puzzles easily , You may be the one to win the prize this fest Remember your eyes will definitely not cheat you. All further rules will be given on-spot.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_chitram" value="chitram_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="chitram" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="thirteenth" class="parallax parallax67" data-parallax-speed="-0.4" id="atelugu">
				<div class="container">
					<h2><em>Anthakshari (Telugu)</em>Team of 3</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Hemanth P. &nbsp;&nbsp;&nbsp;8682802596</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Sing-A-Song in Telugu starting from the last syllable of the opponents song.</p>
								</li>
								<li>
									<br>
								</li>
								<li>3 participants in a team.</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>The team maybe of 2 or 3 members. No obsenity will be encouraged.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_antaksharitelugu" value="antaksharitelugu_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="antaksharitelugu" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="fourteenth" class="parallax parallax68" data-parallax-speed="-0.4" id="dhammu">
				<div class="container">
					<h2><em>Dhammu</em>Team of 3</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Aakarsh Kulkarni &nbsp;&nbsp;&nbsp;8754549987</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>IT IS A TELUGU GAME SHOW BASED ON TELUGU MOVIES.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>IT CONSISTS OF 4 ROUNDS IN WHICH ELIMINATION TAKES PLACE EVENTUALLY </li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_dhammu" value="dhammu_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="dhammu" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="fifteenth" class="parallax parallax69" data-parallax-speed="-0.4" id="rangam">
				<div class="container">
					<h2><em>Rangam</em>Team of 3</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>A. V. S. Manideep &nbsp;&nbsp;&nbsp;9940159306</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p> It's a telugu game show based on movies and movie quiz questions.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Rules will be given to the participant on the spot.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_rangam" value="rangam_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="rangam" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="sixteenth" class="parallax parallax70" data-parallax-speed="-0.4" id="bbs">
				<div class="container">
					<h2><em>Beg, Borrow, Steal</em>Team of 2</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Akshat Chandra &nbsp;&nbsp;&nbsp;8171482622<br><br>Kushagra Srivastava &nbsp;&nbsp;&nbsp;9798494274</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>The organizers provide the contestants with a list of 25-30 items where contestants have to bring these items by asking or borrowing from others within our campus to the jury within a time limit of 1hr. </p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Each item may carry 5-10 points.In case of tie the team which reaches the jury first is declared as winner.If any team reaches the jury late they will be disqualified. The Jury decision is final</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_begborrowsteal" value="begborrowsteal_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="begborrowsteal" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="seventeenth" class="parallax parallax71" data-parallax-speed="-0.4" id="cstrip">
				<div class="container">
					<h2><em>Comic Strip</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Savio Cheyaden &nbsp;&nbsp;&nbsp;9003548739<br><br>Aryaman Singh &nbsp;&nbsp;&nbsp;9094641500<br><br>Shivani Yadav&nbsp;&nbsp;&nbsp;9923167007</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Drawing story on an interested story line</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Choose an interesting story.Using imagination draw the story in a creative manner.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_comicstrip" value="comicstrip_alone_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="comicstrip" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="eighteenth" class="parallax parallax72" data-parallax-speed="-0.4" id="cwriting">
				<div class="container">
					<h2><em>Creative Writing</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Ridhima Chawdhary&nbsp;&nbsp;&nbsp;8220568901<br><br>Mallika Chowdhary&nbsp;&nbsp;&nbsp;9790725006<br><br>Sai Naveen &nbsp;&nbsp;&nbsp;7702017712</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>In this event, the participants will be given a topic on spots and will be expected to write an article/story/essay on it. The word limit will range from 1000-1500 words. The participants will be provided with the required stationary, but are encouraged to carry their own sets of pens etc as presentation would also carry marks.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Single Prticipation.</li>
								<li>Topics will be provided on spot.</li>
								<li>Word limit 1000-1500 words.</li>
								<li>Plagiarism would lead to disqualification.</li>
								<li>Judgement criterias would be - grammar, creativity, vocabulary and presentation.</li>
								<li>Judges' decision would be indisputable.</li>								
								<br>
							</p>
						</div>                         
					</div>
					<form>
						<input type="text" id="event_creativewriting" value="creativewriting_alone_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="creativewriting" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="ninteenth" class="parallax parallax73" data-parallax-speed="-0.4" id="poetry"> 
				<div class="container">
					<h2><em>Poetry</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Tirshatha Steve Paul&nbsp;&nbsp;&nbsp;9500811995<br><br>Vastavikta Gandhi&nbsp;&nbsp;&nbsp;9790717955<br><br>Aditya Menon &nbsp;&nbsp;&nbsp;9790729798</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>It is a tamil poetry competition.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>For participants topics will be given onspot. They have to finish it within the time limit. It is an individual event.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_poetry" value="poetry_alone_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="poetry" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="twentieth" class="parallax parallax74" data-parallax-speed="-0.4" id="jam">
				<div class="container">
					<h2><em>Just-A-Minute</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Harry Richard &nbsp;&nbsp;&nbsp;9790715854<br><br>Gregory S Mathew&nbsp;&nbsp;&nbsp;8428058428<br><br>Aditya Sathe&nbsp;&nbsp;&nbsp;9962411069</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Just-A-Minute invites the student speaker to talk on a given topic for sixty seconds, without hesitation, repetition, or deviation. Individuals come forth and a topic is given on-the-spot, on which the speaker should speak within the given time limit</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>The time limit given to each speaker is strictly one minute, with a preparation time of 10 seconds.</li>
								<li>Hesitation, repetition and deviation will be penalised accordingly</li>
								<li>The decision made by the judges will be final. No further clarifications shall be entertained</li>
								<br>
							</p>
							<p class="indents-3">Judging criteria:
								<br>
								<li>fluency</li>
								<li>creativity with words</li>
								<li>originality of the content</li>
								<li>grammatical usage</li>
								<li>level of knowledge</li>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_jam" value="jam_alone_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="jam" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="twe_first" class="parallax parallax75" data-parallax-speed="-0.4" id="expexp">
				<div class="container">
					<h2><em>Expression Express</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Nithin Nair &nbsp;&nbsp;&nbsp;Number</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Record your expressions as directed by the panel and showcase them to your judges.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>There will be a set of things, instructions given and the team has to fulfill the tasks / expressions and record them on their phones and submit to the judging panel. The best form of expressionism win.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_expressionexpress" value="expressionexpress_alone_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="expressionexpress" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="twe_second" class="parallax parallax76" data-parallax-speed="-0.4" id="ahindi">
				<div class="container">
					<h2><em>Anthakshari (Hindi)</em>Team of 3</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Parimal Abhishek&nbsp;&nbsp;&nbsp;9092170776<br><br>Abhishek Pratap &nbsp;&nbsp;&nbsp;9790719243<br><br>Megha Mishra &nbsp;&nbsp;&nbsp;9015659025<br><br>Manisha Kumari &nbsp;&nbsp;&nbsp;9176319083</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Sing-a-song in Hindi from the last syllable of the previous song.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>A game of antakshiri in which the competing team has to sing a song that starts with a word the opponent team ended with.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_antaksharihindi" value="antaksharihindi_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="antaksharihindi" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="twe_third" class="parallax parallax77" data-parallax-speed="-0.4" id="tvwarp">
				<div class="container">
					<h2><em>Television Warping</em>Team of 4</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Priyanka Chandrashekhar&nbsp;&nbsp;&nbsp;9790702063<br><br>Manvi Saiwal&nbsp;&nbsp;&nbsp;9790727743<br><br>Sonalee Sreshta &nbsp;&nbsp;&nbsp;7597635215</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>PAUSE. FLASH FORWARD. MUTE. SLOW-MO. If the director calls for it, you warp yourself to it to win.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Maximum of 4 minutes per team will be given to perform given topics.</li>
								<li> 1 minute used with easier topics and rapid switching at judges' discretion.</li>
								<li> Main topics to perform shows on MAY be chosen by the participants.
								</li>
								<li> In case a team is confident of performing on any topic given by the moderators, they get extra points. </li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_televisionwarping" value="televisionwarping_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="televisionwarping" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="twe_fourth" class="parallax parallax78" data-parallax-speed="-0.4" id="tambola">
				<div class="container">
					<h2><em>Tambola</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Kartikeya &nbsp;&nbsp;&nbsp;Number<br><br>Keya Upadhyay&nbsp;&nbsp;&nbsp;8681895059<br><br>Ayush Khandalkar &nbsp;&nbsp;&nbsp;8962219974</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>The aim is to be lucky enough to get 5 in row on your given ticket.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li> 1. A person picks up numbers from a box and announces it on a mic. These are shown on a screen as well. </li>
								<li> 2. All the participants will be issued tickets which contain 15 numbers in random five in each row. As a number is announced, the participants who have that number in their ticket will tick it.</li>
								<li> 3. This process continues throughout the game. The participant who get's 5 in a row wins the game.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_tambola" value="tambola_alone_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="tambola" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="twe_fifth" class="parallax parallax79" data-parallax-speed="-0.4" id="fbc">
				<div class="container">
					<h2><em>Film Buff Challenge</em>Team of 2</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Keerthi &nbsp;&nbsp;&nbsp;9600463865<br><br>Jeevarani &nbsp;&nbsp;&nbsp;9629913424</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Film Buff Challenge is a quiz in which the questions will be asked on cinema.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>The participants should be a group of 2 per team.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_filmbuffchallenge" value="filmbuffchallenge_team_50_d" style="display: none;">                    
						<div style="text-align: center; ">
							<input id="filmbuffchallenge" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form> 
				</div>
			</section>
			<section name="thir_one" class="parallax parallax80" data-parallax-speed="-0.4" id="ftuw">
				<div class="container">
					<h2><em>Float Till U Win</em>Team of 2-3</h2>   
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>M Vivek Raj &nbsp;&nbsp;&nbsp;9003818929<br><br>Ajay C.S. &nbsp;&nbsp;&nbsp;7871258605<br><br>Arun Thomas &nbsp;&nbsp;&nbsp;8681865223<br><br>Vamshi Chintha &nbsp;&nbsp;&nbsp;8681882677</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Think you can build a boat?<br>Think your boat can survive the high seas?<br>Come show your skill!!<br>If your ark can take on the most load you will the crowned Poseidonand you get to take home the spoils of victory!</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Teams of two.</li>
								<li>Time limit for building boat : 90 minutes.</li>
								<li>Boat with the most load capacity wins.</li>
								<li>All required materials will be provided.</li>
								<br>
							</p>
						</div>
					</div>
					<form>
						<input type="text" id="event_floattilluwin" value="floattilluwin_team_50_d" style="display: none;">
						<center>
							<select id="parti_floattilluwin" <?php echo $event_view; ?> >
								<option value="0">Select the number of participants in your team</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select>                            
						</center>
						<div style="text-align: center; ">
							<input id="floattilluwin" class="gobutton" <?php echo $event_view; ?> type="button" value="Register!" onclick="this.value='Registered!'" />
							<?php echo $login_view; ?>
						</div>
					</form>  
				</div>
			</section>
			<!--<section name="twe_sixth" class="parallax parallax80" data-parallax-speed="-0.4">
				<div class="container">
					<h2><em>Pop Corn Movie</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Name &nbsp;&nbsp;&nbsp;Number<br><br>Name &nbsp;&nbsp;&nbsp;Number</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Pop Corn Movie is about making a 3 minute movie in a freestyle theme.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>The team will be made of 3-7 members. </li>
								<br>
							</p>
						</div>
					</div>
				</div>
			</section>
			<section name="twe_seventh" class="parallax parallax81" data-parallax-speed="-0.4">
				<div class="container">
					<h2><em>Walk the Talk</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Name &nbsp;&nbsp;&nbsp;Number<br><br>Name &nbsp;&nbsp;&nbsp;Number</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>During the event the teams will be made to perform various tasks which will involve skill and presence of mind along with lots of fun</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>I round - It will consist of tasks which should be performed in a minute eg: Gems-straw relay, blind throw, dus ka dum, pictionary, pyramid bulding, and such simmilar games.</li>
								<li>II round - It will consist of 5-10 single answer brain teasers and participants will have to balance between time and accuracy.</li>
								<li>III round - It will consist of actual "walk the talk events" in which participants will be given a task in which the competetors will challenge each other.on the task one by one and if one of them says the phrase "Walk the talk" the other one will have to complete the challenge.If they complete it they will win otherwise loose.</li>
								<br>
							</p>
						</div>
					</div>
				</div>
			</section>
			<section name="twe_eighth" class="parallax parallax82" data-parallax-speed="-0.4">
				<div class="container">
					<h2><em>Creative Competition</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Name &nbsp;&nbsp;&nbsp;Number<br><br>Name &nbsp;&nbsp;&nbsp;Number</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Write a composition within a given set of guidelines.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Write a composition within a given set of guidelines. It may be an article or a story.</li>
								<br>
							</p>
						</div>
					</div>
				</div>
			</section>
			<section name="twe_ninth" class="parallax parallax83" data-parallax-speed="-0.4">
				<div class="container">
					<h2><em>Remember and Recall</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Name &nbsp;&nbsp;&nbsp;Number<br><br>Name &nbsp;&nbsp;&nbsp;Number</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>Can you remember everything you've just seen and put it on paper?</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>You will be given time of 30s and you have to recall the names of the items placed before you. After that 30sec you will be provided a paper in which you will be writing the names of the items you have seen. The person who writes the maximum number of items wins.</li>
								<br>
							</p>
						</div>
					</div>
				</div>
			</section>
			<section name="thirty" class="parallax parallax84" data-parallax-speed="-0.4">
				<div class="container">
					<h2><em>Pic-a-boo</em>Individual</h2>
					<br>
					<br>
					<h4 style="text-align: left; font-family: 'Tangerine', serif; font-size:300%">Coordinators:<br><br>Name &nbsp;&nbsp;&nbsp;Number<br><br>Name &nbsp;&nbsp;&nbsp;Number</h4>
					<div class="row">
						<div class="grid_6">
							<ul class="indents-3">
								<li>Description of Event:
									<p>It is a mixture of two of the most popular games: Pictionary and Taboo.</p>
								</li>
								<li>
									<br>
								</li>
								<li>Registration fees: Rs. 50/- [Internal]</li>
								<li>Registration fees: Rs. 100/- [External]</li>
							</ul>
						</div>
						<div class="grid_6">
							<p class="indents-3">Rules:
								<br>
								<li>Pictionary: a word or a phrase is given; one participant will attempt to convey its meaning without speaking or gesturing, but only by drawing on a board. Other team members have to guess what the word/phrase is.</li>
								<li>Taboo: one word, five taboo words. One participant has to describe the taboo word in English, without gesturing, while not using any of the five taboo words mentioned. His team-mates have to guess the word. The event will mix and match Pictionary and Taboo in many different ways. </li>
								<br>
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
