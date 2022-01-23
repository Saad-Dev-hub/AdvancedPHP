<?php
// make  impode (convert array to string)
// implode needs 
//1- string seperator or glue
//2- array to be glued
/**
 * Join array elements with a string
 * @param string $seperator used to seperate the array values
 * @param array $arr array to be imploded
 * @return string a string containing a string representation of all the array elements in the same order, with the glue string between each element.
 */
function saadImplode(?string $seperator, array $arr):string{
    $str='';
    foreach($arr as $value){
        $str.=$value.$seperator;
    }
    return rtrim($str,$seperator);
}
//example
  $arr=[1,2,3,4,5,6,7,8,9,10];
   echo saadImplode('||',$arr);
