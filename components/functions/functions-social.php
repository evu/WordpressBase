<?php 

if( function_exists('acf_add_options_page') ) {

	acf_add_options_sub_page('Social Feed Settings');

	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => 'social_group_1',
			'title' => 'Twitter Details',
			'fields' => array (
				array (
					'key' => 'twitter_consumer_key',
					'label' => 'Twitter Consumer Key',
					'type' => 'text'
				),
				array (
					'key' => 'twitter_consumer_secret',
					'label' => 'Twitter Consumer Secret',
					'type' => 'text'
				),
				array (
					'key' => 'twitter_access_token',
					'label' => 'Twitter Access Token',
					'type' => 'text'
				),
				array (
					'key' => 'twitter_access_token',
					'label' => 'Twitter Access Token',
					'type' => 'text'
				),
				array (
					'key' => 'twitter_username',
					'label' => 'Twitter Username',
					'type' => 'text'
				)
			),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-social-feed-settings',
					),
				),
			),
		));

		acf_add_local_field_group(array(
			'key' => 'social_group_2',
			'title' => 'Facebook Details',
			'fields' => array (
				array (
					'key' => 'facebook_app_id',
					'label' => 'Facebook App ID',
					'type' => 'text'
				),
				array (
					'key' => 'facebook_app_secret',
					'label' => 'Facebook App Secret',
					'type' => 'text'
				),
				array (
					'key' => 'facebook_profile_id',
					'label' => 'Facebook Profile ID',
					'type' => 'text'
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-social-feed-settings',
					),
				),
			),
		));

		acf_add_local_field_group(array(
			'key' => 'social_group_3',
			'title' => 'Instagram Details',
			'fields' => array (
				array (
					'key' => 'instagram_client_id',
					'label' => 'Instagram Client ID',
					'type' => 'text'
				),
				array (
					'key' => 'instagram_access_token',
					'label' => 'Instagram Access Token',
					'type' => 'text'
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options-social-feed-settings',
					),
				),
			),
		));

	endif;

}




// Our curl fetch function
function fetchUrl($url){

	 $ch = curl_init();
	 curl_setopt($ch, CURLOPT_URL, $url);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 curl_setopt($ch, CURLOPT_TIMEOUT, 20);

	 // Important
	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	 $feedData = curl_exec($ch);
	 curl_close($ch); 

	 return $feedData;

}

function getTweets($last_tweet = null) {

	// API
	$consumer_key = get_field('twitter_consumer_key', 'option');
	$consumer_secret = get_field('twitter_consumer_secret', 'option');
	$access_token = get_field('twitter_access_token', 'option');
	$access_secret = get_field('twitter_access_secret', 'option');
	$screen_name = get_field('twitter_username', 'option');

	// Get CB Class
	require_once (get_template_directory().'/components/libs/codebird/codebird.php');

	\Codebird\Codebird::setConsumerKey( $consumer_key, $consumer_secret ); // static, see 'Using multiple Codebird instances'

	$cb = \Codebird\Codebird::getInstance();
	$cb->setToken( $access_token, $access_secret );

	// Prepare Args
	$tw_args = array(
		'count' => 20,
		'trim_user' => true,
		'screen_name' => $screen_name,
		'exclude_replies' => true
	);

	// If we have a last id, set it
	if (isset($last_tweet)) {
		$tw_args['max_id'] = $last_tweet;
	}

	// new tweet array
	$tweets = array();

	// get raw tweets
	$raw_tweets = (array) $cb->statuses_userTimeline($tw_args);

	// loop through tweets
	for ($i = 0; $i < count($raw_tweets)-1; $i++) { 

		// remove duplicate from max_id...
		if (isset($last_tweet) && $raw_tweets[$i]->id_str == $last_tweet) {
			continue;
		}

		// If we have an image tweet
		if (isset($raw_tweets[$i]->entities->media)) {
		    foreach ($raw_tweets[$i]->entities->media as $media) {
		        $media_url = $media->media_url; // Or $media->media_url_https for the SSL version.
		    }
		} else {
			$media_url = null;
		}

		// Add the ID, image src and link and text to our new tweets array
		$tmp = array(
			'id' => $raw_tweets[$i]->id_str,
			'text' => $raw_tweets[$i]->text,
			'url' => 'https://twitter.com/' . $tw_args['screen_name'] . '/status/' . $raw_tweets[$i]->id_str,
			'src' => $media_url
		);

		array_push($tweets, $tmp);
	}



	// return tweets array
	return $tweets;
}

function getGrams($last_gram = null) {

	$client_id = get_field('instagram_client_id', 'option');
	$token = get_field('instagram_access_token', 'option');

	$json_url  ='https://api.instagram.com/v1/users/'. $client_id . '/media/recent/?access_token='. $token . '&count=10';

	// If we've got a paging var, get next page of posts from api
	if (isset($last_gram)) {
		$json_url .= '&max_id=' . $last_gram;
	}

	// Fetch JSON
	$json_object = fetchUrl($json_url);

	$posts = json_decode($json_object);

	// Set up our return array
	$grams = array();
	
	if( $posts->meta->code == 400 || empty($posts->data) )
		return array();
	
	// For each post grab ID (for paging), image src and link
	foreach ($posts->data as $post) {
		
		$tmp = array(
			'id'  => $post->id,
			'src' => $post->images->standard_resolution->url,
			'url' => $post->link
		);

		array_push($grams, $tmp);
	}

	return $grams;
}

