<?php
$array_step = [];
$array_diff = [];
$arraydata = [];
$arraydata_title = [];
$array_tags = [];
$array_not_title = [];
$danhmucname = "";

// Lấy danh sách bài viết có tags
$arr_sanphamall = DB_fet("*", "#_baiviet", "`showhi` = 1 AND step=1 AND `tags_$lang` != ''", "catasort DESC", "8", 1, 1);
foreach ($arr_sanphamall as $row) {
    $tags = explode(',', $row['tags_' . $lang]);
    $tags_seo = explode(',', $row['tags_seo_' . $lang]);
    $count = count($tags);
    for ($i = 0; $i < $count; $i++) {
        if (!array_key_exists($tags_seo[$i], $array_tags)) {
            $array_tags[$tags_seo[$i]] = $tags[$i];
        }
    }
}

// Xử lý các trang đặc biệt
if ($motty == '404') {
    $nametitle = $bre;
    $seokqkhac = DB_fet("*", "#_seo_name", "id=1", "", "", 1, "");
    $seokqkhac = reset($seokqkhac);
    $images_background = $fullpath . '/datafiles/' . $seokqkhac['icon'];
} else if (!in_array($motty, ['search-news', 'search', 'tin-khuyen-mai', 'tag'])) {
    // Lấy thông tin danh mục hoặc bài viết

    if ($slug_table == 'step') {
        $datastep = DB_fet("*", "#_step", "showhi=1 AND id=" . $slug_id, "", "1", "arr", 1);
        $datastep = reset($datastep);

        $datamenu = DB_fet("*", "#_menu",
            "showhi=1 AND step=" . $datastep['id'] . " AND id_parent != 0",
            "", "", "arr"
        );
        $datamenu = reset($datamenu);

        $datamenu2 = DB_fet(
            "*",
            "#_menu",
            "showhi=1 AND id = " . $datamenu['id_parent'] . " AND tenbaiviet_" . $lang . " != '" . $datastep['tenbaiviet_' . $lang] . "'",
            "", "1", "arr"
        );
        $datamenu2 = reset($datamenu2);
        if (!empty($datamenu['id_parent']) && $datamenu['id_parent'] != 0) {
            $seonamemenu_cha = $full_url . '/' . $datamenu2['seo_name'];
            $nameseonamemenu_cha = $datamenu2['tenbaiviet_' . $lang]. "|";

            $thongtin_danhmuc = '<a href="' . full_href($datastep) . '" class="active">' . htmlspecialchars($datastep['tenbaiviet_' . $lang], ENT_QUOTES, 'UTF-8') . '</a>';
            $arraydata[$seonamemenu_cha] = ' <a href="' . $seonamemenu_cha . '">' . $nameseonamemenu_cha . '</a> ' . $thongtin_danhmuc;
            $danhmucname = $nameseonamemenu_cha;
            $nametitle = $nameseonamemenu_cha;
        } else {
            // Nếu không có menu cha, sử dụng danh mục chính từ step
            $seonamestep = $full_url . '/' . $datastep['seo_name'];
            $nameseonamestep = $datastep['tenbaiviet_' . $lang];
            $arraydata[$seonamestep] = $nameseonamestep;
            $danhmucname = $nameseonamestep;
            $nametitle = $nameseonamestep;
        }

        // Nếu có hình ảnh đại diện, lấy hình ảnh
        if (!empty($datastep['icon'])) {
            $images_background = $fullpath . '/datafiles/' . $datastep['icon'];
        }
    }

    if ($slug_table == 'danhmuc') {
        $datadanhmuc = DB_fet("*", "#_danhmuc", "showhi=1 AND id=" . $slug_id, "", "1", "arr", 1);
        $datadanhmuc = reset($datadanhmuc);
        if (!empty($datadanhmuc['id_parent']) && $datadanhmuc['id_parent'] != 0) {
            $datadanhmuc_cha = DB_fet("*", "#_danhmuc", "showhi=1 AND id=" . $datadanhmuc['id_parent'], "", "1", "arr", 1);
            $datadanhmuc_cha = reset($datadanhmuc_cha);

            $seonamedanhmuc_cha = $full_url . '/' . $datadanhmuc_cha['seo_name'];
            $nameseonamedanhmuc_cha = $datadanhmuc_cha['tenbaiviet_' . $lang];

            $arraydata[$seonamedanhmuc_cha] = $nameseonamedanhmuc_cha;
            $danhmucname = $nameseonamedanhmuc_cha;
        }

        $seonamedanhmuc = $full_url . '/' . $datadanhmuc['seo_name'];
        $nameseonamedanhmuc = $datadanhmuc['tenbaiviet_' . $lang];

        $arraydata[$seonamedanhmuc] = $nameseonamedanhmuc;
        $nametitle = $nameseonamedanhmuc;

        // Nếu có hình ảnh đại diện, lấy hình ảnh
        if (!empty($datadanhmuc['icon'])) {
            $images_background = $fullpath . '/datafiles/' . $datadanhmuc['icon'];
        }
    }

    if ($slug_table == 'baiviet') {
        $databaiviet = DB_fet("*", "#_baiviet", "showhi=1 AND id=" . $slug_id, "", "1", "arr", 1);
        $databaiviet = reset($databaiviet);

        $seonamebaiviet = $full_url . '/' . $databaiviet['seo_name'];
        $nameseonamebaiviet = $databaiviet['tenbaiviet_' . $lang];

        $datadanhmuc = DB_fet("*", "#_danhmuc", "showhi=1 AND id=" . $databaiviet['id_parent'], "", "1", "arr", 1);
        $datadanhmuc = reset($datadanhmuc);

        if (!empty($databaiviet['id_parent'])) {
            $danhmucname = !empty($datadanhmuc['tenbaiviet_' . $lang]) ? $datadanhmuc['tenbaiviet_' . $lang] : "";
        }

        $seonamedanhmuc = !empty($datadanhmuc['seo_name']) ? $full_url . '/' . $datadanhmuc['seo_name'] : "";
        $nameseonamedanhmuc = !empty($datadanhmuc['tenbaiviet_' . $lang]) ? $datadanhmuc['tenbaiviet_' . $lang] : "";

        $arraydata[$seonamedanhmuc] = $nameseonamedanhmuc;
        $nametitle = $nameseonamebaiviet;

        if ($slug_step == 1) {
            if (!in_array($slug_step, $array_not_title)) {
                $arraydata[$seonamebaiviet] = $nameseonamebaiviet;
            }
            if (in_array($slug_step, $array_step)) {
                $nametitle = $nameseonamedanhmuc;
            }
            if (in_array($slug_step, $arraydata_title)) {
                $nametitle = $nameseonamebaiviet;
            }
        } else {
            $nametitle = $danhmucname ?: $nameseonamestep;
        }
    }
} else {
    $nametitle = ($motty == "tin-khuyen-mai") ? $glo_lang['tin_khuyen_mai'] : $glo_lang['tim_kiem'];
    $arraydata[$full_url . '/search/' . $haity] = $nametitle;
}

