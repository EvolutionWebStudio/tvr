<section class="tiles clearfix">
<ul class="small-block-grid-3 masonry-container">
<?php 
$i = 1;
foreach($posts as $post): ?>
	<li>
		<article class="featured">
			<a href="<?php echo site_url("post/clanak/$post->cid") ?>" class="title"><img src="<?php echo  base_url().$post -> link; ?>" alt="" /></a>
			<h2><a href="<?php echo site_url("post/clanak/$post->cid") ?>"><?php echo $post -> naslov; ?></a></h2>
		</article>
	</li>
<?php
	if ($i%3 == 0):
		echo '<div class="clearfix"></div>';
	endif;
	$i++;
endforeach; ?>
</ul>
</section>

<section class="gallery small-12 columns">
		
		<nav class="slider_nav">
			<a href="#" class="left">&nbsp;</a>
			<a href="#" class="right">&nbsp;</a>
		</nav>

		<!-- Slider -->
		<div class="slider_wrapper">

			<!-- Slider content -->
			<div class="slider_content">
				<?php foreach ($destinations as $destination): ?>
					<a href="<?php echo site_url("destinacija/destinacije/$destination->did"); ?>" title="<?php echo  $destination->naslov; ?>" ><img src="<?php echo base_url().$destination->link; ?>" /></a>
				<?php endforeach ?>
			</div>

		</div>

</section>