<div class="small-12 columns">
	<h3>Izmjeni stranicu</h3>
	<form method="post" action="<?php echo site_url("page/update_stranicu"); ?>">
		<div class="small-9 columns">
			<label title="Sažet i primamljiv naslov. Da se ne ponavlja kao neki drugi. Da stane u maksimalno dva reda.">Naslov stranice</label>
			<input type="text" name="naslov-stranice" value="<?php echo $page->naslov; ?>"/>
		</div>
		
		<div class="small-12 columns">
			<textarea class="ckeditor" name="sadrzaj-stranice"><?php echo $page->tekst; ?></textarea>
		</br>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $page->stranica_id; ?>" /> 
		<div class="small-12 columns submit-button">
			<input class="button small" type="submit" value="Sačuvaj">
		</div>
	</form>
</div>