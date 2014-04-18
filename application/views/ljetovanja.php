
	
<section class="tiles clearfix">
	<ul class="results small-block-grid-3">
		<?php
		if($cities)
		{
			$i = 1;
			foreach ($cities as $offer): ?>
				<li class="">
					<article class="article-thumb">
					<a href="<?php echo site_url("ljetovanja?city=$offer->grad_id") ?>"><img src="<?php echo base_url().$offer -> link; ?>" alt="" /></a>
					<h2 class="thumb-title"><a href="<?php echo site_url("ljetovanja?city=$offer->grad_id") ?>"><?php echo $offer -> name; ?></a></h2>
					</article>
				</li>
		<?php 
			if ($i%3 == 0)
			{
				echo '<div class="clearfix"></div>';
			}
			$i++;
			endforeach; 
		} else 
		{
			"Nema rezultata pretrage!"; 
		}  
		if($countries)
		{
			$i = 1;
			foreach ($countries as $offer): ?>
				<li class="">
					<article class="article-thumb">
					<a href="<?php echo site_url("ljetovanja?country=$offer->zemlja_id") ?>"><img src="<?php echo base_url().$offer -> link; ?>" alt="" /></a>
					<h2 class="thumb-title"><a href="<?php echo site_url("ljetovanja?country=$offer->zemlja_id") ?>"><?php echo $offer -> name; ?></a></h2>
					</article>
				</li>
		<?php 
			if ($i%3 == 0)
			{
				echo '<div class="clearfix"></div>';
			}
			$i++;
			endforeach; 
		} else 
		{
			"Nema rezultata pretrage!"; 
		} 
		if($offers)
		{
			$i = 1;
			foreach ($offers as $offer): ?>
				<li class="">
					<article class="article-thumb">
					<a href="<?php echo site_url("ljetovanje/$offer->pid") ?>"><img src="<?php echo base_url().$offer -> link; ?>" alt="" /></a>
					<h2 class="thumb-title"><a href="<?php echo site_url("ljetovanje/$offer->pid") ?>"><?php echo $offer -> naslov; ?></a></h2>
					</article>
				</li>
		<?php 
			if ($i%3 == 0)
			{
				echo '<div class="clearfix"></div>';
			}
			$i++;
			endforeach; 
		} else 
		{
			"Nema rezultata pretrage!"; 
		} ?> 
	</ul>
	</section>