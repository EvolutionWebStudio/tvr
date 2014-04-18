<div class="">
	<div class="small-12 columns">
		<h3>Statistika sajta</h3>
		<?php 
			require_once ('chilistats/config.php');
			include ("chilistats/little-dashboard.php"); 
		?>
	</div>
	
	<div class="small-12 columns">
		<h3>Konfiguracija sajta</h3>
		<form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo site_url("admin/configurate"); ?>">
		
			<div class="small-6 columns">
				<label title="Sezona za koju je optimizovan sajt."><h4>Sezona</h4></label>
				<div>
					<label for="season"><input type="radio" name="season" value="Ljetovanja" <?php if ($season == "Ljetovanja") echo "checked"; ?> /> Ljetovanja</label>
					<label for="season"><input type="radio" name="season" value="Zimovanja" <?php if ($season == "Zimovanja") echo "checked"; ?> /> Zimovanja</label>
				</div>
			</div>
			
			<div class="small-6 columns">
				<label title="Podrazumjevana pozadina za početnu stranicu i sve kategorije koje nemaju svoju fotografiju. Preporučene dimenzije fotografije su 1280 x 1024 piksela. Visina može biti i manja, do 800 piksela."><h4>Fotografija za pozadinu</h4></label>
				<div class="article-image-container">
					<img class="article-image-preview" src="<?php echo base_url().$this->config->item("background_picture"); ?>" alt="Fotografija nije postavljena" />
				</div>
				<input type="hidden" name="slika-clanka" value="" class="article-image-url"/>
				<a href="#" class="image-selector button small secondary">Izaberite sliku</a>
			</div>
		
			<div class="small-12 columns submit-button">
				<input class="button small " type="submit" value="Sačuvaj">
			</div>
		
		</form>
	</div>
</div>