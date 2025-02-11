<?php
if ((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
    $numview = 6;
else $numview = $thongtin_step['num_view'];


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

<div class="dv-about-f">
    <?php
    if ($nd_total == 0) {
        echo "<div class='dv-notfull'>" . $glo_lang['khong_tim_thay_du_lieu_nao'] . "</div>";
    } else {
        foreach ($nd_kietxuat as $rows) {
            if ($rows['p2'] == 1) {
                $bv_chitiet = DB_fet("*", "#_baiviet_chitiet", "`showhi` = 1 and id_parent =" . $rows['id'] . "", "`catasort` DESC, `id` DESC", "", 1);
                ?>
                <div class="dv-about1 dv-about2" id="dv_<?=$rows['id']?>">
                    <div class="pagewrap">
                        <div class="article_heading dv-title">
                            <h3 class="heading_secondary"><?= $rows['tenbaiviet_' . $lang] ?></h3>
                        </div>
                        <?php foreach ($bv_chitiet as $r) { ?>
                            <div class="col-md-4">
                                <div class="article_heading">
                                    <h3 class="heading_secondary"><?= $r['tenbaiviet_' . $lang] ?></h3>
                                </div>
                                <?= $r['noidung_' . $lang] ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="showText2"><?= $rows['noidung_' . $lang] ?></div>
                <div class="clr"></div>
            <?php } else { ?>
                <div class="dv-about1">
                    <div class="article_heading dv-title">
                        <h3 class="heading_secondary"><?= $rows['tenbaiviet_' . $lang] ?></h3>
                    </div>
                    <div class="showText2"><?= $rows['noidung_' . $lang] ?></div>
                </div>
            <?php }
        }
    } ?>
</div>
