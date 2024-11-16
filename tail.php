<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/tail.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/tail.php');
    return;
}
?>
    <div id="float_btn">
        <div id="float_btn_bg" class="radius_100"></div>
        <div id="wave_circle" class="radius_100"></div>
        <img src="/images/icon_page_up.png" alt="상단으로">
    </div>
    <div id="footer" class="black_bg">
        <h2><span class="title_circle blue_circle"><span>Contact</span></span></h2>
        <div class="contact_box">
            <p>Email : whchzh1313@gmail.com</p>
            <p>Phone : 010-2055-4027</p>
        </div>
        <p>© 2024. Lee Hwa Min. All rights reserved.</p>
    </div>
</div> <!-- #pc end -->
<?php
include_once(G5_PATH."/tail.sub.php");