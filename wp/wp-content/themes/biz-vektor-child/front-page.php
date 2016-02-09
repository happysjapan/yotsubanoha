<?php get_header(); ?>
<!-- [ #container ] -->
<div id="container" class="innerBox">
	<!-- [ #content ] -->
	<div id="content" class="content frontpage">
	<?php biz_vektor_contentMain_before();?>
	<div id="content-main">

	<form name="searchform1" id="searchform1" method="get" action="<?php bloginfo( 'url' ); ?>/search">
	<div class="areaSearch">
		<h2>全国の就労移行支援事業所を検索</h2>
		<div class="searchInner">
		<ul class="listP">
		<li><h3>北海道・東北エリア</h3>
		     <ul class="listC">
					 	<li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('hokkaido')->cat_ID)); ?>">北海道</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('aomori')->cat_ID)); ?>">青森県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('iwate')->cat_ID)); ?>">岩手県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('miyagi')->cat_ID)); ?>">宮城県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('akita')->cat_ID)); ?>">秋田県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('yamagata')->cat_ID)); ?>">山形県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('fukushima')->cat_ID)); ?>">福島県</a></li>
		     </ul>
		</li>
		<li><h3>関西エリア</h3>
		       <ul class="listC">
					   <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('osaka')->cat_ID)); ?>">大阪府</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('hyogo')->cat_ID)); ?>">兵庫県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('kyoto')->cat_ID)); ?>">京都府</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('shiga')->cat_ID)); ?>">滋賀県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('nara')->cat_ID)); ?>">奈良県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('wakayama')->cat_ID)); ?>">和歌山県</a></li>
					 </ul>
		</li>
		<li><h3>甲信越・北陸エリア</h3>
		     <ul class="listC">
					 <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('yamanashi')->cat_ID)); ?>">山梨県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('niigata')->cat_ID)); ?>">新潟県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('nagano')->cat_ID)); ?>">長野県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('toyama')->cat_ID)); ?>">富山県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('ishikawa')->cat_ID)); ?>">石川県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('fukui')->cat_ID)); ?>">福井県</a></li>
				 </ul>
		</li>
		<li><h3>中国・四国エリア</h3>
		      <ul class="listC">
						<li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('tottori')->cat_ID)); ?>">鳥取県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('shimane')->cat_ID)); ?>">島根県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('okayama')->cat_ID)); ?>">岡山県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('hiroshima')->cat_ID)); ?>">広島県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('yamaguchi')->cat_ID)); ?>">山口県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('tokushima')->cat_ID)); ?>">徳島県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('kagawa')->cat_ID)); ?>">香川県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('ehime')->cat_ID)); ?>">愛媛県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('kochi')->cat_ID)); ?>">高知県</a></li>
					</ul>
		</li>
		<li><h3>関東エリア</h3>
		     <ul class="listC">
					 	<li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('tokyo')->cat_ID)); ?>">東京都</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('kanagawa')->cat_ID)); ?>">神奈川県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('saitama')->cat_ID)); ?>">埼玉県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('chiba')->cat_ID)); ?>">千葉県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('ibaraki')->cat_ID)); ?>">茨城県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('tochigi')->cat_ID)); ?>">栃木県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('gunma')->cat_ID)); ?>">群馬県</a></li>
				 </ul>
		</li>
		<li><h3>九州・沖縄エリア</h3>
		      <ul class="listC">
						<li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('fukuoka')->cat_ID)); ?>">福岡県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('saga')->cat_ID)); ?>">佐賀県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('nagasaki')->cat_ID)); ?>">長崎県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('kumamoto')->cat_ID)); ?>">熊本県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('oita')->cat_ID)); ?>">大分県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('miyazaki')->cat_ID)); ?>">宮崎県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('kagoshima')->cat_ID)); ?>">鹿児島県</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('okinawa')->cat_ID)); ?>">沖縄県</a></li>
					</ul>
		</li>
			<li><h3>東海エリア</h3>
		     <ul class="listC">
					 <li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('aichi')->cat_ID)); ?>">愛知</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('gifu')->cat_ID)); ?>">岐阜</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('shizuoka')->cat_ID)); ?>">静岡</a></li><li><a href="<?php echo esc_url(get_category_link(get_category_by_slug('mie')->cat_ID)); ?>">三重</a></li>
				 </ul>
		</li>
		<li class="cSelect">
			<?php
			$subcategories_parent = get_category_by_slug('47zenkoku');
	    $sub_args = array('child_of' => $subcategories_parent->term_id);
	    $subcategories = get_categories( $sub_args );
			?>
			<div class="select-box">
        <label for ="searchSelect" class="search--form--label">条件でお選びください
        <select id="searchSelect" name="subcategory_name" class="search--form--select">
          <option value="" selected>条件</option>
          <?php
            foreach ($subcategories as $subcategory) {
              echo '<option value="'.$subcategory->slug.'">'.$subcategory->name.'</option>';
            }
          ?>

        </select>
        </label>
      </div>
		</li>

		</ul>
		<div class="searchText">
			<input name="s" id="s" type="text" placeholder="ヨツバノハ就労移行支援事業所" class="topSearch"/>
			<input type="hidden" name="post_type" value="lawyer" />
			<input type="submit" value="検索" id="submit" class="btnGreen" />
		</div>
	</div><!-- /searchInner -->

	</div><!-- /areaSearch -->
	</form>
