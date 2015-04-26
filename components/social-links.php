<ul class="social-links">
	<?php if( $id = get_field('facebook_id', 'option') ): ?>
		<li class="facebook">
			<a target="_blank" href="http://facebook.com/<?php echo $id; ?>/" title="Find us on Facebook"></a>
		</li>
	<?php endif; ?>
	<?php if( $id = get_field('twitter_id', 'option') ): ?>
		<li class="twitter">
			<a target="_blank" href="http://twitter.com/<?php echo $id; ?>/" title="Find us on Twitter"></a>
		</li>
	<?php endif; ?>
	<?php if( $id = get_field('google_plus_id', 'option') ): ?>
		<li class="google">
			<a target="_blank" href="https://plus.google.com/<?php echo $id; ?>/posts/" title="Find us on Google+"></a>
		</li>
	<?php endif; ?>
	<?php if( $id = get_field('pinterest_id', 'option') ): ?>
		<li class="pinterest">
			<a target="_blank" href="https://www.pinterest.com/<?php echo $id; ?>/" title="Find us on Pinterest"></a>
		</li>
	<?php endif; ?>
	<?php if( $id = get_field('linkedin_id', 'option') ): ?>
		<li class="linkedin">
			<a target="_blank" href="https://www.linkedin.com/company/<?php echo $id; ?>/" title="Find us on LinkedIn"></a>
		</li>
	<?php endif; ?>
	<?php if( $id = get_field('instagram_id', 'option') ): ?>
		<li class="instagram">
			<a target="_blank" href="https://instagram.com/<?php echo $id; ?>/" title="Find us on Instagram"></a>
		</li>
	<?php endif; ?>
	<?php if( $id = get_field('youtube_id', 'option') ): ?>
		<li class="youtube">
			<a target="_blank" href="https://www.youtube.com/user/<?php echo $id; ?>/" title="Find us on Youtube"></a>
		</li>
	<?php endif; ?>
	<?php if( $id = get_field('tumblr_id', 'option') ): ?>
		<li class="tumblr">
			<a target="_blank" href="http://<?php echo $id; ?>.tumblr.com/" title="Find us on Tumblr"></a>
		</li>
	<?php endif; ?>
	<li class="rss">
		<a target="_blank" href="<?php echo get_site_url(); ?>/feed/" title="View our feed"></a>
	</li>
</ul>