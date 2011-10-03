<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div class="itemtitle s_clear">
<ul>
<li class="current"><a href="#" onclick="display('list_adminnote');" hidefocus="true"><span>添加留言</span></a></li>
</ul>
</div>
<form method="post" action="<?=$cpscript?>?action=<?=$action?>" id="list_adminnote" style="margin-bottom:30px; <? if($notelist) { ?>display:none<? } else { ?>display:block<? } ?>">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="op" value="addnote" />
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td rowspan="2" width="75%"><textarea style="width: 95%; height: 120px;" name="newmessage" rows="5" class="txtarea"></textarea></td>
<td width="25%">
<ul>
<li>留言给:</li>
<li><label><input type="checkbox" value="1" name="newaccess[1]" checked="checked" disabled="disabled" /> 论坛管理员</label></li>
<li><label><input type="checkbox" value="1" name="newaccess[2]" checked="checked" /> 超级版主</label></li>
<li><label><input type="checkbox" value="1" name="newaccess[3]" checked="checked" /> 版主</label></li>
</ul>
</td>
</tr>
<tr>
<td>
<p>有效期:
<input type="text" id="newexpiration" name="newexpiration" autocomplete="off" value="30" class="txt" tabindex="1" size="2" /> 天
</p>
</td>
</tr>
<tr>
<td colspan="2"><button type="submit" class="submit" name="submit" value="true">提交</button></td>
</tr>
</table>
</form>
<div class="datalist">
<? if($notelist) { ?>
<form method="post" action="<?=$cpscript?>?action=<?=$action?>" name="notelist" id="notelist">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="op" value="delete" />
<input type="hidden" name="notlistsubmit" value="yes" />
<table cellspacing="0" cellpadding="0" class="datatable"><? if(is_array($notelist)) { foreach($notelist as $note) { ?><tr>
<td>
<b><?=$note['admin']?></b> <span class="lighttxt"><?=$note['dateline']?>&nbsp;&nbsp;(有效期: <?=$note['expiration']?> 天)</span><br />
<?=$note['message']?>
</td>
<td width="20" valign="top">
<?=$note['checkbox']?>
</td>
</tr><? } } ?></table>
<div class="right">
<input class="checkbox" type="checkbox" onclick="checkall($('notelist'), 'delete', 'ncheck')" name="ncheck"> <label for="chkall">全选</label> <span class="lightlink">|</span> <a href="javascript:;" class="lightlink" onclick="$('notelist').submit();">删除选定留言</a>
</div>
</form>
<? } else { ?>
<p>当前没有人留言</p>
<? } ?>
</div>