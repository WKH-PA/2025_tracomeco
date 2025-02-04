<?php
$kietxuat_name = DB_fet_rd("*", "#_danhmuc", "`step` = '" . $slug_step . "' AND `id` = '" . $arr_running['id_parent'] . "'", "`id` DESC", 1, "id");


if (empty($kietxuat_name))
    $kietxuat_name = $thongtin_step['tenbaiviet_' . $lang];
else
    $kietxuat_name = $kietxuat_name[$arr_running['id_parent']]['tenbaiviet_' . $lang];

$lay_all_kx = LAYDANHSACH_idkietxuat($arr_running['id_parent'], $slug_step);

$wh = "AND `id_parent` in (" . $lay_all_kx . ") AND `id` <>  '" . $arr_running['id'] . "'";
$numview = 12;
// $nd_kietxuat  = DB_fet(" * "," `#_baiviet` "," `showhi` =  1 AND `step` IN (".$slug_step.") $wh "," `catasort` DESC "," $numview","arr");
$nd_kietxuat = DB_fet_rd(" * ", " `#_baiviet` ", "  `step` IN (" . $slug_step . ") $wh ", " `catasort` DESC, `id` DESC ", $numview);
if (!count($nd_kietxuat)) {
    $nd_kietxuat = DB_fet_rd(" * ", " `#_baiviet` ", "  `step` IN (" . $slug_step . ")", " RAND() ", $numview);
}
$nd_kietxuat_goiy = DB_fet(" * ", " `#_baiviet` ", "  `step` IN (" . $slug_step . ") $wh ", " RAND()", $numview, "arr");

