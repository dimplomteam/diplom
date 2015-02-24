<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 20.01.2015
 * Time: 0:01
 */
//var_dump($this->posts);exit;
?>
<? foreach($this->posts as $post){ ?>

<div class="article">
    <? if(App::user()->role=="admin"){?>
    <div class="post_delete_btn" onclick="post_delete(this,<?=$post->id?>)">Удалить</div>
    <?}?>
    <a href="/post/view/<?=$post->id?>"><h2><span><?=$post->title?></span></h2></a>
    <div class="clr"></div>
    <p class="post-data"><span class="date"><?=$post->created_time?></span> &nbsp;
        |&nbsp; Запостил  <a href="/profile/view/<?=$post->user->login?>"><?=($post->user->username) ? $post->user->username : $post->user->login?></a>
    <div><?=viewHelper::BB($post->content)?></div>
    <p class="spec"><a href="/post/view/<?=$post->id?>#comments" class="com fr">подробнее</a> <a href="/post/view/<?=$post->id?>" style="visibility: hidden" class="rm fl">Read more</a></p>
    <div class="clr"></div>
</div>

<? } ?>
<?/*var_dump($this);*/?>
<?=$this->pagination?>