<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('post_infloat');
0
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/post_infloat.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/seditor.htm', 1309600055, '1', './templates/default')
|| checktplrefresh('/data/apps/bbs/releases/7.2_20100331/././templates/default/post_infloat.htm', '/data/apps/bbs/releases/7.2_20100331/././templates/default/seccheck.htm', 1309600055, '1', './templates/default')
;?><? include template('header', '0', ''); ?><div class="fcontent" id="floatlayout_<?=$action?>">
<h3 class="float_ctrl">
<em id="return_<?=$handlekey?>"><? if($action == 'newthread') { ?>发新话题<? } elseif($action == 'reply') { ?>参与/回复主题<? } ?></em>
<? if($action == 'newthread' && $modnewthreads) { ?><em class="needverify">需审核</em><? } if($action == 'reply' && $modnewreplies) { ?><em class="needverify">需审核</em><? } ?>
<span>
<a href="faq.php?action=credits&amp;fid=<?=$fid?>" target="_blank" title="积分说明">积分说明</a>
<a href="javascript:;" class="float_close" onclick="hideWindow('<?=$handlekey?>')" title="关闭">关闭</a>
</span>
</h3>
<div class="postbox">
<form method="post" id="postform" action="post.php?infloat=yes&amp;action=<?=$action?>&amp;fid=<?=$fid?>&amp;extra=<?=$extra?><? if($action == 'newthread') { ?>&amp;topicsubmit=yes<? } elseif($action == 'reply') { ?>&amp;tid=<?=$tid?>&amp;replysubmit=yes<? } ?>" onsubmit="this.message.value = parseurl(this.message.value);<? if(!empty($infloat)) { ?>ajaxpost('postform', 'return_<?=$handlekey?>', 'return_<?=$handlekey?>', 'onerror');return false;<? } ?>">
<input type="hidden" name="formhash" id="formhash" value="<?=FORMHASH?>" />
<input type="hidden" name="handlekey" value="<?=$handlekey?>" />
<? if($action == 'reply') { ?>
<input type="hidden" name="noticeauthor" value="<?=$noticeauthor?>" />
<input type="hidden" name="noticetrimstr" value="<?=$noticetrimstr?>" />
<input type="hidden" name="noticeauthormsg" value="<?=$noticeauthormsg?>" />
<? } ?>
<div class="float_postinfo s_clear">
<? if($action != 'reply') { ?>
<span><input name="subject" id="subject" prompt="post_subject"  class="txt" value="<?=$postinfo['subject']?>" tabindex="1" /></span>
<? } else { ?>
<span id="subjecthide" class="left">RE: <?=$thread['subject']?> [<a href="javascript:;" onclick="display('subjecthide');display('subjectbox');$('subject').value='RE: <? echo htmlspecialchars(str_replace('\'', '\\\'', $thread['subject'])); ?>'">修改</a>]</span>
<span id="subjectbox" style="display:none"><input name="subject" id="subject" class="txt" value="" tabindex="1" /></span>
<? } ?>
<div class="left">
<? if($action == 'newthread' && ($threadsorts = $forum['threadsorts'])) { ?>
<div class="float_typeid">
<select name="sortid" id="sortid" change="if($('sortid').value) {switchAdvanceMode('post.php?action=<?=$action?>&fid=<?=$fid?><? if(!empty($tid)) { ?>&tid=<?=$tid?><? } if(!empty($pid)) { ?>&pid=<?=$pid?><? } if(!empty($modelid)) { ?>&modelid=<?=$modelid?><? } ?>&extra=<?=$extra?>&sortid=' + $('sortid').value)}">
<? if(!$sortid) { ?><option value="0">分类信息</option><? } if(is_array($threadsorts['types'])) { foreach($threadsorts['types'] as $tsortid => $name) { if(!empty($modelid) && $threadsorts['modelid'][$tsortid] == $modelid || empty($modelid)) { ?>
<option value="<?=$tsortid?>"<? if($sortid == $tsortid) { ?> selected="selected"<? } ?>><? echo strip_tags($name);; ?></option>
<? } } } ?></select>
</div>
<script type="text/javascript" reload="1">simulateSelect('sortid');</script>
<? } if($isfirstpost && $forum['threadtypes']['types']) { ?>
<div class="float_typeid">
<select name="typeid" id="typeid">
<option value="0">分类</option><? if(is_array($forum['threadtypes']['types'])) { foreach($forum['threadtypes']['types'] as $typeid => $name) { ?><option value="<?=$typeid?>"<? if($thread['typeid'] == $typeid) { ?> selected="selected"<? } ?>><? echo strip_tags($name);; ?></option><? } } ?></select>
</div>
<script type="text/javascript" reload="1">simulateSelect('typeid');</script>
<? } ?>
</div>
</div>
<? if(!$isfirstpost && $thread['special'] == 5 && empty($firststand)) { ?>
<div class="viewpoint s_clear">
<p class="left">选择观点: </p>
<div class="float_typeid short_select">
<select id="stand" name="stand">
<option value="0">中立</option>
<option value="1"<? if($stand == 1) { ?> selected<? } ?>>正方</option>
<option value="2"<? if($stand == 2) { ?> selected<? } ?>>反方</option>
</select>
</div>
<script type="text/javascript" reload="1">simulateSelect('stand');</script>
</div>
<? } ?>

