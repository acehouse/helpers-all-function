<?php

if (!function_exists('obfuscate_email')) {
    function obfuscate_email($email)
    {
        $em   = explode("@",$email);
        $name = implode('@', array_slice($em, 0, count($em)-1));
        $len  = floor(strlen($name)/2);

        return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);   
    }
	//echo obfuscate_email('mahendrariki02@gmail.com');
	//OUTPUT : mahendr*******@gmail.com
}
//end obfuscate_email
// 
// code below good for big email domain (one function)
if (!function_exists('mask')) {
    function mask($str, $first, $last) {
        $len = strlen($str);
        $toShow = $first + $last;
        return substr($str, 0, $len <= $toShow ? 0 : $first).str_repeat("*", $len - ($len <= $toShow ? 0 : $toShow)).substr($str, $len - $last, $len <= $toShow ? 0 : $last);
    }
}
//next below >>
if (!function_exists('mask_email')) {
    function mask_email($email) {
        $mail_parts = explode("@", $email);
        $domain_parts = explode('.', $mail_parts[1]);

        $mail_parts[0] = mask($mail_parts[0], 2, 1); // show first 2 letters and last 1 letter
        $domain_parts[0] = mask($domain_parts[0], 2, 1); // same here
        $mail_parts[1] = implode('.', $domain_parts);

        return implode("@", $mail_parts);
    }
	// echo mask_email('mahendrariki02@gmail.com');
	//OUTPUT : ma***********2@gm**l.com
}
// till here ya