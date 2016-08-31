<?php
// Get window folder
	$windowDir=substr($act,0,strpos($act,'_'));
	$solWindowName=substr($act,strpos($act,'_')+1);
	$windowName=$solWindowName.'.tpl';
	$windowPath='windows/'.$windowDir.'/'.$windowName;
	
				if (file_exists('includes/ajax/windows/'.$solWindowName.'.php')){
					include 'includes/ajax/windows/'.$solWindowName.'.php';
				}
				
				$window=$smarty->fetch($windowPath);
				
				$data["data"]=$window;
				$data["command"]='createWindow';
				$ajax->add($data);									
				unset($data); // clear data	
?>