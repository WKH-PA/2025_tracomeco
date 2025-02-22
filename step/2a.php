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
//$list_hinhcon = LAY_hinhanhcon($arr_running['id'], 50);
// $tinhnang_arr = DB_fet("*","`#_baiviet_tinhnang`","`showhi` = 1 AND `step` = '".$slug_step."' ","`catasort` ASC, `id` DESC","","arr", 1);
// full_src($thongtin_step, '')
$tinhnang = LAY_bv_tinhnang(2);
$baiviet_ct = LAY_baiviet_chitiet($arr_running['id']);
$list_hinhcon = LAY_hinhanhcon($arr_running['id'], 50);
$bvlienquan = DB_fet("*", "#_baiviet", "`showhi` = 1 and id_parent =" . $arr_running['id_parent'] . " and step=" . $slug_step, "RAND()", "12", 1);
include _source . "box-header.php";
//$gia = GET_gia($arr_running['giatien'], $arr_running['giakm'], $glo_lang['dvt'], $glo_lang['gia_lienhe'], "gia_ban", "gia_km", '', '', $thongtin['is_giamuti'], $arr_running['id']);

?>
<!-- <li><i class="fa fa-home"></i><a href="<?= $full_url ?>"><?= $glo_lang['trang_chu'] ?></a><?= GET_bre($arr_running['id_parent'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '<i class="fa fa-angle-right"></i>') ?></li> -->
<link rel="stylesheet" href="css/jquery.fancybox.min.css" />
<!--<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>-->
<!--<script src="js/bootstrap.min.js"></script>-->
<!--<script src="js/jquery.fancybox.min.js"></script>-->
<!--<script src="js/TweenMax.min.js"></script>-->
<!--<script type="text/javascript" src="js/slick.min.js"></script>-->

<div class="page_conten_page p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="viewSanpham flex">
            <div class="viewLeft">
                <div id="pro_img_main">
                    <div id="bridal_images">
                        <a href='<?= checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>' class='cloud-zoom' id='zoom1' rel="position: 'inside' , showTitle: false, adjustX:0, adjustY:0">
                            <img src="<?= checkImage($fullpath, $arr_running['icon'], $arr_running['duongdantin']) ?>">
                        </a>
                    </div>
                    <div id="bridal_images_list">

                        <ul id="pro_img_slide">
                            <?php
                            $i = 1;
                            foreach ($list_hinhcon as $rows) {
                                $i++;
                                if ($i > 20)
                                    continue;
                                ?>
                                <li><a href='<?= checkImage($fullpath, $rows['icon'], $rows['duongdantin']) ?>'
                                       class='cloud-zoom-gallery'
                                       rel="useZoom: 'zoom1', smallImage: '<?= checkImage($fullpath, $rows['icon'], $rows['duongdantin']) ?>'"><img
                                                src="<?= checkImage($fullpath, $rows['icon'], $rows['duongdantin'], "thumbnew_") ?>"></a>
                                </li>

                            <?php } ?>
                        </ul>
                        <a class="pro_slide_prev" id="pro_slide_prev" href="#"><span> < </span></a> <a class="pro_slide_next" id="pro_slide_next" href="#"><span> > </span></a>
                    </div>
                    <script>
                        if (jQuery.browser === undefined) {
                            jQuery.browser = {};
                            jQuery.browser.msie = /msie/.test(navigator.userAgent.toLowerCase());
                        }
                    </script>
                    <script type="text/javascript" src="js/cloud-zoom.1.0.2.min.js"></script>
                    <script type="text/javascript">
                        jQuery(document).ready(function(){
                            $("#pro_img_slide").carouFredSel({
                                circular: false,
                                infinite: false,
                                auto  : false,
                                scroll  : {
                                    items  : "page",
                                },
                                prev : {
                                    button : "#pro_slide_prev",
                                    key    : "left"
                                },
                                next : {
                                    button : "#pro_slide_next",
                                    key    : "right"
                                }
                            });
                        });
                    </script>
                </div>
            </div>
            <!--end viewLeft-->
            <div class="viewRight">
                <div class="viewRight_more">
                    <h1 class="titleView"><?= GET_text('tenbaiviet', $arr_running) ?></h1>
                    <?= GET_text('mota',$arr_running) ?>
                    <div class="flex">
                        <p class="read-more" style="margin-right: 20px;">
                            <a href="<?= $full_url?>/lien-he" title="<?= $glo_lang['lien_he_bao_gia'] ?>"><?= $glo_lang['lien_he_bao_gia'] ?><i class="fa-light fa-arrow-up-right-from-square"></i></a>
                        </p>
                        <p class="read-more" style="">
                            <a href="tel:<?=GET_text('sodienthoai_',$thongtin)?>" title="<?= $glo_lang['goi_ngay'] ?>"><?= $glo_lang['goi_ngay'] ?> <i class="fa-light fa-phone-flip"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="tracomeco-container">

            <div class="tracomeco-bar tracomeco-black">
                <button class="tracomeco-bar-item tracomeco-button tablink tracomeco-red" onclick="openCity2(event,'tabs1')"><?= $glo_lang['thong_so_ky_thuat'] ?></button>
                <button class="tracomeco-bar-item tracomeco-button tablink" onclick="openCity2(event,'tabs2')"><?= $glo_lang['kieu_dang'] ?></button>
                <button class="tracomeco-bar-item tracomeco-button tablink" onclick="openCity2(event,'tabs3')"><?= $glo_lang['noi_that'] ?></button>
                <button class="tracomeco-bar-item tracomeco-button tablink" onclick="openCity2(event,'tabs4')"><?= $glo_lang['an_toan'] ?></button>
            </div>

            <div id="tabs1" class="tracomeco-container tracomeco-border city">
                <div class="showText">
                    <?= GET_text('thongso_',$arr_running) ?>
                </div>
            </div>

            <div id="tabs2" class="tracomeco-container tracomeco-border city" style="display:none">
                <div class="showText">
                    <?= GET_text('kieudang_',$arr_running) ?>
                </div>
            </div>

            <div id="tabs3" class="tracomeco-container tracomeco-border city" style="display:none">
                <div class="showText">
                    <?= GET_text('noidung_',$arr_running) ?>
                </div>
            </div>

            <div id="tabs4" class="tracomeco-container tracomeco-border city" style="display:none">
                <div class="showText">
                    <?= GET_text('noidung2_',$arr_running) ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?= include _source . "box_footer.php";?>
