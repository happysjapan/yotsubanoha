<?php

class Biz_Vector_Works extends Biz_Vektor_Works_Default {
	/**
	* initialize the hooks
	*
	* @access public
	* @return void
	*/
	public function __construct(){
		$this->load_options();

		// 有効化時の動作を定義
	   if (function_exists('register_activation_hook')){
			register_activation_hook(__FILE__,       array($this, 'activationHook'));
		}
		// 無効化時の動作定義
		if (function_exists('register_deactivation_hook')){
			register_deactivation_hook(__FILE__,     array($this, 'uninstallHook'));
		}
		// 設定画面追加フック
		add_action('admin_menu',                     array($this, 'set_admin_menu'));

		// 管理画面のCSSロード
		add_action( 'admin_enqueue_scripts',         array($this, 'hook_the_scripts_admin') );

		add_action('admin_init',                     array($this, 'modify_postdata') );

		add_filter('plugin_row_meta',                array($this, 'set_plugin_meta'), 2, 10); 

		if(isset($this->options['init_flag']) && $this->options['init_flag']){
			add_action('init',                       array($this, 'add_post_type') );

			// 固有CSSの読み込み
			add_action( 'wp_enqueue_scripts',        array($this, 'hook_the_stylesheets') );

			// 独自アーカイブページ出力フック
			add_action('biz_vektor_extra_single',    array($this, 'output_single_page'));

			// カスタムフィールド追加フック
			add_action('admin_init',                 array($this, 'set_init_hook'));


			add_action('admin_init',                 array($this, 'post_metabox'));

			// カスタムフィールドの保存
			add_action('save_post',                  array($this, 'save_postdata'));

			// ビズベクトル本体の独自アーカイブページ感知フック
			add_filter('is_biz_vektor_archive_loop', array($this, 'is_my_archive_page'));

			// 独自アーカイブページ出力フック
			add_action('biz_vektor_archive_loop',    array($this, 'output_archive_page'));

			// ビズベクトル本体の独自シングルページ感知フック
			add_filter('is_biz_vektor_single_loop',  array($this, 'is_my_archive_page'));

			// ウィジェットエリアの追加
			add_action( 'widgets_init',              array($this, 'add_widget_area'));
		}
	}


	/**
	* initialize original widget area
	*
	* @access public
	* @return void
	*/
	function add_widget_area(){
		if (function_exists('register_sidebar')) {
		register_sidebar( array(
				'name'            => 'サイドバー（'.esc_html($this->options['post_name_label']).'）',
				'id'              => $this->options['post_name'].'-widget-area',
				'description'     => esc_html($this->options['post_name_label']).'コンテンツのページにのみ表示されるウィジェットです。',
				'before_widget'   => '<div class="sideWidget" id="%1$s" class="widget %2$s">',
				'after_widget'    => '</div>',
				'before_title'    => '<h3 class="localHead">',
				'after_title'     => '</h3>',
			) );

		}
	}


	/**
	* set hook stylesheets and javascripts at works pages
	*
	* @access public
	* @return void
	*/
	public function hook_the_stylesheets(){

		if($this->is_my_turn()){
			wp_enqueue_style('bizvektor-works-css', plugins_url( '/css/bizvektor-works.css',__FILE__));
			wp_enqueue_script( 'bizVektor-works-js', plugins_url( '/js/bvw.min.js', __FILE__ ), array('jquery'), '0.1.0', true );
		}
		elseif(is_front_page()){
			wp_enqueue_style('bizvektor-works-css', plugins_url( '/css/bizvektor-works.css',__FILE__));
		}
	}


	/**
	* set hook stylesheets and javascripts at admin pages
	*
	* @access public
	* @return void
	*/
	public function hook_the_scripts_admin(){
		global $hook_suffix;

		/// post pages
		if(($hook_suffix == 'post-new.php' || $hook_suffix == 'post.php')){ 
			wp_enqueue_style('bizvektor-works-css-admin', plugins_url('/css/bizvektor-works-admin.css',__FILE__));
			wp_enqueue_media();
			wp_enqueue_script( 'bizVektor-works-admin-js', plugins_url( '/js/uploader.min.js', __FILE__ ), array('jquery'), '0.1.0', true );
		}

		/// admin page
		elseif(preg_match('/bv_works_unit/i', $hook_suffix )){
			wp_enqueue_style('bizvektor-works-css-admin', plugins_url('/css/bizvektor-works-admin.css',__FILE__));
			wp_enqueue_script('jquery-ui', plugins_url('/js/jquery-ui-1.10.4.min.js',__FILE__), array('jquery'), false, true);
			// wp_enqueue_script('bizvektor-works-js-admin', plugins_url('/js/admin_config.js',__FILE__), array('jquery-ui'), false, true);
			wp_enqueue_script('bizvektor-works-js-admin', plugins_url('/js/admin_config.min.js',__FILE__), array('jquery-ui'), false, true);
		}
	}


