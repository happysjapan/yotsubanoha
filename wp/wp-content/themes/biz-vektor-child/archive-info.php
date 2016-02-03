<?php get_header(); ?>
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

        <?php
        echo "<pre>";
        var_dump($post->ID);
        var_dump(get_the_category($post->ID));
        echo "</pre>";
        ?>
        <div class="inner">
          <h3 class="title"><a title=""><?php the_title(); ?></a></h3>
          <div class="profileWrap">
            <div class="detailWrap">
              <table>
                <tbody>
                <tr>
                  <th>日時</th>
                  <td><?php the_date(); ?></td>
                </tr>
                <tr>
                  <th>場所</th>
                  <td>東京芸術センター 会義室5</td>
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
