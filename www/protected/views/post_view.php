<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 20.01.2015
 * Time: 20:13
 */

/*
             <div class="comment"> <a href="#"><img src="images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
              <p><a href="#">admin</a> Says:<br />
                April 20th, 2009 at 2:17 pm</p>
              <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.</p>
            </div>

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





<div class="rating">
    <span class="up"></span>
    <span class="label">1234</span>
    <span class="down"></span>
</div>