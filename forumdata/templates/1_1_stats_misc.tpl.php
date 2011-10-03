<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('stats_misc');
0
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/stats_misc.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/header.htm', 1311279709, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/stats_misc.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/stats_navbar.htm', 1311279709, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/stats_misc.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/footer.htm', 1311279709, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/stats_misc.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/jsmenu.htm', 1311279709, '1', './templates/default')
;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$charset?>" />
<title><?=$navtitle?> <?=$bbname?> <?=$seotitle?> - Powered by Discuz!</title>
<?=$seohead?>
<meta name="keywords" content="<?=$metakeywords?><?=$seokeywords?>" />
<meta name="description" content="<?=$metadescription?> <?=$bbname?> <?=$seodescription?> - Discuz! Board" />
<meta name="generator" content="Discuz! <?=$version?>" />
<meta name="author" content="Discuz! Team and Comsenz UI Team" />
<meta name="copyright" content="2001-2009 Comsenz Inc." />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<link rel="icon" type="image/x-icon" href="/app/favicon.ico" />
<link rel="archives" title="<?=$bbname?>" href="<?=$boardurl?>archiver/" />
<?=$rsshead?>
<?=$extrahead?><link rel="stylesheet" type="text/css" href="forumdata/cache/style_<?=STYLEID?>_common.css?<?=VERHASH?>" /><link rel="stylesheet" type="text/css" href="forumdata/cache/scriptstyle_<?=STYLEID?>_<?=CURSCRIPT?>.css?<?=VERHASH?>" />
<? if($forum['ismoderator']) { ?>
<link href="forumdata/cache/style_1_moderator.css?oXZ" rel="stylesheet" type="text/css" />
<? } ?><script type="text/javascript">var STYLEID = '<?=STYLEID?>', IMGDIR = '<?=IMGDIR?>', VERHASH = '<?=VERHASH?>', charset = '<?=$charset?>', discuz_uid = <?=$discuz_uid?>, cookiedomain = '<?=$cookiedomain?>', cookiepath = '<?=$cookiepath?>', attackevasive = '<?=$attackevasive?>', disallowfloat = '<?=$disallowfloat?>', creditnotice = '<? if($creditnotice) { ?><?=$creditnames?><? } ?>', <? if(in_array(CURSCRIPT, array('viewthread', 'forumdisplay'))) { ?>gid = parseInt('<?=$thisgid?>')<? } elseif(CURSCRIPT == 'index') { ?>gid = parseInt('<?=$gid?>')<? } else { ?>gid = 0<? } ?>, fid = parseInt('<?=$fid?>'), tid = parseInt('<?=$tid?>')</script>
<script src="<?=$jspath?>common.js?<?=VERHASH?>" type="text/javascript"></script>
</head>

<body id="<?=CURSCRIPT?>" onkeydown="if(event.keyCode==27) return false;">

<div id="append_parent"></div><div id="ajaxwaitid"></div>

