<?php
//rename all files in the current directory to 1.jpg, 2.jpg, etc.
static $i=1;
$files = scandir(__DIR__);
natsort($files);//sort the files in natural order (alphabetical) for every loop
foreach ($files as $file) {
    if (is_file($file)) {
        if($file=='index.php'){
            continue;
        }
       $ext = pathinfo($file, PATHINFO_EXTENSION);
        $new_name =$i.'.'.$ext;  
        rename($file, $new_name);
        $i++;
    }
}