<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<table id="subforum_<?=$forum['fid']?>" summary="subform" cellspacing="0" cellpadding="0" style="<?=$collapse['subforum']?>">
<? if(!$forum['forumcolumns']) { if(is_array($sublist)) { foreach($sublist as $sub) { ?><tbody>
<tr>
<th<?=$sub['folder']?>>
<?=$sub['icon']?>
<div class="left">
<h2><a href="forumdisplay.php?fid=<?=$sub['fid']?>" <? if($sub['redirect']) { ?>target="_blank"<? } ?> style="<? if($sub['extra']['namecolor']) { ?>color: <?=$sub['extra']['namecolor']?>;<? } ?>"><?=$sub['name']?></a><? if($sub['todayposts'] && !$sub['redirect']) { ?><em> (今日: <strong><?=$sub['todayposts']?></strong>)</em><? } ?></h2>
<? if($sub['description']) { ?><p><?=$sub['description']?></p><? } if($sub['subforums']) { ?><p>子版块: <?=$sub['subforums']?></p><? } if($sub['moderators']) { if($moddisplay == 'flat') { ?><p>版主: <?=$sub['moderators']?></p><? } else { ?><span class="dropmenu" id="mod<?=$sub['fid']?>" onmouseover="showMenu({'ctrlid':this.id})">版主</span><ul class="popupmenu_popup headermenu_popup" id="mod<?=$sub['fid']?>_menu" style="display: none"><?=$sub['moderators']?></ul><? } } ?>
</div>
</th>
<td class="forumnums">
<? if($sub['redirect']) { ?>N/A<? } else { ?><em><?=$sub['threads']?></em> / <?=$sub['posts']?><? } ?>
</td>
<td class="forumlast">
<? if($sub['permission'] == 1) { ?>
私密版块
<? } else { if($sub['redirect']) { ?>
<a href="forumdisplay.php?fid=<?=$sub['fid']?>">链接到外部地址</a>
<? } elseif(is_array($sub['lastpost'])) { ?>
<p><a href="redirect.php?tid=<?=$sub['lastpost']['tid']?>&amp;goto=lastpost#lastpost"><? echo cutstr($sub['lastpost']['subject'], 30); ?></a></p>
<cite><? if($sub['lastpost']['author']) { ?><?=$sub['lastpost']['author']?><? } else { ?>匿名<? } ?> - <?=$sub['lastpost']['dateline']?></cite>
<? } else { ?>
从未
<? } } ?>
</td>
</tr>
</tbody><? } } } else { ?>
<tr class="narrowlist"><? if(is_array($sublist)) { foreach($sublist as $sub) { if($sub['orderid'] && ($sub['orderid'] % $forum['forumcolumns'] == 0)) { ?>
</tr></tbody>
<? if($sub['orderid'] < $forum['subscount']) { ?>
<tbody><tr>
<? } } ?>
<th width="<?=$forum['forumcolwidth']?>"<?=$sub['folder']?>>
<h2><a href="forumdisplay.php?fid=<?=$sub['fid']?>"><?=$sub['name']?></a><? if($sub['todayposts']) { ?><em> (今日: <strong><?=$sub['todayposts']?></strong>)</em><? } ?></h2>
<? if($forum['description']) { ?><p><?=$sub['description']?></p><? } ?>
<p>主题:<?=$sub['threads']?>, 帖数: <?=$sub['posts']?></p>
</th><? } } ?><?=$forum['endrows']?>
<? } ?>
</table>
