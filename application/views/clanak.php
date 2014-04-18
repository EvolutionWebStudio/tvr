<!-- Blogpost -->
	<section class="blogpost small-12 columns">
		
		<!-- Article -->
		<article class="small-8 columns clanak-ponude">
			<h2><?php echo $post->naslov; ?></h2>
			
			<p><img src="<?php echo base_url().$post->link; ?>" alt="" class="add_border" /></p>
			<p><?php echo $post->tekst; ?></p>
		</article>

		<!-- Author -->
		<aside class="submeni simple small-4 columns">
			<div class="social-share">
				<a class="facebook-share popup" href=" <?php echo socialLinks('facebook', current_url(), $post->naslov, $post->opis, base_url().$post->link); ?> " rel="nofollow">Share</a>
				<a class="twitter-share popup" href=" <?php echo socialLinks('twitter', current_url(), $post->naslov, $post->opis, base_url().$post->link); ?> " rel="nofollow">Tweet</a>
			</div>
			<h2><?php echo $category->naziv; ?>:</h2>
			<ul>
				<?php foreach($posts as $p){ ?>
				<li><a href="<?php echo site_url("clanak/$p->cid"); ?>" ><?php echo $p->naslov; ?></a></li>
				<?php } ?>
			</ul>
			<h2>Ostale kategorije:</h2>
			<ul>
				<?php foreach($categories as $c){ ?>
				<li><a href="<?php echo site_url("ponude/$c->id"); ?>" ><?php echo $c->naziv; ?></a></li>
				<?php } ?>
			</ul>
		</aside>
	</section>

	
