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
        $tb_listbv = DB_fet_rd("*", "#_baiviet", "id_parent IN ($id_danhmuc_str) AND showhi = 1", "`catasort` DESC, `id` DESC", "$limit_baiviet", "id");

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
