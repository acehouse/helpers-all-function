<?php
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