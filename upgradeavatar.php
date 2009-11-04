<?php

@set_magic_quotes_runtime(0);

@set_time_limit(0);

define('UC_SERVER_ROOT', '/data/apps/ucenter/current/');			//UCenter(uc_server) 路径
define('DISCUZ_ROOT', getcwd().'/');
define('IN_DISCUZ', TRUE);

$imgcategory = "3";        //头像转换三种情况：1.原论坛自带的头像图片；2.用户上传的图片;3.网络上的图片（建议这部分不要转换。这部分的转换需要到网上下载图片，因此如果超时，很可能转换出错。默认为不转换。如果用户认为必须转换，添加 3，如"1,2,3"）

if(!file_exists(UC_SERVER_ROOT.'./data/avatar')) {
	echo 'UCenter 路径不存在，请修改本工具设置正确';
	exit;
}

require DISCUZ_ROOT.'./include/db_mysql.class.php';
@include DISCUZ_ROOT.'./config.inc.php';
$db = new dbstuff();
$db->connect($dbhost, $dbuser, $dbpw, $dbname, $pconnect, FALSE, $dbcharset);
$dbuser = $dbpw = $dbname = $pconnect = NULL;
$start = $_GET['start'] ? intval($_GET['start']) : 0;
$total = $_GET['total'] ? intval($_GET['total']) : 0;
$limit = 200;
$charset = 'gbk';

$maxuid = @file(DISCUZ_ROOT.'forumdata/upgrademaxuid.log');
$maxuid = $maxuid ? $maxuid[0] : 0;
$category = explode(",", $imgcategory);

instheader();

if($start < 1){
	if(function_exists(gd_info)){
		$gdarray = gd_info();
		if(!($gdarray['GIF Read Support'] && $gdarray['GIF Create Support']) || !$gdarray['JPG Support'] || !$gdarray['PNG Support']){
			echo "GIF ----------------------- Not Support<br>";
			echo "JPG ----------------------- Not Support<br>";
			echo "PNG ----------------------- Not Support<br>";
			exit;
		}
	}else{
		echo '没有检测到 GD 库，请确认安装 GD 库';
		exit;
	}
}
	
$query = $db->query("SELECT uid, avatar FROM {$tablepre}memberfields LIMIT $start, $limit");
if(!$db->num_rows($query)) {
	echo "<br /><br /><br />导入完毕，共导入 $total 个头像！";
} else {
	while($data = $db->fetch_array($query)) {
  
  # Cao: fixing an issue caused by uid does not match because admin is created as first user
  $data['uid'] -= 1;
  
//avatars uploaded by customers
		if(preg_match_all('/^customavatars\/(.+)\.(.+)$/', $data['avatar'], $a)) {
			if(in_array("2", $category)){
				set_home($data['uid'], UC_SERVER_ROOT.'data/avatar');
				$data['uid'] += $maxuid;
				$avatar = DISCUZ_ROOT.'customavatars/'.$a[1][0].'.'.$a[2][0];
				$ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'middle');
				$avatar = str_replace('\\','/',$avatar);
				$ucavatar = str_replace('\\','/',$ucavatar);
				if(!file_exists($ucavatar)) {
					$create = FALSE;
					$img = new Image_Lite($avatar, $ucavatar);
					if($img->imagecreatefromfunc && $img->imagefunc) {
						if($img->Thumb(120, 120)) {
							$create = TRUE;
							$total++;
						}
					}
					if($create) {
						$ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'small');
						$ucavatar = str_replace('\\','/',$ucavatar);
						$img = new Image_Lite($avatar, $ucavatar);
						if($img->imagecreatefromfunc && $img->imagefunc) {
							$img->Thumb(48, 48);
						}
						$ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'big');
						$ucavatar = str_replace('\\','/',$ucavatar);
						@copy($avatar, $ucavatar);
						//echo '<img src="'.$ucavatar.'" />';
					}
				}
			}	
		}

