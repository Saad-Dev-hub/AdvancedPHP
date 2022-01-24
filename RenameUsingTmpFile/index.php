<?php
//rename all files in the current directory to 1.jpg, 2.jpg, etc.
static $i=1;
$files = scandir(__DIR__.'/'.'images');
// var_dump($files);die;
$path=dirname(__FILE__);
$tmp_path=$path.DIRECTORY_SEPARATOR."tmp";
mkdir($tmp_path);
//Move all files to a temporary directory
foreach ($files as $file) {
    if ($file=='.' || $file=='..') continue;    
       $ext = pathinfo($file, PATHINFO_EXTENSION);
         $new_name = $tmp_path.DIRECTORY_SEPARATOR.$i.'.'.$ext;
        rename($path."/".'images'."/".$file, $new_name);
        $i++;
}
// move all files from tmp to current directory
$tmpFiles = scandir($tmp_path);
static $j=1;
foreach ($tmpFiles as $file) {
    if ($file=='.' || $file=='..') continue;    
       $ext = pathinfo($file, PATHINFO_EXTENSION);
         $new_name = $path.DIRECTORY_SEPARATOR.'images'."/".$j.'.'.$ext;
        rename($tmp_path.DIRECTORY_SEPARATOR.$file, $new_name);
        $j++;
}

 rmdir($tmp_path);