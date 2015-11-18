<?php get_header(); ?>

	<main role="main" class="page-content page-archive">

		<h1><?php echo get_the_title(get_option('page_for_posts')); ?></h1>

		<?php if (is_date()): ?>
			<p>Our posts from <?php echo get_the_date('F, Y'); ?></p>
		<?php elseif (is_category()): ?>
			<p>Our posts from <?php single_cat_title( '', true ); ?></p>
		<?php elseif (is_search()): ?>
			<p>Showing results for <?php echo get_search_query(); ?></p>
		<?php else: ?>
			<p>Keep up to date with the latest in contractor legislation changes</p>
		<?php endif ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article class="post-preview">

				<h2><?php the_title(); ?></h2>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" class="button">View More</a>
				
			</article>

		<?php endwhile; else: ?>

				<h2 class="search-fail">Sorry, we couldn't find anything relating to <strong><?php echo get_search_query(); ?></strong>.</h2>

		<?php endif; ?>

	</main>

	<?php get_pagination(); ?>

<?php get_footer(); ?>
