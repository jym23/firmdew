<?php get_header(); ?>

<div id="page-title" class="container full-width">
    <div class="container min-width">
    	<h1><?php echo get_the_title(); ?></h1>
    </div>
</div>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'content', 'page' ); ?>

	<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>