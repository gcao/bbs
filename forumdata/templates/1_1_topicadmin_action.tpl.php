<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('topicadmin_action');?><? include template('header', '0', ''); if(empty($infloat)) { ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> <?=$navigation?></div>
<div id="wrap" class="wrap s_clear">
<div class="main"><div class="content nofloat">
<? } ?>

<div class="fcontent" id="floatlayout_topicadmin">
<h3 class="float_ctrl">
<em id="return_mods"><? if(in_array($action, array('delpost', 'banpost', 'warn'))) { ?>选择了 <?=$modpostsnum?> 篇帖子<? } else { ?>选择了 1 篇主题<? } ?></em>
<span>
<a href="javascript:;" class="float_close" onclick="<? if($action == 'stamp') { ?>if ($('threadstamp')) $('threadstamp').innerHTML = oldthreadstamp;<? } ?>hideWindow('mods')" title="关闭">关闭</a>
</span>
</h3>
<form id="topicadminform" method="post" action="topicadmin.php?action=<?=$action?>&amp;modsubmit=yes&amp;infloat=yes&amp;modclick=yes" onsubmit="ajaxpost('topicadminform', 'return_mods', 'return_mods', 'onerror');return false;">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="fid" value="<?=$fid?>">
<input type="hidden" name="tid" value="<?=$tid?>">
<div class="postbox">
<div class="<? if($action != 'split') { ?>topicadminlow<? } else { ?>topicadminhigh<? } ?>">
<? if($action == 'delpost') { ?>
<?=$deleteid?>
删除选定帖子
<? } elseif($action == 'copy') { ?>
<p>目标版块:</p>
<p class="tah_body">
<select name="copyto"><?=$forumselect?></select>
</p>
<? } elseif($action == 'banpost') { ?>
<?=$banid?>
<ul class="inlinelist">
<li><label><input type="radio" class="radio" name="banned" value="1" <?=$checkban?> /> 屏蔽</label></li>
<li><label><input type="radio" class="radio" name="banned" value="0" <?=$checkunban?> /> 解除</li>
</ul>
<script type="text/javascript" reload="1">
function submithandle_mods(locationhref) {<? if(is_array($topiclist)) { foreach($topiclist as $pid) { ?>ajaxget('viewthread.php?tid=<?=$tid?>&viewpid=<?=$pid?>&modclick=yes', 'post_<?=$pid?>', 'post_<?=$pid?>');<? } } ?>hideWindow('mods');
}
</script>
<? } elseif($action == 'warn') { ?>
<?=$warnpid?>
<ul class="inlinelist">
<li><input type="radio" class="radio" name="warned" value="1" <?=$checkwarn?> /> 警告</li>
<li><input type="radio" class="radio" name="warned" value="0" <?=$checkunwarn?> /> 解除</li>
</ul>
<? if(($modpostsnum == 1 || $authorcount == 1) && $authorwarnings > 0) { ?>
<br /><div style="clear: both; text-align: right;" title="<?=$warningexpiration?> 天内累计被警告 <?=$warninglimit?> 次，将被自动禁止发帖 <?=$warningexpiration?> 天">用户 <?=$warningauthor?> 已被警告 <?=$authorwarnings?> 次</div>
<? } ?>
<script type="text/javascript" reload="1">
function submithandle_mods(locationhref) {<? if(is_array($topiclist)) { foreach($topiclist as $pid) { ?>ajaxget('viewthread.php?tid=<?=$tid?>&viewpid=<?=$pid?>&modclick=yes', 'post_<?=$pid?>', 'post_<?=$pid?>');<? } } ?>hideWindow('mods');
}
</script>
<? } elseif($action == 'merge') { ?>
<table cellspacing="0" cellpadding="0">
<tr>
<td><label for="othertid">合并 &rarr;</label></td>
<td>填写目标主题 ID (tid)</td>
</tr>
<tr>
<td></td>
<td><input type="text" id="othertid" name="othertid" size="10" /></td>
</tr>
</table>
<? } elseif($action == 'refund') { ?>
<table cellspacing="0" cellpadding="0">
<tr>
<th>已购买人数</th>
<td><?=$payment['payers']?></td>
</tr>

<tr>
<th>作者所得</th>
<td><?=$extcredits[$creditstransextra['1']]['title']?> <?=$payment['netincome']?> <?=$extcredits[$creditstransextra['1']]['unit']?></td>
</tr>
</table>
<? } elseif($action == 'split') { ?>
<table cellspacing="0" cellpadding="0">
<tr>
<td><label for="subject">新标题</label></td>
</tr>
<tr>
<td><input type="text" name="subject" id="subject" size="20" class="txt" /></td>
</tr>
<tr>
<td><label for="split">分割 &rarr;填写楼号 (用 "," 间隔)</label></td>
</tr>
<tr>
<td><textarea name="split" id="split" class="txtarea" style="width: 212px; height:120px" /></textarea></td>
</tr>
</table>
<? } elseif($action == 'stamp') { ?>
<p>选择图章:</p>
<p class="tah_body">
<select name="stamp" id="stamp" onchange="updatestampimg()">
<option value="">撤销图章</option><? if(is_array($_DCACHE['stamps'])) { foreach($_DCACHE['stamps'] as $stampid => $stamp) { ?><option value="<?=$stampid?>"><?=$stamp['text']?></option><? } } ?></select>
</p>
<script type="text/javascript" reload="1">
if($('threadstamp')) {
var oldthreadstamp = $('threadstamp').innerHTML;
}
var stampurls = new Array();<? if(is_array($_DCACHE['stamps'])) { foreach($_DCACHE['stamps'] as $stampid => $stamp) { ?>stampurls[<?=$stampid?>] = '<?=$stamp['url']?>';<? } } ?>function updatestampimg() {
if($('threadstamp')) {
$('threadstamp').innerHTML = $('stamp').value ? '<img src="images/stamps/' + stampurls[$('stamp').value] + '">' : '<img src="images/common/none.gif">';
}
}
</script>
<? } ?>
</div>

<div class="topicadminlog">
<h4>
<span class="hasdropdownbtn right"><a onclick="showselect(this, 'reason', 'reasonselect')" class="dropdownbtn" href="javascript:;">^</a></span>
操作说明:
</h4>
<p><textarea id="reason" name="reason" class="txtarea" onkeyup="seditor_ctlent(event, '$(\'topicadminform\').submit()')"></textarea></p>
<ul id="reasonselect" style="display: none"><? echo modreasonselect(); ?></ul>
<p>
<input name="modsubmit" type="submit" value="确定" />
<input type="checkbox" name="sendreasonpm" id="sendreasonpm" class="checkbox"<? if($reasonpm == 2 || $reasonpm == 3) { ?> checked="checked" disabled="disabled"<? } ?> /> <label for="sendreasonpm" />通知作者</label>
</p>
</div>
</div>
</form>
</div>

<? if(empty($infloat)) { ?>
</div></div>
</div>
<? } include template('footer', '0', ''); ?>