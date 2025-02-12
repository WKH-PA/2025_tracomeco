<?php
  $mangxahoi = SHOW_mxh();
  foreach ($mangxahoi as $rows) {
  	if($thongtin['mxh_is_anh'] == 1){
?>
        <a title="<?=$rows['tenbaiviet_'.$lang] ?>" href="<?= $rows['duongdantin']?>" target="_blank" rel="nofollow noopener" class="button <?=$rows['fontawesome'] ?> "
           style="<?=$rows['background'] != '' ?  'background: '.$rows['background'] : '' ?>">
  <span><?=$rows['tenbaiviet_'.$lang] ?></span>
  <img src="<?=checkImage($fullpath, $rows['icon'], $rows['duongdantin']) ?>" alt="">
</a>
<?php }else{ ?>
        <a title="<?=$rows['tenbaiviet_'.$lang] ?>" href="<?= $rows['duongdantin']?>" target="_blank" rel="nofollow noopener"
           style="<?=$rows['background'] != '' ?  'background: '.$rows['background'] : '' ?>"><i class="<?=$rows['fontawesome'] ?>"></i></a>
<?php }} ?>

