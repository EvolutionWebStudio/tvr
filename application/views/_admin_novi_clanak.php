<div class="small-12 columns">
	<h3>Nova ponuda</h3>
	<form method="post"  enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo site_url("post/add_clanak"); ?>">
		<div class="small-9 columns">
			<label title="Sažet i primamljiv naslov. Da se ne ponavlja kao neki drugi. Da stane u maksimalno dva reda.">Naslov</label>
			<input type="text" name="naslov-clanka" required/>
		</div>
		
		<div class="small-3 columns">
			<br/>
		<label title="Da li je članak objavljen na sajtu ili je vidljiv samo administratoru.">
			<input type="checkbox" name="status" value="1" /> <strong>Objavljena ponuda</strong>
		</label>
		</div>
		
		<div class="small-12 columns">
			<textarea class="ckeditor" name="sadrzaj-clanka"></textarea>
		</br>
		</div>
		
		
		<div class="small-6 columns">
			<label>Kategorija</label>
			<select name="destinacija">
				<?php foreach ($categories as $c): ?>
					<option value="<?php echo $c->id; ?>"><?php echo $c->naziv; ?></option>
				<?php endforeach ?>
			</select>
		</div>
		
		<div class="small-6 columns">
			<label title="Fotografija koja se prikazuje na stranici sa ponudama i na vrhu otvorenog članka. Potrebne dimenzije su 602 x 280 piksela.">Naslovna fotografija</label>
			<div class="article-image-container">
				<img class="article-image-preview" src="" alt="Fotografija nije postavljena" />
			</div>
			<input type="hidden" name="slika-clanka" value="" class="article-image-url"/>
			<a href="#" class="image-selector button small secondary">Izaberite fotografiju</a>
		</div>
		
		<div class="small-6 columns">
			<label title="Aktuelni članci koji se prikazuju na početnoj stranici. Preporučeno je maksimalno 9 članaka.">
				<input type="checkbox" name="aktuelno" value="1" /> Aktuelno
			</label>
			<label title="Link do članka, u slajderu na početnoj stranici.">
				<input type="checkbox" name="slider" value="1" /> Slajder
			</label>
			<div class="small-2 columns">
					<label title="Prioritet prikazivanja clanka">Prioritet</label>
					<input type="text" name="prioritet-clanka" value="<?php echo $prioritet; ?>" required/>
				</div>
		</div>
		
		<div class="small-12 columns">
			<label title="Naslov koji se isisuje na slajderu velikim slovima. Ne smije biti previše dug pa da pređe u dva reda.">Naslov na slajderu</label>
			<input type="text" name="naslov-slider" />
		</div>
		
		<div class="small-12 columns">
			<label title="Zanimljiva recenica koja će privući posjetioca da klikne na ponudu. Ne smije da prelazi u dva reda.">Tekst na slajderu</label>
			<input type="text" name="tekst-slider" />
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