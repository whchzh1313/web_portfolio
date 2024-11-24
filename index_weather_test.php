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
            #titleSection {position: relative;overflow: hidden;}
            #titleSection .weather_bg {position: absolute;left: -10%;top: 0;width: 120%;height: 100%;overflow: hidden;transform: skew(-15deg);z-index: 1;}
            #titleSection .weather_bg .rain {position: absolute;width: 1px;height: 20px;background: rgba(255, 255, 255, 0.6);animation: fall 1s linear infinite;}
            #titleSection .weather_bg .snow {position: absolute;width: 12px;height: 12px;transform: translateY(-20px);border-radius: 20px;background: rgba(255, 255, 255, 0.6);animation: fall 5s linear infinite;}
            #titleSection .weather_bg .cloud {position: absolute;transform: translateX(-150px);opacity: .6;animation: moveCloud 10s linear infinite;background-size: contain;background-repeat: no-repeat;}

            @keyframes moveCloud {
                0% { transform: translateX(-150px); }
                100% { transform: translateX(100vw); }
            }
            @keyframes fall {
                0% { transform: translateY(-20px); }
                100% { transform: translateY(820px); }
            }
        </style>
        <script>
            const _weatherBg = document.getElementById('weatherBg');
            function dropRain (count = 100) {
                for (let i = 0; i < count; i++) {
                    const _rainDrop = document.createElement('div');
                    _rainDrop.classList.add('rain');
                    _rainDrop.style.left = Math.random() * _weatherBg.offsetWidth + 'px';
                    _rainDrop.style.animationDuration = Math.random() * 1 + 0.5 + 's';
                    _weatherBg.appendChild(_rainDrop);
                }
            }
            dropRain();
            
            function dropSnow (count = 100) {
                for (let i = 0; i < count; i++) {
                    const _snow = document.createElement('div');
                    _snow.classList.add('snow');
                    _snow.style.left = Math.random() * _weatherBg.offsetWidth + 'px';
                    const delay = Math.random() * 3;
                    _snow.style.animationDelay = delay + 's';
                    _snow.style.animationDuration = Math.random() * 5 + 2 + 's';
                    _weatherBg.appendChild(_snow);
                }
            }
            dropSnow();

            function moveClouds(count = 10) {
                for (let i = 0; i < count; i++) {
                    const _cloud = document.createElement('div');
                    _cloud.classList.add('cloud');
                    
                    const cloudWidth = Math.random() * 100 + 50;
                    const cloudHeight = cloudWidth * 0.5;
                    
                    _cloud.style.width = cloudWidth + 'px';
                    _cloud.style.height = cloudHeight + 'px';
                    _cloud.style.top = Math.random() * 100 + 'px';

                    const cloudIndex = Math.floor(Math.random() * 5);
                    _cloud.style.backgroundImage = 'url(/images/clouds/cloud_' + cloudIndex + '.png)';

                    const delay = Math.random() * 3;
                    _cloud.style.animationDelay = delay + 's';
                    _cloud.style.animationDuration = Math.random() * 15 + 10 + 's';
                    _weatherBg.appendChild(_cloud);
                }
            }
            moveClouds();
        </script>
    </div>
<?php
include_once(G5_PATH.'/tail.php');