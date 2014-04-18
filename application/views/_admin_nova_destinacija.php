<div class="small-12 columns">
	<h3>Nova destinacija</h3>
	<form method="post"  enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo site_url("destinacija/add_destinaciju"); ?>">
		<div class="small-9 columns">
			<label title="Sažet i primamljiv naslov. Da se ne ponavlja kao neki drugi. Da stane u maksimalno dva reda.">Naslov</label>
			<input type="text" name="naslov-clanka" />
		</div>
		
		<div class="small-3 columns">
			<br/>
		<label title="Da li je članak objavljen na sajtu ili je vidljiv samo administratoru.">
			<input type="checkbox" name="status" value="1" /> <strong>Objavljena destinacija</strong>
		</label>
		</div>
		
		<div class="small-12 columns">
			<textarea class="ckeditor" name="sadrzaj-clanka"></textarea>
		</br>
		</div>
		
		<div class="small-6 columns">
			<label title="Fotografija koja se prikazuje na stranici sa ponudama i na vrhu otvorenog članka. Potrebne dimenzije su 602 x 280 piksela.">Naslovna fotografija</label>
			<div class="article-image-container">
				<img class="article-image-preview" src="" alt="Fotografija nije postavljena" />
			</div>
			<input type="hidden" name="slika-clanka" value="" class="article-image-url"/>
			<a href="#" class="image-selector button small secondary">Izaberite fotografiju</a>
		</div>
		
		<div class="small-12 columns">
			<label title="Veoma važan opis koji se obavezno treba pisati. Prikazuje se kada neko podjeli članak na društvenim mrežama.">Opis za društvene mreže</label>
			<textarea name="opis"></textarea>
		</div>
		
		<div class="small-12 columns submit-button">
			<input class="button small" type="submit" value="Sačuvaj">
		</div>
	</form>
</div>