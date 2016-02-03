<?php get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">
	<!-- [ #content ] -->
	<div id="content" class="content">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<!-- [ #post- ] -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1 class="entryPostTitle entry-title"><?php the_title(); ?><?php edit_post_link(__('Edit', 'biz-vektor'), ' <span class="edit-link edit-item">[ ', ' ]' ); ?></h1>


	<div class="entry-content post-content">
		<img src="" alt="" />

		<h2>開催情報</h2>
		<table>
			<tbody>
				<tr>
				  <th>日時</th>
				  <td><?php the_date(); ?></td>
				</tr>
				<tr>
				  <th>場所</th>
				  <td>東京芸術センター 会義室5</td>
				</tr>
				<tr>
				  <th>参加費</th>
				  <td>無料</td>
				</tr>
				<tr>
				  <th>アクセス</th>
				  <td>JR常磐線「北千住」駅北口より徒歩7分</td>
				</tr>
			</tbody>
		</table>
		<div class="textWrap">
			<?php the_content(); ?>
		</div>
		<div class="btnWrap">
			<a class="btnLightGreen" title="電話でのお問い合わせ">電話でのお問い合わせ</a>
			<a class="btnBlue" title="フォームでのお申し込み">フォームでのお申し込み</a>
		</div>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . 'Pages:', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

<?php edit_post_link(__('Edit', 'biz-vektor'),'<div class="adminEdit"><span class="linkBtn linkBtnS linkBtnAdmin">','</span></div>'); ?>

<?php do_action('biz_vektor_snsBtns'); ?>

</div>
<!-- [ /#post- ] -->

<div id="nav-below" class="navigation">
	<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ); ?></div>
	<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ); ?></div>
</div><!-- #nav-below -->

<?php do_action('biz_vektor_fbComments'); ?>

<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

<?php do_action('biz_vektor_fbLikeBoxDisplay'); ?>

</div>
<!-- [ /#content ] -->

<!-- [ #sideTower ] -->
<div id="sideTower" class="sideTower">
	<?php get_sidebar('info'); ?>
</div>
<!-- [ /#sideTower ] -->
<?php biz_vektor_sideTower_after();?>
</div>
<!-- [ /#container ] -->

<?php get_footer(); ?>