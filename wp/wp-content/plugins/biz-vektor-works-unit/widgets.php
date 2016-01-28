<?php
/*-------------------------------------------*/
/*	Works-Widget
/*-------------------------------------------*/

add_action('widgets_init', create_function('', 'return register_widget("Biz_Vektor_Works_widget");'));
class Biz_Vektor_Works_widget extends WP_Widget {
	// ウィジェット定義
	function __construct() {
		global $bizvektor_works_unit;
		$works_label = esc_html($bizvektor_works_unit->options['post_name_label']);

		$widget_name = biz_vektor_get_short_name().'_サイド用_'.$works_label;

		parent::__construct(
			'Biz_Vektor_Works_widget',
			$widget_name,
			array( 'description' => $works_label.'で使用するカテゴリーと年別アーカイブがセットになったサイドバー用ウィジェットです。' )
		);
	}

	// ウィジェット出力時の動作
	function widget($args, $instance) {
	   ?>
	   <div id="worksSideSection" class="localSection sideWidget">
			<div id="localInner">
			<?php
			global $bizvektor_works_unit;

			foreach($bizvektor_works_unit->options['taxonomy_list'] as $line){
					if($line['status'] != 'show'){ continue; }
					echo '<h3 class="localHead">'.$line['label'].'</h3>';
					echo '<ul class="localNavi" style="margin-bottom:20px;">';
			   wp_list_categories('taxonomy='.$line['slug'].'&hide_empty=1&title_li=&echo=1');
			   echo '</ul>';
			}
		?>
			<h3 class="localHead">年別</h3>
			<ul>
				<?php wp_get_archives('type=yearly&post_type='.$bizvektor_works_unit->options['post_name']); ?>
			</ul>
		</div>
		</div>
		<?php
	}

	// 設定値の受け取り
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		return $new_instance;
	}

	// ウィジェットの設定画面
	function form($instance) {
		$defaults = array(
		);

		$instance = wp_parse_args((array) $instance, $defaults);
		?>

		<?php
	}

}

add_action('widgets_init', create_function('', 'return register_widget("Biz_Vektor_Works_content_widget");'));
class Biz_Vektor_Works_content_widget extends WP_Widget {
	// ウィジェット定義
	function __construct() {
		global $bizvektor_works_unit;
		$works_label = esc_html($bizvektor_works_unit->options['post_name_label']);
		$widget_name = biz_vektor_get_short_name().'_トップ用_Works_'.$works_label;

		parent::__construct(
			'Biz_Vektor_Works_content_widget',
			$widget_name,
			array( 'description' => $works_label.'で使用するBizVektorコンテンツエリア用プラグインです' )
		);
	}

	// ウィジェット出力時の動作
	function widget($args, $instance) {
		if( !isset($instance['posts']) || !$instance['posts'] || $instance['posts'] < 0 ){ $instance['posts'] = 6; }
		wp_enqueue_script( 'bizVektor-works-js', plugins_url( '/js/bvw.min.js', __FILE__ ), array('jquery'), '0.1.0', true );

		$options = get_option('biz_vektor_works_unit');

		$arg = array(
			'public'      => true,
			'post_status' => 'publish',
			'post_type'   => $options['post_name']
		);
		$arg['posts_per_page'] = $instance['posts'];
		$arg['posts_per_page'] = ($instance['posts'])? $instance['posts'] : 6;
		query_posts( $arg );
		require( dirname( __FILE__ ) . '/view/archive-widget.php' );
		wp_reset_query();
	}

	// 設定値の受け取り
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		if($new_instance['posts']){
			$instance['posts'] = $new_instance['posts'];
		}
		return $instance;
	}

	// ウィジェットの設定画面
	function form($instance) {
		$defaults = array(
			'posts'     => 6,
			'ignore'    => '',
			'ign'       => array(),
		);
		$instance = wp_parse_args((array) $instance, $defaults);
		$taxs = get_taxonomies( array('public'=> true),'objects'); 
		?>
		<p>
		<label for="<?php echo $this->get_field_id('posts'); ?>">表示数</label>
		<input type="number" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" min="1" ><br/>
		</p>
		<?php
	}
}
