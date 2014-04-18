
	<section class="filter small-12 columns">
		<form action="<?php echo site_url("ekskurzije"); ?>" class="custom" method="get">
			<div class="small-10 columns">
				<select name="tip-ekskurzije" id="customDropdown" class="">
					<?php foreach ($menu as $c): ?>
						<?php if ($tipEkskurzije == $c): ?>
							<option  value="<?php echo $c; ?>" selected><?php echo $c; ?></option>
						<?php else: ?>
							<option  value="<?php echo $c; ?>"><?php echo $c; ?></option>
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
	<ul class="results small-block-grid-3">
		<?php if($ekskurzija)
		{
			$i = 1;
			 foreach ($ekskurzija as $e): ?>
				<li class="">
					<article class="article-thumb">
					<a href="<?php echo site_url("ekskurzija/$e->eid") ?>"><img src="<?php echo base_url().$e -> link; ?>" alt="" /></a>
					<h2 class="thumb-title"><a href="<?php echo site_url("ekskurzija/$e->eid") ?>"><?php echo $e -> naslov; ?></a></h2>
					</article>
				</li>
		<?php 
		if ($i%3 == 0)
			{
				echo '<div class="clearfix"></div>';
			}
			$i++;
			endforeach; 
		} 
		else 
		{
			"Nema rezultata pretrage!"; 
		}
		
		?> 
	</ul>
	</section>