	/**
	* set "setting" link in plugins page
	*
	* @access public
	* @return array
	*/
	public function set_plugin_meta( $links, $file ) { // Add a link to this plugin's settings page
		global $this_plugin;

		if(!$this_plugin) $this_plugin = plugin_basename(__FILE__);

		if($file == $this_plugin) {
			$myname                    = preg_replace('/^.*\/(.+\/)$/' ,'$1' , plugin_dir_path(__FILE__));
			$settings_link             = '<a href="themes.php?page=bv_works_unit">設定</a>';
			array_unshift($links, $settings_link);

	}
	return $links;
}


	/**
	* initialize admin_page
	*
	* @access public
	* @return void
	*/
	public function set_init_hook(){
		add_meta_box('bvworks_custom_field', $this->options['post_name_label'], array($this, 'set_the_custom_field'), $this->options['post_name'], 'normal', 'high');
	}



	/**
	* initialize_front_script function
	*
	* @access public
	* @return void
	*/
	public function set_the_custom_field(){
		wp_nonce_field(plugin_basename(__FILE__), 'bizvektorworksunit');

		$works_image     = get_post_meta(get_the_ID(),  'bv-works-meta-thumburl', true);
		$after_image     = get_post_meta(get_the_ID(),  'bv-works-meta-thumb-afterurl', true);
		$enable_after    = (get_post_meta(get_the_ID(), 'bv-works-meta-enable_after', true))? 'y' : 'n';
		$imgid           = get_post_meta(get_the_ID(),  'bv-works-meta-thumbid', true);
		$imgafterid      = get_post_meta(get_the_ID(),  'bv-works-meta-thumb-afterid', true);
		$thumb_position  = get_post_meta(get_the_ID(),  'bv-works-meta-thumb-position', true);

		require( 'view/customfield.php' );
	}


	/**
	* save the customfields
	*
	* @access public
	* @return int(post_id)
	*/
	public function save_postdata($post_id){

		// nonce
		if(!isset($_POST['bizvektorworksunit'])){
			return $post_id;

		}
		if(!wp_verify_nonce($_POST['bizvektorworksunit'], plugin_basename(__FILE__ ))){
			return $post_id;

		}


		// ドラフトなら破棄
		if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return $post_id;


		if(isset($_POST['bizvektorworks'])){

			/// get POST Datas
			$flagdata = $_POST['bizvektorworks'];

			/// load is_enable before-after mode
			$enable_after = ($flagdata['enable_after'] == 'y')? true : false;


			/// set image align mode
			if(isset($flagdata['image_align']) && $flagdata['image_align'] == 'thumbnailTop'){ 
				update_post_meta($post_id, 'bv-works-meta-thumb-position', 'thumbnailTop');

			}else{
				delete_post_meta($post_id,  'bv-works-meta-thumb-position');

			}

			/// set image ID and image URL
			update_post_meta($post_id, 'bv-works-meta-thumburl', $flagdata['thumb_url']);
			update_post_meta($post_id, 'bv-works-meta-thumbid', $flagdata['thumbid']);

			update_post_meta($post_id, 'bv-works-meta-thumb-afterurl', $flagdata['after_url']);
			update_post_meta($post_id, 'bv-works-meta-thumb-afterid', $flagdata['after_thumbid']);


			/// set thumbnail ID
			// cause before-after mode
			if($enable_after && $flagdata['after_thumbid'] && $flagdata['thumbid']){
				update_post_meta( $post_id, '_thumbnail_id', $flagdata['after_thumbid']);

			}
			// cause nomal mode
			elseif(isset($flagdata['thumbid']) && $flagdata['thumbid']){
				$enable_after = false;
				update_post_meta( $post_id, '_thumbnail_id',$flagdata['thumbid']);

			}
			// cause nomal mode and no exsist nomal values and exist after values
			elseif(isset($flagdata['after_thumbid']) && $flagdata['after_thumbid']){
				$enable_after = false;
				update_post_meta( $post_id, '_thumbnail_id',$flagdata['after_thumbid']);

				delete_post_meta($post_id, 'bv-works-meta-thumb-afterurl');
				delete_post_meta($post_id, 'bv-works-meta-thumb-afterid');
				update_post_meta($post_id, 'bv-works-meta-thumburl', $flagdata['after_url']);
				update_post_meta($post_id, 'bv-works-meta-thumbid', $flagdata['after_thumbid']);

			}
			// cause no there image values
			else{
				$enable_after = false;
				delete_post_meta($post_id, '_thumbnail_id');

			}

			update_post_meta($post_id, 'bv-works-meta-enable_after', $enable_after);

			/// set custom values
			foreach($this->options['field_order'] as $s){
				if(isset($this->options['field_cullum'][$s]['slug']) && $this->options['field_cullum'][$s]['slug']){
					update_post_meta($post_id, $this->options['field_cullum'][$s]['slug'], $flagdata[$s]);

				}
			}

			/// save url data
			update_post_meta( $post_id, 'bizvektorworks_url', $_POST['bizvektorworks_url']);
		}

		return $post_id;
	}


