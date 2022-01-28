<?php
// resize all images in the current directory to 300x300
$images = scandir(__DIR__);
foreach ($images as $image) {
    if (is_file($image) && $image != 'index.php') {
        if (pathinfo($image, PATHINFO_EXTENSION) == 'png') {
            //Create directory for images if not exists
            if (!is_dir('PNG')) {
                mkdir('PNG');
            }
            $img = imagecreatefrompng($image);
            $resizedImg = imagescale($img, 300, 300);
            imagepng($resizedImg, 'PNG' . DIRECTORY_SEPARATOR . $image);
        } elseif (pathinfo($image, PATHINFO_EXTENSION) == 'jpg') {
            if (!is_dir('JPG')) {
                mkdir('JPG');
            }      
            $img =imagecreatefromstring(file_get_contents($image));
            $resizedImg = imagescale($img, 300, 300);
            imagejpeg($resizedImg, 'JPG' . DIRECTORY_SEPARATOR . $image);
        } elseif (pathinfo($image, PATHINFO_EXTENSION) == 'gif') {
            if (!is_dir('GIF')) {
                mkdir('GIF');
            }
            $img = imagecreatefromgif($image);
            $resizedImg = imagescale($img, 300, 300);
            imagegif($resizedImg, 'GIF' . DIRECTORY_SEPARATOR . $image);
        }
    }
}