//avatars of systerm		
		if(preg_match_all('/^images\/(.+)\.(.+)$/', $data['avatar'], $a)){
			if(in_array("1", $category)){
				set_home($data['uid'], UC_SERVER_ROOT.'data/avatar');
				$data['uid'] += $maxuid;
				$avatar = DISCUZ_ROOT.'images/'.$a[1][0].'.'.$a[2][0];
				$ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'middle');
				$avatar = str_replace('\\','/',$avatar);
				$ucavatar = str_replace('\\','/',$ucavatar);
				
				@copy($avatar, $ucavatar);
				$ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'small');
				$ucavatar = str_replace('\\','/',$ucavatar);
				@copy($avatar, $ucavatar);
				$ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'big');
				$ucavatar = str_replace('\\','/',$ucavatar);
				@copy($avatar, $ucavatar);
        $total++;
				
        // if(!file_exists($ucavatar)) {
        //  $create = FALSE;
        //  $img = new Image_Lite($avatar, $ucavatar);
        //  if($img->imagecreatefromfunc && $img->imagefunc) {
        //             if($img->Thumb(120, 120)) {
        //      $create = TRUE;
        //      $total++;
        //             }
        //  }
        //  if($create) {
        //    $ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'small');
        //    $ucavatar = str_replace('\\','/',$ucavatar);
        //    $img = new Image_Lite($avatar, $ucavatar);
        //    if($img->imagecreatefromfunc && $img->imagefunc) {
        //      $img->Thumb(48, 48);
        //    }
        //    $ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'big');
        //    $ucavatar = str_replace('\\','/',$ucavatar);
        //    @copy($avatar, $ucavatar);
        //    //echo '<img src="'.$ucavatar.'" />';
        //  }
        // }
			}
			
		}


//avatars from internet
		if(preg_match_all('/^http(.+)\.(.+)$/', $data['avatar'], $a)){
			if(in_array("3", $category)){
				set_home($data['uid'], UC_SERVER_ROOT.'data/avatar');
				$data['uid'] += $maxuid;
				$avatar = $data['avatar'];
				$ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'middle');
				$ucavatar = str_replace('\\','/',$ucavatar);
				$ucavatar_middle = $ucavatar;
				
        // echo $data['avatar']." => ".$ucavatar;
        // // create a new cURL resource
        // $ch = curl_init();
        // // set URL and other appropriate options
        // curl_setopt($ch, CURLOPT_URL, $data['avatar']);
        // curl_setopt($ch, CURLOPT_FILE, $ucavatar);
        // // grab URL and pass it to the browser
        // curl_exec($ch);
        // // close cURL resource, and free up system resources
        // curl_close($ch);
				
				@copy($avatar, $ucavatar);
				$ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'small');
				$ucavatar = str_replace('\\','/',$ucavatar);
				@copy($ucavatar_middle, $ucavatar);
				$ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'big');
				$ucavatar = str_replace('\\','/',$ucavatar);
				@copy($ucavatar_middle, $ucavatar);
        $total++;
					
        // if(!file_exists($ucavatar)) {
        //  $create = FALSE;
        //  $img = new Image_Lite($avatar, $ucavatar);
        //  if($img->imagecreatefromfunc && $img->imagefunc) {
        //             if($img->Thumb(120, 120)) {
        //      $create = TRUE;
        //      $total++;
        //             }
        //  }
        //  if($create) {
        //    $ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'small');
        //    $ucavatar = str_replace('\\','/',$ucavatar);
        //    $img = new Image_Lite($avatar, $ucavatar);
        //    if($img->imagecreatefromfunc && $img->imagefunc) {
        //      $img->Thumb(48, 48);
        //    }
        //    $ucavatar = UC_SERVER_ROOT.'data/avatar/'.get_avatar($data['uid'], 'big');
        //    $ucavatar = str_replace('\\','/',$ucavatar);
        //    @copy($avatar, $ucavatar);
        //    //echo '<img src="'.$ucavatar.'" />';
        //  }
        // }
			}
		}
	}

	$end = $start + $limit;
	$url_forward = "upgradeavatar.php?start=$end&total=$total";
	echo "<br /><br /><br /><a href=\"$url_forward\">已导入 $total 个头像，请等待 ...</a><script>setTimeout(\"redirect('$url_forward');\", 1250);</script>";
}

instfooter();

