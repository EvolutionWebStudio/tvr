<div class="small-12 columns">
	<div class="small-4 columns">
		<h3>Zemlje <a class="ui-button-big button-new" title="Dodaj novu zemlju" href="<?php echo site_url("location/nova_zemlja") ?>"> Dodaj novu zemlju</a></h3>
	</div>
<ul class="article-list small-12 columns">
	<?php if($zemlje){ foreach ($zemlje as $zemlja): ?>
		<li class="clearfix">
			<p class="article-list-title"><?php echo $zemlja->name; ?></p>
			<div class="admin-options">
				<a class="ui-button-small button-edit" title="Izmjeni ponudu" href="<?php echo site_url("location/izmjeni_zemlju/$zemlja->zemlja_id") ?>">Izmjeni zemlju</a>
				<a class="ui-button-small button-delete" title="Izbriši ponudu" href="<?php echo site_url("location/delete_zemlju/$zemlja->zemlja_id") ?>">Obriši zemlju</a>  
			</div> 
		</li>
	<?php endforeach; } else echo "Nema rezultata!"; ?>
</ul>
</div>