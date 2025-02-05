<div class="header_top header_top_pa">
    <div class="container-fluid">
        <div class="">
            <ul class="menu top-nav">
                <div class="san-uudai">
                    <ul class="features-list flex">
                        <?= GET_menu_new($full_url, $lang, '', '', '', "7") ?>
                    </ul>
                </div>
                <li class="flag-language">
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
                    <?= GET_menu_new($full_url, $lang, 'sub-menu', '', '', "1") ?>

                </ul>
            </div>
            <div class="mn-mobile">
                <div class="menu-bar hidden-md hidden-lg">
                    <a href="#nav-mobile">
                        <img alt="menu" src="images/menu-icon.png">
                    </a>
                </div>
                <div id="nav-mobile" style="display: none">
                    <ul>
                        <?= GET_menu_new($full_url, $lang, '', '', '', "1") ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Popup -->
<div class="dv-popup-new no_box">
    <div class="dv-popup-new-child">
        <a class="popup-close"></a>
        <div class="dv-nd-popup"></div>
    </div>
</div>

<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
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