// $nd_total = DB_que("SELECT `id` FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh");
// $nd_total = mysqli_num_rows($nd_total);
$list_hinhcon = LAY_hinhanhcon($arr_running['id'], 50);
// $tinhnang_arr = DB_fet("*","`#_baiviet_tinhnang`","`showhi` = 1 AND `step` = '".$slug_step."' ","`catasort` ASC, `id` DESC","","arr", 1);
// full_src($thongtin_step, '')
$tinhnang = LAY_bv_tinhnang(2);
$baiviet_ct = LAY_baiviet_chitiet($arr_running['id']);
$bvlienquan = DB_fet("*", "#_baiviet", "`showhi` = 1 and id_parent =" . $arr_running['id_parent'] . " and step=" . $slug_step, "RAND()", "12", 1);
include _source . "box-header.php";
$gia = GET_gia($arr_running['giatien'], $arr_running['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '', '', $thongtin['is_giamuti'], $arr_running['id']);

?>
<!-- <li><i class="fa fa-home"></i><a href="<?= $full_url ?>"><?= $glo_lang['trang_chu'] ?></a><?= GET_bre($arr_running['id_parent'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '<i class="fa fa-angle-right"></i>') ?></li> -->
<link rel="stylesheet" href="css/jquery.fancybox.min.css" />
<!--<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>-->
<!--<script src="js/bootstrap.min.js"></script>-->
<!--<script src="js/jquery.fancybox.min.js"></script>-->
<!--<script src="js/TweenMax.min.js"></script>-->
<!--<script type="text/javascript" src="js/slick.min.js"></script>-->


<div class="page_conten_page pagewrap">
    <!-- <?php include _source . "menu_left.php"; ?> -->
    <div class="tin_left">
        <div class="pro_view_more">
            <div class="leftBox" id="proView">
                <!--  -->
                <div class="viewLeft no_box">
                    <div id="pro_img_main">
                        <!--  -->
                        <div id="bridal_images_list">
                            <ul id="pro_img_slide">
                                <li>
                                    <a href='<?= checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>'
                                        class='cloud-zoom-gallery'
                                        rel="useZoom: 'zoom1', smallImage: '<?= checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>'"><img
                                            src="<?= checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>"></a>
                                </li>
                                <?php
                                $i = 1;
                                foreach ($list_hinhcon as $rows) {
                                    $i++;
                                    if ($i > 4)
                                        continue;
                                    ?>
                                    <li><a href='<?= checkImage($fullpath, $rows['icon'], $rows['duongdantin']) ?>'
                                            class='cloud-zoom-gallery'
                                            rel="useZoom: 'zoom1', smallImage: '<?= checkImage($fullpath, $rows['icon'], $rows['duongdantin']) ?>'"><img
                                                src="<?= checkImage($fullpath, $rows['icon'], $rows['duongdantin'], "thumbnew_") ?>"></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!--  -->
                        <div id="bridal_images">
                            <a href='<?= checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>'
                                class='cloud-zoom' id='zoom1'
                                rel="position: 'inside' , showTitle: false, adjustX:0, adjustY:0"><img
                                    src="<?= checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>"></a>
                        </div>
                        <?php //if(count($list_hinhcon)){ ?>
                        <!-- <div class="dv-slider-nang no_box">
                            <?php $data = array("2", "3", "3", "3", "3", "3") ?>
                            <div class="owl-auto-sp owl-carousel owl-theme flex" data0="<?= $data[0] ?>"
                                data1="<?= $data[1] ?>" data2="<?= $data[2] ?>" data3="<?= $data[3] ?>"
                                data4="<?= $data[4] ?>" data5="<?= $data[5] ?>" is_slidespeed="1000" is_navigation="1"
                                is_dots="1" is_autoplay="1">
                                <?php if (count($list_hinhcon)) { ?>
                                    <div class="item">
                                        <li>
                                            <a href='<?= checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>'
                                                class='cloud-zoom-gallery'
                                                rel="useZoom: 'zoom1', smallImage: '<?= checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>'"><img
                                                    src="<?= checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>"></a>
                                        </li>
                                    </div>
                                <?php } ?>
                                <?php
                                $i = 1;
                                foreach ($list_hinhcon as $rows) {
                                    $i++;
                                    ?>
                                    <div class="item">
                                        <li><a href='<?= checkImage($fullpath, $rows['icon'], $rows['duongdantin']) ?>'
                                                class='cloud-zoom-gallery'
                                                rel="useZoom: 'zoom1', smallImage: '<?= checkImage($fullpath, $rows['icon'], $rows['duongdantin']) ?>'"><img
                                                    src="<?= checkImage($fullpath, $rows['icon'], $rows['duongdantin'], "thumbnew_") ?>"></a>
                                        </li>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="clr"></div>
                        </div> -->
                        <?php //} ?>

                    </div>
                </div>
                <!--  -->
                <!--end viewLeft-->
                <div class="viewRight">
                    <div class="title_more_pro">
                        <ul>
                            <h3>
                                <?= SHOW_text($arr_running['tenbaiviet_' . $lang]) ?>
                            </h3>
                            <h2 class="h5_giact_sp">
                                <?php if (trim($arr_running['giatien']) == trim($arr_running['giakm'])) { ?>
                                    <p>
                                        <?= "Giá: " . $gia['text_gia'] ?>
                                    </p>
                                <?php } else { ?>
                                    <p>
                                        <?= "Giá khuyến mãi:" . $gia['text_gia'] ?>
                                    </p>
                                    <p style="text-decoration: line-through;">
                                        <?= "Giá gốc:" . $gia['text_km'] ?>
                                    </p>
                                <?php } ?>
                            </h2>
                            <?= $arr_running['p1'] != "" ? "<p>" . $glo_lang['cart_ma_sp'] . ': ' . $arr_running['p1'] . "</p>" : "" ?>
                            <!-- <p>
                                <?= GET_sao_sp($arr_running['num_1'], $arr_running['num_2'], $arr_running['id']) ?>
                            </p> -->
                            <div class="dv-mota-sp">
                                Mô tả:
                                <?= SHOW_text($arr_running['mota_' . $lang]) ?>
                                <div class="clr"></div>
                            </div>
                            <div class="ct_add">
                                <ul>
                                    <h3><a href="<?= $full_url . '/lien-he' ?>" class="a_cart clor_02">
                                            <?= $glo_lang['lien_he_ngay'] ?></a>
                                    </h3>
                                    <div class="clr"></div>
                                </ul>
                            </div>
                        </ul>
                    </div>

                    <!--  -->
                    <!-- <form method="post" action="<?= $full_url . "/gio-hang/" ?>" id="form_dathang">
                        <input type="hidden" class="js_idbv" name="id" value="<?= $arr_running['id'] ?>">
                        <?php
                        $tinhnang_arr = LAY_bv_tinhnang($slug_step);
                        $i = 0;
                        foreach ($tinhnang_arr as $rows) {
                            if ($rows['id_parent'] != 0)
                                continue;
                            if ($rows['noi_bat'] != 1)
                                continue;

                            $tnoff_child = DB_que("SELECT * FROM `#_baiviet_select_tinhnang` WHERE `showhi` = 1 AND `id_baiviet` = '" . $arr_running['id'] . "' AND `id_tinhnang` = '" . $rows['id'] . "' ORDER BY `id` DESC");

                            if (!mysqli_num_rows($tnoff_child))
                                continue;
                            $i++;
                            ?>
                            <div class="dv-tinhnang-dh">
                                <p class="iti">
                                    <?= $rows['tenbaiviet_' . $lang] ?>
                                </p>
                                <div class="dv-ndd flex no_box">
                                    <?php
                                    while ($rows_2 = mysqli_fetch_assoc($tnoff_child)) {
                                        ?>
                                        <label class="<?= $rows_2['icon'] != "" ? "img js_click_img" : '' ?>" <?= $rows_2['icon'] != '' ? 'onclick="$(\'a\',this).trigger(\'click\');' : '' ?>">
                                            <input type="radio" name="tinhnang_<?= $i ?>" class="js_tinhnang_getval"
                                                idname="<?= $arr_running['id'] . "_" . $rows['id'] ?>"
                                                data="<?= $rows_2['id_val'] ?>" value="<?= $rows_2['id_val'] ?>">
                                            <span class="<?= $rows_2['icon'] != "" ? "img" : '' ?>"
                                                style="<?= $rows_2['icon'] != '' ? 'background: url(' . $fullpath . "/" . $rows_2['duongdantin'] . "/" . $rows_2['icon'] . ');"' : '' ?>">
                                                <?php if ($rows_2['icon'] != "") { ?>
                                                    <a href="<?= $fullpath . "/" . $rows_2['duongdantin'] . "/" . $rows_2['icon'] ?>"
                                                        class="cloud-zoom-gallery"
                                                        rel="useZoom: 'zoom1', smallImage: '<?= $fullpath . "/" . $rows_2['duongdantin'] . "/" . $rows_2['icon'] ?>'">
                                                    <?php } ?>
                                                    <?= $tinhnang_arr[$rows_2['id_val']]['tenbaiviet_' . $lang] ?>
                                                    <?php if ($rows_2['icon'] != "") { ?>
                                                    </a>
                                                <?php } ?>
                                            </span>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="add_cart">
                            <h3><a class="cur" onclick="$('#form_dathang').submit();">
                                    <?= $glo_lang['mua_ngay'] ?>
                                </a>
                            </h3>
                            <ul>
                                <li><a class="cur p_yeuthich p_yeuthich_<?= $arr_running['id'] ?>"
                                        onclick="yeu_thich(this, <?= $arr_running['id'] ?>)"><i
                                            class="fa fa-heart-o"></i> <span>
                                            <?= $glo_lang['yeu_thich'] ?>
                                        </span>
                                    </a></li>
                                <li><a class="cur"
                                        onclick="popupwindow('https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u=<?= $full_url . "/" . $motty ?>&display=popup&ref=plugin&src=share_button', 'title', 300, 300)"><i
                                            class="fa fa-share-alt"></i> <span>
                                            <?= $glo_lang['chia_se'] ?>
                                        </span>
                                    </a></li>
                                <?php
                                $lienhe = LAY_step(6, 1);
                                ?>
                                <li><a <?= full_href($lienhe) ?>><i class="fa fa-envelope-o"></i>
                                        <span>
                                            <?= $glo_lang['lien_he'] ?>
                                        </span> </a></li>
                                <div class="clr"></div>
                            </ul>
                        </div>
                    </form> -->
                    <!--  -->
                </div>
                <div class="clr"></div>
            </div>
            <div class="clr"></div><br>
            <div class="detail">
                <h4>Thông tin chi tiết: </h4>
                <?= SHOW_text($arr_running['noidung_' . $lang]) ?>
                <div class="clr"></div>
            </div>
        </div>

        <?php if (!empty($load_ajax_all)) { ?>
            <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
            <script type="text/javascript">
                jQuery.browser = {};
                (function () {
                    jQuery.browser.msie = false;
                    jQuery.browser.version = 0;
                    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                        jQuery.browser.msie = true;
                        jQuery.browser.version = RegExp.$1;
                    }
                })();

            </script>
            <script type="text/javascript" src="js/jquery.lazyload.min.js"></script>
            <script type="text/javascript" language="javascript" src="js/me.js?v=<?= time() ?>"></script>
            <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
            <script type="text/javascript" src="js/owl.carousel.js"></script>

        <?php } else { ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".owl-auto-sp-new").each(function () {
                        var is_slidespeed = $(this).attr("is_slidespeed");
                        var is_navigation = $(this).attr("is_navigation") == 1 ? true : false;
                        var is_dots = $(this).attr("is_dots") == 1 ? true : false;
                        var is_autoplay = $(this).attr("is_autoplay") == 1 ? true : false;
                        var is_items_0 = $(this).attr("data0");
                        var is_items_1 = $(this).attr("data1");
                        var is_items_2 = $(this).attr("data2");
                        var is_items_3 = $(this).attr("data3");
                        var is_items_4 = $(this).attr("data4");
                        var is_items_5 = $(this).attr("data5");
                        $(this).owlCarousel({
                            slideSpeed: is_slidespeed,
                            navigation: is_navigation,
                            itemsCustom: [
                                [0, is_items_0],
                                [319, is_items_1],
                                [479, is_items_2],
                                [767, is_items_3],
                                [991, is_items_4],
                                [1199, is_items_5]
                            ],
                            dots: is_dots,
                            autoPlay: is_autoplay,
                            navigationText: ["‹", "›"]
                        });
                    });
                });
            </script>
        <?php } ?>
        <script type="text/javascript" src="js/cloud-zoom.1.0.2.min.js"></script>
        <div class="box_page">
            <div class="title_page">
                <ul>
                    <h3 class="h_title">
                        <?= $glo_lang['san_pham_lien_quan'] ?>
                    </h3>
                </ul>
            </div>
            <?php $data = array("3", "3", "3", "3", "3", "3") ?>
            <div class="dv-home-lh flex owl-auto owl-carousel owl-theme owl-custome" data0="<?= $data[0] ?>"
                data1="<?= $data[1] ?>" data2="<?= $data[2] ?>" data3="<?= $data[3] ?>" data4="<?= $data[4] ?>"
                data5="<?= $data[5] ?>" is_slidespeed="1000" is_navigation="1" is_autoplay="1">
                <?php foreach ($bvlienquan as $rows) {
                    if ($rows['tenbaiviet_' . $lang] == $arr_running['tenbaiviet_' . $lang])
                        continue;
                    else { ?>
                        <div class="dv-gr-lh slider">
                            <div class="img">
                                <a <?= full_href($rows) ?>>
                                    <img class="lazy" <?= full_src_lazy($rows) ?>></a>
                            </div>
                            <div class="text-left">
                                <a <?= full_href($rows) ?>>
                                    <h3>
                                        <?= $rows['tenbaiviet_' . $lang] ?>
                                    </h3>
                                </a>
                                <div class="clr"></div>
                            </div>
                        </div>
                    <?php } ?>

                <?php } ?>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <?php include _source . "tin_right.php"; ?>
    <div class="clr"></div>
</div>