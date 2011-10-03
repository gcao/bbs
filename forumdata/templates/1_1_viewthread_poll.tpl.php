<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<script type="text/javascript">
<? if($optiontype=='checkbox') { ?>
var max_obj = <?=$maxchoices?>;
var p = 0;
function checkbox(obj) {
if(obj.checked) {
p++;
for (var i = 0; i < $('poll').elements.length; i++) {
var e = $('poll').elements[i];
if(p == max_obj) {
if(e.name.match('pollanswers') && !e.checked) {
e.disabled = true;
}
}
}
} else {
p--;
for (var i = 0; i < $('poll').elements.length; i++) {
var e = $('poll').elements[i];
if(e.name.match('pollanswers') && e.disabled) {
e.disabled = false;
}
}
}
$('pollsubmit').disabled = p <= max_obj && p > 0 ? false : true;
}
<? } ?>
</script>

<form id="poll" name="poll" method="post" action="misc.php?action=votepoll&amp;fid=<?=$fid?>&amp;tid=<?=$tid?>&amp;pollsubmit=yes&amp;quickforward=yes" onsubmit="ajaxpost('poll', 'post_<?=$post['pid']?>', 'post_<?=$post['pid']?>');return false">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<div class="pollinfo">
<? if($multiple) { ?><strong>多选投票</strong><? if($maxchoices) { ?>: ( 最多可选 <?=$maxchoices?> 项 )<? } } else { ?><strong>单选投票</strong><? } if($visiblepoll && $allowvote) { ?> , 投票后结果可见<? } ?>, 共有 <?=$voterscount?> 人参与投票
<? if(!$visiblepoll && ($overt || $adminid == 1)) { ?>
<a href="misc.php?action=viewvote&amp;tid=<?=$tid?>" onclick="showWindow('viewvote', this.href);doane(event);">查看投票参与人</a>
<? } ?>
</div>

<? if($thread['remaintime']) { ?>
<p class="polltimer">
距结束还有:
<strong>
<? if($thread['remaintime']['0']) { ?><?=$thread['remaintime']['0']?> 天<? } if($thread['remaintime']['1']) { ?><?=$thread['remaintime']['1']?> 小时<? } ?>
<?=$thread['remaintime']['2']?> 分钟
</strong>
</p>
<? } elseif($expiration && $expirations < $timestamp) { ?>
<p class="polltimer"><strong>投票已经结束</strong></p>
<? } ?>

<div class="pollchart">
<table summary="poll panel" cellspacing="0" cellpadding="0" width="100%"><? if(is_array($polloptions)) { foreach($polloptions as $key => $option) { ?><tr>
<? if($allowvote) { ?>
<td class="selector"><input class="checkbox" type="<?=$optiontype?>" id="option_<?=$key?>" name="pollanswers[]" value="<?=$option['polloptionid']?>" <? if($optiontype=='checkbox') { ?>onclick="checkbox(this)"<? } else { ?>onclick="$('pollsubmit').disabled = false"<? } ?> /></td>
<? } ?>
<td class="polloption vote">
<label for="option_<?=$key?>"><? echo $key+1; ?>. &nbsp;<?=$option['polloption']?></label>
</td>
<td class="optionvotes"></td>
</tr>

<tr>
<? if(!$visiblepoll) { if($allowvote) { ?>
<td>&nbsp;</td>
<? } ?>
<td class="optionvessel">
<div class="optionbg">
<div class="polloptionbar pollcolor<?=$option['color']?>" style="width: <?=$option['width']?>px;"></div>
</div>
</td>
<td><?=$option['percent']?>% <em class="pollvote<?=$option['color']?>">(<?=$option['votes']?>)</em></td>
<? } else { ?>
<td colspan="<? if($allowvote) { ?>3<? } else { ?>2<? } ?>"><hr class="solidline" /></td>
<? } ?>
</tr><? } } ?><tr>
<? if($allowvote) { ?><td class="selector">&nbsp;</td><? } ?>
<td colspan="2">
<? if($allowvote) { ?>
<button class="submit" type="submit" disabled="disabled" name="pollsubmit" id="pollsubmit" value="true">提交</button>
<? if($overt) { ?>
(此为公开投票，其他人可看到你的投票项目)
<? } ?>				
<? } elseif(!$allwvoteusergroup) { ?>
您所在的用户组没有投票权限
<? } elseif(!$allowvotepolled) { ?>
您已经投过票，谢谢您的参与
<? } elseif(!$allowvotethread) { ?>
该投票已经关闭或者过期，不能投票
<? } ?>
</td>
</tr>
</table>
</div>
</form>