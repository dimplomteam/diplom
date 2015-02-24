<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 20.01.2015
 * Time: 20:13
 */
?>


<div class="article">
   <!-- <div class="rating">
        <span class="up"></span>
        <span class="label">1234</span>
        <span class="down"></span>
    </div>-->
    <?=new rankingWidget($this->post->id,$this->post->rank)?>
    <h2><span><?=$this->post->title?></span></h2>
    <div class="clr"></div>
    <p class="post-data"><span class="date"><?=$this->post->created_time?></span> &nbsp;
        |&nbsp; Запостил  <a href="/profile/view/<?=$this->post->user->login?>"><?=($this->post->user->username) ? $this->post->user->username : $this->post->user->login?></a></p>
        <div class="content"><?=viewHelper::BB($this->post->content)?></div>

    <div class="clr"></div>
</div>

<?php foreach($this->post->comments as $comment) { ?>

<div class="comment">
    <? if(App::user()->role=="admin"){?>
        <div class="comment_delete_btn" onclick="comment_delete(this,<?=$comment->id?>)">Удалить</div>
    <?}?>
    <a href="/profile/view/<?=$comment->user->login?>"><img src="<?=$comment->user->image_src?>" width="40" height="40" alt="" class="userpic" /></a>
    <p><a href="/profile/view/<?=$comment->user->login?>"><?=($comment->user->username) ? $comment->user->username : $comment->user->login?></a> Написал:<br />
        <?=$comment->created_time?></p>
    <p><?=$comment->content?></p>
</div>

<?php } ?>

<? if(App::user()->isLogined()){?>
<div class="article">
    <h2>Прокомментируйте</h2>
    <div class="clr"></div>
    <form action="/ajax/comment_add/<?=$this->post->id?>" method="post" id="leavereply">
        <ol>
            <li>
                <label for="content">Ваш комментарий:</label>
                <textarea id="content" name="content" rows="8" cols="50" required="required"></textarea>
            </li>
            <li>
                <input type="submit" class="send">
                <div class="clr"></div>
            </li>
        </ol>
    </form>
</div>
<?}?>








