<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?><?
$writedata = <<<EOF

<div class="side_type s_clear">

EOF;
 if($settings['title']) { 
$writedata .= <<<EOF

<h3 class="requesttabs">
EOF;
 $sp = ''; 
$writedata .= <<<EOF
<span>
EOF;
 if(is_array($combinetitles)) { foreach($combinetitles as $i => $combinetitle) { 
$writedata .= <<<EOF
{$sp}<a href="javascript:;" hidefocus="true" id="{$idbase}_{$i}" onclick="switchTab('{$idbase}', {$i}, {$combinecount})">{$combinetitle}</a>
EOF;
 $sp = ' | '; } } 
$writedata .= <<<EOF
</span>
{$settings['title']}
</h3>

EOF;
 } else { if(is_array($combinetitles)) { foreach($combinetitles as $i => $combinetitle) { 
$writedata .= <<<EOF
<h4 id="{$idbase}_{$i}" onclick="switchTab('{$idbase}', {$i}, {$combinecount})">{$combinetitle}</h4>
EOF;
 } } } 
$writedata .= <<<EOF

</div>
{$combinedata}
<script type="text/javascript">switchTab('{$idbase}', 1, {$combinecount});</script>

EOF;
?>