<div class="float_post">
<div class="editor_tb">
<span class="right">
<a href="post.php?action=<?=$action?>&amp;fid=<?=$fid?>&amp;extra=<?=$extra?><? if($action == 'reply') { ?>&amp;tid=<?=$tid?><? if(!empty($reppost)) { ?>&amp;reppost=<?=$reppost?><? } if(!empty($repquote)) { ?>&amp;repquote=<?=$repquote?><? } if(!empty($page)) { ?>&amp;page=<?=$page?><? } } if($stand) { ?>&amp;stand=<?=$stand?><? } ?>" onclick="switchAdvanceMode(this.href);doane(event);">高级模式</a>
</span><? $seditor = array('post', array('bold', 'color', 'img', 'link', 'quote', 'code', 'smilies'), 'floatlayout_'.$action); ?><link rel="stylesheet" type="text/css" href="forumdata/cache/style_<?=STYLEID?>_seditor.css?<?=VERHASH?>" />
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
<textarea rows="5" cols="80" name="message" id="postmessage" onKeyDown="seditor_ctlent(event, '$(\'postsubmit\').click();')" tabindex="2" class="txtarea"><?=$message?></textarea>
</div>

<div class="moreconf" id="moreconf">
<? if($action == 'newthread' && $sitemessage['newthread'] || $action == 'reply' && $sitemessage['reply']) { ?>
<a href="javascript:;" id="custominfo" class="right"><img src="<?=IMGDIR?>/info.gif" alt="帮助" /></a>
<? } ?>
<button type="submit" id="postsubmit" prompt="post_submit"  value="true" name="<? if($action == 'newthread') { ?>topicsubmit<? } elseif($action == 'reply') { ?>replysubmit<? } ?>" tabindex="3"><? if($action == 'newthread') { ?>发新话题<? } elseif($action == 'reply') { ?>参与/回复主题<? } ?></button>
<? if($secqaacheck || $seccodecheck) { if($secqaacheck) { ?>
<input name="secanswer" id="secanswer" type="text" autocomplete="off" style="width:50px" value="验证问答" class="txt" href="ajax.php?action=updatesecqaa" tabindex="1">
<span id="checksecanswer"><img src="images/common/none.gif" width="16" height="16"></span>
<? } if($seccodecheck) { ?>
<input name="seccodeverify" id="seccodeverify_<?=CURSCRIPT?>" type="text" autocomplete="off" style="width:50px" value="验证码" class="txt" href="ajax.php?action=updateseccode" tabindex="1">
<a href="javascript:;" onclick="updateseccode();doane(event);">换一个</a>
<span id="checkseccodeverify_<?=CURSCRIPT?>"><img src="images/common/none.gif" width="16" height="16"></span>
<? } ?>

<script type="text/javascript" reload="1">
var profile_seccode_invalid = '验证码输入错误，请重新填写。';
var profile_secanswer_invalid = '验证问答回答错误，请重新填写。';
var lastseccode = lastsecanswer = secfocus ='';
var secanswerObj = $('secanswer');
var seccodeObj = $('seccodeverify_<?=CURSCRIPT?>');
var secstatus = {'secanswer':0,'seccodeverify_<?=CURSCRIPT?>':0};

if(secanswerObj) {
secanswerObj.onclick = secanswerObj.onfocus = showIdentifying;
secanswerObj.onblur = function(e) {if(!secfocus) $('secanswer_menu').style.display='none';checksecanswer();doane(e);};
}

if(seccodeObj) {
seccodeObj.onclick = seccodeObj.onfocus = showIdentifying;
seccodeObj.onblur = function(e) {if(!secfocus) $('seccodeverify_<?=CURSCRIPT?>_menu').style.display='none';checkseccode();doane(e);};
}

function showIdentifying(e) {
var obj = BROWSER.ie ? event.srcElement : e.target;
if(!$(obj.id + '_menu')) {
obj.value = '';
ajaxmenu($(obj.id), 0, 1, 3, '12', function() {
secstatus[obj.id] = 1;
$(obj.id + '_menu').onmouseover = function() { secfocus = 1; }
$(obj.id + '_menu').onmouseout = function() { secfocus = '';$(obj.id).focus(); }
});
} else if(secstatus[obj.id] == 1) {
$(obj.id + '_menu').style.display = '';
}
obj.unselectable = 'off';
obj.focus();
doane(e);
}

function updateseccode(op) {
if(isUndefined(op)) {
ajaxget('ajax.php?action=updateseccode', seccodeObj.id + '_menu', 'ajaxwaitid', '', '', '$(seccodeObj.id + \'_menu\').style.display = \'\'');
} else {
window.document.seccodeplayer.SetVariable("isPlay", "1");
}
seccodeObj.focus();
}

function checkseccode() {
var seccodeverify = seccodeObj.value;
if(seccodeverify == lastseccode) {
return;
} else {
lastseccode = seccodeverify;
}
var cs = $('checkseccodeverify_<?=CURSCRIPT?>');
<? if($seccodedata['type'] != 1) { ?>
if(!(/[0-9A-Za-z]{4}/.test(seccodeverify))) {
warning(cs, profile_seccode_invalid);
return;
}
<? } else { ?>
if(seccodeverify.length != 2) {
warning(cs, profile_seccode_invalid);
return;
}
<? } ?>
ajaxresponse('checkseccodeverify_<?=CURSCRIPT?>', 'action=checkseccode&seccodeverify=' + (BROWSER.ie && document.charset == 'utf-8' ? encodeURIComponent(seccodeverify) : seccodeverify));
}

function checksecanswer() {
        var secanswer = secanswerObj.value;
if(secanswer == lastsecanswer) {
return;
} else {
lastsecanswer = secanswer;
}
ajaxresponse('checksecanswer', 'action=checksecanswer&secanswer=' + (BROWSER.ie && document.charset == 'utf-8' ? encodeURIComponent(secanswer) : secanswer));
}

function ajaxresponse(objname, data) {
var x = new Ajax('XML', objname);
x.get('ajax.php?inajax=1&' + data, function(s){
        var obj = $(objname);
        if(s.substr(0, 7) == 'succeed') {
        	obj.style.display = '';
                obj.innerHTML = '<img src="<?=IMGDIR?>/check_right.gif" width="16" height="16" />';
obj.className = "warning";
} else {
warning(obj, s);
}
});
}

function warning(obj, msg) {
if((ton = obj.id.substr(5, obj.id.length)) != 'password2') {
$(ton).select();
}
obj.style.display = '';
obj.innerHTML = '<img src="<?=IMGDIR?>/check_error.gif" width="16" height="16" />';
obj.className = "warning";
}
</script><? } ?>
</div>
</form>
</div>
</div>

