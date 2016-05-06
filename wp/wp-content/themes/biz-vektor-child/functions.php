<?php // ← 既にfunctions.php が存在し、もともと書いてある場合は不要
add_filter('headContactCustom','do_head_contact_custom');
function do_head_contact_custom($headContact){
    $options = biz_vektor_get_theme_options();
    $contact_txt = $options['contact_txt'];
    // $contact_time = nl2br($options['contact_time']);
    $contact_time = nl2br($options['contact_time']);

    $contact_weekday = do_shortcode('[contentblock id=weekday_open]');
    $contact_weekend = do_shortcode('[contentblock id=weekend_open]');

    if ($options['tel_number']) {
        // 電話番号の入力がある場合
        $showHide = "showHide('headContact');";
            $headContact = '
            <div id="headContact" class="itemClose" onclick="'.$showHide.'"><div id="headContactInner">
			<div id="headContactTxt"><span>無料相談</span><br />お問合せ</div>
			<div class="telNumTime">
            '."\n";

            // if ($contact_txt) {
            //     // お問い合わせメッセージの入力がある場合
            //     $headContact .= '<div id="headContactTxt">'.$contact_txt.'</div>'."\n";
            // }
            // モバイル端末の場合
            if ( function_exists('wp_is_mobile') && wp_is_mobile() ) {
                $headContact .= '<div id="headContactTel"><a href="tel:'.$options['tel_number'].'">'.$options['tel_number'].'</a></div>'."\n";
            // モバイルじゃない場合
            } else {
                $headContact .= '<div id="headContactTel"> '.$options['tel_number'].'</div>'."\n";
            }
            $headContact .= '<div id="headContactTime">平日:'.$contact_weekday.' / 土日祝日:'.$contact_weekend.'</div>'."\n";

        $lawyer_args = array(
        	'post_type'        => 'post',
          'posts_per_page'   => -1
        );
        get_posts( $lawyer_args );
        $count_lawyers = wp_count_posts();

        $total_cash = do_shortcode('[contentblock id=paidreward]');

        $headContact .= '
        </div>
        <div class="btnWrap">
			<a href="/contact-form/" title="お問合せ資料請求" class="contact">お問合せ<br />資料請求</a>
			<a href="/tour-form/" title="見学の申し込み" class="apply">見学の<br />申し込み</a>
        </div>
        <div class="rightBox">
        	<ul class="snsBtn">
				<li>
                    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+\'://platform.twitter.com/widgets.js\';fjs.parentNode.insertBefore(js,fjs);}}(document, \'script\', \'twitter-wjs\');</script>

                </li>
				<li>
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5&appId=1496824190624319";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, \'script\', \'facebook-jssdk\'));</script>
                    <div class="fb-like" data-href="'.get_site_url().'" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                </li>
        	</ul>
            <div class="totalWrap">
            	<dl class="total">
    				<dt>掲載相談所数</dt>
    				<dd>'.$count_lawyers->publish.'件</dd>
    			</dl>
    			<dl class="total">
    				<dt>お祝い金総支給額</dt>
    				<dd>'.$total_cash.'円</dd>
            	</dl>
            </div>
        </div>
        </div></div>
        ';
    }
    return $headContact;
}


