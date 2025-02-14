<?php
if ((!empty($thongtin_step) && $thongtin_step['num_view'] == 0) || empty($thongtin_step))
    $numview = 12;
else $numview = $thongtin_step['num_view'];

$key = isset($_GET['key']) ? str_replace("+", " ", strip_tags($_GET['key'])) : '';
$is_search = isset($_GET['key']) ? true : false;

$lay_all_kx = "";
$name_titile = !empty($arr_running['tenbaiviet_' . $lang]) ? SHOW_text($arr_running['tenbaiviet_' . $lang]) : "";
if ($is_search) {
    $slug_step = "1,3,4";
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

// //check tieu thuyet
if ($slug_step == 1) {
    $wh .= " AND `id_baiviet` = 0";
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

<div class="pagewrap page_conten_page">
    <div class="showText">
        <table class="tbl_down table-responsive" cellpadding="0" cellspacing="0">
            <tbody>
            <tr class="title">
                <th width="15%"><?= $glo_lang['stt'] ?></th>
                <th><?= $glo_lang['ten_file'] ?></th>
                <th class="text-center"><?= $glo_lang['tai_ve'] ?></th>
                <th><?=$glo_lang['ngay_thang_nam']?></th>
                <th><?=$glo_lang['mota']?></th>
            </tr>
            <?php
            if ($nd_total == 0) {
                echo "<tr><td colspan='3'><div class='dv-notfull'>" . $glo_lang['khong_tim_thay_du_lieu_nao'] . "</div></td></tr>";
            } else {
            $i = 0;
            foreach ($nd_kietxuat as $rows) {
            $i++;
            // $icon = '<i class="fa fa-file-excel-o"></i>';
            // $link = "";
            // if($rows['dowload'] != ""){
            //   $link = $fullpath."/datafiles/files/".$rows['dowload'];
            //   $ex = explode(".",$rows['dowload']);
            //   $ex = end($ex);
            //   if($ex == "pdf") $icon = '<i class="fa fa-file-pdf-o"></i>';
            //   else if($ex == "doc" || $ex == "docx") $icon = '<i class="fa fa-file-word-o"></i>';
            // }

            $link = "";
            $target = "";

            if ($rows['dowload_text'] != "") {
                $link = $rows['dowload_text'];
                $target = "target='_blank'";
                $ex = explode(".", $rows['dowload_text']);
                $ex = end($ex);
            } else if ($rows['dowload'] != "") {
                $link = $fullpath . "/datafiles/files/" . $rows['dowload'];
                $target = "download";
                $ex = explode(".", $rows['dowload']);
                $ex = end($ex);
            }
            ?>
            <tr>
                <td data-title="<?=$glo_lang['stt']?>" class="text-center"><?= ($pzer - 1) * $numview + $i ?></td>
                <td data-title="<?= $glo_lang['ten_file'] ?>"><?= SHOW_text($rows['tenbaiviet_' . $lang]) ?></td>
                <td data-title="<?= $glo_lang['tai_ve'] ?>" class="text-center"><a target="_blank"
                            href="<?= $link ?>" <?= $target ?>><?= $glo_lang['tai_ve'] ?></a></td>
                <td data-title="<?= $glo_lang['ngay_thang_nam'] ?>"><?=date("d/m/Y",$rows['ngaydang'])?></td>
                <td data-title="<?= $glo_lang['mota'] ?>"><?=strip_tags($rows['mota_'.$lang])?></td>
            </tr>
            <?php }
            } ?>
            </tbody>
        </table>
        <div class="nums no_box">
            <?= PHANTRANG($pzer, $sotrang, $full_url . "/" . $motty, $_SERVER['QUERY_STRING']) ?>
            <div class="clr"></div>
        </div>
    </div>
    <?php include _source . "fb_sharelink.php"; ?>
</div>


<div class="page_conten_page p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="tt_page_top flex">
            <div class="col_conten_left">
                <div class="filter-search-sharehoder non-field">
                    <form class="form-search flex">
                        <div class="search">
                            <input type="text" autocomplete="false" class="form-control form-control-sm" placeholder="<?=$glo_lang['nhap_tu_khoa_tim_kiem']?>" value="" name="keyword">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <select class="select-year font18" id="" value="0" name="year">
                            <option value="all">Tất cả</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                            <option value="2020">2020</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                        </select>
                    </form>
                </div>
                <div class="list-info">
                    <div class="info-item flex">
                        <div class="info-left">
                            <p class="date-day">11/2023</p>
                            <p class="date-year fon16 text-center">25</p>
                        </div>
                        <div class="info-right">
                            <h3>
                                <a href="https://thacogroup.vn/storage/quan-he-co-dong/file-cong-bo-thong-tin/2023/thong-bao-vv-chot-danh-sach-trai-chu-ma-trai-phieu-tcoch2328001-de-dang-ky-tap-trung-tai-tong-cong-ty-luu-ky-va-bu-tru-chung-khoan-viet-nam-vscd/1.pdf" class="font20 text-justify  " target="_blank">
                                    Thông báo vv chốt danh sách Trái chủ mã Trái phiếu TCOCH2328001 để đăng ký tập trung tại Tổng Công ty Lưu ký và Bù trừ chứng khoán Việt Nam (VSCD)
                                </a>
                            </h3>
                            <p>1 Files</p>
                        </div>
                        <div class="download">
                            <a href="https://thacogroup.vn/api/investor/download?id=275" class="post download">
                                <i class="fal fa-arrow-to-bottom text-dark font28"></i>
                            </a>
                        </div>
                    </div>
                    <div class="info-item flex">
                        <div class="info-left">
                            <p class="date-day">11/2023</p>
                            <p class="date-year fon16 text-center">25</p>
                        </div>
                        <div class="info-right">
                            <h3>
                                <a href="https://thacogroup.vn/storage/quan-he-co-dong/file-cong-bo-thong-tin/2023/thong-bao-vv-chot-danh-sach-trai-chu-ma-trai-phieu-tcoch2328001-de-dang-ky-tap-trung-tai-tong-cong-ty-luu-ky-va-bu-tru-chung-khoan-viet-nam-vscd/1.pdf" class="font20 text-justify  " target="_blank">
                                    Thông báo vv chốt danh sách Trái chủ mã Trái phiếu TCOCH2328001 để đăng ký tập trung tại Tổng Công ty Lưu ký và Bù trừ chứng khoán Việt Nam (VSCD)
                                </a>
                            </h3>
                            <p>1 Files</p>
                        </div>
                        <div class="download">
                            <a href="https://thacogroup.vn/api/investor/download?id=275" class="post download">
                                <i class="fal fa-arrow-to-bottom text-dark font28"></i>
                            </a>
                        </div>
                    </div>
                    <div class="info-item flex">
                        <div class="info-left">
                            <p class="date-day">11/2023</p>
                            <p class="date-year fon16 text-center">25</p>
                        </div>
                        <div class="info-right">
                            <h3>
                                <a href="https://thacogroup.vn/storage/quan-he-co-dong/file-cong-bo-thong-tin/2023/thong-bao-vv-chot-danh-sach-trai-chu-ma-trai-phieu-tcoch2328001-de-dang-ky-tap-trung-tai-tong-cong-ty-luu-ky-va-bu-tru-chung-khoan-viet-nam-vscd/1.pdf" class="font20 text-justify  " target="_blank">
                                    Thông báo vv chốt danh sách Trái chủ mã Trái phiếu TCOCH2328001 để đăng ký tập trung tại Tổng Công ty Lưu ký và Bù trừ chứng khoán Việt Nam (VSCD)
                                </a>
                            </h3>
                            <p>1 Files</p>
                        </div>
                        <div class="download">
                            <a href="https://thacogroup.vn/api/investor/download?id=275" class="post download">
                                <i class="fal fa-arrow-to-bottom text-dark font28"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col_conten_right">
                <div class="box_right_pro_view">
                    <div class="title_right">Quan hệ cổ đông</div>
                    <ul class="child_menu_right">
                        <li><a href="index.php?page=thong-tin-co-dong">Thông tin cổ đông</a></li>
                    </ul>
                    <div class="clr"></div>
                </div>
                <div class="box_right_pro_view">
                    <div class="title_right">Tin tức mới</div>
                    <div class="tt_page_top">
                        <div class="new_id_bs">
                            <li><a href="index.php?page=tintuc_view"><img src="delete/tintuc/tintuc-1.jpg"></a></li>
                            <ul>
                                <h3><a href="index.php?page=tintuc_view">Thông báo Nghị Quyết số 01/2024-NQ-ĐHĐCĐ</a></h3>
                                <p class="dated"><i class="fa-regular fa-calendar-days"></i> 08/01/2025</p>
                            </ul>
                        </div>
                        <div class="new_id_bs">
                            <li><a href="index.php?page=tintuc_view"><img src="delete/tintuc/tintuc-2.jpg"></a></li>
                            <ul>
                                <h3><a href="index.php?page=tintuc_view">Thông báo Đại Hội Cổ Đông nhiệm kỳ V (2024 - 2028) - Dự thảo</a></h3>
                                <p class="dated"><i class="fa-regular fa-calendar-days"></i> 08/01/2025</p>
                            </ul>
                        </div>
                        <div class="new_id_bs">
                            <li><a href="index.php?page=tintuc_view"><img src="delete/tintuc/tintuc-3.jpg"></a></li>
                            <ul>
                                <h3><a href="index.php?page=tintuc_view">Báo cáo Đại Hội Cổ Đông Thường Niên Năm 2023</a></h3>
                                <p class="dated"><i class="fa-regular fa-calendar-days"></i> 08/01/2025</p>
                            </ul>
                        </div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>

        </div>
        <div class="clr"></div>
    </div>
</div>