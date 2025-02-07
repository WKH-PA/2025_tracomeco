<?php
if ((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
    $numview = 12;
else $numview = $thongtin_step['num_view'];

$key = isset($_GET['key']) ? str_replace("+", " ", strip_tags($_GET['key'])) : '';
$year = isset($_GET['year']) ? str_replace("+", " ", strip_tags($_GET['year'])) : '';

$is_search = isset($_GET['key']) ? true : false;
$is_search_year = isset($_GET['year']) ? true : false;

$lay_all_kx = "";
$name_titile = !empty($arr_running['tenbaiviet_' . $lang]) ? SHOW_text($arr_running['tenbaiviet_' . $lang]) : "";
if ($is_search) {
    $slug_step = "3,4,12";
    $name_titile = $glo_lang['tim_kiem'];
    // $thongtin_step = DB_que("SELECT * FROM `#_step` WHERE `id` = '6' LIMIT 1");
    // $thongtin_step = mysqli_fetch_assoc($thongtin_step);
} else if ($slug_table != 'step') {
    $lay_all_kx = LAYDANHSACH_idkietxuat($arr_running['id'], $slug_step);
}
$wh = "";
if ($lay_all_kx != "") {
    $wh = "  AND `id_parent` in (" . $lay_all_kx . ") ";
}

if ($is_search) {
    $wh .= " AND (`tenbaiviet_vi` LIKE '%" . $key . "%' OR `tenbaiviet_en` LIKE '%" . $key . "%')";
}

// //check year
if ($is_search_year) {
    $wh .= " AND YEAR(`ngaydang`) = $year";
}
//
include _source . "phantrang_kietxuat.php";
// include _source."phantrang_danhmuc.php";

// $anhcon   = LAY_anhstep($thongtin_step['id'], 1);

if ($is_search != "") {
    $link_p = '<span>/</span><a>' . $glo_lang['tim_kiem'] . "</a>";
    $thongtin_step = LAY_anhstep_now(3);
} else {
    $link_p = GET_bre($arr_running['id'], $slug_step, $full_url, $lang, $thongtin_step, $slug_table, '/');
}
include _source."box-header.php";

// full_src($thongtin_step, '')
?>
<div class="page_conten_page p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="tt_page_top flex">
            <div class="col_conten_left">
                <div class="filter-search-sharehoder non-field">
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
                    </form>
                </div>
                <div class="list-info">
                    <?php
                    if ($nd_total == 0) {
                        echo "<tr><td colspan='3'><div class='dv-notfull'>" . $glo_lang['khong_tim_thay_du_lieu_nao'] . "</div></td></tr>";
                    } else {
                        foreach ($nd_kietxuat as $rows) {
                            $day = date("d", $rows['ngaydang']);
                            $month_year = date("m/Y", $rows['ngaydang']);

                            $icon = '<i class="fa fa-file-excel-o"></i>';
                            $link = "";
                            $target = "";

                            if ($rows['dowload_text'] != "") {
                                $link = $rows['dowload_text'];
                                $target = "target='_blank'";
                            } else if ($rows['dowload'] != "") {
                                $link = $fullpath . "/datafiles/files/" . $rows['dowload'];
                                $target = "download";
                            }
                            ?>
                            <div class="info-item flex">
                                <div class="info-left">
                                    <p class="date-day"><?= $month_year ?></p>
                                    <p class="date-year fon16 text-center"><?= $day ?></p>
                                </div>
                                <div class="info-right">
                                    <h3>
                                        <!-- Mở file khi nhấn vào tên -->
                                        <a href="<?= $link ?>" target="_blank">
                                            <?= SHOW_text($rows['tenbaiviet_' . $lang]) ?>
                                        </a>
                                    </h3>
                                    <p>1 Files</p>
                                </div>
                                <div class="download">
                                    <!-- Bấm vào đây để tải file xuống -->
                                    <a href="<?= $link ?>" download class="post download">
                                        <i class="fal fa-arrow-to-bottom text-dark font28"></i>
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="col_conten_right">
                <?php include _source . "right_conten.php"; ?>
            </div>
        </div>

        <div class="clr"></div>
        <div class="nums no_box">
            <?= PHANTRANG($pzer, $sotrang, $full_url . "/" . $motty, $_SERVER['QUERY_STRING']) ?>
            <div class="clr"></div>
        </div>
    </div>
</div>
<?php include _source . "fb_sharelink.php"; ?>





