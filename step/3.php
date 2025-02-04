<?php
if ((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
    $numview = 6;
else
    $numview = $thongtin_step['num_view'];


$key = isset($_GET['key']) ? str_replace("+", " ", strip_tags($_GET['key'])) : '';
$is_search = $motty == 'search' ? true : false;
$wh = "";
$lay_all_kx = "";
$name_titile = !empty($arr_running['tenbaiviet_' . $lang]) ? SHOW_text($arr_running['tenbaiviet_' . $lang]) : "";
if ($is_search) {
    $slug_step = "2,3";
    $name_titile = $glo_lang['tim_kiem'];
    // $thongtin_step = DB_que("SELECT * FROM `#_step` WHERE `id` = '6' LIMIT 1");
    // $thongtin_step = mysqli_fetch_assoc($thongtin_step);
} else if ($slug_table != 'step') {
    $lay_all_kx = LAYDANHSACH_idkietxuat($arr_running['id'], $slug_step);
}
if ($lay_all_kx != "") {
    $wh .= "  AND (FIND_IN_SET('" . $arr_running['id'] . "', `id_parent_muti`) OR (`id_parent` in (" . $lay_all_kx . "))) ";
}

if ($is_search) {
    $wh .= " AND (`tenbaiviet_" . $lang . "` LIKE '%" . $key . "%' )";
}

//
//if ($motty != "search") {
//    $sp_baiviet = LAY_baiviet($slug_step, 6, "`opt` = 1");
//    $arr_bv = array();
//    foreach ($sp_baiviet as $rows) {
//        array_push($arr_bv, $rows['id']);
//    }
//    $arr_bv = implode(",", $arr_bv);
//    if (!empty($arr_bv)) {
//        $wh .= " AND `id` NOT IN (" . $arr_bv . ") ";
//    }
//} else {
//    $numview = 15;
//}
include _source . "phantrang_kietxuat.php";
// include _source."phantrang_danhmuc.php";
// $anhcon   = LAY_anhstep($thongtin_step['id'], 1);

if ($is_search) {
    $link_p = '<span>/</span><a>' . $glo_lang['tim_kiem'] . "</a>";
    $thongtin_step = LAY_anhstep_now(3);
} else {
    $link_p = GET_bre($arr_running['id'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '|');
}
include _source . "box-header.php";
?>
<!-- <li><i class="fa fa-home"></i><a href="<?= $full_url ?>"><?= $glo_lang['trang_chu'] ?></a><?= GET_bre($arr_running['id'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '<i class="fa fa-angle-right"></i>') ?></li> -->
<div class="page_conten_page pagewrap">
    <div class="tin_left">
        <div class="tt_page_top tt_tintuc flex">
            <?php
            if ($nd_total == 0) {
                echo "<div class='dv-notfull'>" . $glo_lang['khong_tim_thay_du_lieu_nao'] . "</div>";
            } else {
                foreach ($nd_kietxuat as $rows) {
                    ?>
                    <div class="new_id_bs">
                        <li>
                            <?php if ($rows['opt2'] == 1) { ?>
                                <i class="fa-solid fa-fire fa-bounce"
                                    style="color: #ff0000;position: absolute;right: 15px;top: 15px;background: rgba(255,255,255,0.7);padding: 10px;border-radius: 10px; z-index: 30">
                                    HOT</i>
                            <?php } ?>
                            <a <?= full_href($rows) ?>><?= full_img($rows) ?></a>
                        </li>
                        <ul>
                            <h3>
                                <a class="limit-row-3" <?= full_href($rows) ?>><?= $rows['tenbaiviet_' . $lang] ?></a>
                            </h3>
                            <p class="limit-row-3">
                                <?= strip_tags($rows['mota_' . $lang]) ?>
                            </p>
                        </ul>
                        <div class="clr"></div>
                    </div>
                <?php }
            } ?>
            <div class="clr"></div>
        </div>
        <div class="nums no_box">
            <?= PHANTRANG($pzer, $sotrang, $full_url . "/" . $motty, $_SERVER['QUERY_STRING']) ?>
            <div class="clr"></div>
        </div>
    </div>
    <?php include _source . "tin_right.php"; ?>
    <div class="clr"></div>
</div>