<?php
	$options = get_option('biz_vektor_works_unit', Biz_Vektor_Works_Default::make_default_option());
?>
   <div class="works-wrp">
<?php
		global $wp_query;
		if(!$wp_query->post_count):
?>

	<?php echo $options['post_name_label']; ?>は0件です。

<?php else: ?>
<div class="bv_works_list">
			<?php while ( have_posts() ) : the_post(); ?>
			<?php //$bizvektorworks = get_post_meta( get_the_ID(), "bizvektorworks", true); ?>
<div id="post-<?php the_ID(); ?>" class="bv_works_item">

<div class="worksThumbnail<?php echo (get_post_meta( get_the_ID(), 'bv-works-meta-thumb-position', true) )? ' thumbnailTop' : ''; ?>">
<?php
		$works_image = get_post_meta( get_the_ID(), "bv-works-meta-thumburl", true);

		if(get_post_thumbnail_id()){
			echo '<div class="worksThumbnailInner">';
			echo '<a href="';
			the_permalink();
			echo '">';
			the_post_thumbnail('bizvektor_works_thumb');
			echo '</a>';
		}
		elseif(get_post_meta( get_the_ID(), 'bv-works-meta-enable_after', true )){
			echo '<div class="worksThumbnailInner thumbnail">';
			echo '<img src="'.get_post_meta( get_the_ID(), "bv-works-meta-thumb-afterurl", true).'" class="after" />';
		}
		elseif($works_image){
			?>
			<div class="worksThumbnailInner works_image">
			<a href="<?php the_permalink(); ?>" ><img src="<?php echo $works_image; ?>" /></a>
			<?php 
		}
		else{
			echo '<div class="worksThumbnailInner thumbnail">';
			echo '<a href="';
			the_permalink();
			echo '">';
			echo '<img src="'.plugins_url( '' ).'/biz-vektor-works-unit/images/noimg" alt="Now printing" />';
			echo '</a>';
		}
?>
		</div><!-- .worksThumbnailInner -->
	</div><!-- .worksThumbnail -->

	<div class="worksName">
	  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php edit_post_link(__('Edit', 'biz-vektor'), '<span class="edit-link edit-item"> [ ', ' ]</span>'); ?></h3>
	</div><!-- .worksName -->

	<div class="worksData">
	<table>
	<?php if($options['datefeed_enable']): ?>
		<tr>
		<th><?php echo $options['datefeed_label']; ?></th>
		<td><?php echo get_the_date("Y年n月"); ?></td>
		</tr>
	<?php endif; ?>
	<?php if($options['enable_field_archive']): ?>
		<?php foreach($options['field_order'] as $e): ?>
			<?php if(!isset($options['field_cullum'][$e]['label']) || !$options['field_cullum'][$e]['label'] || !$options['field_cullum'][$e]['slug']){ continue; } ?>
			<tr>
			<th><?php echo $options['field_cullum'][$e]['label']; ?></th>
			<td><?php $bizvektorworks[$e] = get_post_meta(get_the_ID(), $options['field_cullum'][$e]['slug'], true); echo $bizvektorworks[$e]; if(!$bizvektorworks[$e]){echo ' - ';} ?></td>
			</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	<?php if($options['urlfeed_enable']): ?>
		<?php
			$bvw_urlfeed = get_post_meta( get_the_ID(), "bizvektorworks_url", true); 
			$bvw_cuturl = preg_replace('/^(http|https|ftp|ftps|file):\/\/(www\.|)([a-zA-Z0-9-@\.]+)(\/|).*$/', '$2$3' ,$bvw_urlfeed);
			$bvw_urlslag = preg_replace('/^(http|https|ftp|ftps|file):\/\/(www\.|)([a-zA-Z0-9-@\.]+)(\/|)(.{8}|).+$/', '$4$5', $bvw_urlfeed);
			if($bvw_urlslag){ $bvw_cuturl .= $bvw_urlslag . '...'; }
			if($bvw_urlfeed){ $outuputurl = '<td><a href="'.$bvw_urlfeed.'" target="_brank" >'.$bvw_cuturl.'</a></td>'; }
			else{ $outuputurl = '<td> - </td>'; }
		?>
		<tr>
		<th><?php echo $options['urlfeed_label']; ?></th>
	<?php
		echo $outuputurl;
	 endif; ?>
		</tr>

	<?php if($options['enable_archive_cat']): ?>
<?php
		$taxonomys   = $options['taxonomy_list'];
		$taxkeys = array_keys($taxonomys);
		foreach($taxkeys as $s){
			if($taxonomys[$s]['status']!='show'){continue;}
			$taxo_list = get_the_term_list( get_the_ID(), $taxonomys[$s]['slug'], '', ', ', '' );
			if($taxo_list){
				echo '<tr><th class="taxtitle">'.$taxonomys[$s]['label'].'</th><td>';
				echo $taxo_list;
				echo '</td></th>';
			}
		}
?>
	<?php endif; ?>

	</table>
	</div>
</div>
<!-- [ /.worksList ] -->

			<?php endwhile ?>
</div><!-- [ /.bv_works_list ] -->
<?php endif; ?>
</div>