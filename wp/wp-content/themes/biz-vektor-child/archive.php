<?php get_header();

if ( is_tax() ) {
  $taxonomy   = $wp_query->query_vars['taxonomy'];
  $term_slug  = $wp_query->query_vars['term'];
  $taxonomies = get_the_taxonomies();

  if ( isset( $taxonomy ) && isset( $term_slug ) ):
    $term = get_term_by( 'slug', $term_slug, $taxonomy );
  endif;
}

echo "<pre>";
var_dump($term);
echo "</pre>";
?>
<!-- [ #container ] -->
<div id="container" class="innerBox">
  <?php if(isset($term)){ ?>
    <h2 class="category--title"><?php echo $term->name; ?>の就労移行支援に関する説明会・セミナー</h2>
    <div class="category-description">
      <?php echo $term->description; ?>
    </div>
  <?php } ?>

  <!-- [ #content ] -->
  <section id="content" class="content wide">

    <!-- [ #search ] -->
    <section class="searchArea">
      <?php get_template_part( 'includes/category', 'info-search' ); ?>
    </section>
    <!-- [ /#search ] -->

    <?php

      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      global $query_string;
      parse_str($query_string, $query_array);


      $custom_args = array(
        'post_type' => 'info',
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
        <?php get_template_part( 'includes/category', 'info-panel' ); ?>
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
