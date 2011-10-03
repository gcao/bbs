<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<script type="text/javascript">
modclickcount = 0;
function recountobj() {
modclickcount = 0;
var objform = $('moderate');
for(var i = 0; i < objform.elements.length; i++) {
if(objform.elements[i].name.match('moderate') && objform.elements[i].checked) {
modclickcount++;
}
}
$('modlayercount').innerHTML = modclickcount;
}
function modcheckall() {
var count = 0;
count = checkall($('moderate'), 'moderate', 'chkall');
$('modlayercount').innerHTML = count;
}
function toggle_post(id) {
var obj = $('list_note_' + id); 
obj.style.display='block'; 
obj.style.height = obj.style.height == '55px' ? 'auto' : '55px' ;
}
 function modthreads(operation) {
var checked = 0;
var operation = !operation ? '' : operation;
var objform = $('moderate');
for(var i = 0; i < objform.elements.length; i++) {
if(objform.elements[i].name.match('moderate') && objform.elements[i].checked) {
checked = 1;
break;
}
}
if(!checked) {
alert('请先选择操作对象！');
} else {
$('moderate').mod.value = operation;
$('moderate').infloat.value = 'yes';
showWindow('mods', 'moderate', 'post');
}
}
</script>

<div class="itemtitle s_clear">
<h1>审核</h1>
<ul>
<? if($allowmodpost) { ?>
<li <? if($op == 'threads') { ?> class="current" <? } ?>><a href="<?=$cpscript?>?action=moderate&op=threads<?=$forcefid?>" hidefocus="true"><span>主题</span></a></li>
<li <? if($op == 'replies') { ?> class="current" <? } ?>><a href="<?=$cpscript?>?action=moderate&op=replies<?=$forcefid?>" hidefocus="true"><span>回复</span></a></li>
<? } if($allowmoduser) { ?>
<li <? if($op == 'members') { ?> class="current" <? } ?>><a href="<?=$cpscript?>?action=moderate&op=members" hidefocus="true"><span>用户</span></a></li>
<? } ?>
</ul>
</div>

