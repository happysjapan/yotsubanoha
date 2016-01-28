<?php

class Biz_Vektor_Works_Default{
	/**
	* default options
	*
	*/
	public $options;
	public $mastar_of_config = array(
			'readmore_default'         => true,  // 標準で詳細ページを設定するか
			'keep_the_option'          => true,   // 無効化時にオプションを削除するか
			'enable_reset_btn'         => true,   // リセットボタンを表示する
			'tab_name'                 => 'Works Unit',
		);

	/**
	* make default options
	*
	* @access public
	* @return array
	*/
	public function make_default_option(){
		$options = array(
			'init_flag'             => false,
			'post_name'             => 'works_b',
			'post_name_label'       => '制作実績',
			'urlfeed_label'         => '公開URL',
			'urlfeed_enable'        => True,
			'datefeed_label'        => '公開時期',
			'datefeed_enable'       => True,
			'enable_field_archive'  => True,
			'enable_readmore'       => false,
			'field_cullum' => array(
				0 => array('label' => "クライアント", 'status' => 'nomal', 'slug' => 'bv-works-meta-0'),
				1 => array('label' => "規模", 'status' => 'nomal', 'slug' => 'bv-works-meta-1'),
			),
			'field_order'           => array( 0, 1),
			'taxonomy_list' => array(
				array('label' => '分類', 'slug' => 'cate', 'status' => 'show'),
			),
			'editor-order'          => 'top',
			'enable_archive_cat'    => false,
			'keep_the_option'       => true,
			'disable_tip'           => false,
			'flush'                 => false,
		);
		if($this->mastar_of_config['readmore_default']){
			$options['enable_readmore'] = true;
		}
		return $options;
	}


	/**
	* reset options
	*
	* @access public
	* @return void
	*/
	public function reset_option(){
		$this->options = $this->make_default_option();
		$this->save_options();
	}


	/**
	* when activate this
	*
	* @access public
	* @return void
	*/
	public function activationHook(){
		if(false === get_option('biz_vektor_works_unit') ){
			add_option('biz_vektor_works_unit', $this->make_default_option());
		}
	}

	/**
	* when uninstall this
	*
	* @access public
	* @return void
	*/
	public function uninstallHook(){
		// インストール済みフラグを削除する
		if(!$this->options['keep_the_option']){
			delete_option('biz_vektor_works_unit');
		}
	}
}