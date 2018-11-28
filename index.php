<?php
header('Content-Type: application/json');
$json_url = "https://www.instagram.com/nasa/";
$json = file_get_contents($json_url);
$data = json_decode($json, TRUE);

// var_dump($json);
 if (strpos($json, '<script type="text/javascript">') !== false) {
    $text_filter=str_replace('<script type="text/javascript">window._sharedData = ',' ',$json);
    $text_filter=str_replace('</script>',' ',$text_filter);
	
	$json_filter= json_encode($text_filter, TRUE);



$start = '<script type="text/javascript">window._sharedData = ';
$end = ';</script>';

			$pattern = sprintf(
				'/%s(.+?)%s/ims',
				preg_quote($start, '/'), preg_quote($end, '/')
			);

			if (preg_match($pattern, $json, $matches)) {
				list(, $match) = $matches;
				echo $match;
			}


}
