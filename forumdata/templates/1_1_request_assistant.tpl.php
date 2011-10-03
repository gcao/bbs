<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?
$__UC_API = UC_API;$writedata = <<<EOF

<div class="sidebox s_clear">

EOF;
 if($GLOBALS['discuz_uid']) { 
$writedata .= <<<EOF

<div style="float:left; margin-right: 16px;">{$avatar}</div>
<a href="space.php?uid={$GLOBALS['discuz_uid']}" target="_blank">{$GLOBALS['discuz_userss']}</a><br />
<a href="faq.php?action=grouppermission" target="_blank">{$_DCACHE['usergroups'][$GLOBALS['groupid']]['grouptitle']}</a><br />
<ul id="mycredits_menu" class="popupmenu_popup headermenu_popup" style="width:137px;display:none">
EOF;
 if(is_array($GLOBALS['extcredits'])) { foreach($GLOBALS['extcredits'] as $id => $credit) { 
$writedata .= <<<EOF
<li>{$credit['title']}: {$GLOBALS['extcredits'.$id]} {$credit['unit']}</li>
EOF;
 } } 
$writedata .= <<<EOF
</ul>
<div style="clear: both">
<div style="float:right;width:60%">
<span id="mycredits_hover" class="dropmenu" onmouseover="showMenu({'ctrlid':this.id,'showid':'mycredits'})">积分: {$GLOBALS['_DSESSION']['credits']}</span><br />

EOF;
 if($creditupgrade !== '') { 
$writedata .= <<<EOF

<span title="离升级到下一级用户组还需要的积分">升级: {$creditupgrade}</span><br />

EOF;
 } 
$writedata .= <<<EOF

</div>
<div style="float:left;text-align:left">
<a id="mycredits" href="my.php?item=threads{$fidadd}" target="_blank">我的帖子</a><br />
<a href="my.php?item=favorites&amp;type=thread{$fidadd}" target="_blank">我的收藏</a>
</div>
</div>

EOF;
 } else { 
$writedata .= <<<EOF

<div style="float:left; text-align:left; width:40%;"><img src="{$__UC_API}/images/noavatar_small.gif"></div>
<a href="{$GLOBALS['regname']}" onclick="showWindow('register', this.href);return false;">{$GLOBALS['reglinkname']}</a><br />
<a href="logging.php?action=login" onclick="showWindow('login', this.href);return false;">登录</a>

EOF;
 } 
$writedata .= <<<EOF

</div>

EOF;
 if($GLOBALS['discuz_uid'] && $GLOBALS['prompt']) { 
$writedata .= <<<EOF

<hr class="shadowline" />
<div class="sidebox">
<ul>
EOF;
 if(is_array($GLOBALS['prompts'])) { foreach($GLOBALS['prompts'] as $promptkey => $promptdata) { if($promptkey && $promptdata['new']) { 
$writedata .= <<<EOF
<li><a href="
EOF;
 if($promptdata['script']) { 
$writedata .= <<<EOF
{$promptdata['script']}
EOF;
 } else { 
$writedata .= <<<EOF
notice.php?filter={$promptkey}
EOF;
 } 
$writedata .= <<<EOF
" target="_blank">{$promptdata['name']}({$promptdata['new']})</a></li>
EOF;
 } } } 
$writedata .= <<<EOF
</ul>
</div>

EOF;
 } 
$writedata .= <<<EOF


EOF;
?>