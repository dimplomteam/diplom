<?php
/**
 * Created by PhpStorm.
 * User: Яна
 * Date: 20.01.2015
 * Time: 22:30
 */

?>
<form action="/ajax/post_create" method="post">
    Title: <input type="text" name="title"><br>
    Content: <textarea id="post_create" name="content"></textarea><br>
    <input type="submit">
</form>
<script>
    $(function() {
        $("#post_create").wysibb({img_uploadurl : "/ajax/img_upload"});
    })
</script>