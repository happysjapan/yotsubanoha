<?php
$post_search = $_GET['s'];
$post_category_slug = $_GET['category_name'];
$post_tag_slug = $_GET['tag'];

global $query_string;
parse_str($query_string, $query_array);

if( isset($post_search)) {
  $post_args = array(
    's'             => $post_search,
    'post_type'     => 'post',
    'category_name' => $post_category_slug,
    'tag'              => $post_tag_slug,
    'posts_per_page'   => 3,
    'paged' => $paged
  );
}
else {
  $post_args = array(
  	'post_type'        => 'post',
    'posts_per_page'   => 3,
    'paged' => $paged
  );
}

$merged_args = array_merge($query_array, $post_args);
$custom_query = new WP_Query( $merged_args );

echo "<pre>";
var_dump($post_tag_slug);
echo "</pre>";
?>
<?php get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">

  <!-- [ #content ] -->
  <section id="content" class="content wide">

    <!-- [ #search ] -->
    <section class="searchArea">
      <?php get_template_part( 'includes/category', 'lawyer-search' ); ?>
    </section>
    <!-- [ /#search ] -->

    <?php if ( $custom_query->have_posts() ) { ?>

      <!-- the loop -->
      <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
        <?php get_template_part( 'includes/category', 'lawyer-panel' ); ?>
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

    <?php
    }
    else {
      echo 'No result';
    }
    ?>

  </section>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
