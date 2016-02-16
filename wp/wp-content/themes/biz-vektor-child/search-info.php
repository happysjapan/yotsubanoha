<?php
$post_search = $_GET['s'];
$post_type = $_GET['post_type'];
$post_slug = $_GET['info_cat'];

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
global $query_string;
parse_str($query_string, $query_array);

if (isset($post_slug) && $post_slug != '') {
  $taxonomy = 'info-cat';
  $post_term = get_terms( $taxonomy, 'slug='.$post_slug);
  $post_term_id = $post_term[0]->term_id;
  $post_args = array(
    's' => $post_search,
    'post_type' => $post_type,
    'tax_query' => array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'term_id',
        'terms' => $post_term_id,
      )
    ),
    'post_status' => 'publish',
    'orderby' => 'date',
    'posts_per_page' => 10,
    'paged' => $paged
  );
} else {
  $post_args = array(
    's' => $post_search,
    'post_type' => $post_type,
    'post_status' => 'publish',
    'orderby' => 'date',
    'posts_per_page' => 10,
    'paged' => $paged
  );
}

$custom_args = array_merge($query_array, $post_args);
$the_query = new WP_Query( $custom_args );
?>
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

  <?php if ( $the_query->have_posts() ) while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <?php get_template_part( 'includes/category', 'info-panel' ); ?>
    <!-- .entry-content -->
  <?php endwhile; ?>

  <!-- pagination -->
  <?php
    if (function_exists(custom_pagination)) {
      custom_pagination($the_query->max_num_pages,"",$paged);
    }
  ?>
  <!-- end of pagination -->

  </section>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
