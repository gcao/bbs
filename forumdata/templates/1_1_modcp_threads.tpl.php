<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<script src="<?=$jspath?>moderate.js?<?=VERHASH?>" type="text/javascript"></script>
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
<option value="1" <?=$threadoptionselect['1']?>>投票</option>
<option value="2" <?=$threadoptionselect['2']?>>商品</option>
<option value="3" <?=$threadoptionselect['3']?>>悬赏</option>
<option value="4" <?=$threadoptionselect['4']?>>活动</option>
<option value="5" <?=$threadoptionselect['5']?>>辩论</option>
<option value="999" <?=$threadoptionselect['999']?>>精华</option>
<option value="888" <?=$threadoptionselect['888']?>>置顶</option>
</select>
</td>
</tr>
<tr>
<td>帖子作者:</td>
<td><input type="text" class="txt" size="20" value="<?=$result['users']?>" name="users" style="width: 180px"/></td>
<td>发表时间范围:</td>
<td><input type="text" class="txt" size="10" value="<?=$result['starttime']?>" name="starttime" onclick="showcalendar(event, this);"/> 至 <input type="text" class="txt" size="10" value="<?=$result['endtime']?>" name="endtime" onclick="showcalendar(event, this)"/> </td>
</tr>
<tr>
<td>标题关键字:</td>
<td><input type="text" class="txt" size="20" value="<?=$result['keywords']?>" name="keywords" style="width: 180px"/></td>
<td>点击次数范围:</td>
<td><input type="text" class="txt" size="10" value="<?=$result['viewsmore']?>" name="viewsmore"/> 至 <input type="text" class="txt" size="10" value="<?=$result['viewsless']?>" name="viewsless"/> </td>
<tr>
<tr>
<td>多少天内无回复:</td>
<td><input type="text" class="txt" size="20" value="<?=$result['noreplydays']?>" name="noreplydays" style="width: 180px"/></td>
<td>回复次数范围:</td>
<td><input type="text" class="txt" size="10" value="<?=$result['repliesmore']?>" name="repliesmore"/> 至 <input type="text" class="txt" size="10" value="<?=$result['repliesless']?>" name="repliesless"/> </td>
<tr>
<tr>
<td></td>
<td colspan="3"><button value="true" id="searchsubmit" name="submit" class="submit" type="submit">提交</button></td>
</tr>
</table>
</div>
</form>
</div>

