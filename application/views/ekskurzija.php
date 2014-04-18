<!-- Blogpost -->
	<section class="blogpost small-12 columns clanak-ponude">
		
		<!-- Article -->
		<article class="small-8 columns">
			<h2><?php echo $param->naslov; ?></h2>
			
			<p><img src="<?php echo base_url().$param->link; ?>" alt="" class="add_border" /></p>
			<p><?php echo $param->tekst; ?></p>
		</article>

		<!-- Author -->
		<div class="submeni simple small-4 columns">
			<div class="social-share">
				<a class="facebook-share popup" href=" <?php echo socialLinks('facebook', current_url(), $param->naslov, $param->opis, base_url().$param->link); ?> " rel="nofollow">Share</a>
				<a class="twitter-share popup" href=" <?php echo socialLinks('twitter', current_url(), $param->naslov, $param->opis, base_url().$param->link); ?> " rel="nofollow">Tweet</a>
			</div>
			<h2><?php echo $param->kategorija; ?>:</h2>
			<ul>
				<?php foreach($params as $p){ ?>
				<li><a href="<?php echo site_url("ekskurzija/$p->eid"); ?>" ><?php echo $p->naslov; ?></a></li>
				<?php } ?>
			</ul>
			<h2>Ostale kategorije:</h2>
			<ul>
				<?php foreach($menu as $c){ ?>
				<li><a href="<?php echo site_url("ekskurzije?tip-ekskurzije=$c->kategorija"); ?>" ><?php echo $c->kategorija; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</section>

	
