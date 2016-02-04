<?php
$post_search = $_GET['s'];
$post_type = $_GET['post_type'];
$post_slug = $_GET['category_name'];

if (isset($post_slug) && $post_slug != '') {
  $post_args = array(
    's' => $post_search,
    'post_type' => $post_type,
    'category_name' => $post_slug
  );
} else {
  $post_args = array(
    's' => $post_search,
    'post_type' => $post_type,
  );
}

$the_query = new WP_Query( $post_args );

// echo '<pre>';
// var_dump($post_args);
// echo '</pre>';
?>
<?php get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">

  <!-- [ #content ] -->
  <section id="content" class="content wide">

    <!-- [ #search ] -->
    <section class="searchArea">
      <?php get_template_part( 'includes/search', 'info-search' ); ?>
    </section>
    <!-- [ /#search ] -->

  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <?php get_template_part( 'includes/search', 'info-panel' ); ?>
    <!-- .entry-content -->
  <?php endwhile; ?>

  </section>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
