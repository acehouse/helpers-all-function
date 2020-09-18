<?php
/*
*
*	START percentageOf
*
*/
if (!function_exists('percentageOf')) {
	function percentageOf( $number, $everything, $decimals = 1 ){ //$number = perbandingan, $everything = total
	    return round( $number / $everything * 100, $decimals );
	}
	// echo percentageOf( "80", "250" )." %";
	// OUTPUT : 32 %
}
/*
*
*	END percentageOf
*
*/