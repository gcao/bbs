<? if(!defined('IN_DISCUZ')) exit('Access Denied'); if($pm['daterange']) { ?><li class="pm_date"><strong><?=$pm['daterange']?></strong></li><? } ?>
<li id="pm_<?=$pm['pmid']?>" class="s_clear <? if($pm['msgfromid'] == $discuz_uid) { ?>self<? } ?>">
<a name="pm_<?=$pm['pmid']?>"></a>
<? if(!$new && $pm['new']) { ?><a name="new"></a><? $new = 1; } ?>
<a<? if($msgfromurl && $pm['msgfromid'] != $discuz_uid) { ?> href="<?=$msgfromurl?>"<? } ?> class="avatar"><? echo discuz_uc_avatar($pm['msgfromid'], 'small');; ?></a>
<p class="cite">
<cite><? if($pm['msgfromid'] != $discuz_uid) { ?><?=$pm['msgfrom']?><? } else { ?><?=$discuz_userss?><? } ?></cite>
<?=$pm['dateline']?>
<? if($pm['new']) { ?>&nbsp;&nbsp;<img src="<?=IMGDIR?>/notice_newpm.gif" alt="NEW" /><? } ?>
</p>
<div class="summary"><?=$pm['message']?></div>
<span class="action">
<a href="pm.php?action=new&amp;pmid=<?=$pm['pmid']?>" onclick="showWindow('sendpm', this.href);return false;">转发</a>
</span>
</li>
<? if($inajax) { ?><script type="text/javascript" reload="1">appendpmnode();</script><? } ?>