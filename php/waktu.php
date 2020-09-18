<?php
/*
*
*	START check_birthday
*
*/
function check_birthday($birthDate)
{
	$time = strtotime($birthDate);
	if(date('m-d') == date('m-d', $time)) {
	    return "Happy birthday!";
	} else {
		return $birthDate;
	}
	// echo check_birthday('1998-08-11');
}
/*
*
*	END check_birthday
*
*/

/*
*
*	START DAY_LATER
*
*/
if (!function_exists('day_later')) {
	function day_later($timestamp)
	{
		$current = strtotime(date("Y-m-d"));
		 $date    = strtotime($timestamp);

		 $datediff = $date - $current;
		 $difference = floor($datediff/(60*60*24));
		 if($difference==0)
		 {
		    echo 'Hari Ini';
		 }
		 else if($difference > 1)
		 {
		    echo $timestamp;
		 }
		 else if($difference > 0)
		 {
		    echo 'Besok';
		 }
		 else if($difference < -1)
		 {
		    echo 'Lewat';
		 }
		 else
		 {
		    echo 'Kemarin';
		 }  
	}
	// echo day_later('2020-09-19');
}
/*
*
*	END DAY_LATER
*
*/

/*
*
*	START GREETING
*
*/
if (!function_exists('greeting')) {
    function greeting() 
    {
        //mengatur zona waktu
          date_default_timezone_set("Asia/Jakarta");
        //variables 
        $welcome_string="Welcome!"; 
        $numeric_date=date("G"); 
         
        //kondisioal untuk menampilkan ucapan menurut waktu/jam 
        if($numeric_date>=0&&$numeric_date<=11) 
        $welcome_string="Selamat Pagi"; 
        else if($numeric_date>=12&&$numeric_date<=14) 
        $welcome_string="Selamat Siang";
        else if($numeric_date>=15&&$numeric_date<=17) 
        $welcome_string="Selamat Sore"; 
        else if($numeric_date>=18&&$numeric_date<=23) 
        $welcome_string="Selamat Malam"; 
         
        echo "$welcome_string"; 
    }
	// echo greeting();
}
/*
*
*	END GREETING
*
*/

/*
*
*	START GET UNTIL
*
*/
if (!function_exists('get_until')) {
	function get_until($date)
	{
		$now = new DateTime('today');
		$christmas = new DateTime($date);
		 
		while($now > $christmas) {
		    $christmas->add(new DateInterval('P1Y'));
		}
		 
		if($now < $christmas) {
		    $interval = $now->diff($christmas);
		    echo $interval->format('%a days').' until Christmas!';
		}
		 
		if($now == $christmas) {
		    echo 'Merry Christmas :)';
		}
		 
	}
	// echo get_until('2020-12-25');
	//Output : XXX days until Christmas!
}
/*
*
*	END GET UNTIL
*
*/