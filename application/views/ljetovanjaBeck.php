
	<section class="filter small-12 columns">
		<form action="<?php echo site_url("ljetovanja"); ?>" class="custom" method="get">
			<div class="small-6 columns">
				<select name="country" id="customDropdown" class="">
					<option value="sve"<?php if(!$country) echo "selected"; ?>>Aktuelna ljetovanja</option>
					<?php foreach ($offersMenu as $c): ?>
						<?php if ($country == $c): ?>
							<option  value="<?php echo $c; ?>" selected><?php echo $c; ?></option>
						<?php else: ?>
							<option  value="<?php echo $c; ?>"><?php echo $c; ?></option>
						<?php endif ?>
					<?php endforeach ?>
				</select>
			</div>
			<div class="small-4 columns">
				<select name="accomodation-type" id="customDropdown" class="">
				
					<?php foreach ($smjestaji as $c): ?>
						<?php if ($smjestaj == $c->smjestaj): ?>
							<option  value="<?php echo $c->smjestaj; ?>" selected><?php echo $c->smjestaj; ?></option>
						<?php else: ?>
							<option  value="<?php echo $c->smjestaj; ?>"><?php echo $c->smjestaj; ?></option>
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
		<?php 
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