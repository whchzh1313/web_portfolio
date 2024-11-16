<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
add_stylesheet('<link rel="stylesheet" href="/css/mobile_main.css">', 0);
?>
<div id="mobile">
    <div id="header">
        <div class="header_wrap">
            <nav>
                <ul class="">
                    <li class="right_nav hd_moblie move_scroll_top">HM.</li>
                    <li class="right_nav hd_aboutMe">About Me -</li>
                    <li class="right_nav hd_skill">Skill -</li>
                    <li class="right_nav hd_project">Project -</li>
                    <li class="right_nav hd_footer">Contact -</li>
                </ul>
            </nav>
        </div>
    </div>