<? if($op == 'threads' || $op == 'replies') { ?>
<div class="datalist">
<form method="post" action="<?=$cpscript?>?action=<?=$action?>&op=<?=$op?>">
<input type="hidden" name="formhash" value="<?=FORMHASH?>">
<div class="filterform">
<? if($modforums['fids']) { ?>
<table cellspacing="0" cellpadding="0">
<tr>
<th width="60">版块选择: </th>
<td>
<select name="fid">
<option value="0">全部</option><? if(is_array($modforums['list'])) { foreach($modforums['list'] as $id => $name) { ?><option value="<?=$id?>" <? if($id == $fid) { ?>selected<? } ?>><?=$name?></option><? } } ?></select>
</td>
</tr>
<tr>
<th>帖子范围: </th>
<td>
<select name="filter">
<option value="0" <?=$filtercheck['0']?>><? if($op == 'replies') { ?>未审核回复<? } else { ?>未审核主题<? } ?></option>
<option value="-3" <?=$filtercheck['-3']?>><? if($op == 'replies') { ?>已忽略回复<? } else { ?>已忽略主题<? } ?></option>
</select>
</td>
</tr>
<tr>
<th></th>
<td><button type="submit" class="submit" name="submit" id="searchsubmit" value="true">提交</button></td>
</tr>
</table>
<? } else { ?>
<p>您没有管理任何版块的权限，无法执行此操作</p>
<? } ?>
</div>
</form>
</div>

<? if($updatestat) { ?><div class="notice">审核结果: <?=$modpost['validate']?> 篇帖子审核通过，<?=$modpost['delete']?> 篇帖子删除，<?=$modpost['ignore']?> 篇帖子进入忽略列表等待审核</div><? } if($postlist) { ?>
<form method="post" name="moderate" id="moderate" action="<?=$cpscript?>?action=<?=$action?>&op=<?=$op?>" class="s_clear">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="fid" value="<?=$fid?>" />
<input type="hidden" name="mod" value="" />
<input type="hidden" name="infloat" value="" />
<input type="hidden" name="dosubmit" value="yes" />
<input type="hidden" name="filter" value="<?=$filter?>" /><? if(is_array($postlist)) { foreach($postlist as $post) { ?><table id="pid_<?=$post['id']?>" cellpadding="3" cellspacing="0" style="margin:9px 0;width:100%;" class="<? echo swapclass('notelistbg');; ?>">
<thead>
<td width="5%"><input type="checkbox" id="pidcheck_<?=$post['id']?>" value="<?=$post['id']?>" name="moderate[]" class="checkbox" onclick="recountobj()" style="margin: 0 8px;" /></td>
<td>
<h5><a href="forumdisplay.php?fid=<?=$post['fid']?>" target="_blank"><?=$modforums['list'][$post['fid']]?></a> &raquo; <?=$post['tsubject']?><? if($post['subject']) { ?>&raquo; <?=$post['subject']?><? } ?></h5>
</td>
<td valign="top" align="right" width="35%">
<a href="modcp.php?action=<?=$action?>&amp;op=<?=$op?>&amp;moderate[]=<?=$post['id']?>&amp;mod=validate&amp;filter=<?=$filter?>&amp;dosubmit=1" onclick="showWindow('mods', this.href);return false;" class="lightlink">通过</a>&nbsp;&nbsp;-&nbsp;&nbsp;
<a href="modcp.php?action=<?=$action?>&amp;op=<?=$op?>&amp;moderate[]=<?=$post['id']?>&amp;mod=delete&amp;filter=<?=$filter?>&amp;dosubmit=1" onclick="showWindow('mods', this.href);return false;" class="lightlink">删除</a>&nbsp;&nbsp;-&nbsp;&nbsp;
<a href="modcp.php?action=<?=$action?>&amp;op=<?=$op?>&amp;moderate[]=<?=$post['id']?>&amp;mod=ignore&amp;filter=<?=$filter?>&amp;dosubmit=1" onclick="showWindow('mods', this.href);return false;" class="lightlink">忽略</a>&nbsp;&nbsp;-&nbsp;&nbsp;
<a href="javascript:;" class="lightlink" onclick="toggle_post(<?=$post['id']?>);">展开</a>
</td>
</thead>
<tr>
<td></td>
<td colspan="2" class="lighttxt"><?=$post['author']?> 发表于 <?=$post['dateline']?></td>
</tr>
<tr>
<td></td>
<td colspan="2">
<div id="list_note_<?=$post['id']?>" style="overflow: auto; overflow-x: hidden; height:55px; word-break: break-all;">
<?=$post['message']?> <?=$post['attach']?> <?=$post['sortinfo']?>
</div>
</td>
</tr>
</table><? } } if(!empty($multipage)) { ?><div class="pages_btns"><?=$multipage?></div><? } ?>
<table cellpadding="3" cellspacing="0" style="width:100%;">
<tr>
<td width="5%">
<input type="checkbox" class="checkbox" style="margin: 0 8px;" name="chkall" onclick="modcheckall()" />
</td>
<td>
<button onclick="modthreads('validate'); return false;">通过</button> 
<button onclick="modthreads('delete'); return false;">删除</button> 
<button onclick="modthreads('ignore'); return false;">忽略</button> 
当前已选定 <span id="modlayercount">0</span> 个
</td>
</tr>
</table>
</form>
<? } elseif($fid) { ?>
<p>对不起，没有找到匹配结果。</p>
<? } } if($op == 'members') { ?>
<div class="datalist">
<form method="post" action="<?=$cpscript?>?action=<?=$action?>&op=<?=$op?>">
<input type="hidden" name="formhash" value="<?=FORMHASH?>">
<div class="filterform">
<table cellspacing="0" cellpadding="0">
<tr>
<th width="60">用户范围</th>
<td>
<select name="filter">
<option value="0" <?=$filtercheck['0']?>>待审核的用户 ( <?=$count['0']?> )</option>
<option value="1" <?=$filtercheck['1']?>>已否决的用户 ( <?=$count['1']?> )</option>
</select>
</td>
</tr>
<tr>
<th></th>
<td><button type="submit" class="submit" name="submit" id="searchsubmit" value="true">提交</button></td>
</tr>
</table>
</div>
</form>
<? if($memberlist) { ?>
<form method="post" name="moderate" id="moderate" action="<?=$cpscript?>?action=<?=$action?>&op=<?=$op?>">
<input type="hidden" name="mod" value="" />
<input type="hidden" name="infloat" value="" />
<input type="hidden" name="dosubmit" value="yes" />
<input type="hidden" name="filter" value="<?=$filter?>" />
<table cellspacing="0" cellpadding="0" class="datatable" style="border-bottom:none">
<thead class="colplural">
<tr>
<th width="20"></th>
<th width="25%">个人资料</th>
<th>注册原因</th>
<th width="27%">审核信息</th>
</tr>
</thead><? if(is_array($memberlist)) { foreach($memberlist as $member) { ?><tr id="pid_<?=$member['uid']?>" class="<? echo swapclass('colplural'); ?>">
<td><input type="checkbox" id="pidcheck_<?=$member['uid']?>" value="<?=$member['uid']?>" name="moderate[]" class="checkbox" onclick="recountobj()" /></td>
<td valign="top">
<h5><?=$member['username']?></h5>
<p>注册时间: <?=$member['regdate']?></p>
<p>注册 IP: <?=$member['regip']?></p>
<p>Email: <?=$member['email']?></p>
<p style="margin-top:5px;">
<a href="modcp.php?action=<?=$action?>&amp;op=<?=$op?>&amp;moderate[]=<?=$member['uid']?>&amp;mod=validate&amp;filter=<?=$filter?>&amp;dosubmit=1" onclick="showWindow('mods', this.href);return false;" class="lightlink">通过</a>&nbsp;&nbsp;-&nbsp;&nbsp;
<a href="modcp.php?action=<?=$action?>&amp;op=<?=$op?>&amp;moderate[]=<?=$member['uid']?>&amp;mod=delete&amp;filter=<?=$filter?>&amp;dosubmit=1" onclick="showWindow('mods', this.href);return false;" class="lightlink">删除</a>&nbsp;&nbsp;-&nbsp;&nbsp;
<a href="modcp.php?action=<?=$action?>&amp;op=<?=$op?>&amp;moderate[]=<?=$member['uid']?>&amp;mod=invalidate&amp;filter=<?=$filter?>&amp;dosubmit=1" onclick="showWindow('mods', this.href);return false;" class="lightlink">否决</a>
</p>
</td>
<td valign="top"><?=$member['message']?></td>
<td valign="top">
<p>提交次数: <?=$member['submittimes']?></p>
<p>上次提交: <?=$member['submitdate']?></p>
<p>上次审核者: <?=$member['admin']?></p>
<p>上次审核时间: <?=$member['moddate']?></p>
</td>
</tr><? } } ?><tr class="noborder">
<td><input type="checkbox" class="checkbox" name="chkall" onclick="modcheckall()"/></td>
<td colspan="3">
<? if(!empty($multipage)) { ?><?=$multipage?><? } ?>
<button onclick="modthreads('validate'); return false;">通过</button> 
<button onclick="modthreads('delete'); return false;">删除</button> 
<button onclick="modthreads('invalidate'); return false;">否决</button> 
当前已选定 <span id="modlayercount">0</span> 个
</td>
</tr>
</table>
</form>
<? } else { ?>
<p>对不起，没有找到匹配结果。</p>
<? } ?>
</div>
<? } ?>