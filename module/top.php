<?php
if (!defined('IN_HANFOX')) exit('Access Denied');

$pagename = 'TOP排行榜';
$pageurl = '?mod=top';
$tplfile = 'top.html';
$tpldir = 'other';

/** 缓存设置 */
$smarty->compile_dir .= $tpldir;
$smarty->cache_dir .= $tpldir;
$smarty->cache_lifetime = $options['cache_time_other'] * 3600;

if (!$smarty->isCached($tplfile)) {
	$smarty->assign('pagename', $pagename);
	$smarty->assign('site_title', $pagename.' - '.$options['site_name']);
	$smarty->assign('site_keywords', '网站热榜，网站TOP排行榜，热门网站排行，网站风云榜');
	$smarty->assign('site_description', '提供最新热门网站排行数据，让您及时了解那些信息最受关注。');
	$smarty->assign('site_path', get_sitepath().' &nbsp;&rsaquo;&nbsp; '.$pagename);
	$smarty->assign('site_rss', get_rssfeed());
}

smarty_output($tplfile);
?>