<footer class="">
    <section class="footer_link">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <h3 class="itemtitle"><?=$thongtin['tenbaiviet_'.$lang]?></h3>
                    <ul class="itemlist p-t-10">
                        <li><?=$glo_lang['dia_chi']?>: <?=$thongtin['diachi_'.$lang]?></li>
                        <li><?=$glo_lang['email']?>: <?=$thongtin['email_'.$lang]?></li>
                        <li><?=$glo_lang['so_dien_thoai']?>: <?=$thongtin['sodienthoai_'.$lang]?></li>
                        <li><?=$glo_lang['fax']?>: <?=$thongtin['hotline_'.$lang]?></li>

                    </ul>
                </div>
                <div class="col-xl-3 col-md-6">
                    <h3 class="itemtitle"><strong>Truyền thông</strong></h3>
                    <ul class="itemlist p-t-10">
                        <li><a href="index.php?page=tintuc">Tin tức</a></li>
                        <li><a href="index.php?page=tuyendung">Tin tuyển dụng</a></li>
                        <li><a href="index.php?page=thu-vien-anh-va-video">Thư viện ảnh và video</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-md-6">
                    <h3 class="itemtitle"><strong>Lĩnh vực hoạt động</strong></h3>
                    <ul class="itemlist p-t-10">
                        <li><a href="index.php?page=linhvuc">Công nghiệp ô tô</a></li>
                        <li><a href="index.php?page=linhvuc">Dịch vụ cảng</a></li>
                        <li><a href="index.php?page=linhvuc">Cơ khí & Công nghiệp hỗ trợ</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.5229299117414!2d106.76846318421923!3d10.847774230315594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175270a51cb05f3%3A0xd85fa973135e2b44!2zNDI5IFNvbmcgSMOgbmggWGEgTOG7mSBIw6AgTuG7mWksIEhp4buHcCBQaMO6LCBRdeG6rW4gOSwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1736388991381!5m2!1svi!2s" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="socical_icon flex p-t-10">
                        <a title="Share on Facebook" href="https://www.facebook.com/pavietnam.com.vn/" target="_blank" rel="nofollow noopener" class="facebook" style="background:#39599c;"><i class="fa-brands fa-facebook-f"></i></a>
                        <a title="P.A Việt Nam Channel" href="https://www.youtube.com/c/PAVietNamLtd" target="_blank" rel="nofollow noopener" class="youtube" style="background:#e82c2a;"><i class="fa-brands fa-youtube"></i></a>
                        <a title="Share on Twitter" href="https://twitter.com/wwwpavietnamcom" target="_blank" rel="nofollow noopener" class="twitter" style="background:#0fa6f7;"><i class="fa-brands fa-twitter"></i></a>
                        <a title="P.A Việt Nam zalo" href="https://zalo.me/3610449719704001474" target="_blank" rel="nofollow noopener" class="zalo" style="background:#2990d6;"><img src="https://www.pavietnam.vn/css/images/icon_zalo.svg" alt="P.A Việt Nam zalo" height="10" style="position:absolute; top:50%; left:50%; transform: translate(-50%,-50%);"></a>
                        <a href="https://t.me/pavietnam" target="_blank" title="Telegram" rel="noopener" class="telegram" style="width:auto"><img src="https://support.pavietnam.vn/datafile/banner/2022_07/538544-11134957-join-tele.png" alt="P.A Việt Nam Telegram" height="35"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer_copyright">
        <div class="container-fluid">
            <div class="row">
                <p><?= $glo_lang['ban_quyen_name'] ?> | <a href="https://web30s.vn/" title="thiết kế website" target="_blank">
                        <?=$glo_lang['thiet_ke_va_phat_trien']?>
                    </a> <a href="https://web30s.vn/" target="_blank">P.A Việt Nam</a></p>            </div>
        </div>
    </section>

<!--    --><?php //include"back-top.php";?>

    <script>
        new WOW().init();
    </script>

    <script>
        function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" tracomeco-red", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " tracomeco-red";
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            effect: "fade",
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var swiper = new Swiper(".myBanner", {
            slidesPerView: 1,
            loop: true,
            spaceBetween: 30,
            keyboard: {
                enabled: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                bulletElement: 'span',
                bulletClass: 'swiper-pagination-bullet',
                bulletActiveClass: 'swiper-pagination-bullet-active',
                modifierClass: 'swiper-pagination-',
                currentClass: 'swiper-pagination-current',
                totalClass: 'swiper-pagination-total',
                hiddenClass: 'swiper-pagination-hidden',
                renderBullet: function (index, className) {
                    return '<span class="' + className + '"></span>';
                },
                dynamicBullets: false,
                dynamicMainBullets: 6
            },
        });

        var swiper = new Swiper(".myCamnhan", {
            loop: true,
            slidesPerView: 3,
            spaceBetween: 25,
            autoplay: {
                delay: 5000,
                pauseOnMouseEnter: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                280: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
            },
        });

        var swiper = new Swiper(".myPartner", {
            loop: true,
            slidesPerView: 5,
            spaceBetween: 20,
            autoplay: {
                delay: 5000,
                pauseOnMouseEnter: true,
            },
            breakpoints: {
                280: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                480: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
            },
        });

    </script>

    <script type="text/javascript" src="js/scroll.js"></script>

</footer>