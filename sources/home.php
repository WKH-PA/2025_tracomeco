<?php include _source . "banner_top.php"; ?>

<?php
    $ndkhac = LAYTEXT_rieng(82);
    $imggioithieu = LAY_baiviet_chitiet(25);
?>
<section class="tracomeco_home_gioithieu p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="row v-center">

            <div class="col-xl-3 col-img">
                <div class="home_dichvu_hinh">
                    <img src="datafiles/<?php echo $imggioithieu[2]['icon']; ?>" alt="<?php echo $imggioithieu[2]['tenbaiviet_vi']; ?>"/>
                </div>
            </div>
            <div class="col-xl-3 col-img">
                <div class="home_dichvu_hinh p-b-20">
                    <img src="datafiles/<?php echo $imggioithieu[1]['icon']; ?>" alt="<?php echo $imggioithieu[1]['tenbaiviet_vi']; ?>"/>
                </div>
                <div class="home_dichvu_hinh">
                    <img src="datafiles/<?php echo $imggioithieu[0]['icon']; ?>" alt="<?php echo $imggioithieu[0]['tenbaiviet_vi']; ?>"/>
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

<?$danhmuc_menu = GET_danhmuc_menu("4", $lang,3,4);?>
<section class="tracomeco_home_linhvuc p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="tracomeco_title_main">
            <h2 class="text-uppercase wow animate__flipInX"><?= $glo_lang['linh_vuc_hoat_dong'] ?></h2>
        </div>
        <div class="row">
            <?php
                $stt = 1;
                foreach ($danhmuc_menu as $danhmuc):
                    ?>
                    <div class="col-xl-4">
                        <div class="linhvuc_col">
                            <img src="<?= $danhmuc['icon_danhmuc'] ?>"alt="<?= ($danhmuc['tenbaiviet_danhmuc']) ?>">
                            <div class="col_tieude wow animate__fadeInUp">
                                <span><?= str_pad($stt, 2, '0', STR_PAD_LEFT); ?></span> <!-- Số thứ tự -->
                                <h3 style="margin-right: 20px;">
                                    <a href=<?=$danhmuc['seo_name_danhmuc'] ?>><?= $danhmuc['tenbaiviet_danhmuc'] ?></a>
                                </h3>
                            </div>
                            <div class="col_icon">
                                <i class="<?= $danhmuc['mota_danhmuc'] ?>"></i>
                            </div>
                            <ul class="list-item">
                                <?php
                                if (!empty($danhmuc['tenbaiviet']) ):
                                    foreach ($danhmuc['tenbaiviet'] as $id_baiviet => $ds_baiviet):
                                        if (is_array($ds_baiviet)) {
                                            $ds_baiviet = reset($ds_baiviet);
                                        }
                                        ?>
                                        <li class="item-activity font18"><?= htmlspecialchars($ds_baiviet) ?></li>
                                    <?php endforeach;
                                endif;
                                ?>
                                <li class="item-activity font18">
                                    <a href=<?=$danhmuc['seo_name_danhmuc'] ?>><?= $glo_lang['xem_them'] ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php
                    $stt++;
                endforeach;
            ?>





        </div>
    </div>
</section>


<!--// chua lam-->
<section class="tracomeco_home_khach_hang p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="tracomeco_title_main">
            <h2 class="text-uppercase wow animate__flipInX">Khách hàng nói về tracomeco</h2>
        </div>
        <div class="home_khach_hang swiper myCamnhan">
            <div class="swiper-wrapper">
                <div class="khach_hang_box swiper-slide">
                    <h3>Chất lượng phục vụ</h3>
                    <p class="rate flex" style="margin:0">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit...</p>
                    <p class="name-kh">Anh Nguyễn Minh Hiếu</p>
                </div>
                <div class="khach_hang_box swiper-slide">
                    <h3>Dịch vụ cảng</h3>
                    <p class="rate flex" style="margin:0">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit...</p>
                    <p class="name-kh">Anh Trần Minh Ân</p>
                </div>
                <div class="khach_hang_box swiper-slide">
                    <h3>Cơ khí & Công nghiệp hỗ trợ</h3>
                    <p class="rate flex" style="margin:0">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit...</p>
                    <p class="name-kh">Chị Nguyễn Thị Mỹ Linh</p>
                </div>
                <div class="khach_hang_box swiper-slide">
                    <h3>Hỗ trợ tuyệt vời</h3>
                    <p class="rate flex" style="margin:0">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit...</p>
                    <p class="name-kh">Chị Nguyễn Thị Mỹ Linh</p>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<?php $banner_top = LAY_banner_new("`id_parent` = 16");?>
<div class="pa_home_banner">
    <div class="swiper myBanner">
        <div class="swiper-wrapper">

            <?php
            foreach ($banner_top as $rows) {
                ?>
                <div class="swiper-slide" data-swiper-slide-index="0">
                    <a <?= full_href($rows)?>><img src="<?= full_src($rows, "") ?>">
                    <a <?= full_href($rows)?> class="button_slide wow animate__backInRight"><?= $glo_lang['xem_them'] ?> <i class="fa-light fa-arrow-up-right-from-square"></i></a>
                </div>
            <?php } ?>

        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<!--// chua lam-->
