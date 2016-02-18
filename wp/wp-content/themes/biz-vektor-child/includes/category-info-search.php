<div class="searchBox for_seminar">
  <h2>セミナー・説明会検索</h2>
  <div class="inner">

    <!-- [ #search form ] -->
    <form method="get" id="searchform" action="<?php echo home_url(); ?>/info">

      <div class="select-box">
        <label for ="info_cat" class="search--form--label">お住いの地域をお選びください
          <select id="info_cat" name="info_cat" class="search--form--select">
            <option value="">地域</option>
            <?php
              $tax_terms = get_terms( 'info-cat');
              foreach ($tax_terms as $tax_term) {
                if( wp_specialchars($_GET['info_cat'], 1) == $tax_term->slug ) {
                  echo '<option value="'.$tax_term->slug.'" selected>'.$tax_term->name.'</option>';
                }
                else {
                  echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';
                }
              }
            ?>
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
