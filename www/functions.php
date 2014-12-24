<?php

function add_brackets($arr){
if(!is_array($arr)) {return array();}
$new_arr=array();
foreach ($arr as $key => $value) {
$new_arr["{".$key."}"]=$value;
}
return $new_arr;}