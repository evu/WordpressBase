<?php get_header(); ?>

	<main role="main" class="page-content <?php echo get_post_type(); ?>-single">
	
		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<article class="post">

					<h1><?php the_title(); ?></h1>
					<div class="post-meta">
						<span>Time posted: <?php the_time(); ?></span>
						<span>This post was written by <?php the_author(); ?></span>
					</div>
					<?php the_content(); ?>

				</article>

			<?php endwhile; ?>

		<?php else: ?>

			<?php if($post_type = get_post_type_object( get_query_var('post_type') )): ?>

				<h2>Sorry <?php echo $post_type->labels->singular_name; ?> not found</h2>

			<?php endif; ?>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>