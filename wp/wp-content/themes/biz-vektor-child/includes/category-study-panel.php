<article id="post-<?php the_ID(); ?>" class="entry-content article">
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>

      <div class="inner">
        <h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
    
      </div>

      <p><a href="<?php the_permalink(); ?>"" class="linkToDetail" title="詳細ページへ">▶︎&nbsp;詳細ページへ</a></p>
  </article><!-- .entry-content -->
