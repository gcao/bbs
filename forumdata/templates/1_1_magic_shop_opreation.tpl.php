<? if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('magic_shop_opreation');?><? include template('header', '0', ''); if(empty($infloat)) { ?>
<div id="nav"><a href="<?=$indexname?>"><?=$bbname?></a> <?=$navigation?></div>
<div id="wrap" class="wrap s_clear">
<div class="main"><div class="content nofloat">
<? } ?>

<div id="floatlayout_magics" class="fcontent">
<h3 class="float_ctrl">
<em id="return_magics">
<? if($operation == 'buy') { ?>
购买
<? } elseif($operation == 'give') { ?>
赠送
<? } ?>
</em>
<span><? if(!empty($infloat)) { ?><a title="关闭" onclick="hideWindow('magics')" class="float_close" href="javascript:;">关闭</a><? } ?></span>
</h3>
<div class="postbox">
<form id="magicform" method="post" action="magic.php?action=shop&amp;infloat=yes" onsubmit="ajaxpost('magicform', 'return_magics', 'return_magics', 'onerror');return false;">
<input type="hidden" name="formhash" value="<?=FORMHASH?>" />
<? if(!empty($infloat)) { ?><input type="hidden" name="handlekey" value="magics" /><? } ?>
<input type="hidden" name="operation" value="<?=$operation?>" />
<input type="hidden" name="magicid" value="<?=$magicid?>" />
<? if($operation == 'buy') { ?>
<div class="mymagic fixed s_clear">
<div class="magicimg"><img src="images/magics/<?=$magic['pic']?>" alt="<?=$magic['name']?>"></div>
<div class="magicdetail">
<h5><?=$magic['name']?></h5>
<p><?=$magic['description']?></p>
<p>重量: <?=$magic['weight']?></p>
<p>售价: <span class="magicprice"><?=$magic['price']?></span> <?=$extcredits[$creditstransextra['3']]['title']?>
<? if($magic['discountprice']) { ?>
&nbsp;&nbsp;折扣价: <span class="magicprice"><?=$magic['discountprice']?></span> <?=$extcredits[$creditstransextra['3']]['title']?>
<? } ?></p>
<p><? if($useperm) { ?><span class="magic_yes">允许使用</span><? } else { ?><span class="magic_no">不允许使用</span><? } ?>该道具</p>
<? if($magic['type'] == 1) { ?>
<p>允许使用版块: </p>
<p><? if($forumperm) { ?><?=$forumperm?><? } else { ?> 所有版块 <? } ?></p>
<? } if($magic['type'] == 2) { ?>
<p>允许使用的用户组: </p>
<p><? if($targetgroupperm) { ?><?=$targetgroupperm?><? } else { ?> 所有用户组 <? } ?></p>
<? } ?>
<div class="magicnum">
购买数量: <input name="magicnum" type="text" size="2" value="1" class="txt" />&nbsp;
</div>
<input type="hidden" name="operatesubmit" value="yes" />
<button class="submit fixedbtn" type="submit" name="operatesubmit" id="operatesubmit" value="true" tabindex="101">购买</button>
</div>
</div>
<? } elseif($operation == 'give') { ?>
<div class="mymagic fixed s_clear">
<div class="magicimg"><img src="images/magics/<?=$magic['pic']?>" alt="<?=$magic['name']?>"></div>
<div class="magicdetail">
<? if($allowmagics > 1 ) { ?>
<p>赠送给: </p>
<div class="hasdropdownbtn ratelist s_clear">
<input type="text" id="selectedusername" name="tousername" size="12"  value="" class="txt" />
<? if($buddyarray) { ?>
<a href="javascript:;" class="dropdownbtn" onclick="showselect(this, 'selectedusername', 'selectusername')"></a>
<ul id="selectusername" style="display:none"><? if(is_array($buddyarray)) { foreach($buddyarray as $buddy) { ?><li><?=$buddy['username']?></li><? } } ?></ul>
<? } ?>
</div>
<? } ?>
<p>赠送留言: </p>
<textarea name="givemessage" class="txtarea" style="height:60px;width:230px">送你一个<?=$magic['name']?>，<?=$magic['description']?>，希望你能喜欢。</textarea>
<p>数量: </p>
<p><input name="magicnum" type="text" size="12" value="1" class="txt" /></p>
<p><input type="hidden" name="operatesubmit" value="yes" />
<button class="submit fixedbtn" type="submit" name="operatesubmit" id="operatesubmit" value="true">赠送</button></p>
</div>
</div>
<? } ?>
</form>
</div>
</div>

<script type="text/javascript" reload="1">
function messagehandle_magics(key) {
if(key != 0) {
$('magicform').style.display = 'none';
$('return_magics').className = 'onright';
}
}
</script>

<? if(empty($infloat)) { ?>
</div></div>
</div>
<? } include template('footer', '0', ''); ?>