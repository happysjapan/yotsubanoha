<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">
  
  <!-- [ #content ] -->
  <div id="content" class="content">

  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <div id="post-<?php the_ID(); ?>" class="entry-content">
      <?php the_title(); ?>
    	<?php the_content(); ?>
    	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>

    </div><!-- .entry-content -->
  <?php endwhile; ?>

  </div>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
