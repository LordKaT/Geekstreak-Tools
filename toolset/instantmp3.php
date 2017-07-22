<?php
if (!isset($_FILES["fileUpload"])) {
	echo "Oops, you didn't select a file.";
	exit;
}
$targetDir = "/home/tools_geekstreak_com/toolset/uploads/";
$targetFile = $targetDir . basename($_FILES["fileUpload"]["tmp_name"][0]);
$convertDir = "/home/tools_geekstreak_com/html/conversions/";
$convertFile = $convertDir . basename($_FILES["fileUpload"]["name"][0]) . ".mp3";
$downloadURL = "/conversions/" . basename($_FILES["fileUpload"]["name"][0]) . ".mp3";
$inputbitrate = filter_input(INPUT_POST, "bitrate");
$bitrate = "64";
switch ($inputbitrate) {
	case "8":
	case "16":
	case "24":
	case "32":
	case "40":
	case "48":
	case "64":
	case "80":
	case "96":
	case "112":
	case "128":
	case "160":
	case "192":
	case "224":
	case "256":
	case "320":
		$bitrate = $inputbitrate;
		break;
	default:
		$bitrate = "64";
}
$inputsamplerate = filter_input(INPUT_POST, "samplerate");
$samplerate = "44100";
switch ($inputsamplerate) {
	case "8":
		$samplerate = "8000";
		break;
	case "11":
		$samplerate = "11000";
		break;
	case "16":
		$samplerate = "16000";
		break;
	case "22":
		$samplerate = "22000";
		break;
	case "32":
		$samplerate = "32000";
		break;
	case "37":
		$samplerate = "37000";
		break;
	case "44.056":
		$samplerate = "44056";
		break;
	case "44.1":
		$samplerate = "44100";
		break;
	case "47":
		$samplerate = "47000";
		break;
	case "48":
		$samplerate = "48000";
		break;
	case "50":
		$samplerate = "50000";
		break;
	case "50.4":
		$samplerate = "50400";
		break;
	case "88.2":
		$samplerate = "88200";
		break;
	case "96":
		$samplerate = "96000";
		break;
	case "176":
		$samplerate = "176000";
		break;
	case "192":
		$samplerate = "192000";
		break;
	case "352.8":
		$samplerate = "352800";
		break;
	case "2822.4":
		$samplerate = "2822400";
		break;
	case "5644.8":
		$samplerate = "5644800";
		break;
	default:
		$samplerate = "44100";
		break;
}
if (!file_exists($targetFile)) {
	if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"][0], $targetFile)) {
		$cmd = "ffmpeg -i " . $targetFile . " -b:a " . $bitrate . "k -ar " . $samplerate . " -threads 1 \"" . $convertFile . "\"";
		$proc = popen($cmd, 'r');
		clearstatcache();
		sleep(1);
		// Either the conversion failed or the hard drive failed.
		if (file_exists($convertFile)) {
			echo "Complete! <br /> <a href=\"" . $downloadURL . "\" download=\"" . basename($_FILES["fileUpload"]["name"][0]) . ".mp3\">" . basename($_FILES["fileUpload"]["name"][0]) . ".mp3" . "</a>";
		} else {
			echo "Error: Conversion failed!";
		}
		unlink($targetFile);
		exit;
	} else {
		echo "Error!";
		exit;
	}
}
echo "Error!";
exit;
