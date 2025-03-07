<?php
if ((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
    $numview = 12;
else $numview = $thongtin_step['num_view'];

//$arr_running = DB_fet_rd("*", "#_baiviet", "`step` = '".$slug_step."'", "`catasort` DESC, `id` DESC", 1);
//$arr_running = reset($arr_running);
$key = isset($_GET['key']) ? str_replace("+", " ", strip_tags($_GET['key'])) : '';
$is_search = $motty == 'search' ? true : false;

$lay_all_kx = "";
$name_titile = !empty($arr_running['tenbaiviet_' . $lang]) ? SHOW_text($arr_running['tenbaiviet_' . $lang]) : "";
if ($is_search) {
    $slug_step = "16";
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
    $wh .= " AND (`tenbaiviet_" . $lang . "` LIKE '%" . $key . "%' )";
}


//

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
$bvlienquan = DB_fet("*", "#_baiviet", "`showhi` = 1 and id_parent =" . $arr_running['id_parent'] . " and step=" . $slug_step, "RAND()", "12", 1);
//
//var_dump($arr_running);
//exit;
?>



<div class="page_conten_page p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="tin_left">
            <div class="title_news">
                <h1><?= GET_text('tenbaiviet_',$arr_running) ?></h1>
            </div>
            <div class="showText">
                <?= GET_text('noidung',$arr_running) ?>
            </div>
        </div>

        <div class="clr"></div>
    </div>
</div>

<?php include _source . "box_footer.php";?>
