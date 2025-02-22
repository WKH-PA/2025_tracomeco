<?php
if ((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
    $numview = 8;
else $numview = $thongtin_step['num_view'];
$where = "AND `opt`=1";
$nd_hot = DB_fet_rd("*", "`#_baiviet`", " `step` IN (" . $slug_step . ") $where ", "  ", 3, "id");

$key = isset($_GET['key']) ? str_replace("+", " ", strip_tags($_GET['key'])) : '';
$year = isset($_GET['year']) ? str_replace("+", " ", strip_tags($_GET['year'])) : '';
$dm = isset($_GET['dm']) ? str_replace("+", " ", strip_tags($_GET['dm'])) : '';

$is_search = !empty($key) ? true : false;
$is_search_year = !empty($_GET['year']) ? true : false;
$is_danhmuc = !empty($_GET['dm']) ? true : false;
//$is_search = $motty == 'search' ? true : false;

$lay_all_kx = "";
$name_titile = !empty($arr_running['tenbaiviet_' . $lang]) ? SHOW_text($arr_running['tenbaiviet_' . $lang]) : "";
if ($is_search) {
    $slug_step = "12";
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
    $wh .= "AND (tenbaiviet_" . $lang . " LIKE '%" . $key . "%' OR tenbaiviet_vi LIKE '%" . $key . "%' OR tenbaiviet_en LIKE '%" . $key . "%')";

}
if ($is_search_year) {
    $wh .= " AND YEAR(FROM_UNIXTIME(ngaydang)) = $year";
}
if ($is_danhmuc) {
    $wh .= " AND `id_parent` = $dm";
}
//

include _source . "phantrang_kietxuat.php";
// include _source."phantrang_danhmuc.php";

// $anhcon   = LAY_anhstep($thongtin_step['id'], 1);

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
        <div class="tt_page_top flex">
            <div class="col_conten_left">
                <div class="filter-search-sharehoder non-field">
                    <form class="form-search flex">
                        <div class="search">
                            <input type="text" autocomplete="false" class="form-control form-control-sm"
                                   placeholder="<?=$glo_lang['nhap_tu_khoa_tim_kiem']?>"
                                   value="<?= !empty($_GET['key']) ? $_GET['key'] : "" ?>"
                                   name="key">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <select class="select-year font18" name="year">
                            <option value=""><?=$glo_lang['tat_ca']?></option>
                            <?php
                            $currentYear = date("Y");
                            $startYear = 2000;
                            for ($year = $currentYear; $year >= $startYear; $year--) {
                                $select = !empty($_GET['year']) && $_GET['year'] == $year ? "selected" : "";
                                echo "<option $select value=\"$year\">$year</option>";
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

//                            $icon = '<i class="fa fa-file-excel-o"></i>';
//                            $link = "";
//                            $target = "";

//                            if ($rows['dowload_text'] != "") {
//                                $link = $rows['dowload_text'];
//                                $target = "target='_blank'";
//                            } else if ($rows['dowload'] != "") {
//                                $link = $fullpath . "/datafiles/files/" . $rows['dowload'];
//                                $target = "download";
//                            }
                            ?>
                            <div class="info-item flex">
                                <div class="info-left">
                                    <p class="date-day"><?= $month_year ?></p>
                                    <p class="date-year fon16 text-center"><?= $day ?></p>
                                </div>
                                <div class="info-right">
                                    <h3>
                                        <!-- Mở file khi nhấn vào tên -->
                                        <a <?= full_href($rows)?>>
                                            <?= GET_text('tenbaiviet_') ?>
                                        </a>
                                    </h3>
                                    <p>1 Files</p>
                                </div>
<!--                                <div class="download">-->
<!--                                    <a href="--><?//= $link ?><!--" download class="post download">-->
<!--                                        <i class="fal fa-arrow-to-bottom text-dark font28"></i>-->
<!--                                    </a>-->
<!--                                </div>-->
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

<div class="stop-footer w100"></div>




<!--<script>-->
<!--    function fixSticky() {-->
<!--        let product_info = $('#content_fix');-->
<!--        var el = $('.sidebar_menu');-->
<!--        var stickyTop = (el.offset().top) - 160; // returns number-->
<!--        var stickwidth = (el.width()) + 0;-->
<!---->
<!--        $(window).scroll(function() { // scroll event-->
<!--            var footerTop = ($('.stop-footer').offset().top) - 160; // returns number-->
<!--            let stickyHeight = el.find('button').height();-->
<!--            //var stickyHeight = el.height();-->
<!--            var height_info = product_info.height();-->
<!--            var limit = footerTop - stickyHeight - 600; // Adjusted to account for new top offset-->
<!--            var windowTop = $(window).scrollTop(); // returns number-->
<!--            var windowsize = $(window).width();-->
<!---->
<!--            if (windowsize > 0) {-->
<!--                if (height_info <= stickyHeight) {-->
<!--                    // Do nothing if content height is less than sticky height-->
<!--                } else {-->
<!--                    if (stickyTop < windowTop) {-->
<!--                        el.css({-->
<!--                            position: 'fixed',-->
<!--                            top: '62px', // Set fixed position 62px from top-->
<!--                            width: stickwidth,-->
<!--                        });-->
<!--                        $('.sidebar_menu').height(stickyHeight);-->
<!--                    } else {-->
<!--                        el.css({-->
<!--                            position: 'static',-->
<!--                            top: '62px',-->
<!--                        });-->
<!--                    }-->
<!---->
<!--                    if (limit < windowTop) {-->
<!--                        var diff = limit - windowTop;-->
<!--                        el.css({-->
<!--                            top: diff-->
<!--                        });-->
<!--                    }-->
<!--                }-->
<!--            }-->
<!--        });-->
<!--    }-->
<!---->
<!--    $(function() {-->
<!--        fixSticky();-->
<!--    })-->
<!--</script>-->