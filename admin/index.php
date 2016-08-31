<?php
include 'includes/system.php';

$smarty->assign('_SITE_TITLE',$_SITE_TITLE);

include 'common.php';
include 'system/'.$pg.'.php';

$smarty->assign('_PAGE_TITLE',$_PAGE_TITLE);
$smarty->assign('err_msg',$err_msg);
$smarty->assign('ok_msg',$ok_msg);
$smarty->assign('_PG',$pg);
$smarty->assign('stats',$stats);

$smarty->display('header.tpl');
$smarty->display($pg.'.tpl');
$smarty->display('footer.tpl');

?>