<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('pm_send');
0
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/pm_send.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/seditor.htm', 1314512934, '1', './templates/default')
;?><? include template('header', '0', ''); if(empty($infloat)) { ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> <?=$navigation?></div>
<div id="wrap" class="wrap s_clear">
<div class="main"><div class="content nofloat">
<? } ?>

<div class="fcontent" id="pmsendfloat">
<h3 class="float_ctrl">
<em id="return_<?=$handlekey?>">发送短消息</em>
<span>
<? if(!empty($infloat)) { ?><a href="javascript:;" class="float_close" onclick="hideWindow('<?=$handlekey?>')" title="关闭">关闭</a><? } ?>
</span>
</h3>
<div id="sendpmmsg" class="postbox">
<form id="sendpmform" method="post" action="pm.php?action=send&amp;pmsubmit=yes&amp;infloat=yes&amp;sendnew=yes" onsubmit="$('pmsendmessage').value = parseurl($('pmsendmessage').value);<? if(!empty($infloat)) { ?>ajaxpost('sendpmform', 'return_<?=$handlekey?>', 'return_<?=$handlekey?>', 'onerror');return false;<? } ?>">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<? if(!empty($infloat)) { ?><input type="hidden" name="handlekey" value="<?=$handlekey?>" /><? } ?>
<div class="floatwrap">
<table class="formtable" cellspacing="0" cellpadding="0">
<tr>
<td width="60">收件人: </td>
<td>
<input name="msgto" value="<?=$username?>" class="txt" tabindex="1" />
<? if($buddyarray) { ?><a href="javascript:display('buddies');" class="dropmenu">好友群发</a><? } ?>
</td>
</tr>
<? if($buddyarray) { ?>
<tbody id="buddies" style="display: none;">
<tr>
<td width="60"></td>
<td>
<ul class="s_clear"><? if(is_array($buddyarray)) { foreach($buddyarray as $buddy) { ?><li><label for="msgto_<?=$buddy['uid']?>"><input id="msgto_<?=$buddy['uid']?>" name="msgtos[]" type="checkbox" value="<?=$buddy['uid']?>"> <?=$buddy['username']?></label></li><? } } ?></ul>
</td>
</tr>
</tbody>
<? } ?>
<tr>
<td valign="top">内容: </td>
<td>
<div class="editor_tb" style="width: 454px;"><? $seditor = array('pmsend', array('bold', 'img', 'link', 'quote', 'code', 'smilies')); ?><link rel="stylesheet" type="text/css" href="forumdata/cache/style_<?=STYLEID?>_seditor.css?<?=VERHASH?>" />
<div>
<? if(in_array('bold', $seditor['1'])) { ?>
<a href="javascript:;" title="粗体" class="tb_bold" onclick="seditor_insertunit('<?=$seditor['0']?>', '[b]', '[/b]')">B</a>
<? } if(in_array('color', $seditor['1'])) { ?>
<a href="javascript:;" title="颜色" class="tb_color" id="<?=$seditor['0']?>forecolor" onclick="showColorBox(this.id, 2, '<?=$seditor['0']?>')">Color</a>
<? } if(in_array('img', $seditor['1'])) { ?>
<a href="javascript:;" title="图片" class="tb_img" onclick="seditor_insertunit('<?=$seditor['0']?>', '[img]', '[/img]')">Image</a>
<? } if(in_array('link', $seditor['1'])) { ?>
<a href="javascript:;" title="插入链接" class="tb_link" onclick="seditor_insertunit('<?=$seditor['0']?>', '[url]', '[/url]')">Link</a>
<? } if(in_array('quote', $seditor['1'])) { ?>
<a href="javascript:;" title="引用" class="tb_quote" onclick="seditor_insertunit('<?=$seditor['0']?>', '[quote]', '[/quote]')">Quote</a>
<? } if(in_array('code', $seditor['1'])) { ?>
<a href="javascript:;" title="代码" class="tb_code" onclick="seditor_insertunit('<?=$seditor['0']?>', '[code]', '[/code]')">Code</a>
<? } if(in_array('smilies', $seditor['1'])) { ?>
<a href="javascript:;" class="tb_smilies" id="<?=$seditor['0']?>smilies" onclick="showMenu({'ctrlid':this.id,'evt':'click','layer':2});return false">Smilies</a>
<script src="forumdata/cache/smilies_var.js?<?=VERHASH?>" type="text/javascript" reload="1"></script>
<script type="text/javascript" reload="1">smilies_show('<?=$seditor['0']?>smiliesdiv', <?=$smcols?>, '<?=$seditor['0']?>');</script>
<? } ?>
</div></div>
<textarea id="pmsendmessage" name="message" cols="60" rows="10" class="txtarea" tabindex="1" onKeyDown="seditor_ctlent(event, '$(\'sendpmform\').pmsubmit.click()');" style="width: 450px; height: 160px;" prompt="sendpm_message"><?=$message?></textarea></td>
</tr>
<tr>
<td></td>
<td><button type="submit" name="pmsubmit" value="true" id="sendpm_submit" prompt="sendpm_submit">发送</button><? $policymsgs = $p = ''; if(is_array($creditspolicy['sendpm'])) { foreach($creditspolicy['sendpm'] as $id => $policy) { ?><?
$policymsg = <<<EOF

EOF;
 if($extcredits[$id]['img']) { 
$policymsg .= <<<EOF
{$extcredits[$id]['img']} 
EOF;
 } 
$policymsg .= <<<EOF
{$extcredits[$id]['title']} {$policy} {$extcredits[$id]['unit']}
EOF;
?><? $policymsgs .= $p.$policymsg;$p = ', '; } } if($policymsgs) { ?>&nbsp;每发送一条短消息将扣除 <?=$policymsgs?><? } ?>
</td>
</tr>
</table>
</div>
</form>
</div>
</div>

<script type="text/javascript" reload="1">
function messagehandle_<?=$handlekey?>(key, msg) {
if(key == 1) {
hideWindow('<?=$handlekey?>');
showDialog(msg, 'info');
setTimeout(function () { hideMenu('fwin_dialog', 'dialog'); }, 3000);
showCreditPrompt();
$('return_<?=$handlekey?>').innerHTML = '发送短消息';
$('return_<?=$handlekey?>').className = '';
}
}
</script>

<? if(empty($infloat)) { ?>
</div></div>
</div>
<? } include template('footer', '0', ''); ?>