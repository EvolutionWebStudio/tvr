
<div class="small-12 columns">
		<h3>Destinacije <a class="ui-button-big button-new" title="Dodaj novu destinaciju" href="<?php echo site_url("destinacija/nova_destinacija") ?>"> Dodaj novu destinaciju</a></h3>
<ul class="article-list">
	<?php foreach ($params as $param): ?>
		<li class="clearfix">
			<p class="article-list-title"><?php echo $param->naslov; ?></p>
			<div class="admin-options">
				<a class="ui-button-small button-edit" title="Izmjeni destinaciju" href="<?php echo site_url("destinacija/izmjeni_destinaciju/$param->did") ?>">Izmjeni destinaciju</a>
				<a class="ui-button-small button-delete" title="Izbriši destinaciju" href="<?php echo site_url("destinacija/delete_destinaciju/$param->did") ?>">Obriši destinaciju</a>  
			</div> 
		</li>
	<?php endforeach ?>
</ul>
</div>