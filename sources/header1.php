<div class="dv-header">
    <div class="pagewrap flex">
        <div class="logo_top">
            <a href="<?=$full_url."/"?>"><img src="<?= full_src($thongtin, '') ?>"
                                              alt="<?= $thongtin['tenbaiviet_' . $lang] ?>"></a>
        </div>
        <div class="box_menu">
            <ul class="menu no_box">
                <?= GET_menu_new($full_url, $lang, '', '', '', "1") ?>
                <div class="clr"></div>
            </ul>
        </div>
        <ul class="flag-language">
            <?= GET_menu_new($full_url, $lang, '', '', '', "7") ?>
            <?php
            if ($thongtin['is_lang'] == 1) {
                $las_url = "";
                if ($motty != "") $las_url .= "/" . $motty;
                if ($haity != "") $las_url .= "/" . $haity;
                if ($baty != "") $las_url .= "/" . $baty;
                if ($bonty != "") $las_url .= "/" . $bonty;
                if ($namty != "") $las_url .= "/" . $namty;
//                        if ($lang == "vi") {
                ?>
                <li><a title="American" href="<?= $fullpath . '/en' . $las_url . "/?actilang=true" ?>">
                        <img src="images/eng.png" alt="American"></a></li>
                <li><a title="Tiếng Việt" href="<?= $fullpath . $las_url . "/?actilang=true" ?>">
                        <img src="images/vn.png" alt="Tiếng Việt"></a></li>
                <?php
            } ?>
            <div class="mn-mobile">
                <div class="menu-bar hidden-md hidden-lg">
                    <a href="#nav-mobile">
                        <img alt="menu"
                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAMAAAC7IEhfAAAAQlBMVEUAAAD///////////////////////////////////////////////////////////////////////////////////8IX9KGAAAAFXRSTlMAAQUREh4gJS0uMTNKVFaVmrS16/1h/XngAAAAU0lEQVQ4y+2Ttw3AMBDEKOcsp9t/VY+gKwQYhsWa1T0f3mO6lOaOAceT1ON5GrOLA6cnNlTLlmbt+CnePC0c3uC1f8L89djhztYr7KFEUaL4ZBQPR3w/3X/Sz4cAAAAASUVORK5CYII=">
                    </a>
                </div>
                <div id="nav-mobile" style="display: none">
                    <ul>
                        <?= GET_menu_new($full_url, $lang, '', '', '', "1") ?>
                    </ul>
                </div>
                <div class="clr"></div>
            </div>
        </ul>
    </div>
</div>
<div class="dv-popup-new no_box">
    <div class="dv-popup-new-child">
        <a class="popup-close"></a>
        <div class="dv-nd-popup"></div>
    </div>
</div>