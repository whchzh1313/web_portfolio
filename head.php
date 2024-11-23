<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

run_event('pre_head');

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/head.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<div id="contentWrap">
    <div id="header">
        <div class="header_wrap flex_box flex_between flex_end">
            <h1 id="logo">HM.</h1>
            <nav>
                <ul class="flex_box">
                    <li><a href="#aboutMe">About Me</a></li>
                    <li><a href="#skill">Skill</a></li>
                    <li><a href="#project">Project</a></li>
                    <li><a href="#footer">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>