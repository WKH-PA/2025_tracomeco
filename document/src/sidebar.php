<style>
    .logo-wrapper {
        text-align: center; /* Căn giữa logo */
    }
    .logo-wrapper img {
        max-width: 90px; /* Chiều rộng tối đa của logo */
        height: auto; /* Giữ tỷ lệ khung hình */
        display: block; /* Hiển thị dưới dạng block */
        margin: 0 auto; /* Căn giữa hình ảnh */
        background-color: transparent; /* Nền trong suốt */
    }
    .sidebar-list {
        list-style-type: none; /* Loại bỏ kiểu list mặc định */
    }
    /* Định dạng riêng cho menu module main */
    .sidebar-list.main-module {
        background-color: #f9f9f9;
        border-left: 3px solid #007bff;
    }
    .sidebar-link {
        text-decoration: none;
        color: #333;
        display: block;
        padding: 8px 12px;
        transition: background-color 0.3s;
    }
    .sidebar-link:hover {
        background-color: #f0f0f0;
    }
</style>

<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div>
        <div class="logo-wrapper">
            <a href="<?php echo $fullpath.'/document' ?>">
                <img class="img-fluid" src="images/logo/logo.png" alt="Logo">
            </a>
        </div>
        <nav class="sidebar-main">
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <?php
                    // Lấy dữ liệu menu từ cơ sở dữ liệu
                    $sql_array = DB_fet("*", "#_module_tinhnang", "`showhi` = 1 AND `m_dev` = 0", "`sort` ASC", "", "arr", 1);
                    $nhom_menu = '';
                    $danhsach_menu = array(); // Mảng chứa danh sách các id menu

                    foreach ($sql_array as $value) {
                        // Xử lý các mục menu cha (id_parent = 0)
                        if ($value['id_parent'] != 0) continue;

                        // Nếu là menu module main
                        if ($value['m_action'] == 'main-module') {
                            $nhom_menu .= '<li class="sidebar-list main-module">
                                <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                    <i class="' . (!empty($value['icon']) ? $value['icon'] : "fa fa-circle-o") . '"></i> 
                                    <span>' . $value['ten_vi'] . '</span>
                                </a>';
                            $nhom_menu .= '<ul class="sidebar-submenu custom-scrollbar main-module-submenu submenu-group">';
                            // Lấy các menu con của module main
                            foreach (LEFT_mainmenu_new() as $val) {
                                $nhom_menu .= '<li class="main-submenu submenu-group">
                                    <a class="d-flex sidebar-menu" href="?module=true&id=' . $val['id'] . '">
                                        <i class="fa fa-circle-o"></i> &nbsp;&nbsp;' . $val['cataname'] . '
                                    </a>
                                </li>';
                                // PHẦN LẤY ID: Menu con của Module Main
                                $danhsach_menu[] = [
                                    'flag' => 'module',
                                    'id'   => $val['id']
                                ];
                            }
                            $nhom_menu .= '</ul></li>';
                        } else {
                            // Các menu thông thường có thể có submenu
                            $nhom_2 = "";
                            foreach ($sql_array as $value_2) {
                                if ($value_2['id_parent'] != $value['id']) continue;
                                $nhom_3 = "";
                                foreach ($sql_array as $value_3) {
                                    if ($value_3['id_parent'] != $value_2['id']) continue;
                                    $nhom_3 .= '<li class="submenu-group">
                                        <a href="?id=' . $value_3['id'] . '">
                                            <i class="' . (!empty($value_3['icon']) ? $value_3['icon'] : "fa fa-circle-o") . '"></i> '
                                        . $value_3['ten_vi'] . '</a>
                                    </li>';
                                    // PHẦN LẤY ID: Menu cấp 2
//                                    $danhsach_menu[] =[
//                                        'id'   => $value_3['id']
//                                    ];
                                }
                                $nhom_2 .= '<li class="main-submenu submenu-group">
                                    <a class="d-flex sidebar-menu" href="?id=' . $value_2['id'] . '">
                                        <i class="' . (!empty($value_2['icon']) ? $value_2['icon'] : "fa fa-circle-o") . '"></i>&nbsp;&nbsp;'
                                    . shorten_text($value_2['ten_vi'], 33) . (!empty($nhom_3) ? '<svg class="arrow"><use href="svg/icon-sprite.svg#Arrow-right"></use></svg>' : "") . '
                                    </a>'
                                    . (!empty($nhom_3) ? '<ul class="submenu-wrapper">' . $nhom_3 . '</ul>' : "") . '
                                </li>';
                                // PHẦN LẤY ID: Menu cấp 1
//                                $danhsach_menu[] =[
//                                    'id'   => $value_2['id']
//                                ];
                            }

                            // Kiểm tra điều kiện hiển thị cho menu cha thông thường
                            if ($value['m_action'] == 'quan-ly-hinh-anh' || in_array($value['id'], ['33'])) {
                                $nhom_menu .= '<li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="?id=' . $value['id'] . '">
                                        <i class="' . (!empty($value['icon']) ? $value['icon'] : "fa fa-circle-o") . '"></i> 
                                        <span>' . $value['ten_vi'] . '</span>
                                    </a>
                                </li>';
                                // PHẦN LẤY ID: Menu cha thông thường (điều kiện riêng)
                                $danhsach_menu[] =[
                                    'id'   => $value['id']
                                ];
                            } elseif (!empty($nhom_2)) {
                                $nhom_menu .= '<li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="' . (!empty($value['icon']) ? $value['icon'] : "fa fa-circle-o") . '"></i> 
                                        <span>' . $value['ten_vi'] . '</span>
                                    </a>
                                    <ul class="sidebar-submenu custom-scrollbar submenu-group">' . $nhom_2 . '</ul>
                                </li>';
                                // PHẦN LẤY ID: Menu cha thông thường (có submenu)
//                                $danhsach_menu[] =[
//                                    'id'   => $value['id']
//                                ];
                            } else {
                                $nhom_menu .= '<li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="?id=' . $value['id'] . '">
                                        <i class="' . (!empty($value['icon']) ? $value['icon'] : "fa fa-circle-o") . '"></i> 
                                        <span>' . $value['ten_vi'] . '</span>
                                    </a>
                                </li>';
                                $danhsach_menu[] =[
                                    'id'   => $value['id']
                                ];
                            }
                        }
                    }

                    echo $nhom_menu;
//                    echo '<pre>';
//                    // Hiển thị danh sách các id menu (nếu cần sử dụng)
//                    print_r($danhsach_menu);
//                    echo '</pre>';
                    ?>

                </ul>
            </div>
        </nav>
    </div>
</div>