<?php
if ( biz_vektor_is_plugin_enable('widgets') && is_active_sidebar( 'top-main-widget-area' ) ) :

	dynamic_sidebar( 'top-main-widget-area' );
else :

	/*-------------------------------------------*/
	/*	No use main content widget
	/*-------------------------------------------*/

	// Widget guide message
	if ( is_user_logged_in() == TRUE && biz_vektor_is_plugin_enable('widgets')) {
	global $user_level;
	get_currentuserinfo();
		if (10 <= $user_level) { ?>
			<div class="adminEdit sectionFrame">
			<p>トップページに表示する項目は<a href="<?php echo admin_url().'customize.php';?>">テーマカスタマイザー画面</a>あるいは<a href="<?php echo admin_url().'widgets.php';?>" target="_blank">ウィジェット編集画面</a>より、表示する項目や順番を自由に変更出来ます。<br />
			『メインコンテンツエリア（トップページ）』ウィジェットにウィジェットアイテムをセットしてください。</p>
			</div>
		<?php }
	}

	// page content
	if ( have_posts()) : the_post();
		if (get_post_type() === 'page') :
			$topFreeContent = NULL;
			$topFreeContent = get_the_content();
			if ($topFreeContent) : ?>
	<div id="topFreeArea">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
	</div>
	<?php endif; // $topFreeContent ?>
	<?php endif; // get_post_type() === 'page' ?>

	<?php if ( is_user_logged_in() == TRUE ) {
	global $user_level;
	get_currentuserinfo(); ?>
		<div class="adminEdit">
			<?php if (10 <= $user_level) { ?>
			<p class="caption">
			<?php esc_html_e( '* In admin [Settings] &raquo; [Display Settings], if the front page is not set to a [page], nothing is displayed in this area.', 'biz-vektor' ); ?><br />
			<?php esc_html_e( '* If empty, the body of a page that you set as the front page does not display anything.', 'biz-vektor' ); ?><br />
			<?php // esc_html_e( '* If you have set a specific page as the front page, pagination does not appear at the bottom.', 'biz-vektor' ); ?>
			</p>
			<?php } ?>
			<span class="linkBtn linkBtnS linkBtnAdmin" style="float:left;margin-right:10px;"><?php edit_post_link( __( 'Edit', 'biz-vektor' ) ); ?></span>
			<?php if ( 10 <= $user_level ) { ?>
			<span style="float:left;margin-right:10px;"><a href="<?php echo site_url(); ?>/wp-admin/themes.php?page=theme_options#topPage" class="btn btnS btnAdmin">
				<?php esc_html_e('Title display settings', 'biz-vektor'); ?>
			</a></span>
			<span><a href="<?php echo site_url(); ?>/wp-admin/options-reading.php" class="btn btnS btnAdmin">
				<?php esc_html_e('Change the page to be displayed', 'biz-vektor'); ?>
			</a></span>
			<?php } ?>
		</div>
	<?php } // login ?>

	<?php endif; // have_posts() ?>
	<?php get_template_part('module_topPR'); ?>
	<?php if ( function_exists( 'biz_vektor_topSpecial' ) ): biz_vektor_topSpecial(); endif; ?>
	<?php get_template_part('module_top_list_info'); ?>
	<?php get_template_part('module_top_list_post'); ?>
<?php endif; ?>
<?php do_action('biz_vektor_fbLikeBoxDisplay'); ?>
<?php do_action('biz_vektor_snsBtns'); ?>
<?php do_action('biz_vektor_fbComments'); ?>

	</div>
	<!-- #content-main -->
	<?php biz_vektor_contentMain_after();?>
	</div>
	<!-- [ /#content ] -->
<?php $option = biz_vektor_get_theme_options();if(!$option['topSideBarDisplay']){ ?>
	<!-- [ #sideTower ] -->
	<div id="sideTower" class="sideTower">
<?php
if ( is_active_sidebar( 'common-side-top-widget-area' ) ) dynamic_sidebar( 'common-side-top-widget-area' );
if ( is_active_sidebar( 'top-side-widget-area' ) ) :
	dynamic_sidebar( 'top-side-widget-area' );
else :
	// ウィジェットに設定がない場合
	if (function_exists('biz_vektor_contactBtn'))    biz_vektor_contactBtn();
	if (function_exists('biz_vektor_snsBnrs'))       biz_vektor_snsBnrs();
endif;
if ( is_active_sidebar( 'common-side-bottom-widget-area' ) ) dynamic_sidebar( 'common-side-bottom-widget-area' );
?>
		<?php get_template_part( 'includes/front', 'sidebar-info' ); ?>
		<?php get_template_part( 'includes/front', 'sidebar-study' ); ?>
	</div>
	<!-- [ /#sideTower ] -->
	<?php biz_vektor_sideTower_after();?>
<?php } ?>
</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>
