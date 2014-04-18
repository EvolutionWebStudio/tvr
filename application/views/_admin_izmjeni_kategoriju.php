<div class="small-12 columns">
	<h3>Nova ponuda</h3>
	<form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo site_url("kategorija/update_kategoriju"); ?>">
		<div class="small-9 columns">
			<label>Naziv kategorije</label>
			<input type="text" name="naziv-kategorije" value="<?php echo $category->naziv ?>" />
		</div>
		
		<div class="small-12 columns">
			<label>Opis kategorije</label>
			<textarea name="opis-kategorije"><?php echo $category->opis ?></textarea>
		</div>
		
		<div class="small-6 columns">
			<label title="Fotografija koja će biti prikazana kao pozadina stranice na kojoj je otvorena kategorija. Preporučene dimenzije su 1280 x 1024 piksela. Visina može biti i manja, do 800 piksela.">Naslovna fotografija</label>
			<div class="article-image-container">
				<img class="article-image-preview" src="<?php echo base_url().$category->link; ?>" alt="Fotografija nije postavljena" />
			</div>
			<input type="hidden" name="slika-clanka" value="" class="article-image-url"/>
			<a href="#" class="image-selector button small secondary">Izaberite fotografiju</a>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $category->id ?>" />
		<div class="small-12 columns submit-button">
			<input class="button small" type="submit" value="Sačuvaj">
		</div>
	</form>
</div>