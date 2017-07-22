<?php
if (!isset($_FILES["fileUpload"])) {
	echo "Oops, you didn't select a file.";
	exit;
}

$targetFile = $targetDir . basename($_FILES["fileUpload"]["tmp_name"][0]);
$convertName = basename($_FILES["fileUpload"]["tmp_name"][0]) . "." . pathinfo($_FILES["fileUpload"]["name"][0], PATHINFO_EXTENSION);
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
			echo "Complete! <br /> <a href=\"" . $downloadURL . "\" download=\"" . $_FILES["fileUpload"]["name"][0] . "\">" . $_FILES["fileUpload"]["name"][0] . "</a>";
		} else {
			echo "Error: Chew failed!";
		}
		unlink($targetFile);
		exit;
	} else {
		echo "Error:Chew  failed!";
		exit;
	}
}
echo "Error: Chew failed!";
exit;
