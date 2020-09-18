<?php
/*
*
*	START hitung_umur
*
*/
if (!function_exists('hitung_umur')) {
	function hitung_umur($tanggal_lahir){
		$birthDate = new DateTime($tanggal_lahir);
		$today = new DateTime("today");
		if ($birthDate > $today) { 
		    exit("0 tahun 0 bulan 0 hari");
		}
		$y = $today->diff($birthDate)->y;
		$m = $today->diff($birthDate)->m;
		$d = $today->diff($birthDate)->d;
		return $y." tahun ".$m." bulan ".$d." hari";
	}
	// echo hitung_umur("1998-08-11");
	//OUTPUT : 22 tahun 1 bulan 7 hari
}
/*
*
*	END hitung_umur
*
*/

/*
*
*	START format_interval
*
*/
if (!function_exists('format_interval')) {
	function format_interval($date1,$date2)
	{
		$diff = abs(strtotime($date2) - strtotime($date1));

		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

		printf("%d tahun, %d bulan, %d hari\n", $years, $months, $days);
	}
	// echo format_interval("2008-03-24","2005-07-21");
	//OUTPUT : 2 tahun, 8 bulan, 7 hari 
}
/*
*
*	END format_interval
*
*/

/*
*
*	START tanggal_indo
*
*/
if (!function_exists('tanggal_indo')) {
	function tanggal_indo($tanggal, $cetak_hari = false)
	{
		$hari = array ( 1 =>    'Senin',
					'Selasa',
					'Rabu',
					'Kamis',
					'Jumat',
					'Sabtu',
					'Minggu'
				);
				
		$bulan = array (1 =>   'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
		
		if ($cetak_hari) {
			$num = date('N', strtotime($tanggal));
			return $hari[$num] . ', ' . $tgl_indo;
		}
		return $tgl_indo;
	}
	// echo tanggal_indo ('2016-03-20'); // Hasil: 20 Maret 2016;
	// echo tanggal_indo ('2016-03-20', true); // Hasil: Minggu, 20 Maret 2016
}
/*
*
*	END tanggal_indo
*
*/