/*-------------------------------------------*/
/*  WidgetArea initiate
/*-------------------------------------------*/
/*  セミナー検索にカレンダーを表示するウィジェットを追加
-----------------------------------------------*/
function biz_vektor_widgets_init_add() {
    register_sidebar( array(
        'name' => __( 'Sidebar(Info search)', 'biz-vektor' ),
        'id' => 'info-search-right-widget-area',
        'description' => __( 'This widget area appears on the right of the Info search box.', 'biz-vektor' ),
        'before_widget' => '<div class="sideWidget widget %2$s" id="%1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="localHead">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'biz_vektor_widgets_init_add',10 );


/*-------------------------------------------*/
/* custom pagination
/*-------------------------------------------*/
function custom_pagination($max_num_pages = '', $range = 1) {
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($max_num_pages == '') {
        global $wp_query;
        // 最後のページ
        $max_num_pages = $wp_query->max_num_pages;
        if(!$max_num_pages) {
             $max_num_pages = 1;
        }
    }

    if(1 != $max_num_pages) {
        echo '<div class="paging">'."\n";

        // Prevリンク
        // 現在のページが２ページ目以降の場合
        if ($paged > 1) echo '<a class="prev_link" href="'.get_pagenum_link($paged - 1).'">&laquo;</a>'."\n";

        // 今のページからレンジを引いて2以上ある場合 && 最大表示アイテム数より最第ページ数が大きい場合
        // （レンジ数のすぐ次の場合は表示する）
        // 1...３４５
        if ( $paged-$range >= 2 && $max_num_pages > $showitems ) echo '<a href="'.get_pagenum_link(1).'">1</a>'."\n";
        // 今のページからレンジを引いて3以上ある場合 && 最大表示アイテム数より最第ページ数が大きい場合
        if ( $paged-$range >= 3 && $max_num_pages > $showitems ) echo '<span class="txt_hellip">&hellip;</span>'."\n";

                // レンジより前に追加する数
                $addPrevCount = $paged+$range-$max_num_pages;
                // レンジより後に追加する数
                $addNextCount = -($paged-1-$range); // 今のページ数を遡ってカウントするために-1
                // アイテムループ
                for ($i=1; $i <= $max_num_pages; $i++) {
                    // 表示するアイテム
                    if ($paged == $i) {
                        $pageItem = '<span class="current">'.$i.'</span>'."\n";
                    } else {
                        $pageItem = '<a href="'.get_pagenum_link($i).'" class="inactive">'.$i.'</a>'."\n";
                    }

                    // 今のページからレンジを引いた数～今のページからレンジを足した数まで || 最大ページ数が最大表示アイテム数以下の場合
                    if ( ( $paged-$range <= $i && $i<= $paged+$range ) || $max_num_pages <= $showitems ) {
                        echo $pageItem;
                        // 今のページからレンジを引くと負数になる場合 && 今のページ+レンジ+負数をレンジに加算した数まで
                    } else if ( $paged-1-$range < 0 && $paged+$range+$addNextCount >= $i ) {
                        echo $pageItem;
                    // 今のページからレンジを足すと　最後のページよりも大きくなる場合 && 今のページ+レンジ+負数をレンジに加算した数まで
                    } else if ( $paged+$range > $max_num_pages && $paged-$range-$addPrevCount <= $i ) {
                        echo $pageItem;
                    }
                }

                // 現在のページにレンジを足しても最後のページ数より２以上小さい時 && 最大表示アイテム数より最第ページ数が大きい場合
                if ( $paged+$range <= $max_num_pages-2 && $max_num_pages > $showitems ) echo '<span class="txt_hellip">&hellip;</span>'."\n";
                if ( $paged+$range <= $max_num_pages-1 && $max_num_pages > $showitems ) echo '<a href="'.get_pagenum_link($max_num_pages).'">'.$max_num_pages.'</a>'."\n";
                // Nextリンク
                if ($paged < $max_num_pages) echo '<a class="next_link" href="'.get_pagenum_link($paged + 1).'">&raquo;</a>'."\n";
                echo "</div>\n";
             }
        }





/*
 * Get Japanese days
 */
function yotsubanoha_get_ja_day($arg) {
	switch ($arg) {
    case 'Mon':
        $arg_ja = '月';
        break;
    case 'Tue':
        $arg_ja = '火';
        break;
    case 'Wed':
        $arg_ja = '水';
        break;
		case 'Thu':
        $arg_ja = '木';
        break;
    case 'Fri':
        $arg_ja = '金';
        break;
    case 'Sat':
        $arg_ja = '土';
        break;
		case 'Sun':
        $arg_ja = '日';
        break;
	}
	return $arg_ja;
}







/*-------------------------------------------*/
/*	Custom post type _ add public_relation
/*-------------------------------------------*/

add_post_type_support( 'public_relation', 'front-end-editor' );

add_action( 'init', 'biz_vektor_public_relation_create_post_type', 0 );
function biz_vektor_public_relation_create_post_type() {
	$public_relationLabelName = 'Public relation';
	register_post_type( 'public_relation', /* post-type */
	array(
		'labels' => array(
		'name' => $public_relationLabelName,
		'singular_name' => $public_relationLabelName
	),
	'public' => true,
	'menu_position' =>5,
	'has_archive' => true,
	'supports' => array('title','editor','excerpt','thumbnail','author')
	)
	);
	// Add information category
	register_taxonomy(
		'public_relation-cat',
		'public_relation',
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => $public_relationLabelName._x('category','admin menu', 'biz-vektor'),
			'singular_label' => $public_relationLabelName._x('category','admin menu', 'biz-vektor'),
			'public' => true,
			'show_ui' => true,
		)
	);
}


add_post_type_support( 'study', 'front-end-editor' );

add_action( 'init', 'happys_study_create_post_type', 0 );
function happys_study_create_post_type() {
 $studyLabelName = 'Study';
 register_post_type( 'study', /* post-type */
 array(
	 'labels' => array(
	 'name' => $studyLabelName,
	 'singular_name' => $studyLabelName
 ),
 'public' => true,
 'menu_position' =>5,
 'has_archive' => true,
 'supports' => array('title','editor','excerpt','thumbnail','author')
 )
 );
 // Add information category
 register_taxonomy(
	 'study-cat',
	 'study',
	 array(
		 'hierarchical' => true,
		 'update_count_callback' => '_update_post_term_count',
		 'label' => $studyLabelName._x(' category','admin menu', 'biz-vektor'),
		 'singular_label' => $studyLabelName._x(' category','admin menu', 'biz-vektor'),
		 'public' => true,
		 'show_ui' => true,
	 )
 );
}
