<?php
    // Get danh muc menu theo id
    function GET_danhmuc_menu($id_menu, $lang = 'vi', $limit_danhmuc = 3, $limit_baiviet = 4)
    {
        global $fullpath;
        if (!$id_menu) return [];
        $menu = DB_fet_rd("id, step", "#_menu", "id = $id_menu", "", "1", "id");
        if (!$menu) return [];
        $step_id = $menu[$id_menu]['step'] ?$menu[$id_menu]['step'] :0;

        $tb_danhmuc = DB_fet_rd("*", "#_danhmuc", "step = $step_id AND showhi = 1", "`catasort` ASC, `id` DESC", "$limit_danhmuc", "id");
        if (!$tb_danhmuc) return [];

        $list_id_danhmuc = array_keys($tb_danhmuc);
        if (empty($list_id_danhmuc)) return [];

        $id_danhmuc_str = implode(',', $list_id_danhmuc);
        $tb_listbv = DB_fet_rd("*", "#_baiviet", "id_parent IN ($id_danhmuc_str) AND `opt1` = 1 AND showhi = 1", "`catasort` DESC, `id` DESC", "$limit_baiviet", "id");

        $grouped_baiviet = [];
        foreach ($tb_listbv as $bv) {
            $grouped_baiviet[$bv['id_parent']][] = $bv['tenbaiviet_' .$lang];
        }
        $data = [];
        foreach ($tb_danhmuc as $dm) {
            $data[] = [
                'tenbaiviet_danhmuc' => $dm['tenbaiviet_' . $lang],
                'icon_danhmuc' => !empty($dm['icon']) ? full_src($dm, '') : '',
                'mota_danhmuc' => !empty($dm['mota_'. $lang]) ? $dm['mota_'. $lang] : '',
                'noidung_danhmuc' => !empty($dm['noidung_'. $lang]) ? $dm['noidung_'. $lang] : '',
                'seo_name_danhmuc' => !empty($dm['seo_name']) ? $fullpath. "/". $dm['seo_name'] :'' ,
                'tenbaiviet' => !empty($grouped_baiviet[$dm['id']]) ? $grouped_baiviet[$dm['id']] : []
            ];
        }

        return $data;
    }

    function limitText($text, $limit = 3) {
        $lines = explode("\n", wordwrap(strip_tags($text), 80)); // Tách thành dòng
        return implode(" ", array_slice($lines, 0, $limit)) . '...'; // Lấy 3 dòng đầu
    }

    function GET_menu($id_parent) {
        $menu =DB_fet("*","#_menu", "`showhi` = '1' AND `id_parent`= $id_parent", "`catasort` ASC","", "arr");
        return $menu;
    }
    

function shorten_text($text, $max_length) {
    return (strlen($text) > $max_length) ? substr($text, 0, $max_length) . '...' : $text;
}

function get_menu_item_by_id($menu_items, $id) {
    foreach ($menu_items as $item) {
        if ($item['step'] == $id) return $item;
    }
    return null;
}

function get_parent_menu_name($menus, $child_id) {
    foreach ($menus as $menu) {
        if ($menu['id'] == $child_id) {
            foreach ($menus as $parent) {
                if ($parent['id'] == $menu['id_parent']) return $parent['ten_vi'];
            }
        }
    }
    return '';
}

// ✅ Gộp chung function lấy dữ liệu theo ID từ các bảng khác nhau
function lay_du_lieu_theo_id($id, $type = 'step') {
    $tables = [
        'step' => "#_step",
        'tinhnang' => "#_module_tinhnang",
        'module_page' => "#_module_page"
    ];

    if (!isset($tables[$type])) return ['error' => "Invalid type: $type"];

    $table = $tables[$type];
    $condition = $type === 'module_page' ? "`page` = '$id'" : "`id` = '$id'";

    $result = DB_que("SELECT * FROM `$table` WHERE $condition AND `showhi` = 1 LIMIT 1");

    return DB_num($result) ? DB_arr($result)[0] : ['error' => "No results found for id: $id"];
}
