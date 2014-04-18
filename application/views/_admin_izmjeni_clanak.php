<div class="small-12 columns">
	<h3>Izmjeni ponudu</h3>
	<form method="post"  enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo site_url("post/update_clanak"); ?>">
		<div class="small-9 columns">
			<label title="Sažet i primamljiv naslov. Da se ne ponavlja kao neki drugi. Da stane u maksimalno dva reda.">Naslov</label>
			<input type="text" name="naslov-clanka" value="<?php echo $post->naslov; ?>" required/>
		</div>
		
		<div class="small-3 columns">
			<br/>
		<label title="Da li je članak objavljen na sajtu ili je vidljiv samo administratoru.">
			<input type="checkbox" name="status" value="1" <?php if ($post->status) echo "checked"; ?>/> <strong> Objavljena ponuda</strong> 
		</label>
		</div>
		
		<div class="small-12 columns">
			<textarea class="ckeditor" name="sadrzaj-clanka"><?php echo $post->tekst; ?></textarea>
		</br>
		</div>
		
		<div class="small-6 columns">
			<label>Kategorija</label>
			<select name="destinacija">
				<?php foreach ($categories as $c): ?>
					<option value="<?php echo $c->id; ?>" <?php if ($c->id == $post->kategorija_id) echo "selected";  ?>><?php echo $c->naziv; ?> </option>
				<?php endforeach ?>
			</select>
		</br>
				<label title="Aktuelni članci koji se prikazuju na početnoj stranici. Preporučeno je maksimalno 9 članaka.">
					<input type="checkbox" name="aktuelno" value="1" <?php if ($post->aktuelno) echo "checked"; ?> /> Aktuelno
				</label>
				<label title="Link do članka, u slajderu na početnoj stranici.">
					<input type="checkbox" name="slider" value="1" <?php if ($post->slider) echo "checked"; ?> /> Slajder
				</label>
				<div class="small-2 columns">
					<label title="Prioritet prikazivanja clanka">Prioritet</label>
					<input type="text" name="prioritet-clanka" value="<?php echo $post->prioritet; ?>" required/>
				</div>
		</div>
		
		<div class="small-6 columns">
			<label title="Fotografija koja se prikazuje na stranici sa ponudama i na vrhu otvorenog članka. Potrebne dimenzije su 602 x 280 piksela.">Naslovna fotografija</label>
			<div class="article-image-container">
				<img class="article-image-preview" src="<?php echo base_url().$post->link; ?>" alt="Fotografija nije postavljena" />
			</div>
			<input type="hidden" name="slika-clanka" value="" class="article-image-url"/>
			<a href="#" class="image-selector button small secondary">Izaberite fotografiju</a>
		</div>
		
		<div class="small-12 columns">
			<label title="Naslov koji se isisuje na slajderu velikim slovima. Ne smije biti previše dug pa da pređe u dva reda.">Naslov na slajderu</label>
			<input type="text" name="naslov-slider" value="<?php echo $post->slider_naslov; ?>" /> 
		</div>
		
		<div class="small-12 columns">
			<label title="Zanimljiva recenica koja će privući posjetioca da klikne na ponudu. Ne smije da prelazi u dva reda.">Tekst na slajderu</label>
			<input type="text" name="tekst-slider"  value="<?php echo $post->slider_tekst; ?>"  />
		</div>
		
		<div class="small-12 columns">
			<label title="Veoma važan opis koji se obavezno treba pisati. Prikazuje se kada neko podjeli članak na društvenim mrežama.">Opis za društvene mreže</label>
			<textarea name="opis"><?php echo $post->opis; ?></textarea>
		</div>
		
			<input type="hidden" name="id" value="<?php echo $post->cid; ?>" /> 
		<div class="small-12 columns submit-button">
			<input class="button small" type="submit" value="Sačuvaj">
		</div>
	</form>
</div>