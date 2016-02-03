<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">

  <!-- [ #content ] -->
  <section id="content" class="content">

    <!-- [ #search form ] -->
    <section class="searchArea">
      <div class="searchBox">
        <h2>セミナー・説明会検索</h2>
        <div class="inner">

          <!-- [ #search form ] -->
          <form method="get" id="searchform" action="<?php echo home_url(); ?>/info">

            <div class="select-box">
              <label class="search--form--label">お住いの地域をお選びください
                <select class="search--form--select">
                  <option value="husker">地域</option>
                  <option value="starbuck">Starbuck</option>
                  <option value="hotdog">Hot Dog</option>
                  <option value="apollo">Apollo</option>
                </select>
              </label>
            </div>

            <input class="topSearch" type="search" placeholder="フリーワード" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s">
            <input type="hidden" name="post_type" value="info" />
            <input class="btn" id="searchsubmit"  type="submit" value="検索する">
          </form>
          <!-- [ /#search form ] -->

          <!-- [ #search calendar ] -->
          <div class="calenderWrap">
            <?php
              if ( is_active_sidebar( 'info-search-right-widget-area' ) ) dynamic_sidebar( 'info-search-right-widget-area' );
            ?>
          </div>
          <!-- [ /#search calendar ] -->

        </div>
      </div>
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
                  <td><?php the_date(); ?></td>
                </tr>
                <tr>
                  <th>場所</th>
                  <td><?php echo get_field('place');?> </td>
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
