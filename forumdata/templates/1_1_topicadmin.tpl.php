<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('topicadmin');?><? include template('header', '0', ''); if(empty($infloat)) { ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> <?=$navigation?></div>
<div id="wrap" class="wrap s_clear">
<div class="main"><div class="content nofloat">
<? } ?>

<div class="fcontent" id="floatlayout_topicadmin">
<h3 class="float_ctrl">
<em id="return_mods">选择了 <?=$modpostsnum?> 篇帖子</em>
<span>
<a href="javascript:;" class="float_close" onclick="hideWindow('mods')" title="关闭">关闭</a>
</span>
</h3>
<form id="moderateform" method="post" action="topicadmin.php?action=moderate&amp;optgroup=<?=$optgroup?>&amp;modsubmit=yes&amp;infloat=yes" onsubmit="ajaxpost('moderateform', 'return_mods', 'return_mods', 'onerror');return false;">
<input type="hidden" name="frommodcp" value="<?=$frommodcp?>" />
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="fid" value="<?=$fid?>" />
<input type="hidden" name="listextra" value="<?=$listextra?>" />
<? if(!empty($infloat)) { ?><input type="hidden" name="handlekey" value="<?=$handlekey?>" /><? } if(is_array($threadlist)) { foreach($threadlist as $thread) { ?><input type="hidden" name="moderate[]" value="<?=$thread['tid']?>" /><? } } ?><div class="postbox">
<? if($optgroup == 1) { ?>
<ul class="listtopicadmin">
<? if(count($threadlist) > 1 || !$defaultcheck['recommend']) { if($allowstickthread) { ?>
<li id="itemcp_stick">
<table cellspacing="0" cellpadding="5">
<tr>
<td width="15"><input name="operations[]" onclick="if(this.checked) switchitemcp('itemcp_stick')" type="checkbox" value="stick" <?=$defaultcheck['stick']?> /></td>
<td>
<label onclick="switchitemcp('itemcp_stick')" class="labeltxt">置顶</label>
<div class="detailopt">
<select name="sticklevel">
<option value="0">无</option>
<option value="1" <?=$stickcheck['1']?>><?=$threadsticky['2']?></option>
<? if($allowstickthread >= 2) { ?>
<option value="2" <?=$stickcheck['2']?>><?=$threadsticky['1']?></option>
<? if($allowstickthread == 3) { ?>
<option value="3" <?=$stickcheck['3']?>><?=$threadsticky['0']?></option>
<? } } ?>
</select>
</div>
</td>
</tr>
<tr class="detailopt">
<td></td>
<td>
<p class="hasdropdownbtn">
<label for="expirationstick" class="labeltxt">有效期</label>
<input onclick="showcalendar(event, this, true)" type="text" autocomplete="off" id="expirationstick" name="expirationstick" class="txt" value="<?=$expirationstick?>" tabindex="1" />
<a href="javascript:;" class="dropdownbtn" onclick="showselect(this, 'expirationstick')">^</a>
</p>
</td>
</tr>
</table>
</li>
<? } if($allowdigestthread) { ?>
<li id="itemcp_digest">
<table cellspacing="0" cellpadding="5">
<tr>
<td width="15"><input name="operations[]" onclick="if(this.checked) switchitemcp('itemcp_digest')" type="checkbox" value="digest" <?=$defaultcheck['digest']?> /></td>
<td>
<label onclick="switchitemcp('itemcp_digest')" class="labeltxt">精华</label>
<div class="detailopt">
<select name="digestlevel">
<option value="0">解除</option>
<option value="1" <?=$digestcheck['1']?>>精华 1</option>
<? if($allowdigestthread >= 2) { ?>
<option value="2" <?=$digestcheck['2']?>>精华 2</option>
<? if($allowdigestthread == 3) { ?>
<option value="3" <?=$digestcheck['3']?>>精华 3</option>
<? } } ?>
</select>
</div>
</td>
</tr>
<tr class="detailopt">
<td></td>
<td>
<p class="hasdropdownbtn">
<label for="expirationdigest" class="labeltxt">有效期</label>
<input onclick="showcalendar(event, this, true)" type="text" autocomplete="off" id="expirationdigest" name="expirationdigest" class="txt" value="<?=$expirationdigest?>" tabindex="1" />
<a href="javascript:;" class="dropdownbtn" onclick="showselect(this, 'expirationdigest')">^</a>
</p>
</td>
</tr>
</table>
</li>
<? } if($allowbumpthread) { ?>
<li>
<table cellspacing="0" cellpadding="5">
<tr>
<td width="15"><input name="operations[]" type="checkbox" value="bump" <?=$defaultcheck['bump']?> /></td>
<td><label for="">提升</label></td>
</tr>
</table>
</li>
<? } if($allowhighlightthread) { ?>
<li id="itemcp_highlight">
<table cellspacing="0" cellpadding="5">
<tr>
<td width="15"><input name="operations[]" onclick="if(this.checked) switchitemcp('itemcp_highlight')" type="checkbox" value="highlight" <?=$defaultcheck['highlight']?> /></td>
<td><? $colorarray = array(1=>'#EE1B2E', 2=>'#EE5023', 3=>'#996600', 4=>'#3C9D40', 5=>'#2897C5', 6=>'#2B65B7', 7=>'#8F2A90', 8=>'#EC1282'); ?><label onclick="switchitemcp('itemcp_highlight')" class="labeltxt">高亮</label>
<div class="detailopt">
<span class="hasdropdownbtn">
<input type="hidden" id="highlight_color" name="highlight_color" value="<?=$colorcheck?>" />
<input type="hidden" id="highlight_style_1" name="highlight_style[1]" value="<?=$stylecheck['1']?>" />
<input type="hidden" id="highlight_style_2" name="highlight_style[2]" value="<?=$stylecheck['2']?>" />
<input type="hidden" id="highlight_style_3" name="highlight_style[3]" value="<?=$stylecheck['3']?>" />
<input id="highlight_color_show" type="text" class="txt" readonly="readonly" <? if($colorcheck) { ?>style="background: <?=$colorarray[$colorcheck]?>" <? } ?>/>
<a href="javascript:;" id="highlight_color_ctrl" onclick="showHighLightColor('highlight_color')" class="dropdownbtn">^</a>
</span>
<a href="javascript:;" id="highlight_op_1" onclick="switchhl(this, 1)" class="detailopt_bold<? if($stylecheck['1']) { ?> current<? } ?>" style="text-indent:0;text-decoration:none;font-weight:700;" title="粗体">B</a>
<a href="javascript:;" id="highlight_op_2" onclick="switchhl(this, 2)" class="detailopt_italic<? if($stylecheck['2']) { ?> current<? } ?>" style="text-indent:0;text-decoration:none;font-style:italic;" title="斜体">I</a>
<a href="javascript:;" id="highlight_op_3" onclick="switchhl(this, 3)" class="detailopt_underline<? if($stylecheck['3']) { ?> current<? } ?>" style="text-indent:0;text-decoration:underline;" title="下划线">U</a>
</div>
</td>
</tr>
<tr class="detailopt">
<td></td>
<td>
<p class="hasdropdownbtn">
<label for="expirationhighlight" class="labeltxt">有效期</label>
<input onclick="showcalendar(event, this, true)" type="text" autocomplete="off" id="expirationhighlight" name="expirationhighlight" class="txt" value="<?=$expirationhighlight?>" tabindex="1" />
<a href="javascript:;" class="dropdownbtn" onclick="showselect(this, 'expirationhighlight')">^</a>
</p>
</td>
</tr>
</table>
</li>
<? } } if($allowrecommendthread && $forum['modrecommend']['open'] && $forum['modrecommend']['sort'] != 1) { ?>
<li id="itemcp_recommend">
<table cellspacing="0" cellpadding="5">
<tr>
<td width="15"><input name="operations[]" onclick="if(this.checked) switchitemcp('itemcp_recommend')" type="checkbox" value="recommend" <?=$defaultcheck['recommend']?> /></td>
<td>
<label onclick="switchitemcp('itemcp_recommend')"  class="labeltxt">推荐</label>
<div class="detailopt">
<label><input class="radio" type="radio" name="isrecommend" value="1" checked="checked" /> 推荐</label>
<label><input class="radio" type="radio" name="isrecommend" value="0" /> 解除</label>
</div>
</td>
</tr>
<tr class="detailopt">
<td></td>
<td>
<p class="hasdropdownbtn">
<label for="expirationrecommend" class="labeltxt">有效期</label>
<input onclick="showcalendar(event, this, true)" type="text" autocomplete="off" id="expirationrecommend" name="expirationrecommend" class="txt" value="<?=$expirationrecommend?>" tabindex="1" />
<a href="javascript:;" class="dropdownbtn" onclick="showselect(this, 'expirationrecommend')">^</a>
</p>
</td>
</tr>
<? if($defaultcheck['recommend'] && count($threadlist) == 1) { if($frommodcp == 2 && $show) { ?>
<input type="hidden" name="show" value="<?=$show?>" />
<? } ?>
<input type="hidden" name="position" value="1" />
<tr class="detailopt">
<td></td>
<td>
<label for="reducetitle" class="labeltxt">标题</label>
<input type="text" id="reducetitle" name="reducetitle" class="txt" style="width: 125px" value="<?=$thread['subject']?>" tabindex="2" />
</td>
</tr>
<? if($imgattach) { ?>
<tr class="detailopt">
<td></td>
<td>
<label class="labeltxt">图片</label>
<select name="selectattach" onchange="updateimginfo(this.value)" style="width: 125px">
<option value="">不显示</option><? if(is_array($imgattach)) { foreach($imgattach as $imginfo) { ?><option value="<?=$imginfo['aid']?>"<? if($selectattach == $imginfo['aid']) { ?> selected="selected"<? } ?>><?=$imginfo['filename']?></option><? } } ?></select>
</td>
</tr>
<tr class="detailopt">
<td></td>
<td>
<label class="labeltxt">&nbsp;</label>
<img id="selectimg" src="images/common/none.gif"  width="120" height="80" />
<script type="text/javascript" reload="1">
var imgk = new Array();<? if(is_array($imgattach)) { foreach($imgattach as $imginfo) { $k = $imginfo['aid'].'&size=120x80&key='.rawurlencode(authcode($imginfo['aid']."\t120\t80", 'ENCODE', $_DCACHE['settings']['authkey'])).'&nocache=yes'; ?>imgk[<?=$imginfo['aid']?>] = '<?=$k?>';<? } } ?>function updateimginfo(aid) {
if(aid) {
$('selectimg').src='image.php?aid=' + imgk[aid];
} else {
$('selectimg').src='images/common/none.gif';
}
}
<? if($selectattach) { ?>updateimginfo('<?=$selectattach?>');<? } ?>
</script>
</td>
</tr>
<? } } ?>
</table>
</li>
<? } ?>
</ul>
<? } elseif($optgroup == 2) { ?>
<div class="topicadminlow">
<? if($operation != 'type') { ?>
<input type="hidden" name="operations[]" value="move" />
<p class="tah_body tah_fixiesel">
目标版块: <select id="moveto" name="moveto" onchange="if(this.value) {$('moveext').style.display='';} else {$('moveext').style.display='none';}">
<?=$forumselect?>
</select>
</p>
<p class="tah_body">
<ul class="inlinelist" id="moveext" style="display:none;margin:5px 0;">
<li class="wide"><label><input class="radio" type="radio" name="type" value="normal" checked="checked" /> 移动主题</label></li>
<li class="wide"><label><input class="radio" type="radio" name="type" value="redirect" /> 保留转向</label></li>
</ul>
</p>
<? } else { if($typeselect) { ?>
<input type="hidden" name="operations[]" value="type" />
<p>分类: <?=$typeselect?></p>
<? } else { ?>
当前版块无分类设置，请联系管理员到后台设置主题分类<? $hiddensubmit = true; } } ?>
</div>
<? } elseif($optgroup == 3) { ?>
<div class="topicadminlow">
<ul class="inlinelist">
<? if($operation == 'delete') { if($allowdelpost) { ?>
<input name="operations[]" type="hidden" value="delete"/>
<p>您确认要 <strong>删除</strong> 选择的主题么?</p>
<? } else { ?>
<p>您没有删除此主题权限</p>
<? } } elseif($operation == 'down' || $operation='bump') { ?>
<li class="wide"><label><input class="radio" type="radio" name="operations[]" value="bump" checked="checked"/> 提升主题</label></li>
<li class="wide"><label><input class="radio" type="radio" name="operations[]" value="down" /> 下沉主题</label></li>
<? } ?>
</ul>
</div>
<? } elseif($optgroup == 4) { ?>
<table cellspacing="0" cellpadding="0">
<tr>
<td>有效期:&nbsp;</td>
<td>
<p class="hasdropdownbtn">
<input onclick="showcalendar(event, this, true)" type="text" autocomplete="off" id="expirationclose" name="expirationclose" class="txt" value="<?=$expirationclose?>" tabindex="1" />
<a href="javascript:;" class="dropdownbtn" onclick="showselect(this, 'expirationclose')">^</a>
</p>
</td>
</tr>
<tr>
<td colspan="2" style="padding: 5px 0;">
<ul class="inlinelist">
<li class="wide"><label><input class="radio" type="radio" name="operations[]" value="open" <?=$closecheck['0']?> />打开主题</label></li>
<li class="wide"><label><input class="radio" type="radio" name="operations[]" value="close" <?=$closecheck['1']?> />关闭主题</label></li>
</ul>
</td>
</tr>
</table>
<? } ?>
<div class="topicadminlog">
<? if(empty($hiddensubmit)) { ?>
<h4>
<span class="hasdropdownbtn right"><a onclick="showselect(this, 'reason', 'reasonselect')" class="dropdownbtn" href="javascript:;">^</a></span>
操作原因:
</h4>
<p>
<textarea id="reason" name="reason" class="txtarea" onkeyup="seditor_ctlent(event, '$(\'moderateform\').submit()')"></textarea>
</p>
<ul id="reasonselect" style="display: none"><? echo modreasonselect(); ?></ul>
<p>
<input name="modsubmit" type="submit" value="确定" />
<input type="checkbox" name="sendreasonpm" id="sendreasonpm" class="checkbox"<? if($reasonpm == 2 || $reasonpm == 3) { ?> checked="checked" disabled="disabled"<? } ?> /> <label for="sendreasonpm" />通知作者</label>
</p>
<? } ?>
</div>
</div>
</form>
</div>

