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
            <div id="playground"></div>
            <h1 id="logo" class="scroll_top">HM.</h1>
            <nav>
                <div class="mobile_menu_trigger">
	                <span> </span>
	                <span> </span>
	                <span> </span>
                </div>
                <ul id="gnb">
                    <li id="moveAboutMe">About Me</li>
                    <li id="moveSkill">Skill</li>
                    <li id="moveProject">Project</li>
                    <li id="moveFooter">Contact</li>
                </ul>
            </nav>
        </div>
    </div>