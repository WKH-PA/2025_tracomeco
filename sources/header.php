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
                    <a href="/en/" style="background:none;"><img src="images/vn.png" style="height:20px;width:20px;" alt="Tiếng việt"></a>
                    <span>|</span>
                    <a href="/en/" style="background:none;"><img src="images/eng.png" style="height:20px;width:20px;" alt="Tiếng anh"></a>
                </li>

            </ul>
        </div>
    </div>
</div>

<!-- Menu chính -->
<div class="dv-header">
    <div class="pagewrap flex">
        <!-- Logo -->
        <div class="logo_top">
            <a href="<?= $full_url . "/" ?>">
                <img src="<?= full_src($thongtin, '') ?>" alt="<?= $thongtin['tenbaiviet_' . $lang] ?>">
            </a>
        </div>

        <!-- Menu Desktop -->
        <div class="box_menu">
            <ul class="menu no_box">
                <?= GET_menu_new($full_url, $lang, '', '', '', "1") ?>
            </ul>
        </div>

        <!-- Ngôn ngữ -->
        <ul class="flag-language">
            <?= GET_menu_new($full_url, $lang, '', '', '', "7") ?>
            <?php if ($thongtin['is_lang'] == 1): ?>
                <li><a title="English" href="<?= $fullpath . '/en/' . $las_url . "/?actilang=true" ?>">
                        <img src="images/eng.png" alt="English"></a>
                </li>
                <li><a title="Tiếng Việt" href="<?= $fullpath . '/' . $las_url . "/?actilang=true" ?>">
                        <img src="images/vn.png" alt="Tiếng Việt"></a>
                </li>
            <?php endif; ?>
        </ul>

        <!-- Menu Mobile -->
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

<!-- Popup -->
<div class="dv-popup-new no_box">
    <div class="dv-popup-new-child">
        <a class="popup-close"></a>
        <div class="dv-nd-popup"></div>
    </div>
</div>
