<?php

$args = array(
		'posts_per_page' => 4,
		'category'		=> '1',
		'post_type' 	=> 'post',
		'post_status'	=> 'publish',
		'orderby'		=> 'date',
		'order'			=> 'ASC'	
	);

$posts = get_posts($args);

?>
<pre><?php #print_r($posts); ?></pre>
<div class="container min-width">
	<div id="real-estate-container" class="row-columns">
		<?php 
		foreach($posts as $k => $post) {
			?>
			<div class="col-3">
				<div class="col-content-wrapper">
					<div class="col-title">
						<h2>
							<a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
						</h2>
					</div>
					<div class="set-img" style="background-image: url(<?php echo post_featured_img($post->ID); ?>);">
						
					</div>
					<div class="col-content">
						<?php echo $post->post_content; ?>
					</div>
					<div class="link">
						<a href="<?php echo get_permalink($post->ID); ?>"><i class="fa fa-chevron-right"></i>&nbsp;&nbsp;More Info</a>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<div class="clr"></div>
</div>