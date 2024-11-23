import config from "./config.js";
const API_KEY = config.API_KEY;

/**** 현재 날짜, 시간 불러오고 api에 요청할 데이터 입력 ****************/
// !!!중요) 날씨 데이터 코드보다 먼저 불러와야함
let today = new Date();
let todayYear = today.getFullYear();
let todayMonth = today.getMonth()+1;
let todayDate = (today.getDate()).toString().padStart(2, '0');
let nowHour = today.getHours();

let forecastHour;

function selectTime (hour) {
    if (hour < 2) {
        // 월을 감소시킴
        todayMonth--; 
        // 1월에서 12월로 넘어갈 경우 연도를 감소시킴
        if (todayMonth < 1) {
            todayMonth = 12;
            todayYear--; 
        }
        forecastHour = "23";
    } else if (hour >= 2 && hour < 5) {
        forecastHour = "2";
    } else if (hour >= 5 && hour < 8) {
        forecastHour = "5";
    } else if (hour >= 8 && hour < 11) {
        forecastHour = "8";
    } else if (hour >= 11 && hour < 14) {
        forecastHour = "11";
    } else if (hour >= 14 && hour < 17) {
        forecastHour = "14";
    } else if (hour >= 17 && hour < 20) {
        forecastHour = "17";
    } else if (hour >= 20 && hour < 23) {
        forecastHour = "20";
    } else {
        forecastHour = "23";
    }
    forecastHour = forecastHour.padStart(2, '0');
    console.log(forecastHour);
}

selectTime(nowHour);

$(document).ready(function() {
    /**** document init ****************/
    AOS.init();
    // const $main = document.getElementById('main');
    // $main.classList.add('time_' + forecastHour);
    const _contentWrap = document.getElementById('contentWrap');
    _contentWrap.classList.add('time_' + forecastHour);
    /**** 프로젝트 슬라이더 ****************/
    $('#project_slk').slick({
        fade: true,
        cssEase: 'cubic-bezier(0.7,0,0.2,1)',
        infinite: true,
        dots: false,
        arrows: false,
        speed: 400,
        draggable: false,
        asNavFor: $('#project_slk_nav')
    });
    $('#project_slk_nav').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        cssEase: 'cubic-bezier(0.7,0,0.2,1)',
        infinite: true,
        dots: false,
        arrows: true,
        speed: 400,
        variableWidth: true,
        centerMode: true,
        draggable: false,
        focusOnSelect: true,
        prevArrow: $('#project_slk_prev'),
        nextArrow: $('#project_slk_next'),
        asNavFor: $('#project_slk')
    });
    $('#project_slk_nav').on('afterChange', function (event, slick, currentSlide) {
        $currentSlick = $('#project_slk .slick-current .detail_slk');
        if (!$currentSlick.hasClass('slick-initialized')) {
            initDetailSlick($currentSlick);
        }
    });

    $('#project_slk .project_detail .detail_slk').each(function () {
        if (!$(this).hasClass('slick-initialized')) {
            initDetailSlick($(this));
        }
    });
    // 클릭이벤트가 초기화가 문제가 생겨서 이벤트 삭제 후 다시 등록.
    $('#project_detail_slk_next_arrow').off('click').on('click', function () {
        $('#project_slk .slick-current .detail_slk').slick('slickNext');
    });
    scrollCheck()

    $(document).on('scroll', function () {
        scrollCheck()
    })

    $('#float_btn').on('click', function () {
        $('html,body').animate({scrollTop:0}, 500)
    })
    /**** 프로젝트 슬라이더 끝 ****************/
});

/**** 스크롤 체크, 헤더에 효과 ****************/
function scrollCheck () {
    if($(window).scrollTop() > 50){
        $("#header").addClass("scrollRun");
    }else{
        $("#header").removeClass("scrollRun");
    }
}

/**** 프로젝트 디테일 슬라이더에 슬라이드를 작동시키기 위해 적용 ****************/
function initDetailSlick ($slk) {
    $slk.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        draggable: false,
        arrows: true,
        prevArrow: $('#project_detail_slk_prev_arrow'),
        nextArrow: $('#project_detail_slk_next_arrow'),
        speed: 400,
        autoplay: false,
        fade: true,
    });
}

// 단기예보에서 현재위치에 예보된 날씨를 요청함
function requestForecastWeather (placeX, placeY) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getVilageFcst?serviceKey='+ API_KEY +'&pageNo=1&numOfRows=12&dataType=JSON&base_date=' + todayYear + todayMonth + todayDate + '&base_time=' + forecastHour + '00&nx='+ placeX +'&ny=' + placeY, true); // 요청 초기화
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) { // 요청이 완료되었을 때
            if (xhr.status === 200) { // 응답이 성공적일 때
                console.log(xhr.responseText); // 응답 내용 출력
                try {
                        var data = JSON.parse(xhr.responseText); // JSON 문자열을 객체로 변환
                        // items.item이 배열인지 확인
                        if (Array.isArray(data.response.body.items.item)) {
                            // 배열에서 날씨여부 체크
                            // 강수형태(PTY) 코드 : (초단기) 없음(0), 비(1), 비/눈(2), 눈(3), 빗방울(5), 빗방울눈날림(6), 눈날림(7) 
                            // 하늘상태(SKY) 코드 : 맑음(1), 구름많음(3), 흐림(4)
                            const nowWeather = data.response.body.items.item.find(function(weather){
                                return weather.category === "PTY" // 강수 형태 체크
                            });
                            console.log('nowWeather = ', nowWeather);
                            switch (nowWeather.fcstValue) {
                                case '0': // 없음
                                        const nowSky = data.response.body.items.item.find(function(sky){
                                            return sky.category === "SKY" // 강수 형태가 없을 때 하늘상태 체크
                                        });
                                        console.log('nowSky = ', nowSky);
                                        switch (nowSky.fcstValue) {
                                            case '1': // 맑음
                                                console.log('여기는 맑음');
                                                break
                                            case '3': // 구름많음
                                                console.log('여기는 구름많음');
                                                break
                                            case '4': // 흐림
                                                console.log('여기는 흐림');
                                                break
                                            default:
                                                console.log('강수형태(PTY) 형식과 일치하지 않습니다.');
                                                break
                                        }
                                        // 현재 하늘상태 체크 종료
                                    break
                                case '1': // 비
                                    console.log('여기는 비');
                                    break
                                case '2': // 눈비
                                    console.log('여기는 눈비');
                                    break
                                case '3': // 눈
                                    console.log('여기는 눈');
                                    break
                                case '5': // 빗방울
                                    console.log('여기는 빗방울');
                                    break
                                case '6': // 빗방울눈날림
                                    console.log('여기는 빗방울눈날림');
                                    break
                                case '7': // 눈날림
                                    console.log('여기는 눈날림');
                                    break
                                default:
                                    console.log('강수형태(PTY) 형식과 일치하지 않습니다.');
                                    break
                            }
                            
                        } else {
                            console.error('강수형태(PTY) 또는 하늘상태(SKY) 정보를 찾을 수 없습니다.');
                        }
                } catch (e) {
                    console.error('Error parsing JSON:', e); // JSON 파싱 에러 처리
                }
            } else {
                console.error('Error fetching data:', xhr.statusText); // 오류 처리
            }
        }
    };

    xhr.send(); // 요청 전송
}
requestForecastWeather(62, 123);
