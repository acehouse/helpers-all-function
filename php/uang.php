<?php
/*
*
*	START number_format_short
*
*/
if (!function_exists('number_format_short')) {
	function number_format_short( $n, $precision = 1 ) 
	{
		if ($n < 900) {
			// 0 - 900
			$n_format = number_format($n, $precision);
			$suffix = '';
		} else if ($n < 900000) {
			// 0.9k-850k
			$n_format = number_format($n / 1000, $precision);
			$suffix = 'K';
		} else if ($n < 900000000) {
			// 0.9m-850m
			$n_format = number_format($n / 1000000, $precision);
			$suffix = 'M';
		} else if ($n < 900000000000) {
			// 0.9b-850b
			$n_format = number_format($n / 1000000000, $precision);
			$suffix = 'B';
		} else {
			// 0.9t+
			$n_format = number_format($n / 1000000000000, $precision);
			$suffix = 'T';
		}

		if ( $precision > 0 ) {
			$dotzero = '.' . str_repeat( '0', $precision );
			$n_format = str_replace( $dotzero, '', $n_format );
		}

		return $n_format . $suffix;
	}
	// echo number_format_short('12300');
	//OUTPUT : 12.3K
}
/*
*
*	END number_format_short
*
*/

/*
*
*	START RUPIAH
*
*/
if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
      $rupiah="Rp. ".number_format($angka,0,',','.');
      return $rupiah;
    }
	// echo rupiah('10000000');
	//OUTPUT : Rp. 10.000.000
}
/*
*
*	END RUPIAH
*
*/

/*
*
*	START spellNumberInIndonesian
*
*/
if (!function_exists('spellNumberInIndonesian')) {
	function spellNumberInIndonesian($number)
	{
		$result = "";
		$number = strval($number);
		if (!preg_match("/^[0-9]{1,15}$/", $number)) return false;

		$ones           = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan");
		$majorUnits     = array("", "ribu", "juta", "milyar", "trilyun");
		$minorUnits     = array("", "puluh", "ratus");
		$length         = strlen($number);
		$isAnyMajorUnit = false;

		for ($i = 0, $pos = $length - 1; $i < $length; $i++, $pos--) {
			if ($number{$i} != '0') {
				if ($number{$i} != '1') {
					$result .= $ones[$number{$i}].' '.$minorUnits[$pos % 3].' ';
				} else if ($pos % 3 == 1 && $number{$i + 1} != '0') {
					if ($number{$i + 1} == '1')
						$result .= "sebelas ";
					else
						$result .= $ones[$number{$i + 1}]." belas ";
					$i++; $pos--;
				} else if ($pos % 3 != 0) {
					$result .= "se".$minorUnits[$pos % 3].' ';
				} else if ($pos == 3 && !$isAnyMajorUnit) {
					$result .= "se";
				} else {
					$result .= "satu ";
				}
				$isAnyMajorUnit = true;
			}

			if ($pos % 3 == 0 && $isAnyMajorUnit) {
				$result         .= $majorUnits[$pos / 3].' ';
				$isAnyMajorUnit = false;
			}
		}
		$result = trim($result);
		if ($result == "") $result = "nol";
			return $result;
	}
// echo spellNumberInIndonesian('123202300');
//OUTPUT : seratus dua puluh tiga juta dua ratus dua ribu tiga ratus
}
/*
*
*	END spellNumberInIndonesian
*
*/