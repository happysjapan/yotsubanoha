
<?php
$post_search = $_GET['s'];
$post_type = $_GET['post_type'];
$taxonomy = 'info-cat';
$info_term = get_terms( $taxonomy, 'slug=kyoto');
$info_term_id = $info_term[0]->term_id;

$posts_array = get_posts(
  array(
    'posts_per_page' => -1,
    'post_type' => 'info',
    'tax_query' => array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'term_id',
        'terms' => $info_term_id,
      )
    )
  )
);


$post_search = $_GET['s'];
$post_type = $_GET['post_type'];
$post_slug = $_GET['info_cat'];
$taxonomy = 'info-cat';
$post_term = get_terms( $taxonomy, 'slug='.$post_slug);
$post_term_id = $post_term[0]->term_id;
$posts_array2 = get_posts(
  array(
    's' => $post_search,
    'post_type' => $post_type,
    'tax_query' => array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'term_id',
        'terms' => $post_term_id,
      )
    )
  )
);


$post_args = array(
    's' => $post_search,
    'post_type' => $post_type,
    'tax_query' => array(
      array(
        'taxonomy' => $taxonomy,
        'field' => 'term_id',
        'terms' => $post_term_id,
      )
    )
  );

$the_query = new WP_Query( $post_args );

// echo '<pre>';
// var_dump($posts_array2);
// echo '</pre>';
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

  </section>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
