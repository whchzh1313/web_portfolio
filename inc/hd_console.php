<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<div id="hdConsole">
    <ul>
        <li>
            <h3>Place</h3>
            <p></p>
        </li>
        <li>
            <h3>Time</h3>
            <p><?php echo date("H:i:s"); ?></p>
        </li>
        <li>
            <h3>Weather</h3>
            <p><img src="" alt=""></p>
        </li>
    </ul>
</div>
<div id="placeConsole"></div>
<div id="timeConsole"></div>
<div id="weatherConsole"></div>