<div class="small-12 columns">
	<h3>Izmjeni destinaciju</h3>
	<form method="post"  enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo site_url("destinacija/update_destinaciju"); ?>">
		<div class="small-9 columns">
			<label title="Sažet i primamljiv naslov. Da se ne ponavlja kao neki drugi. Da stane u maksimalno dva reda.">Naslov</label>
			<input type="text" name="naslov-clanka" value="<?php echo $param->naslov; ?>"/>
		</div>
		
		<div class="small-3 columns">
			<br/>
		<label title="Da li je članak objavljen na sajtu ili je vidljiv samo administratoru.">
			<input type="checkbox" name="status" value="1" <?php if ($param->status) echo "checked"; ?>/> <strong>Objavljena destinacija</strong> 
		</label>
		</div>
		
		<div class="small-12 columns">
			<textarea class="ckeditor" name="sadrzaj-clanka"><?php echo $param->tekst; ?></textarea>
		</br>
		</div>
		
		<div class="small-6 columns">
			<label title="Fotografija koja se prikazuje na stranici sa ponudama i na vrhu otvorenog članka. Potrebne dimenzije su 602 x 280 piksela.">Naslovna fotografija</label>
			<div class="article-image-container">
				<img class="article-image-preview" src="<?php echo base_url().$param->link; ?>" alt="Fotografija nije postavljena" />
			</div>
			<input type="hidden" name="slika-clanka" value="" class="article-image-url"/>
			<a href="#" class="image-selector button small secondary">Izaberite fotografiju</a>
		</div>
		
		<div class="small-12 columns">
			<label title="Veoma važan opis koji se obavezno treba pisati. Prikazuje se kada neko podjeli članak na društvenim mrežama.">Opis za društvene mreže</label>
			<textarea name="opis"> <?php echo $param->opis; ?></textarea>
		</div>
		
			<input type="hidden" name="id" value="<?php echo $param->did; ?>"/>  
		<div class="small-12 columns submit-button">
			<input class="button small" type="submit" value="Sačuvaj">
		</div>
	</form>
</div>