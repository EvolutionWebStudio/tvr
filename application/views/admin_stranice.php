<div class="small-12 columns">
		<h3>Stranice</h3>
<ul class="article-list">
	<?php foreach ($pages as $page): ?>
		<li class="clearfix">
			<p class="article-list-title"><?php echo $page->naslov; ?></p>
			<div class="admin-options">
				<a class="ui-button-small button-edit" title="Izmjeni stranicu"  href="<?php echo site_url("page/izmjeni_stranicu/$page->stranica_id") ?>">Izmjeni stranicu</a>
				<a class="ui-button-small button-delete" title="Izbriši stranicu" href="<?php echo site_url("page/delete_stranicu/$page->stranica_id") ?>">Obriši stranicu</a>
			</div>
		</li>
	<?php endforeach ?>
</ul>
</div>