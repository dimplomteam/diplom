<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 12.02.2015
 * Time: 21:25
 */

class fileUploader extends baseObject{

    public static function saveImage($tmp){
        $validFormat = array('jpg', 'jpeg', 'gif', 'png');
        $sourcePath = pathinfo($tmp['name']);
        $extension = strtolower($sourcePath['extension']);
        if(in_array($extension, $validFormat))
        {
            $imageName = 'img_' . time().'_'.rand(100,999).'.'. $extension;
            $file = PATH."assets/upload/".$imageName;
            $url= "/assets/upload/".$imageName;
            move_uploaded_file($tmp['tmp_name'], $file);
            return $url;

        }else{
            return false;
        }

    }

}