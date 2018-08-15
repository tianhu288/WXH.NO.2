		
		<!-- 侧边滚动fixed定位导航 start -->
		<section id='aside-index'>
			<h4>文章索引</h4>
			<?php
			if(has_nav_menu('aside-index')) {
				wp_nav_menu(
					array(
						'theme_location'=>'aside-index',
						'menu_id'=>'index-aside',
						'menu_class'=>'navbar-nav',
						'container'=>'ul',
						'walker' => new wuxiaohu_menu(),
						'depth'=>'1',
						));
				}else{
					echo '<ul class="nav navbar-nav"><li><a href="#">请在后台主题 - 菜单中 创建一个主菜单并勾选导航菜单</a></li></ul>';
			}
			?>
			<!--<section>
				<a href=""><span class="icon-new">&#xe6d9;</span>最新文章</a>
				<a href=""><span class="icon-hot">&#xe6e0;</span>热门文章</a>
				<a href=""><span class="icon-time">&#xe613;</span>时间索引</a>
				<a href=""><span class="icon-class">&#xe647;</span>分类索引</a>
				<a href=""><span class="icon-tag">&#xe65b;</span>标签索引</a>
			</section>-->
			<div><span class="icon-toTop">&#xe655;</span><i>返回顶部</i></div>
		</section>
		<!-- 侧边滚动fixed定位导航 end --> 