function instheader() {
	global $charset, $version;

	echo "<html><head>".
		"<meta http-equiv=\"Content-Type\" content=\"text/html; charset=$charset\">".
		"<title>非UC机制头像 &gt;&gt; UC机制头像 转换向导</title>".
		"<style type=\"text/css\">
		a {
			color: #3A4273;
			text-decoration: none
		}

		a:hover {
			color: #3A4273;
			text-decoration: underline
		}

		body, table, td {
			color: #3A4273;
			font-family: Tahoma, Verdana, Arial;
			font-size: 12px;
			line-height: 20px;
			scrollbar-base-color: #E3E3EA;
			scrollbar-arrow-color: #5C5C8D
		}

		input {
			color: #085878;
			font-family: Tahoma, Verdana, Arial;
			font-size: 12px;
			background-color: #3A4273;
			color: #FFFFFF;
			scrollbar-base-color: #E3E3EA;
			scrollbar-arrow-color: #5C5C8D
		}

		.install {
			font-family: Arial, Verdana;
			font-size: 20px;
			font-weight: bold;
			color: #000000
		}

		.message {
			background: #E3E3EA;
			padding: 20px;
		}

		.altbg1 {
			background: #E3E3EA;
		}

		.altbg2 {
			background: #EEEEF6;
		}

		.header td {
			color: #FFFFFF;
			background-color: #3A4273;
			text-align: center;
		}

		.option td {
			text-align: center;
		}

		.redfont {
			color: #FF0000;
		}
		</style>
		<script type=\"text/javascript\">
		function redirect(url) {
			window.location=url;
		}
		function $(id) {
			return document.getElementById(id);
		}
		</script>
		</head>".
		"<body bgcolor=\"#3A4273\" text=\"#000000\"><div id=\"append_parent\"></div>".
		"<table width=\"95%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#FFFFFF\" align=\"center\"><tr><td>".
      		"<table width=\"98%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\"><tr>".
          	"<td class=\"install\" height=\"30\" valign=\"bottom\"><font color=\"#FF0000\"> 非UC机制头像 &gt;&gt; UC机制头像 转换向导 </font>".
          	"</td></tr><tr><td><hr noshade align=\"center\" width=\"100%\" size=\"1\"></td></tr><tr><td colspan=\"2\">";
}

function instfooter() {
	global $version;

	echo "</td></tr><tr><td><hr noshade align=\"center\" width=\"100%\" size=\"1\"></td></tr>".
        	"<tr><td align=\"center\">".
            	"<b style=\"font-size: 11px\">Powered by <a href=\"http://discuz.net\" target=\"_blank\">Discuz!".
          	"</a> &nbsp; Copyright &copy; <a href=\"http://www.comsenz.com\" target=\"_blank\">Comsenz Inc.</a> 2001-2009</b><br /><br />".
          	"</td></tr></table></td></tr></table>".
		"</body></html>";
}


function set_home($uid, $dir = '.') {
	$uid = abs(intval($uid));
	$uid = sprintf("%09d", $uid);
	$dir1 = substr($uid, 0, 3);
	$dir2 = substr($uid, 3, 2);
	$dir3 = substr($uid, 5, 2);
	!is_dir($dir.'/'.$dir1) && mkdir($dir.'/'.$dir1, 0777);
	!is_dir($dir.'/'.$dir1.'/'.$dir2) && mkdir($dir.'/'.$dir1.'/'.$dir2, 0777);
	!is_dir($dir.'/'.$dir1.'/'.$dir2.'/'.$dir3) && mkdir($dir.'/'.$dir1.'/'.$dir2.'/'.$dir3, 0777);
	return $dir1.'/'.$dir2.'/'.$dir3;
}

/**
 * 根据用户的 uid 得到用户的 home 目录
 *
 * @param int $uid
 * @return string
 */
function get_home($uid) {
	$uid = abs(intval($uid));
	$uid = sprintf("%09d", $uid);
	$dir1 = substr($uid, 0, 3);
	$dir2 = substr($uid, 3, 2);
	$dir3 = substr($uid, 5, 2);
	return $dir1.'/'.$dir2.'/'.$dir3;
}

