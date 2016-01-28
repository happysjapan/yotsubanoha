jQuery(function($){
    $(".bv_field_setting_switch").change(function(){switch_field_disable();});
    $(".deleatbox").change(function(){
        if($(this).is(":checked")){
            $(this).parent().parent().parent('li').addClass('delete');
        // $(this).parent().parent().parent().css('background-color','#FFBCBC');
        }else{
            $(this).parent().parent().parent('li').removeClass('delete');
        // $(this).parent().parent().parent().css('background-color','#fff');
        }
        switch_field_disable();
    });
    $('#tablelabels').sortable();
    $("#vbw_save_menu_header").click(function() {
        var result = $('#tablelabels').sortable('toArray',{attribute:'class'});
        $("#fieldorder").val(result);
        $("#bizvektor_works_optionform").submit();
    });
    $(".bv_field_inputs").change(function(){
        $(this).parent().parent().parent().find('.des_label').html($(this).val());
    });
});

function juufuku(){
    jQuery(".bv_inputs_slug").change(function(){
        mayname = jQuery(this).val();
        if(mayname){
            flag = 0;
            //console.log('change detected:slug area');
            jQuery(".bv_inputs_slug").each(function(){
                if(jQuery(this).val()==mayname){flag+=1;}
            });
            if(flag>1){
                jQuery("#vbw_save_menu_header").attr('disabled','disabled');
                jQuery('.field_notice.slu').css('display','block');
            }
            else{jQuery("#vbw_save_menu_header").removeAttr("disabled");jQuery('.field_notice.slu').css('display','none');}
        }
    });
}

function check_field_del(){
    deleat_checked=false;
    jQuery(".deleatbox").each(function(){
        if(jQuery(this).is(":checked")){
            deleat_checked=true;
            jQuery('.field_notice.del').css('display','block');
            return true;
        }
    });
    if(!deleat_checked){jQuery('.field_notice.del').css('display','none');return false;}
    return true;
}

/*-------------------------------------------*/
/*  カスタムフィールドの編集をチェック
/*-------------------------------------------*/
function switch_field_disable(){
    if(jQuery(".bv_field_setting_switch").is(":checked")){
        jQuery(".bv_field_inputs").removeAttr("disabled");
        jQuery("#add_field").css('display','inline');
        jQuery("#nocheck_field").css('display','inline');
        jQuery("#tablelabels").removeClass('viewer').addClass('editor');
    }else{
        jQuery("#add_field").css('display','none');
        jQuery("#nocheck_field").css('display','none');
        jQuery("#tablelabels").removeClass('editor').addClass('viewer');
    }
    check_field_del();
}

function add_the_field(value,num,slug){
    if(value==null && num==null && slug==null){
        num = ++lastnum;
        value = '';
        delfeed = '';
        slug = 'bv-works-meta-'+num;
        newin = '<input type="hidden" name="options[field_cullum]['+num+'][new]" value="on" />';

    }else{
        delfeed = '<label><input type="checkbox" class="bv_field_inputs deleatbox" name="bw_delete['+num+']" value="Delete" />削除</label>';
        newin = '';
    }

    var feed = '<li class="'+num+'"><div class="bv_label_field" ><span class="des_label">'+value+'</span></div><div class="bv_inputs_field"><label>スラッグ<input type="text" name="options[field_cullum]['+num+'][slug]" class="bv_inputs_slug" value="'+slug+'" /></label><label>表示名<input type="text" class="bv_field_inputs field-cullm" name="options[field_cullum]['+num+'][label]" value="'+value+'" /></label>'+newin+delfeed+'</div></li>';
    //console.log(num);
    jQuery('#tablelabels').append(feed);
    juufuku();
}

function purge_the_field(){
    jQuery(".deleatbox").each(function(){
        jQuery(this).attr('checked',false);
        jQuery(this).parent().parent().parent().css('background-color','#fff');
    });
    jQuery("#agreefielddelete").attr('checked',false);
    switch_field_disable();
}

function rst_field(){
    jQuery('#tablelabels li').remove();
    //console.log(fieldOrder);
    if(fieldOrder.length){
        for(var f = 0;f < fieldOrder.length;f++){
            var ordernum = fieldOrder[f];
            //console.log(fieldValue[ordernum]);
            if(!fieldValue[ordernum]['value']&&fieldValue[ordernum]['value']!='0'){fieldValue[ordernum]['value']='';}
            add_the_field(fieldValue[ordernum]['value'], ordernum, fieldValue[ordernum]['slug']);
        }
    }
    jQuery("#agreefielddelete").attr('checked',false);
    switch_field_disable();
}

function add_the_taxonomy(value,slug,num){
    if(!value){value='';}if(!slug){slug='';}if(!num){num=++taxs;}
    var tax = '<tr><td colspan="2"><label>スラッグ  <input type="text" class="bv_tax_inputs" name="options[taxonomy_list]['+ num +'][slug]" value="'+ slug +'" /></label><label>表示名   <input type="text" class="bv_tax_inputs" name="options[taxonomy_list]['+ num +'][label]" value="'+ value +'" /></label><label><input type="checkbox" class="bv_tax_inputs" name="options[taxonomy_list]['+ num +'][delete] value="on" />削除</label><input type="hidden" name="options[taxonomy_list]['+ num +'][show]" value="show" /></td>';
    jQuery('#table-taxonomies').append(tax);
}

function togglead(fix){
    if(fix != null){
        if(fix){jQuery(".bw-advance").show();}
        else{jQuery(".bw-advance").hide();}
    }else{
        jQuery(".bw-advance").toggle();
    }
}