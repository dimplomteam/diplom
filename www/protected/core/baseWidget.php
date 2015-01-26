<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.01.15
 * Time: 17:05
 */

class baseWidget extends baseObject{
    public $result_html="";

    public function __toString(){
        return $this->result_html;
    }
}