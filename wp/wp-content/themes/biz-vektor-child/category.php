<?php get_header();

  $cat_list = get_the_category();
  $current_cat = null;

  $i=0;
  foreach ($cat_list as $cat) {
    if( $cat->slug != '47zenkoku') {
      $cat_description = $cat->category_description;
      $i++;
    }
  }

  // echo "<pre>";
  // var_dump($cat_description);
  // echo "</pre>";
?>
<!-- [ #container ] -->
<div id="container" class="innerBox">

  <!-- [ #content ] -->
  <section id="content" class="content wide">

    <?php
      if(isset($cat_description)) {
        echo $cat_description;
      }
      else { ?>
        <h2 class="page--title"><?php echo esc_html($biz_vektor_options['postLabelName']); ?></h2>
      <?php } ?>
    <!-- [ #search ] -->
    <section class="searchArea">
      <?php get_template_part( 'includes/category', 'lawyer-search' ); ?>
    </section>
    <!-- [ /#search ] -->

    <?php

      // $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      global $query_string;
      parse_str($query_string, $query_array);

      $custom_args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'date',
        'posts_per_page' => 5,
        'paged' => $paged
      );
      $custom_args = array_merge($query_array, $custom_args);
      $myposts = get_posts( $custom_args );
      ?>

      <!-- the loop -->
      <?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
      	<?php get_template_part( 'includes/category', 'lawyer-panel' ); ?>
      <?php endforeach;
      wp_reset_postdata();?>
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
