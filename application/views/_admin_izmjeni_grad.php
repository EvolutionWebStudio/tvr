<div class="small-12 columns">
	<h3>Izmjeni grad</h3>
	<form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo site_url("location/update_grad"); ?>">
		<div class="small-9 columns">
			<label title="Ime zemlje. Npr. Srbija">Ime grada</label>
			<input type="text" name="naslov-specijalne-ponude" value="<?php echo $city->name; ?>" />
		</div>
		<div class="small-3 columns">
			<label title="Država">Država</label>
			<select name="drzava">
				<?php foreach ($drzave as $d): ?>
					<?php if ($d->zemlja_id == $city->zemlja_id): ?>
						<option selected="true" value="<?php echo $d->zemlja_id; ?>"><?php echo $d->name; ?></option>
					<?php else: ?>
						<option value="<?php echo $d->zemlja_id; ?>"><?php echo $d->name; ?></option>
					<?php endif ?>
				<?php endforeach ?>
			</select>
		</div>

		<div class="small-6 columns">
			<label title="Fotografija koja se prikazuje na stranici sa ponudama i na vrhu otvorenog članka. Potrebne dimenzije su 602 x 280 piksela.">Naslovna fotografija</label>
			<div class="article-image-container">
				<img class="article-image-preview" src="<?php echo base_url().$city->link; ?>" alt="Fotografija nije postavljena" />
			</div>
			<input type="hidden" name="slika-clanka" value="" class="article-image-url"/>
			<a href="#" class="image-selector button small secondary">Izaberite fotografiju</a>
		</div>

		<input type="hidden" name="id" value="<?php echo $city->grad_id; ?>" /> 
		<div class="small-12 columns submit-button">
			<input class="button small" type="submit" value="Sačuvaj">
		</div>
	</form>
</div>