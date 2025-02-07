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


<div class="page_conten_page p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="tracomeco_home_tin_tuc tt_tintuc flex" style="background: none">
            <div class="col_conten_left" id="content_fix">

                <div class="slide_tin_tuc">
                    <div class="block_tin_tuc row">
                        <div class="col-md-8">
                            <div class="post_item lg">
                                <div class="post_img">
                                    <a href="index.php?page=tintuc_view"><img src="delete/tintuc/tintuc-1.jpg"></a>
                                </div>
                                <div class="post_info">
                                    <h3><a href="index.php?page=tintuc_view">Thông báo Nghị Quyết số 01/2024-NQ-ĐHĐCĐ</a></h3>
                                    <p class="dated"><i class="fa-regular fa-calendar-days"></i> 08/01/2025</p>
                                    <p style="margin-bottom: 0">Công ty Cổ phần Cơ khí Xây dựng Giao thông - Tracomeco - thông báo về việc ban hành Nghị quyết Đại Hội Đồng Cổ Đông - Nhiệm kỳ V (2024-2028).</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="post_item">
                                <div class="post_img">
                                    <a href="index.php?page=tintuc_view"><img src="delete/tintuc/tintuc-2.jpg"></a>
                                </div>
                                <div class="post_info">
                                    <h3><a href="index.php?page=tintuc_view">Thông báo Đại Hội Cổ Đông nhiệm kỳ V (2024 - 2028) - Dự thảo</a></h3>
                                    <p class="dated"><i class="fa-regular fa-calendar-days"></i> 08/01/2025</p>
                                </div>
                            </div>
                            <div class="post_item">
                                <div class="post_img">
                                    <a href="index.php?page=tintuc_view"><img src="delete/tintuc/tintuc-3.jpg"></a>
                                </div>
                                <div class="post_info">
                                    <h3><a href="index.php?page=tintuc_view">Báo cáo Đại Hội Cổ Đông Thường Niên Năm 2023</a></h3>
                                    <p class="dated"><i class="fa-regular fa-calendar-days"></i> 08/01/2025</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-search-sharehoder non-field m-t-20">
                    <form class="form-search flex">
                        <div class="search">
                            <input type="text" autocomplete="false" class="form-control form-control-sm" placeholder="Nhập nội dung cần tìm..." value="" name="key">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <select class="select-year font18" name="year">
                            <option value="all">Tất cả</option>
                            <?php
                            $currentYear = date("Y");
                            $startYear = 2000;
                            for ($year = $currentYear; $year >= $startYear; $year--) {
                                echo "<option value=\"$year\">$year</option>";
                            }
                            ?>
                        </select>
                        <select class="select-year font18" id="" value="0" name="year">
                            <option value="all">Lĩnh vực</option>
                            <option value="Công nghiệp ô tô">Công nghiệp ô tô</option>
                            <option value="Dịch vụ cảng">Dịch vụ cảng</option>
                            <option value="Cơ khí & Công nghiệp hỗ trợ">Cơ khí & Công nghiệp hỗ trợ</option>
                        </select>
                    </form>
                </div>
                <div class="list-media_wrapper">
                    <?php
                    if ($nd_total == 0) {
                        echo "<div class='dv-notfull'>" . $glo_lang['khong_tim_thay_du_lieu_nao'] . "</div>";
                    } else {
                        foreach ($nd_kietxuat as $rows) {
                            ?>
                            <div class="new_id_bs">
                                <li>    <a <?= full_href($rows) ?>><?= full_img($rows) ?></a></li>
                                <ul>
                                    <h3><a <?= full_href($rows) ?>><?= $rows['tenbaiviet_' . $lang] ?></a></h3>
                                    <p class="dated"><i class="fa-regular fa-calendar-days"></i> <?=date("d/m/Y", $rows['ngaydang']); ?></p>
                                    <p><?= limitText($rows['mota_' . $lang],3) ?></p>
                                </ul>
                            </div>
                        <?php }
                    } ?>
                    <div class="nums no_box">
                        <?= PHANTRANG($pzer, $sotrang, $full_url . "/" . $motty, $_SERVER['QUERY_STRING']) ?>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
            <div class="col_conten_right">
                <?php include _source . "right_conten.php"; ?>
            </div>

        </div>
        <div class="clr"></div>
    </div>
</div>










