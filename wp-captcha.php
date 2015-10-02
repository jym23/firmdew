<?php

require( dirname(__FILE__) . '/wp-load.php' );

session_start();

$code = '';
 
for ($i = 0; $i < 5; $i++) {
    // this numbers refer to numbers of the ascii table (lower case)
    $code .= chr(rand(97, 122));
}

$dir = 'fonts/';

$image = imagecreatetruecolor(170, 60);
$black = imagecolorallocate($image, 0, 0, 0);
$color = imagecolorallocate($image, 200, 100, 90); // red
$white = imagecolorallocate($image, 255, 255, 255);
 
imagefilledrectangle($image,0,0,399,99,$white);
imagettftext ($image, 30, 0, 10, 40, $color, $dir . "arial.ttf", $code);

if( ! get_option('wp-captcha') ) :
	add_option('wp-captcha', $code);
else :
	update_option('wp-captcha', $code);
endif;

header("Content-type: image/png");
imagepng($image);

?>