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
<ul class="article-list small-12 columns">
		
	
	<?php if ($posts){ foreach ($posts as $post): ?>
		<li class="clearfix">
			<p class="article-list-title"><?php echo $post->prioritet.'. '.$post->naslov.'<t>'; ?></p>
			<div class="admin-options">
				<a class="ui-button-small button-edit" title="Izmjeni ponudu"  href="<?php echo site_url("post/izmjeni_clanak/$post->cid") ?>">Izmjeni ponudu</a>
				<a class="ui-button-small button-delete" title="Izbriši ponudu" href="<?php echo site_url("post/delete_clanak/$post->cid") ?>">Obriši ponudu</a>
			</div>
		</li>
	<?php endforeach; } else echo "Nema rezultata!";?>
</ul>
</div>