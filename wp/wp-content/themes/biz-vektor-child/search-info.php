<?php get_header();

global $query_string;
$post_category_slug = $_GET['info_cat'];
// $taxonomy = 'info-cat';
// $info_term = get_terms( $taxonomy, 'slug='.$post_category_slug);

$terms = get_the_terms( $post_category, 'info-cat' );

query_posts( $query_string . '&category_name='.$info_term[0]->slug );

echo $query_string . '&cat='.$info_term[0]->term_id;

?>

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
