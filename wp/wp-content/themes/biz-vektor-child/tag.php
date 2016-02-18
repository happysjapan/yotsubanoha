<?php get_header();

  $tag = get_queried_object();

  // echo "<pre>";
  // var_dump($cat_description);
  // echo "</pre>";
?>
<!-- [ #container ] -->
<div id="container" class="innerBox">
    <h2 class="page--title"><?php echo $tag->name.'で就労移行支援事業所「障害福祉サービス」検索'; ?></h2>
    <?php echo tag_description(); ?>

  <!-- [ #content ] -->
  <section id="content" class="content wide">
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
      <?php if ( $myposts ) { ?>
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
      <?php
      }
      else {
        echo 'お探しの検索は該当がありません。';
      }
      ?>

  </section>
  <!-- [ /#content ] -->


</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
