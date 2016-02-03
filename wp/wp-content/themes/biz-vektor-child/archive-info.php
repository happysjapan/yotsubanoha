<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">

  <!-- [ #content ] -->
  <section id="content" class="content wide">

    <!-- [ #search ] -->
    <section class="searchArea">
      <?php get_template_part( 'includes/search', 'form-info' ); ?>
    </section>
    <!-- [ /#search ] -->

  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" class="entry-content article">
    	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>

        <div class="inner">
          <h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
          <div class="profileWrap">
            <div class="detailWrap">

              <table>
                <tbody>
                <tr>
                  <th>日時</th>
                  <td><?php echo get_field('opening_date');?></td>
                </tr>
                <tr>
                  <th>会場</th>
                  <td><?php echo get_field('place');?></td>
                </tr>
                </tbody>
              </table>
              <div class="textWrap">
                <?php the_content(); ?>
              </div>
            </div>
          </div>
        </div>

        <a href="<?php the_permalink(); ?>" class="linkToDetail" title="詳細ページへ">▶︎&nbsp;詳細ページへ</a>
    </article><!-- .entry-content -->
  <?php endwhile; ?>

  </section>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
