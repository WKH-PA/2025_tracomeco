<footer class="">
    <section class="footer_link">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <h3 class="itemtitle"><?=GET_text('tenbaiviet_',$thongtin)?></h3>
                    <ul class="itemlist p-t-10">
                        <li><?=$glo_lang['dia_chi']?>: <?=GET_text('diachi',$thongtin)?></li>
                        <li><?=$glo_lang['email']?>: <?=$thongtin['email_vi']?></li>
                        <li><?=$glo_lang['so_dien_thoai']?>: <?=$thongtin['sodienthoai_vi']?></li>
                        <li><?=$glo_lang['fax']?>: <?=$thongtin['hotline_vi']?></li>

                    </ul>
                </div>
                <?php  $danhmuc = GET_menu(18);?>
                <div class="col-xl-3 col-md-6">
                    <h3 class="itemtitle"><strong><?=$glo_lang['truyen_thong']?></strong></h3>
                    <ul class="itemlist p-t-10">
                        <?php foreach ($danhmuc as $rows) { ?>
                            <li><a <?=full_href($rows) ?>><?=GET_text('tenbaiviet_') ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php  $danhmuc2 = LAY_danhmuc(9,""); ?>
                <div class="col-xl-3 col-md-6">
                    <h3 class="itemtitle"><strong><?=$glo_lang['linh_vuc_hoat_dong']?></strong></h3>
                    <ul class="itemlist p-t-10">
                        <?php foreach ($danhmuc2 as $rows) { ?>
                            <li><a <?=full_href($rows) ?>><?=GET_text('tenbaiviet_') ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <?php  $thongtin_step=LAY_anhstep_now(8);
                ?>
                <div class="col-xl-3 col-md-6">
                    <div class="maps">
                        <iframe src="<?= $thongtin_step['map_google'] ?>" width="100%" height="210" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
<!--                    <div class="socical_icon flex p-t-10">-->
<!--                        <a title="Share on Facebook" href="--><?//= $thongtin['fb_url']?><!--" target="_blank" rel="nofollow noopener" class="facebook" style="background:#39599c;"><i class="fa-brands fa-facebook-f"></i></a>-->
<!--                        <a title="Youtube" href="--><?//= $thongtin['youtube_url']?><!--" target="_blank" rel="nofollow noopener" class="youtube" style="background:#e82c2a;"><i class="fa-brands fa-youtube"></i></a>-->
<!--                        <a title="Twitter" href="--><?//= $thongtin['twi_url']?><!--" target="_blank" rel="nofollow noopener" class="twitter" style="background:#0fa6f7;"><i class="fa-brands fa-twitter"></i></a>-->
<!--                        <a title="zalo" href="--><?//= $thongtin['zalo_url']?><!--" target="_blank" rel="nofollow noopener" class="zalo" style="background:#2990d6;"><img src="https://www.pavietnam.vn/css/images/icon_zalo.svg" alt="P.A Việt Nam zalo" height="10" style="position:absolute; top:50%; left:50%; transform: translate(-50%,-50%);"></a>-->
<!--                        <a href="https://t.me/pavietnam" target="_blank" title="Telegram" rel="noopener" class="telegram" style="width:auto"><i class="fa-brands fa-telegram fa-2xl" style="color: #74C0FC;"></i></a>-->
<!--                    </div>-->
                    <div class="socical_icon flex p-t-10">
                        <?php include _source."mang_xa_hoi.php"; ?>
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

    <div id="back-top-button">
        <i class="fa-solid fa-angle-up"></i>
    </div>

    <script>
        $(window).scroll(function(e){
            var t = parseInt( $(window).scrollTop() );
            if ( t > 300 ) {
                $('#back-top-button').fadeIn();
            } else {
                $('#back-top-button').fadeOut();
            }
        });
        $('#back-top-button').click(function(){
            $("html, body").animate({ scrollTop: 0 }, "slow");
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
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
            slidesPerView: 4,
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
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
        });

    </script>

    <script type="text/javascript" src="js/scroll.js"></script>
    <script>
        function openCity(button, cityId) {
            document.querySelectorAll(".tablink").forEach(btn => btn.classList.remove("tracomeco-red"));
            button.classList.add("tracomeco-red");
            document.querySelectorAll(".city").forEach(city => city.classList.remove("active"));
            document.getElementById(cityId).classList.add("active");
            let title = button.getAttribute("data-title");
            let content = button.getAttribute("data-content");
            console.log("Tiêu đề: ", title);
            console.log("Nội dung: ", content);
        }
    </script>
    <script>
        function openCity2(evt, cityName) {
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
</footer>


