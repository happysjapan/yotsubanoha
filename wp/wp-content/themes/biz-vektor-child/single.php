<?php get_header();

$current_category = get_the_category();
if( $current_category[0]->term_id == 2 ){
	$current_category_id = $current_category[1]->term_id;
} else { $current_category_id = $current_category[0]->term_id; }

$args = array(
	'posts_per_page'   => -1,
	'category'         => $current_category_id,
	'exclude'						=> get_the_id(),
	'post_type'        => 'post',
);
$lawyer_by_category = get_posts( $args );
?>

<!-- Copy this where you want ! -->

<!-- [ #lawyer-slider ] -->
<section class="lawyer-slider">
	<h4 class="lawyer-slider--title">Lawyers slider</h4>
	<?php foreach ($lawyer_by_category as $lawyer) {
		setup_postdata( $lawyer ); ?>

		<article class="lawyer-slide">
			<h5 class="lawyer-slide--title"><?php the_title(); ?></h5>
		</article>
		
	<?php } wp_reset_postdata(); ?>
</section>
<!-- [ #lawyer-slider ] -->

<script src="/js/jquery.bxslider.js"></script>

<!-- [ #container ] -->
<div id="container" class="innerBox">
	<!-- [ #content ] -->
	<div id="content" class="content wide indivlawyer">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="social--holder">
		<ul class="social--list">
			<li class="google social--listitem">
				<!-- Placez cette balise où vous souhaitez faire apparaître le gadget Bouton +1. -->
				<div class="g-plusone" data-annotation="none"></div>

				<!-- Placez cette ballise après la dernière balise Bouton +1. -->
				<script type="text/javascript">
				  window.___gcfg = {lang: 'fr'};

				  (function() {
				    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				    po.src = 'https://apis.google.com/js/platform.js';
				    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
			</li>
			<li class="facebook social--listitem">
				<div class="fb-like"
					data-href="<?php the_permalink(); ?>"
					data-layout="standard"
					data-action="like"
					data-show-faces="true">
				</div>
			</li>
			<li class="twitter social--listitem">
				<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</li>
			<li class="bookmark social--listitem">
				<a id="bookmarkme" href="<?php the_permalink(); ?>" rel="sidebar" title="bookmark this page">Bookmark</a>
				<script type="text/javascript">
				    $(function() {
				        $('#bookmarkme').click(function() {
				            if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox Bookmark
				                window.sidebar.addPanel(document.title,window.location.href,'');
				            } else if(window.external && ('AddFavorite' in window.external)) { // IE Favorite
				                window.external.AddFavorite(location.href,document.title);
				            } else if(window.opera && window.print) { // Opera Hotlist
				                this.title=document.title;
				                return true;
				            } else { // webkit - safari/chrome
				                alert('Press ' + (navigator.userAgent.toLowerCase().indexOf('mac') != - 1 ? 'Command/Cmd' : 'CTRL') + ' + D to bookmark this page.');
				            }
				        });
				    });
				</script>
			</li>
			<li class="line social--listitem">
				<span>
				<script type="text/javascript" src="//media.line.me/js/line-button.js?v=20140411" ></script>
				<script type="text/javascript">
				new media_line_me.LineButton({"pc":false,"lang":"en","type":"a"});
				</script>
				</span>
				<a href="http://line.me/R/msg/text/?LINE%20it%21%0d%0ahttp%3a%2f%2fline%2enaver%2ejp%2f"><img src="[URL of Button image]" width="[width of Button]" height="[height of Button]" alt="LINE it!" /></a>
			</li>
		</ul>
	</div>

<!-- [ #post- ] -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1 class="entryPostTitle entry-title">
		<?php the_title(); ?><?php edit_post_link(__('Edit', 'biz-vektor'), ' <span class="edit-link edit-item">[ ', ' ]' ); ?>
	</h1>

	<div class="entry-content post-content">

		<section class="indivInfo tableRow">
			<div class="leftBox">
				<img src="<?php echo get_field('office_image'); ?>" alt="<?php the_title(); ?>" />
				<p class="reward">お祝い金：<?php echo get_field('reward'); ?>円</p>
			</div>
			<div class="rightBox">
				<div class="tableRow">
					<div class="schedule leftBox">
						<table>
							<tr>
								<th>受付時間</th>
								<th>月</th>
								<th>火</th>
								<th>水</th>
								<th>木</th>
								<th>金</th>
								<th>土</th>
								<th>日</th>
								<th>祝</th>
							</tr>
							<?php
									while(have_rows('office_time_table')): the_row();
								?>
							<tr>
								<td><?php the_sub_field('office_time'); ?></td>
								<td><?php the_sub_field('office_time_mon'); ?></td>
								<td><?php the_sub_field('office_time_tue'); ?></td>
								<td><?php the_sub_field('office_time_wed'); ?></td>
								<td><?php the_sub_field('office_time_thu'); ?></td>
								<td><?php the_sub_field('office_time_fri'); ?></td>
								<td><?php the_sub_field('office_time_sat'); ?></td>
								<td><?php the_sub_field('office_time_sun'); ?></td>
								<td><?php the_sub_field('office_time_holi'); ?></td>
							</tr>
							<?php endwhile; ?>
						</table>
					</div>
					<div class="contactWrap rightBox">
						<p class="telNumber">0120-905-812</p>
						<a href="/contact/" title="まずはフォームで無料相談" class="btn">まずはフォームで無料相談</a>
					</div>
				</div>
				<p class="text"><?php echo get_field('office_introduction'); ?></p>
			</div>
		</section>

		<section class="indivProfile">
			<h2 class="title">■&nbsp;事務所紹介</h2>
			<div class="tableRow">
				<div class="leftBox">
					<table>
						<tbody>
							<tr>
							  <th>事務所名</th>
							  <td><?php the_title(); ?></td>
							</tr>
							<tr>
							  <th>代表者名</th>
							  <td><?php echo get_field('office_leader'); ?></td>
							</tr>
							<tr>
							  <th>利用定員</th>
							  <td><?php echo get_field('office_capacity'); ?></td>
							</tr>
							<tr>
							  <th>プログラム<br />提供時間</th>
							  <td><?php echo get_field('office_time'); ?></td>
							</tr>
							<tr>
							  <th>定休日</th>
							  <td><?php echo get_field('office_dayoff'); ?></td>
							</tr>
							<tr>
							  <th>アクセス</th>
							  <td><?php echo get_field('office_access'); ?></td>
							</tr>
							<tr>
							  <th>住所</th>
							  <td><?php echo get_field('office_address'); ?></td>
							</tr>
							<tr>
							  <th>ホームページ</th>
							  <td><a href="<?php echo get_field('office_url'); ?>" title="<?php the_title(); ?>"><?php echo get_field('office_url'); ?></a></td>
							</tr>
							<tr>
							  <th>お問い合わせ番号</th>
							  <td><?php echo get_field('office_contact-number'); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="rightBox">
					<div class="rewardWrap">
						<p>お祝い金 25,000円支給</p>
						<a href="" title="" class="btn">お祝い金とは？</a>
					</div>
					<div class="googleMap">

					</div>
					<dl class="comment">
						<dt>事務所から皆様へコメント</dt>
						<dd><?php echo get_field('office_comment'); ?></dd>
					</dl>
				</div>
			</div>
		</section>

		<section class="indivContact">
			<a href="/contact/" class="btn" title="まずはフォームで無料相談">まずはフォームで無料相談</a>
			<p class="telNumber">0120-905-812</p>
			<p class="text">お電話でのご相談の際は<span>「ヨツバノハを見た」</span>と言って頂くと<br />正式に移行支援が決定しますと<span>お祝い金 25,000円</span>を支給致します。</p>
		</section>

		<section class="indivSlider">
			<h2 class="title">事務所紹介画像・紹介動画</h2>
			<div class="tableRow">
				<div class="leftBox">
					<?php echo get_field('office_image_slider1'); ?>
				</div>
				<div class="rightBox">
					<?php echo get_field('office_image_slider2'); ?>
				</div>
			</div>
			<h2 class="title">カリキュラム・実習・人材育成などの取り組みに関して</h2>
			<div class="slideWrap">
				<div class="slider">
					<?php echo get_field('office_image_slider3'); ?>
				</div>
				<p><?php echo get_field('office_description'); ?></p>
			</div>
		</section>

		<section class="indivContact">
			<a href="/contact/" class="btn" title="まずはフォームで無料相談">まずはフォームで無料相談</a>
			<p class="telNumber">0120-905-812</p>
			<p>お電話でのご相談の際は<span>「ヨツバノハを見た」</span>と言って頂くと<br />正式に移行支援が決定しますと<span>お祝い金 25,000円</span>を支給致します。</p>
		</section>

		<section class="indivText">
			<dl>
				<dt><?php echo get_field('office_title1'); ?></dt>
				<dd><?php echo get_field('office_description1'); ?></dd>
			</dl>
			<dl>
				<dt><?php echo get_field('office_title2'); ?></dt>
				<dd><?php echo get_field('office_description2'); ?></dd>
			</dl>
			<dl>
				<dt><?php echo get_field('office_title3'); ?></dt>
				<dd><?php echo get_field('office_description3'); ?></dd>
			</dl>
		</section>

		<section class="indivContact">
			<a href="/contact/" class="btn" title="まずはフォームで無料相談">まずはフォームで無料相談</a>
			<p class="telNumber">0120-905-812</p>
			<p class="text">お電話でのご相談の際は<span>「ヨツバノハを見た」</span>と言って頂くと<br />正式に移行支援が決定しますと<span>お祝い金 25,000円</span>を支給致します。</p>
		</section>

		<section class="indivStaff">
			<h2 class="title">スタッフ紹介</h2>
			<ul>
				<?php
						while(have_rows('office_staff_introduction')): the_row();
					?>
				<li>
					<img src="<?php the_sub_field('office_staff_image'); ?>" alt="<?php the_sub_field('office_staff_name'); ?>"/>
					<div>
						<p class="name"><?php the_sub_field('office_staff_name'); ?></p>
						<p class="role"><?php the_sub_field('office_staff_role'); ?></p>
						<p class="text"><?php the_sub_field('office_staff_text'); ?></p>
					</div>
				</li>
				<?php endwhile; ?>
			</ul>
		</section>

		<section class="indivAroundLawyer">
			<h2 class="title">周辺の終了移行支援事業所一覧</h2>
			<div class="slideWrap">
				<ul>
					<li>
						<p class="title">タイトル</p>
						<p>東京都台東区</p>
						<p>お祝い金: 25,000円</p>
						<img src="" alt="" />
						<a href="" title="" class="btn">詳細</a>
					</li>
				</ul>
			</div>
		</section>

		<section class="indivSeminar">
			<h2 class="title">説明会・セミナー一覧</h2>
			<p>てきsつおおおお</p>
			<p class="note">まずは、働くことに関する不安などの就職相談等も承ります。お気軽にご連絡ください。</p>
			<div class="btn_wrap"><a href="/info/" title="説明会・セミナー一覧" class="btn">説明会・セミナー一覧</a></div>
		</section>

		<section class="indivContact">
			<a href="/contact/" class="btn" title="まずはフォームで無料相談">まずはフォームで無料相談</a>
			<p class="telNumber">0120-905-812</p>
			<p class="text">お電話でのご相談の際は<span>「ヨツバノハを見た」</span>と言って頂くと<br />正式に移行支援が決定しますと<span>お祝い金 25,000円</span>を支給致します。</p>
		</section>

		<div class="btnWrap">
			<a href="tel:0120-697-182" onclick="ga('send', 'event', '電話リンク', 'タップ', '一覧ボタン');" class="btnLightGreen" title="電話でのお問い合わせ">電話でのお問い合わせ</a>
			<a href="/contact/" class="btnBlue" title="フォームでのお申し込み">フォームでのお申し込み</a>
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

</div>
<!-- [ /#container ] -->

	<script>
	$(document).ready(function(){
		// $('.infoBottomSlider').bxSlider({
		// 	pagerCustom: '#infoBottom_pager',
		// 	responsive: true
		// });


		var settings = function() {
			var setting1 = {
				minSlides: 1,
				maxSlides: 1,
				moveSlides: 1,
				slideWidth: 245,
				responsive: true,
				pager: false
			};
			var setting2 = {
				minSlides: 3,
				maxSlides: 3,
				moveSlides: 3,
				slideWidth: 245,
				slideMargin: 50,
				responsive: true,
				pager: false
			};
			return ($(window).width()<740) ? setting1 : setting2;
		}
		var mySlider;
		function tourLandingScript(){
			mySlider.reloadSlider(settings());
		}

		mySlider = $('.areaSlider').bxSlider(settings());
		$(window).resize(tourLandingScript);
	});

	</script>

<?php get_footer(); ?>
