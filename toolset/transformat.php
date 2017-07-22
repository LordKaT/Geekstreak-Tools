<?php
if (!isset($_FILES["fileUpload"])) {
	echo "Oops, you didn't select a file.";
	exit;
}

$ext = filter_input(INPUT_POST, "ext");

switch ($ext) {
	/* Video */
	case "asf":
	case "avi":
	case "dvd":
	case "flv":
	case "mkv":
	case "mp4":
	case "mpeg":
	case "ogg":
	case "webm":

	/* Audio */
	case "aiff":
	case "flac":
	case "mp2":
	case "mp3":
        case "mp4a":
	case "oga":
	case "opus":

	/* Image */
	case "bmp":
	case "gif":
	case "jpg":
	case "png":
	case "tiff":
		break;
	default:
		echo "Invalid Format";
		exit;
}

$targetFile = $targetDir . basename($_FILES["fileUpload"]["tmp_name"][0]);
$convertName = basename($_FILES["fileUpload"]["name"][0]) . "." . $ext;
$convertFile = $convertDir . $convertName;
$downloadURL = "/conversions/" . $convertName;

if (!file_exists($targetFile)) {
	if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"][0], $targetFile)) {
		$cmd = "ffmpeg -i " . $targetFile . " -threads 1 " . $convertFile;
		$proc = popen($cmd, 'r');
		clearstatcache();
		sleep(1);
		// Either the conversion failed or the hard drive failed.
		if (file_exists($convertFile)) {
			echo "Complete! <br /> <a href=\"" . $downloadURL . "\" download=\"" . $convertName . "\">" . $convertName . "</a>";
		} else {
			echo "Error: Transcode failed!";
		}
		unlink($targetFile);
		exit;
	} else {
		echo "Error: Transcode  failed!";
		exit;
	}
}
echo "Error: Transcode failed!";
exit;
