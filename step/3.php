<?php
if ((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
    $numview = 4;
else
    $numview = $thongtin_step['num_view'];

$where = "AND `opt`=1";
$nd_hot = DB_fet_rd("*", "`#_baiviet`", " `step` IN (" . $slug_step . ") $where ", "  ", 3, "id");

$key = isset($_GET['key']) ? str_replace("+", " ", strip_tags($_GET['key'])) : null;
$year = isset($_GET['year']) ? str_replace("+", " ", strip_tags($_GET['year'])) : '';
$dm = isset($_GET['dm']) ? str_replace("+", " ", strip_tags($_GET['dm'])) : '';

$is_search = !empty($key) ? true : false;
$is_search_year = !empty($_GET['year']) ? true : false;
$is_danhmuc = !empty($_GET['dm']) ? true : false;
//$is_search = $motty == 'search' ? true : false;
$wh = "";
$lay_all_kx = "";
$name_titile = !empty($arr_running['tenbaiviet_' . $lang]) ? SHOW_text($arr_running['tenbaiviet_' . $lang]) : "";
if ($is_search) {
    $slug_step = "5";
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
    $wh .= " AND (`tenbaiviet_" . $lang . "` LIKE '%" . $key . "%')";

}
if ($is_search_year) {
    $wh .= " AND YEAR(FROM_UNIXTIME(ngaydang)) = $year";
}
if ($is_danhmuc) {
    $wh .= " AND `id_parent` = $dm";
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
//var_dump($thongtin_step); ;
//exit;
//if ($is_search) {
//    $link_p = '<span>/</span><a>' . $glo_lang['tim_kiem'] . "</a>";
//    $thongtin_step = LAY_anhstep_now(3);
//} else {
//    $link_p = GET_bre($arr_running['id'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '|');
//}
include _source . "box-header.php";

?>

<div class="page_conten_page p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="tracomeco_home_tin_tuc tt_tintuc flex" style="background: none">
            <div class="col_conten_left" id="content_fix">
                <div class="slide_tin_tuc">
                    <div class="block_tin_tuc row">
                        <?php
                        $first = true;
                        foreach ($nd_hot

                        as $rows) {
                        if ($first) {
                        ?>
                        <div class="col-md-8">
                            <div class="post_item lg">
                                <div class="post_img">
                                    <a <?= full_href($rows) ?>><img src="<?= $fullpath . '/datafiles/' . $rows['icon'] ?>"
                                        class="isload isload_full isload_full_1"
                                        alt="<?= $rows['tenbaiviet_' . $lang] ?>"></a>
                                </div>
                                <div class="post_info">
                                    <h3><a <?= full_href($rows) ?>><?= $rows['tenbaiviet_' . $lang] ?></a></h3>
                                    <p class="dated"><i
                                                class="fa-regular fa-calendar-days"></i> <?= date("d/m/Y", $rows['ngaydang']); ?>
                                    </p>
                                    <p style="margin-bottom: 0"><?= $rows['mota_' . $lang] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <?php
                            $first = false;
                            } else {
                                ?>
                                <div class="post_item">
                                    <div class="post_img">
                                        <a <?= full_href($rows) ?>><img src="<?= $fullpath . '/datafiles/' . $rows['icon'] ?>"
                                        class="isload isload_full isload_full_1"
                                        alt="<?= $rows['tenbaiviet_' . $lang] ?>"></a>
                                    </div>
                                    <div class="post_info">
                                        <h3><a <?= full_href($rows) ?>><?= $rows['tenbaiviet_' . $lang] ?></a></h3>
                                        <p class="dated"><i
                                                    class="fa-regular fa-calendar-days"></i> <?= date("d/m/Y", $rows['ngaydang']); ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                            }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="filter-search-sharehoder non-field m-t-20">
                    <form class="form-search flex">
                        <div class="search">
                            <input type="text" autocomplete="false" class="form-control form-control-sm"
                                   placeholder="<?=$glo_lang['nhap_tu_khoa_tim_kiem']?>"
                                   value="<?= !empty($_GET['key']) ? $_GET['key'] : "" ?>" name="key">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <select class="select-year font18" name="year" style="margin-right: 20px;">
                            <option value="">Tất cả</option>
                            <?php
                            $currentYear = date("Y");
                            $startYear = 2000;
                            for ($year = $currentYear; $year >= $startYear; $year--) {
                                $select = !empty($_GET['year']) && $_GET['year'] == $year ? "selected" : "";
                                echo "<option $select  value=\"$year\">$year</option>";
                            }
                            ?>
                        </select>
                        <?php $danhmuc = LAY_danhmuc($arr_running['id'], ""); ?>
<!--                        <select class="select-year font18" name="dm">-->
<!--                            <option value="">Tất cả</option>-->
<!--                            --><?php //foreach ($danhmuc as $rows) {
//                                $selectdm = !empty($_GET['dm']) && $_GET['dm'] == $rows['id'] ? "selected" : "";
//                                ?>
<!--                                <option --><?//=$selectdm?><!-- value="--><?//= SHOW_text($rows['id']) ?><!--">-->
<!--                                    --><?//= SHOW_text($rows['tenbaiviet_' . $lang]) ?>
<!--                                </option>-->
<!--                            --><?php //} ?>
<!--                        </select>-->
                    </form>
                </div>
                <div class="list-media_wrapper">
                    <?php
                    if ($nd_total == 0) {
                        echo "<div class='new_id_bs'>" . $glo_lang['khong_tim_thay_du_lieu_nao'] . "</div>";
                    } else {
                        foreach ($nd_kietxuat as $rows) {
                            ?>
                            <div class="new_id_bs">
                                <li><a <?= full_href($rows) ?>><img src="<?= $fullpath . '/datafiles/' . $rows['icon'] ?>"
                                                                    class="isload isload_full isload_full_1"
                                                                    alt="<?= $rows['tenbaiviet_' . $lang] ?>"></li>
                                <ul>
                                    <h3><a <?= full_href($rows) ?>><?= $rows['tenbaiviet_' . $lang] ?></a></h3>
                                    <p class="dated"><i
                                                class="fa-regular fa-calendar-days"></i> <?= date("d/m/Y", $rows['ngaydang']); ?>
                                    </p>
                                    <p><?= limitText($rows['mota_' . $lang], 3) ?></p>
                                </ul>
                            </div>
                        <?php }
                    } ?>
                    <div class="nums">
                        <ul>
                            <?= PHANTRANG($pzer, $sotrang, $full_url . "/" . $motty, $_SERVER['QUERY_STRING']) ?>
                        </ul>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
            <div class="col_conten_right">
                <div class="sidebar_menu" id="menu-center">
                    <?php include _source . "right_conten.php"; ?>
                </div>
            </div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<div class="stop-footer w100"></div>












