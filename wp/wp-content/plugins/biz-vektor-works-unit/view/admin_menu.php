<?php
/*==========================================*/
/*  Works Unit 設定画面
/*==========================================*/

	ini_set('display_errors', '0');
	// Works Unit のオプション項目を取得 / なければデフォルト値を読み込み
	$options = get_option('biz_vektor_works_unit', Biz_Vektor_Works_Default::make_default_option());
	// 説明の省略にチェックが入ってるかどうか
	$tip = ($options['disable_tip'])? false : true;
	$fieldvalue = array('e'=>'e');
	$lastnum=0;
	while(list($k,$v)=each($options['field_cullum'])){
		$fieldvalue[$k] = array(
			'slug' => $v['slug'],
			'value' => $v['label']
		);
		$lastnum = $k;
	}

?>
<script type="text/javascript">
jQuery(document).ready(function(){
	ferlds = 0;
	taxs = 5;
	deleat_checked = false;
	fieldOrder = <?php echo json_encode($options['field_order']); ?>;
	fieldValue = <?php echo json_encode($fieldvalue); ?>;
<?php /*
リリース前にインストールしたものは $options['field_order']のラベル名が違うためエラーになるので、一度
lastnum = 0
にして設定を保存する
*/?>
	lastnum = <?php echo $lastnum; ?>;
	handle = 0;
	togglead(false);
	<?php
		$tax_keys = array_keys($options['taxonomy_list']);
		foreach($tax_keys as $tax){
			if($options['taxonomy_list'][$tax]['status'] != 'show'){ continue; }
			echo 'add_the_taxonomy("'.$options['taxonomy_list'][$tax]['label'].'","'.$options['taxonomy_list'][$tax]['slug'].'","'.$tax.'");';
		}
		echo 'taxs = '.++$tax.';';
	?>
	rst_field();
});
</script>
<div class="wrap biz_vektor_works_option">
<?php
if ( function_exists( 'get_biz_vektor_name' ) ) {
	$biz_vektor_name = get_biz_vektor_name();
} else {
	$biz_vektor_name = 'BizVektor';
} ?>
<h2><?php echo esc_html($biz_vektor_name); ?> Works Unit</h2>
<form method="post" action="" id="bizvektor_works_optionform">
<h3>基本設定</h3>
<input type="hidden" id="fieldorder" name="options[fieldorder_js]" value="" />

<?php wp_nonce_field('dsaufasdjflkasdfae', '_wpnonce_vbwu'); ?>
	<input type="hidden"   id="bizvektorworksunit1"   name="biz_vektor_works_unit_form" value="true" />
<table class="form-table">
	<tr>
	<th scope="row"><label for="bizvektorworksunit2" >実績機能を有効にする</label></th>
	<td><input type="checkbox" id="bizvektorworksunit2"   name="options[init_flag]" <?php echo ($initiate)? 'checked' : '' ; ?> /> ※保存後に有効になります。</td>
	</tr>
	<tr>
	<th scope="row"><label for="bizvektorworksunit3" >投稿タイプ名</label></th>
	<td>
<?php if($tip): ?>
	<p>実績の投稿タイプ名（データベースに登録するために識別子）を変更する事が出来ます。<br />
	但し、本プラグインの実績が有効になっていない場合のみ変更出来ます。<br />投稿タイプ名を変更する場合は<span class="alert">「実績機能を有効にする」のチェックを一旦外して保存</span>したあとで、<span class="alert">必ず半角英字（小文字）</span>で変更して下さい。</p>
<?php endif; ?>
	<input type="text"     id="bizvektorworksunit3"        name="options[post_name]" value="<?php echo $options['post_name']; ?>" <?php echo ($initiate)? "disabled" : "" ?> /><br />
<?php if($tip): ?>
	※ 実績に投稿される内容はスラッグ名に紐付いていますので、<span class="alert">投稿タイプ名を変更すると今まで投稿した内容は表示されなくなります。</span>但し、投稿タイプ名を元に戻せば再び表示されます。
