<?php get_header(); ?>

	<main role="main" class="page-content post-single">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article class="post">

				<h1><?php the_title(); ?></h1>

				<div class="post-meta">
					<span class="post-meta__date">Date: <?php the_time('F, m Y'); ?></span>
					<span class="post-meta__author">By <?php the_author(); ?></span>
				</div>

				<?php the_content(); ?>

			</article>

		<?php endwhile; endif; ?>

	</main>

<?php get_footer(); ?>