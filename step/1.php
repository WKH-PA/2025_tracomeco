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

<?php
    if ($motty == "van-hoa-cong-ty") {
?>

        <div class="tracomeco_gioithieu">
            <section class="tracomeco_home_gioithieu p-t-60 p-b-60">
                <div class="container-fluid">
                    <?php   $nd_1 = LAY_baiviet($slug_step,1,"`id`= 32");
                            $imggioithieu = LAY_baiviet_chitiet(25);
                    ?>
                    <div class="row v-center">
                        <div class="col-xl-6 col-txt">
                            <div class="home_dichvu_text" style="padding-left: 0; padding-right: 35px;">
                                <h2><?= $glo_lang['gioi_thieu'] ?></h2>
                                <?php
                                foreach ($nd_1 as $rows) {
                                    ?>
                                        <h3><?=$rows['tenbaiviet_'.$lang] ?></h3>
                                        <?=$rows['noidung_'.$lang] ?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-xl-3 col-img">
                            <div class="home_dichvu_hinh p-b-20">
                                <?= full_img($imggioithieu[1],'') ?>
                            </div>
                            <div class="home_dichvu_hinh">
                                <?= full_img($imggioithieu[0],'') ?>
                            </div>
                        </div>
                        <div class="col-xl-3 col-img">
                            <div class="home_dichvu_hinh">
                                <?= full_img($imggioithieu[2],'') ?>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <section class="tracomeco_gt_thongso p-t-60 p-b-60">
                <div class="container-fluid">
                    <div class="row">
                        <?php $thongso= LAY_banner_new("`id_parent` =41",4) ?>
                        <?php foreach ($thongso as $rows) { ?>
                            <div class="col-xl-3">
                                <span class="count"><?=SHOW_text($rows['mota_'.$lang]) ?></span>
                                <div class="thongso_col">
                                    <h3><?=SHOW_text($rows['tenbaiviet_'.$lang]) ?></h3>
                                    <p><?=SHOW_text($rows['noidung_'.$lang]) ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>

            <section class="tracomeco_gt_visao p-t-60 p-b-60">
                <div class="container-fluid">
                    <div class="tracomeco_title_main">
                        <h2 class="text-uppercase m-b-10"><?= $glo_lang['co_cau_to_chuc'] ?></h2>
                        <p><?= $glo_lang['mota_co_cau_to_chuc'] ?></p>
                    </div>
                    <div class="tracomeco-container">
                        <div class="tracomeco-bar tracomeco-black">
                        <?php
                        $baiviet2 = LAY_baiviet($thongtin_step['id'], 2, 'opt = 0');
                        $count = 1;
                        foreach ($baiviet2 as $rows) {
                            $cityId = "city_" . $count;
                            $activeClass = ($count == 1) ? 'tracomeco-red' : ''; // Nút đầu tiên có màu xanh
                            ?>
                            <button class="tracomeco-bar-item tracomeco-button tablink <?= $activeClass ?>"
                                    data-id="<?= $cityId ?>"
                                    data-title="<?= $rows['mota_' . $lang] ?>"
                                    data-content="<?= $rows['mota_' . $lang] ?>"
                                    onclick="openCity(this, '<?= $cityId ?>')">
                                <?= $rows['mota_' . $lang] ?>
                            </button>
                            <?php
                            $count++;
                        }
                        ?>
                        </div>
                    </div>
                    <?php
                    $count = 1;
                    foreach ($baiviet2 as $rows) {
                        $cityId = "city_" . $count;
                        $activeClass = ($count == 1) ? 'active' : ''; // Mặc định hiển thị nội dung đầu tiên
                        ?>
                        <div id="<?= $cityId ?>" class="tracomeco-container tracomeco-border city <?= $activeClass ?>">
                            <p><?= $rows['noidung_' . $lang] ?></p>
                        </div>
                        <?php
                        $count++;
                    }
                    ?>
                </div>
            </section>

        </div>
<?php } else{ ?>
    <div class="tracomeco_gioithieu">

        <?php
        $ndkhac = LAYTEXT_rieng(82);
        $imggioithieu = LAY_baiviet_chitiet(25);

        ?>
        <section class="tracomeco_home_gioithieu p-t-60 p-b-60">
            <div class="container-fluid">
                <div class="row v-center">

                    <div class="col-xl-3 col-img">
                        <div class="home_dichvu_hinh">
                            <?= full_img($imggioithieu[2],'') ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-img">
                        <div class="home_dichvu_hinh p-b-20">
                            <?= full_img($imggioithieu[1],'') ?>
                        </div>
                        <div class="home_dichvu_hinh">
                            <?= full_img($imggioithieu[0],'') ?>
                        </div>
                    </div>

                    <div class="col-xl-6 col-txt">
                        <div class="home_dichvu_text wow animate__fadeInRight">
                            <h2><?= $glo_lang['gioi_thieu'] ?></h2>
                            <h3><?= $ndkhac['p1_'. $lang] ?></h3>
                            <p class="short-desc"><?= $ndkhac['noidung_'. $lang] ?></p>
                            <p class="read-more">
                                <a <?= full_href($ndkhac)?> title="<?= $glo_lang['xem_chi_tiet'] ?>"><?= $glo_lang['xem_chi_tiet'] ?><i class="fa-light fa-arrow-up-right-from-square"></i></a>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <?php
        $nd_gioithieu = LAY_baiviet($slug_step,1,"`id`= 30");
        ?>
        <div class="tracomeco_gt_noidung p-t-20 p-b-20">
            <div class="container-fluid">
                <div class="row flex top">
                    <div class="gt_right">
                        <?php
                            foreach ($nd_gioithieu as $rows) {
                                ?>
                                    <?= full_img($rows,'') ?>

                                <ul class="uu-diem wow animate__fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">
                                    <?php  $danhmuc2 = LAY_danhmuc(9,"");?>
                                            <?php foreach ($danhmuc2 as $rows) { ?>
                                                <li><?=$rows['tenbaiviet_'.$lang] ?></li>
                                            <?php } ?>
                                </ul>
                            <?php  } ?>
                    </div>
                    <?php
                    $nd_gioithieu2 = LAY_baiviet($slug_step,1,"`id`= 29");
                    ?>
                    <div class="gt_left">
                        <?php
                        foreach ($nd_gioithieu2 as $rows) {
                            ?>
                                <?= full_img($rows,'') ?>
                                <div class="tracomeco_title_main">
                                    <h3><?=$rows['tenbaiviet_'.$lang] ?></h3>
                                    <p><?=$rows['mota_'.$lang] ?></p>
                                </div>
                            <p><?= limitText($rows['noidung_' . $lang],8) ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row flex">
                    <?php
                    $nd_gioithieu3 = LAY_baiviet($slug_step,1,"`id`= 33");
                    ?>
                    <div class="gt_left">
                        <?php
                        foreach ($nd_gioithieu3 as $rows) {
                            ?>
                            <?= full_img($rows,'') ?>
                            <div class="tracomeco_title_main">
                                <h3><?=$rows['tenbaiviet_'.$lang] ?></h3>
                            </div>
                            <p><?= limitText($rows['noidung_' . $lang],8) ?></p>
                        <?php } ?>
                    </div>
                    <?php
                    $nd_gioithieu4 = LAY_baiviet($slug_step,1,"`id`= 31");
                    ?>
                    <div class="gt_right">
                        <?php
                            foreach ($nd_gioithieu4 as $rows) {
                            ?>
                            <?= full_img($rows,'') ?>
                            <div class="tracomeco_title_main">
                                <h3><?=$rows['tenbaiviet_'.$lang] ?></h3>
                            </div>
                            <p><?= limitText($rows['noidung_' . $lang],8) ?></p>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php }?>
<style>
    .tracomeco-flex {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }
    .tablink {
        padding: 10px 15px;
        background: #333;
        color: #fff;
        border: none;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s ease;
    }
    .tablink.tracomeco-red {
        background: red;
    }
    .city {
        display: none;
    }
    .city.active {
        display: block;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let firstTab = document.querySelector(".tablink");
        if (firstTab) {
            firstTab.click();
        }
    });

    function openCity(button, cityId) {
        document.querySelectorAll(".tablink").forEach(btn => btn.classList.remove("tracomeco-red"));
        button.classList.add("tracomeco-red");
        document.querySelectorAll(".city").forEach(city => city.classList.remove("active"));
        document.getElementById(cityId).classList.add("active");
        let title = button.getAttribute("data-title");
        let content = button.getAttribute("data-content");
        console.log("Tiêu đề: ", title);
        console.log("Nội dung: ", content);
    }


</script>

