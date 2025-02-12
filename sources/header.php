<div class="header_top header_top_pa">
    <div class="container-fluid">
        <div class="">
            <ul class="menu top-nav">
                <div class="san-uudai">
                    <ul class="features-list flex">
                        <?= GET_menu_new($full_url, $lang, '', '', '', "7") ?>
                    </ul>
                </div>
                <li class="lang flex">
                    <?php
                    if ($thongtin['is_lang'] == 1) {
                        // Tạo đường dẫn URL ngắn gọn
                        $las_url = implode("/", array_filter([$motty, $haity, $baty, $bonty, $namty]));

                        // Kiểm tra ngôn ngữ hiện tại và tạo đường dẫn chuyển đổi
                        if ($lang == "vi") {
                            $vi_url = $fullpath . '/' . $las_url . "/?actilang=true";
                            $en_url = $fullpath . '/en/' . $las_url . "/?actilang=true";
                        } else {
                            $vi_url = $fullpath . '/' . $las_url . "/?actilang=true";
                            $en_url = $fullpath . '/vi/' . $las_url . "/?actilang=true";
                        }
                        ?>
                        <a href="<?= $vi_url ?>" style="background:none;">
                            <img src="images/vn.png" style="height:20px;width:20px;" alt="Tiếng Việt">
                        </a>
                        <span>|</span>
                        <a href="<?= $en_url ?>" style="background:none;">
                            <img src="images/eng.png" style="height:20px;width:20px;" alt="English">
                        </a>
                    <?php } ?>
                </li>


            </ul>
        </div>
    </div>
</div>

<div class="header header_pa">
    <div class="container-fluid">
        <div class="row flex" style="align-items:center;">
            <div class="logo_top">
                <a href="<?= $full_url . "/" ?>">
                    <img src="<?= full_src($thongtin, '') ?>" alt="<?= $thongtin['tenbaiviet_' . $lang] ?>">
                </a>
            </div>
            <div class="main_menu">
                <ul class="menu menu_pc">
                    <?= GET_menu_new($full_url, $lang, 'sub-menu', 'sub-menu', '', "1") ?>
                </ul>
            </div>
<!--            <div class="mobile-menu-area">-->
<!--                <div class="container">-->
<!--                    <div id="content_menu_mobile">-->
<!--                        <div class="header_menu_mobile">-->
<!--                            <a href="#menu" class="btn_menu">-->
<!--                                <i class="fa-solid fa-bars"></i>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                        <nav id="menu">-->
<!--                            <div id="panel-menu">-->
<!--                                <ul>-->
<!--                                    --><?//= GET_menu_new($full_url, $lang, '', '', '', "1") ?>
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </nav>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="mobile-menu-area">
                <div class="container">
                    <div id="content_menu_mobile">
                        <div class="header_menu_mobile">
                            <a href="#menu" class="btn_menu">
                                <i class="fa-regular fa-bars"></i>
                            </a>
                        </div>
                        <nav id="menu">
                            <div id="panel-menu">
                                <ul>
                                    <li class="homepage">
                                        <a href="index.php" title="Trang chủ">Trang chủ</a>
                                    </li>

                                    <li>
                                        <a href="index.php?page=gioithieu">Giới thiệu</a>
                                        <ul>
                                            <li class="ad-br">
                                                <a href="index.php?page=gioithieu">Về công ty</a>
                                                <ul class="dl-submenu">
                                                    <li><a href="index.php?page=gioithieu" title="Về công ty 1">Về công ty 1</a></li>
                                                    <li><a href="index.php?page=gioithieu" title="Về công ty 2">Về công ty 2</a></li>
                                                </ul>
                                            </li>
                                            <li class="ad-br">
                                                <a href="index.php?page=van-hoa-cong-ty">Văn hóa công ty</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="index.php?page=linhvuc">Lĩnh vực hoạt động</a>
                                        <ul>
                                            <li><a href="index.php?page=linhvuc">Công nghiệp ô tô</a></li>
                                            <li><a href="index.php?page=linhvuc">Dịch vụ cảng</a></li>
                                            <li><a href="index.php?page=linhvuc">Cơ khí & Công nghiệp hỗ trợ</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="index.php?page=quan-he-co-dong">Quan hệ cổ đông</a>
                                        <ul>
                                            <li><a href="index.php?page=thong-tin-co-dong">Thông tin cổ đông</a></li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#">Truyền thông</a>
                                        <ul>
                                            <a href="index.php?page=tintuc">Tin tức</a>
                                            <a href="index.php?page=tuyendung">Tin tuyển dụng</a>
                                            <a href="index.php?page=thu-vien-anh-va-video">Thư viện ảnh và video</a>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="index.php?page=lienhe">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>


<script>
    $(document).ready(function(){
        // Thêm debounce để tối ưu hiệu năng
        let scrollTimer;
        $(window).scroll(function(){
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(function(){
                if ($(window).scrollTop() > 150) {
                    $('.header').addClass('fixed');
                } else {
                    $('.header').removeClass('fixed');
                }
            }, 10); // Độ trễ 10ms
        });
    });
</script>