<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">

  <!-- [ #search ] -->
  <section class="search--holder section">
    
  </section>
  <!-- [ /#search ] -->


  <!-- [ #content ] -->
  <section id="content" class="content">

  <section class="searchArea">
    <div class="searchBox">
      <h2>セミナー・説明会検索</h2>
      <div class="inner">
        <dl>
          <dt>お住いの地域をお選びください</dt>
          <dd class="select-box">
              <select><option>地域</option></select>
          </dd>
        </dl>
        <input name="s" id="s" type="text" placeholder="フリーワード" class="topSearch">
        <input type="submit" value="検索する" class="btn">

        <div class="calenderWrap">
          
        </div>
      </div>
    </div>
  </section>

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
