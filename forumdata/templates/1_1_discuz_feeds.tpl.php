<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discuz_feeds');
0
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/discuz_feeds.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/header.htm', 1309627678, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/discuz_feeds.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/index_header.htm', 1309627678, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/discuz_feeds.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/index_heats.htm', 1309627678, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/discuz_feeds.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/index_navbar.htm', 1309627678, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/discuz_feeds.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/footer.htm', 1309627678, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/discuz_feeds.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/jsmenu.htm', 1309627678, '1', './templates/default')
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
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; 首页</div>
<? if($admode && !empty($advlist['text'])) { ?><div class="ad_text" id="ad_text"><table summary="Text Ad" cellpadding="0" cellspacing="1"><?=$advlist['text']?></table></div><? } else { ?><div id="ad_text"></div><? } ?>
<div id="wrap"<? if($infosidestatus['allow'] < 2) { ?> class="wrap s_clear"<? } else { ?> class="wrap with_side s_clear"<? } ?>>
<? if($infosidestatus['allow'] == 2) { ?>
<a id="sidebar_img" href="javascript:;" onclick="sidebar_collapse(['打开边栏', '关闭边栏']);" class="<?=$collapseimg['sidebar']?>"><? if($collapseimg['sidebar'] == 'collapsed_yes') { ?>打开边栏<? } else { ?>关闭边栏<? } ?></a>
<? } elseif($infosidestatus['allow'] == 1) { ?>
<a id="sidebar_img" href="javascript:;" onclick="sidebar_collapse(['', '关闭边栏']);" class="collapsed_yes">打开边栏</a>
<? } ?>
<div class="main"><div class="content">
<?=$pluginhooks['index_header']?><div class="pages_btns s_clear">
<span class="postbtn" id="prompt_index_postbtn"><a href="misc.php?action=nav" onclick="showWindow('nav', this.href);return false;">发帖</a></span>
<? if(!$discuz_uid) { ?>
<p>你可以<a href="<?=$regname?>" onclick="showWindow('register', this.href);return false;" class="lightlink">注册</a>一个帐号，并以此<a href="logging.php?action=login" onclick="showWindow('login', this.href);return false;" class="lightlink">登录</a>，以浏览更多精彩内容，并随时发布观点，与大家交流。</p>
<? } else { ?>
欢迎回来 <?=$discuz_userss?>, <? if($lastvisit) { ?>你上次访问时间是在 <?=$lastvisit?>, <? } ?><a href="my.php?item=threads" class="lightlink" target="_blank">我的帖子</a>, <a href="search.php?srchfrom=<?=$newthreads?>&amp;searchsubmit=yes" class="lightlink">查看新帖</a>, <a href="member.php?action=markread" id="ajax_markread" onclick="ajaxmenu(this);doane(event);" class="lightlink">标记已读</a>
<? } ?>
</div>

<? if(empty($gid) && $announcements) { ?>
<div id="ann">
<dl>
<dt>公告:</dt>
<dd>
<div id="annbody"><ul id="annbodylis"><?=$announcements?></ul></div>
</dd>
</dl>
</div>
<script type="text/javascript">announcement();</script>
<? } if($indexhot['status']) { if($_DCACHE['heats']['message']) { ?>
<div id="hot" class="s_clear<? if($_DCACHE['heats']['image']) { ?> img<? } ?>">
<h3>论坛热点</h3>
<div id="hot_main">
<dl><? if(is_array($_DCACHE['heats']['message'])) { foreach($_DCACHE['heats']['message'] as $data) { ?><dt>
<strong><? if($adminid == 1) { ?><a class="deloption" href="misc.php?action=removeindexheats&amp;tid=<?=$data['tid']?>&amp;from=indexheats" onclick="return removeindexheats()">delete</a><? } ?><a href="viewthread.php?tid=<?=$data['tid']?>&amp;from=indexheats"><?=$data['subject']?></a></strong>
<cite><a href="space.php?uid=<?=$data['authorid']?>&amp;from=indexheats"><?=$data['author']?></a></cite>
</dt>
<dd class="desc">
<?=$data['message']?> ...
<a href="viewthread.php?tid=<?=$data['tid']?>&amp;from=indexheats_readmore">查看全文</a>
</dd><? } } ?></dl>
<? if($_DCACHE['heats']['subject']) { ?>
<ul class="s_clear"><? if(is_array($_DCACHE['heats']['subject'])) { foreach($_DCACHE['heats']['subject'] as $data) { ?><li><? if($adminid == 1) { ?><a class="deloption" href="misc.php?action=removeindexheats&amp;tid=<?=$data['tid']?>" onclick="return removeindexheats()">delete</a><? } ?><a href="viewthread.php?tid=<?=$data['tid']?>"><?=$data['subject']?></a></li><? } } ?></ul>
<? } ?>
</div>

<? if($_DCACHE['heats']['image']) { ?>
<div id="hot_img">
<a href="viewthread.php?tid=<?=$_DCACHE['heats']['image']['tid']?>&amp;from=indexheats_pic"><img src="<?=$_DCACHE['heats']['image']['thumb']?>" alt="<?=$_DCACHE['heats']['image']['subject']?>" /></a>
<h2><? if($adminid == 1) { ?><a class="deloption" href="misc.php?action=removeindexheats&amp;tid=<?=$_DCACHE['heats']['image']['tid']?>" onclick="return removeindexheats()">delete</a><? } ?><a href="viewthread.php?tid=<?=$_DCACHE['heats']['image']['tid']?>&amp;from=indexheats"><?=$_DCACHE['heats']['image']['subject']?></a></h2>
<p class="desc"><?=$_DCACHE['heats']['image']['message']?> ...<a href="viewthread.php?tid=<?=$_DCACHE['heats']['image']['tid']?>&amp;from=indexheats_readmore">查看全文</a></p>
<cite><a href="space.php?uid=<?=$_DCACHE['heats']['image']['authorid']?>&amp;from=indexheats"><?=$_DCACHE['heats']['image']['author']?></a> 发表于 <? echo dgmdate("$dateformat $timeformat", $_DCACHE['heats']['image']['dateline'] + $timeoffset * 3600); ?></cite>
</div>
<? } ?>
</div>
<? } } ?>

