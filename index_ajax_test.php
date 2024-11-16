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
add_javascript('<script src="'.G5_JS_URL.'/main.js"></script>', 0);
?>
    <div id="main">
        <div id="titleSection" class="blue_gradiant_bg center_y_title">
            <div class="section wave_text" data-aos="fade">
                <p class="words wave" aria-hidden="true">이화민<span class="hide_and_show">_</span><br />웹 개발자 포트폴리오</p>
                <p class="words">이화민<span class="hide_and_show">_</span><br />웹 개발자 포트폴리오</p>
            </div>
        </div>
        <div id="aboutMe" class="section">
            
        </div>
        <section id="weatherAndTime" class="weather_bg"></section>
        <script>
            function fetchDateTime () {
                const $main = document.getElementById('main');
                let today = new Date();
                let todayYear = today.getFullYear();
                let todayMonth = today.getMonth()+1;
                let todayDate = (today.getDate()).toString().padStart(2, '0');
                let nowHour = today.getHours();
                let forecastHour; // 
                if (nowHour < 2) {
                    // 월을 감소시킴
                    todayMonth--; 
                    // 1월에서 12월로 넘어갈 경우 연도를 감소시킴
                    if (todayMonth < 1) {
                        todayMonth = 12;
                        todayYear--; 
                    }
                    forecastHour = 23;
                } else if (hour >= 2 && hour < 5) {
                    forecastHour = 2;
                } else if (hour >= 5 && hour < 8) {
                    forecastHour = 5;
                } else if (hour >= 8 && hour < 11) {
                    forecastHour = 8;
                } else if (hour >= 11 && hour < 14) {
                    forecastHour = 11;
                } else if (hour >= 14 && hour < 17) {
                    forecastHour = 14;
                } else if (hour >= 17 && hour < 20) {
                    forecastHour = 17;
                } else if (hour >= 20 && hour < 23) {
                    forecastHour = 20;
                } else {
                    forecastHour = 23;
                }
                $main.classList.add('time_' + forecastHour);
                forecastHour.toString().padStart(2, '0');
                nowHour.toString().padStart(2, '0');
            }
            fetchDateTime();

            // 현재 날씨를 요청함
            function requestForecastWeather () {
                var xhr = new XMLHttpRequest();
                let placeX = '62';
                let placeY = '123';
                xhr.open('GET', 'https://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getVilageFcst?serviceKey=6FUeLj9MpnYmNWV7JpgiDfu0LHTZVzlQdUV%2Btn0FsOGAWzWLnSSjMLgxyjoSHLR%2B9SKzTuRFKY7a7YaXn0DOjg%3D%3D&pageNo=1&numOfRows=12&dataType=JSON&base_date=' + todayYear + todayMonth + todayDate + '&base_time=' + forecastHour + '00&nx='+ placeX +'&ny=' + placeY, true); // 요청 초기화
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
            requestForecastWeather();
        </script>
    </div>
<?php
include_once(G5_PATH.'/tail.php');