<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<style>
    #hdConsole {position: fixed;right: 24px;top: 112px;padding: 4px;background: #fff;box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);display: -webkit-box;display: -ms-flexbox;display: -webkit-flex;display: flex;border-radius: 4px;font-size: 1rem;overflow: hidden;}
    #hdConsole.hide {width: fit-content;}
    #hdConsole #consolItems {width: 400px;transition:width ease 1s;}
    #hdConsole.hide #consolItems {width: 0;}
    #hdConsole #btConsoleToggle {line-height: 28px;text-align: center;width: 28px;margin-right: 2px;}
    #hdConsole #btConsoleToggle button {border: none;background: none;width: 100%;height: 100%;transform: rotate(180deg);}
    #hdConsole.hide #btConsoleToggle button {transform: rotateX(180deg);}
    #hdConsole #consolItems {display: -webkit-box;display: -ms-flexbox;display: -webkit-flex;display: flex;line-height: 28px;white-space: nowrap;}
    #hdConsole #consolItems > li {display: -webkit-box;display: -ms-flexbox;display: -webkit-flex;display: flex;padding: 0 8px;}
    #hdConsole #consolItems > li > h3 {margin-right: 8px;line-height: 28px;font-weight: 500;}
    #hdConsole #consolItems > li > h3 + p {background: #E9EBF7;font-weight: 400;border-radius: 4px;padding: 0 8px;height: 28px;}
    #hdConsole #consolItems > li #weatherIcon {padding: 0;}
    #hdConsole #consolItems > li #weatherIcon img {height: 28px;}
</style>
<div id="hdConsole" class="">
    <div id="btConsoleToggle"><button type="button"><img src="/images/hd_console_btn.png" alt=""></button></div>
    <ul id="consolItems">
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
            <p id="weatherIcon"><img src="/images/icons/ic_cloudsun.png" alt=""></p>
        </li>
    </ul>
</div>
<div id="placeConsole">
    
    <div id="map"></div>
    <button class="close"></button>
</div>
<div id="timeConsole">

</div>
<div id="weatherConsole">

</div>
<script>
    /* 현재 날짜, 시간 지정 */
    // var clockTarget = document.getElementById("clock");
    // function clock() {
    //     var date = new Date();
    //     var month = date.getMonth();
    //     var clockDate = date.getDate();
    //     var day = date.getDay();
    //     var week = ['일', '월', '화', '수', '목', '금', '토'];
    //     var hours = date.getHours();
    //     var minutes = date.getMinutes();
    //     var seconds = date.getSeconds();
    //     clockTarget.innerText = `${month+1}월 ${clockDate}일 ${week[day]}요일` +
    //     `${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes }`  : minutes }:${seconds < 10 ? `0${seconds }`  : seconds }`;
    // }
    // function init() {
    //     clock();
    //     setInterval(clock, 1000);
    // }
    // init();
    /* 갱신 시간 지정 */

    // console 보이기, 숨기기
    const _hdConsole = document.getElementById("hdConsole");
    _hdConsole.querySelector("#btConsoleToggle").addEventListener("click", function() {
        _hdConsole.classList.toggle("hide");
    });


    _hdConsole.querySelector("#placeName").addEventListener("click", function() {
        document.getElementById("placeConsole").classList.toggle("active");
    });
    _hdConsole.querySelector("#dateTime").addEventListener("click", function() {
        document.getElementById("timeConsole").classList.toggle("active");
    });
    _hdConsole.querySelector("#weatherIcon").addEventListener("click", function() {
        document.getElementById("weatherConsole").classList.toggle("active");
    });

    
    
    

    // TODO 클릭시 해당 기능 열리기 제작

    /******* Clock ********/
    const  clockTarget = document.getElementById("dateTime");
    function clock() {
        var date = new Date();
        var hours = date.getHours();
        var minutes = date.getMinutes();
        clockTarget.innerText = (hours < 10 ? '0' + hours : hours) + ':' + (minutes < 10 ? '0' + minutes : minutes);
    }

    // 시계 작동 시작 ( 1초마다 반복 )
    let runClock;
    function startClock() {
        clock();
        runClock = setInterval(clock, 1000);
    }

    // TODO setInterval이 걸린 clock 함수를 멈출 코드
    function stopClock() {
        clearInterval(runClock);
    }

    // TODO 시간을 지정하고 그 시간에 맞춰 #main에 time_$ 클래스를 추가할 예정
    function setClock(hour, minute) {
        clockTarget.innerText = (hour < 10 ? '0' + hour : hour) + ':' + (minute < 10 ? '0' + minute : minute);
    }

    /* 
    https://apis.map.kakao.com/web/sample/addMapClickEvent/
    카카오맵 지도에 클릭이벤트 달기
    */
    /* 
    https://codepen.io/choiyoungjun90/pen/LYyYdaj
    swiper 시간선택기 코드펜
    */

</script>