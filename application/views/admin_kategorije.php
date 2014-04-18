<div class="small-12 columns">
		<h3>Kategorije <a class="ui-button-big button-new" title="Dodaj novu kategoriju" href="<?php echo site_url("kategorija/dodaj_kategoriju") ?>"> Dodaj novu kategoriju</a></h3>
<ul class="article-list">
	<?php foreach ($categories as $category): ?>
		<li class="clearfix">
			<p class="article-list-title"><?php echo $category->naziv; ?></p>
			<div class="admin-options">
				<a class="ui-button-small button-edit" title="Izmjeni kategoriju" href="<?php echo site_url("kategorija/izmjeni_kategoriju/$category->id") ?>">Izmjeni kategoriju</a>
				<a class="ui-button-small button-delete" title="Izbrisi kategoriju" href="<?php echo site_url("kategorija/obrisi_kategoriju/$category->id") ?>">Obriši kategoriju</a>
			</div>
		</li>
	<?php endforeach ?>
</ul>
</div>