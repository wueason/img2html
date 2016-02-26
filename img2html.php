<?php
/**
 * Created by PhpStorm.
 * User: Eason
 * Date: 16/2/26
 * Time: 下午6:39
 */

// filename
$imgFile = 'img.jpg';
// pixel step
$step = 5;
// alpha channel
$alpha = 0.5;

list($width, $height, $type, $attr) = getimagesize($imgFile);
$im = imagecreatefromjpeg($imgFile);

ob_start();

for ($i = 0; $i <= $width; ($i += $step)) {

    for ($j = 0; $j <= $height; ($j += $step)) {

        $rgb = ImageColorAt($im, $j, $i);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

        printf('<span style="color:rgba(%u, %u, %u, %.1f);">▇</span>', $r, $g, $b, $alpha);
    }

    echo "<br/>";
}

ob_flush();

