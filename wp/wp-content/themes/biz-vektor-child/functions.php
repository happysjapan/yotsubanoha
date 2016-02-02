<?php // ← 既にfunctions.php が存在し、もともと書いてある場合は不要
add_filter('headContactCustom','do_head_contact_custom');
function do_head_contact_custom($headContact){
    $options = biz_vektor_get_theme_options();
    $contact_txt = $options['contact_txt'];
    $contact_time = nl2br($options['contact_time']);
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
            if ($contact_time) {
                // お問い合わせ時間の入力がある場合
                $headContact .= '<div id="headContactTime">'.$contact_time.'</div>'."\n";
            }

        $headContact .= '
        </div>
        <div class="btnWrap">
			<a href="http://localhost:8888/contact/" title="お問合せ資料請求" class="contact">お問合せ<br />資料請求</a>
			<a href="http://localhost:8888/contact/" title="見学の申し込み" class="apply">見学の<br />申し込み</a>
        </div>
        <div class="rightBox">
        	<ul class="snsBtn">
				<li>tweet</li>
				<li>いいね</li>
        	</ul>
        	<dl class="total">
				<dt>掲載相談所数</dt>
				<dd>1,200件</dd>
			</dl>
			<dl class="total">
				<dt>お祝い金総支給額</dt>
				<dd>160,000円</dd>
        	</dl>
        </div>
        </div></div>
        ';
    }
    return $headContact;
}
