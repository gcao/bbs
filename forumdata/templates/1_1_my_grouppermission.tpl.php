<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('my_grouppermission');
0
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/my_grouppermission.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/header.htm', 1309597309, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/my_grouppermission.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/faq_navbar.htm', 1309597309, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/my_grouppermission.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/footer.htm', 1309597309, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/my_grouppermission.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/jsmenu.htm', 1309597309, '1', './templates/default')
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
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; 帮助 &raquo; 用户组权限</div>

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
<h1><?=$group['grouptitle']?> 用户组权限</h1>
<select class="right" onchange="location.href='faq.php?action=grouppermission&searchgroupid=' + this.value">
<optgroup label="会员用户组"><?=$grouplist['member']?></optgroup>
<optgroup label="特殊用户组"><?=$grouplist['special']?></optgroup>
<optgroup label="特殊管理组"><?=$grouplist['specialadmin']?></optgroup>
<optgroup label="系统用户组"><?=$grouplist['system']?></optgroup>
</select>
</div>
<div class="datalist">
<table cellspacing="0" cellpadding="0" class="datatable">
<tr class="colplural">
<td width="10%">用户级别</td>
<td width="40%"><? showstars($group['stars']); ?></td>
<? if($group['radminid']) { ?>
<td width="10%">管理权限</td>
<td><? if($group['radminid']==1 || $group['radminid']==2) { ?>全论坛管理<? } elseif($group['radminid']==3 ) { ?>部分版块管理<? } ?></td>
<? } elseif($cgdata['0'] == 'member') { ?>
<td width="10%">积分起点</td>
<td width="40%"><?=$group['creditshigher']?></td>
<? } ?>
</tr>
<? if($searchgroupid == $groupid && $nextgid) { $upgrade = $groups[$nextgid]['creditshigher'] - $credits; ?><tr><td colspan="4">您的当前积分为 <?=$credits?> 还需 <?=$upgrade?> 才能升级到 <a href="faq.php?action=grouppermission&amp;searchgroupid=<?=$nextgid?>" class="lightlink"><?=$groups[$nextgid]['grouptitle']?></a>，<a href="faq.php?action=credits" class="lightlink">查看积分说明</a></td></tr>
<? } ?>
</table>
<? if($group['radminid']) { ?>
<div id="list_modoptions_c" class="c_header">
<h3 onclick="toggle_collapse('list_modoptions', 1, 1);">管理权限</h3>
<div class="c_header_action">
<p class="c_header_ctrlbtn" onclick="toggle_collapse('list_modoptions', 1, 1);">[ 展开 ]</p>
</div>
</div>
<table id="list_modoptions" cellspacing="0" cellpadding="0"><? $adminperms = array('allowstickthread', 'allowdigestthread', 'allowbumpthread', 'allowhighlightthread', 'allowrecommendthread', 'allowstampthread', 'allowclosethread', 'allowmovethread', 'allowedittypethread', 'allowcopythread', 'allowmergethread', 'allowsplitthread', 'allowrepairthread', 'allowrefund', 'alloweditpoll', 'allowremovereward', 'alloweditactivity', 'allowedittrade', 'alloweditpost', 'allowwarnpost', 'allowbanpost', 'allowdelpost', 'allowviewreport', 'allowmodpost', 'allowmoduser', 'allowbanuser', 'allowbanip', 'allowedituser', 'allowmassprune', 'allowpostannounce', 'disablepostctrl', 'allowviewip'); $i = 0; if(is_array($adminperms)) { foreach($adminperms as $v) { if(!$i) { ?><tr><? } ?>
<th style="width:14%" class="colplural"><?=$permlang['perms_'.$v]?></th>
<td style="width:11%" >
<? if(in_array($v, array('allowstickthread', 'allowdigestthread'))) { if($group['allowstickthread']==1 ) { ?><?=$permlang['perms_'.$v.'_value']?> I<? } elseif($group['allowstickthread']==2 ) { ?><?=$permlang['perms_'.$v.'_value']?> II<? } elseif($group['allowstickthread']==3 ) { ?><?=$permlang['perms_'.$v.'_value']?> III<? } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } } else { if($group[$v] == 1) { ?><img src="<?=IMGDIR?>/data_valid.gif" /><? } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } } ?>
</td><? $i = ++$i > 3 ? 0 : $i; } } ?></table>
<? } ?>
<div id="list_normaloptions_c" class="c_header">
<h3 onclick="toggle_collapse('list_normaloptions', 1, 1);">普通权限</h3>
<div class="c_header_action">
<p class="c_header_ctrlbtn" onclick="toggle_collapse('list_normaloptions', 1, 1);">[ 展开 ]</p>
</div>
</div>
<? if($cgdata['0'] == 'member') { ?>
<div class="itemtitle s_clear">
<ul>
<li<? if(empty($view)) { ?> class="current"<? } ?>><a href="faq.php?action=grouppermission&amp;searchgroupid=<?=$searchgroupid?>"><span>权限的变更</span></a></li>
<li<? if(!empty($view)) { ?> class="current"<? } ?>><a href="faq.php?action=grouppermission&amp;searchgroupid=<?=$searchgroupid?>&amp;view=all"><span>所有权限</span></a></li>
</ul>
</div>
<? } ?>
<table id="list_normaloptions" cellspacing="0" cellpadding="0">
<? if($groupbperms) { ?>
<tr class="colplural">
<th width="200">基本权限</th>
<? if($cgdata['0'] == 'member') { if(is_array($gids)) { foreach($gids as $k => $row) { ?><th width="25%">
<a href="faq.php?action=grouppermission&amp;searchgroupid=<?=$row['0']?><?=$viewextra?>" class="lightlink"><?=$row['1']?></a>
<? if($groupid == $searchgroupid) { if($k == 1) { ?>(上一级别)<? } elseif($k == 2) { ?>(当前级别)<? } elseif($k == 3) { ?>(下一级别)<? } } ?>
</th><? } } } else { ?>
<th></th>
<? } ?>
</tr>
<? } if(is_array($groupbperms)) { foreach($groupbperms as $groupbperm) { ?><tr><th><?=$permlang['perms_'.$groupbperm]?></th><? if(is_array($groups)) { foreach($groups as $group) { ?><td<? if($group['groupid'] == $searchgroupid && $cgdata['0'] == 'member') { ?> class="highlight"<? } ?>>
<? if($groupbperm == 'creditshigher' || $groupbperm == 'readaccess' || $groupbperm == 'maxpmnum') { ?>
<?=$group[$groupbperm]?>
<? } elseif($groupbperm == 'allowsearch') { if($group['allowsearch'] == '0') { ?>禁用搜索<? } elseif($group['allowsearch'] == '1') { ?>只允许搜索标题<? } else { ?>允许搜索帖子内容<? } } else { if($group[$groupbperm] == 1) { ?><img src="<?=IMGDIR?>/data_valid.gif" /><? } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } } ?>
</td><? } } ?></tr><? $bi++; } } if($grouppperms) { ?>
<tr class="colplural">
<th width="200">帖子相关</th>
<? if($cgdata['0'] == 'member') { if(is_array($gids)) { foreach($gids as $k => $row) { ?><th width="25%"><a href="faq.php?action=grouppermission&amp;searchgroupid=<?=$row['0']?><?=$viewextra?>" class="lightlink"><?=$row['1']?></a></th><? } } } else { ?>
<th></th>
<? } ?>
</tr>
<? } if(is_array($grouppperms)) { foreach($grouppperms as $grouppperm) { ?><tr><th><?=$permlang['perms_'.$grouppperm]?></th><? if(is_array($groups)) { foreach($groups as $group) { ?><td<? if($group['groupid'] == $searchgroupid && $cgdata['0'] == 'member') { ?> class="highlight"<? } ?>>
<? if($grouppperm == 'maxsigsize' || $grouppperm == 'maxbiosize') { ?>
<?=$group[$grouppperm]?> 字节
<? } elseif($grouppperm == 'allowrecommend') { if($group['allowrecommend'] > 0) { ?>+<?=$group['allowrecommend']?><? } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } } else { if($group[$grouppperm] == 1) { ?><img src="<?=IMGDIR?>/data_valid.gif" /><? } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } } ?>
</td><? } } ?></tr><? } } if($groupaperms) { ?>
<tr class="colplural">
<th width="200">附件相关</th>
<? if($cgdata['0'] == 'member') { if(is_array($gids)) { foreach($gids as $k => $row) { ?><th width="25%"><a href="faq.php?action=grouppermission&amp;searchgroupid=<?=$row['0']?><?=$viewextra?>" class="lightlink"><?=$row['1']?></a></th><? } } } else { ?>
<th></th>
<? } ?>
</tr>
<? } if(is_array($groupaperms)) { foreach($groupaperms as $groupaperm) { ?><tr><th><?=$permlang['perms_'.$groupaperm]?></th><? if(is_array($groups)) { foreach($groups as $group) { ?><td<? if($group['groupid'] == $searchgroupid && $cgdata['0'] == 'member') { ?> class="highlight"<? } ?>>
<? if($groupaperm == 'maxattachsize' || $groupaperm == 'maxsizeperday') { if($group[$groupaperm]) { ?><?=$group[$groupaperm]?> KB<? } else { ?>没有限制<? } } elseif($groupaperm == 'attachextensions') { if($group['allowpostattach'] == 1) { if($group['attachextensions']) { ?><?=$group['attachextensions']?><? } else { ?>没有限制<? } } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } } else { if($group[$groupaperm] == 1) { ?><img src="<?=IMGDIR?>/data_valid.gif" /><? } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } } ?>
</td><? } } ?></tr><? } } ?></table>