<div id="header">
<div class="wrap s_clear">
<h2><a href="<?=$indexname?>" title="<?=$bbname?>"><?=BOARDLOGO?></a></h2>
<div id="umenu">
<? if($discuz_uid) { include("/data/apps/gocool/current/public/shared/my_turn.html") ?><cite><a href="space.php?uid=<?=$discuz_uid?>" class="noborder"><?=$discuz_userss?></a><? if($allowinvisible) { ?><span id="loginstatus"><? if(!empty($invisible)) { ?><a href="member.php?action=switchstatus" onclick="ajaxget(this.href, 'loginstatus');doane(event);">隐身</a><? } else { ?><a href="member.php?action=switchstatus" title="我要隐身" onclick="ajaxget(this.href, 'loginstatus');doane(event);">在线</a><? } ?></span><? } ?></cite>
<span class="pipe">|</span>
<? if($ucappopen['UCHOME']) { ?>
<a href="<?=$uchomeurl?>/space.php?uid=<?=$discuz_uid?>" target="_blank">空间</a>
<? } elseif($ucappopen['XSPACE']) { ?>
<a href="<?=$xspaceurl?>/?uid-<?=$discuz_uid?>" target="_blank">空间</a>
<? } ?>
<a id="myprompt" href="notice.php" <? if($prompt) { ?>class="new" onmouseover="showMenu({'ctrlid':this.id})"<? } ?>>提醒</a>
<span id="myprompt_check"></span>
<a href="pm.php" id="pm_ntc" target="_blank">短消息</a>
<? if($taskon) { ?>
<a id="task_ntc" <? if($doingtask) { ?>href="task.php?item=doing" class="new" title="您有未完成的任务"<? } else { ?>href="task.php"<? } ?> target="_blank">论坛任务</a>
<? } ?>

<span class="pipe">|</span>
<a href="memcp.php">个人中心</a>
<? if($discuz_uid && $adminid > 1) { ?><a href="modcp.php?fid=<?=$fid?>" target="_blank">管理面板</a><? } if($discuz_uid && $adminid == 1) { ?><a href="admincp.php" target="_blank">管理中心</a><? } ?>
<a href="logging.php?action=logout&amp;formhash=<?=FORMHASH?>">退出</a>
<? } elseif(!empty($_DCOOKIE['loginuser'])) { ?>
<cite><a id="loginuser" class="noborder"><?=$_DCOOKIE['loginuser']?></a></cite>
<a href="logging.php?action=login" onclick="showWindow('login', this.href);return false;">激活</a>
<a href="logging.php?action=logout&amp;formhash=<?=FORMHASH?>">退出</a>
<? } else { ?>
<a href="<?=$regname?>" onclick="showWindow('register', this.href);return false;" class="noborder"><?=$reglinkname?></a>
<a href="logging.php?action=login" onclick="showWindow('login', this.href);return false;">登录</a>
<? } ?>
</div>
<div id="ad_headerbanner"><? if($admode && !empty($advlist['headerbanner'])) { ?><?=$advlist['headerbanner']?><? } ?></div>
<div id="menu">
<ul>
<li><span><a href="/app">对弈 <span style="color:#ff7777;font-style:italic">Beta</span></a></span></li>
<? if($_DCACHE['settings']['frameon'] > 0) { ?>
<li>
<span class="frameswitch">
<script type="text/javascript">
if(top == self) {
<? if(($_DCACHE['settings']['frameon'] == 2 && !defined('CACHE_FILE') && in_array(CURSCRIPT, array('index', 'forumdisplay', 'viewthread')) && (($_DCOOKIE['frameon'] == 'yes' && $_GET['frameon'] != 'no') || (empty($_DCOOKIE['frameon']) && empty($_GET['frameon']))))) { ?>
top.location = 'frame.php?frameon=yes&referer='+escape(self.location);
<? } ?>
document.write('<a href="frame.php?frameon=yes" target="_top" class="frameon">分栏模式<\/a>');
} else {
document.write('<a href="frame.php?frameon=no" target="_top" class="frameoff">平板模式<\/a>');
}
</script>
</span>
</li>
<? } if(is_array($navs)) { foreach($navs as $id => $nav) { if($id == 3) { if(!empty($plugins['jsmenu'])) { ?>
<?=$nav['nav']?>
<? } if(!empty($plugins['links'])) { if(is_array($plugins['links'])) { foreach($plugins['links'] as $module) { if(!$module['adminid'] || ($module['adminid'] && $adminid > 0 && $module['adminid'] >= $adminid)) { ?><li><?=$module['url']?></li><? } } } } } else { if(!$nav['level'] || ($nav['level'] == 1 && $discuz_uid) || ($nav['level'] == 2 && $adminid > 0) || ($nav['level'] == 3 && $adminid == 1)) { ?><?=$nav['nav']?><? } } } } if(in_array($BASEFILENAME, $navmns)) { $mnid = $BASEFILENAME; } elseif($navmngs[$BASEFILENAME]) { if(is_array($navmngs[$BASEFILENAME])) { foreach($navmngs[$BASEFILENAME] as $navmng) { if($navmng['0'] == array_intersect_assoc($navmng['0'], $_GET)) { $mnid = $navmng['1']; } } } } ?>
</ul>
<script type="text/javascript">
var currentMenu = $('mn_<?=$mnid?>') ? $('mn_<?=$mnid?>') : $('mn_<?=$navmns['0']?>');
currentMenu.parentNode.className = 'current';
</script>
</div>
<? if(!empty($stylejumpstatus)) { ?>
<script type="text/javascript">
function setstyle(styleid) {
str = unescape('<? echo str_replace("'", "\\'", urlencode($_SERVER['QUERY_STRING'])); ?>');
str = str.replace(/(^|&)styleid=\d+/ig, '');
str = (str != '' ? str + '&' : '') + 'styleid=' + styleid;
location.href = '<?=$BASESCRIPT?>?' + str;
}
</script>
<ul id="style_switch"><? if(is_array($styles)) { foreach($styles as $id => $stylename) { ?><li<? if($id == STYLEID) { ?> class="current"<? } ?>><a href="###" onclick="setstyle(<?=$id?>)" title="<?=$stylename?>" style="background: <?=$styleicons[$id]?>;"><?=$stylename?></a></li><? } } ?></ul>
<? } ?>
</div>
<div id="myprompt_menu" style="display:none" class="promptmenu">
<div class="promptcontent">
<ul class="s_clear"><? if(is_array($prompts)) { foreach($prompts as $promptkey => $promptdata) { if($promptkey) { ?><li<? if(!$promptdata['new']) { ?> style="display:none"<? } ?>><a id="prompt_<?=$promptkey?>" href="<? if($promptdata['script']) { ?><?=$promptdata['script']?><? } else { ?>notice.php?filter=<?=$promptkey?><? } ?>" target="_blank"><?=$promptdata['name']?> (<?=$promptdata['new']?>)</a></li><? } } } ?></ul>
</div>
</div>
</div>
<?=$pluginhooks['global_header']?>
<div id="nav">
<a href="<?=$indexname?>"><?=$bbname?></a> &raquo; <a href="stats.php">论坛统计</a> &raquo;
<? if($type == 'views') { ?>
流量统计
<? } elseif($type == 'agent') { ?>
客户软件
<? } elseif($type == 'posts') { ?>
发帖量记录
<? } elseif($type == 'forumsrank') { ?>
版块排行
<? } elseif($type == 'threadsrank') { ?>
主题排行
<? } elseif($type == 'postsrank') { ?>
发帖排行
<? } elseif($type == 'creditsrank') { ?>
积分排行
<? } elseif($type == 'modworks') { ?>
管理统计
<? } ?>
</div>
<div id="wrap" class="wrap with_side s_clear">
<div class="main">
<div class="content">
<div class="datalist">
<? if($type == 'views') { ?>
<h1>流量统计</h1>
<div id="list_stats_week_c" class="c_header">
<h3 onclick="toggle_collapse('list_stats_week', 1, 1);">星期流量</h3>
<div class="c_header_action">
<p class="c_header_ctrlbtn" onclick="toggle_collapse('list_stats_week', 1, 1);">[ 展开 ]</p>
</div>
</div>
<table id="list_stats_week" summary="星期流量" cellspacing="0" cellpadding="0">
<?=$statsbar_week?>
</table>
<div id="list_stats_hour_c" class="c_header">
<h3 onclick="toggle_collapse('list_stats_hour', 1, 1);">时段流量</h3>
<div class="c_header_action">
<p class="c_header_ctrlbtn" onclick="toggle_collapse('list_stats_hour', 1, 1);">[ 展开 ]</p>
</div>
</div>
<table id="list_stats_hour" summary="时段流量" cellspacing="0" cellpadding="0">
<?=$statsbar_hour?>
</table>

<? } elseif($type == 'agent') { ?>
<h1>客户软件</h1>
<div id="list_stats_os_c" class="c_header">
<h3 onclick="toggle_collapse('list_stats_os', 1, 1);">操作系统</h3>
<div class="c_header_action">
<p class="c_header_ctrlbtn" onclick="toggle_collapse('list_stats_os', 1, 1);">[ 展开 ]</p>
</div>
</div>
<table id="list_stats_os" summary="客户软件" cellspacing="0" cellpadding="0">
<?=$statsbar_os?>
</table>
<div id="list_stats_browser_c" class="c_header">
<h3 onclick="toggle_collapse('list_stats_browser', 1, 1);">浏览器</h3>
<div class="c_header_action">
<p class="c_header_ctrlbtn" onclick="toggle_collapse('list_stats_browser', 1, 1);">[ 展开 ]</p>
</div>
</div>
<table id="list_stats_browser" summary="客户软件" cellspacing="0" cellpadding="0">
<?=$statsbar_browser?>
</table>

<? } elseif($type == 'posts') { ?>
<h1>发帖量记录</h1>
<div id="list_stats_month_posts_c" class="c_header">
<h3 onclick="toggle_collapse('list_stats_month_posts', 1, 1);">每月新增帖子记录</h3>
<div class="c_header_action">
<p class="c_header_ctrlbtn" onclick="toggle_collapse('list_stats_month_posts', 1, 1);">[ 展开 ]</p>
</div>
</div>
<table id="list_stats_month_posts" summary="发帖量记录" cellspacing="0" cellpadding="0">
<?=$statsbar_monthposts?>
</table>
<div id="list_stats_day_posts_c" class="c_header">
<h3 onclick="toggle_collapse('list_stats_day_posts', 1, 1);">每日新增帖子记录</h3>
<div class="c_header_action">
<p class="c_header_ctrlbtn" onclick="toggle_collapse('list_stats_day_posts', 1, 1);">[ 展开 ]</p>
</div>
</div>
<table id="list_stats_day_posts" summary="发帖量记录" cellspacing="0" cellpadding="0">
<?=$statsbar_dayposts?>
</table>

<? } elseif($type == 'forumsrank') { ?>
<h1>版块排行</h1>
<table summary="版块排行" cellpadding="0" cellspacing="0">
<thead class="colplural">
<tr>
<td colspan="2">发帖排行榜</td>
<td colspan="2">回复排行榜</td>
</tr>
</thead>
<?=$forumsrank['0']?>
</table>
<table summary="版块排行" cellpadding="0" cellspacing="0">
<thead class="colplural">
<tr>
<td colspan="2">最近 30 天发帖排行榜</td>
<td colspan="2">最近 24 小时发帖排行榜</td>
</tr>
</thead>
<?=$forumsrank['1']?>
</table>

<? } elseif($type == 'threadsrank') { ?>
<h1>主题排行</h1>
<table summary="主题排行" cellpadding="0" cellspacing="0">
<thead class="colplural">
<tr>
<td colspan="2" width="50%">被浏览最多的主题</td>
<td colspan="2" width="50%">被回复最多的主题</td>
</tr>
</thead>
<?=$threadsrank?>
</table>

<? } elseif($type == 'postsrank') { ?>
<h1>发帖排行</h1>
<table summary="发帖排行" cellpadding="0" cellspacing="0">
<thead class="colplural">
<tr>
<td colspan="2" width="25%">发帖 排行榜</td>
<td colspan="2" width="25%">精华帖 排行榜</td>
<td colspan="2" width="25%">最近 30 天发帖 排行榜</td>
<td colspan="2" width="25%">最近 24 小时发帖 排行榜</td>
</tr>
</thead>
<?=$postsrank?>
</table>

<? } elseif($type == 'creditsrank') { ?>
<div class="itemtitle s_clear">
<h1>积分排行</h1>
<ul><? if(is_array($extendedcredits)) { foreach($extendedcredits as $key => $extendedcredit) { ?><li<? if($extcredit == $key) { ?> class="current" id="extendedcredit_current"<? } ?> onclick="swtichcurrent(this, <?=$key?>);return false;"><a href="stats.php?type=creditsrank&amp;extcredit=<?=$key?>"><span><?=$extcredits[$key]['title']?></span></a></li><? } } ?></ul>
</div><? if(is_array($extendedcredits)) { foreach($extendedcredits as $key => $extendedcredit) { ?><table id="extendedcredit_<?=$key?>" summary="积分排行" cellpadding="0" cellspacing="0" style="display:<? if($extcredit != $key) { ?> none<? } ?>">
<thead class="colplural">
<tr>
<td colspan="2"><?=$extcredits[$key]['title']?>排行榜</td>
</tr>
</thead>
<?=$creditsrank[$key]?>
</table><? } } ?><script>
var lastcurrent = $('extendedcredit_current');
var lastextcredit = <?=$extcredit?>;
function swtichcurrent(obj, extcredit) {
if(lastcurrent) {
lastcurrent.className = '';
}
$('extendedcredit_' + lastextcredit).style.display = 'none';
$('extendedcredit_' + extcredit).style.display = '';
obj.className = 'current';
lastcurrent = obj;
lastextcredit = extcredit;
}
</script>
<? } elseif($type == 'modworks' && $uid) { ?>

<h1>管理统计 - <?=$member['username']?></h1>
<div class="hasscrolltable">
<p class="fixedtable">月份: <? if(is_array($monthlinks)) { foreach($monthlinks as $link) { ?> &nbsp;<?=$link?>&nbsp; <? } } ?></p>
<table cellpadding="0" cellspacing="0" class="scrollfixedtable">
<thead class="colplural">
<tr>
<td>时间</td>
</tr>
</thead>
<tbody><? if(is_array($modactions)) { foreach($modactions as $day => $modaction) { ?><tr class="<? echo swapclass('colplural'); ?>">
<td><?=$day?></td>
</tr><? } } ?></tbody>
<tr class="colplural"><td></td></tr>
<tr>
<td>本月管理</td>
</tr>
</table>
<div class="scrolltable">
<table cellpadding="0" cellspacing="0">
<thead class="colplural">
<tr><? if(is_array($modactioncode)) { foreach($modactioncode as $key => $val) { ?><td width="<?=$tdwidth?>"><?=$val?></td><? } } ?></tr>
</thead>
<tbody><? unset($swapc); if(is_array($modactions)) { foreach($modactions as $day => $modaction) { ?><tr class="<? echo swapclass('colplural'); ?>"><? if(is_array($modactioncode)) { foreach($modactioncode as $key => $val) { if($modaction[$key]['posts']) { ?><td title="帖子: <?=$modaction[$key]['posts']?>"><?=$modaction[$key]['count']?><? } else { ?><td>&nbsp;<? } ?></td><? } } ?></tr><? } } ?></tbody>
<tr class="colplural"><td colspan="23"></td></tr>
<tr><? if(is_array($modactioncode)) { foreach($modactioncode as $key => $val) { ?><td class="<?=$bgarray[$key]?>" <? if($totalactions[$key]['posts']) { ?>title="帖子: <?=$totalactions[$key]['posts']?>"<? } ?>><?=$totalactions[$key]['count']?>&nbsp;</td><? } } ?></tr>
</table>
</div>
</div>

<? } elseif($type == 'modworks') { ?>

<h1>管理统计 - 全体管理人员</h1>
<div class="hasscrolltable">
<p class="fixedtable">月份: <? if(is_array($monthlinks)) { foreach($monthlinks as $link) { ?> &nbsp;<?=$link?>&nbsp; <? } } ?></p>
<table cellpadding="0" cellspacing="0" class="scrollfixedtable">
<thead class="colplural">
<tr>
<td>用户名</td>
</tr>
</thead>
<tbody><? if(is_array($members)) { foreach($members as $uid => $member) { ?><tr class="<? echo swapclass('colplural'); ?>">
<td><a href="stats.php?type=modworks&amp;before=<?=$before?>&amp;uid=<?=$uid?>" title="查看详细管理统计"><?=$member['username']?></a></td>
</tr><? } } ?></tbody>
</table>

<div class="scrolltable">
<table cellpadding="0" cellspacing="0">
<thead class="colplural">
<tr><? if(is_array($modactioncode)) { foreach($modactioncode as $key => $val) { ?><td width="<?=$tdwidth?>"><?=$val?></td><? } } ?></tr>
</thead>
<tbody><? unset($swapc); if(is_array($members)) { foreach($members as $uid => $member) { ?><tr class="<? echo swapclass('colplural'); ?>"><? if(is_array($modactioncode)) { foreach($modactioncode as $key => $val) { if($member[$key]['posts']) { ?><td title="帖子: <?=$member[$key]['posts']?>"><?=$member[$key]['count']?><? } else { ?><td>&nbsp;<? } ?></td><? } } ?></tr><? } } ?></tbody>
</table>
</div>
</div>
<? } ?>

