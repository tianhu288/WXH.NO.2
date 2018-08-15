<?php
/*
Template Name: 标签索引
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/pages.css">
			<h4 class="container title-outer">
				标签索引： <?php echo $count_tags = wp_count_terms('post_tag'); ?> 个
				<em>&nbsp;&nbsp;&nbsp;</em>
				<span title="刷新排序" class="icon-refresh">&#xe624;</span>
			</h4>
			<div class="container cont-page">
				<div class="page-tags-cloud">
					<?php $args = array(
					'smallest'  => .625, 
					'largest'   => 1.2,
					'unit'      => 'rem', 
					'number'    => '',  
					'format'    => 'flat',
					'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
					'orderby'   => 'name', 
					'order'     => 'ASC',
					'exclude'   => '', 
					'include'   => '', 
					'link'      => 'view', 
					'taxonomy'  => 'post_tag', 
					'echo'      => true );
					wp_tag_cloud( $args ); ?>
				</div>
			</div>
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/tagsCloud.js"></script>