<?=$pluginhooks['index_hot']?>

<div class="itemtitle s_clear">
<p class="right forumcount">
今日: <em><?=$todayposts?></em>, 昨日: <em><?=$postdata['0']?></em>, 会员: <em><?=$totalmembers?></em>
</p><ul>
<li<? if($indexfile == 'classics') { ?> class="current"<? } ?>><a href="<?=$indexname?>?op=classics"><span>论坛版块</span></a></li>
<li<? if($indexfile == 'feeds' && !$type) { ?> class="current"<? } ?>><a href="<?=$indexname?>?op=feeds"><span>论坛动态</span></a></li>
<? if($my_status) { ?>
<li<? if($indexfile == 'feeds' && $type == 'manyou') { ?> class="current"<? } ?>><a href="<?=$indexname?>?op=feeds&type=manyou"><span>应用动态</span></a></li>
<? } ?>
<?=$pluginhooks['index_navbar']?>
</ul></div>

<?=$pluginhooks['index_top']?>

<div id="feed" class="feed">
<ul><? if(is_array($feeds)) { foreach($feeds as $value) { if($value['daterange']) { ?>
</ul><h3>
<? if($value['daterange'] == $day1) { ?>今天
<? } elseif($value['daterange'] == $day2) { ?>昨天
<? } elseif($value['daterange'] == $day3) { ?>前天
<? } else { ?><?=$value['daterange']?><? } ?>
</h3><ul>
<? } ?>
<li class="s_clear">
<div class="f_icon">
<img src="<? if(empty($type)) { ?><?=$value['icon']?><? } else { ?><?=$value['icon_image']?><? } ?>" class="apptype" />
<?=$value['title']?>
<? if($value['image']) { ?>
<div class="f_thumb"><? if(is_array($value['image'])) { foreach($value['image'] as $image) { ?><?=$image?><? } } ?></div>
<? } if($value['general']) { ?>
<fieldset><ins><?=$value['general']?></ins></fieldset>
<? } if($value['body']) { ?><div class="summary"><?=$value['body']?></div><? } ?>
</div>
</li><? } } ?></ul>
</div>

<? if(!empty($view)) { ?>
<div class="s_clear"><?=$multi?></div>
<? } else { ?>
<div class="pages s_clear">
<a class="next" href="<? if(empty($type)) { ?><?=$indexname?>?view=all&op=feeds<? } else { ?>userapp.php<? } ?>">查看所有</a>
</div>
<? } ?>

<?=$pluginhooks['index_bottom']?>
</div></div>

<? if($infosidestatus['allow'] == 2) { ?>
<div id="sidebar" class="side" style="<?=$collapse['sidebar']?>">
<? if(!empty($qihoo['status']) && ($qihoo['searchbox'] & 1)) { ?>
<div id="qihoosearch" class="sidebox">
<? if(!empty($qihoo['status']) && ($qihoo['searchbox'] & 1)) { ?>
<form method="post" action="search.php?srchtype=qihoo" onSubmit="this.target='_blank';">
<input type="hidden" name="searchsubmit" value="yes" />
<input type="text" class="txt" name="srchtxt" value="<?=$qihoo_searchboxtxt?>" size="20" />
<select name="stype">
<option value="" selected="selected">全文</option>
<option value="1">标题</option>
<option value="2">作者</option>
</select>
&nbsp;<button name="searchsubmit" type="submit" value="true">搜索</button>
</form>

<? if(!empty($qihoo['links']['keywords'])) { ?>
<strong>热门搜索</strong><? if(is_array($qihoo['links']['keywords'])) { foreach($qihoo['links']['keywords'] as $link) { ?><?=$link?>&nbsp;<? } } } if($customtopics) { ?>
<strong>用户专题</strong>&nbsp;&nbsp;<?=$customtopics?> [<a href="javascript:;" onclick="showWindow('customtopics', 'misc.php?action=customtopics')">编辑</a>]<br />
<? } if(!empty($qihoo['links']['topics'])) { ?>
<strong>论坛专题</strong>&nbsp;<? if(is_array($qihoo['links']['topics'])) { foreach($qihoo['links']['topics'] as $url) { ?><?=$url?> &nbsp;<? } } } } ?>
</div>
<? } if($infosidestatus['2']) { if(!empty($qihoo['status']) && ($qihoo['searchbox'] & 1)) { ?>
<hr class="shadowline"/>
<? } ?>
<div id="infoside">
<? if(empty($gid)) { request($infosidestatus, 0, 2); } else { request($infosidestatus, 1, 2); } ?>
</div>
<? } ?>
</div>
<? } ?>
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