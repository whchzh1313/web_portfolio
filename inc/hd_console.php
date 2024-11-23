<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
<style>
    .console_style {box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);position: fixed;right: 24px;border-radius: 4px;background: #fff;transition: opacity ease .3s;padding: 6px 12px;}
    .close_wrap {margin-bottom: 6px;text-align: end;}
    .close_wrap .close {background: url("/images/bt_close_console.png") no-repeat center center;width: 28px;height: 28px;border: 0;transition: all ease .3s;}
    .close_wrap .close:focus {background: url("/images/bt_close_console_on.png") no-repeat center center;}
    #hdConsole {top: 112px;padding: 4px;display: -webkit-box;display: -ms-flexbox;display: -webkit-flex;display: flex;font-size: 1rem;overflow: hidden;}
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

    #timeConsole {top: 160px;display: none;opacity: 0;}
    #weatherConsole {top: 160px;display: none;opacity: 0;}
    #weatherConsole #weatherSelector {display: -webkit-box;display: -ms-flexbox;display: -webkit-flex;display: flex;flex-wrap: wrap;width: 130px;gap: 6px;}
    #weatherConsole #weatherSelector li {}
    #weatherConsole #weatherSelector li img {width: 28px;height: 28px;}

    #placeConsole {top: 160px;display: none;opacity: 0;}
    #placeConsole #map {width: 376px;height:288px;position:relative;overflow:hidden;margin-bottom: 6px;radius: 4px;}

    .select_wrap {text-align: center;}
    .select_wrap .select {width: 100px;line-height: 32px;color: #ffffff;background: #6070DD;border-radius: 4px;border: 0;}
    .select_wrap .select:focus {background: #46529F;}

    .hAddr {position: absolute;left: 22px;top: 46px;border-radius: 4px;background: rgba(255,255,255,0.8);z-index: 1;padding: 6px;}
    .hAddr .title {font-weight: bold;display: block;}
    .hAddr #centerAddr {display: block;margin-top: 2px;font-weight: normal;}
    .bAddr {padding: 5px;text-overflow: ellipsis;overflow: hidden;white-space: nowrap;}
</style>
<div id="hdConsole" class="console_style">
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
        <li value="sun"><img src="/images/icons/ic_sun.png" alt="맑음"></li>
        <li value="cloud"><img src="/images/icons/ic_cloud.png" alt="구름많음"></li>
        <li value="cloudsun"><img src="/images/icons/ic_cloudsun.png" alt="흐림"></li>
        <li value="rain"><img src="/images/icons/ic_rain.png" alt="비"></li>
        <li value="raindrop"><img src="/images/icons/ic_raindrop.png" alt="빗방울"></li>
        <li value="snow"><img src="/images/icons/ic_snow.png" alt="눈"></li>
        <li value="snowrain"><img src="/images/icons/ic_snowrain.png" alt="눈비"></li>
        <li value="snowraindrop"><img src="/images/icons/ic_snowraindrop.png" alt="눈빗방울"></li>
    </ul>
    <div class="select_wrap">
        <button class="select">변경</button>
    </div>
</div>
<script>
   
    // 카카오맵 load
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
        mapOption = { 
            center: new kakao.maps.LatLng(37.4092138888888, 127.132319444444), // 지도의 중심좌표
            level: 5 // 지도의 확대 레벨
        };	
    // 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
    var map = new kakao.maps.Map(mapContainer, mapOption); 

    // 주소-좌표 변환 객체를 생성합니다
    var geocoder = new kakao.maps.services.Geocoder();

    var marker = new kakao.maps.Marker(), // 클릭한 위치를 표시할 마커입니다
        infowindow = new kakao.maps.InfoWindow({zindex:1}); // 클릭한 위치에 대한 주소를 표시할 인포윈도우입니다

    // 현재 지도 중심좌표로 주소를 검색해서 지도 좌측 상단에 표시합니다
    searchAddrFromCoords(map.getCenter(), displayCenterInfo);

    // 지도를 클릭했을 때 클릭 위치 좌표에 대한 주소정보를 표시하도록 이벤트를 등록합니다
    kakao.maps.event.addListener(map, 'click', function(mouseEvent) {
        searchDetailAddrFromCoords(mouseEvent.latLng, function(result, status) {
            if (status === kakao.maps.services.Status.OK) {
                // 마커 클릭시 마커만 나오고 인포 윈도우는 나오지 않게 수정했습니다.
                // var detailAddr = !!result[0].road_address ? '<div>도로명주소 : ' + result[0].road_address.address_name + '</div>' : '';
                // detailAddr += '<div>지번 주소 : ' + result[0].address.address_name + '</div>';

                // var content =   '<div class="bAddr">' +
                //                     '<span class="title">법정동 주소정보</span>' + 
                //                     detailAddr + 
                //                 '</div>';

                // 마커를 클릭한 위치에 표시합니다 
                marker.setPosition(mouseEvent.latLng);
                marker.setMap(map);
                
                // // 인포윈도우에 클릭한 위치에 대한 법정동 상세 주소정보를 표시합니다
                // infowindow.setContent(content);
                // infowindow.open(map, marker);

                searchAddrFromCoords(mouseEvent.latLng, displayCenterInfo);
            }   
        });
    });

    // 중심 좌표나 확대 수준이 변경됐을 때 지도 중심 좌표에 대한 주소 정보를 표시하도록 이벤트를 등록합니다
    // kakao.maps.event.addListener(map, 'idle', function() {
    //     searchAddrFromCoords(map.getCenter(), displayCenterInfo);
    // });

    function searchAddrFromCoords(coords, callback) {
        // 좌표로 행정동 주소 정보를 요청합니다
        geocoder.coord2RegionCode(coords.getLng(), coords.getLat(), callback);         
    }

    function searchDetailAddrFromCoords(coords, callback) {
        // 좌표로 법정동 상세 주소 정보를 요청합니다
        geocoder.coord2Address(coords.getLng(), coords.getLat(), callback);
    }

    // 지도 좌측상단에 지도 중심좌표에 대한 주소정보를 표출하는 함수입니다
    function displayCenterInfo(result, status) {
        if (status === kakao.maps.services.Status.OK) {
            var infoDiv = document.getElementById('centerAddr');

            for(var i = 0; i < result.length; i++) {
                // 행정동의 region_type 값은 'H' 이므로
                if (result[i].region_type === 'H') {
                    infoDiv.innerHTML = result[i].address_name;
                    searchAdministrativeArea(result[i].address_name);
                    break;
                }
            }
        }    
    }
    
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

    const _placeConsole = document.getElementById("placeConsole")
    const _timeConsole = document.getElementById("timeConsole")
    const _weatherConsole = document.getElementById("weatherConsole")
    _hdConsole.querySelector("#placeName").addEventListener("click", function() {
        _placeConsole.classList.toggle("active");
        if (_placeConsole.classList.contains('active')) {
            fadeIn(_placeConsole);
        } else {
            fadeOut(_placeConsole);
        }
    });
    _hdConsole.querySelector("#dateTime").addEventListener("click", function() {
        _timeConsole.classList.toggle("active");
        if (_timeConsole.classList.contains('active')) {
            fadeIn(_timeConsole);
        } else {
            fadeOut(_timeConsole);
        }
    });
    _hdConsole.querySelector("#weatherIcon").addEventListener("click", function() {
        _weatherConsole.classList.toggle("active");
        if (_weatherConsole.classList.contains('active')) {
            fadeIn(_weatherConsole);
        } else {
            fadeOut(_weatherConsole);
        }
    });

    _placeConsole.querySelector(".close").addEventListener("click", function () {
        _placeConsole.classList.remove("active");
        fadeOut(_placeConsole);
        // 1
    });
    _timeConsole.querySelector(".close").addEventListener("click", function () {
        _timeConsole.classList.remove("active");
        fadeOut(_timeConsole);
        // 1
    });
    _weatherConsole.querySelector(".close").addEventListener("click", function () {
        _weatherConsole.classList.remove("active");
        fadeOut(_weatherConsole);
        // 1
    });
    function fadeAllOut () {
        _placeConsole.style.opacity = 0; // 페이드 아웃 효과
        _timeConsole.style.opacity = 0; // 페이드 아웃 효과
        _weatherConsole.style.opacity = 0; // 페이드 아웃 효과
        setTimeout(() => {
            _placeConsole.style.display = 'none'; // 요소를 숨김
            _timeConsole.style.display = 'none'; // 요소를 숨김
            _weatherConsole.style.display = 'none'; // 요소를 숨김
        }, 200); // transition 시간과 일치시킴
    }
    function fadeIn (selectElement) {
        selectElement.style.display = 'block'; // 요소를 보이게 함
        if (selectElement == _placeConsole) {
            map.relayout();
        }
        setTimeout(() => {
            selectElement.style.opacity = 1; // 페이드 인 효과
        }, 300); // display가 block으로 설정된 후 opacity를 변경
    }
    function fadeOut (selectElement) {
        selectElement.style.opacity = 0; // 페이드 아웃 효과
        setTimeout(() => {
            selectElement.style.display = 'none'; // 요소를 숨김
        }, 300); // transition 시간과 일치시킴
    }

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
        /* 
            TODO 
            시간 데이터에 따른 time 구분 메서드 호출
            값에 맞는 시간을 불러오고 불러온 시간을 토대로
            main.js의 단기예보 api를 호출
        
        */
    }



    /* 
    https://apis.map.kakao.com/web/sample/addMapClickEvent/
    카카오맵 지도에 클릭이벤트 달기

    https://apis.map.kakao.com/web/sample/coord2addr/
    좌표로 주소, 행정동 알아내기

    https://olrlobt.tistory.com/67
    카카오맵 시군구 폴리곤 클릭이벤트
    */
    // JSON 파일을 불러오는 함수
    async function fetchData() {
        try {
            const response = await fetch('/json/administrative_areas.json'); // JSON 파일 경로
            const data = await response.json();

            return data;
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    // 검색 함수
    async function searchAdministrativeArea(area) {
        const data = await fetchData();

        // 같은 항목의 grid_x, grid_y 추출
        const result = data
            .filter(item => item.administrative_area_name == area)
            .map(item => ({
                grid_x: item.grid_x,
                grid_y: item.grid_y
            }));

        console.log(result);
        /* 
            TODO 
            행정구 데이터 전송 
            값에 맞는 좌표 불러오기
            main.js의 단기예보 api를 위치에 맞게 다시 호출
        
        */
        // setGridXY(grid_x, grid_y);
    }
    // function setGridXY(x, y) {
    //     setting_x = x;
    //     setting_y = y;
    // }
        
    
    function setWeather () {
        /* 
            TODO 
            날씨 아이콘 클릭시 배경에서 보여주는 효과 변경
        
        */
        
    }

</script>