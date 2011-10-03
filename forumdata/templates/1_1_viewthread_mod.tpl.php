<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('viewthread_mod');?><? include template('header', '0', ''); if(empty($infloat)) { ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> <?=$navigation?></div>
<div id="wrap" class="wrap s_clear">
<div class="main"><div class="content nofloat">
<? } ?>

<div class="fcontent">
<h3 class="float_ctrl">
<em id="return_<?=$handlekey?>">主题操作记录</em>
<span>
<? if(!empty($infloat)) { ?><a href="javascript:;" class="float_close" onclick="hideWindow('<?=$handlekey?>')" title="关闭">关闭</a><? } ?>
</span>
</h3>
<div class="floatwrap">
<table class="list" cellspacing="0" cellpadding="0">
<thead>
<tr>
<td>操作者</td>
<td class="time">时间</td>
<td>操作</td>
<td class="time">有效期</td>
</tr>
</thead><? if(is_array($loglist)) { foreach($loglist as $log) { ?><tr>
<td><? if($log['uid']) { ?><a href="space.php?uid=<?=$log['uid']?>" target="_blank"><?=$log['username']?></a><? } else { ?>任务系统<? } ?></td>
<td class="time"><?=$log['dateline']?></td>
<td <?=$log['status']?>><? if($log['magicid']) { ?><a href="magic.php?action=index&amp;operation=buy&amp;magicid=<?=$log['magicid']?>" target="_blank"><?=$log['magicname']?></a><? } else { ?><?=$modactioncode[$log['action']]?><? } ?></td>
<td class="time" <?=$log['status']?>><? if($log['expiration']) { ?><?=$log['expiration']?><? } elseif(in_array($log['action'], array('STK', 'HLT', 'DIG', 'CLS', 'OPN'))) { ?>永 久<? } ?></td>
</tr><? } } ?></table>
</div>
</div>

<? if(empty($infloat)) { ?>
</div></div>
</div>
<? } include template('footer', '0', ''); ?>