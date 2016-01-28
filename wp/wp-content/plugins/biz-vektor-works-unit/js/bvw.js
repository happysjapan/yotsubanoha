/*==========================================*/
/*  bvw.js
/*  公開ページ用のjs
/*==========================================*/

jQuery(document).ready(function(){
	bvw_wrp_add_size();
	bvw_thumbnail_height_fix();
});
jQuery(window).resize(function(){
	bvw_wrp_add_size();
	bvw_thumbnail_height_fix();
});

/*-------------------------------------------*/
/*  実績アーカイブの画像サイズの高さを指定
/*  （画像の高さは投稿によって違うので、表示している横幅を元に高さを算出してトリミングするため）
/*-------------------------------------------*/
function bvw_thumbnail_height_fix() {
    var imgWidth = jQuery('.bv_works_item a').width();
    imgHeight = imgWidth/6*4;
    jQuery(".bv_works_item").each(function(){
        jQuery(this).find('.worksThumbnail .worksThumbnailInner a').css("height",imgHeight);
    });
}

/*-------------------------------------------*/
/*  実績アーカイブの表示エリアのサイズを取得してカラム数指定用のclassを追加
/*-------------------------------------------*/
function bvw_wrp_add_size() {
    var bvw_Width = jQuery('.works-wrp').width();

    for (i = 1; i <= 4; i = i +1){
        var column = 'bvw_column_' + i;
        if ( jQuery('.works-wrp').hasClass(column) ){
            jQuery('.works-wrp').removeClass(column);
        }
    }
    if ( 380 > bvw_Width ) {
    	jQuery('.works-wrp').addClass('bvw_column_1');
    } else if ( 380 <= bvw_Width && bvw_Width < 550) {
    	jQuery('.works-wrp').addClass('bvw_column_2');
    } else if ( 550 <= bvw_Width && bvw_Width < 700) {
    	jQuery('.works-wrp').addClass('bvw_column_3');
    } else if ( 700 <= bvw_Width) {
    	jQuery('.works-wrp').addClass('bvw_column_4');
    }
}