<style>#postimagediv{display:none;}</style>
<table class="form-table">
<tr>
<th><span class="bv_toggle_after_off" style="display:inline;">Before</span><span class="bv_toggle_after_on" style="display:none;">メイン画像</span></th>
<td>
<div class="bv_uploader">
	<div class="bvw_preview">
		<?php if($works_image){
			print '<img class="bv_worksimage_thumb" src="'.$works_image.'"  /><br/>';
		} ?>
		<a href="javascript:void(0)" style="display:<?php echo ($works_image)? 'inline':'none' ?>;" class="infotown_uploader_remove" >削除</a>
	</div>
	<input type="hidden" name="bizvektorworks[thumbid]" class="bvw_id" value="<?php echo $imgid; ?>" />
	<input type="hidden" name="bizvektorworks[thumb_url]" id="thumb_url" class="bvw_imgurl_fel" value="<?php echo ($works_image)? $works_image:''; ?>" style="width:60%;" />
	<button id="media_thumb_url" class="media_btn">画像追加</button>
</div>
</td>
</tr>
	<tr class="bv_after_area" style="display:none;">
		<th>After</th>
		<td>
<div class="bv_uploader">
	<div class="bvw_preview">
		<?php if($after_image){
			print '<img class="bv_worksimage_thumb" src="'.$after_image.'"  /><br/>';
		} ?>
		<a href="javascript:void(0)" style="display:<?php echo ($after_image)? 'inline':'none' ?>;" class="infotown_uploader_remove" >削除</a>
	</div>
	<input type="hidden" name="bizvektorworks[after_thumbid]" class="bvw_id" value="<?php echo $imgafterid ?>" />
	<input type="hidden" name="bizvektorworks[after_url]" id="after_url" class="bvw_imgurl_fel" value="<?php echo ($after_image)? $after_image:''; ?>" style="width:60%;" />
	<button id="media_after_url" class="media_btn">画像追加</button>
</div>
	</td>
</tr>
<tr>
	<th></th>
	<td>
		<a href="javascript:bv_toggle_after_on()" class="bv_toggle_after_on" style="display:block;">Before-After Mode</a>
		<a href="javascript:bv_toggle_after_off()" class="bv_toggle_after_off" style="display:none;">Normal Mode</a>
		<input type="hidden" name="bizvektorworks[enable_after]" class="bvw_enable_after" value="<?php echo $enable_after ?>"/>
	</td>
</tr>
<tr>
	<th>
		サムネイル画像の表示位置
	</th>
	<td>
		<label><input type="radio" name="bizvektorworks[image_align]" value="nomal" <?php echo (!$thumb_position)? 'checked': ''; ?> />上下中央揃えで表示する</label><br/>
		<label><input type="radio" name="bizvektorworks[image_align]" value="thumbnailTop" <?php echo (!$thumb_position)? '': 'checked'; ?> />上揃えで表示する</label>
		<p>画像が縦長の場合、一覧表示時の表示位置選択してください（Grid Unitを使用している場合はこの設定は無効です）
		</p>
	</td>
</tr>
<?php foreach($this->options['field_order'] as $s){ ?>
<?php if($this->options['field_cullum'][$s]['slug']): ?>
<tr>
	<th><?php echo $this->options['field_cullum'][$s]['label']; ?></th>
	<td>
	<input type="text" id="media_works_<?php echo $s; ?>" name="bizvektorworks[<?php echo $s; ?>]" value="<?php echo get_post_meta(get_the_ID(), $this->options['field_cullum'][$s]['slug'], true); //echo (isset($postmetas[$s]))? $postmetas[$s] : '' ; ?>" />
	</td>
</tr>
<?php endif; ?>
<?php } ?>
<tr <?php if(!$this->options['urlfeed_enable']){ echo 'style="display:none;"'; } ?> >
	<th>URL(<?php echo $this->options['urlfeed_label']; ?>)</th>
	<td><input type="url" name="bizvektorworks_url" value="<?php echo (get_post_meta( get_the_ID(), "bizvektorworks_url", true)); ?>" /></td>
</tr>
<script type="text/javascript">
	jQuery(function($){
		datefield = $("input.bvw_releasedate");
		$(document).ready(function(){
			dater = $("#timestampdiv input#aa").val() + '-' + $("#timestampdiv select#mm").val()+ '-' + $("#timestampdiv input#jj").val();
			datefield.attr('value',dater);
		});
		datefield.change(function(){
			var date = datefield.attr('value');
			if(!date){ date = dater; }
			var set_yyyy = date.substring(0,4);
			var set_mm    = date.substring(5,7);
			var set_dd    = date.substring(8,11);
			$("#timestampdiv input#aa").attr({value:set_yyyy});
			$('#timestampdiv select#mm').val(set_mm);
			$("#timestampdiv input#jj").attr({value:set_dd});
		});
	});
</script>

<tr <?php if(!$this->options['datefeed_enable']){ echo 'style="display:none;"'; } ?> >
<th>公開時期(<?php echo $this->options['datefeed_label']; ?>)</th>
<td><input type="date" class="bvw_releasedate"  name="bvw_releasedate" value="" /></td>
</tr>
</table>
