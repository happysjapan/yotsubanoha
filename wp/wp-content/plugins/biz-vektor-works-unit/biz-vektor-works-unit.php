<?php
/*
Plugin Name: BizVektor Works Unit
Plugin URI:
Description: このプラグインはBizVektorテーマに実績紹介コンテンツを追加するプラグインです。
Author: Vektor,Inc,
Author URI: http://bizvektor.com
Version: 1.0.5
*/

/*-------------------------------------------*/
/*	Works Unit 用の画像サイズを追加
/*-------------------------------------------*/
add_theme_support('post-thumbnails');

if(!has_image_size('bizvektor_works_thumb')){ add_image_size('bizvektor_works_thumb', 400, 2000, false ); }

/*-------------------------------------------*/
/*
/*-------------------------------------------*/
add_action('after_setup_theme', 'biz_vektor_works_unit_set_hook');

function biz_vektor_works_unit_set_hook(){
    if( function_exists( 'biz_vektor_get_short_name' ) ){
        require_once( dirname( __FILE__ ) . '/widgets.php' );
    }
}
/*-------------------------------------------*/
/*
/*-------------------------------------------*/
require ( 'class.biz_vektor_works_default.php');
require ( 'class.biz_vektor_works.php');


$bizvektor_works_unit = new Biz_Vector_Works;

?>