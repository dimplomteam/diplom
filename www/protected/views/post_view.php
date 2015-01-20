<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 20.01.2015
 * Time: 20:13
 */

?>


<div class="article">
    <h2><span><?=$post->title?></span></h2>
    <div class="clr"></div>
    <p class="post-data"><span class="date"><?=$post->created_time?></span> &nbsp;
        |&nbsp; Posted by <a href="/profile/view/<?=$post->user->login?>"><?=$post->user->login?></a>
        <?=$post->content?>

    <div class="clr"></div>
</div>