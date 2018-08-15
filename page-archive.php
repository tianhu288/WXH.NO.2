<?php
/*
Template Name: 归档索引
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/pages.css">
			<h4 class="container title-outer">归档索引：<small>共<?php $count_posts = wp_count_posts(); echo $published_posts =$count_posts->publish; ?> 篇文章</small></h4>
			<div class="container cont-page">
				<?php wxh_archives_list(); ?>
			</div>
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/pageFun.js"></script>
