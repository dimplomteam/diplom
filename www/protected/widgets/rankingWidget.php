<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 21.01.15
 * Time: 17:05
 */

class rankingWidget extends baseWidget{

    public function __coustruct($post_id,$cur_rank){
        $allow_vote=(App::user()->isLogined()) ? 1 : 0;
        $cur_vote=0;
        if($allow_vote) {
            $ranking = new Ranking;
            $ranking->loadByFields(array("post_id" => $post_id, "user_id" => App::user()->id));
            $cur_vote=$ranking->rank;
        }
        $this->result_html='
        <div class="rating" data-allowvote="'.$allow_vote.'" data-curvalue="'.$cur_vote.'" data-postid="'.$post_id.'">
        <span class="up"></span>
        <span class="label">'.$cur_rank.'</span>
        <span class="down"></span>
        </div>
        ';

        return $this->result_html;
    }



}