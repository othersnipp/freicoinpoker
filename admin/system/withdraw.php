<?php
$_PAGE_TITLE='Withdraw';

if ($action=='delete'){
	$id=cg('package');
	$db->query("delete from withdraw where id='$id'");
}

$prices=$db->getRows("select * from withdraw order by id asc");
$smarty->assign('withdraw',$prices);
?>