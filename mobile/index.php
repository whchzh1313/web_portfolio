<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

include_once(G5_MOBILE_PATH.'/head.php');
add_javascript('<script src="'.G5_JS_URL.'/mobile_main.js"></script>', 1);
?>
    <?php if($hideThis) {?>
    <div id="main">
        <div id="titleSection" class="blue_gradiant_bg center_y_title">
            <div class="section wave_text" data-aos="fade">
                <p class="words wave" aria-hidden="true">이화민<span class="hide_and_show">_</span><br />웹 개발자<br />포트폴리오</p>
                <p class="words">이화민<span class="hide_and_show">_</span><br />웹 개발자<br />포트폴리오</p>
            </div>
        </div>
        <div id="aboutMe" class="section">
            <h2><span class="title_circle sky_circle"><span data-aos="fade-up">About me</span></span></h2>
            <div class="profile_wrap">
                <div class="flex_l">
                    <div id="ProfileImageContainer">
                        <img src="/images/profile_image.png" alt="이화민">
                    </div>
                </div>
                <div class="flex_r">
                    <div class="flex_box flex_center" data-aos="fade-up">
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
                <div id="skillWrap" class="">
                    <div class="skills web" data-aos="fade-up">
                        <h4>Web</h4>
                        <ul class="flex_box flex_center flex_wrap skill_chips">
                            <li class="chip radius_100">HTML</li>
                            <li class="chip radius_100">CSS</li>
                            <li class="chip radius_100">Jquery</li>
                            <li class="chip radius_100">Mysql</li>
                            <li class="chip radius_100">Gnuboard</li>
                        </ul>
                    </div>
                    <div class="skills design" data-aos="fade-up">
                        <h4>Design & Prototyping</h4>
                        <ul class="flex_box flex_center flex_wrap skill_chips">
                            <li class="chip radius_100">Figma</li>
                            <li class="chip radius_100">Photoshop</li>
                            <li class="chip radius_100">Illustrator</li>
                        </ul>
                    </div>
                    <div class="skills tool" data-aos="fade-up">
                        <h4>Tool</h4>
                        <ul class="flex_box flex_center flex_wrap skill_chips">
                            <li class="chip radius_100">VSCode</li>
                            <li class="chip radius_100">Android Studio</li>
                        </ul>
                    </div>
                    <div class="skills version" data-aos="fade-up">
                        <h4>Version Control & Collaboration</h4>
                        <ul class="flex_box flex_center flex_wrap skill_chips">
                            <li class="chip radius_100">Notion</li>
                            <li class="chip radius_100">Slack</li>
                        </ul>
                    </div>
                    <div class="skills mobile_app" data-aos="fade-up">
                        <h4>MobileApp</h4>
                        <ul class="flex_box flex_center flex_wrap skill_chips">
                            <li class="chip radius_100">Kotlin</li>
                            <li class="chip radius_100">Android Studio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="project" class="blue_bg">
            <div class="project_section">
                <h2><span class="title_circle white_circle"><span data-aos="fade-up">Project</span></span></h2>
                <div id="project_slk">
                    <div class="project_detail">
                        <div class="">
                            <div class="detail_slk">
                                <div class="project_capture"><img src="/images/projects/kcell_1.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/kcell_2.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/kcell_3.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/kcell_4.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center flex_center"><span>케이셀의원</span><a href="http://kcellclinic.co.kr/?device=mobile" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="">
                            <div class="detail_slk">
                                <div class="project_capture"><img src="/images/projects/mycell_1.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/mycell_2.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/mycell_3.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/mycell_4.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center flex_center"><span>아이코닉피부과의원</span><a href="http://eyeconiqsh.com/?device=mobile" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="">
                            <div class="detail_slk">
                                <div class="project_capture"><img src="/images/projects/angelot_1.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/angelot_2.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/angelot_3.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/angelot_4.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center flex_center"><span>앙즈로산후조리원</span><a href="https://botanicgarden-korea.com/?device=mobile" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="">
                            <div class="detail_slk">
                                <div class="project_capture"><img src="/images/projects/enf_1.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/enf_2.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center flex_center"><span>이엔에프프라이빗이쿼티</span><a href="http://www.enfpe.com/?device=mobile" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="">
                            <div class="detail_slk">
                                <div class="project_capture"><img src="/images/projects/dobongye_1.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/dobongye_2.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center flex_center"><span>도봉예치과</span><a href="http://dbye.co.kr/?device=mobile" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="">
                        <div class="detail_slk">
                            <div class="project_capture"><img src="/images/projects/cowell_1.png" alt=""></div>
                        </div>
                        <div class="detail_desc">
                            <h3 class="flex_box flex_align_center flex_center"><span>코웰성형외과의원</span><a href="http://cozyclinic.co.kr/?device=mobile" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                            <p></p>
                        </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="">
                            <div class="detail_slk">
                                <div class="project_capture"><img src="/images/projects/eun_u_1.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/eun_u_2.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center flex_center"><span>은유외과</span><a href="http://www.eunbreast.co.kr/?device=mobile" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="">
                            <div class="detail_slk">
                                <div class="project_capture"><img src="/images/projects/iconiq_1.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center flex_center"><span>아이코닉성형외과의원</span><a href="https://eyeconiqps.com/?device=mobile" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="">
                            <div class="detail_slk">
                                <div class="project_capture"><img src="/images/projects/m01_1.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/m01_2.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center flex_center"><span>엠공일의원</span><a href="http://m01ps.com/?device=mobile" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="project_detail">
                        <div class="">
                            <div class="detail_slk">
                                <div class="project_capture"><img src="/images/projects/rejuent_1.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/rejuent_2.png" alt=""></div>
                                <div class="project_capture"><img src="/images/projects/rejuent_3.png" alt=""></div>
                            </div>
                            <div class="detail_desc">
                                <h3 class="flex_box flex_align_center flex_center"><span>리주앙트</span><a href="http://www.rejuent.com/?device=mobile" target="_blank" rel="noreferrer noopener"><img src="/images/icon_link.png" alt=""></a></h3>
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
                <div id="project_detail_slk_prev_arrow" class="slk_detail_arrow">
                    <img src="/images/arr_prev.png" alt="">
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
    <?php } ?>
<?php
include_once(G5_MOBILE_PATH.'/tail.php');