<script type="text/javascript" reload="1">
function submithandle_<?=$action?>(locationhref, message) {
<? if($action == 'reply') { ?>
try {
var pid = locationhref.lastIndexOf('#pid');
if(pid != -1) {
pid = locationhref.substr(pid + 4);
ajaxget('viewthread.php?tid=<?=$tid?>&viewpid=' + pid, 'post_new', 'ajaxwaitid', '', null, 'appendreply()');
if(replyreload) {
var reloadpids = replyreload.split(',');
for(i = 1;i < reloadpids.length;i++) {
ajaxget('viewthread.php?tid=<?=$tid?>&viewpid=' + reloadpids[i], 'post_' + reloadpids[i]);
}
}
} else {
showDialog(message, 'notice', '', 'location.href="' + locationhref + '"');
}
} catch(e) {
location.href = locationhref;
}
<? } elseif($action == 'newthread') { ?>
var hastid = locationhref.lastIndexOf('tid=');
if(hastid == -1) {
showDialog(message, 'notice', '', 'location.href="' + locationhref + '"');
} else {
location.href = locationhref;
}
<? } ?>
hideWindow('<?=$action?>');
}
<? if($action == 'newthread' && $sitemessage['newthread'] || $action == 'reply' && $sitemessage['reply']) { ?>
showPrompt('custominfo', 'click', '<? if($action == 'newthread') { echo trim($sitemessage['newthread'][array_rand($sitemessage['newthread'])]); } elseif($action == 'reply') { echo trim($sitemessage['reply'][array_rand($sitemessage['reply'])]); } ?>', <?=$sitemessage['time']?>);
<? } ?>
</script><? include template('footer', '0', ''); ?>