<?php
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