<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">

  <!-- [ #search ] -->
  <section class="search--holder section">

  </section>
  <!-- [ /#search ] -->

  <!-- [ #content ] -->
  <section id="content" class="content">

  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" class="entry-content">
      <?php the_title(); ?>
    	<?php the_content(); ?>
    	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>

    </article><!-- .entry-content -->
  <?php endwhile; ?>

  </section>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