<?php endif; ?>
	</td>
	</tr>
	<tr>
	<th><label for="post_name_label" >表示名</label></th>
	<td><input type="text"     id="post_name_label"        name="options[post_name_label]" value="<?php echo $options['post_name_label']; ?>" /><br />
	例）制作実績 / 施工事例 など
	</td>
	</tr>
	<tr>
	<th><label for="editor-order" >詳細ページの表示順</label></th>
	<td><select id="editor-order" name="options[editor-order]" >
		<option value="top" <?php echo ($options['editor-order'] != 'bottom')? 'selected': ''; ?> >本文 - 項目</option>
		<option value="bottom" <?php echo ($options['editor-order'] == 'bottom')? 'selected': ''; ?> >項目 - 本文</option>
	</select></td>
	</tr>
	<tr><th scope="row"><label for="urlfeed_label">URLの表示ラベル</label></th>
	<td>
	登録した実績に対してURLを設定する事が出来ます。<br />
	<input type="text" id="urlfeed_label" name="options[urlfeed_label]" value="<?php echo $options['urlfeed_label']; ?>" /><label><input type="checkbox" name="options[urlfeed_enable]" value="true" <?php echo ($options['urlfeed_enable'])? 'checked':''; ?> /> URL表示を有効にする</label><br />
<?php if($tip): ?>
	例）<br />
	[ 店舗ホームページ ] 店舗の内装を施工した場合、その店舗のウェブサイトのURLを掲載 <br />
	[ 公開URL ] ウェブ制作会社がウェブサイトの実績を掲載した場合、制作したウェブサイトのURLを掲載 <br />
<?php endif; ?>
	</td>
	</tr>
	<tr><th scope="row"><label for="datefeed_label">時期の表示ラベル</label></th>
	<td>
	<input type="text" id="datefeed_label" name="options[datefeed_label]" value="<?php echo $options['datefeed_label']; ?>" /><label><input type="checkbox" name="options[datefeed_enable]" value="true" <?php echo ($options['datefeed_enable'])? 'checked':''; ?> /> 時期表示を有効にする</label><br />
<?php if($tip): ?>
	例）<br />
	[ 施工時期 ] 店舗の内装を施工した場合、その時期を掲載 <br />
	[ 公開時期 ] ウェブ制作会社がウェブサイトの実績を掲載した場合、そのウェブサイトの公開時期<br />
<?php endif; ?>
	</td>
	</tr>
	<tr>
	<th scope="row"><label for="show_chips">管理画面の説明文を省略</label></th>
	<td>
	<input type="checkbox" id="show_chips" name="options[disable_tip]" value="true" <?php echo ($options['disable_tip'])? 'checked' : ''; ?> /> ※保存後に有効になります。
	</td>
	</tr>
</table>

<h3>実績用カスタムフィールド項目設定</h3>
<p>各実績に掲載する項目表のラベルを任意に追加・設定する事ができます。</p>
<?php if($tip): ?>
<ul>
	<li>項目を追加・削除する場合は「編集」にチェックを入れてください。</li>
	<li>[ スラッグ ] はカスタムフィールド名になります。半角英数字で項目に関連した単語が推奨です。</li>
	<li>[ スラッグ ] の名前で各投稿のデータはデータベースに登録されるので、スラッグを後から変更すると、各投稿で今まで入力した値は表示されなくなります。</li>
	<li>ドラッグ＆ドロップで並び順を変更できます。</li>
	<li>表示名を空白にした項目は表示されません。</li>
</ul>
<?php endif; ?>

<table class="form-table" style="margin-bottom:0px;border:none">
	<tr>
	<th><label for="enable_field_archive" >一覧ページでカスタム項目を表示する</label></th>
	<td><input type="checkbox"     id="enable_field_archive" style="margin-right:10px;" name="options[enable_field_archive]" value="true" <?php echo ($options['enable_field_archive'])? 'checked' : ''; ?> /><label for="enable_field_archive" >カテゴリーページやアーカイブページで表示される各投稿のサムネイル画像の下に、カスタム項目の情報を表示します。</label></td>
	</tr>
</table>

<div id="bw-field-section">
	<div class="bw-field-menu">
		<label><input type="checkbox" class="bv_field_setting_switch" />編集する</label>
		<a id="add_field" href="javascript:add_the_field()" class="button">フィールドを追加する</a>
		<a id="nocheck_field" href="javascript:purge_the_field()" class="button">チェックを外す</a>
	</div>
	<!-- <a id="rst_field" href="javascript:rst_field()">リセット</a> -->
	<ul class="form-list" id="tablelabels">
	</ul>
	<div class="field_notice slu" style="display:none"><span>スラッグ名の重複があります</span></div>
	<div class="field_notice del" style="display:none"><span>削除ボタンが選択されています。一度削除を実行すると復旧できません。</span><br/>
	<label><input type="checkbox" id="agreefielddelete" name="options[aglee][field]" value="true" />了承して削除を実行する</label></div>
