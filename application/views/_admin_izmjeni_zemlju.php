<div class="small-12 columns">
	<h3>Izmjeni zemlju</h3>
	<form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo site_url("location/update_zemlju"); ?>">
		<div class="small-9 columns">
			<label title="Ime zemlje. Npr. Srbija">Ime zemlje</label>
			<input type="text" name="naslov-specijalne-ponude" value="<?php echo $country->name; ?>" />
		</div>

		<div class="small-6 columns">
			<label title="Fotografija koja se prikazuje na stranici sa ponudama i na vrhu otvorenog članka. Potrebne dimenzije su 602 x 280 piksela.">Naslovna fotografija</label>
			<div class="article-image-container">
				<img class="article-image-preview" src="<?php echo base_url().$country->link; ?>" alt="Fotografija nije postavljena" />
			</div>
			<input type="hidden" name="slika-clanka" value="" class="article-image-url"/>
			<a href="#" class="image-selector button small secondary">Izaberite fotografiju</a>
		</div>

		<input type="hidden" name="id" value="<?php echo $country->zemlja_id; ?>" /> 
		<div class="small-12 columns submit-button">
			<input class="button small" type="submit" value="Sačuvaj">
		</div>
	</form>
</div>