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
?>
    <div id="main">
        <div id="titleSection" class="blue_gradiant_bg center_y_title">
            <div id="weatherBg" class="weather_bg"></div>
            <div class="section wave_text" data-aos="fade">
                <p class="words wave" aria-hidden="true">이화민<span class="hide_and_show">_</span><br />웹 개발자 포트폴리오</p>
                <p class="words">이화민<span class="hide_and_show">_</span><br />웹 개발자 포트폴리오</p>
            </div>
        </div>
        <div id="aboutMe" class="section">
            
        </div>
        <style>
            #titleSection .weather_bg {
                position: absolute;
                left: -10%;
                top: 0;
                width: 120%;
                height: 100%;
                overflow: hidden;
                transform: skew(-15deg);
                z-index: 1;
            }

            .rain {
                position: absolute;
                width: 1px;
                height: 20px;
                background: rgba(255, 255, 255, 0.6);
                animation: fall 1s linear infinite;
            }

            .snow {
                position: absolute;
                width: 12px;
                height: 12px;
                transform: translateY(-20px);
                border-radius: 20px;
                background: rgba(255, 255, 255, 0.6);
                animation: fall 5s linear infinite;
            }

            @keyframes fall {
                0% { transform: translateY(-20px); }
                100% { transform: translateY(820px); } 
            }
        </style>
        <script>
            
            
            function dropRain () {
                for (let i = 0; i < 100; i++) {
                    const $rainDrop = document.createElement('div');
                    $rainDrop.classList.add('rain');
                    $rainDrop.style.left = Math.random() * window.innerWidth + 'px';
                    $rainDrop.style.animationDuration = Math.random() * 1 + 0.5 + 's';
                    document.getElementById('weatherBg').appendChild($rainDrop);
                }
            }
            dropRain()
            
            function dropSnow () {
                for (let i = 0; i < 100; i++) {
                    const $snow = document.createElement('div');
                    $snow.classList.add('snow');
                    $snow.style.left = Math.random() * window.innerWidth + 'px';
                    const delay = Math.random() * 3;
                    $snow.style.animationDelay = delay + 's';
                    $snow.style.animationDuration = Math.random() * 5 + 2 + 's';
                    document.getElementById('weatherBg').appendChild($snow);
                }
            }
            dropSnow()
        </script>
    </div>
<?php
include_once(G5_PATH.'/tail.php');