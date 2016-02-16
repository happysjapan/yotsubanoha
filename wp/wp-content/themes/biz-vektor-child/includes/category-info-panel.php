<article id="post-<?php the_ID(); ?>" class="entry-content article">
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>

      <div class="inner">
        <h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <div class="profileWrap">
          <div class="detailWrap">

            <?php while(have_rows('seminar_table')): the_row(); ?>
            <table>
              <tbody>
                <tr>
                  <th>日時</th>
                  <td>
                    <?php echo date('Y').'年'.date('n').'月'.date('d').'日'; ?>
                  </td>
                </tr>
                <tr>
                  <th>会場</th>
                  <td><?php echo the_sub_field('seminar_place'); ?></td>
                </tr>
              </tbody>
            </table>
            <?php endwhile; ?>

            <div class="textWrap">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </div>

      <p><a href="<?php the_permalink(); ?>"" class="linkToDetail" title="詳細ページへ">▶︎&nbsp;詳細ページへ</a></p>
  </article><!-- .entry-content -->