// Tạo breadcrumb navigation
$strshort = "";
$count = 0;
foreach ($arraydata as $k => $v) {
    $count++;
    if (empty($v)) continue;
    $strshort .= ($count < count($arraydata)) ? ' | <a href="' . $k . '">' . $v . '</a>' : ' | <a class="active" href="' . $k . '">' . $v . '</a>';
}
$danhmuc_hientai = DB_fet("*", "#_menu", "showhi=1 AND seo_name='$motty'", "", "1", "arr", 1);
$danhmuc_hientai = reset($danhmuc_hientai);
$thongtin_danhmuc = "";

if (!empty($danhmuc_hientai)) {
    // Thông tin danh mục hiện tại (in đậm)
    $thongtin_danhmuc = '<strong><a class="active" href="' . full_href($danhmuc_hientai) . '">' . SHOW_text($danhmuc_hientai['tenbaiviet_' . $lang]) . '</a></strong>';

    // Kiểm tra nếu có danh mục cha
    if (!empty($danhmuc_hientai['id_parent']) && $danhmuc_hientai['id_parent'] != 0) {
        $danhmuccha = DB_fet("*", "#_menu", "showhi=1 AND id=" . $danhmuc_hientai['id_parent'], "", "1", "arr", 1);
        $danhmuccha = reset($danhmuccha);

        if (!empty($danhmuccha)) {
            // Thêm danh mục cha (không in đậm) + thêm dấu "|"
            $thongtin_danhmuc = '| <a href="' . full_href($danhmuccha) . '">' . $danhmuccha['tenbaiviet_' . $lang] . '</a> |' . $thongtin_danhmuc;
        } else {
            // Nếu không có danh mục cha, chỉ thêm dấu "|"
            $thongtin_danhmuc = '| ' . $thongtin_danhmuc;
        }
    } else {
        // Nếu không có danh mục cha, chỉ thêm dấu "|"
        $thongtin_danhmuc = '| ' . $thongtin_danhmuc;
    }
}

// Hiển thị danh mục
//if (!empty($thongtin_danhmuc)) {
//    echo '<h3 class="itemtitle">' . $thongtin_danhmuc . '</h3>';
//}


// Hiển thị danh mục cha (nếu có)
//if (!empty($danhmuccha)) {
//    echo '<h3 class="itemtitle"><strong>' . SHOW_text($danhmuccha['tenbaiviet_' . $lang]) . '</strong></h3>';
//}


if ($motty == "search") {
    $datakhac = DB_fet("*", "#_step", "showhi=1 AND id=2", "", "1", "arr", 1);
    $datakhac = reset($datakhac);
    $images_background = $fullpath . '/' . $datakhac['duongdantin'] . '/' . $datakhac['icon'];
}

if ($motty == "san-pham-noi-bat") {
    $strshort = '/ <a class="cl_active" href="' . $full_url . "/san-pham-noi-bat/\">" . $glo_lang['san_pham_noi_bat'] . '</a>';
} elseif ($motty == "thu-vien-anh-va-video") {
    $strshort = '/ <a class="cl_active" href="' . $full_url . "/thu-vien-anh-va-video/\">" . $glo_lang['thu_vien_anh_va_video'] . '</a>';
}

?>

<?php if ($motty != "404") { ?>
    <div class="banner_detail">
        <img style="width: 100%;height: 400px;object-fit: cover;" src="<?= $images_background ?>">
    </div>
    <div class="link-direct">
        <div class="container-fluid">
            <ul>
                <li>
<<<<<<< Updated upstream
                    <a href="<?= $full_url ?>"><i class="fa-light fa-house-chimney"></i><?= $glo_lang['trang_chu'] ?>
                    </a> <span ><?= $thongtin_danhmuc?></span>
=======
                    <a href="<?= $full_url ?>"><i class="fa-light fa-house-chimney"></i><?= $glo_lang['trang_chu'] ?></a>
                    <span ><?= $strshort ?></span>
>>>>>>> Stashed changes
                </li>
            </ul>
        </div>
    </div>
<?php } else { ?>
    <div class="banner_detail" style="background: #333;"></div>
<?php } ?>