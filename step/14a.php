<?php
$kietxuat_name = DB_fet_rd("*", "#_danhmuc", "`step` = '" . $slug_step . "' AND `id` = '" . $arr_running['id_parent'] . "'", "`id` DESC", 1, "id");
if (empty($kietxuat_name)) {
    $kietxuat_name = $thongtin_step['tenbaiviet_' . $lang];
} else {
    $kietxuat_name = $kietxuat_name[$arr_running['id_parent']]['tenbaiviet_' . $lang];
}

$lay_all_kx = LAYDANHSACH_idkietxuat($arr_running['id_parent'], $slug_step);

$wh = "  AND `id_parent` = (" . $lay_all_kx . ") AND `id` <>  '" . $arr_running['id'] . "'";
$numview = 8;

$nd_kietxuat = DB_fet_rd(" * ", " `#_baiviet` ", " `step` IN (" . $slug_step . ") $wh ", " `catasort` DESC ", $numview);

// $nd_total = DB_que("SELECT `id` FROM `#_baiviet` WHERE `showhi` =  1 AND `step` IN (".$slug_step.") $wh");
// $nd_total = mysqli_num_rows($nd_total);
// $retuen_arr = array();
// while ($r   = mysqli_fetch_assoc($nd_kietxuat)) {
//   $retuen_arr[] = $r;
// }
// $anhcon   = LAY_anhstep($thongtin_step['id'], 1);
// $img_bg = checkImage($fullpath, $thongtin_step['icon'], $thongtin_step['duongdantin']);

// if($arr_running['icon_hover'] != "") {
//   $img_bg = checkImage($fullpath, $arr_running['icon_hover'], $arr_running['duongdantin']);
// }
// full_src($thongtin_step, '')
include _source . "box-header.php";
$bvlienquan = DB_fet("*", "#_baiviet", "`showhi` = 1 and id_parent =" . $arr_running['id_parent'] . " and step=" . $slug_step, "RAND()", "12", 1);
?>
<div class="page_conten_page p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="tin_left">
            <div class="title_news">
                <h1><?=GET_text($arr_running,'tenbaiviet_')?></h1>
                <p class="dated"><i class="fa-regular fa-calendar-days"></i><?= date("d/m/Y", $arr_running['ngaydang']); ?></p>
            </div>
            <div class="showText">
                <p class="mota"><?=GET_text($arr_running,'mota_')?></p>
                <?=GET_text($arr_running,'noidung_')?>
            </div>
        </div>

        <div class="clr"></div>
    </div>
</div>

<?= include _source . "box_footer.php";?>
