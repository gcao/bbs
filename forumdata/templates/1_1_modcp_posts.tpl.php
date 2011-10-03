<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div class="itemtitle s_clear">
<h1>主题管理</h1>
<ul>
<li <? if($action == 'threads' && $op == 'threads') { ?> class="current" <? } ?>><a href="<?=$cpscript?>?action=threads&op=threads<?=$forcefid?>" hidefocus="true"><span>版块主题</span></a></li>
<li <? if($action == 'threads' && $op == 'posts') { ?> class="current" <? } ?>><a href="<?=$cpscript?>?action=threads&op=posts<?=$forcefid?>" hidefocus="true"><span>帖子管理</span></a></li>
<li <? if($action == 'recyclebins') { ?> class="current" <? } ?>><a href="<?=$cpscript?>?action=recyclebins<?=$forcefid?>" hidefocus="true"><span>主题回收站</span></a></li>
</ul>
</div>
<script src="<?=$jspath?>calendar.js?<?=VERHASH?>" type="text/javascript"></script>
<div class="datalist">
<form method="post" action="<?=$cpscript?>?action=<?=$action?>&op=<?=$op?>">
<input type="hidden" name="do" value="search">
<input type="hidden" name="formhash" value="<?=FORMHASH?>">
<div class="filterform">
<table cellspacing="0" cellpadding="0">
<tr>
<td width="15%">版块选择:</td>
<td width="35%">
<select name="fid" style="width: 180px">
<option value=""></option><? if(is_array($modforums['list'])) { foreach($modforums['list'] as $id => $name) { ?><option value="<?=$id?>" <? if($id == $fid) { ?>selected<? } ?>><?=$name?></option><? } } ?></select>
</td>
<td width="15%">帖子类型</td>
<td width="35%">
<select name="threadoption" style="width: 180px">
<option value="0" <?=$threadoptionselect['0']?>>全部</option>
<option value="1" <?=$threadoptionselect['1']?>>主题首帖</option>
<option value="2" <?=$threadoptionselect['2']?>>主题回复帖</option>
</select>					
</td>		
</tr>		
<tr>
<td>帖子作者:</td>
<td><input type="text" class="txt" size="20" value="<?=$result['users']?>" name="users" style="width: 180px"/></td>
<td>时间范围:</td>
<td><input type="text" class="txt" size="10" value="<?=$result['starttime']?>" name="starttime" onclick="showcalendar(event, this)"/> 至 
<? if($adminid == 1) { ?>
<input type="text" class="txt" size="10" value="<?=$result['endtime']?>" name="endtime" onclick="showcalendar(event, this)"/>
<? } else { ?>
<input type="text" class="txt" size="10" value="<?=$result['endtime']?>" name="endtime" readonly disabled /> 
<? if($adminid == 2) { ?>
<br />您只能操作最近 2 周的帖子
<? } elseif($adminid == 3) { ?>
<br />您只能操作最近 1 周的帖子
<? } } ?>

 </td>
</tr>		
<tr>
<td>内容关键字:</td>
<td><input type="text" class="txt" size="20" value="<?=$result['keywords']?>" name="keywords" style="width: 180px"/></td>
<td>发帖 IP:</td>
<td><input type="text" class="txt" value="<?=$result['useip']?>" name="useip" style="width: 180px" /></td>
<tr>		
<tr>
<td></td>
<td colspan="3">
<button value="true" id="searchsubmit" name="searchsubmit" class="submit" type="submit">提交</button> 

</td>
</tr>
</table>	
</div>
</form>
</div>
<? if($error == 1) { ?>
<p style="padding: 4px; color: red">搜索条件不足！您至少应当在 关键字，帖子作者或者发帖 IP 当中设置一个搜索的条件</p>
<? } elseif($error == 2) { ?>
<p style="padding: 4px; color: red">时间范围错误！版主只能删除近 1 周的帖子，超级版主可以删除 2 周内的帖子，请重新选择开始时间</p>
<? } elseif($error == 3) { ?>
<p style="padding: 4px; color: red">您输入的关键字不合法！每个关键字至少由 2 个汉字或者 4 个英文字符组成</p>
<? } elseif($error == 4) { ?>
<p style="padding: 4px; color: red">您无权使用批量删帖功能</p>
<? } elseif($do=='list' && empty($error)) { ?>
<div class="c_header"><h2>共搜索出结果 <strong><?=$total?></strong> 条</h2></div>
<div id="threadlist" class="threadlist datalist">
<form method="post" name="moderate" id="moderate" action="<?=$cpscript?>?action=<?=$action?>&op=<?=$op?>">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="fid" value="<?=$fid?>" />
<input type="hidden" name="do" value="delete" />
<table cellspacing="0" cellpadding="0" class="datatable" width="100%" style="table-layout:fixed">
<thead class="colplural">
<tr>
<td class="icon">&nbsp;</td>
<td >&nbsp;</td>
<td class="author">版块</td>
<td class="lastpost"><cite>作者</cite></td>
</tr>
</thead><? if(is_array($postlist)) { foreach($postlist as $post) { ?><tbody>
<tr>
<td><? if($allowmassprune) { ?><input class="checkbox" type="checkbox" name="delete[]" value="<?=$post['pid']?>" /><? } ?></td>
<th class="subject">
<span  class="lightlink">主题: &nbsp;<a target="_blank" href="redirect.php?goto=findpost&amp;pid=<?=$post['pid']?>&amp;ptid=<?=$post['tid']?>&amp;modthreadkey=<?=$post['modthreadkey']?>"><?=$post['tsubject']?></a></span><br />
<?=$post['message']?>
</th>

<td class="author">
<cite><a href="forumdisplay.php?fid=<?=$post['fid']?>"><?=$post['forum']?></a>
</cite>
</td>

<td class="lastpost">
<cite>
<? if($post['authorid'] && $post['author']) { ?>
<a href="space.php?uid=<?=$post['authorid']?>" target="_blank"><?=$post['author']?></a>
<? } else { ?>
<a href="space.php?uid=<?=$post['authorid']?>" target="_blank">匿名</a>
<? } ?>
</cite>
<em><?=$post['dateline']?></em>
</td>
</tr>
</tbody><? } } if($postlist && $allowmassprune) { ?>
<tbody class="notelistbg">
<tr>
<td><? if($allowmassprune) { ?><input type="checkbox" name="chkall" onclick="checkall(this.form, 'delete')" class="checkbox"/><? } ?></td>
<th class="subject">
<input type="submit" name="deletesubmit" value="删除选中的帖子">
&nbsp;<input type="checkbox" class="checkbox" name="nocredit" value="1" checked> 不更新用户积分
</th>

<td class="author">			
</td>

<td class="lastpost">
<cite>&nbsp;</cite>
<em>&nbsp;</em>
</td>
</tr>
</tbody>
<? } ?>
</table>
<? if($multipage) { ?><?=$multipage?> <? } ?>
</form>
</div>
<? } ?>
<br />
<br />
<br />
<br />
<br />