<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php include('includes/seo.php');
		$favicon = of_get('favicon');$app_icon = of_get('app_icon');if(!empty($favicon)){ ?>
		<link rel="icon" type="image/png" href="<?php echo $favicon; ?>">
		<?php } if(!empty($app_icon)){ ?>
		<link rel="icon" sizes="192x192" href="<?php echo $app_icon; ?>">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-title" content="<?php bloginfo('name'); ?>">
		<link rel="apple-touch-icon-precomposed" href="<?php echo $app_icon; ?>">
		<?php } ?>
		<?php wp_head(); echo of_get('headtext');?>
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/style.css"/> -->        
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Cache-Control" content="no-transform"> 
		<meta http-equiv="Cache-Control" content="no-siteapp">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/base.css"> 
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/css/commom.css">
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri();?>/js/html5shiv.min.js"></script>
        <script src="<?php echo get_template_directory_uri();?>/js/respond.min.js"></script>
        <![endif]-->
		<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/base.js"></script>
	</head>
	<body>
		<!-- PC端 头部导航 start -->
		<header>
			<section class="logo">
				<div class="container ver-middle-p">
					<div class="login ver-middle-p pull-right">
						<div class="ver-middle">
							<div class="topRight-icon-wrap login-icon-wrap">
								<span><form method="get" action="<?php bloginfo('home'); ?>"><input id="input-search" name="s" type="search" value="" placeholder=""><button type="submit" id="btn-search"></button></form><span title="搜索" onClick="$('#btn-search').click()" class="icon-search">&#xe6b9;</span></span>
								<span><span id="icon-share" class="icon-share" title="分享">&#xe627;</span></span>
								<span><a href="<?php echo get_option('home'); ?>/wp-admin" class="icon-login" target="_blank" title="登录">&#xe603;</a></span>
							</div>
						</div>
						<div class="ver-middle">
							<div class="topRight-icon-wrap share-icon-wrap">
								<span><a class="icon-QQ" target="_blank" title="分享到QQ空间" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php echo get_option('home'); ?>&title=<?php echo of_get('headtext'); ?>" >&#xe67c;</a></span>
								<span><a class="icon-WX" onclick="commomFun.shareWX(this)" title="分享到微信朋友圈" data-qr="http://qr.liantu.com/api.php?text=<?php echo get_option('home'); ?>" >&#xe604;</a></span>
								<span><a class="icon-XLWB" target="_blank" title="分享到新浪微博" href="http://v.t.sina.com.cn/share/share.php?&url=<?php echo get_option('home'); ?>&title=<?php echo of_get('headtext'); ?>">&#xe610;</a></span>
							</div>
						</div>
					</div>
					<div id="aside-navBtn"><span class="icon-navs">&#xe612;</span></div>
					<div class="ver-middle-p link-home">
						<a class="ver-middle" href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>">
							<?php if(of_get('all_logo') != ''){?>
								<img src="<?php echo of_get('all_logo');?>" />
							<?php }else{?>
								<img src="<?php bloginfo('template_url'); ?>/images/LOGO/LOGO.png"/>
							<?php }?>
						</a></div>
					<span class="header-tips" id="header-tips"><p class="ver-middle"><?php echo of_get('head_text') ?></p></span>
				</div>
				<div id="google_translate_element"></div>
			</section>
			<section class="nav">
				<nav class="container">
					<section class="nav-hover-bg"><div id="nav-hoveBg-div" class="trans-top"></div></section>
					<ul class="nav-list">
						<?php
						if(has_nav_menu('main-menu')) {
							wp_nav_menu(
								array(
									'theme_location'=>'main-menu',
									'menu_id'=>'nav-top',
									'menu_class'=>'navbar-nav',
									'container'=>'ul',
									'items_wrap' => '%3$s',
									'walker' => new wuxiaohu_menu(),
									'depth'=>'0',
									));
							}else{
								echo '<ul class="nav navbar-nav"><li><a href="#">请在后台主题 - 菜单中 创建一个主菜单并勾选导航菜单</a></li></ul>';
						}
						?>
					</ul>
				</nav>
			</section>
		</header>
		<!-- PC端 头部导航 end -->
		
		<!-- 微信分享 start -->
		<section class="modalBg">
			<div class="modalWr-WX">
				<h4 class="modalTi-WX" id="myModalLabel">分享到微信朋友圈</h4>
				<section class="modalCon-WX" id="openWeixin">
					<span></span>
					<p>打开微信,“扫一扫”功能，<br>即可将网页分享至好友/朋友圈。</p>
				</section>
				<div class="modalBtn-WX">
					<button type="button" class="modalCl-WX" onclick="mineFun.closeModal(this)">关闭</button>
				</div>
			</div>
		</section>
		<!--  微信分享 end -->
			
		<!-- 移动端 菜单导航 start -->
		<aside id="aside-navWrap" class="nav">
			<div class="cover-bg"></div>
			<div class="aside-nav">
				<div class="aside-content">
					<div class="search ver-middle-p"><div class="ver-middle"><input type="search" value="" placeholder="输入搜索关键字"><span class="icon-search">&#xe6b9;</span></div></div>
					<div class="login">
						<span class="ver-middle-p"><a class="icon-login ver-middle" target="_blank" title="登录" href="<?php echo get_option('home'); ?>/wp-admin">&#xe603;</a></span>
						<span class="ver-middle-p"><a class="icon-QQ ver-middle" target="_blank" title="分享到QQ空间" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php the_permalink(); ?>&title=<?php the_title(''); ?>" >&#xe67c;</a></span>
						<span class="ver-middle-p"><a class="icon-WX ver-middle" title="分享到微信" onclick="commomFun.shareWX(this)" data-qr="http://qr.liantu.com/api.php?text=<?php the_permalink();?>">&#xe604;</a></span>
						<span class="ver-middle-p"><a class="icon-XLWB ver-middle" target="_blank" title="分享到新浪微博" href="http://v.t.sina.com.cn/share/share.php?&url=<?php the_permalink(); ?>&title=<?php the_title(''); ?>">&#xe610;</a></span>
					</div>
					
					<?php
					if(has_nav_menu('aside-menu')) {
						wp_nav_menu(
							array(
								'theme_location'=>'aside-menu',
								'menu_id'=>'nav-aside',
								'menu_class'=>'navbar-nav',
								'container'=>'ul',
								'walker' => new wuxiaohu_menu(),
								'depth'=>'0',
								));
						}else{
							echo '<ul class="nav navbar-nav"><li><a href="#">请在后台主题 - 菜单中 创建一个主菜单并勾选导航菜单</a></li></ul>';
					}
					?>
				</div>
			</div>
		</aside>
		<!-- 移动端 菜单导航 end -->


		
		