<? if($fid) { ?>
<div class="c_header"><h3 class="noarrow">当前版块: <a href="forumdisplay.php?fid=<?=$fid?>" target="_blank" class="lightlink"><?=$forum['name']?></a>, 共搜索出结果 <strong><?=$total?></strong> 条, 请选择需要操作的主题进行管理</h3></div>
<div id="threadlist" style="position: relative;" class="threadlist datalist">
<form method="post" name="moderate" id="moderate" action="topicadmin.php?action=moderate&amp;fid=<?=$fid?>&amp;infloat=yes&amp;nopost=yes">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="frommodcp" value="<? if(empty($do)) { ?>1<? } else { ?>2<? } ?>" />
<table cellspacing="0" cellpadding="0" style="position: relative;" class="datatable">
<thead class="colplural">
<tr>
<td class="icon">&nbsp;</td>
<td class="icon">&nbsp;</td>
<td >&nbsp;</td>
<td class="author">作者</td>
<td class="nums">回复/查看</td>
<td class="lastpost"><cite>最后发表</cite></td>
</tr>
</thead><? if(is_array($postlist)) { foreach($postlist as $thread) { ?><tbody id="<?=$thread['id']?>">
<tr>
<td class="icon">
<? if($thread['special'] == 1) { ?>
<img src="<?=IMGDIR?>/pollsmall.gif" alt="投票" />
<? } elseif($thread['special'] == 2) { ?>
<img src="<?=IMGDIR?>/tradesmall.gif" alt="商品" />
<? } elseif($thread['special'] == 3) { ?>
<img src="<?=IMGDIR?>/rewardsmall.gif" alt="悬赏" <? if($thread['price'] < 0) { ?>class="solved"<? } ?> />
<? } elseif($thread['special'] == 4) { ?>
<img src="<?=IMGDIR?>/activitysmall.gif" alt="活动" />
<? } elseif($thread['special'] == 5) { ?>
<img src="<?=IMGDIR?>/debatesmall.gif" alt="辩论" />
<? } else { ?>
<?=$thread['icon']?>
<? } ?>
</td>
<td>
<? if($thread['displayorder'] <= 3 || $adminid == 1) { ?>
<input onclick="tmodclick(this)" class="checkbox" type="checkbox" name="moderate[]" value="<?=$thread['tid']?>" />
<? } else { ?>
<input class="checkbox" type="checkbox" disabled="disabled" />
<? } ?>
</td>
<th class="subject <?=$thread['folder']?>">
<label>
<? if($thread['rate'] > 0) { ?>
<img src="<?=IMGDIR?>/agree.gif" alt="" />
<? } elseif($thread['rate'] < 0) { ?>
<img src="<?=IMGDIR?>/disagree.gif" alt="" />
<? } if($thread['digest'] > 0) { ?>
<img src="<?=IMGDIR?>/digest_<?=$thread['digest']?>.gif" alt="精华 <?=$thread['digest']?>" />
<? } ?>
&nbsp;</label>

<span id="thread_<?=$thread['tid']?>"><a href="viewthread.php?tid=<?=$thread['tid']?>" target="_blank" <?=$thread['highlight']?>><?=$thread['subject']?></a></span>
<? if($thread['readperm']) { ?> - [阅读权限 <span class="bold"><?=$thread['readperm']?></span>]<? } if($thread['price'] > 0) { if($thread['special'] == '3') { ?>
- <span style="color: #C60">[悬赏<?=$extcredits[$creditstransextra['2']]['title']?> <span class="bold"><?=$thread['price']?></span> <?=$extcredits[$creditstransextra['2']]['unit']?>]</span>
<? } else { ?>
- [售价 <?=$extcredits[$creditstransextra['1']]['title']?> <span class="bold"><?=$thread['price']?></span> <?=$extcredits[$creditstransextra['1']]['unit']?>]
<? } } elseif($thread['special'] == '3' && $thread['price'] < 0) { ?>
- <span style="color: #269F11">[已解决]</span>
<? } if($thread['displayorder'] == 1) { ?>
- <span style="color: #C60">置顶I</span>
<? } elseif($thread['displayorder'] == 2) { ?>
- <span style="color: #C60">置顶II</span>
<? } elseif($thread['displayorder'] == 3) { ?>
- <span style="color: #C60">置顶III</span>
<? } if($thread['attachment'] == 2) { ?>
<img src="images/attachicons/image_s.gif" alt="图片附件" class="attach" />
<? } elseif($thread['attachment'] == 1) { ?>
<img src="images/attachicons/common.gif" alt="附件" class="attach" />
<? } ?>
</th>

<td class="author">
<cite>
<? if($thread['authorid'] && $thread['author']) { ?>
<a href="space.php?uid=<?=$thread['authorid']?>" target="_blank"><?=$thread['author']?></a>
<? } else { ?>
<a href="space.php?uid=<?=$thread['authorid']?>" target="_blank">匿名</a>
<? } ?>
</cite>
<em><?=$thread['dateline']?></em>
</td>

<td class="nums"><strong><?=$thread['replies']?></strong>/<em><?=$thread['views']?></em></td>
<td class="lastpost">
<cite><? if($thread['lastposter']) { ?><a target="_blank" href="space.php?username=<?=$thread['lastposterenc']?>"><?=$thread['lastposter']?></a><? } else { ?>匿名<? } ?></cite>
<em><a target="_blank" href="redirect.php?tid=<?=$thread['tid']?>&amp;goto=lastpost"><?=$thread['lastpost']?></a></em>
</td>
</tr>
</tbody><? } } ?></table>
<? if($multipage) { ?><?=$multipage?> <? } if(!$total) { ?><p class="nodata">没有找到相关主题</p><? } include template('topicadmin_modlayer', '0', ''); ?></form>
</div>
<br /><br />
<? } else { ?>
<p>请选择板块进行管理</p>
<? } ?>