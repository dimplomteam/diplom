<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 03.02.15
 * Time: 18:44
 */

class viewHelper {

    // bbcode parser
    public function BB($text_post) {
        $str_search = array(
            "#\\\n#is",
            "#\[table\](.+?)\[\/table\]#is",
            "#\[tr\](.+?)\[\/tr\]#is",
            "#\[td\](.+?)\[\/td\]#is",
            "#\[b\](.+?)\[\/b\]#is",
            "#\[i\](.+?)\[\/i\]#is",
            "#\[u\](.+?)\[\/u\]#is",
            "#\[code\](.+?)\[\/code\]#is",
            "#\[quote\](.+?)\[\/quote\]#is",
            "#\[url=(.+?)\](.+?)\[\/url\]#is",
            "#\[url\](.+?)\[\/url\]#is",
            "#\[img\](.+?)\[\/img\]#is",
            "#\[size=(.+?)\](.+?)\[\/size\]#is",
            "#\[color=(.+?)\](.+?)\[\/color\]#is",
            "#\[list\](.+?)\[\/list\]#is",
            "#\[list=(1|a|I)\](.+?)\[\/list\]#is",
            "#\[\*\](.+?)\[\/\*\]#"
        );
        $str_replace = array(
            "<br />",
            "<table>\\1</table>",
            "<tr>\\1</tr>",
            "<td>\\1</td>",
            "<b>\\1</b>",
            "<i>\\1</i>",
            "<span style='text-decoration:underline'>\\1</span>",
            "<code class='code'>\\1</code>",
            "<table width = '95%'><tr><td>Цитата</td></tr><tr><td class='quote'>\\1</td></tr></table>",
            "<a href='\\1'>\\2</a>",
            "<a href='\\1'>\\1</a>",
            "<img src='\\1' alt = 'Изображение' />",
            "<span style='font-size:\\1%'>\\2</span>",
            "<span style='color:\\1'>\\2</span>",
            "<ul>\\1</ul>",
            "<ol type='\\1'>\\2</ol>",
            "<li>\\1</li>"
        );
        return preg_replace($str_search, $str_replace, $text_post);
    }
}