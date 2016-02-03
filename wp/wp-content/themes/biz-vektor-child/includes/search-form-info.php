<div class="searchBox">
  <h2>セミナー・説明会検索</h2>
  <div class="inner">

    <!-- [ #search form ] -->
    <form method="get" id="searchform" action="<?php echo home_url(); ?>/info">

      <div class="select-box">
        <label for ="searchSelect" class="search--form--label">お住いの地域をお選びください</label>
        <select id="searchSelect" name="tag" class="search--form--select">
          <option value="mie">三重県</option>
          <option value="kyoto">京都府</option>
          <option value="saga">佐賀県</option>
          <option value="hyougo">兵庫県</option>
        </select>
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
