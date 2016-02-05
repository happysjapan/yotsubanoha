<div class="searchBox">
  <h2>Lawyer</h2>
  <div class="inner">

    <?php
    $subcategories_parent = get_category_by_slug('47zenkoku');
    $sub_args = array('child_of' => $subcategories_parent->term_id);
    $subcategories = get_categories( $sub_args );

    $exclude_ids = array();
    $i=0;
    foreach($subcategories as $subcategory) {
      $exclude_ids[$i] = $subcategory->term_id;
      $i++;
    }

    $args = array(
      'exclude' => $exclude_ids
    );
    $categories = get_categories($args);

    // echo '<pre>';
    // var_dump($categories);
    // echo '</pre>';

    ?>

    <!-- [ #search form ] -->
    <form method="get" id="searchform" action="<?php echo home_url(); ?>/search">

      <input class="topSearch" type="search" placeholder="フリーワード" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s">

      <div class="select-box">
        <label for ="searchSelect" class="search--form--label">お住いの地域をお選びください
        <select id="searchSelect" name="category_name" class="search--form--select">
          <option value="" selected>Default</option>
          <?php
            foreach ($categories as $category) {
              echo '<option value="'.$category->slug.'">'.$category->name.'</option>';
            }
          ?>
        </select>
        </label>
      </div>

      <div class="select-box">
        <label for ="searchSelect" class="search--form--label">Subcategories
        <select id="searchSelect" name="subcategory_name" class="search--form--select">
          <option value="" selected>Default</option>
          <?php
            foreach ($subcategories as $subcategory) {
              echo '<option value="'.$subcategory->slug.'">'.$subcategory->name.'</option>';
            }
          ?>
        </select>
        </label>
      </div>

      <input type="hidden" name="post_type" value="lawyer" />
      <input class="btn" id="searchsubmit"  type="submit" value="検索する">
    </form>
    <!-- [ /#search form ] -->
  </div>
</div>

<div class="consultBox">
  <img src="" alt="" />
  <a href="" title="相談する" class="btn">相談する</a>
</div>