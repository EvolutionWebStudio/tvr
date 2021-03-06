<div class="small-12 columns">
	<div class="small-4 columns">
		<h3>Specijalne ponude <a class="ui-button-big button-new" title="Dodaj novu ponudu" href="<?php echo site_url("post/nova_ponuda") ?>"> Dodaj novu ponudu</a></h3>
	</div>
		<div class="small-8 columns">
			<form class="admin-filter" action="<?php echo site_url("post/spisak_ponuda") ?>" method="post">
				<label class=""><span>Zemlja</span>
					<select name="zemlja">
						<option value="sve" <?php if ($zem == null) echo "selected"; ?>>Sve</option>
						
						<?php foreach ($zemlje as $zemlja): ?>
							<option value="<?php echo $zemlja->zemlja; ?>" <?php if ($zem == $zemlja->zemlja) echo "selected"; ?>><?php echo $zemlja->zemlja; ?></option>
						<?php endforeach ?>
						
					</select>
				</label>
				<label class=""><span>Tip ponude</span>
					<select name="sezona">
						<option value="sve" <?php if ($sezona == null) echo "selected"; ?>>Svi</option>
						<option value="ljetovanje" <?php if ($sezona == "ljetovanje") echo "selected"; ?>>Ljetovanja</option>
						<option value="zimovanje" <?php if ($sezona == "zimovanje") echo "selected"; ?>>Zimovanja</option>
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
					<input type="submit" value="Filtriraj" class="button small secondary radius"/>
				</label>
				
			</form>
		</div>

    <?php if ($offers) : ?>
        <table class="small-12">
            <thead>
            <tr>
                <td title="Naslov ponude">Naslov</td>
                <td title="Opcije prikaza" class="small-2">Prikaz</td>
                <td title="Opcije za administraciju" class="small-1">Admin</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($offers as $offer): ?>
                <tr>
                    <td><?php echo $offer->naslov; ?></td>
                    <td>
                        <span title="Pokazuje da li ponuda objavljena ili ne" class="ui-indicator-small <?php echo ($offer->status) ? "active" : "" ?>">&#59146;</span>
                    </td>
                    <td>
                        <a class="ui-button-small button-edit" title="Izmjeni ponudu" href="<?php echo site_url("post/izmjeni_ponudu/$offer->pid") ?>">Izmjeni ponudu</a>
                        <a class="ui-button-small button-delete" title="Izbriši ponudu" href="<?php echo site_url("post/delete_ponudu/$offer->pid") ?>">Obriši ponudu</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    <?php else :
        echo "Nema rezultata!";
    endif; ?>
</div>