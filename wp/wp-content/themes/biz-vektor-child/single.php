<?php get_header(); ?>

<!-- [ #container ] -->
<div id="container" class="innerBox">
	<!-- [ #content ] -->
	<div id="content" class="content wide indivlawyer">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<!-- [ #post- ] -->
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1 class="entryPostTitle entry-title">
		<?php the_title(); ?><?php edit_post_link(__('Edit', 'biz-vektor'), ' <span class="edit-link edit-item">[ ', ' ]' ); ?>
	</h1>


	<div class="entry-content post-content">

		<section class="indivInfo tableRow">
			<div class="leftBox">
				<img src="<?php echo get_field('office_image'); ?>" alt="<?php the_title(); ?>" />
				<p class="reward">お祝い金：25,000円</p>
			</div>
			<div class="rightBox">
				<div class="tableRow">
					<div class="schedule leftBox">weekly schedule</div>
					<div class="contactWrap rightBox">
						<p class="telNumber">0120-905-812</p>
						<a href="/contact/" title="まずはフォームで無料相談" class="btn">まずはフォームで無料相談</a>
					</div>
				</div>
				<p class="text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
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
							  <td><a href=""><?php echo get_field('office_url'); ?></a></td>
							</tr>
							<tr>
							  <th>お問い合わせ番号</th>
							  <td><?php echo get_field('offie_contact-number'); ?></td>
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
						<dd>テキストテキストテキストテキストテキストテキストテキストテキストテキスト</dd>
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
				<div class="leftBox"></div>
				<div class="rightBox"></div>
			</div>	
			<h2 class="title">カリキュラム・実習・人材育成などの取り組みに関して</h2>
			<div class="slideWrap">
				<div class="slider"></div>
				<p>てきすとーーーーーーーーーーてきすとーーーーーーーーーーてきすとーーーーーーーーーーてきすとーーーーーーーーーーてきすとーーーーーーーーーーてきすとーーーーーーーーーー</p>
			</div>
		</section>

		<section class="indivContact">
			<a href="/contact/" class="btn" title="まずはフォームで無料相談">まずはフォームで無料相談</a>
			<p class="telNumber">0120-905-812</p>
			<p>お電話でのご相談の際は<span>「ヨツバノハを見た」</span>と言って頂くと<br />正式に移行支援が決定しますと<span>お祝い金 25,000円</span>を支給致します。</p>
		</section>

		<section class="indivText">
			<dl>
				<dt>タイトル</dt>
				<dd>詳細詳細詳細詳細詳細</dd>
			</dl>
			<dl>
				<dt>タイトル</dt>
				<dd>詳細詳細詳細詳細詳細</dd>
			</dl>
			<dl>
				<dt>タイトル</dt>
				<dd>詳細詳細詳細詳細詳細</dd>
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
				<li>
					<img src="" alt=""/>
					<div>
						<p class="name">名前</p>
						<p class="role">担当</p>
						<p class="text">あそsghgんlsjん</p>
					</div>
				</li>
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
			<div class="btn_wrap"><a href="" title="説明会・セミナー一覧" class="btn">説明会・セミナー一覧</a></div>
		</section>

		<section class="indivContact">
			<a href="/contact/" class="btn" title="まずはフォームで無料相談">まずはフォームで無料相談</a>
			<p class="telNumber">0120-905-812</p>
			<p class="text">お電話でのご相談の際は<span>「ヨツバノハを見た」</span>と言って頂くと<br />正式に移行支援が決定しますと<span>お祝い金 25,000円</span>を支給致します。</p>
		</section>


		<div class="textWrap">
			<?php the_content(); ?>
		</div>
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

<?php get_footer(); ?>