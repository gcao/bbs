<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('magic');
0
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/magic.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/header.htm', 1316808273, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/magic.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/magic_index.htm', 1316808273, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/magic.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/magic_shop.htm', 1316808273, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/magic.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/magic_market.htm', 1316808273, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/magic.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/magic_mybox.htm', 1316808273, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/magic.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/magic_log.htm', 1316808273, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/magic.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/personal_navbar.htm', 1316808273, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/magic.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/footer.htm', 1316808273, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/magic.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/jsmenu.htm', 1316808273, '1', './templates/default')
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
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> &raquo; 道具中心</div>
<div id="wrap" class="wrap with_side s_clear">
<div class="main">
<div class="content">
<div class="itemtitle s_clear">
<h1>道具中心</h1>
<ul>
<li<? if(empty($action) || $action == 'index') { ?> class="current"<? } ?>><a href="magic.php" hidefocus="true"><span>首页</span></a></li>
<li<? if($action == 'shop') { ?> class="current"<? } ?>><a href="magic.php?action=shop" hidefocus="true"><span>道具商店</span></a></li>
<li <? if($discuz_uid) { ?>id="magic_market" onmouseover="showMenu({'ctrlid':this.id})"<? } if($action == 'market') { ?> class="current"<? } ?>><a href="magic.php?action=market" hidefocus="true" class="dropmenu"><span>二手市场</span></a></li>
<? if($discuz_uid) { ?>
<li class="pipe">|</li>
<li<? if($action == 'mybox') { ?> class="current"<? } ?>><a href="magic.php?action=mybox" hidefocus="true"><span>我的道具箱</span></a></li>
<li id="magic_log" onmouseover="showMenu({'ctrlid':this.id})"<? if($action == 'log') { ?> class="current"<? } ?>><a href="magic.php?action=log&amp;operation=uselog" hidefocus="true" class="dropmenu"><span>道具记录</span></a></li>
<? } ?>
</ul>
</div>
<? if(!$magicstatus && $adminid == 1) { ?>
<div class="channelinfo">道具系统已关闭，仅管理员可以正常使用</div>
<? } if($action == 'index') { ?><div class="datalist">
<div id="list_magics_shop_c" class="c_header">
<h3 class="noarrow">推荐道具</h3>
</div>
<div id="list_magics_shop" class="mymagic">
<ul class="inlinelist s_clear">
<? if($recommendmagiclist) { $i=0; if(is_array($recommendmagiclist)) { foreach($recommendmagiclist as $key => $magic) { ?><li>
<div class="magicimg"><img src="images/magics/<?=$magic['pic']?>" alt="<?=$magic['name']?>" /></div>
<div class="magicdetail">
<h5><?=$magic['name']?></h5>
<p><?=$magic['description']?></p>
<p>售价&nbsp;&nbsp;<strong><?=$magic['price']?><?=$extcredits[$creditstransextra['3']]['title']?>/个</strong>
<a href="magic.php?action=shop&amp;operation=buy&amp;magicid=<?=$magic['magicid']?>" onclick="showWindow('magics', this.href);return false;">购买</a>
<? if($allowmagics > 1) { ?>
<a href="magic.php?action=shop&amp;operation=give&amp;magicid=<?=$magic['magicid']?>" onclick="showWindow('magics', this.href);return false;">赠送</a>
<? } ?>
</p>
</div>
</li>
<? if($i%2) { ?><li class="clear"></li><? } $i++; } } if(!empty($mymultipage)) { ?><li class="clear"><div class="pages_btns"><?=$mymultipage?></div></li><? } } else { ?>
<li class="clear">暂无数据</li>
<? } ?>
</ul>
</div>
<div id="list_magics_shop_c" class="c_header">
<h3 class="noarrow">热销道具</h3>
</div>
<div id="list_magics_shop" class="mymagic">
<ul class="inlinelist s_clear">
<? if($hotmagiclist) { $i=0; if(is_array($hotmagiclist)) { foreach($hotmagiclist as $key => $magic) { ?><li>
<div class="magicimg"><img src="images/magics/<?=$magic['pic']?>" alt="<?=$magic['name']?>" /></div>
<div class="magicdetail">
<h5><?=$magic['name']?></h5>
<p><?=$magic['description']?></p>
<p>售价&nbsp;&nbsp;<strong><?=$magic['price']?><?=$extcredits[$creditstransextra['3']]['title']?>/个</strong>&nbsp;&nbsp;<a href="magic.php?action=shop&amp;operation=buy&amp;magicid=<?=$magic['magicid']?>" onclick="showWindow('magics', this.href);return false;">购买</a>
<? if($allowmagics > 1) { ?>
<a href="magic.php?action=shop&amp;operation=give&amp;magicid=<?=$magic['magicid']?>" onclick="showWindow('magics', this.href);return false;">赠送</a>
<? } ?>
</p>
</div>
</li>
<? if($i%2) { ?><li class="clear"></li><? } $i++; } } if(!empty($mymultipage)) { ?><li class="clear"><div class="pages_btns"><?=$mymultipage?></div></li><? } } else { ?>
<li class="clear">暂无数据</li>
<? } ?>
</ul>
</div>

</div><? } elseif($action == 'shop') { ?><div class="datalist">
<div id="list_magics_shop_c" class="c_header">
<h3 class="noarrow">道具商店</h3>
</div>
<div id="list_magics_shop" class="mymagic">
<? if($magicsdiscount) { if($magicsdiscount) { ?>
<p>折扣: <?=$magicsdiscount?> 折</p>
<? } } ?>
<ul class="inlinelist s_clear">
<? if($magiclist) { $i=0; if(is_array($magiclist)) { foreach($magiclist as $key => $magic) { ?><li>
<div class="magicimg"><img src="images/magics/<?=$magic['pic']?>" alt="<?=$magic['name']?>" /></div>
<div class="magicdetail">
<h5><?=$magic['name']?></h5>
<p><?=$magic['description']?></p>
<p>售价&nbsp;&nbsp;<strong><?=$magic['price']?><?=$extcredits[$creditstransextra['3']]['title']?>/个</strong>&nbsp;&nbsp;
<a href="magic.php?action=shop&amp;operation=buy&amp;magicid=<?=$magic['magicid']?>" onclick="showWindow('magics', this.href);return false;">购买</a>
<? if($allowmagics > 1) { ?>
<a href="magic.php?action=shop&amp;operation=give&amp;magicid=<?=$magic['magicid']?>" onclick="showWindow('magics', this.href);return false;">赠送</a>
<? } ?>
</p>
</div>
</li>
<? if($i%2) { ?><li class="clear"></li><? } $i++; } } if(!empty($mymultipage)) { ?><li class="clear"><div class="pages_btns"><?=$mymultipage?></div></li><? } } else { ?>
<li class="clear">暂无数据</li>
<? } ?>
</ul>
</div>
</div><? } elseif($action == 'market') { if($operation == 'buy' || $operation == 'down') { if(!empty($infloat)) { include template('header', '0', ''); } ?>
<div class="fcontent" id="fwin_magics">
<div id="floatlayout_topicadmin">
<h3 class="float_ctrl">
<em><? if($operation == 'buy') { ?>购买<? } elseif($operation == 'down') { ?>撤下<? } ?></em>
<span><? if(!empty($infloat)) { ?><a title="关闭" onclick="hideWindow('magics')" class="float_close" href="javascript:;">关闭</a><? } ?></span>
</h3>
<form method="post" action="magic.php?action=market">
<input type="hidden" name="formhash" value="<?=FORMHASH?>">
<input type="hidden" name="operation" value="<?=$operation?>" />
<input type="hidden" name="mid" value="<?=$mid?>" />
<div class="postbox">
<div class="mymagic fixed s_clear">
<div class="magicimg"><img src="images/magics/<?=$magic['pic']?>" alt="<?=$magic['name']?>"></div>
<div class="magicdetail">
<h5><?=$magic['name']?></h5>
<p><?=$magic['description']?></p>
<p>库存: <?=$magic['num']?>&nbsp;&nbsp;重量: <?=$magic['weight']?></p>
<p>售价: <span class="magicprice"><?=$magic['price']?></span> <?=$extcredits[$creditstransextra['3']]['title']?></p>
<? if($operation == 'buy') { ?>
<div class="magicnum">购买数量: <input name="magicnum" type="text" size="2" value="<?=$magic['num']?>" class="txt" /></div>
<button class="submit" type="submit" name="buysubmit" value="true">购买</button>
<? } elseif($operation == 'down') { ?>
<div class="magicnum">撤下数量: <input name="magicnum" type="text" size="2" value="<?=$magic['num']?>" class="txt" /></div>
<button class="submit" type="submit" name="downsubmit" value="true">撤下</button>
<? } ?>
</div>
</div>
</div>
</form>
</div>
</div>
<? if(!empty($infloat)) { include template('footer', '0', ''); } } else { ?>
<div id="list_magics_shop_c" class="c_header">
<h3 class="noarrow">
<? if(!$operation) { ?>
全部
<? } elseif($operation == 'my') { ?>
我出售的
<? } ?>
</h3>					
</div>
<? if(!$operation == 'my') { ?>
<div id="footfilter" class="filterform">
<form method="post" action="magic.php?action=market">
<input type="hidden" name="formhash" value="<?=FORMHASH?>">
<select name="magicid"><option value="">名称</option><?=$magicselect?></select>
<select name="orderby">
<option value="price" <?=$check['price']?>>售价</option>
<option value="num" <?=$check['num']?>>数量</option>
</select>
<select name="ascdesc">
<option value="">排序方式</option>
<option value="ASC" <?=$check['ASC']?>>按升序排列</option>
<option value="DESC" <?=$check['DESC']?>>按降序排列</option>
</select>&nbsp;
<button class="submit" type="submit" name="searchsubmit">排序</button>
</form>
</div>
<? } if(!$operation || $operation == 'my') { ?>
<div class="datalist">
<table summary="二手市场" cellspacing="0" cellpadding="0" class="datatable">
<thead class="colplural">
<tr>
<td>名称</td>
<td width="12%">售价 (<?=$extcredits[$creditstransextra['3']]['title']?>)</td>
<td width="6%">数量</td>
<td width="10%">单个重量</td>
<td width="15%">出售者</td>
<td width="10%">操作</td>
</tr>
</thead>
<? if($magiclist) { if(is_array($magiclist)) { foreach($magiclist as $magic) { ?><tr class="<? echo swapclass('colplural'); ?>">
<td><h4 title="<?=$magic['description']?>"><?=$magic['name']?></h4></td>
<td><?=$magic['price']?></td>
<td><?=$magic['num']?></td>
<td><?=$magic['weight']?></td>
<td><a href="space.php?uid=<?=$magic['uid']?>" target="_blank"><?=$magic['username']?></a></td>
<td>
<? if($magic['uid'] != $discuz_uid) { ?>
<a href="magic.php?action=market&amp;operation=buy&amp;mid=<?=$magic['mid']?>" onclick="showWindow('magics', this.href);return false;">购买</a>
<? } else { ?>
<a href="magic.php?action=market&amp;operation=down&amp;mid=<?=$magic['mid']?>" onclick="showWindow('magics', this.href);return false;">撤下</a>
<? } ?>
</td>
</tr><? } } } else { ?>
<tr><td colspan="7">没有道具出售</td></tr>
<? } ?>
</table>
<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } ?>
</div>
<? } } } elseif($action == 'mybox') { ?><div id="list_magics_mine_c" class="c_header">
<h3 class="noarrow">我的道具箱</h3>
</div>
<div id="list_magics_mine" class="mymagic">
<? if($magicsdiscount || $maxmagicsweight) { if($maxmagicsweight) { ?>
<p>道具负载量: <?=$totalweight?>/<?=$maxmagicsweight?>&nbsp;&nbsp;&nbsp;<a href="magic.php?action=log&amp;operation=uselog" class="lightlink">查看道具记录</a></p>
<? } } ?>
<ul class="inlinelist s_clear">
<? if($mymagiclist) { $i=0; if(is_array($mymagiclist)) { foreach($mymagiclist as $key => $mymagic) { ?><li>
<div class="magicimg"><img src="images/magics/<?=$mymagic['pic']?>" alt="<?=$mymagic['name']?>" /></div>
<div class="magicdetail">
<h5><?=$mymagic['name']?></h5>
<p><?=$mymagic['description']?></p>
<p>数量: <?=$mymagic['num']?>&nbsp;&nbsp;&nbsp;总重量: <?=$mymagic['weight']?></p>
<p>
<? if($mymagic['type'] > 2) { ?>
<a href="magic.php?action=mybox&amp;operation=use&amp;magicid=<?=$mymagic['magicid']?>" onclick="showWindow('magics', this.href, 'get', 0);return false;"><strong>使用</strong></a>&nbsp;|&nbsp;
<? } if($allowmagics > 1) { ?>
<a href="magic.php?action=mybox&amp;operation=give&amp;magicid=<?=$mymagic['magicid']?>" onclick="showWindow('magics', this.href, 'get', 0);return false;">赠送</a>&nbsp;|&nbsp;
<? } ?>
<a href="magic.php?action=mybox&amp;operation=drop&amp;magicid=<?=$mymagic['magicid']?>" onclick="showWindow('magics', this.href, 'get', 0);return false;">丢弃</a>&nbsp;|&nbsp;
<? if($magicmarket && $allowmagics > 1) { ?>
<a href="magic.php?action=mybox&amp;operation=sell&amp;magicid=<?=$mymagic['magicid']?>" onclick="showWindow('magics', this.href, 'get', 0);return false;">出售</a>&nbsp;
<? } ?>
</p>
</div>
</li>
<? if($i%2) { ?><li class="clear"></li><? } $i++; } } if(!empty($mymultipage)) { ?><li class="clear"><div class="pages_btns"><?=$mymultipage?></div></li><? } } else { ?>
<li class="clear">暂无数据</li>
<? } ?>
</ul>
</div><? } elseif($action == 'log') { ?><div class="datalist">
<div id="list_magics_shop_c" class="c_header">
<h3 class="noarrow">
<? if($operation == 'uselog') { ?>
使用记录
<? } elseif($operation == 'buylog') { ?>
购买记录
<? } elseif($operation == 'givelog') { ?>
赠送记录
<? } elseif($operation == 'receivelog') { ?>
获赠记录
<? } elseif($operation == 'marketlog') { ?>
市场记录
<? } ?>
</h3>					
</div>
<? if($operation == 'uselog') { ?>
<table summary="使用记录" cellspacing="0" cellpadding="0" class="datatable">
<? if($loglist) { ?>
<thead class="colplural">
<tr>
<td>名称</td>
<td width="20%">使用时间</td>
<td width="20%">使用对象</td>
</tr>
</thead><? if(is_array($loglist)) { foreach($loglist as $log) { ?><tr class="<? echo swapclass('colplural'); ?>">
<td><a href="magic.php?action=index&amp;operation=buy&amp;magicid=<?=$log['magicid']?>" target="_blank"><?=$log['name']?></a></td>
<td><?=$log['dateline']?></td>
<td><? if($log['target']) { ?><a href="<?=$log['target']?>" target="_blank">查看对象</a><? } else { ?>丢弃<? } ?></td>
</tr><? } } } else { ?>
<tr><td><p class="nodata">暂无数据</p></td></tr>
<? } ?>
</table>
<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } } elseif($operation == 'buylog') { ?>
<table summary="购买记录" cellspacing="0" cellpadding="0" class="datatable">
<? if($loglist) { ?>
<thead class="colplural">
<tr>
<td>名称</td>
<td width="20%">购买时间</td>
<td width="20%">购买数量</td>
<td width="20%">购买价格 (<?=$extcredits[$creditstransextra['3']]['title']?>)</td>
</tr>
</thead><? if(is_array($loglist)) { foreach($loglist as $log) { ?><tr class="<? echo swapclass('colplural'); ?>">
<td><a href="magic.php?action=index&amp;operation=buy&amp;magicid=<?=$log['magicid']?>" target="_blank"><?=$log['name']?></a></td>
<td><?=$log['dateline']?></td>
<td><?=$log['amount']?></td>
<td><?=$log['price']?></td>
</tr><? } } } else { ?>
<tr><td><p class="nodata">暂无数据</p></td></tr>
<? } ?>
</table>
<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } } elseif($operation == 'givelog') { ?>
<table summary="赠送记录" cellspacing="0" cellpadding="0" class="datatable">
<? if($loglist) { ?>
<thead class="colplural">
<tr>
<td>名称</td>
<td width="20%">赠送时间</td>
<td width="20%">赠送数量</td>
<td width="20%">赠送给</td>
</tr>
</thead><? if(is_array($loglist)) { foreach($loglist as $log) { ?><tr class="<? echo swapclass('colplural'); ?>">
<td><a href="magic.php?action=index&amp;operation=buy&amp;magicid=<?=$log['magicid']?>" target="_blank"><?=$log['name']?></a></td>
<td><?=$log['dateline']?></td>
<td><?=$log['amount']?></td>
<td><a href="space.php?uid=<?=$log['targetuid']?>" target="_blank"><?=$log['username']?></a></td>
</tr><? } } } else { ?>
<tr><td><p class="nodata">暂无数据</p></td></tr>
<? } ?>
</table>
<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } } elseif($operation == 'receivelog') { ?>
<table summary="获赠记录" cellspacing="0" cellpadding="0" class="datatable">
<? if($loglist) { ?>
<thead class="colplural">
<tr>
<td>名称</td>
<td width="20%">获赠时间</td>
<td width="20%">获赠数量</td>
<td width="20%">赠送人</td>
</tr>
</thead><? if(is_array($loglist)) { foreach($loglist as $log) { ?><tr class="<? echo swapclass('colplural'); ?>">
<td><a href="magic.php?action=index&amp;operation=buy&amp;magicid=<?=$log['magicid']?>" target="_blank"><?=$log['name']?></a></td>
<td><?=$log['dateline']?></td>
<td><?=$log['amount']?></td>
<td class="user"><a href="space.php?uid=<?=$log['targetuid']?>" target="_blank"><?=$log['username']?></a></td>
</tr><? } } } else { ?>
<tr><td><p class="nodata">暂无数据</p></td></tr>
<? } ?>
</table>
<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } } elseif($operation == 'marketlog') { ?>
<table summary="市场记录" cellspacing="0" cellpadding="0" class="datatable">
<? if($loglist) { ?>
<thead class="colplural">
<tr>
<td>名称</td>
<td width="20%">操作时间</td>
<td width="10%">操作数量</td>
<td width="15%">操作价格 (<?=$extcredits[$creditstransextra['3']]['title']?>)</td>
<td width="10%">操作</td>
</tr>
</thead><? if(is_array($loglist)) { foreach($loglist as $log) { ?><tr class="<? echo swapclass('colplural'); ?>">
<td><a href="magic.php?action=index&amp;operation=buy&amp;magicid=<?=$log['magicid']?>" target="_blank"><?=$log['name']?></a></td>
<td><?=$log['dateline']?></td>
<td><?=$log['amount']?></td>
<td><?=$log['price']?></td>
<td><? if($log['action'] == '4') { ?>出售<? } elseif($log['action'] =='5') { ?>购买<? } elseif($log['action'] == '6') { ?>撤下<? } ?></td>
</tr><? } } } else { ?>
<tr><td><p class="nodata">暂无数据</p></td></tr>
<? } ?>
</table>
<? if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } } ?>
</div><? } if($discuz_uid) { ?>
<ul class="popupmenu_popup titlemenu_popup" id="magic_market_menu" style="display: none">
<li<? if(!$operation) { ?> class="current"<? } ?>><a href="magic.php?action=market"><span>全部</span></a></li>
<li<? if($operation == 'my') { ?> class="current"<? } ?>><a href="magic.php?action=market&amp;operation=my"><span>我出售的</span></a></li>
</ul>
<ul class="popupmenu_popup titlemenu_popup" id="magic_log_menu" style="display: none">
<li<? if($operation == 'uselog') { ?> class="current"<? } ?>><a href="magic.php?action=log&amp;operation=uselog"><span>使用记录</span></a></li>
<li<? if($operation == 'buylog') { ?> class="current"<? } ?>><a href="magic.php?action=log&amp;operation=buylog"><span>购买记录</span></a></li>
<li<? if($operation == 'givelog') { ?> class="current"<? } ?>><a href="magic.php?action=log&amp;operation=givelog"><span>赠送记录</span></a></li>
<li<? if($operation == 'receivelog') { ?> class="current"<? } ?>><a href="magic.php?action=log&amp;operation=receivelog"><span>获赠记录</span></a></li>
<? if($magicmarket) { ?>
<li<? if($operation == 'marketlog') { ?> class="current"<? } ?>><a href="magic.php?action=log&amp;operation=marketlog"><span>市场记录</span></a></li>
<? } ?>
</ul>
<? } ?>