function getFbs($next_page = null) {

	$app_id = get_field('facebook_app_id', 'option');
	$app_secret = get_field('facebook_app_secret', 'option');
	$profile_id = get_field('facebook_profile_id', 'option');

	//Retrieve auth token
	$authToken = fetchUrl("https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$app_id}&client_secret={$app_secret}");

	// If we've got a paging var, we have to load a whole new fetch url
	if (isset($next_page)) {
		$json_url = $next_page;
	} else {
		$json_url = "https://graph.facebook.com/{$profile_id}?fields=posts.limit(10){message,full_picture}&{$authToken}";
	}

	// turn our fetch into JSON
	$json_object = fetchUrl($json_url);

	$posts = json_decode($json_object);

	// Set up our return arrray
	$fbs = array();

	// If we've not got our paging var
	if (!isset($next_page)) {

		// Set up data for looping
		$data = $posts->posts->data;

		// Assing our next page var
		$next_fetch = $posts->posts->paging->next;

	} else {

		// Set up a DIFFERENT data for loop
		$data = $posts->data;

		// assign our next page var
		$next_fetch = $posts->paging->next;

		// Then REMOVE THE PAGING VAR
		unset($data->paging);
	}

	// add our paging var to our return array
	array_push($fbs, array(
		'next' => $next_fetch
	));

	// loop through each post and get image src, link and text
	foreach ( $data as $post ) {

		$tmp = array(
			'src' => (isset($post->full_picture)) ? $post->full_picture : null,
			'url' => 'http://facebook.com/' . $post->id,
			'text' => (isset($post->message)) ? $post->message : null
		);

		array_push($fbs, $tmp);

	}

	return $fbs;
}

function getNews($last_news = null) {

	// Set up our loop queries
	$postArgs = array(
		'post_type' => 'post',
		'posts_per_page' => 10
	);

	// If we have a last id, set it (our paging var)
	if (isset($last_news)) {

		// If we've already sent all posts, just stop everything.
		if ($last_news == 'END') {
			return null;
		}

		// Otherwise, offset our post query
		$postArgs['offset'] = $last_news;
	}

	$posts = get_posts($postArgs);

	// if we have posts
	if (!empty($posts)) {

		// set up our return array
		$postArr = array();

		// Add our paging offset
		array_push($postArr, array('last_news' => count($posts)));

		foreach ($posts as $p) {

			// Get thumbnail src (ACF if used, otherwise WP featured image)
			if (get_field('featured_thumbnail', $p->ID)) {
				
				$image = get_field('featured_thumbnail', $p->ID);
				$img_url = $image['sizes'][ 'large' ];

			} else {

				$thumb_id = get_post_thumbnail_id($p->ID);
				$thumb_url = wp_get_attachment_image_src($thumb_id,'large', true);
				$img_url = $thumb_url[0];
			}
			

			// Add our title, image src and link
			$tmp = array(
				'text' => $p->post_title,
				'url' => get_the_permalink( $p->ID ),
				'src' => $img_url,
				'time' => get_the_time('d M y', $p->ID)
			);

			array_push($postArr, $tmp);
		}

		return $postArr;

	}

}

// Generates social from the above functions, used seperately so we can call it in templates
function gen_social($last_tweet = null, $last_gram = null, $last_news = null, $next_page = null) {


	// if we've got paging vars, set them.
	if (!empty($last_tweet)) {
		$tweets = getTweets($last_tweet);
	} else {
		$tweets = getTweets();
	}

	if (!empty($last_gram)) {
		$grams = getGrams($last_gram);
	} else {
		$grams = getGrams();
	}

	if (!empty($last_news)) {
		$news = getNews($last_news);
	} else {
		$news = getNews();
	}

	if (!empty($next_page)) {
		$fbs = getFbs($next_page);
	} else {
		$fbs = getFbs();
	}

	// return everything and success
	return array(
		'success' => true, 
		'tweets' => $tweets,
		'grams' => $grams,
		'news' => $news,
		'fbs' => $fbs
	);

}

function load_social() {
	if( !check_ajax_referer( 'load-social-ajax-nonce', 'security', false ) ){
		wp_send_json(array('success' => false));
	}

	// run our social generater and add paging vars if we have them.
	$social = gen_social(
		sanitize_text_field($_POST['last_tweet']),
		sanitize_text_field($_POST['last_gram']),
		sanitize_text_field($_POST['last_news']),
		sanitize_text_field($_POST['next_page'])
	);

	// Send it back via ajax.
	wp_send_json($social);
}

add_action('wp_ajax_load_social', 			'load_social'); // for logged in user
add_action('wp_ajax_nopriv_load_social', 	'load_social'); // if user not logged in