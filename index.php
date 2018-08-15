<?php get_header(); ?>
<?php get_sidebar(); ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/home.css"> 


		<!-- 大图预览窗口 start-->
		<section id="album-index">
			<ul class="album-indexUl">
				<?php
				for($x = 1;$x <= 10;$x++){
					$y = ($x < 10)?('0'.$x):($x);
					$img = 'album'.$y;
					$url = $img.'_url';
					if(of_get($img) != '' && of_get($url) != ''){
						echo 
							'<li>
								<a href="'.of_get($url).'">
									<img src="'.of_get($img).'">
								</a>
							</li>';
					}
				}
				?>
			</ul>
		</section>
		<!-- 大图预览窗口 end-->

		<!-- 首页关于我 start-->
		<section id="about-index" data-time="1500" data-time2="1000" data-type="ease" class="container">
			<h3>关于我</h3>
			<p><?php echo of_get('abstr_index');?></p>
			<div class="aboutPro-wrap">
				<?php
				$ulindex = array('1'=>'6','7'=>'12');
				foreach($ulindex as $k => $v){
					echo '<ul class="about-pro">';
					for($x = $k;$x <= $v;$x++){
						$y = ($x < 10)?('0'.$x):($x);
						$myprop = 'myprop'.$y;
						$myrate = $myprop.'_rate';
						$myTsay = $myprop.'_tsay';
						if(of_get($myprop) != '' && of_get($myrate) != '' && of_get($myTsay) != ''){
							echo 
								'<li>
									<p>'.of_get($myprop).'</p>
									<dl>
										<dt><div></div></dt>
										<dd data-percent = "'.of_get($myrate).'">0%</dd>
									</dl>
									<small>'.of_get($myTsay).'</small>
								</li>';
						}
					}
					echo '</ul>';
				}
				?>
			</div>
		</section>
		<!-- 首页关于我 end -->
		
		
		<!-- 首页文章 start -->
		<section id="artLists-index" class="container">
			<?php include 'includes/list_normal.php'; ?>
			<div class="pagination-wrap">
				<?php
				the_posts_pagination( array(
//					'before_page_number' => '',
//					'after_page_number' => '',
					'mid_size' => 2,
//					'add_fragment' => '#crumbs',
					'prev_text' => '<span class="icon-pagePrev">&#xe6a7;</span>',
					'next_text' => '<span class="icon-pageNext">&#xe6ba;</span>',
					'screen_reader_text' => ' ',
				) );
				?>
			</div>
		</section>
		<!-- 首页文章 end -->
		
		<!--
<?php
if(isset($_POST['submitted'])) {
	$body ='';
	if(trim($_POST['input-name'])) {
		$body .= '<p>联系姓名：'.trim($_POST['input-name']).'</p>';
	}
	if(trim($_POST['input-email'])) {
		$body .= '<p>联系邮箱：'.trim($_POST['input-email']).'</p>';
	}
	if(trim($_POST['input-link'])) {        
		$body .= '<p>相关链接：'.trim($_POST['input-link']).'</p>';
	}
	if(trim($_POST['input-text'])) {
		$body .= '<p>咨询内容：'.trim($_POST['input-text']).'</p>';
	}
	if(isset($body)) {
		$emailTo = get_option('admin_email');
		$name = $_POST['input-name'];
		$sendmail = $_POST['input-email'];       
		$mailsubject = get_bloginfo('name').'：'.$name;
		$subject = '=?UTF-8?B?'.base64_encode($mailsubject).'?=';
		$mailbody = $body;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html; charset=utf-8"/*."\r\n"*/; // 邮件内容为html格式
//		$headers .="Content-Transfer-Encoding: 8bit"."\r\n";
//		$headers .= 'From: '.$name.' <'.$sendmail.'>' . "\r\n" . 'Reply-To: ' . $sendmail;
//		$state = wp_mail($emailTo, $subject, $mailbody, $headers);
		$state = wp_mail($emailTo, $subject ,$mailbody, $headers);
		if($state == true) {
			echo '<script>alert("提交成功");window.location.href="'.get_option('home').'";</script>';
//			wp_die('提交成功，点击<a href="'.get_bloginfo('url').'">返回首页</a>','需求提交成功');
		}else{
//			wp_die('提交失败，点击<a href="'.get_bloginfo('url').'">返回首页</a>','需求提交失败');
			echo '<script>alert("提交失败");window.location.href="'.get_option('home').'";</script>';
		}
	}
}
?>
		-->
		<!-- 首页联系方式 start -->
		<!--
		<section id="contact-index">
			<div class="container">
				<h3>联系我</h3>
				<form action="" method="post">
					<div class="contact-input">
						<label for="input-name"><span class="icon-name">&#xe603;</span><input type="text" name="input-name" id="input-name" placeholder="怎么称呼您" required onkeydown="this.className = this.className.replace(' hasError','');$('.errorTipWrap').innerHTML = ''"></label>
						<label for="input-email"><span class="icon-email">&#xe636;</span><input type="email" name="input-email" id="input-email" placeholder="联系邮箱" required onkeydown="this.className = this.className.replace(' hasError','');$('.errorTipWrap').innerHTML = ''"></label>
						<label for="input-link"><span class="icon-link">&#xe62a;</span><input type="text" name="input-link" id="input-link" placeholder="相关链接" onkeydown="this.className = this.className.replace(' hasError','');$('.errorTipWrap').innerHTML = ''"></label>
					</div>
					<div class="contact-input">
						<label for="input-text"><span class="icon-text">&#xe672;</span><textarea name="input-text" id="input-text" placeholder="想说点什么" required onkeydown="this.className = this.className.replace(' hasError','');$('.errorTipWrap').innerHTML = ''"></textarea></label>
					</div>
					<div class="contact-input">
						<input type="submit" id="submit-cont" class="submit" value="提交" onclick="return commomFun.formCheck(this);">
						<input type="hidden" name="submitted" class="submitted" id="submitted" value="true">
					</div>
					<div class="errorTipWrap"></div>
				</form>
			</div>
		</section>
		-->
		<!-- 首页联系方式 end -->

		<!-- 页脚 start -->
		<footer>
			<p>Copyright © 2016-2017 Wu Xiao Hu. All rights reserved</p>
			<p>Design By: <a href="<?php echo get_option('home'); ?>/">Justin</a> /
				 Powered By:<a href="https://cn.wordpress.org/">WordPress</a>
			</p>
			<p>
				<a href="http://www.miitbeian.gov.cn/" target="_blank">湘ICP备16012981号-1</a><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1260340927'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1260340927%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
			</p>
<!--			<p>传送门：<a href="http://caniuse.com/#home">CIU</a><a href="http://s.tool.chinaz.com/tools/pagecode.aspx">站长工具</a><a href="http://runjs.cn/">RunJS</a><a href="http://tool.oschina.net/">开源中国在线工具</a><a href="https://bitbucket.org">Bitbucket</a></p>-->
		</footer>
		<!-- 页脚 end -->
		<!----- js ------>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/commom.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/albumSlider.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/home.js"></script>
		<script>
			if (publicVar.PC === 1) { // 
				// 定义 albumSlider 盒子
				var indexSlider = new AlbumSlider({
					sele: '#album-index', // 主容器
					autoPlay: true, // 设定自动滚动
					pSpeed: 5000, // play 播放速度
					tSpeed: 800, // transform 动画速度
					contrBtn: true // 导航按钮 显示
				})
			}
		</script>
		<?php wp_footer();?>
	</body>
</html>
