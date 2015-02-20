<ul class="social-links">
	<?php if( $id = get_field('facebook_id', 'option') ): ?>
		<li class="facebook">
			<a href="http://facebook.com/<?php echo $id; ?>" title="Find us on Facebook"><?php if( wp_style_is( 'font-awesome', 'enqueued' ) ):?><i class="fa fa-facebook"></i><?php else: ?>Find us on Facebook<?php endif; ?></a>
		</li>
	<?php endif; ?>
	<?php if( $id = get_field('twitter_id', 'option') ): ?>
		<li class="twitter">
			<a href="http://twitter.com/<?php echo $id; ?>" title="Find us on Twitter"><?php if( wp_style_is( 'font-awesome', 'enqueued' ) ):?><i class="fa fa-twitter"></i><?php else: ?>Find us on Twitter<?php endif; ?></a>
		</li>
	<?php endif; ?>
	<?php if( $id = get_field('google_plus_id', 'option') ): ?>
		<li class="google">
			<a href="https://plus.google.com/<?php echo $id; ?>/posts" title="Find us on Google+"><?php if( wp_style_is( 'font-awesome', 'enqueued' ) ):?><i class="fa fa-google-plus"></i><?php else: ?>Find us on Google+<?php endif; ?></a>
		</li>
	<?php endif; ?>
	<?php if( $id = get_field('pinterest_id', 'option') ): ?>
		<li class="pinterest">
			<a href="https://uk.pinterest.com/<?php echo $id; ?>" title="Find us on Pinterest"><?php if( wp_style_is( 'font-awesome', 'enqueued' ) ):?><i class="fa fa-pinterest"></i><?php else: ?>Find us on Pinterest<?php endif; ?></a>
		</li>
	<?php endif; ?>
	<li class="rss">
		<a href="/feed/" title="View our feed"><?php if( wp_style_is( 'font-awesome', 'enqueued' ) ):?><i class="fa fa-rss"></i><?php else: ?>View our RSS feed<?php endif; ?></a>
	</li>
	<?php
	//TODO Add other social outlets
	?>
</ul>