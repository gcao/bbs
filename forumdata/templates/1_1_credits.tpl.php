<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('credits');
0
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/credits.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/header.htm', 1309820899, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/credits.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/faq_navbar.htm', 1309820899, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/credits.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/footer.htm', 1309820899, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/credits.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/jsmenu.htm', 1309820899, '1', './templates/default')
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
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; <? if(empty($action)) { ?>帮助<? } else { ?><a href="faq.php">帮助</a> <?=$navigation?><? } ?> &raquo; 积分说明</div>
<div id="wrap" class="wrap with_side s_clear">
<div class="side"><h2>帮助</h2>
<div class="sideinner">
<ul class="tabs"><? if(is_array($faqparent)) { foreach($faqparent as $fpid => $parent) { ?><li name="<?=$parent['title']?>"><a href="faq.php?action=faq&amp;id=<?=$fpid?>" ><?=$parent['title']?></a></li><? } } ?><li><a href="faq.php?action=credits">积分说明</a></li>
<li><a href="faq.php?action=grouppermission">用户组权限</a></li>
<? if(!empty($plugins['faq'])) { if(is_array($plugins['faq'])) { foreach($plugins['faq'] as $id => $module) { ?><li<? if($_GET['id'] == $id) { ?> class="current"<? } ?>><a href="faq.php?action=plugin&amp;id=<?=$id?>"><?=$module['name']?></a></li><? } } } ?>
</ul>
</div>
<hr class="shadowline" />
<div class="sideinner">
<form method="post" action="faq.php?action=search&amp;searchsubmit=yes">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="searchtype" value="all" />
<input type="text" name="keyword" size="16" value="<?=$keyword?>" class="txt" />
<button type="submit" name="searchsubmit">搜索</button>
</form>
</div>
<?=$pluginhooks['faq_extra']?></div>

<div class="main">
<div class="content">
<div class="itemtitle s_clear">
<select class="right" onchange="location.href='faq.php?action=credits&fid=' + this.value"><option value="">全局策略</option><?=$forumlist?></select>
<h1>积分说明<? if($forum) { ?> - <?=$forum['name']?><? } ?></h1>
</div>
<div class="datalist">
<table summary="积分说明" cellspacing="0" cellpadding="0">
<thead>
<tr class="colplural">
<th>&nbsp;</th><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { ?><td><?=$credit['title']?></td><? } } ?></tr>
</thead>
<tbody><? if(is_array($policyarray)) { foreach($policyarray as $operation => $policy) { ?><tr class="<? echo swapclass('colplural'); ?>">
<th>
<? if($forum) { if($operation == 'post') { ?>
发新主题
<? } elseif($operation == 'reply') { ?>
发表回复
<? } elseif($operation == 'digest') { ?>
加入精华
<? } elseif($operation == 'postattach') { ?>
发表附件
<? } elseif($operation == 'getattach') { ?>
下载附件
<? } } else { if($operation == 'post') { ?>
发新主题
<? } elseif($operation == 'reply') { ?>
发表回复
<? } elseif($operation == 'digest') { ?>
加入精华
<? } elseif($operation == 'postattach') { ?>
发表附件
<? } elseif($operation == 'getattach') { ?>
下载附件
<? } elseif($operation == 'sendpm') { ?>
发短消息
<? } elseif($operation == 'search') { ?>
搜索
<? } elseif($operation == 'promotion_visit') { ?>
访问推广
<? } elseif($operation == 'promotion_register') { ?>
注册推广
<? } elseif($operation == 'tradefinished') { ?>
成功交易
<? } elseif($operation == 'votepoll') { ?>
参与投票
<? } elseif($operation == 'lowerlimit') { ?>
积分下限
<? } } ?>
</th><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { ?><td>
<? if($creditsarray[$operation][$id]) { ?>
<?=$creditsarray[$operation][$id]?>
<? } else { ?>
-
<? } ?>
</td><? } } ?></tr><? } } ?></tbody>
</table>
</div>
<div class="notice">
<? if(!$forum) { ?><p>积分下限: 当您该项积分低于此下限设置的数值时，将无法执行积分策略中涉及扣减此项积分的操作</p><? } ?>
<p>总积分计算公式: <?=$creditsformulaexp?></p>
<p>当前积分: <a href="memcp.php?action=credits"><?=$credits?></a></p>
</div>

<br />
<div class="datalist">
<table id="list_memcp_extgroup" cellspacing="0" cellpadding="0" class="datatable" style="margin-bottom:30px;">
<thead class="colplural">
<tr>
<td></td>
<? if(!$forum) { ?>
<td>用户级别</td>
<td>积分起点</td>
<td>阅读权限</td>
<? } else { ?>
<td>积分起点</td>
<td>浏览版块</td>
<td>发新话题</td>
<td>发表回复</td>
<td>下载/查看附件</td>
<td>上传附件</td>
<? } ?>
<td>操作</td>
</tr>
</thead>
<tbody><? if(is_array($extgroups)) { foreach($extgroups as $gp) { ?><tr<? if($gp['groupid'] == $groupid) { ?> class="colplural"<? } ?>>
<td><strong><?=$gp['grouptitle']?><strong></td>
<? if(!$forum) { ?>
<td><? showstars($gp['stars']); ?></td>
<td><?=$gp['creditshigher']?></td>
<td><?=$gp['readaccess']?></td>
<? } else { ?>
<td><? if($gp['type'] == 'member') { ?><?=$gp['creditshigher']?><? } ?></td>
<td><? if($gp['perm']['viewperm']) { ?><img src="<?=IMGDIR?>/data_valid.gif" /><? } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } ?></td>
<td><? if($gp['perm']['postperm']) { ?><img src="<?=IMGDIR?>/data_valid.gif" /><? } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } ?></td>
<td><? if($gp['perm']['replyperm']) { ?><img src="<?=IMGDIR?>/data_valid.gif" /><? } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } ?></td>
<td><? if($gp['perm']['getattachperm']) { ?><img src="<?=IMGDIR?>/data_valid.gif" /><? } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } ?></td>
<td><? if($gp['perm']['postattachperm']) { ?><img src="<?=IMGDIR?>/data_valid.gif" /><? } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } ?></td>
<? } ?>
<td><a href="faq.php?action=grouppermission&amp;searchgroupid=<?=$gp['groupid']?>" class="lightlink">查看权限</a></td>
</tr><? } } ?></tbody>
</table>
</div>
</div>
</div>
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