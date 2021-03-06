<div class="small-12 columns">
		<div class="small-4 columns">
			<h3>Ponude 
				<a class="ui-button-big button-new" title="Dodaj novu ponudu" href="<?php echo site_url("post/novi_clanak") ?>"> Dodaj novu ponudu</a>
			</h3>
		</div>
		<div class="small-8 columns">
			<form class="admin-filter" action="<?php echo site_url("post/spisak_clanaka") ?>" method="post">
				<label class=""><span>Kategorija</span>
					<select name="category">
						<option value="-1" <?php if ($cat == -1) echo "selected"; ?>>Sve</option>
						
						<?php foreach ($categories as $category): ?>
							<option value="<?php echo $category->id ?>" <?php if ($cat == $category->id) echo "selected"; ?>><?php echo $category->naziv; ?></option>
						<?php endforeach ?>
						
					</select>
				</label>
				<label class=""><span>Aktuelne</span>
					<select name="aktuelno">
						<option value="-1" <?php if ($aktuelno == -1) echo "selected"; ?>>Sve</option>
						<option value="1" <?php if ($aktuelno == 1) echo "selected"; ?>>Aktuelne</option>
						<option value="0" <?php if ($aktuelno == 0) echo "selected"; ?>>Nisu aktuelne</option>
					</select>
				</label>
				<label class=""><span>Objavljene</span>
					<select name="status">
						<option value="-1" <?php if ($status == -1) echo "selected"; ?>>Sve</option>
						<option value="1" <?php if ($status == 1) echo "selected"; ?>>Objavljene</option>
						<option value="0" <?php if ($status == 0) echo "selected"; ?>>Nisu objavljene</option>
					</select>
				</label>
				<input type="hidden" name="admin-filter" value="1" />
				<label class="">
					<input type="submit" value="Filtriraj" class="button small secondary radius submit-button"/>
				</label>
				
			</form>
		</div>

    <?php if ($posts) : ?>
    <table class="small-12">
        <thead>
        <tr>
            <td title="Prioritet ponude u prikazu (redosled)" class="">#</td>
            <td title="Naslov ponude">Naslov</td>
            <td title="Opcije prikaza" class="small-2">Prikaz</td>
            <td title="Opcije za administraciju" class="small-1">Admin</td>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td>
<!--                        <span class="button-reorder">-->
<!--                            <a href="#" title="Povećaj prioritet ponude" class="button-reorder-up">&#9652;</a>-->
<!--                            <a href="#" title="Povećaj prioritet ponude" class="button-reorder-down">&#9662;</a>-->
<!--                        </span>-->
                        <span>
                            <?php echo $post->prioritet . '.'; ?>
                        </span>

                    </td>
                    <td><?php echo $post->naslov; ?></td>
                    <td>
                        <span title="Pokazuje da li ponuda objavljena ili ne" class="ui-indicator-small <?php echo ($post->status) ? "active" : "" ?>">&#59146;</span>
                        <span title="Pokazuje da li ponuda aktuelna ili ne" class="ui-indicator-small <?php echo ($post->aktuelno) ? "active" : "" ?>">&#9733;</span>
                        <span title="Pokazuje da li ponuda na slajderu ili ne" class="ui-indicator-small <?php echo ($post->slider) ? "active" : "" ?>">&#127748;</span>
                    </td>
                    <td>
                        <a class="ui-button-small button-edit" title="Izmjeni ponudu"  href="<?php echo site_url("post/izmjeni_clanak/$post->cid") ?>">Izmjeni ponudu</a>
                        <a class="ui-button-small button-delete" title="Izbriši ponudu" href="<?php echo site_url("post/delete_clanak/$post->cid") ?>">Obriši ponudu</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php else :
        echo "Nema rezultata!";
    endif; ?>
</div>