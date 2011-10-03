<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<table cellpadding="0" cellspacing="0" summary="post_attachbody" border="0" width="100%"><? if(is_array($attachlist)) { foreach($attachlist as $attach) { ?><tbody id="attach_<?=$attach['aid']?>">
<tr>
<td class="attachname_swf">
<p id="attach<?=$attach['aid']?>">
<span><?=$attach['filetype']?> <a href="javascript:;" class="lighttxt" onclick="<? if($attach['isimage']) { ?>insertAttachimgTag('<?=$attach['aid']?>')<? } else { ?>insertAttachTag('<?=$attach['aid']?>')<? } ?>" title="<?=$attach['filenametitle']?> <?="\n"?>上传日期: <?=$attach['dateline']?> <?="\n"?>文件大小: <?=$attach['attachsize']?>"><?=$attach['filename']?></a></span>
<? if($allowattachurl) { ?>
<a href="javascript:;" class="attachurl" title="插入附件地址" onclick="insertText('attach://<?=$attach['aid']?>.<? echo fileext($attach['filenametitle']); ?>')"><img src="<?=IMGDIR?>/attachurl.gif" /></a>
<? if(($attachmcode = parseattachmedia($attach))) { ?><a href="javascript:;" class="attachurl" title="插入附件媒体播放代码" onclick="insertText('<?=$attachmcode?>')"><img src="<?=IMGDIR?>/attachmediacode.gif" /></a><? } } if($attach['pid']) { ?>&nbsp;<a href="javascript:;" onclick="updateAttach('<?=$attach['aid']?>')">更新</a></span><? } ?>
</p>
<span id="attachupdate<?=$attach['aid']?>"></span>
<? if($attach['isimage']) { ?><img src="<?=$attach['url']?>/<?=$attach['attachment']?>" id="image_<?=$attach['aid']?>" width="<?=$attach['width']?>" _width="<?=$attach['width']?>" _height="110" onload="thumbImg(this, 1)" style="position:absolute;top:-10000px" /><? } ?>
</td>
<td class="attachdesc"><input name="attachnew[<?=$attach['aid']?>][description]" value="<?=$attach['description']?>" size="18" class="txt" /></td>
<? if($allowsetattachperm) { ?><td class="attachview"><input type="text" name="attachnew[<?=$attach['aid']?>][readperm]" value="<?=$attach['readperm']?>" size="1" class="txt" /></td><? } if($maxprice) { ?><td class="attachpr"><input type="text" name="attachnew[<?=$attach['aid']?>][price]" value="<?=$attach['price']?>" size="1" class="txt" /></td><? } ?>
<td class="attachdel"><a href="javascript:;" class="deloption" onclick="delAttach(<?=$attach['aid']?>,<? if(!$attach['pid']) { ?>1<? } else { ?>0<? } ?>)">删除</a></td>
</tr>
</tbody><? } } ?></table>
<? if(!empty($inajax)) { ?>
<script type="text/javascript" reload="1">
ATTACHNUM['attachunused'] += <? echo count($attachlist); ?>;
updateattachnum('attach');
</script>
<? } ?>