</div>
<? if($type == 'forumsrank') { ?><div class="notice">统计数据已被缓存，上次于 <?=$lastupdate?> 被更新，下次将于 <?=$nextupdate?> 进行更新</div><? } ?>
</div>
</div>
<div class="side"><h2>统计选项</h2>
<div class="sideinner">
<ul class="tabs">
<li><a href="stats.php">基本概况</a></li>
<? if($statstatus) { ?><li><a href="stats.php?type=views">流量统计</a></li><? } if($statstatus) { ?><li><a href="stats.php?type=agent">客户软件</a></li><? } if($statstatus) { ?><li><a href="stats.php?type=posts">发帖量记录</a></li><? } ?>
<li><a href="stats.php?type=forumsrank">版块排行</a></li>
<li><a href="stats.php?type=threadsrank">主题排行</a></li>
<li><a href="stats.php?type=postsrank">发帖排行</a></li>
<li><a href="stats.php?type=creditsrank">积分排行</a></li>
<li><a href="stats.php?type=trade">交易排行</a></li>
<? if($oltimespan) { ?><li><a href="stats.php?type=onlinetime">在线时间</a></li><? } ?>
<li><a href="stats.php?type=team">管理团队</a></li>
<? if($modworkstatus) { ?><li><a href="stats.php?type=modworks">管理统计</a></li><? } ?>
<li><a href="member.php?action=list">会员列表</a></li>
</ul>
</div></div>
</div>
</div><? if(!empty($plugins['jsmenu'])) { ?>
<ul class="popupmenu_popup headermenu_popup" id="plugin_menu" style="display: none"><? if(is_array($plugins['jsmenu'])) { foreach($plugins['jsmenu'] as $module) { ?>     <? if(!$module['adminid'] || ($module['adminid'] && $adminid > 0 && $module['adminid'] >= $adminid)) { ?>
     <li><?=$module['url']?></li>
     <? } } } ?></ul>
<? } if(is_array($subnavs)) { foreach($subnavs as $subnav) { ?><?=$subnav?><? } } if($prompts['newbietask'] && $newbietasks) { include template('task_newbie_js', '0', ''); } if($admode && !empty($advlist)) { ?>
<div class="ad_footerbanner" id="ad_footerbanner1"><?=$advlist['footerbanner1']?></div><? if($advlist['footerbanner2']) { ?><div class="ad_footerbanner" id="ad_footerbanner2"><?=$advlist['footerbanner2']?></div><? } if($advlist['footerbanner3']) { ?><div class="ad_footerbanner" id="ad_footerbanner3"><?=$advlist['footerbanner3']?></div><? } } else { ?>
<div id="ad_footerbanner1"></div><div id="ad_footerbanner2"></div><div id="ad_footerbanner3"></div>
<? } ?>

