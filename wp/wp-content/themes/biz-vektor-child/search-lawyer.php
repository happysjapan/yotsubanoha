<?php
$post_search = $_GET['s'];
$post_category_slug = $_GET['category_name'];
$post_tag_slug = $_GET['tag'];

global $biz_vektor_options;
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
?>
<?php get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">
  <?php
  $page_title = esc_html($biz_vektor_options['postLabelName']);
  if( (isset($post_search) && $post_search != '') || (isset($post_category_slug) && $post_category_slug != '') || (isset($post_tag_slug) && $post_tag_slug != '') ){
    $page_title = '検索結果：';
    if( isset($post_category_slug) && $post_category_slug != '') {
      $post_category = get_category_by_slug( $post_category_slug );
      $page_title .= $post_category->cat_name;
    }
    if( isset($post_tag_slug) && $post_tag_slug != '') {
      $post_term = get_terms( 'post_tag', 'slug='.$post_tag_slug);
      $post_term_name = $post_term[0]->name;

      if( isset($post_category_slug) && $post_category_slug != '') {
        $page_title .= ' × '. $post_term_name;
      }
      else {
        $page_title .= $post_term_name;
      }
    }
    if( isset($post_search) && $post_search != '') {
      if( (isset($post_category_slug) && $post_category_slug != '') || (isset($post_tag_slug) && $post_tag_slug != '')) {
        $page_title .= ' × '. $post_search;
      }
      else {
        $page_title .= $post_search;
      }
    }
  } ?>
  <h2 class="page--title"><?php echo $page_title; ?></h2>

  <!-- [ #content ] -->
  <section id="content" class="content wide">
    <!-- [ #search ] -->
    <section class="searchArea">
      <p class="searchDescription"><?php echo do_shortcode('[contentblock id=office_description]'); ?></p>
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
      echo 'お探しの検索は該当がありません。';
    }
    ?>

  </section>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