function get_avatar($uid, $size = 'big') {
	$size = in_array($size, array('big', 'middle', 'small')) ? $size : 'big';
	$uid = abs(intval($uid));
	$uid = sprintf("%09d", $uid);
	$dir1 = substr($uid, 0, 3);
	$dir2 = substr($uid, 3, 2);
	$dir3 = substr($uid, 5, 2);
	return $dir1.'/'.$dir2.'/'.$dir3.'/'.substr($uid, -2)."_avatar_$size.jpg";
}

class Image_Lite {

	var $attachinfo = '';
	var $srcfile = '';
	var $targetfile = '';
	var $imagecreatefromfunc = '';
	var $imagefunc = '';
	var $attach = array();
	var $animatedgif = 0;

	function Image_Lite($srcfile, $targetfile) {
		$this->srcfile = $srcfile;
		$this->targetfile = $targetfile;
		$this->attachinfo = @getimagesize($srcfile);

		switch($this->attachinfo['mime']) {
			case 'image/jpeg':
				$this->imagecreatefromfunc = function_exists('imagecreatefromjpeg') ? 'imagecreatefromjpeg' : '';
				$this->imagefunc = function_exists('imagejpeg') ? 'imagejpeg' : '';
				break;
			case 'image/gif':
				$this->imagecreatefromfunc = function_exists('imagecreatefromgif') ? 'imagecreatefromgif' : '';
				$this->imagefunc = function_exists('imagegif') ? 'imagegif' : '';
				break;
			case 'image/png':
				$this->imagecreatefromfunc = function_exists('imagecreatefrompng') ? 'imagecreatefrompng' : '';
				$this->imagefunc = function_exists('imagepng') ? 'imagepng' : '';
				break;
		}

		$this->attach['size'] = @filesize($srcfile);
		if($this->attachinfo['mime'] == 'image/gif') {
			$fp = fopen($srcfile, 'rb');
			$targetfilecontent = fread($fp, $this->attach['size']);
			fclose($fp);
			$this->animatedgif = strpos($targetfilecontent, 'NETSCAPE2.0') === FALSE ? 0 : 1;
		}
	}

	function Thumb($thumbwidth, $thumbheight, $preview = 0) {
		$return = $this->Thumb_GD($thumbwidth, $thumbheight);
		$this->attach['size'] = @filesize($this->targetfile);
		return $return;
	}

	function Thumb_GD($thumbwidth, $thumbheight) {
		if(function_exists('imagecreatetruecolor') && function_exists('imagecopyresampled') && function_exists('imagejpeg')) {
			
			$imagecreatefromfunc = $this->imagecreatefromfunc;
			$imagefunc = $this->imagefunc;
			list($img_w, $img_h) = $this->attachinfo;

			if(!$this->animatedgif) {                                                         // && ($img_w >= $thumbwidth || $img_h >= $thumbheight)
				$attach_photo = $imagecreatefromfunc($this->srcfile);

				$imgratio = $img_w / $img_h;
				$thumbratio = $thumbwidth / $thumbheight;

				if($imgratio >= 1 && $imgratio >= $thumbratio || $imgratio < 1 && $imgratio > $thumbratio) {
					$cuty = $img_h;
					$cutx = $cuty * $thumbratio;
				} elseif($imgratio >= 1 && $imgratio <= $thumbratio || $imgratio < 1 && $imgratio < $thumbratio) {
					$cutx = $img_w;
					$cuty = $cutx / $thumbratio;
				}

				$dst_photo = imagecreatetruecolor($cutx, $cuty);
				imageCopyMerge($dst_photo, $attach_photo, 0, 0, 0, 0, $cutx, $cuty, 100);

				$thumb['width'] = $thumbwidth;
				$thumb['height'] = $thumbheight;

				$targetfile = $this->targetfile;

				$thumb_photo = imagecreatetruecolor($thumb['width'], $thumb['height']);
				imageCopyreSampled($thumb_photo, $dst_photo ,0, 0, 0, 0, $thumb['width'], $thumb['height'], $cutx, $cuty);
				clearstatcache();
				if($this->attachinfo['mime'] == 'image/jpeg') {
					$imagefunc($thumb_photo, $targetfile, 100);
				} else {
					$imagefunc($thumb_photo, $targetfile);
				}
				return TRUE;
			}
		}
		return FALSE;
	}

}

?>