$(document).ready(function () 
{

	/* Foundation */
	$(document).foundation();
	
	/* Delete protect */
	$('.button-delete').click(function() {
		var ask=confirm("Da li ste sigurni da želite da izbrišete ovu stavku?");
		if(ask){
			return true;
		} else {
			return false;
		}
	});
	
	/* Open file manager */
	$('.image-selector').click(function() {
		var div = $('.article-image-container');
		openKCFinder(div);
	});

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
	}
	
	/* ==========================================
	 * KCFinder 
	 */
	
	function openKCFinder(div) {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
            var img = new Image();
			$(img).bind('load', function () {
				$('.article-image-preview').attr('src', url);
        		$('.article-image-url').attr('value', url); 
			});
            $(img).attr('src', '/images/clanci/tavor-pale-dubrovnik-panorama.jpg');
			 
        }
    };
    window.open('/kcfinder/browse.php?type=images&dir=images/public',
        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
        );
	}
});