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
                      js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5&appId=240954495949691";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, \'script\', \'facebook-jssdk\'));</script>
                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
                </li>
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
