<div class="searchBox">
  <h2>Lawyer</h2>
  <div class="inner">

    <!-- [ #search form ] -->
    <form method="get" id="searchform" action="<?php echo home_url(); ?>/info">

      <input class="topSearch" type="search" placeholder="フリーワード" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s">

      <div class="select-box">
        <label for ="searchSelect" class="search--form--label">お住いの地域をお選びください</label>
        <select id="searchSelect" name="info_cat" class="search--form--select">
          <option value="" selected>Default</option>
          <?php
            $categories = get_categories();

            echo '<pre>';
            var_dump($categories);
            echo '</pre>';
            foreach ($tax_terms as $tax_term) {
              echo '<option value="'.$tax_term->slug.'">'.$tax_term->name.'</option>';
            }
          ?>
        </select>
      </div>

      <input type="hidden" name="post_type" value="info" />
      <input class="btn" id="searchsubmit"  type="submit" value="検索する">
    </form>
    <!-- [ /#search form ] -->
  </div>
</div>
