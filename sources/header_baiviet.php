<?php
$where = "showhi=1 and `opt2` =1";
if ($slug_table == 'danhmuc') {
    $where = "showhi=1 and `opt2` =1 and id_parent=" . $arr_running['id'];
}
$tempDataStep = 1;
$aboutData = LAY_baiviet($tempDataStep, 1, $where, "catasort desc");
$idCatategory = $slug_table == 'danhmuc' ? $arr_running['id'] : $aboutData['id_parent'];
$dataCategory = DB_fet("*", "#_danhmuc", "`step` = '$tempDataStep' AND id =  " . $idCatategory, " `catasort` ASC", "1", "arr");
$dataCategory = current($dataCategory);
$templateId = !empty($dataCategory['p_khuyenmai']) ? $dataCategory['p_khuyenmai'] : 1;
if (!empty($aboutData)) {
    $aboutData = current($aboutData);
    $dataImgChild = LAY_imghinhanhcon($aboutData['id'], 3);
    $dataStep = LAY_anhstep_now($tempDataStep);
    ?>
    <section class="tracomeco_home_gioithieu p-t-60 p-b-60 <?= $templateId ?>">
        <div class="container-fluid">
            <div class="row v-center">
                <?php include "component/style" . $templateId . ".php" ?>
            </div>
        </div>
    </section>
<?php } ?>