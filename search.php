<?php get_header(); ?>
<?php get_sidebar(); ?>
			<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
			<div class="container nothingTips">
				<?php include 'includes/list_normal.php'; ?>
				<!--<div class="text-center"><?php pagination($query_string); ?></div>-->
				<div class="pagination-wrap">
				<?php
					the_posts_pagination( array(
//						'before_page_number' => '',
//						'after_page_number' => '',
						'mid_size' => 2,
//						'add_fragment' => '#crumbs',
						'prev_text' => '<span class="icon-pagePrev">&#xe6a7;</span>',
						'next_text' => '<span class="icon-pageNext">&#xe6ba;</span>',
						'screen_reader_text' => ' ',
					) );
				?>
				</div>
			</div>
<?php get_footer(); ?>