<div class="social-share js-share">
	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" title="Share on Facebook"><span class="icon-facebook"></span></a>
	<a href="https://twitter.com/home?status=<?php the_permalink(); ?> <?php the_title(); ?>" title="Share on Twitter"><span class="icon-twitter"></span></a>
	<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Share on Google plus"><span class="icon-google-plus"></span></a>
	<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=<?php echo get_site_url(); ?>" title="Share on LinkedIn"><span class="icon-linkedin"></span></a>
	<a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" title="Share by email"><span class="icon-linkedin"></span></a>
</div>