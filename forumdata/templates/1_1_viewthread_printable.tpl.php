<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<html>
<head>
<title><?=$bbname?> - Powered by Discuz! Board</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?=$charset?>" />
<style type="text/css">
body 	   {margin: 10px 80px;}
body,table {font-size: <?=FONTSIZE?>; font-family: <?=FONT?>;}
</style>
<script src="<?=$jspath?>common.js?<?=VERHASH?>" type="text/javascript"></script>
<script src="<?=$jspath?>viewthread.js?<?=VERHASH?>" type="text/javascript"></script>
<script type="text/javascript">zoomstatus = 0;</script>
</head>

<body>
<img src="<?=BOARDIMG?>" alt="Board logo" border="0" /><br /><br />
<b>标题: </b><?=$thread['subject']?> <b><a href="###" onclick="this.style.visibility='hidden';window.print();this.style.visibility='visible'">[打印本页]</a></b></span><br /><? if(is_array($postlist)) { foreach($postlist as $post) { $needhiddenreply = ($hiddenreplies && $discuz_uid != $post['authorid'] && $discuz_uid != $thread['authorid'] && !$post['first'] && !$forum['ismoderator']); ?><hr noshade size="2" width="100%" color="#808080">
<b>作者: </b><? if($post['author'] && !$post['anonymous']) { ?><?=$post['author']?><? } else { ?>匿名<? } ?>&nbsp; &nbsp; <b>时间: </b><?=$post['dateline']?>
<? if($post['subject']) { ?> &nbsp; &nbsp; <b>标题: </b><?=$post['subject']?><? } ?>
<br /><br />
<? if($adminid != 1 && $bannedmessages && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))) { ?>
提示: <em>作者被禁止或删除 内容自动屏蔽</em>
<? } elseif($adminid != 1 && $post['status'] & 1) { ?>
提示: <em>该帖被管理员或版主屏蔽</em>
<? } elseif($post['first'] && $threadpay) { ?>
本主题需向作者支付 <strong><?=$thread['price']?> <?=$extcredits[$creditstransextra['1']]['title']?> </strong> 才能浏览
<? } elseif($needhiddenreply) { ?>
此帖仅作者可见
<? } else { ?>
<?=$post['message']?><? if(is_array($post['attachments'])) { foreach($post['attachments'] as $attach) { ?><br /><br /><?=$attach['attachicon']?>
<? if(!$attach['attachimg'] || !$allowgetattach) { ?>
附件: <? if($attach['description']) { ?>[<?=$attach['description']?>]<? } ?> <b><?=$attach['filename']?></b> (<?=$attach['dateline']?>, <?=$attach['attachsize']?>) / 下载次数 <?=$attach['downloads']?><br /><?=$boardurl?>attachment.php?aid=<?=$attach['aid']?>&k=<? echo md5($attach['aid'].md5($authkey).$timestamp);; ?>&t=<?=$timestamp?>&sid=<?=$sid?>
<? } else { ?>
图片附件: <? if($attach['description']) { ?>[<?=$attach['description']?>]<? } ?> <b><?=$attach['filename']?></b> (<?=$attach['dateline']?>, <?=$attach['attachsize']?>) / 下载次数 <?=$attach['downloads']?><br /><?=$boardurl?>attachment.php?aid=<?=$attach['aid']?>&k=<? echo md5($attach['aid'].md5($authkey).$timestamp);; ?>&t=<?=$timestamp?>&sid=<?=$sid?>
<? if(!$attach['price'] || $attach['payed']) { ?><br /><br /><img src="<?=$attach['url']?>/<?=$attach['attachment']?>" border="0" onload="if(this.width >screen.width*0.8) this.width=screen.width*0.8" alt="" /><? } } } } } } } ?><br /><br /><br /><br /><hr noshade size="2" width="100%" color="<?=BORDERCOLOR?>">
<table cellspacing="0" cellpadding="0" border="0" width="95%" align="center" style="font-size: <?=SMFONTSIZE?>; font-family: <?=SMFONT?>">
<tr><td>欢迎光临 <?=$bbname?> (<?=$boardurl?>)</td>
<td align="right">
Powered by Discuz! <?=$version?></td></tr></table>

</body>
</html>