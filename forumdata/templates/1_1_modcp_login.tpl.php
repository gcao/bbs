<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<h1>管理登录</h1>
<div class="channelinfo">当您首次进入管理面板或者长时间没有管理动作时，您需要输入密码才能进入。如果密码输入错误超过 3 次，管理面板将会锁定。30 分钟或者更长时间后，管理面板才能解除锁定。</div>
<form method="post" action="<?=$cpscript?>?action=login" class="filterform">
<input type="hidden" name="formhash" value="<?=FORMHASH?>">
<input type="hidden" name="fid" value="<?=$fid?>">
<input type="hidden" name="submit" value="yes">
<table summary="会员统计" cellspacing="0" cellpadding="5">
<tr>
<th width="60">用户名:</th><td><?=$discuz_userss?></td>
</tr>
<tr>
<th>密码:</th><td><input type="password" name="cppwd" class="txt" /></td>
</tr>
<tr>
<th></th><td><button type="submit" class="submit" name="submit" id="submit" value="true">提交</button></td>
</tr>
</table>
</form>