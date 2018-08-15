<?php
/*
Template Name: 最新文章
*/
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
	
		<section class="page-list-wrap container">
			<?php
				$limit = get_option('posts_per_page');
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				query_posts('showposts=' . $limit = 7 . '&paged=' . $paged);
				$wp_query->is_archive = true; $wp_query->is_home = false;
			?>
			<?php while(have_posts()) : the_post(); if(!($first_post == $post->ID)) : ?>
			<ul>
				<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
				<?php the_title(); ?></a></li>
			</ul>
			<?php endif; endwhile; ?>
		</section>

<?php get_footer(); ?>