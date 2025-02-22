<?php
    // Get danh muc menu theo id
    function GET_danhmuc_menu($id_menu, $limit_danhmuc = 3, $limit_baiviet = 4)
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
        $tb_listbv = DB_fet_rd("*", "#_baiviet", "id_parent IN ($id_danhmuc_str) AND `opt1` = 1", "`catasort` DESC, `id` DESC", "$limit_baiviet", "id");

        $grouped_baiviet = [];
        foreach ($tb_listbv as $bv) {
            $grouped_baiviet[$bv['id_parent']][] = GET_text('tenbaiviet_', $bv);
        }
        $data = [];
        foreach ($tb_danhmuc as $dm) {
            $data[] = [
                'tenbaiviet_danhmuc' => GET_text('tenbaiviet_',$dm),
                'icon_danhmuc' => !empty($dm['icon']) ? full_src($dm, '') : '',
                'mota_danhmuc' => GET_text('mota',$dm),
                'noidung_danhmuc' => GET_text('noidung',$dm),
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


    //==========>document
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
    //======>

/**
 * @param string $field Tên trường dữ liệu cần lấy (sẽ tự động thêm "_" nếu chưa có).
 * @param array $item Mảng dữ liệu đầu vào, nếu không truyền vào sẽ dùng biến toàn cục $rows.
 * @param string $fallbacks Ngôn ngữ mặc định.
 *
 * @return string Giá trị của trường dữ liệu theo ngôn ngữ hiện tại hoặc ngôn ngữ mặc định.
 *                Nếu có lỗi hoặc không tìm thấy dữ liệu, trả về chuỗi rỗng.
 */
function GET_text($field, $item = [], $fallbacks = "vi") {
    global $lang;
    global $rows;
    $item = !empty($item) ? $item : $rows;

    try {
        if (empty($rows)) {
            throw new Exception("Dữ liệu đối tượng không hợp lệ", 404);
        }
        if (empty($field)) {
            throw new Exception("Không xác định được trường thông tin cần lấy", 404);
        }
        if (substr($field, -1) !== "_") {
            $field .= "_";
        }
        return !empty($item[$field . $lang]) ? $item[$field . $lang] : $item[$field . $fallbacks];

    } catch (Exception $ex) {
        return "";
    }
}




