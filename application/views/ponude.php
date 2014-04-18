	<section class="filter small-12 columns">
		<form action="<?php echo site_url("ponude") ?>" class="custom" method="get">
			<div class="small-10 columns">
				<select name="id" class="">
					<?php if ($cid == null): ?>
						<option  value="" selected><?php echo "Aktuelne ponude"; ?></option>
					<?php else: ?>
						<option  value=""><?php echo "Aktuelne ponude"; ?></option>
					<?php endif ?>
					<?php foreach ($categories as $c): ?>
						<?php if ($cid == $c->id): ?>
							<option  value="<?php echo $c->id; ?>" selected><?php echo $c -> naziv; ?></option>
						<?php else: ?>
							<option  value="<?php echo $c->id; ?>"><?php echo $c -> naziv; ?></option>
						<?php endif ?>
						
					<?php endforeach ?>
				</select>
			</div>
			<div class="small-2 columns">
				<input type="submit" value="Pretraga" />
			</div>
		</form>
	</section>
<section class="tiles clearfix">
	<ul class="results small-block-grid-3 masonry-container">
	<?php 
	$i=1;
	if($posts){foreach ($posts as $post): ?>
		<li class="masonry-item">
			<article class="article-thumb">
			<a href="<?php echo site_url("clanak/$post->cid") ?>" class="title"><img src="<?php echo base_url().$post -> link; ?>" alt="" /></a>
			<h2 class="thumb-title"><a href="<?php echo site_url("clanak/$post->cid") ?>"><?php echo $post -> naslov; ?></a></h2>
			</article>
		</li>
	<?php
		if ($i%3 == 0)
		{
			echo '<div class="clearfix"></div>';
		}
		$i++;
   	endforeach; } else "Nema rezultata pretrage!";  ?>
	</ul>
</section>