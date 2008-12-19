<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['tox_toolbox']);
if ($confArr['adminOnly']==1) {
	$TYPO3_CONF_VARS['BE']['adminOnly']=1;
}

if ($confArr['pageUnavailable_force']==1) {
	$TYPO3_CONF_VARS['FE']['pageUnavailable_force']=1;
	
	switch($confArr['pageUnavailable_handlingType']) {
		case'readfile':
			$fString=trim($confArr['pageUnavailable_handlingString']);
			$hString=(strlen($fString)>0)?'READFILE:'.$fString:'';
			break;
			
		case'redirect':
			$fString=trim($confArr['pageUnavailable_handlingString']);
			$hString=(strlen($fString)>0)?'REDIRECT:'.$fString:'';
			break;
			
		case'default':
		default:
			$hString='';
			break;
	}
	$TYPO3_CONF_VARS['FE']['pageUnavailable_handling']=$hString;
}

if ($confArr['extCache']==1) {
	$TYPO3_CONF_VARS['EXT']['extCache']=1;
}

?>