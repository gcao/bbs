<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if($favlist) { if($type == 'forum') { ?>
<form method="post" action="my.php?item=favorites&amp;type=forum">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<table cellspacing="0" cellpadding="0" summary="收藏的版块" class="datatable">
<thead class="colplural">
<tr>
<td width="6%"></td>
<td>版块</td>
<td>主题</td>
<td>帖数</td>
<td>今日</td>
</tr>
</thead>
<tbody><? if(is_array($favlist)) { foreach($favlist as $fav) { ?><tr>
<td><input class="checkbox" type="checkbox" name="delete[]" value="<?=$fav['fid']?>" /></td>
<th><a href="forumdisplay.php?fid=<?=$fav['fid']?>&amp;from=favorites" target="_blank"><?=$fav['name']?></a></th>
<td><?=$fav['threads']?></td>
<td><?=$fav['posts']?></td>
<td><?=$fav['todayposts']?></td>
</tr><? } } ?><tr>
<td><input class="checkbox" type="checkbox" name="chkall" id="chkall" onclick="checkall(this.form)" /> <label for="chkall">删?</label></td>
<th><button type="submit" class="submit" name="favsubmit" value="true">提交</button></th>
<td colspan="3"><? if(!empty($multipage)) { ?><?=$multipage?><? } ?></td>
</tr>
</tbody>
</table>
</form>
<? } elseif($type == 'thread') { ?>
<form method="post" action="my.php?item=favorites&amp;type=thread">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<table cellspacing="0" cellpadding="0" summary="收藏的主题" class="datatable">
<thead class="colplural">
<tr>
<td width="6%"></td>
<th>标题</th>
<td class="forum">版块</td>
<td class="nums">回复</td>
<td class="lastpost"><cite>最后发表</cite></td>
</tr>
</thead>
<tbody><? if(is_array($favlist)) { foreach($favlist as $fav) { ?><tr>
<td><input class="checkbox" type="checkbox" name="delete[]" value="<?=$fav['tid']?>"></td>
<th><a href="viewthread.php?tid=<?=$fav['tid']?>&amp;from=favorites" target="_blank"><?=$fav['subject']?></a></th>
<td class="forum"><a href="forumdisplay.php?fid=<?=$fav['fid']?>&amp;from=favorites" target="_blank"><?=$fav['name']?></a></td>
<td class="nums"><?=$fav['replies']?></td>
<td class="lastpost">
<cite><? if($fav['lastposter']) { ?><a href="space.php?username=<?=$fav['lastposterenc']?>&amp;from=favorites" target="_blank"><?=$fav['lastposter']?></a><? } else { ?>匿名<? } ?></cite>
<em><a href="redirect.php?tid=<?=$fav['tid']?>&amp;from=favorites&amp;goto=lastpost#lastpost"><?=$fav['lastpost']?></a></em>
</td>
</tr><? } } ?><tr>
<td><input class="checkbox" type="checkbox" name="chkall" id="chkall" onclick="checkall(this.form)" /> <label for="chkall">删?</label></td>
<th><button type="submit" class="submit" name="favsubmit" value="true">提交</button></th>
<td colspan="3"><? if(!empty($multipage)) { ?><?=$multipage?><? } ?></td>
</tr>
</tbody>
</table>
</form>
<? } } else { ?>
<table cellspacing="0" cellpadding="0" class="datatable">
<tr><th><p class="nodata">暂无数据</p></th></tr>
</table>
<? } ?>