</div>

	<h3>実績用カテゴリー分類設定</h3>
	<p>カテゴリー項目を追加します。スラッグを変更した場合、すでに設定してある項目はリセットされます。</p>
	<table class="form-table" id="table-taxonomies">
	<tr>
	<th><label for="enable_archive_cat" >一覧ページでカテゴリーリストを表示する</label></th>
	<td><input type="checkbox" id="enable_archive_cat" style="margin-right:10px;" name="options[enable_archive_cat]" value="true" <?php echo ($options['enable_archive_cat'])? 'checked' : ''; ?> /><label for="enable_archive_cat">カテゴリーページやアーカイブページで表示される各投稿のサムネイル画像の下に、実績の投稿が属するカテゴリーを表示します。</label></td>
	</tr>
	<tr>
	<th><a id="add_taxonomy" href="javascript:add_the_taxonomy()" class="button">カテゴリーを追加する</a></th>
	<td></td>
	</tr>
	</table>
<input type="submit" name="save_menu" id="vbw_save_menu_header" class="button button-primary menu-save" value="保存" style="margin-top:20px;" /> 

<br /><br />
<a href="javascript:togglead()" class="button">高度な設定</a>
<table class="form-table bw-advance">
	<tr>
	<th scope="row"><label>アンインストール時に設定項目を削除しない</label>
	</th>
	<td><input type="checkbox" name="options[keep_the_option]" value="true" <?php if($this->options['keep_the_option']){ echo "checked"; } ?> /></td>
	</tr>
</form>
<?php if($this->mastar_of_config['enable_reset_btn']): ?>
<form method="post" action="">
	<tr><th scope="row">
		<input type="submit" name="save_menu" id="vbw_reset_menu_header" class="button button-primary menu-save" style="margin-left: 20px;background-color: #EE670C;border-color: #CC5D12;" value="設定を初期状態に戻す"  /> 
	</th>
	<td>
	<input type="hidden" id="bizvektorworksunit1" name="biz_vektor_works_unit_form_reset" value="true" />

</form></td>
	</tr>
<?php endif; ?>
</table>
<?php if($tip): ?>
<br /><br />
<!-- [ #sidebar-setting ] -->
<div id="sidebar-setting" class="sectionBox">
	<h3>サイドバーの設定</h3>
	実績紹介コンテンツのサイドバーには、実績のカテゴリーリストや実績の年別アーカイブなどを表示させたいと思いますが、本プラグインを有効化すると、実績用のサイドバーウィジェットエリアが自動的に追加されますので、
	<?php /*<a href="<?php echo admin_url().'/customize.php'; ?>" target="_blank">カスタマイザー</a> か */?>
	<a href="<?php echo admin_url().'/widgets.php'; ?>" target="_blank">ウィジェット</a> から自由に設定ができます。 
	<h4>実績カテゴリー分類をサイドバーに設定する</h4>
	<p>[ BV_カテゴリー／カスタム分類リスト ] ウィジェットをセットして表示させたい実績カテゴリー分類を指定します。</p>
	<h4>実績の年別や月別のアーカイブリストをサイドバーに設定する</h4>
	<p>[ BV_アーカイブリスト ] ウィジェットをセットして表示させたい実績の投稿タイプ名（半角英数字）を指定します。</p>
</div>
<!-- [ /#sidebar-setting ] -->
<!-- [ #sidebar-setting ] -->
<div id="toppage-setting" class="sectionBox">
	<h3>トップページへの実績の表示設定</h3>
	トップページへの実績の表示設定は<a href="<?php echo admin_url().'/widgets.php'; ?>" target="_blank">ウィジェット</a> から行います。<br />
	『コンテンツエリア（トップページ）』のウィジェットエリアに [ BV_トップ用_Works ] ウィジェットをセットして表示させたい件数を指定します。</p>
</div>
<!-- [ /#sidebar-setting ] -->

<?php endif; ?>
</div>