<script src="<?=$jspath?>calendar.js?<?=VERHASH?>" type="text/javascript" reload="1"></script>

<script type="text/javascript" reload="1">
function submithandle_mods(locationhref) {
hideWindow('mods');
<? if(!empty($from)) { ?>
location.href = 'viewthread.php?tid=<?=$from?>&extra=<?=$listextra?>';
<? } else { ?>
location.href = locationhref;
<? } ?>
}
var lastsel = null;
function switchitemcp(id) {
if(lastsel) {
lastsel.className = '';
}
$(id).className = 'currentopt';
lastsel = $(id);
}
<? if(!empty($operation)) { ?>
if($('itemcp_<?=$operation?>')) {
switchitemcp('itemcp_<?=$operation?>');
}
<? } ?>
function switchhl(obj, v) {
if(parseInt($('highlight_style_' + v).value)) {
$('highlight_style_' + v).value = 0;
obj.className = obj.className.replace(/ current/, '');
} else {
$('highlight_style_' + v).value = 1;
obj.className += ' current';
}
}
function showHighLightColor(hlid) {
var showid = hlid + '_show';
if(!$(showid + '_menu')) {
var str = '';
var coloroptions = {'0' : '#000', '1' : '#EE1B2E', '2' : '#EE5023', '3' : '#996600', '4' : '#3C9D40', '5' : '#2897C5', '6' : '#2B65B7', '7' : '#8F2A90', '8' : '#EC1282'};
var menu = document.createElement('div');
menu.id = showid + '_menu';
menu.className = 'color_menu';
menu.style.display = 'none';
for(var i in coloroptions) {
str += '<a href="javascript:;" onclick="$(\'' + hlid + '\').value=' + i + ';$(\'' + showid + '\').style.backgroundColor=\'' + coloroptions[i] + '\';hideMenu(\'' + menu.id + '\')" style="background:' + coloroptions[i] + ';color:' + coloroptions[i] + ';">' + coloroptions[i] + '</a>';
}
menu.innerHTML = str;
$('append_parent').appendChild(menu);
}
showMenu({'ctrlid':hlid + '_ctrl','evt':'click','showid':showid});
}
</script>

<? if(empty($infloat)) { ?>
</div></div>
</div>
<? } include template('footer', '0', ''); ?>