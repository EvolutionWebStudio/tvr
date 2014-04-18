<div class="small-12 columns">
	<h3>Nova ponuda</h3>
	<form method="post" enctype="multipart/form-data" accept-charset="utf-8" action="<?php echo site_url("post/add_ponudu"); ?>">
		<div class="small-9 columns">
			<label title="Sažet i primamljiv naslov. Da se ne ponavlja kao neki drugi. Da stane u maksimalno dva reda.">Naslov specijalne ponude</label>
			<input type="text" name="naslov-specijalne-ponude" />
		</div>
		
		<div class="small-3 columns">
			<br/>
		<label title="Da li je članak objavljen na sajtu ili je vidljiv samo administratoru.">
			<input type="checkbox" name="status" value="1" /> <strong>Objavljena ponuda</strong>
		</label>
		</div>
		
		<div class="small-12 columns">
			<textarea class="ckeditor"  name="sadrzaj-specijalne-punude"></textarea>
		</br>
		</div>
		
		<div class="small-6 columns">
			<label>Sezona</label>
			<select name="sezona">
				<option value="ljetovanje">Ljetovanje</option>
				<option value="zimovanje">Zimovanje</option>
			</select>
		</div>
		
		<div class="small-6 columns">
			<label>Tip smještaja</label>
			<select name="smjestaj">
				<option value="apartman">Apartman</option>
				<option value="hotel">Hotel</option>
				<option value="soba" >Soba</option>
				<option value="vikendica">Vikendica</option>
			</select>
		</div>
		
		<div class="small-6 columns">
			<label>Zemlja</label>
			<input type="text" name="zemlja" />
			<label title="Aktuelni specijalne ponude. Preporučeno je maksimalno 9 članaka.">
					<input type="checkbox" name="aktuelno" value="1" /> Aktuelno
			</label>
		</div>
		
		<div class="small-6 columns">
			<label>Grad</label>
			<select name="grad">
				<?php foreach ($cities as $city): ?>
					<option value="<?php echo $city->grad_id; ?>"><?php echo $city->name; ?></option>
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
		
		
		<div class="small-12 columns">
			<label title="Veoma važan opis koji se obavezno treba pisati. Prikazuje se kada neko podjeli članak na društvenim mrežama.">Opis za društvene mreže</label>
			<textarea name="opis"></textarea>
		</div>
		
		<div class="small-12 columns submit-button">
			<input class="button small" type="submit" value="Sačuvaj">
		</div>
	</form>
</div>