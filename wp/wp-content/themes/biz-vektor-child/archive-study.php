<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">
  <!-- [ #content ] -->
  <section id="content" class="content wide">

    <?php
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      global $query_string;
      parse_str($query_string, $query_array);

      $custom_args = array(
        'post_type' => 'study',
        'post_status' => 'publish',
        'orderby' => 'date',
        'posts_per_page' => 10,
        'paged' => $paged
      );
      $custom_args = array_merge($query_array, $custom_args);
      // $custom_query = get_posts( $custom_args );
      $custom_query = new WP_Query( $custom_args );

      ?>

      <!-- the loop -->
      <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
        <?php get_template_part( 'includes/category', 'study-panel' ); ?>
        <!-- .entry-content -->
      <?php endwhile; ?>
      <!-- end of the loop -->

      <!-- pagination -->
      <?php
        if (function_exists(custom_pagination)) {
          custom_pagination($custom_query->max_num_pages,"",$paged);
        }
      ?>
      <!-- end of pagination -->


  </section>
  <!-- [ /#content ] -->


</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
