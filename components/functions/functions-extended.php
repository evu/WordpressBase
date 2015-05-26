<?php/** * Add any data management or wordpress extending funcitons here *///convert date to Twitter style time agofunction date_timeago($time){	$today 		= time();	$createdday = strtotime($time);	$datediff 	= abs($today - $createdday);	$result 	= "";	$years 		= floor($datediff / (365 * 60 * 60 * 24));	$months 	= floor(($datediff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));	$days 		= floor(($datediff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));	$hours 		= floor($datediff / 3600);	$minutes 	= floor($datediff / 60);	$seconds 	= floor($datediff);	//year checker  	if ($result == "") {		if ($years > 1)			$result = $years . " years ago";		elseif ($years == 1)			$result = $years . " year ago";	}	//month checker  	if ($result == "") {		if ($months > 1)			$result = $months . " months ago";		elseif ($months == 1)			$result = $months . " month ago";	}	//month checker  	if ($result == "") {		if ($days > 1)			$result = $days . " days ago";		elseif ($days == 1)			$result = $days . " day ago";	}	//hour checker  	if ($result == "") {		if ($hours > 1)			$result = $hours . " hours ago";		elseif ($hours == 1)			$result = $hours . " hour ago";	}	//minutes checker  	if ($result == "") {		if ($minutes > 1)			$result = $minutes . " minutes ago";		elseif ($minutes == 1)			$result = $minutes . " minute ago";	}	//seconds checker  	if ($result == "") {		if ($seconds > 1)			$result = $seconds . " seconds ago";		elseif ($seconds == 1)			$result = $seconds . " second ago";	}	return $result;}//bank holiday checkerfunction get_bh($day, $month, $year) {    if ($month == 12 && $day == 25)    {        return 1; //Xmas    }    if ($month == 12 && $day == 26)    {        return 1; //Boxing    }    if ($month == 5 && (jddayofweek(cal_to_jd(CAL_GREGORIAN, $month, $day, $year), 0) == 1) && $day <=7) {        return 1;    } //May Day    $c = floor($year/100);    $n = $year-19*floor($year/19);    $k = floor(($c-17)/25);    $i = $c-floor($c/4)-floor(($c-$k)/3)+19*$n+15;    $i = $i-30*floor($i/30);    $i = $i-floor($i/28)*(1-floor($i/28))*floor(29/($i+1))*(floor(21-$n)/11);    $j = $year+floor($year/4)+$i+2-$c+floor($c/4);    $j = $j-7*floor($j/7);    $l = $i-$j;    $m = 3+floor(($l+40)/44);    $d = $l+28-31*floor($m/4);    if ($month == $m && $day == $d + 1) {        return 1; //Easter Monday    }    if ($month == $m && (jddayofweek(cal_to_jd(CAL_GREGORIAN, $month, $day, $year), 0) == 5) && $day <= $d && $day > $d - 7){        return 1; //Good Friday    }    if ($month == 1 && $day == 1 && (jddayofweek(cal_to_jd(CAL_GREGORIAN, $month, $day, $year), 0) != 6) && (jddayofweek(cal_to_jd(CAL_GREGORIAN, $month, $day, $year), 0) != 0)){        return 1; //New Year Day    } elseif ($month == 1 && $day == 2 && (jddayofweek(cal_to_jd(CAL_GREGORIAN, $month, $day, $year), 0) != 0) && (jddayofweek(cal_to_jd(CAL_GREGORIAN, 1, 1, $year), 0) == 0)){        return 1;    } elseif ($month == 1 && $day == 3 && (jddayofweek(cal_to_jd(CAL_GREGORIAN, $month, 2, $year), 0) == 0) && (jddayofweek(cal_to_jd(CAL_GREGORIAN, 1, 1, $year), 0) == 6)){        return 1;    }    if ($month == 5 && (jddayofweek(cal_to_jd(CAL_GREGORIAN, $month, $day, $year), 0) == 1) && $day >= 25)    {        return 1;    }    if ($month == 8 && (jddayofweek(cal_to_jd(CAL_GREGORIAN, $month, $day, $year), 0) == 1) && $day >= 25)    {        return 1;    }    return false;}//Convert string into hyphenated stringfunction escape_id($string){	$string = str_replace(' ', '-', $string);	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);	return $string;}//Get the current page urlfunction curPageURL(){	$pageURL = 'http';	if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {		$pageURL .= "s";	}	$pageURL .= "://";	if ($_SERVER["SERVER_PORT"] != "80") {		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];	} else {		$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];	}	return $pageURL;}//Return the attachment ID of an imagefunction get_attachment_id_from_src ($image_src) {	global $wpdb;	$query 	= "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";	$id 	= $wpdb->get_var($query);	return $id;}//Gets an image thumbnail from attachment IDfunction get_attachment_image_size_from_src( $url, $size = 'large' ){	$image_id 		= get_attachment_id_from_src( $url );	$image_object 	= wp_get_attachment_image_src( $image_id, $size );	return $image_object[0];}//Return clean site urlfunction clean_site_url(){	$permalink = get_site_url();	$find_h = '#^http(s)?://#';	$find_w = '/^www\./';	$replace = '';	$output = preg_replace($find_h, $replace, $permalink);	$output = preg_replace($find_w, $replace, $output);	$output = rtrim($output, "/");	return $output;}//Returns a relative URL without the blog_urlfunction get_stripped_url( $url ){	$stripped_url = str_replace( get_site_url(), '', $url );	if (substr($stripped_url, 0, 1) != '/') {		return '/'.$stripped_url;	}	return $stripped_url;}//Returns a URL formatted for external linking with http:// includedfunction force_url_http( $url ){	if (!preg_match('/^http:\/\/.+/', $url))		$url = 'http://'.$url;	return $url;}//Check if current user has a specific rolefunction is_role( $role ){	if( !is_user_logged_in() )		return false;	$user = wp_get_current_user();	if( !in_array( $role, (array) $user->roles ) )		return false;	return true;}//First function deals with interpreting and formatting single hook, not really meant to be called directly.function dump_hook( $tag, $hook ) {	ksort($hook);	echo "<pre>>>>>>\t$tag<br>";	foreach( $hook as $priority => $functions ) {		echo $priority;		foreach( $functions as $function )			if( $function['function'] != 'list_hook_details' ) {				echo "\t";				if( is_string( $function['function'] ) )					echo $function['function'];				elseif( is_string( $function['function'][0] ) )					echo $function['function'][0] . ' -> ' . $function['function'][1];				elseif( is_object( $function['function'][0] ) )					echo "(object) " . get_class( $function['function'][0] ) . ' -> ' . $function['function'][1];				else					print_r($function);				echo ' (' . $function['accepted_args'] . ') <br>';			}	}	echo '</pre>';}//When called this function will output current state of all hooks in alphabetized order. If passed string as argument it will only list hooks that have that string in name.function list_hooks( $filter = false ){	global $wp_filter;	$hooks = $wp_filter;	ksort( $hooks );	foreach( $hooks as $tag => $hook )		if ( false === $filter || false !== strpos( $tag, $filter ) )			dump_hook($tag, $hook);}//Whenever hook with this function added gets executed it will output details right in place.function list_hook_details( $input = NULL ) {	global $wp_filter;	$tag = current_filter();	if( isset( $wp_filter[$tag] ) )		dump_hook( $tag, $wp_filter[$tag] );	return $input;}//This will list live details on all hooks or specific hook, passed as argument.function list_live_hooks( $hook = false ) {	if ( false === $hook )		$hook = 'all';	add_action( $hook, 'list_hook_details', -1 );}?>