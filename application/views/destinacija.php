<!-- Blogpost -->
	<section class="blogpost small-12 columns clanak-ponude">
		
		<!-- Article -->
		<article class="small-8 columns">
			<h2><?php echo $destination->naslov; ?></h2>
			
			<p><img src="<?php echo base_url().$destination->link; ?>" alt="" class="add_border" /></p>
			<p><?php echo $destination->tekst; ?></p>
		</article>

		<!-- Author -->
		<aside class="submeni simple small-4 columns">
			<div class="social-share">
				<a class="facebook-share popup" href=" <?php echo socialLinks('facebook', current_url(), $destination->naslov, $destination->opis, base_url().$destination->link); ?> " rel="nofollow">Share</a>
				<a class="twitter-share popup" href=" <?php echo socialLinks('twitter', current_url(), $destination->naslov, $destination->opis, base_url().$destination->link); ?> " rel="nofollow">Tweet</a>
			</div>
			<h2>Ostale destinacije:</h2>
			<ul>
				<?php foreach($menu as $c){ ?>
				<li><a href="<?php echo site_url("destinacija/destinacije/$c->did"); ?>" ><?php echo $c->naslov; ?></a></li>
				<?php } ?>
			</ul>
		</aside>
	</section>

	