<section class="tracomeco_home_tin_tuc p-t-60 p-b-60">
    <div class="container-fluid" style="position:relative;">
        <div class="row">

            <div class="col-xl-8">
                <div class="home_tin_tuc_main">
                    <div class="tracomeco_title_main" style="text-align: left;">
                        <h2 class="m-b-30 wow animate__flipInX">TIN TỨC - SỰ KIỆN</h2>
                    </div>
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
                </div>
            </div>
            <div class="col-xl-4">
                <div class="home_tin_tuc_side">
                    <h2>Tin tuyển dụng</h2>
                    <div class="post_item wow animate__fadeInDown">
                        <div class="post_info">
                            <h3><a href="index.php?page=tintuc_view">Phó Tổng Giám Đốc (Phụ Trách Nghiệp Vụ Quản Trị Cơ Bản)</a></h3>
                            <p class="dated"><i class="fa-regular fa-calendar-days"></i> 08/01/2025</p>
                        </div>
                    </div>
                    <div class="post_item wow animate__fadeInDown">
                        <div class="post_info">
                            <h3><a href="index.php?page=tintuc_view">Trưởng Nhóm Quản Lý Quy Trình Công Nghệ Hệ Thống</a></h3>
                            <p class="dated"><i class="fa-regular fa-calendar-days"></i> 08/01/2025</p>
                        </div>
                    </div>
                    <div class="post_item wow animate__fadeInDown">
                        <div class="post_info">
                            <h3><a href="index.php?page=tintuc_view">Phó Tổng Giám Đốc (Phụ Trách Nghiệp Vụ Quản Trị Cơ Bản)</a></h3>
                            <p class="dated"><i class="fa-regular fa-calendar-days"></i> 08/01/2025</p>
                        </div>
                    </div>
                    <div class="post_item wow animate__fadeInDown">
                        <div class="post_info">
                            <h3><a href="index.php?page=tintuc_view">Trưởng Nhóm Quản Lý Quy Trình Công Nghệ Hệ Thống</a></h3>
                            <p class="dated m-b-0"><i class="fa-regular fa-calendar-days"></i> 08/01/2025</p>
                        </div>
                    </div>
                    <div class="post_item wow animate__fadeInDown">
                        <div class="post_info">
                            <h3><a href="index.php?page=tintuc_view">Trưởng Nhóm Quản Lý Quy Trình Công Nghệ Hệ Thống</a></h3>
                            <p class="dated m-b-0"><i class="fa-regular fa-calendar-days"></i> 08/01/2025</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>

<!--// chua lam-->
<section class="pa_boxcontent p-t-60 p-b-60">
    <div class="container-fluid">
        <div class="row">
            <div class="swiper myPartner">
                <ul class="swiper-wrapper">
                    <li class="swiper-slide">
                        <a href="https://www.sieuthimaychu.vn/" target="_blank" title="Đối tác siêu siêu nhỏ" class="logo_bottom">
                            <img src="https://support.pavietnam.vn/datafile/banner/2023_05/433254-15143415-f-logo-ssn.png" alt="Đối tác siêu siêu nhỏ" title="Đối tác siêu siêu nhỏ">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="https://www.bang.vn/" target="_blank" title="Đối tác bang.vn" class="logo_bottom">
                            <img src="https://support.pavietnam.vn/datafile/banner/2023_05/433254-15143356-f-logo-bang.png" alt="Đối tác bang.vn" title="Đối tác bang.vn">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="https://thonet-vander.vn/" target="_blank" title="Đối tác Thoner" class="logo_bottom">
                            <img src="https://support.pavietnam.vn/datafile/banner/2023_05/433254-15143334-f-logo-thonet.png" alt="Đối tác Thoner" title="Đối tác Thoner">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="javascript:void(0)" target="_self" title="Đối tác google partner" class="logo_bottom">
                            <img src="https://support.pavietnam.vn/datafile/banner/2023_06/649401-08133424-google-partner-logo-2ba563bac5-seeklogo.com.png" alt="Đối tác google partner" title="Đối tác google partner">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="https://www.vnnic.vn/" target="_blank" title="Đối tác VNNIC" class="logo_bottom">
                            <img src="https://support.pavietnam.vn/datafile/banner/2023_05/433254-15143214-f-logo-vnnic.png" alt="Đối tác VNNIC" title="Đối tác VNNIC">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="https://www.icann.org/" target="_blank" title="Đối tác icann" class="logo_bottom">
                            <img src="https://support.pavietnam.vn/datafile/banner/2023_12/649401-16115527-photo-2018-01-26-02-16-31.jpg" alt="Đối tác icann" title="Đối tác icann">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="https://cpanel.net/" target="_blank" title="Đối tác cPanel" class="logo_bottom">
                            <img src="https://support.pavietnam.vn/datafile/banner/2023_05/433254-15143128-f-logo-cpanel-seeklogo.png" alt="Đối tác cPanel" title="Đối tác cPanel">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>