</div>
</div>
<div class="side"><h2>个人中心</h2>
<div class="sideinner">
<ul class="tabs">
<? if($regverify == 1 && $groupid == 8) { ?>
<li<? if(CURSCRIPT=='memcp' && $action == 'emailverify') { ?> class="current"<? } ?>><a href="member.php?action=emailverify">重新验证 Email</a></li>
<? } if($regverify == 2 && $groupid == 8) { ?>
<li<? if(CURSCRIPT=='memcp' && $action == 'validating') { ?> class="current"<? } ?>><a href="memcp.php?action=validating">账户审核</a></li>
<li<? if(CURSCRIPT=='memcp' && $action == 'profile' && $typeid == '2') { ?> class="current"<? } ?>><a href="memcp.php?action=profile&amp;typeid=2">个人资料</a></li>
<? } else { ?>
<li<? if(CURSCRIPT=='memcp' && $action == 'profile' && $typeid == '3') { ?> class="current"<? } ?>><a href="memcp.php?action=profile&amp;typeid=3" id="uploadavatar" prompt="uploadavatar">修改头像</a></li>
<li<? if(CURSCRIPT=='memcp' && $action == 'profile' && $typeid == '2') { ?> class="current"<? } ?>><a href="memcp.php?action=profile&amp;typeid=2">个人资料</a></li>
<li<? if(CURSCRIPT=='pm') { ?> class="current"<? } ?>><a href="pm.php">短消息</a></li>
<li<? if(CURSCRIPT=='notice') { ?> class="current"<? } ?>><a href="notice.php">提醒</a></li>
<li<? if(CURSCRIPT=='my' && $item == 'buddylist') { ?> class="current"<? } ?>><a href="my.php?item=buddylist&amp;<?=$extrafid?>">我的好友</a></li>
<? if($regstatus > 1) { ?><li><a href="invite.php">邀请注册</a></li><? } if($ucappopen['UCHOME']) { ?>
<li><a href="<?=$uchomeurl?>/space.php?uid=<?=$discuz_uid?>" target="_blank">我的空间</a></li>
<? } elseif($ucappopen['XSPACE']) { ?>
<li><a href="<?=$xspaceurl?>/?uid-<?=$discuz_uid?>" target="_blank">我的空间</a></li>
<? } } ?>
</ul>
</div>

