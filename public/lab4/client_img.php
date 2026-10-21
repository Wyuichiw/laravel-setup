<?php
$expiresSeconds = 86400;
header("Content-Type: image/png");
header("Cache-Control: public, max-age=" . $expiresSeconds);
header("Expires: " . gmdate("D, d M Y H:i:s", time() + $expiresSeconds) . " GMT");

$im = @imagecreatetruecolor(200, 60) or die("Помилка: бібліотека GD не підключена в PHP!");
$bg = imagecolorallocate($im, 33, 150, 243);
$textColor = imagecolorallocate($im, 255, 255, 255);
imagefilledrectangle($im, 0, 0, 200, 60, $bg);
imagestring($im, 5, 45, 20, "Cache Test", $textColor);

imagepng($im);
imagedestroy($im);