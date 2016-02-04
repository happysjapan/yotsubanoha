<?php

$post_args = array(
  'posts_per_page'   => 5,
  'post_type'        => 'info',
  'orderby'          => 'date',
	'order'            => 'DESC'
);

$the_query = new WP_Query( $post_args );
?>


<div class="sideWidget">
  <h3 class="localHead">新着就職・就活事例一覧</h3>
  <div class="ttBoxSection">
    <?php if ( $the_query->have_posts() ) {

      while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <div class="ttBox" id="post-<?php echo get_the_id(); ?>">
          <div>
            <a href="<?php echo get_the_permalink(); ?>"><?php echo the_title(); ?></a>
          </div>
        </div>

    <?php endwhile;
    }
    else {
      echo 'No result';
    }
    ?>
  </div>
</div>