<? if($groupid != 8) { ?>
<hr class="shadowline" />

<div class="sideinner">
<ul class="tabs">
<li<? if(CURSCRIPT=='my' && in_array($item, array('threads', 'posts', 'polls', 'reward', 'activities', 'debate', 'buytrades', 'tradethreads', 'selltrades', 'tradestats'))) { ?> class="current"<? } ?>><a href="my.php?item=threads<?=$extrafid?>">我的帖子</a></li>
<li<? if(CURSCRIPT=='my' && $item == 'favorites') { ?> class="current"<? } ?>><a href="my.php?item=favorites&amp;type=thread<?=$extrafid?>">我的收藏</a></li>
<li<? if(CURSCRIPT=='my' && $item == 'attention') { ?> class="current"<? } ?>><a href="my.php?item=attention&amp;type=thread<?=$extrafid?>">我的关注</a></li>
<? if(!empty($plugins['plinks_my'])) { if(is_array($plugins['plinks_my'])) { foreach($plugins['plinks_my'] as $module) { if(!$module['adminid'] || ($module['adminid'] && $adminid > 0 && $module['adminid'] >= $adminid)) { ?><li<? if(CURSCRIPT == 'plugin' && $_GET['id'] == $module['id']) { ?> class="current"<? } ?>><?=$module['url']?></li><? } } } } ?>
</ul>
</div>

<hr class="shadowline" />

<div class="sideinner">
<ul class="tabs">
<li<? if(CURSCRIPT=='memcp' && $action == 'credits') { ?> class="current"<? } ?>><a href="memcp.php?action=credits">积分</a></li>
<li<? if(CURSCRIPT=='memcp' && $action == 'usergroups') { ?> class="current"<? } ?>><a href="memcp.php?action=usergroups">用户组</a></li>
<li<? if(CURSCRIPT=='task') { ?> class="current"<? } ?>><a href="task.php">论坛任务</a></li>
<? if($medalstatus) { ?><li<? if(CURSCRIPT=='medal') { ?> class="current"<? } ?>><a href="medal.php">勋章</a></li><? } if($magicstatus) { ?><li<? if(CURSCRIPT=='magic') { ?> class="current"<? } ?>><a href="magic.php">道具</a></li><? } if(!empty($plugins['plinks_tools'])) { if(is_array($plugins['plinks_tools'])) { foreach($plugins['plinks_tools'] as $module) { if(!$module['adminid'] || ($module['adminid'] && $adminid > 0 && $module['adminid'] >= $adminid)) { ?><li<? if(CURSCRIPT == 'plugin' && $_GET['id'] == $module['id']) { ?> class="current"<? } ?>><?=$module['url']?></li><? } } } } ?>
</ul>
</div>
<? } ?>

<hr class="shadowline" />

<div class="sideinner">
<ul class="tabs">
<li<? if(CURSCRIPT=='memcp' && $action == 'profile' && $typeid == '5') { ?> class="current"<? } ?>><a href="memcp.php?action=profile&amp;typeid=5">论坛个性化设定</a></li>
<li<? if(CURSCRIPT=='memcp' && $action == 'profile' && $typeid == '1') { ?> class="current"<? } ?>><a href="memcp.php?action=profile&amp;typeid=1">密码和安全问题</a></li>
</ul>
</div>

<hr class="shadowline" />

<div class="sideinner">
<ul class="tabs">
<li>积分: <?=$credits?></li><? if(is_array($extcredits)) { foreach($extcredits as $id => $credit) { ?><li><?=$credit['title']?>: <?=$GLOBALS['extcredits'.$id]?> <?=$credit['unit']?></li><? } } ?></ul>
</div>
<?=$pluginhooks['memcp_side']?></div>
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