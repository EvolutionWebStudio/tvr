<!doctype html>

<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<!-- Mirrored from travel.equiet.sk/ by HTTrack Website Copier/3.x [XR&CO'2010], Sat, 08 Jun 2013 19:51:34 GMT -->
<head>
	<meta charset="utf-8">

	<title>Tavor turizam</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Load CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>fancybox/jquery.fancybox-1.3.4.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/smoothness/jquery-ui-1.8.16.custom.css">

	<!-- Page icon -->
	<link rel="shortcut icon" href="favicon.png">

	<!-- Load Modernizr -->
	<script src="<?php echo base_url(); ?>js/libs/modernizr-2.0.min.js"></script>

	<!-- Load JavaScript -->
	<script src="../ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/libs/jquery-1.6.2.min.js"><\/script>')</script>
	<script src="<?php echo base_url(); ?>js/libs/jquery-ui-1.8.16.custom.min.js"></script>
	<script src="<?php echo base_url(); ?>js/script.js"></script>
	<script src="<?php echo base_url(); ?>fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script src="<?php echo base_url(); ?>js/datepicker.html"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

</head>
<body>
	
<!-- Header -->
<header style="background-image:url(<?php echo base_url(); ?>img/placeholders/1280x1024/12.jpg);">

	<div class="container_12">

		<!-- Title and navigation panel -->
		<div id="panel" class="grid_12">

			<!-- Title -->
			<h1><a href="<?php echo base_url(); ?>">Tavor turizam</a></h1>

			<!-- Navigation -->
			<nav>
				<ul>
					<li>
						<a href="browse.html">Ponuda</a>
						<ul>	
							<li><a href="browse.html">Browse all</a></li>
							<li><a href="browse_hotels.html">Browse hotels</a></li>
							<li><a href="hotel.html">Hotel</a></li>
							<li><a href="trip.html">Trip</a></li>
						</ul>
					</li>
					<li>
						<a href="<?php echo site_url("post/rezervacija"); ?>">Rezervacija</a>
						<
					</li>
					<li>
						<a href="<?php echo site_url("post/prevoz"); ?>">Prevoz</a>
					</li>
					<li>
						<a href="<?php echo site_url("post/opsti_uslovi"); ?>">Opšti uslovi</a>
					</li>
					<li>
						<a href="<?php echo site_url("post/kontakt"); ?>">Kontakt</a>
					</li>
				</ul>

				<!-- Search 
				<form action="#" class="black">
					<input name="search" type="text" placeholder="Search..." />
					<input type="submit" />
				</form>
				-->
			</nav>
		
		</div>

	</div>
	<?php if ($this->slider) { ?>
		<!-- Slider navigation -->
	<nav class="slider_nav">
		<a href="#" class="left">&nbsp;</a>
		<a href="#" class="right">&nbsp;</a>
	</nav>

	
	<!-- Slider -->
	<div class="slider_wrapper">

		<!-- Slider content -->
		<ul class="homepage_slider">

			<!-- First slide -->
			<li>
				<h2><a href="trip.html">Obilazak Svete Gore već od <strong>200 €</strong></a></h2>
				<p> Хиландар, бунар Светог Саве, лоза Светог Симеона Есфигмен</p>
			</li>

			<!-- Second slide -->
			<li>
				<h2><a href="hotel.html">Izlet u Dubrovnik vec od <strong>50 KM</strong></a></h2>
				<p>Posjetite svjetski poznat grad</p>
			</li>

		</ul>

		<div class="clearfix"></div>
	</div>
	<?php } ?>
</header>
<!-- Main content -->
<div class="container_12">

<?php echo $contents; ?>
	
</div> 


<!-- Footer -->
<footer><div class="container_12">
		
		<nav class="grid_8">
			<a href="#">Home</a>
			<a href="#">Catalogue</a>
			<a href="#">Blog</a>
			<a href="#">Contact</a>
			<a href="#">FAQ</a>
		</nav>

		<p class="address grid_4">
			<strong>Travel Agency Inc.</strong><br />
			<span>123 Wall Street , New York</span><br />
			<span><a href="mailto:contact@travelagency.com">contact@travelagency.com</a></span>
		</p>

		<p class="copyright grid_8">
			© 2011 Travel Agency
		</p>

	</div>
</footer>

</body>



















</html>