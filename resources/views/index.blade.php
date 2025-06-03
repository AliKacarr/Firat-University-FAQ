<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Sıkça Sorulan Sorular | Fırat Üniversitesi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/faq-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dist.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700&display=swap" rel="stylesheet">
    <script src="https://egitim.firat.edu.tr/designV2/CDN/popper/popper.min.js"></script>
    <script src="https://egitim.firat.edu.tr/designV2/CDN/bootstrap/npmBundle.min.js"></script>
    <script src="https://egitim.firat.edu.tr/designV2/CDN/jquery/jquery-3-5-1.js"></script>
    <script src="https://egitim.firat.edu.tr/designV2/CDN/jquery/ajax.min.js"></script>
    <link rel="stylesheet" href="https://egitim.firat.edu.tr/designV2/assets/front/js/swiper/swiper-bundle.min.css">
    <script src="https://egitim.firat.edu.tr/designV2/assets/front/js/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

<header class="header-responsive">
    <div class="header-title-responsive">
        <h3>
            <div class="title">
                <h5>Eğitim Bilimleri Enstitüsü</h5>
            </div>
        </h3>
    </div>
</header>
<div class="news-entrance">
    <img src="https://egitim.firat.edu.tr/designV2/assets/front/img/firat-uni-img5.jpg" alt="">
    <div class="news-entrance-info firat-container">
        <div class="news-entrance-title firat-container">
            <p>Sıkça Sorulan Sorular</p><!---Dinamik--->
        </div>
    </div>
</div>

<!--sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss-->
<div class="index-page firat-container mt-5 my-page-mt">
    <div class="col-8 index-content my-page-left  mb-5">
        <div class="index-content-right-shape"></div>
        <div class="index-content-info">
            <h4>Sıkça Sorulan Sorular</h4>
            <form id="askForm">
                <input type="text" id="question" placeholder="SSS içinde ara" required>
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div id="faq-root" class="faq-container"></div>
        </div>
    </div>
<!--sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss-->

    <div class="col-4 fast-access my-page-right">
        <div class="fast-access-title">
            <p>Hızlı Erişim</p>
        </div>
        <ul class="fast-access-menu">
            <li>
                <a target="_blank" class="sub-border " href="http://www.firat.edu.tr/tr/page/event">Etkinlikler</a>
            </li>
            <li>
                <a class="sub-border" href="https://egitim.firat.edu.tr/tr/page/2851">Yazım Kuralları / Yazım
                    Şablonları</a>
                <style>
                    .fast-access-submenu li {
                        position: relative;
                    }

                    .ikon {
                        margin-left: 15rem !important;
                    }
                </style>
                <button style="padding: 7px 30px;    position: absolute;
width: 100%;
right: 0;
top: 0rem;
border: 0;
background: transparent;" class="open-menu-button first-open-button open-first sub-border"><i
                        class="ul-open-icon fas fa-plus ikon" aria-hidden="true"></i></button>
                <ul class="fast-access-submenu" style="display: none">


                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7930">Tez Yazım
                            Kılavuzu</a>

                    </li>

                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7931">Tez Şablonu</a>

                    </li>

                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7932">Seminer Yazım
                            Kılavuzu</a>

                    </li>

                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7933">Tezsiz Yüksek Lisans
                            Dönem Projesi Yazım Kılavuzu</a>

                    </li>
                </ul>
            </li>
            <li>
                <a class="sub-border" href="https://egitim.firat.edu.tr/tr/page/7924">Hazır Formlar</a>
                <style>
                    .fast-access-submenu li {
                        position: relative;
                    }

                    .ikon {
                        margin-left: 15rem !important;
                    }
                </style>
                <button style="padding: 7px 30px;    position: absolute;
width: 100%;
right: 0;
top: 0rem;
border: 0;
background: transparent;" class="open-menu-button first-open-button open-first sub-border"><i
                        class="ul-open-icon fas fa-plus ikon" aria-hidden="true"></i></button>
                <ul class="fast-access-submenu" style="display: none">


                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7925">Hazır Formlar
                            (Genel)</a>

                    </li>

                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7928">Hazır Formlar (Yüksek
                            Lisans)</a>

                    </li>

                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7927">Hazır Formlar (Tezsiz
                            Yüksek Lisans)</a>

                    </li>

                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7929">Hazır Formlar
                            (Doktora)</a>

                    </li>
                </ul>
            </li>
            <li>
                <a class="sub-border" href="https://egitim.firat.edu.tr/tr/page/8448">Etik Kurul</a>
            </li>
            <li>
                <a target="_blank" class="sub-border "
                    href="https://www.firat.edu.tr/documents/1672658891.pdf">Akademik Takvim</a>
            </li>
            <li>

                <a class="sub-border">Yabancı Uyruklu Öğrenci İşlemleri</a>
                <style>
                    .fast-access-submenu li {
                        position: relative;
                    }

                    .ikon {
                        margin-left: 15rem !important;
                    }
                </style>
                <button style="padding: 7px 30px;    position: absolute;
