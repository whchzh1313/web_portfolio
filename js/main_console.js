document.addEventListener("DOMContentLoaded", function () {
    // 카카오맵 load
    var mapContainer = document.getElementById("map"), // 지도를 표시할 div 
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
    kakao.maps.event.addListener(map, "click", function(mouseEvent) {
        searchDetailAddrFromCoords(mouseEvent.latLng, function(result, status) {
            if (status === kakao.maps.services.Status.OK) {
                // 클릭한 위치에 마커를 표시합니다.
                marker.setPosition(mouseEvent.latLng);
                marker.setMap(map);

                searchAddrFromCoords(mouseEvent.latLng, displayCenterInfo);
            }   
        });
    });

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
            var infoDiv = document.getElementById("centerAddr");

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
        if (_placeConsole.classList.contains("active")) {
            fadeIn(_placeConsole);
        } else {
            fadeOut(_placeConsole);
        }
    });
    _hdConsole.querySelector("#dateTime").addEventListener("click", function() {
        _timeConsole.classList.toggle("active");
        if (_timeConsole.classList.contains("active")) {
            fadeIn(_timeConsole);
        } else {
            fadeOut(_timeConsole);
        }
    });
    _hdConsole.querySelector("#weatherIcon").addEventListener("click", function() {
        _weatherConsole.classList.toggle("active");
        if (_weatherConsole.classList.contains("active")) {
            fadeIn(_weatherConsole);
        } else {
            fadeOut(_weatherConsole);
        }
    });

    _placeConsole.querySelector(".close").addEventListener("click", function () {
        _placeConsole.classList.remove("active");
        fadeOut(_placeConsole);
    });
    _timeConsole.querySelector(".close").addEventListener("click", function () {
        _timeConsole.classList.remove("active");
        fadeOut(_timeConsole);
    });
    _weatherConsole.querySelector(".close").addEventListener("click", function () {
        _weatherConsole.classList.remove("active");
        fadeOut(_weatherConsole);
    });
    function fadeAllOut () {
        _placeConsole.style.opacity = 0; // 페이드 아웃 효과
        _timeConsole.style.opacity = 0; // 페이드 아웃 효과
        _weatherConsole.style.opacity = 0; // 페이드 아웃 효과
        setTimeout(() => {
            _placeConsole.style.display = "none"; // 요소를 숨김
            _timeConsole.style.display = "none"; // 요소를 숨김
            _weatherConsole.style.display = "none"; // 요소를 숨김
        }, 200); // transition 시간과 일치시킴
    }
    function fadeIn (selectElement) {
        selectElement.style.display = "block"; // 요소를 보이게 함
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
            selectElement.style.display = "none"; // 요소를 숨김
        }, 300); // transition 시간과 일치시킴
    }
    
    /******* Clock ********/
    const  clockTarget = document.getElementById("dateTime");
    function clock() {
        var date = new Date();
        var hours = date.getHours();
        var minutes = date.getMinutes();
        clockTarget.innerText = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes);
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
    
    document.getElementById("upTime").addEventListener("click", function () {
        document.getElementById("selectTime").querySelector(".hour").innerText = "클릭이 되었다";        
    });
    document.getElementById("downTime").addEventListener("click", function () {
        document.getElementById("selectTime").querySelector(".hour").innerText = "클릭이 되었다";
    });
    // TODO 시간을 지정하고 그 시간에 맞춰 #main에 time_$ 클래스를 추가할 예정
    function setClock(hour, minute) {
        clockTarget.innerText = (hour < 10 ? "0" + hour : hour) + ":" + (minute < 10 ? "0" + minute : minute);
        /* 
            TODO 
            시간 데이터에 따른 time 구분 메서드 호출
            값에 맞는 시간을 불러오고 불러온 시간을 토대로
            main.js의 단기예보 api를 호출        
        */
    }
    
    startClock();
    
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
            const response = await fetch("/json/administrative_areas.json"); // JSON 파일 경로
            const data = await response.json();
        
            return data;
        } catch (error) {
            console.error("Error fetching data:", error);
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
    // 날짜 클릭시 active효과
    for (let i = 0; i < document.getElementById("weatherSelector").children.length; i++) {
        document.getElementById("weatherSelector").children[i].addEventListener("click",function () {
            const siblings = this.parentElement.children;
            console.log(siblings);
            console.log(this);
            if (!this.classList.contains("active")) {
                for (let j = 0; j < siblings.length; j++) {
                    siblings[j].classList.remove("active");
                }
                this.classList.add("active");
            } else {
                this.classList.remove("active");
            }
        });
    }
    function setWeather () {
        /* 
            TODO 
            변경 버튼을 눌렀을 때 설정
        */
    }

});