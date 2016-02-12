<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">

  <!-- [ #content ] -->
  <section id="content" class="content wide">

    <!-- [ #search ] -->
    <section class="searchArea">
      <?php get_template_part( 'includes/category', 'info-search' ); ?>
    </section>
    <!-- [ /#search ] -->

  
    <h2>START pagination ↓</h2>

    <?php 

      // $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

      $custom_args = array(
        'post_type' => 'info',
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'posts_per_page' => 3,
        'paged' => $paged
      );

    $custom_query = new WP_Query( $custom_args ); ?>

    <?php if ( $custom_query->have_posts() ) : ?>

      <!-- the loop -->
      <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
          <?php get_template_part( 'includes/category', 'info-panel' ); ?>
          <!-- .entry-content -->
      <?php endwhile; ?>
      <!-- end of the loop -->

      <!-- pagination here -->
      <?php
        if (function_exists(custom_pagination)) {
          custom_pagination($custom_query->max_num_pages,"",$paged);
        }
      ?>

    <?php wp_reset_postdata(); ?>

    <?php else:  ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>


  </section>
  <!-- [ /#content ] -->


</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
