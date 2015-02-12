<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 20.01.2015
 * Time: 1:21
 */
//var_dump($this->user);
?>
<div class="avatar_round">
    <img src="<?=$this->user->image_src?>" alt="avatar" />
</div>


<div class="menu1">
    <br id="tab2"/><br id="tab3"/><br id="tab4"/>
    <a href="#tab1">Профиль</a><a href="#tab2">Посты</a><a href="#tab3">Комментарии</a><!--<a href="#tab4">Мои места</a>-->
    <div>
        <h3>
            Основная информация

        </h3>
        <p>E-mail: <?=$this->user->email?></p>
        <p>Логин: <?=$this->user->login?></p>
        <p>Дата регистрации: <?=$this->user->created_time?></p>

        <? if($this->user->itsMe()){?>
<form action="/ajax/avatar_upload" method="post" enctype="multipart/form-data">
    <input type="file" name="img"><br>
    <input type="submit">
</form>

        <?}?>
<!--
        <h3>
            Контактная информация
        </h3>
        <p>E-mail:</p>
        <p>Skype:</p>-->
    </div>
    <div>
        <? foreach($this->user->posts as $post){ ?>
            <p>
                <a href="/post/view/<?=$post->id?>#comments"><?=$post->title?></a>
            </p>
        <? } ?>
    </div>
    <div>
        <? foreach($this->user->comments as $comment){ ?>
            <p>
                <a href="/post/view/<?=$comment->post_id?>#comments"><?=$comment->content?></a>
            </p>
        <? } ?>
    </div>
    <!--<div>вкладка 4</div>-->
</div>

<!--
<section class="container">
    <h2>Форма поиска</h2>
        <div class="dark">
        <form>
            <span><input type="text" class="search rounded" placeholder="Искать..."><input type="button" value="Поиск"></span>

        </form>
    </div>
</section>
-->