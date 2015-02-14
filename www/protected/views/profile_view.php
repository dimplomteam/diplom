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
    <a href="#tab1">Профиль</a><a href="#tab2">Посты</a><a href="#tab3">Комментарии</a><? if(App::user()->isLogined()){?><a href="#tab4">Сообщения</a><?}?>
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
    <? if(App::user()->isLogined()){?>
    <div>
        <table id="private_messages">
            <thead>
            <tr>
                <td>От кого =&gt; Кому</td>
                <td>Сообщение</td>
            </tr>
            </thead>
            <tbody>
            <? foreach($this->messages as $message){?>
            <tr>
                <td><a href="/profile/view/<?=$message->from_user->login;?>#tab4"><?=$message->from_user->login;?></a>
                    =&gt;
                    <a href="/profile/view/<?=$message->to_user->login;?>#tab4"><?=$message->to_user->login;?></a>
                </td>
                <td title="<?=$message->created_time;?>"><?=$message->content;?></td>
            </tr>
            <? } ?>
            </tbody>
        </table>
        <? if(!((!count($this->messages)) and ($this->user->itsMe()))){?>
        <form action="/ajax/send_message" method="post" id="send_message_form">
            <? if(!$this->user->itsMe()) {?>
                <input type="hidden" name="user_to_id" value="<?=$this->user->id;?>">
            <?}else{?>
                <select name="user_to_id">
                    <? foreach($this->dialogers as $id => $login){?>
                        <option value="<?=$id?>"><?=$login?></option>
                   <? }?>
                </select><br>
                <?}?>
            <textarea name="content" required="required"></textarea><br>
            <input type="submit">
            </form>
        <?}?>
    </div>
    <?}?>
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