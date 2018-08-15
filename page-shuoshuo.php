<?php
/*
Template Name: 说说页面
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
		<div id="crumbs" class="container"> <a id="cmp-home" href="http://www.wuxiaohu.com"><span class="icon-home"></span></a>&nbsp;&nbsp;/&nbsp;<span class="current">说说</span></div>
			<div class="container artiOuter-wrap">
				<div class="wordsList-wrap">
					<ul class="wordsList" id="wordsList-wrap">
 						<?php
//							query_posts("post_type=shuoshuo&post_status=publish&posts_per_page=-1");
//							if (have_posts()) : while (have_posts()) : the_post(); 
						
							$limit = get_option('posts_per_page');
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							query_posts('post_type=shuoshuo&post_status=publish&showposts=' . $limit=10 . '&paged=' . $paged);
							if (have_posts()) : while (have_posts()) : the_post();
						?>
						
						<li>
							<div class="wordsList-time">
								<bg><?php the_time('Y'); ?></bg>
								<div><?php the_time('m月d日'); ?></div>
								<span><?php the_time('H:i'); ?></span>
							</div>
							<div class="wordsList-more"><?php the_content(); ?></div>
							
<!--							如果不想富媒体说说，单纯地写文字的话，可以把最后一段代码中的<?php the_content(); ?>改成<?php the_title(); ?>，这样以后发表说说只要填写标题就可以了，查找起来也比较方便。如果你用<?php the_content(); ?>，那么你发表说说的时候标题和内容要写成一样，以方便查找，如果你只填写内容，那么你在后台查看说说的时候，显示的列表全是无标题，对于修改比较麻烦-->
							
<!--							<?php the_author() ?>-->
							
						<?php
							endwhile;
							endif;
						s?>
						</li>
					</ul>
					
					
					<div class="pagination-wrap">
						<?php
							the_posts_pagination( array(
//								'before_page_number' => '',
//								'after_page_number' => '',
								'mid_size' => 2,
//								'add_fragment' => '#crumbs',
								'prev_text' => '<span class="icon-pagePrev">&#xe6a7;</span>',
								'next_text' => '<span class="icon-pageNext">&#xe6ba;</span>',
								'screen_reader_text' => ' ',
							) );
						?>
					</div>
					
				</div>
			</div>
<?php get_footer(); ?>