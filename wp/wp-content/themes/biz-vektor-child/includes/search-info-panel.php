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
                <td><?php //echo get_field('opening_date') ?></td>
              </tr>
              <tr>
                <th>会場</th>
                <td><?php //echo get_field('place'); ?></td>
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
