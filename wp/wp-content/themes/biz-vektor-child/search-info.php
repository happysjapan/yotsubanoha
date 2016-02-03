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
  <section id="content" class="content">

    <!-- [ #search ] -->
    <section class="searchArea">
      <?php get_template_part( 'includes/search', 'form-info' ); ?>
    </section>
    <!-- [ /#search ] -->

  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" class="entry-content article">
    	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>

        <div class="inner">
          <h3 class="title"><a title=""><?php the_title(); ?></a></h3>
          <div class="profileWrap">
            <div class="detailWrap">
              <table>
                <tbody>
                <tr>
                  <th>日時</th>
                  <td><?php echo get_field('opening_date') ?></td>
                </tr>
                <tr>
                  <th>会場</th>
                  <td><?php echo get_field('place'); ?></td>
                </tr>
                </tbody>
              </table>
              <div class="textWrap">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
        </div>

        <p><a href="" class="linkToDetail" title="詳細ページへ">▶︎&nbsp;詳細ページへ</a></p>
    </article><!-- .entry-content -->
  <?php endwhile; ?>

  </section>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
