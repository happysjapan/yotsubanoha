<?php
		//$bizvektorworks = get_post_meta( get_the_ID(), "bizvektorworks", true);
		global $post;
?>
	<div class="bizvektorworksunit">
	<h1 class="entryPostTitle"><?php the_title(); ?><?php edit_post_link(__('Edit', 'biz-vektor'), ' <span class="edit-link edit-item">[ ', ' ]' ); ?></h1>
	<!-- .entry-meta -->
	<div class="entry-content post-content">

	<?php if(get_post_meta( get_the_ID(), 'bv-works-meta-enable_after', true ) && get_post_meta( get_the_ID(), 'bv-works-meta-enable_after', true )): ?>

	<div id="worksMainImage" class="b-f">
		<div id="worksBefore">
			<h5>BEFORE</h5>
			<img src="<?php echo get_post_meta( get_the_ID(), "bv-works-meta-thumburl", true) ; ?>" class="before" />
		</div>
		<div id="worksAfter">
			<h5>AFTER</h5>
			<img src="<?php echo get_post_meta( get_the_ID(), "bv-works-meta-thumb-afterurl", true) ; ?>" class="after" />
		</div>
	</div>

	<?php elseif(get_post_meta( get_the_ID(), "bv-works-meta-thumburl", true)): ?>
	<div id="worksMainImage" class="no_b-f">
		<img src="<?php echo get_post_meta( get_the_ID(), "bv-works-meta-thumburl", true) ; ?>" />
	</div>
	<?php else: ?>
		<div class="worksMainImage worksThumbnailInner no-image">
		<div class="noimage" ><span>Now printing</span></div>
		</div>
	<?php endif; ?>

		<?php if($this->options['editor-order'] != 'bottom'){ the_content(); } ?>

		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>

	<div class="worksData">
	<table>
	 <?php if($this->options['datefeed_enable']): ?>
		<tr>
		<th><?php echo $this->options['datefeed_label']; ?></th>
		<td><?php echo get_the_date("Y年n月"); ?></td>
		</tr>
	<?php endif; ?>
	<?php foreach($this->options['field_order'] as $e): ?>
		<?php if(!isset($this->options['field_cullum'][$e]['label']) || !$this->options['field_cullum'][$e]['label'] || !$this->options['field_cullum'][$e]['slug']){ continue; } ?>
		<tr>
			<th><?php echo $this->options['field_cullum'][$e]['label']; ?></th>
			<td><?php $bizvektorworks[$e] = get_post_meta(get_the_ID(), $this->options['field_cullum'][$e]['slug'], true); echo ($bizvektorworks[$e])? $bizvektorworks[$e] : ' - '; ?></td>
		</tr>
	<?php endforeach; ?>
	<?php if($this->options['urlfeed_enable']):
			$bvw_urlfeed = get_post_meta( get_the_ID(), "bizvektorworks_url", true);
	if($bvw_urlfeed):
	?>
		<tr>
		<th><?php echo $this->options['urlfeed_label']; ?></th>
	<?php
			$bvw_urlfeed = get_post_meta( get_the_ID(), "bizvektorworks_url", true); 
			$bvw_cuturl = preg_replace('/^(http|https|ftp|ftps|file):\/\/(www\.|)([a-zA-Z0-9-@\.]+)(\/|).*$/', '$1://$2$3' ,$bvw_urlfeed);
			$bvw_urlslag = preg_replace('/^(http|https|ftp|ftps|file):\/\/(www\.|)([a-zA-Z0-9-@\.]+)(\/|)(.{24}|).+$/', '$4$5', $bvw_urlfeed);
			if($bvw_urlslag){ $bvw_cuturl .= $bvw_urlslag . '...'; }
			if($bvw_urlfeed){ $outuputurl = '<td><a href="'.$bvw_urlfeed.'" target="_brank" >'.$bvw_cuturl.'</a></td>'; }
			else{ $outuputurl = '<td> - </td>'; }

			echo $outuputurl;
	?>
		</tr>
	<?php
	endif;
	endif;
	?>
<?php
		$taxonomys   = $this->options['taxonomy_list'];
		foreach($taxonomys as $tax){
			if($tax['status']!='show'){continue;}
			$taxo_list = get_the_term_list( $post->ID, $tax['slug'], '', ', ', '' );
			if($taxo_list){
				echo '<tr><th class="taxtitle">'.$tax['label'].'</th><td>';
				echo $taxo_list;
				echo '</td></tr>';
			}
		}
?>
 </table></div>
	<?php if($this->options['editor-order'] == 'bottom'){ the_content(); } ?>
	<div class="entry-utility">
			<?php
				$tags_list = get_the_tag_list( '', ', ' );
				print_r($tags_list);
				if ( $tags_list ):
			?>
			<dl class="tag-links">
			<?php printf( __('<th>Tags</th><td>%1$s</td>', 'biz-vektor'), $tags_list ); ?>
			</dl>
			<?php endif; ?>
	</div><!-- .entry-utility -->
</div><!-- .entry-content -->
<?php edit_post_link(__('Edit', 'biz-vektor'),'<div class="adminEdit"><span class="linkBtn linkBtnS linkBtnAdmin">','</span></div>'); ?>
<?php biz_vektor_snsBtns(); ?>
<div id="nav-below" class="navigation">
	<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ); ?></div>
	<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ); ?></div>
</div><!-- #nav-below -->
</div>