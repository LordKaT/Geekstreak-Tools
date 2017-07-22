<?php
function uuidv4() {
	return sprintf("%04x%04x-%04x-%04x-%04x-%04x%04x%04x",
			mt_rand(0, 0xffff),
			mt_rand(0, 0xffff),
			mt_rand(0, 0xffff),
			mt_rand(0, 0x0fff) | 0x4000,
			mt_rand(0, 0x3fff) | 0x8000,
			mt_rand(0, 0xffff),
			mt_rand(0, 0xffff),
			mt_rand(0, 0xffff));
}

$toolset = filter_input(INPUT_POST, "toolset");
if (!isset($toolset)) { exit; }

$targetDir = "/home/tools_geekstreak_com/toolset/uploads/";
$convertDir = "/home/tools_geekstreak_com/html/conversions/";

switch ($toolset) {
	case "InstantMP3":
		require_once("../toolset/instantmp3.php");
		break;
	case "MediaChew":
		require_once("../toolset/mediachew.php");
		break;
	case "TransFormat":
		require_once("../toolset/transformat.php");
		break;
	case "InstaZip":
		require_once("../toolset/instazip.php");
		break;
	case "NoMorePDF":
		require_once("../toolset/nomorepdf.php");
		break;
	default:
		break;
}
