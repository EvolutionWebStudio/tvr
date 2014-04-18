<div class="small-12 columns">
	<div class="small-4 columns">
		<h3>Gradovi <a class="ui-button-big button-new" title="Dodaj novu zemlju" href="<?php echo site_url("location/novi_grad") ?>"> Dodaj novi grad</a></h3>
	</div>
<ul class="article-list small-12 columns">
	<?php if($gradovi){ foreach ($gradovi as $grad): ?>
		<li class="clearfix">
			<p class="article-list-title"><?php echo $grad->name; ?></p>
			<div class="admin-options">
				<a class="ui-button-small button-edit" title="Izmjeni grad" href="<?php echo site_url("location/izmjeni_grad/$grad->grad_id") ?>">Izmjeni grad</a>
				<a class="ui-button-small button-delete" title="Izbriši grad" href="<?php echo site_url("location/delete_grad/$grad->grad_id") ?>">Obriši grad</a>  
			</div> 
		</li>
	<?php endforeach; } else echo "Nema rezultata!"; ?>
</ul>
</div>