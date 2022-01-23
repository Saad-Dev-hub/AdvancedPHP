<?php
//rename all files in the current directory to 1.jpg, 2.jpg, etc.
var_dump(getimagesize('a50.jpg'));die;
static $i=1;
$files = scandir(__DIR__);
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