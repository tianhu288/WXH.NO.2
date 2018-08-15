<?php
/*
Template Name: 分类索引
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/pages.css">
				<h4 class="container title-outer">分类索引： 共 <?php echo $count_categories = wp_count_terms('category'); ?> 个分类</h4>
				<?php
				global $cat;
				$cats = get_categories(array(
//					'child_of' => $cat,
					'parent' => $cat,
					'hide_empty' => true
				));
				$c = get_category($cat);
				if(empty($cats)){
				?>
				<div class="container cont-page">
					<p>[<a id="all_change" href="#">点击展开全部</a>] <em></em></p>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="post">
						<h2><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php the_excerpt(); ?></p>
						<p><a href="<?php the_permalink(); ?>">全文阅读>></a></p>
						<div class="meta"><?php the_time('Y-m-d'); ?> | 标签: <?php the_tags('', ' , ', ''); ?></div>
					</div>
				<?php endwhile; ?>
				<?php else: ?>
					<div class="post"><p>文章稍后更新</p></div>
				<?php endif; ?>
				</div>
				<div class="container cont-page">
					<span class="alignleft"><?php next_posts_link('&laquo; Older posts') ?></span>
					<span class="alignright"><?php previous_posts_link('Newer posts &raquo;') ?></span>
				</div>
				<?php
				}else{
					echo '
						<div class="container cont-page">
							<div id="all-change">[<a href="javascript:;" onclick="allChange()">折叠全部</a>] <em></em></div>';
					foreach($cats as $the_cat){
						$posts = get_posts(array(
							'category' => $the_cat->cat_ID,
							'numberposts' => 0,
						));
						if(!empty($posts)){
							if(!$the_cat->category_parent){ // 如果是父分类
								echo '
								<div class="page-list-wrap">
									<h4 class="year-title" title="">
										<span class="icon-class">&#xe647;</span>'.$the_cat->name.'
										<small>
											<span class="artiNum">(00)</span>&nbsp;&nbsp;
											<a target="_blank" title="'.$the_cat->name.'" href="'.get_category_link($the_cat).'">查看所有</a>
										</small>
										<span class="icon-listCtr open active" onclick="listChange(this)">&#xe607;</span>
										<span class="icon-listCtr close" onclick="listChange(this)">&#xe6d7;</span>
									</h4>
									<ul class="year-list-ul active">';
										$child_terms = get_terms('category', array('child_of' => $the_cat->cat_ID));  // 子分类
										if(!empty($child_terms)){													// 如果子分类不为空
											foreach($child_terms as $child_term){
												$child_posts = get_posts(array(
													'category' => $child_term -> term_id,
													'numberposts' => 0,
												));
												echo '
												<li>
													<div class="month-title" title="">
														<span class="icon-month">&#xe647;</span>'.$child_term->name.'
														<small>
															<span class="artiNum">(00)</span>&nbsp;&nbsp;
															<a target="_blank" title="'.$child_term->name.'" href="'.get_category_link($child_term).'">查看所有</a>
														</small>
													</div>
													<ul class="month-list-ul">';
														foreach($child_posts as $child_post){
															echo '
															<li class="month-list-li">
																'.mysql2date('Y-m-d', $child_post->post_date).'：&nbsp;
																<a target="_blank" title="'.$child_posts->post_title.'" href="'.get_permalink($child_post->ID).'">'.$child_post->post_title.'</a>
																<small>(&nbsp;<a href="'.get_permalink($child_post->ID).'#comments-wrap"><span class="icon-discuss">&#xe64d;</span>'.get_comments_number('0', '1', '%').'</a>&nbsp;)</small>
															</li>';
														}
													echo '</ul>';
												echo '</li>';
											}
										}
										else {
											echo '
											<li>
												<div class="month-title" title="">
													<span class="icon-all">&#xe6ab;</span>所有
													<small>
														<span class="artiNum">(00)</span>&nbsp;&nbsp;
														<a target="_blank" title="'.$the_cat->name.'" href="'.get_category_link($the_cat).'">查看所有</a>
													</small>
												</div>
												<ul class="month-list-ul">';
											foreach($posts as $post){
													echo '
													<li class="month-list-li">'.mysql2date('Y-m-d', $post->post_date).'：&nbsp;
														<a title="'.$post->post_title.'" href="'.get_permalink($post->ID).'">'.$post->post_title.'</a>
														<small>(&nbsp;<span class="icon-discuss">&#xe64d;</span><a href="'.get_permalink($post->ID).'#comments-wrap">'. get_comments_number('0', '1', '%') .'</a>&nbsp;)</small>
													</li>';
											}
											echo '</ul>';
										echo '</li>';
										}
									echo '</ul>';
								echo '</div>';
							}
						}
					}
				echo '</div>';
				}
				?>
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/pageFun.js"></script>
