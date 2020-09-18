<?php

if (!function_exists('format_rupiah')) {
    function format_rupiah($angka)
    {
      $rupiah=number_format($angka,0,',','.');
      return $rupiah;
    }
	// echo format_rupiah('10000000');
	//OUTPUT : 10.000.000
}
// end format_rupiah