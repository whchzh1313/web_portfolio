<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.php');

include_once(G5_PATH.'/inc/hd_console.php');
?>

    <div id="main">
        <div id="titleSection" class="blue_gradiant_bg center_y_title">
            <div class="section wave_text" data-aos="fade">
                <p class="words wave" aria-hidden="true">이화민<span class="hide_and_show">_</span><br />웹 개발자 포트폴리오</p>
                <p class="words">이화민<span class="hide_and_show">_</span><br />웹 개발자 포트폴리오</p>
            </div>
        </div>
        <div id="aboutMe" class="section">
            
        </div>
        <style>
        </style>
    </div>
<?php
include_once(G5_PATH.'/tail.php');