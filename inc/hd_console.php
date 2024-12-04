<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<link rel="stylesheet" href="/css/console_style.css">
<div id="hdConsole" class="console_style">
    <div id="btConsoleToggle"><button type="button"><img src="/images/hd_console_btn.png" alt=""></button></div>
    <ul id="consoleItems">
        <li>
            <h3>Place</h3>
            <p id="placeName">성남시 분당구</p>
        </li>
        <li>
            <h3>Time</h3>
            <p id="dateTime"></p>
        </li>
        <li>
            <h3>Weather</h3>
            <p id="weatherIcon"><img id="weatherImg" src="/images/icons/ic_cloudsun.png" alt=""></p>
        </li>
    </ul>
</div>
<div id="placeConsole" class="console_style">
    <div class="close_wrap">
        <button class="close"></button>
    </div>
    <div class="map_wrap">
    <div id="map"></div>
    <div class="hAddr">
        <span class="title">현재 지정된 위치</span>
        <span id="centerAddr"></span>
    </div>
    <div class="desc">위치를 변경하게되면 지정된 시간과 날씨가 초기화됩니다.</div>
    <div class="select_wrap">
        <button class="select">변경</button>
    </div>
</div>
</div>
<div id="timeConsole" class="console_style">
    <div class="close_wrap">
        <button class="close"></button>
    </div>
    <!-- time selector -->
    <div class="time_wrap">
        <div id="upTime"><img src="/images/bt_up_time.png" alt=""></div>
        <!-- 처음엔 현재 시간 (기본클래스값이 설정됩니다.) -->
        <div id="selectTime">
            <span class="hour">14</span>
            <span class="opacity_changer"> : </span>
            <span class="minute">00</span>
        </div>
        <div id="downTime"><img src="/images/bt_down_time.png" alt=""></div>
    </div>
    <div class="select_wrap">
        <button class="select">변경</button>
    </div>
</div>
<div id="weatherConsole" class="console_style">
    <div class="close_wrap">
        <button class="close"></button>
    </div>
    <!-- weather choice -->
    <ul id="weatherSelector">
        <li id="wdSun" value="sun"><img src="/images/icons/ic_sun.png" alt="맑음"></li>
        <li id="wdCloud" value="cloud"><img src="/images/icons/ic_cloud.png" alt="구름많음"></li>
        <li id="wdCloudsun" value="cloudsun"><img src="/images/icons/ic_cloudsun.png" alt="흐림"></li>
        <li id="wdRain" value="rain"><img src="/images/icons/ic_rain.png" alt="비"></li>
        <li id="wdRaindrop" value="raindrop"><img src="/images/icons/ic_raindrop.png" alt="빗방울"></li>
        <li id="wdSnow" value="snow"><img src="/images/icons/ic_snow.png" alt="눈"></li>
        <li id="wdSnowrain" value="snowrain"><img src="/images/icons/ic_snowrain.png" alt="눈비"></li>
        <li id="wdSnowraindrop" value="snowraindrop"><img src="/images/icons/ic_snowraindrop.png" alt="눈빗방울"></li>
    </ul>
    <div class="select_wrap">
        <button class="select">변경</button>
    </div>
</div>