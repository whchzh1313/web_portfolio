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

include_once(G5_PATH.'/inc/hd_console.php');
?>
    <div id="main">
        <div id="titleSection" class="primary_bg center_y_title">
            <div id="weatherBg" class="weather_bg"></div>
            <div class="section wave_text" data-aos="fade">
                <p class="words wave" aria-hidden="true">이화민<br />웹 개발자<br />포트폴리오</p>
                <p class="words">이화민<br />웹 개발자<br />포트폴리오</p>
            </div>
        </div>
        <div id="aboutMe" class="section">
            <h2><span class="title_circle primary_circle"><span data-aos="fade-up">About me</span></span></h2>
            <div class="profile_wrap">
                <div class="flex_l">
                    <div id="ProfileImageContainer">
                        <img src="/images/profile_image.jpg" alt="이화민 증명사진">
                    </div>
                </div>
                <div class="flex_r">
                    <div class="name_box" data-aos="fade-up">
                        <h3>이화민</h3>
                        <p>1997.07.15</p>
                    </div>
                    <p class="font_gray" data-aos="fade-up">Web Developer</p>
                    <p data-aos="fade-up">새로운 환경과 변화에 빠르게 적응하며, <br />
                    끊임없이 성장하고 도전을 즐기는 웹 개발자입니다.</p>
                </div>
            </div>
            <div id="skill" class="inner_section">
                <h3 data-aos="fade-up">Skill</h3>
                    <!-- #skillWrap>(.skill_type*5>h3.skills_cate+(ul.type_1>li*2.skills>(.l>img).r>h4+p))+.skill_type>h3.skills_cate+ul.type_2>li.skills>(.t>img)+.b>h4+p -->
                    <div id="skillWrap">
                        <div class="skill_type">
                            <h3 class="skills_cate">FrontEnd</h3>
                            <ul class="type_1">
                                <li class="skills">
                                    <div class="l"><img src="/images/html.png" alt="HTML 아이콘"></div>
                                    <div class="r">
                                        <h4>HTML</h4>
                                        <p>웹 페이지의 구조를 정의하는 마크업 언어로, 콘텐츠를 표현하기 위한 뼈대를 작성하는 데 사용.</p>
                                    </div>
                                </li>
                                <li class="skills">
                                    <div class="l"><img src="/images/css.png" alt="CSS 아이콘"></div>
                                    <div class="r">
                                        <h4>CSS</h4>
                                        <p>웹 페이지의 디자인과 레이아웃을 구성하는 스타일링 언어.</p>
                                    </div>
                                </li>
                                <li class="skills">
                                    <div class="l"><img src="/images/sass.png" alt="SASS 아이콘"></div>
                                    <div class="r">
                                        <h4>SASS</h4>
                                        <p>CSS의 확장 언어로, 코드 재사용과 효율적인 스타일 관리를 지원.</p>
                                    </div>
                                </li>
                                <li class="skills">
                                    <div class="l"><img src="/images/javascript.png" alt="자바스크립트 아이콘"></div>
                                    <div class="r">
                                        <h4>javascript</h4>
                                        <p>웹 페이지의 동적 동작과 사용자와의 상호작용을 구현하기 위한 언어.</p>
                                    </div>
                                </li>
                                <li class="skills">
                                    <div class="l"><img src="/images/jquery.png" alt="제이쿼리 아이콘"></div>
                                    <div class="r">
                                        <h4>제이쿼리</h4>
                                        <p>JavaScript의 라이브러리로 DOM 조작과 Ajax 요청을 간편하게 처리.</p>
                                    </div>
                                </li>
                                <li class="skills learning">
                                    <div class="l"><img src="/images/react.png" alt="리액트 아이콘"></div>
                                    <div class="r">
                                        <h4>React</h4>
                                        <p></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="skill_type">
                            <h3 class="skills_cate">Design Tool</h3>
                            <ul class="type_1">
                                <li class="skills">
                                    <div class="l"><img src="/images/photoshop.png" alt="포토샵 아이콘"></div>
                                    <div class="r">
                                        <h4>Photoshop</h4>
                                        <p></p>
                                    </div>
                                </li>
                                <li class="skills">
                                    <div class="l"><img src="/images/illustrator.png" alt="일러스트 아이콘"></div>
                                    <div class="r">
                                        <h4>Illustrator</h4>
                                        <p></p>
                                    </div>
                                </li>
                                <li class="skills">
                                    <div class="l"><img src="/images/figma.png" alt="피그마 아이콘"></div>
                                    <div class="r">
                                        <h4>Figma</h4>
                                        <p></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="skill_type">
                            <h3 class="skills_cate">Editor</h3>
                            <ul class="type_1">
                                <li class="skills">
                                    <div class="l"><img src="/images/visual_studio_code.png" alt="비주얼스튜디오 아이콘"></div>
                                    <div class="r">
                                        <h4>Visual Studio Code</h4>
                                        <p></p>
                                    </div>
                                </li>
                                <li class="skills">
                                    <div class="l"><img src="/images/android_studio.png" alt="안드로이드 스튜디오 아이콘"></div>
                                    <div class="r">
                                        <h4>Android Studio</h4>
                                        <p></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="skill_type">
                            <h3 class="skills_cate">Android</h3>
                            <ul class="type_1">
                                <li class="skills">
                                    <div class="l"><img src="/images/kotlin.png" alt="코틀린 아이콘"></div>
                                    <div class="r">
                                        <h4>Kotlin</h4>
                                        <p></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="skill_type">
                            <h3 class="skills_cate">Collaboration</h3>
                            <ul class="type_1">
                                <li class="skills">
                                    <div class="l"><img src="/images/github.png" alt="깃허브 아이콘"></div>
                                    <div class="r">
                                        <h4>Github</h4>
                                        <p></p>
                                    </div>
                                </li>
                                <li class="skills">
                                    <div class="l"><img src="/images/notion.png" alt="노션 아이콘"></div>
                                    <div class="r">
                                        <h4>Notion</h4>
                                        <p></p>
                                    </div>
                                </li>
                                <li class="skills">
                                    <div class="l"><img src="/images/notion.png" alt="슬랙 아이콘"></div>
                                    <div class="r">
                                        <h4>Slack</h4>
                                        <p></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="skill_type">
                            <h3 class="skills_cate">CMS</h3>
                            <ul class="type_2">
                                <li class="skills">
                                    <div class="t"><img src="/images/gnuboard.png" alt="그누보드 아이콘"></div>
                                    <div class="b">
                                        <h4>그누보드</h4>
                                        <p></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="skill_type">
                            <h3 class="skills_cate">BackEnd</h3>
                            <ul class="type_1">
                                <li class="skills">
                                    <div class="l"><img src="/images/php.png" alt="PHP 아이콘"></div>
                                    <div class="r">
                                        <h4>PHP</h4>
                                        <p>서버 측 스크립트 언어로, 데이터 처리와 동적 웹 페이지 생성을 구현.</p>
                                    </div>
                                </li>
                                <li class="skills">
                                    <div class="l"><img src="/images/php.png" alt="PHP 아이콘"></div>
                                    <div class="r">
                                        <h4>MySQL</h4>
                                        <p>관계형 데이터베이스로 데이터를 효율적으로 관리합니다.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        
                    </div>
            </div>
        </div>
        <div id="project" class="primary_bg">
            <div class="section">
                <h2><span class="title_circle white_circle"><span data-aos="fade-up">Project</span></span></h2>
                <div id="project_slk">
                    <div class="project_detail">
                        <div class="detail_wrap">
                            <div class="detail_slk">
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/kcell_1.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/kcell_2.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/kcell_3.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/kcell_4.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center"><span>케이셀의원</span><a href="http://kcellclinic.co.kr/?device=pc" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="detail_wrap">
                            <div class="detail_slk">
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/mycell_1.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/mycell_2.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/mycell_3.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/mycell_4.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center"><span>아이코닉피부과의원</span><a href="http://eyeconiqsh.com/?device=pc" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="detail_wrap">
                            <div class="detail_slk">
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/angelot_1.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/angelot_2.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/angelot_3.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/angelot_4.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center"><span>앙즈로산후조리원</span><a href="https://botanicgarden-korea.com/?device=pc" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="detail_wrap">
                            <div class="detail_slk">
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/enf_1.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/enf_2.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center"><span>이엔에프프라이빗이쿼티</span><a href="http://www.enfpe.com/?device=pc" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="detail_wrap">
                            <div class="detail_slk">
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/dobongye_1.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/dobongye_2.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center"><span>도봉예치과</span><a href="http://dbye.co.kr/?device=pc" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="detail_wrap">
                        <div class="detail_slk">
                            <div class="project_capture"><img class="secondary_bg" src="/images/projects/cowell_1.png" alt=""></div>
                        </div>
                        <div class="detail_desc">
                            <h3 class="flex_box flex_align_center"><span>코웰성형외과의원</span><a href="http://cozyclinic.co.kr/?device=pc" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                            <p></p>
                        </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="detail_wrap">
                            <div class="detail_slk">
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/eun_u_1.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/eun_u_2.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center"><span>은유외과</span><a href="http://www.eunbreast.co.kr/?device=pc" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="detail_wrap">
                            <div class="detail_slk">
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/iconiq_1.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center"><span>아이코닉성형외과의원</span><a href="https://eyeconiqps.com/?device=pc" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="detail_wrap">
                            <div class="detail_slk">
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/m01_1.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/m01_2.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center"><span>엠공일의원</span><a href="http://m01ps.com/?device=pc" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="detail_wrap">
                            <div class="detail_slk">
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/rejuent_1.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/rejuent_2.png" alt=""></div>
                                <div class="project_capture"><img class="secondary_bg" src="/images/projects/rejuent_3.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center"><span>리주앙트</span><a href="http://www.rejuent.com/?device=pc" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="project_slk_nav">
                    <div class="project_logo"><img src="/images/projects/project_kcell.png" alt=""></div>
                    <div class="project_logo"><img src="/images/projects/project_mycell.png" alt=""></div>
                    <div class="project_logo"><img src="/images/projects/project_angelot.png" alt=""></div>
                    <div class="project_logo"><img src="/images/projects/project_enf.png" alt=""></div>
                    <div class="project_logo"><img src="/images/projects/project_dobongye.png" alt=""></div>
                    <div class="project_logo"><img src="/images/projects/project_cowell.png" alt=""></div>
                    <div class="project_logo"><img src="/images/projects/project_eun_u.png" alt=""></div>
                    <div class="project_logo"><img src="/images/projects/project_iconiq.png" alt=""></div>
                    <div class="project_logo"><img src="/images/projects/project_m01.png" alt=""></div>
                    <div class="project_logo"><img src="/images/projects/project_rejuent.png" alt=""></div>
                </div>
                <div id="project_detail_slk_prev_arrow" class="slk_detail_arrow"></div>
                <div id="project_detail_slk_next_arrow" class="slk_detail_arrow">
                    <img src="/images/arr_next.png" alt="">
                </div>
                <div id="project_slk_next" class="slk_arrow">
                    <img src="/images/arr_next.png" alt="">
                </div>
                <div id="project_slk_prev" class="slk_arrow">
                    <img src="/images/arr_prev.png" alt="">
                </div>
            </div>
        </div>
    </div>
<?php
include_once(G5_PATH.'/tail.php');