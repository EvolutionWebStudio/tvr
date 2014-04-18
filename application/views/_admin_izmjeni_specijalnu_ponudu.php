<div class="small-12 columns">
	<h3>Izmjeni ponudu</h3>
	<form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo site_url("post/update_ponudu"); ?>">
		<div class="small-9 columns">
			<label title="Sažet i primamljiv naslov. Da se ne ponavlja kao neki drugi. Da stane u maksimalno dva reda.">Naslov specijalne ponude</label>
			<input type="text" name="naslov-specijalne-ponude" value="<?php echo $offer->naslov; ?>" />
		</div>
		
		<div class="small-3 columns">
			<br/>
		<label title="Da li je članak objavljen na sajtu ili je vidljiv samo administratoru.">
			<input type="checkbox" name="status" value="1" <?php if ($offer->status) echo "checked"; ?> /> <strong>Objavljena ponuda</strong>
		</label>
		</div>
		
		<div class="small-12 columns">
			<textarea class="ckeditor" name="sadrzaj-specijalne-punude"><?php echo $offer->tekst; ?></textarea>
		</br>
		</div>
		
		<div class="small-6 columns">
			<label>Sezona</label>
			<select name="sezona">
				<option value="ljetovanje" <?php if ($offer->sezona == "ljetovanje") echo "selected"; ?> >Ljetovanje</option>
				<option value="zimovanje" <?php if ($offer->sezona == "zimovanje") echo "selected"; ?> >Zimovanje</option>
			</select>
		<br>
			<label>Smještaj</label>
			<select name="smjestaj">
				<option value="apartman" <?php if ($offer->smjestaj == "apartman") echo "selected"; ?> >Apartman</option>
				<option value="hotel" <?php if ($offer->smjestaj == "hotel") echo "selected"; ?> >Hotel</option>
				<option value="soba" <?php if ($offer->smjestaj == "soba") echo "selected"; ?> >Soba</option>
				<option value="vikendica" <?php if ($offer->smjestaj == "vikendica") echo "selected"; ?> >Vikendica</option>
			</select>
		</br>
			<label>Zemlja</label>
			<input type="text" name="zemlja" value="<?php echo $offer->zemlja; ?>" />
			<br/>
			<label title="Aktuelne specijalne ponude. Preporučeno je maksimalno 9 članaka.">
					<input type="checkbox" name="aktuelno" value="1" <?php if ($offer->aktuelno) echo "checked"; ?> /> Aktuelno
			</label>
		</div>
		
		<div class="small-6 columns">
			<label>Grad</label>
			<select name="grad">
				<?php foreach ($cities as $city): ?>
					<?php if ($city->grad_id == $offer->grad_id): ?>
						<option selected="true" value="<?php echo $city->grad_id; ?>"><?php echo $city->name; ?></option>						
					<?php else: ?>
						<option value="<?php echo $city->grad_id; ?>"><?php echo $city->name; ?></option>						
					<?php endif ?>
				<?php endforeach ?>
			</select>
		</div>
		
		<div class="small-6 columns">
			<label title="Fotografija koja se prikazuje na stranici sa ponudama i na vrhu otvorenog članka. Potrebne dimenzije su 602 x 280 piksela.">Naslovna fotografija</label>
			<div class="article-image-container">
				<img class="article-image-preview" src="<?php echo base_url().$offer->link; ?>" alt="Fotografija nije postavljena" />
			</div>
			<input type="hidden" name="slika-clanka" value="" class="article-image-url"/>
			<a href="#" class="image-selector button small secondary">Izaberite fotografiju</a>
		</div>
		
		<div class="small-12 columns">
			<label title="Veoma važan opis koji se obavezno treba pisati. Prikazuje se kada neko podjeli članak na društvenim mrežama.">Opis za društvene mreže</label>
			<textarea name="opis"><?php echo $offer->opis; ?></textarea>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $offer->pid; ?>" /> 
		<div class="small-12 columns submit-button">
			<input class="button small" type="submit" value="Sačuvaj">
		</div>
	</form>
</div>