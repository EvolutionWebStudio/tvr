<section class="small-8 columns">

	<h2 class="text_big">Rezervacija</h2>

	<form action="<?php echo site_url("page/rezervisi") ?>" class="reservation-form">
		<label>Destinacija</label>
		<select name="destinacija">
			<?php foreach ($params as $param): ?>
				<option><?php echo $param->naslov; ?></option>
			<?php endforeach ?>
		</select>
		
		<label>Destinacija precizno</label>
		<div class="textarea">
			<textarea name="opis-destinacije" cols="30" rows="10"></textarea>
		</div>
		
		<div class="row">
		<div class="small-6 columns">
			<label>Datum dolaska</label>
			<input type="text" name="datum-dolaska" class="date datepicker" required />
		</div>
		
		<div class="small-6 columns">
			<label>Datum povratka</label>
			<input type="text" name="datum-povratka" class="date datepicker" required />
		</div>
		</div>
		
		<div class="row">
			<div class="small-4 columns">
				<label>Broj odraslih</label>
				<input type="text" name="broj-odraslih" required />
			</div>
		
			<div class="small-4 columns">
				<label>Broj djece</label>
				<input type="text" name="broj-djece" required />
			</div>
		
			<div class="small-4 columns">
			<label>Kućni ljubimci</label>
				<div>
					<label for="ljubimci"><input type="radio" name="ljubimci" value="Ne" checked /><span> Ne </span></label>
					<label for="ljubimci"><input type="radio" name="ljubimci" value="Da" /><span> Da </span></label>
				</div>
			</div>
		</div>
		
		<br/>
		<h2 class="text_big">Lični podaci</h2>
		<br/>
		
		<label>Ime i prezime</label>
		<input type="text" name="ime-i-prezime" required />
		
		<label>Email</label>
		<input type="email" name="email" required />
		
		<label>Broj telefona</label>
		<input type="tel" name="telefon" />
		
		<label>Broj mobitela</label>
		<input type="tel" name="mobitel" required />
		
		<label>Adresa</label>
		<input type="text" name="adresa" />
		
		<label>Broj pošte</label>
		<input type="text" name="broj-poste" />
		
		<label>Grad</label>
		<input type="text" name="grad" />
		
		<label>Država</label>
		<input type="text" name="drzava" />
		
		<label>Komentar</label>
		<div class="textarea">
			<textarea name="komentar" cols="30" rows="10"></textarea>
		</div>
		
		<div class="small-12 columns submit-button">
			<input class="button small" type="submit" value="Pošalji">
		</div>
		

		<p class="status"></p>

	</form>

</section>

<div class="prevoz small-4 columns">
	<br/>
	<ul class="small-block-grid-2">
		<li><a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dsc_0774.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dsc_0774.jpg" /></a></li>
		<li><a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dsc_0784.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dsc_0784.jpg" /></a></li>
		<li><a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dsc_0789.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dsc_0789.jpg" /></a></li>
		<li><a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dscn3789.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dscn3789.jpg" /></a></li>
		<li><a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dscn4390.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dscn4390.jpg" /></a></li>
		<li><a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dscn5037.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dscn5037.jpg" /></a></li>
		<li><a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dscn5184.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dscn5184.jpg" /></a></li>
		<li><a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dscn5186.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dscn5186.jpg" /></a></li>
		<li><a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dscn5188.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dscn5188.jpg" /></a></li>
		<li><a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dscn5191.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dscn5191.jpg" /></a></li>
		<li><a class="fancybox" rel="prevoz" href="<?php echo base_url(); ?>img/prevoz/dscn5203.jpg"><img src="<?php echo base_url(); ?>img/prevoz/dscn5203.jpg" /></a></li>
	</ul>
</div>