<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 20.01.2015
 * Time: 20:13
 */

?>


<div class="article">
    <h2><span><?=$this->post->title?></span></h2>
    <div class="clr"></div>
    <p class="post-data"><span class="date"><?=$this->post->created_time?></span> &nbsp;
        |&nbsp; Posted by <a href="/profile/view/<?=$this->post->user->login?>"><?=$this->post->user->login?></a>
        <?=$this->post->content?>

    <div class="clr"></div>
</div>