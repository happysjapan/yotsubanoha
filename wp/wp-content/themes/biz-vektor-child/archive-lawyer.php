<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">

  <!-- [ #content ] -->
  <section id="content" class="content wide">

    <!-- [ #search ] -->
    <section class="searchArea">
      <?php get_template_part( 'includes/search', 'lawyer-search' ); ?>
    </section>
    <!-- [ /#search ] -->

  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'includes/search', 'lawyer-panel' ); ?>
    <!-- .entry-content -->
  <?php endwhile; ?>

  </section>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>