<div id="list_forumoptions_c" class="c_header">
<h3 onclick="toggle_collapse('list_forumoptions', 1, 1);">版块权限</h3>
<div class="c_header_action">
<p class="c_header_ctrlbtn" onclick="toggle_collapse('list_forumoptions', 1, 1);">[ 展开 ]</p>
</div>
</div>
<table id="list_forumoptions" cellspacing="0" cellpadding="0">
<tr class="colplural">
<td>版块</td>
<td width="15%">浏览版块</td>
<td width="15%">发新话题</td>
<td width="15%">发表回复</td>
<td width="15%">下载/查看附件</td>
<td width="15%">上传附件</td>
</tr><? if(is_array($_DCACHE['forums'])) { foreach($_DCACHE['forums'] as $fid => $forum) { if($forum['type'] == 'group') { ?>
<tr><td colspan="6"><a href="index.php?gid=<?=$fid?>" target="_blank"><strong><?=$forum['name']?></strong></a></td></tr>
<? } else { ?>
<tr><td><? if($forum['type'] == 'sub') { ?>&nbsp;&nbsp;&nbsp;&nbsp;<? } ?><a href="forumdisplay.php?fid=<?=$fid?>" target="_blank"><?=$forum['name']?></a></td><? if(is_array($perms)) { foreach($perms as $perm) { ?><td><? if(isset($forumperm[$fid][$perm])) { ?><img src="<?=IMGDIR?>/data_valid.gif" /><? } else { ?><img src="<?=IMGDIR?>/data_invalid.gif" /><? } ?></td><? } } ?></tr>
<? } } } ?></table>

</div>
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