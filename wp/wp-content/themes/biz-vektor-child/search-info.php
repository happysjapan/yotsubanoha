<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">

  <!-- [ #search ] -->
  <section class="search section">
    <h3 class="section--title">Section title</h3>
    <article class="search--content-holder clearfix">

      <!-- [ #search form ] -->
      <div class="search--form-holder">
        <form class="search--form">
          <div class="search--form--row">
            <label class="search--form--label">Prefecture Label
              <select class="search--form--select">
                <option value="husker">Husker</option>
                <option value="starbuck">Starbuck</option>
                <option value="hotdog">Hot Dog</option>
                <option value="apollo">Apollo</option>
              </select>
            </label>
          </div>

          <div class="search--form--row">
            <label class="search--form--label">Text label
              <input class="search--form--text" type="text" placeholder="Text">
            </label>
          </div>

          <div class="search--form-row search--form--button-holder">
            <input class="search--form--button" type="submit" value="Submit">
          </div>
        </form>

        <form method="get" id="searchform" action="<?php echo home_url(); ?>/info">
          <div>
            <input class="search--field" type="search" placeholder="Search" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s">
            <input type="hidden" name="post_type" value="info" />
            <input class="search--form--button" id="js_searchsubmit"  type="submit" value="Submit">
          </div>
        </form>
      </div>
      <!-- [ /#search form ] -->

      <!-- [ #search calendar ] -->
      <div class="search--calendar-holder">
        <?php
          if ( is_active_sidebar( 'info-search-right-widget-area' ) ) dynamic_sidebar( 'info-search-right-widget-area' );
        ?>
      </div>
      <!-- [ /#search calendar ] -->

    </article>
  </section>
  <!-- [ /#search ] -->

  <!-- [ #content ] -->
  <section id="content" class="content">

  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" class="entry-content">
      <?php the_title(); ?>
    	<?php the_content(); ?>
    	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>

    </article><!-- .entry-content -->
  <?php endwhile; ?>

  </section>
  <!-- [ /#content ] -->

</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
