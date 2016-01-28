	<div class="works-wrp bv_works_widget">
<?php
		global $wp_query;
		$options = get_option('biz_vektor_works_unit');

?>
<?php /* localHeadはサイドバーで使われた時のために必要 */ ?>
<h2 class="localHead"><?php echo $options['post_name_label']; ?></h2>
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
	  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	</div><!-- .worksName -->

</div><!-- [ /.worksList ] -->
<?php endwhile ?>
</div><!-- [ /.bv_works_list ] -->
</div>