	/**
	* filter hook of bizvektor_index.php
	*
	* @access public
	* @return bool
	*/
	public function is_my_archive_page($query){
		if($this->is_my_turn()){
			return true;

		}

		return $query;
	}


	/**
	* check the works page
	*
	* @access private
	* @return bool(default:false)
	*/
	private function is_my_turn(){
		global $wp_query;

		if (isset($wp_query->query_vars['post_type']) && $wp_query->query_vars['post_type'] == $this->options['post_name']) {
			return true;

		}
		elseif (isset($wp_query->query_vars['taxonomy'])){
			foreach($this->options['taxonomy_list'] as $tax){
				if($tax['slug'] == $wp_query->query_vars['taxonomy']){ return true; }

			}

			return false;
		}

		return false;
	}


	/**
	* output the original archive page
	*
	* @access public
	* @return void
	*/
	public function output_archive_page(){
		if($this->is_my_turn()){
			require( 'view/archive.php' );

		}
	}


	/**
	* output the original single page
	*
	* @access public
	* @return void
	*/
	public function output_single_page(){
		require( 'view/single.php' );

	}


	/**
	* get the theme options in instance
	*
	* @access private
	* @return void
	*/
	private function load_options(){
		$this->options = get_option('biz_vektor_works_unit');

	}


	/**
	* save to theme options instance
	*
	* @access public
	* @return void
	*/
	public function save_options(){
		update_option('biz_vektor_works_unit', $this->options);

	}


	/**
	* init admin menu
	*
	* @access public
	* @return void
	*/
	public function set_admin_menu(){
		add_submenu_page('options-general.php', '実績表示', $this->mastar_of_config['tab_name'], 'administrator', 'bv_works_unit', array( $this, 'config_display' ));

	}


	/**
	* save the admin menu
	*
	* @access public
	* @return void
	*/
	public function modify_postdata(){
		if(isset($_POST['biz_vektor_works_unit_form']) && $_POST['biz_vektor_works_unit_form']){ 
			if(isset($_POST['_wpnonce_vbwu']) && $_POST['_wpnonce_vbwu']){
				if(check_admin_referer( 'dsaufasdjflkasdfae', '_wpnonce_vbwu' )){
					// init
					$postdata = $_POST['options'];
					$data = $this->options;
					$default = $this->make_default_option();
					$refresh_flag = false;

					// post option
					$befor = $data['init_flag'];
					$data['init_flag'] = (isset($postdata['init_flag']) && $postdata['init_flag'])? true : false ;
					if(isset($postdata['post_name']) && $postdata['post_name']){  $data['post_name'] = $postdata['post_name']; }
					if($data['post_name_label'] != $postdata['post_name_label']){
						$data['post_name_label'] = $postdata['post_name_label'];
						$data['flush'] = true;
					}

					$data['disable_tip']        = (isset($postdata['disable_tip']) && $postdata['disable_tip'] === 'true')? true : false;

					// urlfeed
					$data['urlfeed_label']            = ($postdata['urlfeed_label'] != '')? esc_html($postdata['urlfeed_label']) : $default['urlfeed_label'];
					$data['urlfeed_enable']           = (isset($postdata['urlfeed_enable']) && $postdata['urlfeed_enable'] == 'true')? True : False;

					// datefeed
					$data['datefeed_label']            = ($postdata['datefeed_label'] != '')? esc_html($postdata['datefeed_label']) : $default['datefeed_label'];
					$data['datefeed_enable']           = (isset($postdata['datefeed_enable']) && $postdata['datefeed_enable'] == 'true')? True : False;

					// custom field enable
					$data['enable_field_archive']      = (isset($postdata['enable_field_archive']) && $postdata['enable_field_archive'] == 'true')? True : False;

					// view option
					$data['enable_archive_cat']  = (isset($postdata['enable_archive_cat']) && $postdata['enable_archive_cat'] == 'true')? True : False;
					$data['editor-order'] = ($postdata['editor-order'] != 'bottom')? 'top' : 'bottom';

					$blacklistl = array();
					// field option
					if(isset($postdata['field_cullum'])){
						$field_labels = array_keys($postdata['field_cullum']);
						if($field_labels){

							foreach($field_labels as $label){
								if(isset($postdata['field_cullum'][$label]['new'])){
									if($postdata['field_cullum'][$label]['label'] && $postdata['field_cullum'][$label]['label'] != 'undefined'){
										$data['field_cullum'][$label]['label'] = esc_html($postdata['field_cullum'][$label]['label']);
										$data['field_cullum'][$label]['slug'] = esc_html($postdata['field_cullum'][$label]['slug']);
									}else{
										$blacklistl[] = $label;
									//    $data['field_cullum'][$label]['label'] = '';
									}
								}else{
									$data['field_cullum'][$label]['label'] = esc_html($postdata['field_cullum'][$label]['label']);
									$data['field_cullum'][$label]['slug'] = esc_html($postdata['field_cullum'][$label]['slug']);
								}
							}
						}
					}

					// field order
					if($postdata['fieldorder_js']){

						$orders = explode(",",$postdata['fieldorder_js']);

						if( isset($postdata['aglee']['field']) && isset($_POST['bw_delete']) && is_array( $_POST['bw_delete'] ) ){
							while( list($k,$v) = each( $_POST['bw_delete'] ) ){
								$blacklistl[] = $k;
							}
						}

						$data['field_order'] = array();
						foreach($orders as $order){
							if(!in_array($order, $blacklistl)){
								$data['field_order'][] = $order;
							}
						}
					}

					// taxonomy
					$taxonomyes = array_keys($postdata['taxonomy_list']);
					foreach($taxonomyes as $tax){
						if(isset($postdata['taxonomy_list'][$tax]['delete']) && $postdata['taxonomy_list'][$tax]['delete'] == 'on'){
							$data['taxonomy_list'][$tax]['status'] = 'disable';

						}else{
							$data['taxonomy_list'][$tax]['status'] = 'show';

						}


						if(!$postdata['taxonomy_list'][$tax]['slug']){ 
							$postdata['taxonomy_list'][$tax]['slug'] = $data['post_name'].'-cat'.$tax;

						}

						$data['taxonomy_list'][$tax]['slug'] = $postdata['taxonomy_list'][$tax]['slug'];

						if(!$postdata['taxonomy_list'][$tax]['label']){
							$postdata['taxonomy_list'][$tax]['label'] = $data['post_name'].'-cat'.$tax;

						}

						$data['taxonomy_list'][$tax]['label'] = $postdata['taxonomy_list'][$tax]['label'];
					}

					$data['keep_the_option'] = (isset($postdata['keep_the_option']) && $postdata['keep_the_option'] == 'true')? True : False;
					$data['flush'] = true;

					$this->options = $data;
					$this->save_options();

					//$myname = preg_replace('/^.*\/(.+\/.+)$/' ,'$1' , __FILE__ );

					wp_safe_redirect( admin_url( 'options-general.php?page=bv_works_unit' ) );

				}
			}
		}
	}


