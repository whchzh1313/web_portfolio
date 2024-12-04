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
add_stylesheet('<link rel="stylesheet" href="/css/main.css">', 0);
add_stylesheet('<link rel="stylesheet" href="/css/main_skills.css">', 0);
add_stylesheet('<link rel="stylesheet" href="/css/main_projects.css">', 0);

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
                <p data-aos="fade-up">
                    새로운 환경과 변화에 빠르게 적응하며, 항상 성장하고 도전을 즐기는 웹 개발자입니다. <br />
                    저는 창의적인 방법으로 문제를 해결하는 것을 좋아하고, <br />
                    협업을 통해 더 나은 결과를 만들어내는 데 큰 가치를 둡니다.
                </p>
            </div>
        </div>
    </div>
    <div id="skills" class="inner_section primary_bg">
        <h2><span class="title_circle white_circle"><span data-aos="fade-up">Skill</span></span></h2>
        <!-- #skillWrap>(.skill_type*5>h3.skills_cate+(ul.type_1>li*2.skills>(.l>img).r>h4+p))+.skill_type>h3.skills_cate+ul.type_2>li.skills>(.t>img)+.b>h4+p -->
        <div id="skillsWrap">
            <div class="column_wrap">
                <div class="skill_type">
                    <h3 class="type_name">FrontEnd</h3>
                    <ul class="type_1">
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/html.png" alt="HTML 아이콘"></div>
                            <div class="r">
                                <h4>HTML</h4>
                                <p></p>
                            </div>
                        </li>
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/css.png" alt="CSS 아이콘"></div>
                            <div class="r">
                                <h4>CSS</h4>
                                <p></p>
                            </div>
                        </li>
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/sass.png" alt="SASS 아이콘"></div>
                            <div class="r">
                                <h4>SASS</h4>
                                <p></p>
                            </div>
                        </li>
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/javascript.png" alt="자바스크립트 아이콘"></div>
                            <div class="r">
                                <h4>javascript</h4>
                                <p></p>
                            </div>
                        </li>
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/jquery.png" alt="제이쿼리 아이콘"></div>
                            <div class="r">
                                <h4>제이쿼리</h4>
                                <p></p>
                            </div>
                        </li>
                        <li class="skill learning" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/react.png" alt="리액트 아이콘"></div>
                            <div class="r">
                                <h4>React</h4>
                                <p>learning now.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="skill_type">
                    <h3 class="type_name">CMS</h4>
                        <ul class="type_2">
                            <li class="skill" data-aos="fade-up">
                                <div class="t"><img src="/images/skills/gnuboard.png" alt="그누보드 아이콘"></div>
                                <div class="b">
                                    <h4>그누보드</h4>
                                    <p></p>
                                </div>
                            </li>
                        </ul>
                </div>
            </div>
            <div class="column_wrap">
                <div class="skill_type">
                    <h3 class="type_name">BackEnd</h3>
                    <ul class="type_1">
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/php.png" alt="PHP 아이콘"></div>
                            <div class="r">
                                <h4>PHP</h4>
                                <p></p>
                            </div>
                        </li>
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/mysql.png" alt="MySQL 아이콘"></div>
                            <div class="r">
                                <h4>MySQL</h4>
                                <p></p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="skill_type">
                    <h3 class="type_name">Design Tool</h3>
                    <ul class="type_1">
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/photoshop.png" alt="포토샵 아이콘"></div>
                            <div class="r">
                                <h4>Photoshop</h4>
                                <p></p>
                            </div>
                        </li>
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/illustrator.png" alt="일러스트 아이콘"></div>
                            <div class="r">
                                <h4>Illustrator</h4>
                                <p></p>
                            </div>
                        </li>
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/figma.png" alt="피그마 아이콘"></div>
                            <div class="r">
                                <h4>Figma</h4>
                                <p></p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="skill_type">
                    <h3 class="type_name">Android</h3>
                    <ul class="type_1">
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/kotlin.png" alt="코틀린 아이콘"></div>
                            <div class="r">
                                <h4>Kotlin</h4>
                                <p></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="column_wrap">
                <div class="skill_type">
                    <h3 class="type_name">Collaboration</h3>
                    <ul class="type_1">
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/github.png" alt="깃허브 아이콘"></div>
                            <div class="r">
                                <h4>Github</h4>
                                <p></p>
                            </div>
                        </li>
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/notion.png" alt="노션 아이콘"></div>
                            <div class="r">
                                <h4>Notion</h4>
                                <p></p>
                            </div>
                        </li>
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/slack.png" alt="슬랙 아이콘"></div>
                            <div class="r">
                                <h4>Slack</h4>
                                <p></p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="skill_type">
                    <h3 class="type_name">Editor</h3>
                    <ul class="type_1">
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/visual_studio_code.png" alt="비주얼스튜디오 아이콘"></div>
                            <div class="r">
                                <h4>Visual Studio Code</h4>
                                <p></p>
                            </div>
                        </li>
                        <li class="skill" data-aos="fade-up">
                            <div class="l"><img src="/images/skills/android_studio.png" alt="안드로이드 스튜디오 아이콘"></div>
                            <div class="r">
                                <h4>Android Studio</h4>
                                <p></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="projects" class="">
        <h2><span class="title_circle primary_circle"><span data-aos="fade-up">Project</span></span></h2>
        <div id="projects_wrap">
            <div class="project">
                <div class="project_card" id="project_kcell">
                    <div class="project_front"><img src="/images/projects/thumb/project_kcell.png" alt=""></div>
                    <div class="project_back">
                        <h3 class="project_title"><span>케이셀의원</span></h3>
                        <p class="project_desc">웹 제작 100%<br />이벤트 게시판 내 이벤트 신청 기능 제작, 신청된 이벤트 관리 기능 제작</p>
                        <a class="project_link" href="http://kcellclinic.co.kr/" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link_w.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="project">
                <div class="project_card" id="project_mycell">
                    <div class="project_front"><img src="/images/projects/thumb/project_mycell.png" alt=""></div>
                    <div class="project_back">
                        <h3 class="project_title"><span>아이코닉피부과의원</span></h3>
                        <p class="project_desc">웹 제작 100%<br />온라인 예약 제작, 각 페이지에 등록될 최신글 출력 제작</p>
                        <a class="project_link" href="http://eyeconiqsh.com/" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link_w.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="project">
                <div class="project_card" id="project_angelot">
                    <div class="project_front"><img src="/images/projects/thumb/project_angelot.png" alt=""></div>
                    <div class="project_back">
                        <h3 class="project_title"><span>앙즈로산후조리원</span></h3>
                        <p class="project_desc">웹 제작 100%<br />관리자 검토후 게시가 가능한 후기 게시판 등 모든 게시판 제작, 건의사항 신청 폼 제작</p>
                        <a class="project_link" href="https://botanicgarden-korea.com/" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link_w.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="project">
                <div class="project_card" id="project_enf">
                    <div class="project_front"><img src="/images/projects/thumb/project_enf.png" alt=""></div>
                    <div class="project_back">
                        <h3 class="project_title"><span>이엔에프프라이빗이쿼티</span></h3>
                        <p class="project_desc">웹 제작 100%<br />슬라이드간 결합을 통한 다기능 메인페이지 제작, 영문페이지 제작</p>
                        <a class="project_link" href="http://www.enfpe.com/" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link_w.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="project">
                <div class="project_card" id="project_dobongye">
                    <div class="project_front"><img src="/images/projects/thumb/project_dobongye.png" alt=""></div>
                    <div class="project_back">
                        <h3 class="project_title"><span>도봉예치과</span></h3>
                        <p class="project_desc">웹 제작 100%<br />공지사항, 리스트 게시판 스킨 제작</p>
                        <a class="project_link" href="http://dbye.co.kr/" target="_blank" rel="noreferrer noopener"><img
                                src="/images/icon_link_w.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="project">
                <div class="project_card" id="project_cowell">
                    <div class="project_front"><img src="/images/projects/thumb/project_cowell.png" alt=""></div>
                    <div class="project_back">
                        <h3 class="project_title"><span>코웰성형외과의원</span></h3>
                        <p class="project_desc">웹 제작 100%<br />기존 홈페이지 리뉴얼, 게시판 스킨 제작, 빠른 상담 신청 제작</p>
                        <a class="project_link" href="http://cozyclinic.co.kr/" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link_w.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="project">
                <div class="project_card" id="project_eunu">
                    <div class="project_front"><img src="/images/projects/thumb/project_eunu.png" alt=""></div>
                    <div class="project_back">
                        <h3 class="project_title"><span>은유외과</span></h3>
                        <p class="project_desc">웹 제작 100%<br />WFHD 환경을 고려해 마크업, 게시판 스킨 제작</p>
                        <a class="project_link" href="http://www.eunbreast.co.kr/" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link_w.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="project">
                <div class="project_card" id="project_iconiq">
                    <div class="project_front"><img src="/images/projects/thumb/project_iconiq.png" alt=""></div>
                    <div class="project_back">
                        <h3 class="project_title"><span>아이코닉성형외과의원</span></h3>
                        <p class="project_desc">웹 제작 100%<br />기존 홈페이지 리뉴얼, 빠른상담 신청 제작</p>
                        <a class="project_link" href="https://eyeconiqps.com/" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link_w.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="project">
                <div class="project_card" id="project_m01">
                    <div class="project_front"><img src="/images/projects/thumb/project_m01.png" alt=""></div>
                    <div class="project_back">
                        <h3 class="project_title"><span>엠공일의원</span></h3>
                        <p class="project_desc">웹 제작 100%<br />기존 홈페이지 리뉴얼, 상담 게시판 스킨 제작</p>
                        <a class="project_link" href="http://m01ps.com/" target="_blank" rel="noreferrer noopener"><img
                                src="/images/icon_link_w.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="project">
                <div class="project_card" id="project_rejuent">
                    <div class="project_front"><img src="/images/projects/thumb/project_rejuent.png" alt=""></div>
                    <div class="project_back">
                        <h3 class="project_title"><span>리주앙트</span></h3>
                        <p class="project_desc">웹 제작 100%<br />온라인 상담 창구 제작</p>
                        <a class="project_link" href="http://www.rejuent.com/" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link_w.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include_once(G5_PATH.'/tail.php');