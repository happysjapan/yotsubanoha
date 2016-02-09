<article id="post-<?php the_ID(); ?>" class="entry-content article">
    <?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
    <div class="officeWrap">
      <div class="inner">
        <h3 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
        <div class="profileWrap">
          <div class="imageWrap"><img src="<?php echo get_field('office_image'); ?>" alt="<?php the_title(); ?>" /></div>
          <div class="detailWrap">
            <div class="textWrap">
              <p class="text"><?php echo get_field('office_introduction'); ?></p>
              <p class="fee">お祝い金：<?php echo get_field('reward'); ?>円</p>
            </div>
            <table>
              <tr>
                <th>住所</th>
                <td><?php echo get_field('office_address'); ?></td>
              </tr>
              <tr>
                <th>アクセス</th>
                <td><?php echo get_field('office_access'); ?></td>
              </tr>
              <tr>
                <th>定員</th>
                <td><?php echo get_field('office_capacity'); ?>人</td>
              </tr>
              <tr>
                <th>プログラム<br />提供時間</th>
                <td><?php echo get_field('office_time'); ?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="btnWrap">
          <a href="tel:0120-697-182" title="無料電話相談" class="btnLightGreen" onclick="ga('send', 'event', '電話リンク', 'タップ', '一覧ボタン');">無料電話相談</a>
          <a href="/contact-form/" title="資料請求" class="btnLightBlue">資料請求</a>
          <a href="/tour-form/" title="見学会へ参加" class="btnBlue">見学会へ参加</a>
        </div>
      </div>
      <a href="<?php the_permalink(); ?>"  title="詳細ページへ" class="linkToDetail">▶︎&nbsp;詳細ページへ</a>
    </div>

  </article><!-- .entry-content -->
