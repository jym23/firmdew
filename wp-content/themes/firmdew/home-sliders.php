<div class="container min-width">
	<div style="position:relative;">
		<div id="homesliders" style="height:400px;">
		<?php
			$args = array(
					'post_per_page' => -1,
					'post_type' => 'sliders',
					'order' => 'asc',
					'orderby' => 'date'
				);
			$sliders = get_posts($args);
			if( !empty( $sliders ) ) :
				foreach ($sliders as $k => $slide) :
					?>
					<div class="container" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $slide->ID) ); ?>)"></div>
					<?php
				endforeach;
			endif;
		?>
		</div>
	</div>
</div>