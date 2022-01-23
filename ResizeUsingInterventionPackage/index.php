<?php
require_once 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
use Intervention\Image\ImageManager;
$images = scandir(__DIR__ . DIRECTORY_SEPARATOR . 'images');
foreach ($images as $image) {
    if ($image == '.' || $image == '..') {
        continue;
    }
    if(!is_dir('Resized')) {
        mkdir('Resized');
    }
    $manager = new ImageManager(['driver' => 'gd']);
    $image = $manager->make(__DIR__ . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $image);
    $image->resize(300, 300);
    $image->save(__DIR__ . DIRECTORY_SEPARATOR . 'Resized' . DIRECTORY_SEPARATOR . $image->basename);

}
