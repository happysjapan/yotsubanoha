jQuery(document).ready(function($){
    var custom_uploader;
    jQuery('.media_btn').click(function(e) {
        media_target = jQuery(this).attr('id').replace(/media_/g,'#');
        myparent = jQuery(this).parent();
        e.preventDefault();

        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
        custom_uploader = wp.media({
            title: 'Choose Image',
            library: {type: 'image'},
            button: {text: 'Choose Image'},
            multiple: false,
        });

        custom_uploader.on('select', function() {
            var images = custom_uploader.state().get('selection');
            images.each(function(file){
                jQuery(media_target).attr('value', file.toJSON().url );

                var img = myparent.children(".bvw_preview").children(".bektor_worksimage_thumb");
                //img.remove();
                if ( img.length === 0 ) {
                    myparent.children('.bvw_preview').prepend( '<img  class="bektor_worksimage_thumb" style="max-height:200px;max-width:300px;" src="' + file.toJSON().url + '" />' );
                } else {
                    img.attr( "src", file.toJSON().url );
                }
                myparent.children('.bvw_id').val(file.toJSON().id);
                myparent.children('.bvw_preview').children('.infotown_uploader_remove').css('display','inline');
            });
        });
        custom_uploader.open();
    });

    jQuery('.infotown_uploader_remove').click(function(e) {
        e.preventDefault();

        var myparent = jQuery(this).parent().parent();

        myparent.children('.bvw_preview').children('img').remove();
        myparent.children('.bvw_preview').children('.infotown_uploader_remove').css('display','none');
        myparent.children('.bvw_id').val('');
        myparent.children('.bvw_imgurl_fel').val('');
    });


    if(jQuery(".bvw_enable_after").val() == 'y'){
        bv_toggle_after_on();
    }else{
        bv_toggle_after_off();
    }
});

function bv_toggle_after_on(){
    jQuery(".bv_after_area").css("display","table-row");
    jQuery(".bv_toggle_after_on").css('display','none');
    jQuery(".bv_toggle_after_off").css('display','block');
    jQuery(".bvw_enable_after").val('y');
}

function bv_toggle_after_off(){
    jQuery(".bv_after_area").css("display","none");
    jQuery(".bv_toggle_after_off").css('display','none');
    jQuery(".bv_toggle_after_on").css('display','block');
    jQuery(".bvw_enable_after").val('n');
}