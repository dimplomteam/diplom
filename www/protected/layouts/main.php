<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$this->title?>Волгоград volgoplace.ru</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/yana.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/sergey.css" rel="stylesheet" type="text/css" />
<link href="/assets/css/nastya.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/assets/js/script.js"></script>
<script type="text/javascript" src="/assets/js/cufon-yui.js"></script>
<script type="text/javascript" src="/assets/js/arial.js"></script>
<script type="text/javascript" src="/assets/js/cuf_run.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
</head>
<body>
<div class="main">
  <div class="main_resize">
    <div class="header">
      <div class="logo">
        <h1><a href="/"><span>Волго</span>Place.ru<small></small></a></h1>
      </div>
    </div>
    <div class="content">
      <div class="content_bg">
        <div class="menu_nav">
          <ul>
            <li class="active"><a href="/">Домой</a></li>
            <li><a href="support.html">Support</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <?php if(!App::user()->isLogined()) {?>
            <a href="/login">Войти</a>
            <?php }else{?>
              <a href="/profile"><?=App::user()->login?></a>
            <?php } ?>
          </ul>
        </div>
        <div class="hbg"><img src="/assets/img/header_images.jpg" width="915" height="286" alt="" /></div>
        <div class="mainbar">

          <?=$this->view();?>

          <!--<div class="pagenavi"><span class="pages">Page 1 of 2</span><span class="current">1</span><a href="#">2</a><a href="#" >&raquo;</a></div>-->
        </div>
        <div class="sidebar">
          <!--
          <div class="gadget">
            <div class="search">
              <form method="get" id="search" action="#">
                <span>
                <input type="text" value="Search..." name="s" id="s" />
                <input name="searchsubmit" type="image" src="/assets/img/search.gif" value="Go" id="searchsubmit" class="btn"  />
                </span>
              </form>
              <div class="clr"></div>
            </div>
          </div>
          -->
          <div class="gadget">
            <h2 class="star">Навигация</h2>
            <div class="clr"></div>
            <ul class="sb_menu">
              <li class="active"><a href="#" style="border-radius: 5px;">Сообщения</a></li>
              <li><a href="#" style="border-radius: 5px;">Мои посты</a></li>
              <li><a href="#" style="border-radius: 5px;">Мои друзья</a></li>
              <li><a href="#" style="border-radius: 5px;">Моя лента</a></li>
              <li><a href="#" style="border-radius: 5px;">Мои подписки</a></li>
              <li><a href="#" style="border-radius: 5px;">Мои комментарии</a></li>
              <li><a href="#" style="border-radius: 5px;">Избранное</a></li>
              <li><a href="#" style="border-radius: 5px;">Настройки</a></li>

            </ul>
          </div>
         <!--<div class="gadget">
            <h2 class="star"><span>Sponsors</span></h2>
            <div class="clr"></div>
            <ul class="ex_menu">
              <li><a href="#">Lorem ipsum dolor</a> Donec libero. Suspendisse bibendum</li>
              <li><a href="#">Donec mattis</a> Phasellus suscipit, leo a pharetra</li>
              <li><a href="#">Dui pede condimentum</a> Tellus eleifend magna eget</li>
              <li><a href="#">Condimentum lorem</a> Curabitur vel urna in tristique</li>
              <li><a href="#">Fringilla velit magna</a> Cras id urna orbi tincidunt orci ac</li>
              <li><a href="#">Suspendisse bibendum</a> purus nec placerat bibendum</li>
            </ul>
          </div>-->
        </div>
        <div class="clr"></div>
      </div>
      <div class="fbg">
        <div class="fbg_resize">
          <div class="col c1">
            <h2><span>Image Gallery</span></h2>
            <a href="#"><img src="/assets/img/pic_1.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="/assets/img/pic_2.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_3.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_4.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_5.jpg" width="58" height="58" alt="" /></a> <a href="#"><img src="images/pic_6.jpg" width="58" height="58" alt="" /></a> </div>
          <div class="col c2">
            <h2><span>Lorem Ipsum</span></h2>
            <p>Lorem ipsum dolor<br />
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. <a href="#">Morbi tincidunt, orci ac convallis aliquam</a>, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam.</p>
          </div>
          <div class="col c3">
            <h2><span>About</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. llorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum. <a href="#">Learn more...</a></p>
          </div>
          <div class="clr"></div>
        </div>
      </div>
    </div>
    <div class="footer">
      <div class="footer_resize">
        <p class="lf">Copyright &copy; <a href="#">Domain Name</a>. All Rights Reserved</p>
        <p class="rf">Get More <a target="_blank" href="http://www.free-css.com/">Free CSS Templates</a> by <a target="_blank" href="http://www.rocketwebsitetemplates.com/">RocketWebsiteTemplates</a></p>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
</body>
</html>