$(document).ready(function () {


	/* Foundation */
	$(document).foundation();
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
	
	/* FancyBox na slikama u clanku */
	$('.clanak-ponude img').each(function(){
		var imageLink = $(this).attr('src');
		$(this).wrap('<a href="'+imageLink+'" class="fancybox" />');
	});
	
	/* Datepicker */
	jQuery(function($) {
		$.datepicker.regional['sr-SR'] = {
			closeText: 'Zatvori',
			prevText: '&#x3c;',
			nextText: '&#x3e;',
			currentText: 'Danas',
			monthNames: ['Januar','Februar','Mart','April','Maj','Jun',
			'Jul','Avgust','Septembar','Oktobar','Novembar','Decembar'],
			monthNamesShort: ['Jan','Feb','Mar','Apr','Maj','Jun',
			'Jul','Avg','Sep','Okt','Nov','Dec'],
			dayNames: ['Nedelja','Ponedeljak','Utorak','Sreda','Četvrtak','Petak','Subota'],
			dayNamesShort: ['Ned','Pon','Uto','Sre','Čet','Pet','Sub'],
			dayNamesMin: ['Ne','Po','Ut','Sr','Če','Pe','Su'],
			weekHeader: 'Sed',
			dateFormat: 'dd.mm.yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''};
			
		$.datepicker.setDefaults($.datepicker.regional['sr-SR']);
	});
	
	$(function() {
		/*$( ".datepicker" ).datepicker('option', 'dateFormat', 'dd.mm.yy');*/
		$( "#datepicker" ).datepicker( "option", $.datepicker.regional['sr-SR']);
	});

	/* Add border to images */
	$('article a img, .gallery .slider_content img, .results a img, img.add_border, .description .main_image img, .similar_hotels .thumb img, .results_wide .thumb img').each( function () {
		$(this).wrap('<span class="with_border" />');
		$(this).before(
			'<span></span>'
		);
	});

	/* Search form selection */
	$('.search h2 span').click(function () {
		$('.search h2 span').removeClass('selected');
		$(this).addClass('selected')
		$('.search form').css('display', 'none');
		$('.search form[data-form="' + $(this).attr('data-form') + '"]').css('display', 'block');
	});

	/* Slider navigation */
	$('.slider_nav a').click(function (e) {
		e.preventDefault();
	});

	/* Sidebar image slider */
	$('.image_slider').each(function () {

		/* Functions */
		function resetInterval () {
			clearInterval(imageSliderInterval);
			imageSliderInterval = setInterval(next, 8000);
		}
		function next () {
			$('.image_slider .slides').children(':last').fadeOut(1000, function () {
				$(this).prependTo('.image_slider .slides').fadeIn(1);
			});
		}
		function previous () {
			$('.image_slider .slides').children(':last').fadeOut(1000, function () {
				$(this).prependTo('.image_slider .slides').fadeIn(1);
			});
		}

		/* Initialize */
		var imageSliderInterval;
		resetInterval();

		/* Controls */
		$('.image_slider .left').click(function () {
			next();
			resetInterval();
		});
		$('.image_slider .right').click(function () {
			previous();
			resetInterval();
		});

	});

	/* Gallery slider */
	$('.gallery').each(function () {

		/* Functions */
		function resetInterval () {
			clearInterval(gallerySliderInterval);
			gallerySliderInterval = setInterval(next, 8000);
		}
		function next () {
			$('.gallery .slider_content').animate({left: '-150px'}, 1500, function () {
				$('.gallery .slider_content').css({left: '0px'}).children(':first').remove().appendTo($('.gallery .slider_content'));
				$('.gallery .slider_content a').fancybox(); // Reinitialize Fancybox
			});
		}
		function previous () {
			$('.gallery .slider_content').css({left: '-=150px'}).children(':last').remove().prependTo($('.gallery .slider_content'));
			$('.gallery .slider_content a').fancybox(); // Reinitialize Fancybox
			$('.gallery .slider_content').stop().animate({left: '0px'}, 1500);
		}

		/* Initialize */
		var gallerySliderInterval;
		resetInterval();

		/* Controls */
		$('.gallery .left').click(function () {
			previous();
			resetInterval();
		});
		$('.gallery .right').click(function () {
			next();
			resetInterval();
		});

	});

	/* Homepage slider */
	$('.homepage_slider').each(function () {

		/* Functions */
		function resetInterval () {
			clearInterval(gallerySliderInterval);
			gallerySliderInterval = setInterval(next, 8000);
		}
		function next () {
			$('.homepage_slider').animate({left: '-880px'}, 1000, function () {
				$('.homepage_slider').css({left: '0px'}).children(':first').remove().appendTo($('.homepage_slider'));
			});
		}
		function previous () {
			$('.homepage_slider').css({left: '-880px'}).children(':last').remove().prependTo($('.homepage_slider'));
			$('.homepage_slider').animate({left: '0px'}, 1000);
		}

		/* Initialize */
		var gallerySliderInterval;
		resetInterval();

		/* Controls */
		$('header .slider_nav .left').click(function () {
			previous();
			resetInterval();
		});
		$('header .slider_nav .right').click(function () {
			next();
			resetInterval();
		});

	});

	/* Fancybox */
	$('.gallery .slider_content a').fancybox();
	$('.image_slider .slides a').fancybox();
	$('a.fancybox').fancybox();

	/* Contact form */
	formSubmit('.contact-form');

	/* Reservation form */
	formSubmit('.reservation-form');
	
	
	/* ==========================================
	 * Form submit
	 */
	function formSubmit (formId)
	{
		$(formId).submit(function () {
		$('.notifications').show();
		var data = $(formId).serialize();
		var url = $(formId).attr('action');
		$.ajax({
			type: 'POST',
			url: url,
			data: data,
			success: function(data) {
				if ( data == 'sent' ) 
				{
					showNotification('Formular je uspješno poslat.<br/>Odgovorićemo Vam u najskorijem roku.');
					$('#reset').click();
				} 
				else if ( data == 'invalid' ) 
				{
					showNotification('Your name, email or message is invalid.');
				} 
				else 
				{
					showNotification('Došlo je do greške, formular nije poslat.<br/><strong>Pokušajte ponovo.</strong>');	
				}
			},
			error: function () 
			{
				showNotification('Došlo je do greške, formular nije poslat.<br/><strong>Pokušajte ponovo.</strong>');
			}
		});
		return false;
	});
	}
	
	/* ==========================================
	 * Notification box 
	 */
	
	function showNotification(notificationText)
	{
		$('.notifications').stop();
		$('.notifications').show();
		$('div.form-status').hide();
		$('div.form-response p').html(notificationText);	
		
		notificationTimer();
	}

	function notificationTimer() 
	{
		setTimeout(function()
		{
			$('.notifications').fadeOut();
		}, 6000);
		
		$('.notifications').click(function(){
			$('.notifications').stop();
			$(this).fadeOut();
		});
	};
});