<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('topicadmin_getip');?><? include template('header', '0', ''); ?><b><?=$member['useip']?></b> <?=$member['iplocation']?>
<? if($allowviewip) { ?>
<br /><a href="admincp.php?action=members&amp;operation=ipban&amp;ip=<?=$member['useip']?>&amp;frames=yes" target="_blank" class="lightlink">禁止此 IP</a>
<? } include template('footer', '0', ''); ?>