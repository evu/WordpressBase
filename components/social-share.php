<?php
//Generate a GET friendly URL
$url = preg_replace( '/\?.*/', '', curPageURL() );

//Work out the page title
if( is_home() ){
	$title = get_bloginfo('name');
} elseif( is_404()){
	$title = 'Page not found';
} elseif( is_archive()){
	$title = single_cat_title('', false);
} elseif( is_single() ){
	$title = single_post_title('', false);
} else{
	$title = get_the_title();
}
?>

<ul class="social-share">
	<li>
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" title="Share on Facebook"></a>
	</li>
	<li>
		<a href="https://twitter.com/home?status=<?php echo $url; ?> <?php echo $title; ?>" title="Share on Twitter"></a>
	</li>
	<li>
		<a href="https://plus.google.com/share?url=<?php echo $url; ?>" title="Share on Google plus"></a>
	</li>
	<li>
		<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>&summary=&source="<?php echo get_site_url(); ?> title="Share on LinkedIn"></a>
	</li>
</ul>