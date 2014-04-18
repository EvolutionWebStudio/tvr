<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
	<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo $this->page_title; ?></title>
		<meta name="title" content="<?php echo $this->page_title; ?>">
		<meta name="description" content="<?php echo $this->meta_description; ?>">
		<meta name="viewport" content="width=device-width">
		<meta name="author" content="Matrix Web Team | www.matcomp.ba">
		<meta name="google-translate-customization" content="b730e710c8639e7e-7f343b3b3a2d5279-g18c81a15891f4d9a-11"></meta>
		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

		<link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize.css">
 		<link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/smoothness/jquery-ui-1.8.16.custom.css">
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700|Open+Sans:400,300&subset=latin-ext' rel='stylesheet' type='text/css'>
		

		<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.png">

		<script src="<?php echo base_url(); ?>js/vendor/modernizr-2.6.2.min.js"></script>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="<?php echo base_url(); ?>js/vendor/jquery-1.9.1.min.js"><\/script>')
		</script>

	</head>
	<body>
		<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->

		<!-- Header -->
		<?php if(!$this->background_picture) $this->background_picture = $this->config->item('background_picture');?>
		<header class="main-header" style="<?php echo 'background: url('.base_url().$this->background_picture.') center center no-repeat; background-size: cover;';?>">
			<div class="row">
				<div id="panel" class="small-12 columns">
					<h1 class="logo"><a href="<?php echo base_url(); ?>">Tavor</a></h1>
					<nav>
						<ul>
							<li class="<?=($this->uri->segment(1)===FALSE)?'selected':''?>" >
								<a href="<?php echo base_url(); ?>">Početna</a>
							</li>
							<li class="<?=($this->uri->segment(0)==="ponude")?'selected':''?>" >
								<a href="<?php echo site_url("ponude"); ?>">Ponude</a>
							</li>
							<li class="<?=($this->uri->segment(1)==="zimovanja")?'selected':''?>" >
								<a href="<?php echo site_url(strtolower($this->config->item('season'))); ?>"><?php echo $this->config->item('season'); ?></a>
							</li>
							<li class="<?=($this->uri->segment(1)==="ljetovanja")?'selected':''?>" >
								<a href="<?php echo site_url("ljetovanja"); ?>">Ljetovanja</a>
							</li>
							<li class="<?=($this->uri->segment(1)==="ekskurzije")?'selected':''?>" >
								<a href="<?php echo site_url("ekskurzije"); ?>">Ekskurzije</a>
							</li>
							<li class="<?=($this->uri->segment(1)==="kontakt")?'selected':''?>" >
								<a href="<?php echo site_url("kontakt"); ?>">Kontakt</a>
							</li>
							<li class="call-to-action-btn">
								<a href="<?php echo site_url("rezervacija"); ?>">Rezervacija</a>
							</li>
						</ul>
					</nav>

				</div>
			</div>
			
			<div class="notifications">
				<div id="floater"></div>
				<div id="content">
					<div class="form-status"></div>
					<div class="form-response">
						<p></p>
					</div>
				</div>
			</div>
			
			<?php if ($this->slider) { ?>
			<nav class="slider_nav">
				<a href="#" class="left">&nbsp;</a>
				<a href="#" class="right">&nbsp;</a>
			</nav>

			<div class="slider_wrapper">
				<ul class="homepage_slider">
					<?php foreach ($this->slider as $s): ?>
					<li>
						<h2><a href="<?php echo site_url("post/clanak/$s->cid") ?>"><?php echo $s->slider_naslov; ?></a></h2>
						<p>
							<?php echo $s->slider_tekst; ?>
						</p>
					</li>
					<?php endforeach ?>
				</ul>
				<div class="clearfix"></div>
			</div>
			<?php } ?>
			
			<?php if($this->section_title != null)
			{
				echo "<h2 class=\"page-title\"><span>".$this->section_title."</span></h2>";
			} ?>
		</header>
		
		<div class="row main-content">
			<?php echo $contents; ?>
		</div>

		<footer>
			<div class="row">
				<div class="small-9 columns">
				<nav class="">
					<a href="<?php echo base_url(); ?>">Početna</a>
					<a href="<?php echo site_url("ponude"); ?>">Ponude</a>
					<a href="<?php echo site_url(strtolower($this->config->item('season'))); ?>"><?php echo $this->config->item('season'); ?></a>
					<a href="<?php echo site_url("ekskurzije"); ?>">Ekskurzije</a>
					<a href="<?php echo site_url("opsti-uslovi"); ?>">Opšti uslovi</a>
					<a href="<?php echo site_url("kontakt"); ?>">Kontakt</a>
					<a href="<?php echo site_url("rezervacija"); ?>">Rezervacija</a>
				</nav>
				<p class="copyright">
					© 2013 Turistička agencija Tavor | <a href="http://matcomp.ba/web/web-design" target="_blank" title="Matrix Computers Pale">by matrix web team</a> 
				</p>
				</div>
				<div class="adress small-3 columns">
					<div id="google_translate_element"></div>
				</div>
			</div>
		</footer>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')
		</script>
		 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script>
  			document.write('<script src=' +
  			('__proto__' in {} ? '<?php echo base_url(); ?>js/vendor/zepto.min' : '<?php echo base_url(); ?>js/vendor/jquery') +
  			'.js><\/script>')
  		</script>
		
		<script src="<?php echo base_url(); ?>js/plugins.js"></script>
	  	<script src="<?php echo base_url(); ?>js/foundation.min.js"></script>
		<script src="<?php echo base_url(); ?>js/script.js"></script>
		<script src="<?php echo base_url(); ?>js/foundation/foundation.forms.js"></script>
	  	<script src="<?php echo base_url(); ?>js/vendor/jquery.ui.datepicker-sr-RS.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url(); ?>js/libs/jquery.mousewheel-3.0.6.pack.js"></script>

		<link rel="stylesheet" href="<?php echo base_url(); ?>js/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
		<script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
		
		<script type="text/javascript">
			function googleTranslateElementInit() {
  				new google.translate.TranslateElement({pageLanguage: 'sr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
			}
		</script>
		<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		
		<script>
  		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  		ga('create', 'UA-42143915-1', 'tavor-turizam.com');
  		ga('send', 'pageview');

		</script>
		
		<div class="hidden">
			<script type="text/javascript">
				document.write('<img src="<?php echo base_url(); ?>chilistats/counter.php?ref=' + escape(document.referrer) + '"></a>')
			</script>
			<noscript><img src="<?php echo base_url(); ?>chilistats/counter.php" /></noscript>
		</div>
	</body>
</html>
