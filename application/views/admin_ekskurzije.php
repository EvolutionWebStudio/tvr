
<div class="small-12 columns">
	<div class="small-4 columns">
		<h3>Ekskurzije <a class="ui-button-big button-new" title="Dodaj novu ekskurziju" href="<?php echo site_url("nova_ekskurzija") ?>"> Dodaj novu ekskurziju</a></h3>
	</div>
	<div class="small-8 columns">
			<form class="admin-filter" action="<?php echo site_url("spisak_ekskurzija") ?>" method="post">
				<label class=""><span>Kategorija</span>
					<select name="kategorija">
						<option value="sve" <?php if ($kategorija == 'svi') echo "selected"; ?>>Sve</option>
						
						<?php foreach ($menu as $m): ?>
							<option value="<?php echo $m; ?>" <?php if ($kategorija == $m) echo "selected"; ?>><?php echo $m; ?></option>
						<?php endforeach ?>
						
					</select>
				</label>
				
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
<ul class="article-list small-12 columns">
	<?php if($params){ foreach ($params as $param): ?>
		<li class="clearfix">
			<p class="article-list-title"><?php echo $param->naslov; ?></p>
			<div class="admin-options">
				<a class="ui-button-small button-edit" title="Izmjeni ekskurziju" href="<?php echo site_url("izmjeni_ekskurziju/$param->eid") ?>">Izmjeni ekskurziju</a>
				<a class="ui-button-small button-delete" title="Izbriši ekskurziju" href="<?php echo site_url("delete_ekskurziju/$param->eid") ?>">Obriši ekskurziju</a>  
			</div> 
		</li>
	<?php endforeach; }  else echo "Nema rezultata!"; ?>
</ul>
</div>