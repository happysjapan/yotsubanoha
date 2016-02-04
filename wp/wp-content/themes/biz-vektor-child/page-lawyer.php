<?php
/*
  Template Name: Lawyer page
*/

$post_search = $_GET['s'];
$post_category_slug = $_GET['category_name'];
$post_subcategory_slug = $_GET['subcategory_name'];

if( isset($post_search)) {
  if( isset($post_subcategory_slug) && $post_subcategory_slug != '' ) {
    echo 'if 1';
    $post_args = array(
      's'             => $post_search,
      'post_type'     => 'post',
      'category_name' => $post_subcategory_slug
    );
  } else if( isset($post_category_slug) && $post_category_slug != '' ) {
    echo 'if 2';
    $post_args = array(
      's'             => $post_search,
      'post_type'     => 'post',
      'category_name' => $post_category_slug
    );
  } else {
    echo 'if 3';
    $post_args = array(
      's'             => $post_search,
      'post_type'     => 'post'
    );
  }
}
else {
  $post_args = array(
  	'posts_per_page'   => -1,
  	'post_type'        => 'post',
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
      <?php get_template_part( 'includes/category', 'lawyer-search' ); ?>
    </section>
    <!-- [ /#search ] -->

  <?php if ( $the_query->have_posts() ) {

    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <?php get_template_part( 'includes/category', 'lawyer-panel' ); ?>
    <!-- .entry-content -->
  <?php endwhile;
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
