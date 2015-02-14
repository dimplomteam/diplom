<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 20.01.15
 * Time: 12:32
 */

class paginationWidget extends baseWidget{

    public function __construct($offset,$limit,$count,$base_uri="/"){
        $per_page=$limit;
        $paginations_count=ceil($count/$per_page);
        $cur_page=floor($offset/$per_page)+1;

        if($per_page>=$count){
            return "";
        }
        $result_html='<div class="pagenavi"><span class="pages">Страница '.$cur_page.' из '.$paginations_count.'</span>';

        for($i=1;$i<=$paginations_count;$i++){
            $is_current = ($cur_page==$i) ? "current" : "";
            $result_html.='<a class="'.$is_current.'" href="'.$base_uri.'?offset='.(($i-1)*$per_page).'" >'.$i.'</a>';//'&limit='.($per_page).
        }
        $result_html.='</div>';
        return $this->result_html=$result_html;
    }


}