	/**
	* output admin menu
	*
	* @access public
	* @return void
	*/
	public function config_display(){

		if(isset($_POST['biz_vektor_works_unit_form_reset']) && $_POST['biz_vektor_works_unit_form_reset']){
			$this->reset_option();

		}
		$initiate = ( $this->options['init_flag'] );

		require( 'view/admin_menu.php' );
	}


	/**
	* initialize biz-vektor's keyword metabox
	*
	* @access public
	* @return void
	*/
	public function post_metabox(){
		if( function_exists( "insert_custom_field_metaKeyword" ) ){
			$name        = $this->options['post_name'];
			add_meta_box('div1', __('Meta Keywords', 'biz-vektor'), 'insert_custom_field_metaKeyword', $name, 'normal', 'high');
			add_post_type_support( $name, 'excerpt' );
		}
	}


	/**
	* initialize custom post_type and custom taxonomy
	*
	* @access public
	* @return void
	*/
	public function add_post_type(){
		$name        = $this->options['post_name'];
		$label       = $this->options['post_name_label'];
		$taxonomys   = $this->options['taxonomy_list'];
		$taxkeys = array_keys($taxonomys);

		// カスタム投稿タイプ
		$params = array(
			'labels' => array(
				'name'           => $label,
				'singular_name'  => $label
			),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'has_archive'        => true,
			'query_var'          => true,
			'menu_position'      => 5,
			'rewrite'            => true,
			'capability_type'    => 'post',
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array('title','author','custom_ferld','taxonomy','thumbnail','editor')
		);

		// タクソノミー
		$params['taxonomy'] = array();
		foreach($taxkeys as $e){
			if(!$taxonomys[$e]['label'] || $taxonomys[$e]['status']!='show'){ continue; }
			register_taxonomy(
				$taxonomys[$e]['slug'],
				$name,
				array(
					'hierarchical' => true,
					'label' => $taxonomys[$e]['label'],
					'menu-order' => true,
					'rewrite' => array( 'slug' => $taxonomys[$e]['slug'] )
				)
			);
		}
		register_post_type($name, $params);

		if($this->options['flush']){
			flush_rewrite_rules();
			$this->options['flush'] = false;
			$this->save_options();
		}
	}
}