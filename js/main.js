import config from "./config.js";
document.addEventListener("DOMContentLoaded", function () {
  const API_KEY = config.API_KEY;
  /**** 현재 날짜, 시간 불러오고 api에 요청할 데이터 입력 ****************/
  // !!!중요) 날씨 데이터 코드보다 먼저 불러와야함
  let today = new Date();
  let todayYear = today.getFullYear();
  let todayMonth = today.getMonth() + 1;
  let todayDate = today.getDate().toString().padStart(2, "0");
  let nowHour = today.getHours();

  let weather;
  let grid_x = 62;
  let grid_y = 123;
  let data_x;
  let data_y;
  let forecastHour;
  let loadTimeHour;
  let forecastHours = ["02", "05", "08", "11", "14", "17", "20", "23"];

  let timeValue;
  let editTimeValue;

  let selectPlace;

  const _contentWrap = document.getElementById("contentWrap");

  const _hdConsole = document.getElementById("hdConsole");

  const _wdSun = document.getElementById("wdSun");
  const _wdCloudsun = document.getElementById("wdCloudsun");
  const _wdCloud = document.getElementById("wdCloud");
  const _wdRain = document.getElementById("wdRain");
  const _wdSnowrain = document.getElementById("wdSnowrain");
  const _wdSnow = document.getElementById("wdSnow");
  const _wdRaindrop = document.getElementById("wdRaindrop");
  const _wdSnowraindrop = document.getElementById("wdSnowraindrop");

  const _weatherImg = document.getElementById("weatherImg");

  const _weatherBg = document.getElementById("weatherBg");

  const _placeConsole = document.getElementById("placeConsole");
  const _timeConsole = document.getElementById("timeConsole");
  const _weatherConsole = document.getElementById("weatherConsole");

  const _upTime = document.getElementById("upTime");
  const _downTime = document.getElementById("downTime");

  const _aboutMe = document.getElementById("aboutMe");
  let aboutMeTop = _aboutMe.getBoundingClientRect().top + window.scrollY - 65;
  const _skills = document.getElementById("skills");
  let skillsTop = _skills.getBoundingClientRect().top + window.scrollY - 65;
  const _projects = document.getElementById("projects");
  let projectsTop = _projects.getBoundingClientRect().top + window.scrollY - 65;
  const _footer = document.getElementById("projects");
  let footerTop = _footer.getBoundingClientRect().top + window.scrollY - 65;

  window.addEventListener("resize", function () {
    aboutMeTop = _aboutMe.getBoundingClientRect().top + window.scrollY - 65;
    skillsTop = _skills.getBoundingClientRect().top + window.scrollY - 65;
    projectsTop = _projects.getBoundingClientRect().top + window.scrollY - 65;
    footerTop = _footer.getBoundingClientRect().top + window.scrollY - 65;
  });
  function convertTime(hour) {
    if (hour < 2) {
      // 월을 감소시킴
      todayMonth--;
      // 1월에서 12월로 넘어갈 경우 연도를 감소시킴
      if (todayMonth < 1) {
        todayMonth = 12;
        todayYear--;
      }
      timeValue = 7;
    } else if (hour >= 2 && hour < 5) {
      timeValue = 0;
    } else if (hour >= 5 && hour < 8) {
      timeValue = 1;
    } else if (hour >= 8 && hour < 11) {
      timeValue = 2;
    } else if (hour >= 11 && hour < 14) {
      timeValue = 3;
    } else if (hour >= 14 && hour < 17) {
      timeValue = 4;
    } else if (hour >= 17 && hour < 20) {
      timeValue = 5;
    } else if (hour >= 20 && hour < 23) {
      timeValue = 6;
    } else {
      timeValue = 7;
    }
    forecastHour = forecastHours[timeValue];
    loadTimeHour = forecastHour;
  }

  convertTime(nowHour);

  /**** document init ****************/
  AOS.init();

  window.addEventListener("resize", function () {
    AOS.refresh();
  });
  // const $main = document.getElementById('main');
  // $main.classList.add('time_' + forecastHour);

  _contentWrap.classList.add("time_" + forecastHour);
  /**** 프로젝트 슬라이더 ****************/
  $("#project_slk").slick({
    fade: true,
    cssEase: "cubic-bezier(0.7,0,0.2,1)",
    infinite: true,
    dots: false,
    arrows: false,
    speed: 400,
    draggable: false,
    asNavFor: $("#project_slk_nav"),
  });
  $("#project_slk_nav").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    cssEase: "cubic-bezier(0.7,0,0.2,1)",
    infinite: true,
    dots: false,
    arrows: true,
    speed: 400,
    variableWidth: true,
    centerMode: true,
    draggable: false,
    focusOnSelect: true,
    prevArrow: $("#project_slk_prev"),
    nextArrow: $("#project_slk_next"),
    asNavFor: $("#project_slk"),
  });

  $("#project_slk .project_detail .detail_slk").each(function () {
    if (!$(this).hasClass("slick-initialized")) {
      initDetailSlick($(this));
    }
  });
  /**** 프로젝트 슬라이더 끝 ****************/

  // 클릭이벤트가 초기화가 문제가 생겨서 이벤트 삭제 후 다시 등록.
  $("#project_detail_slk_next_arrow")
    .off("click")
    .on("click", function () {
      $("#project_slk .slick-current .detail_slk").slick("slickNext");
    });
  scrollCheck();

  $(document).on("scroll", function () {
    scrollCheck();
  });

  function gnbPassiver() {
    if ($("#gnb").hasClass("active")) {
      $(".mobile_menu_trigger").removeClass("active");
      $("#gnb").removeClass("active");
    }
  }
  $(".scroll_top").on("click", function () {
    gnbPassiver();
    $("html,body").stop().animate({ scrollTop: 0 }, 500);
  });
  $("#moveAboutMe").on("click", function () {
    gnbPassiver();
    $("html,body").stop().animate({ scrollTop: aboutMeTop }, 500);
  });
  $("#moveSkill").on("click", function () {
    gnbPassiver();
    $("html,body").stop().animate({ scrollTop: skillsTop }, 500);
  });
  $("#moveProject").on("click", function () {
    gnbPassiver();
    $("html,body").stop().animate({ scrollTop: projectsTop }, 500);
  });
  $("#moveFooter").on("click", function () {
    gnbPassiver();
    $("html,body").stop().animate({ scrollTop: footerTop }, 500);
  });

  /**** 모바일 헤더 ****************/

  $("#header .mobile_menu_trigger").on("click", function () {
    $(".mobile_menu_trigger").toggleClass("active");
    $("#gnb").toggleClass("active");
  });

  /**** 스크롤 체크, 헤더에 효과 ****************/
  function scrollCheck() {
    if ($(window).scrollTop() > 50) {
      $("#header").addClass("scrollRun");
    } else {
      $("#header").removeClass("scrollRun");
    }
  }

  /**** 프로젝트 디테일 슬라이더에 슬라이드를 작동시키기 위해 적용 ****************/
  function initDetailSlick($slk) {
    $slk.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      dots: true,
      draggable: false,
      arrows: true,
      prevArrow: $("#project_detail_slk_prev_arrow"),
      nextArrow: $("#project_detail_slk_next_arrow"),
      speed: 400,
      autoplay: false,
      fade: true,
    });
  }
  // 예보된 날씨를 화면에 보여줄 컨텐츠를 생성함

  function dropRain(count = 100) {
    for (let i = 0; i < count; i++) {
      const _rainDrop = document.createElement("div");
      _rainDrop.classList.add("rain");
      _rainDrop.style.left = Math.random() * _weatherBg.offsetWidth + "px";
      _rainDrop.style.animationDuration = Math.random() * 1 + 0.5 + "s";
      _weatherBg.appendChild(_rainDrop);
    }
  }

  function dropSnow(count = 100) {
    for (let i = 0; i < count; i++) {
      const _snow = document.createElement("div");
      _snow.classList.add("snow");
      _snow.style.left = Math.random() * _weatherBg.offsetWidth + "px";
      const delay = Math.random() * 3;
      _snow.style.animationDelay = delay + "s";
      _snow.style.animationDuration = Math.random() * 5 + 2 + "s";
      _weatherBg.appendChild(_snow);
    }
  }

  function moveClouds(count = 10) {
    for (let i = 0; i < count; i++) {
      const _cloud = document.createElement("div");
      _cloud.classList.add("cloud");

      const cloudWidth = Math.random() * 100 + 50;
      const cloudHeight = cloudWidth * 0.5;

      _cloud.style.width = cloudWidth + "px";
      _cloud.style.height = cloudHeight + "px";
      _cloud.style.top = Math.random() * 100 + "px";
      const cloudIndex = Math.floor(Math.random() * 5);
      _cloud.style.backgroundImage =
        "url(/images/clouds/cloud_" + cloudIndex + ".png)";
      const delay = Math.random() * 3;
      _cloud.style.animationDelay = delay + "s";
      _cloud.style.animationDuration = Math.random() * 15 + 10 + "s";
      _weatherBg.appendChild(_cloud);
    }
  }
  // 모든 날씨효과 삭제
  function clearWeather() {
    _weatherBg.innerHTML = "";
  }

  // 단기예보에서 현재위치에 예보된 날씨를 요청함
  function requestForecastWeather(placeX, placeY, time) {
    var xhr = new XMLHttpRequest();
    xhr.open(
      "GET",
      "https://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getVilageFcst?serviceKey=" +
        API_KEY +
        "&pageNo=1&numOfRows=12&dataType=JSON&base_date=" +
        todayYear +
        todayMonth +
        todayDate +
        "&base_time=" +
        time +
        "00&nx=" +
        placeX +
        "&ny=" +
        placeY,
      true
    ); // 요청 초기화
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        // 요청이 완료되었을 때
        if (xhr.status === 200) {
          // 응답이 성공적일 때
          try {
            var data = JSON.parse(xhr.responseText); // JSON 문자열을 객체로 변환
            // items.item이 배열인지 확인
            if (Array.isArray(data.response.body.items.item)) {
              // 배열에서 날씨여부 체크
              // 강수형태(PTY) 코드 : (초단기) 없음(0), 비(1), 비/눈(2), 눈(3), 빗방울(5), 빗방울눈날림(6), 눈날림(7)
              // 하늘상태(SKY) 코드 : 맑음(1), 구름많음(3), 흐림(4)
              const nowWeather = data.response.body.items.item.find(function (
                weather
              ) {
                return weather.category === "PTY"; // 강수 형태 체크
              });
              switch (nowWeather.fcstValue) {
                case "0": // 없음
                  const nowSky = data.response.body.items.item.find(function (
                    sky
                  ) {
                    return sky.category === "SKY"; // 강수 형태가 없을 때 하늘상태 체크
                  });
                  switch (nowSky.fcstValue) {
                    case "1": // 맑음
                      clearWeather();
                      weatherSelectorRemoveActive();
                      _weatherImg.src = "/images/icons/ic_sun.png";
                      _wdSun.classList.add("active");
                      break;
                    case "3": // 구름많음
                      clearWeather();
                      weatherSelectorRemoveActive();
                      _weatherImg.src = "/images/icons/ic_cloudsun.png";
                      _wdCloudsun.classList.add("active");
                      moveClouds();
                      break;
                    case "4": // 흐림
                      clearWeather();
                      weatherSelectorRemoveActive();
                      _weatherImg.src = "/images/icons/ic_cloud.png";
                      _wdCloud.classList.add("active");
                      moveClouds(32);
                      break;
                    default:
                      break;
                  }
                  // 현재 하늘상태 체크 종료
                  break;
                case "1": // 비
                  clearWeather();
                  weatherSelectorRemoveActive();
                  _weatherImg.src = "/images/icons/ic_rain.png";
                  _wdRain.classList.add("active");
                  dropRain();
                  break;
                case "2": // 눈비
                  clearWeather();
                  weatherSelectorRemoveActive();
                  _weatherImg.src = "/images/icons/ic_snowrain.png";
                  _wdSnowrain.classList.add("active");
                  dropRain(50);
                  dropSnow(50);
                  break;
                case "3": // 눈
                  clearWeather();
                  weatherSelectorRemoveActive();
                  _weatherImg.src = "/images/icons/ic_snow.png";
                  _wdSnow.classList.add("active");
                  dropSnow();
                  break;
                case "5": // 빗방울
                  clearWeather();
                  weatherSelectorRemoveActive();
                  _weatherImg.src = "/images/icons/ic_raindrop.png";
                  _wdRaindrop.classList.add("active");
                  dropRain(50);
                  break;
                case "6": // 빗방울눈날림
                  clearWeather();
                  weatherSelectorRemoveActive();
                  _weatherImg.src = "/images/icons/ic_snowraindrop.png";
                  _wdSnowraindrop.classList.add("active");
                  dropRain(25);
                  dropSnow(25);
                  break;
                case "7": // 눈날림
                  clearWeather();
                  weatherSelectorRemoveActive();
                  _weatherImg.src = "/images/icons/ic_snow.png";
                  _wdSnow.classList.add("active");
                  dropSnow(50);
                  break;
                default:
                  break;
              }
            } else {
              console.error(
                "강수형태(PTY) 또는 하늘상태(SKY) 정보를 찾을 수 없습니다."
              );
            }
          } catch (e) {
            console.error("Error parsing JSON:", e); // JSON 파싱 에러 처리
          }
        } else {
          console.error("Error fetching data:", xhr.statusText); // 오류 처리
        }
      }
    };

    xhr.send(); // 요청 전송
  }
  requestForecastWeather(grid_x, grid_y, forecastHour);

  // 카카오맵 load
  var mapContainer = document.getElementById("map"), // 지도를 표시할 div
    mapOption = {
      center: new kakao.maps.LatLng(37.4092138888888, 127.132319444444), // 지도의 중심좌표
      level: 5, // 지도의 확대 레벨
    };
  // 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
  var map = new kakao.maps.Map(mapContainer, mapOption);

  // 주소-좌표 변환 객체를 생성합니다
  var geocoder = new kakao.maps.services.Geocoder();

  var marker = new kakao.maps.Marker(), // 클릭한 위치를 표시할 마커입니다
    infowindow = new kakao.maps.InfoWindow({ zindex: 1 }); // 클릭한 위치에 대한 주소를 표시할 인포윈도우입니다

  // 현재 지도 중심좌표로 주소를 검색해서 지도 좌측 상단에 표시합니다
  searchAddrFromCoords(map.getCenter(), displayCenterInfo);

  // 지도를 클릭했을 때 클릭 위치 좌표에 대한 주소정보를 표시하도록 이벤트를 등록합니다
  kakao.maps.event.addListener(map, "click", function (mouseEvent) {
    searchDetailAddrFromCoords(mouseEvent.latLng, function (result, status) {
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

      for (var i = 0; i < result.length; i++) {
        // 행정동의 region_type 값은 'H' 이므로
        if (result[i].region_type === "H") {
          infoDiv.innerHTML = result[i].address_name;
          selectPlace = result[i].address_name;
          searchAdministrativeArea(result[i].address_name);
          break;
        }
      }
    }
  }
  let totalWidth;
  const _consoleItems = document.getElementById("consoleItems");
  const $consoleItems = $("#consoleItems");
  const childElements = _consoleItems.children;
  function getTotalChildWidth() {
    totalWidth = 0;
    Array.from(childElements).forEach(child => {
      totalWidth += child.getBoundingClientRect().width;
    });
  }

  setTimeout(() => {
    getTotalChildWidth();
    _consoleItems.width = totalWidth + "px";
  }, 1000);
  // console 보이기, 숨기기
  _hdConsole
    .querySelector("#btConsoleToggle")
    .addEventListener("click", function () {
      if (totalWidth != 0) {
        if (_hdConsole.classList.contains("hide")) {
          _hdConsole.classList.remove("hide");
          $consoleItems.stop().animate({ width: totalWidth }, 300);
        } else {
          _hdConsole.classList.add("hide");
          $consoleItems.stop().animate({ width: 0 }, 300);
        }
      }
    });
  window.addEventListener("resize", function () {
    if (_hdConsole.classList.contains("hide")) {
      $consoleItems.stop().animate({ width: 0 }, 300);
    } else {
      getTotalChildWidth();
      $consoleItems.stop().css("width", totalWidth);
    }
  });
  _timeConsole.querySelector(".hour").innerHTML = forecastHour;

  _hdConsole.querySelector("#placeName").addEventListener("click", function () {
    _placeConsole.classList.toggle("active");
    if (_placeConsole.classList.contains("active")) {
      fadeIn(_placeConsole);
    } else {
      fadeOut(_placeConsole);
    }
  });
  _hdConsole.querySelector("#dateTime").addEventListener("click", function () {
    _timeConsole.classList.toggle("active");
    if (_timeConsole.classList.contains("active")) {
      editTimeValue = timeValue;
      document.getElementById("selectTime").querySelector(".hour").innerText =
        forecastHours[editTimeValue];
      fadeIn(_timeConsole);
    } else {
      fadeOut(_timeConsole);
    }
  });
  _hdConsole
    .querySelector("#weatherIcon")
    .addEventListener("click", function () {
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
  _weatherConsole
    .querySelector(".close")
    .addEventListener("click", function () {
      _weatherConsole.classList.remove("active");
      fadeOut(_weatherConsole);
    });

  _placeConsole.querySelector(".select").addEventListener("click", function () {
    // 지역 선택 기능
    stopClock();
    setGridXY(data_x, data_y);
    _hdConsole.querySelector("#placeName").innerText = selectPlace;
    _contentWrap.classList.remove("time_" + forecastHour);
    forecastHour = loadTimeHour;
    clockTarget.innerText = forecastHour + ":00";
    _contentWrap.classList.add("time_" + forecastHour);
    requestForecastWeather(grid_x, grid_y, forecastHour);
    _placeConsole.classList.remove("active");
    fadeOut(_placeConsole);
  });

  _timeConsole.querySelector(".select").addEventListener("click", function () {
    // 시간 선택 기능
    stopClock();
    _contentWrap.classList.remove("time_" + forecastHour);
    forecastHour = forecastHours[editTimeValue];
    clockTarget.innerText = forecastHour + ":00";
    _contentWrap.classList.add("time_" + forecastHour);
    _timeConsole.classList.remove("active");
    fadeOut(_timeConsole);
  });
  //   let forecastHours = ["02", "05", "08", "11", "14", "17", "20", "23"];
  _upTime.addEventListener("click", function () {
    if (editTimeValue == 7) {
      editTimeValue = 0;
    } else {
      editTimeValue++;
    }
    document.getElementById("selectTime").querySelector(".hour").innerText =
      forecastHours[editTimeValue];
  });
  _downTime.addEventListener("click", function () {
    if (editTimeValue == 0) {
      editTimeValue = 7;
    } else {
      editTimeValue--;
    }
    document.getElementById("selectTime").querySelector(".hour").innerText =
      forecastHours[editTimeValue];
  });
  _weatherConsole
    .querySelector(".select")
    .addEventListener("click", function () {
      // 날씨 선택 기능
      setWeather();
      _weatherConsole.classList.remove("active");
      fadeOut(_weatherConsole);
    });

  function fadeAllOut() {
    _placeConsole.style.opacity = 0; // 페이드 아웃 효과
    _timeConsole.style.opacity = 0; // 페이드 아웃 효과
    _weatherConsole.style.opacity = 0; // 페이드 아웃 효과
    setTimeout(() => {
      _placeConsole.style.display = "none"; // 요소를 숨김
      _timeConsole.style.display = "none"; // 요소를 숨김
      _weatherConsole.style.display = "none"; // 요소를 숨김
    }, 200); // transition 시간과 일치시킴
  }
  function fadeIn(selectElement) {
    selectElement.style.display = "block"; // 요소를 보이게 함
    if (selectElement == _placeConsole) {
      map.relayout();
    }
    setTimeout(() => {
      selectElement.style.opacity = 1; // 페이드 인 효과
    }, 300); // display가 block으로 설정된 후 opacity를 변경
  }
  function fadeOut(selectElement) {
    selectElement.style.opacity = 0; // 페이드 아웃 효과
    setTimeout(() => {
      selectElement.style.display = "none"; // 요소를 숨김
    }, 300); // transition 시간과 일치시킴
  }

  /******* Clock ********/
  const clockTarget = document.getElementById("dateTime");
  function clock() {
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    clockTarget.innerText =
      (hours < 10 ? "0" + hours : hours) +
      ":" +
      (minutes < 10 ? "0" + minutes : minutes);
  }

  // 시계 작동 시작 ( 1초마다 반복 )
  let runClock;
  function startClock() {
    clock();
    runClock = setInterval(clock, 1000);
  }

  function stopClock() {
    clearInterval(runClock);
  }

  function setClock(hour, minute) {
    clockTarget.innerText =
      (hour < 10 ? "0" + hour : hour) +
      ":" +
      (minute < 10 ? "0" + minute : minute);
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
      .filter((item) => item.administrative_area_name == area)
      .map((item) => ({
        x: item.grid_x,
        y: item.grid_y,
      }));
    data_x = result[0].x;
    data_y = result[0].y;
  }
  function setGridXY(x, y) {
    grid_x = x;
    grid_y = y;
  }
  // 날짜 클릭시 active효과
  for (
    let i = 0;
    i < document.getElementById("weatherSelector").children.length;
    i++
  ) {
    document
      .getElementById("weatherSelector")
      .children[i].addEventListener("click", function () {
        const siblings = this.parentElement.children;
        if (!this.classList.contains("active")) {
          weatherSelectorRemoveActive();
          this.classList.add("active");
        } else {
          this.classList.remove("active");
        }
      });
  }
  function weatherSelectorRemoveActive() {
    for (
      let j = 0;
      j < document.getElementById("weatherSelector").children.length;
      j++
    ) {
      document
        .getElementById("weatherSelector")
        .children[j].classList.remove("active");
    }
  }

  function setWeather() {
    let weatherValue = document
      .getElementById("weatherSelector")
      .querySelector(".active")
      .getAttribute("value");
    switch (weatherValue) {
      case "sun":
        clearWeather();
        _weatherImg.src = "/images/icons/ic_sun.png";
        break;
      case "cloud":
        clearWeather();
        _weatherImg.src = "/images/icons/ic_cloud.png";
        moveClouds(32);
        break;
      case "cloudsun":
        clearWeather();
        _weatherImg.src = "/images/icons/ic_cloudsun.png";
        moveClouds();
        break;
      case "rain":
        clearWeather();
        _weatherImg.src = "/images/icons/ic_rain.png";
        dropRain();
        break;
      case "raindrop":
        clearWeather();
        _weatherImg.src = "/images/icons/ic_raindrop.png";
        dropRain(50);
      case "snow":
        clearWeather();
        _weatherImg.src = "/images/icons/ic_snow.png";
        dropSnow();
        break;
      case "snowrain":
        clearWeather();
        _weatherImg.src = "/images/icons/ic_snowrain.png";
        dropRain(50);
        dropSnow(50);
        break;
      case "snowraindrop":
        clearWeather();
        _weatherImg.src = "/images/icons/ic_snowraindrop.png";
        dropRain(25);
        dropSnow(25);
        break;
      default:
        break;
    }
  }

  // 튜토리얼 보이기
  
});
