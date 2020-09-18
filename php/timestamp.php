<?php
/*
*
*	END getDateTimeDifferenceString (one pkg , THIS GOOD)
*
*/
if (!function_exists('getDateTimeDifferenceString')) {
	function getDateString($date){
	    $dateArray = date_parse_from_format('Y/m/d', $date);
	    $monthName = DateTime::createFromFormat('!m', $dateArray['month'])->format('F');
	    return $dateArray['day'] . " " . $monthName  . " " . $dateArray['year'];
	}

	function getDateTimeDifferenceString($datetime){
	    $currentDateTime = new DateTime(date("Y-m-d H:i:s"));
	    $passedDateTime = new DateTime($datetime);
	    $interval = $currentDateTime->diff($passedDateTime);
	    //$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
	    $day = $interval->format('%a');
	    $hour = $interval->format('%h');
	    $min = $interval->format('%i');
	    $seconds = $interval->format('%s');

	    if($day > 7)
	        return getDateString($datetime);
	    else if($day >= 1 && $day <= 7 ){
	        if($day == 1) return $day . " day ago";
	        return $day . " days ago";
	    }else if($hour >= 1 && $hour <= 24){
	        if($hour == 1) return $hour . " hour ago";
	        return $hour . " hours ago";
	    }else if($min >= 1 && $min <= 60){
	        if($min == 1) return $min . " minute ago";
	        return $min . " minutes ago";
	    }else if($seconds >= 1 && $seconds <= 60){
	        if($seconds == 1) return $seconds . " second ago";
	        return $seconds . " seconds ago";
	    }
	}
	// echo getDateTimeDifferenceString('2020-09-18');
	//OUTPUT : if days than 7, so return date , else return time ago (GOOD ONE)
}
/*
*
*	END getDateTimeDifferenceString
*
*/

/*
*
*	START GETTIMEDIFFRENCE
*
*/
if (!function_exists('getTimeDifference')) {
	function getTimeDifference($time) {
	    //Let's set the current time
	    $currentTime = date('Y-m-d H:i:s');
	    $toTime = strtotime($currentTime);

	    //And the time the notification was set
	    $fromTime = strtotime($time);

	    //Now calc the difference between the two
	    $timeDiff = floor(abs($toTime - $fromTime) / 60);

	    //Now we need find out whether or not the time difference needs to be in
	    //minutes, hours, or days
	    if ($timeDiff < 2) {
	        $timeDiff = "Just now";
	    } elseif ($timeDiff > 2 && $timeDiff < 60) {
	        $timeDiff = floor(abs($timeDiff)) . " minutes ago";
	    } elseif ($timeDiff > 60 && $timeDiff < 120) {
	        $timeDiff = floor(abs($timeDiff / 60)) . " hour ago";
	    } elseif ($timeDiff < 1440) {
	        $timeDiff = floor(abs($timeDiff / 60)) . " hours ago";
	    } elseif ($timeDiff > 1440 && $timeDiff < 2880) {
	        $timeDiff = floor(abs($timeDiff / 1440)) . " day ago";
	    } elseif ($timeDiff > 2880) {
	        $timeDiff = floor(abs($timeDiff / 1440)) . " days ago";
	    }

	    return $timeDiff;
	}
	// echo getTimeDifference('2020-05-17');
	// OUTPUT : 124 days ago
}
/*
*
*	END GETTIMEDIFFRENCE
*
*/

/*
*
*	START TIMEAGO
*
*/
if (!function_exists('timeAgo')) {
	function timeAgo($time_ago)
	{
	    $time_ago = strtotime($time_ago);
	    $cur_time   = time();
	    $time_elapsed   = $cur_time - $time_ago;
	    $seconds    = $time_elapsed ;
	    $minutes    = round($time_elapsed / 60 );
	    $hours      = round($time_elapsed / 3600);
	    $days       = round($time_elapsed / 86400 );
	    $weeks      = round($time_elapsed / 604800);
	    $months     = round($time_elapsed / 2600640 );
	    $years      = round($time_elapsed / 31207680 );
	    // Seconds
	    if($seconds <= 60){
	        return "just now";
	    }
	    //Minutes
	    else if($minutes <=60){
	        if($minutes==1){
	            return "one minute ago";
	        }
	        else{
	            return "$minutes minutes ago";
	        }
	    }
	    //Hours
	    else if($hours <=24){
	        if($hours==1){
	            return "an hour ago";
	        }else{
	            return "$hours hrs ago";
	        }
	    }
	    //Days
	    else if($days <= 7){
	        if($days==1){
	            return "yesterday";
	        }else{
	            return "$days days ago";
	        }
	    }
	    //Weeks
	    else if($weeks <= 4.3){
	        if($weeks==1){
	            return "a week ago";
	        }else{
	            return "$weeks weeks ago";
	        }
	    }
	    //Months
	    else if($months <=12){
	        if($months==1){
	            return "a month ago";
	        }else{
	            return "$months months ago";
	        }
	    }
	    //Years
	    else{
	        if($years==1){
	            return "one year ago";
	        }else{
	            return "$years years ago";
	        }
	    }
	}
	// echo timeAgo('2018-09-17 15:30:00');
}
/*
*
*	END TIMEAGO
*
*/

/*
*
*	START TIME ELAPSED STRING
*
*/
if (!function_exists('time_elapsed_string')) {
	function time_elapsed_string($datetime, $full = false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
	// echo time_elapsed_string('2020-09-18');
}
/*
*
*	END TIME ELAPSED STRING
*
*/
