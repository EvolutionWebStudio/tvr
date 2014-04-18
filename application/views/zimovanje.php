<!-- Blogpost -->
	<section class="blogpost small-12 columns clanak-ponude">
		
		<!-- Article -->
		<article class="small-8 columns">
			<h2><?php echo $offer->naslov; ?></h2>
			
			<p><img src="<?php echo base_url().$offer->link; ?>" alt="" class="add_border" /></p>
			<p><?php echo $offer->tekst; ?></p>
		</article>

		<!-- Author -->
		<div class="submeni simple small-4 columns">
			<div class="social-share">
				<a class="facebook-share popup" href=" <?php echo socialLinks('facebook', current_url(), $offer->naslov, $offer->opis, base_url().'images/clanci/'.$offer->link); ?> " rel="nofollow">Share</a>
				<a class="twitter-share popup" href=" <?php echo socialLinks('twitter', current_url(), $offer->naslov, $offer->opis, base_url().'images/clanci/'.$offer->link); ?> " rel="nofollow">Tweet</a>
			</div>
			<h2>Ostale ponude:</h2>
			<ul>
				<?php foreach($offers_menu as $c){ ?>
				<li><a href="<?php echo site_url("zimovanje/$c->pid"); ?>" ><?php echo $c->naslov; ?></a></li>
				<?php } ?>
			</ul>
			<h2>Ostale kategorije:</h2>
			<ul>
				<?php foreach($menu as $c){ ?>
				<li><a href="<?php echo site_url("zimovanja?country=$c&accomodation-type=svi"); ?>" ><?php echo $c; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</section>

	
