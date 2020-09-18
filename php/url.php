<?php
/*
*
*	START seo_title
*
*/
if (!function_exists('seo_title')) {
	function seo_title($s) {
	    $c = array (' ');
	    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','–');
	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	    return $s;
	}
}
/*
*
*	END seo_title
*
*/
/*
*
*	START redirect
*
*/
if (!function_exists('redirect')) {
	function redirect($url)
	{
		?>
		<script type="text/javascript">
		window.location.href="<?= $url ?>";
		</script>
		<?php
	}
}
/*
*
*	END redirect
*
*/

/*
*
*	START go_back
*
*/
if (!function_exists('go_back')) {
	function go_back()
	{
		?>
		<script type="text/javascript">
		window.history.back();
		</script>
		<?php
	}
}
/*
*
*	END go_back
*
*/

/*
*
*	START alert
*
*/
if (!function_exists('alert')) {
	function alert($msg)
	{
		?>
		<script type="text/javascript">
		alert('<?= $msg ?>');
		</script>
		<?php
	}
}
/*
*
*	END go_back
*
*/