width: 100%;
right: 0;
top: 0rem;
border: 0;
background: transparent;" class="open-menu-button first-open-button open-first sub-border"><i
                        class="ul-open-icon fas fa-plus ikon" aria-hidden="true"></i></button>
                <ul class="fast-access-submenu" style="display: none">


                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/2854">--Uluslararası
                            Öğrenci Kabul Yönergesi</a>

                    </li>

                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/2855">--Genel
                            Bilgilendirme</a>

                    </li>

                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/11833">--TÖMER Türkçe
                            Eğitimleri</a>

                    </li>

                    <li><a class="sub-border " href=" http://egitim.firat.edu.tr/document/01340">--ÖSYM Yabancı Dil
                            Eşdeğerliği</a>

                    </li>

                    <li><a class="sub-border " href=" https://fint.firat.edu.tr/">--Başvuru Sistemi</a>

                    </li>
                </ul>
            </li>
            <li>
                <a class="sub-border" href="https://egitim.firat.edu.tr/tr/page/23666">Eğitim Videoları</a>
            </li>
            <li>
                <a class="sub-border" href="https://egitim.firat.edu.tr/tr/page/2853">Ana Bilim Dalları</a>
                <style>
                    .fast-access-submenu li {
                        position: relative;
                    }

                    .ikon {
                        margin-left: 15rem !important;
                    }
                </style>
                <button style="padding: 7px 30px;    position: absolute;
width: 100%;
right: 0;
top: 0rem;
border: 0;
background: transparent;" class="open-menu-button first-open-button open-first sub-border"><i
                        class="ul-open-icon fas fa-plus ikon" aria-hidden="true"></i></button>
                <ul class="fast-access-submenu" style="display: none">


                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7934">Eğitim Bilimleri Ana
                            Bilim Dalı</a>

                    </li>

                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7935">Matematik ve Fen
                            Bilimleri Eğitimi Ana Bilim Dalı</a>

                    </li>

                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7936">Türkçe ve Sosyal
                            Bilimler Eğitimi Ana Bilim Dalı</a>

                    </li>

                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7937">Temel Eğitim Ana
                            Bilim Dalı</a>

                    </li>

                    <li><a class="sub-border " href="https://egitim.firat.edu.tr/tr/page/7938">Bilgisayar ve Öğretim
                            Teknolojileri Eğitimi Ana Bilim Dalı</a>

                    </li>
                </ul>
            </li>
            <li>

                <a class="sub-border">ABD Tanıtım Videoları</a>
                <style>
                    .fast-access-submenu li {
                        position: relative;
                    }

                    .ikon {
                        margin-left: 15rem !important;
                    }
                </style>
                <button style="padding: 7px 30px;    position: absolute;
width: 100%;
right: 0;
top: 0rem;
border: 0;
background: transparent;" class="open-menu-button first-open-button open-first sub-border"><i
                        class="ul-open-icon fas fa-plus ikon" aria-hidden="true"></i></button>
                <ul class="fast-access-submenu" style="display: none">


                    <li><a class="sub-border " href=" http://phpserver2.firat.edu.tr/egitim/4.mp4">Bilgisayar ve
                            Öğretim Teknolojileri Eğitimi</a>

                    </li>

                    <li><a class="sub-border " href=" http://phpserver2.firat.edu.tr/egitim/5.mp4">Matematik ve Fen
                            Bilimleri Eğitimi</a>

                    </li>
                </ul>
            </li>
            <li>
                <a target="_blank" class="sub-border " href="http://dergipark.gov.tr/turkjes">Bilimsel
                    Dergilerimiz</a>
            </li>
            <li>
                <a target="_blank" class="sub-border " href="https://unievi.firat.edu.tr/">Üniversite Evi</a>
            </li>
            <li>
                <a target="_blank" class="sub-border " href="http://www.firat.edu.tr">Fırat Üniversitesi</a>
            </li>
            <li>
                <a class="sub-border" href="https://egitim.firat.edu.tr/tr/page/2850">İç Kontrol ve Kalite</a>
            </li>
            <li>
                <a class="sub-border" href="https://egitim.firat.edu.tr/tr/page/25432">Benzerlik Raporu</a>
            </li>
            <li>

                <a class="sub-border">e-Hizmetler</a>
                <style>
                    .fast-access-submenu li {
                        position: relative;
                    }

                    .ikon {
                        margin-left: 15rem !important;
                    }
                </style>
                <button style="padding: 7px 30px;    position: absolute;
width: 100%;
right: 0;
top: 0rem;
border: 0;
background: transparent;" class="open-menu-button first-open-button open-first sub-border"><i
                        class="ul-open-icon fas fa-plus ikon" aria-hidden="true"></i></button>
                <ul class="fast-access-submenu" style="display: none">


                    <li><a class="sub-border " href=" https://posta.firat.edu.tr/">Fırat e-Posta</a>

                    </li>

                    <li><a class="sub-border " href=" https://obs.firat.edu.tr/">Öğrenci İşleri Otomasyonu</a>

                    </li>

                    <li><a class="sub-border " href=" https://obs.firat.edu.tr/">Transkript Belgesi</a>

                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<script src="{{ asset('js/faq-script.js') }}"></script>
</body>
</html>
