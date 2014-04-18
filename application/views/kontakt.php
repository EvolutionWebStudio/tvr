
	<!-- Map -->
	<section class="contact_map small-12 columns">
		
		<script>
			$(document).ready(function() {
   				var map = new google.maps.Map(document.getElementById('map'), {
   					zoom: 17,
   					center: new google.maps.LatLng(43.81399122981739, 18.565582931041718),
   					mapTypeId: google.maps.MapTypeId.ROADMAP
	   			});
   				var marker= new google.maps.Marker({
					position: new google.maps.LatLng(43.81399122981739, 18.565582931041718),
					map: map
				});
			});
		</script>
		<div id="map"></div>
	</section>

	<!-- About -->
	<section class="about text small-7 columns">
		<h2 class="text_big">Turistička agencija Tavor</h2>

		<p>Turistička agencija “Tavor“ Pale bavi se organizovanjem turističkih putovanja u zemlji i inostranstvu: ljetovanjima, zimovanjima, đačkim ekskurzijama, rekreativnim nastavama,  obilaskom kultura, regija, gradova i prirodnih resursa, banjskim i zdravstvenim turizmom, aktivnim i avanturističkim turizmom,  eko i etno turizmom, posjetama manifestacijama i sajmovima, shopping turama, jednodnevnim i vikend izletima, pokloničkim putovanjima itd.</p>

		<hr class="dashed" />

		<p class="address">
			<span><img src="<?php echo base_url(); ?>img/address.png" alt="" /> Autobuska stanica, Pale</span>
			<br/>
			<span><img src="<?php echo base_url(); ?>img/phone.png" alt="" /> +387 (57) 22 42 24</span>
			<br/>
			<span><img src="<?php echo base_url(); ?>img/phone.png" alt="" /> +387 (65) 90 09 95</span>
			<br/>
			<span><img src="<?php echo base_url(); ?>img/email.png" alt="" /> tavor.turizam@gmail.com</span>
		</p>

	</section>

	<!-- Contact form -->
	<section class="contact_form simple small-4 push-1 columns">
		
		<h2 class="text_big">Pošaljite nam poruku</h2>

		<form action="<?php echo site_url("page/kontaktiraj") ?>" class="contact-form">
			<label>Vaše ime</label>
			<input type="text" name="ime" required/>

			<label>Vaš email</label>
			<input type="email" name="email" required/>

			<label>Poruka</label>
			<div class="textarea">
				<textarea name="poruka" cols="30" rows="10" required></textarea>
			</div>

			<div class="small-12 columns submit-button">
				<input class="button small" type="submit" value="Pošalji">
			</div>
			<input type="reset" id="reset" />
		</form>

	</section>
	
		<!-- Image gallery -->
	<section class="gallery small-12 columns">
		
		<!-- Slider navigation -->
		<nav class="slider_nav">
			<a href="#" class="left">&nbsp;</a>
			<a href="#" class="right">&nbsp;</a>
		</nav>

		<!-- Slider -->
		<div class="slider_wrapper">

			<!-- Slider content -->
			<div class="slider_content">
				<a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/tavor1.jpg"><img src="<?php echo base_url(); ?>img/prevoz/tavor1.jpg" /></a>
				<a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/tavor2.jpg"><img src="<?php echo base_url(); ?>img/prevoz/tavor2.jpg" /></a>
				<a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/tavor3.jpg"><img src="<?php echo base_url(); ?>img/prevoz/tavor3.jpg" /></a>
				<a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/tavor4.jpg"><img src="<?php echo base_url(); ?>img/prevoz/tavor4.jpg" /></a>
				<a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/tavor5.jpg"><img src="<?php echo base_url(); ?>img/prevoz/tavor5.jpg" /></a>
				<a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/tavor6.jpg"><img src="<?php echo base_url(); ?>img/prevoz/tavor6.jpg" /></a>
				<a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/tavor7.jpg"><img src="<?php echo base_url(); ?>img/prevoz/tavor7.jpg" /></a>
				<a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dscn5186.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dscn5186.jpg" /></a>
				<a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dscn5188.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dscn5188.jpg" /></a>
				<a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dscn5191.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dscn5191.jpg" /></a>
				<a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dscn5203.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dscn5203.jpg" /></a>
			</div>

		</div>

	</section>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>