<?=$pluginhooks['global_footer']?>
<div id="footer">
<div class="wrap s_clear">
<div id="footlink">
<p>
<strong><a href="<?=$siteurl?>" target="_blank"><?=$sitename?></a></strong>
<? if($icp) { ?>( <a href="http://www.miibeian.gov.cn/" target="_blank"><?=$icp?></a>)<? } ?>
<span class="pipe">|</span><a href="mailto:<?=$adminemail?>">联系我们</a>
<? if($allowviewstats) { ?><span class="pipe">|</span><a href="stats.php">论坛统计</a><? } if($archiverstatus) { ?><span class="pipe">|</span><a href="archiver/" target="_blank">Archiver</a><? } if($wapstatus) { ?><span class="pipe">|</span><a href="wap/" target="_blank">WAP</a><? } if($statcode) { ?><span class="pipe">| <?=$statcode?></span><? } ?>
<?=$pluginhooks['global_footerlink']?>
</p>
<p class="smalltext">
GMT<?=$timenow['offset']?>, <?=$timenow['time']?>
<? if(debuginfo()) { ?>, <span id="debuginfo">Processed in <?=$debuginfo['time']?> second(s), <?=$debuginfo['queries']?> queries<? if($gzipcompress) { ?>, Gzip enabled<? } ?></span><? } ?>.
</p>
</div>
<div id="rightinfo">
<p>Powered by <strong><a href="http://www.discuz.net" target="_blank">Discuz!</a></strong> <em><?=$version?></em><? if(!empty($boardlicensed)) { ?> <a href="http://license.comsenz.com/?pid=1&amp;host=<?=$_SERVER['HTTP_HOST']?>" target="_blank">Licensed</a><? } ?></p>
<p class="smalltext">&copy; 2001-2009 <a href="http://www.comsenz.com" target="_blank">Comsenz Inc.</a></p>
</div><? updatesession(); ?></div>
</div>
<? if($_DCACHE['settings']['frameon'] && in_array(CURSCRIPT, array('index', 'forumdisplay', 'viewthread')) && $_DCOOKIE['frameon'] == 'yes') { ?>
<script src="<?=$jspath?>iframe.js?<?=VERHASH?>" type="text/javascript"></script>
<? } output(); ?></body>
</html>