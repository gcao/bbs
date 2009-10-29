<?php

/*
	[Discuz!] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: redirect.php 19733 2009-09-09 09:56:16Z monkey $
*/

define('CURSCRIPT', 'viewthread');

require_once './include/common.inc.php';

if($goto == 'findpost') {

	$pid = intval($pid);
	$ptid = intval($ptid);

	if($post = $db->fetch_first("SELECT p.tid, p.dateline, t.special FROM {$tablepre}posts p LEFT JOIN {$tablepre}threads t USING(tid) WHERE p.pid='$pid'")) {
		$sqladd = $post['special'] ? "AND first=0" : '';
		$page = ceil($db->result_first("SELECT count(*) FROM {$tablepre}posts WHERE tid='$post[tid]' AND dateline<='$post[dateline]' $sqladd") / $ppp);
		if(!empty($special) && $special == 'trade') {
			dheader("Location: viewthread.php?do=tradeinfo&tid=$post[tid]&pid=$pid");
		} else {
			$extra = '';
			if($discuz_uid) {
				if($db->result_first("SELECT count(*) FROM {$tablepre}favoritethreads WHERE tid='$post[tid]' AND uid='$discuz_uid'")) {
					$db->query("UPDATE {$tablepre}favoritethreads SET newreplies=0 WHERE tid='$post[tid]' AND uid='$discuz_uid'", 'UNBUFFERED');
					$db->query("DELETE FROM {$tablepre}promptmsgs WHERE uid='$discuz_uid' AND typeid='".$prompts['threads']['id']."' AND extraid='$post[tid]'", 'UNBUFFERED');
					$extra = '&fav=yes';
				}
			}
			dheader("Location: viewthread.php?tid=$post[tid]&rpid=$pid$extra&page=$page".(isset($_GET['modthreadkey']) && ($modthreadkey=modthreadkey($post['tid'])) ? "&modthreadkey=$modthreadkey": '')."#pid$pid");
		}
	} else {
		$ptid = !empty($ptid) ? intval($ptid) : 0;
		if($ptid) {
			dheader("location: viewthread.php?tid=$ptid");
		}
		showmessage('post_check', NULL, 'HALTED');
	}
}

$tid = $forum['closed'] < 2 ? $tid : $forum['closed'];

if(empty($tid)) {
	showmessage('thread_nonexistence');
}

if(isset($fid) && empty($forum)) {
	showmessage('forum_nonexistence', NULL, 'HALTED');
}

@include DISCUZ_ROOT.'./forumdata/cache/cache_viewthread.php';

if($goto == 'lastpost') {

	if($tid) {
		$query = $db->query("SELECT tid, replies, special FROM {$tablepre}threads WHERE tid='$tid' AND displayorder>='0'");
	} else {
		$query = $db->query("SELECT tid, replies, special FROM {$tablepre}threads WHERE fid='$fid' AND displayorder>='0' ORDER BY lastpost DESC LIMIT 1");
	}
	if(!$thread = $db->fetch_array($query)) {
		showmessage('thread_nonexistence');
	}
	$page = ceil(($thread['special'] ? $thread['replies'] : $thread['replies'] + 1) / $ppp);
	$tid = $thread['tid'];

	require_once DISCUZ_ROOT.'./viewthread.php';
	exit();

} elseif($goto == 'nextnewset') {

	if($fid && $tid) {
		$this_lastpost = $db->result_first("SELECT lastpost FROM {$tablepre}threads WHERE tid='$tid' AND displayorder>='0'");
		if($next = $db->fetch_first("SELECT tid FROM {$tablepre}threads WHERE fid='$fid' AND displayorder>='0' AND lastpost>'$this_lastpost' ORDER BY lastpost ASC LIMIT 1")) {
			$tid = $next['tid'];
			require_once DISCUZ_ROOT.'./viewthread.php';
			exit();
		} else {
			showmessage('redirect_nextnewset_nonexistence');
		}
	} else {
		showmessage('undefined_action', NULL, 'HALTED');
	}

} elseif($goto == 'nextoldset') {

	if($fid && $tid) {
		$this_lastpost = $db->result_first("SELECT lastpost FROM {$tablepre}threads WHERE tid='$tid' AND displayorder>='0'");
		if($last = $db->fetch_first("SELECT tid FROM {$tablepre}threads WHERE fid='$fid' AND displayorder>='0' AND lastpost<'$this_lastpost' ORDER BY lastpost DESC LIMIT 1")) {
			$tid = $last['tid'];
			require_once DISCUZ_ROOT.'./viewthread.php';
			exit();
		} else {
			showmessage('redirect_nextoldset_nonexistence');
		}
	} else {
		showmessage('undefined_action', NULL, 'HALTED');
	}

} else {
	showmessage('undefined_action', NULL, 'HALTED');
}

?>