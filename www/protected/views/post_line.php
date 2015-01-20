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
    <h2><span><?=$post->title?></span></h2>
    <div class="clr"></div>
    <p class="post-data"><span class="date"><?=$post->created_time?></span> &nbsp;
        |&nbsp; Posted by <a href="/profile/view/<?=$post->user->login?>"><?=$post->user->login?></a>
    <?=$post->content?>
    <p class="spec"><a href="/post/view/<?=$post->id?>#comments" class="com fr">Comments (3)</a> <a href="/post/view/<?=$post->id?>" class="rm fl">Read more</a></p>
    <div class="clr"></div>
</div>

<? } ?>
<?=$this->pagination?>