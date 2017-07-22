<?php
if (!isset($_FILES["fileUpload"])) {
	echo "Oops, you didn't select a file.";
	exit;
}
$targetFile = $targetDir . htmlspecialchars(basename($_FILES["fileUpload"]["name"][0]));
$convertFile = $convertDir . basename($_FILES["fileUpload"]["tmp_name"][0]) . "/" . basename($_FILES["fileUpload"]["tmp_name"][0]) . ".png";
$downloadURL = "/conversions/" . basename($_FILES["fileUpload"]["tmp_name"][0]) . ".zip";
if (!file_exists($targetFile)) {
	mkdir($convertDir . basename($_FILES["fileUpload"]["tmp_name"][0]));
	if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"][0], $targetFile)) {
		$cmd = "convert " . $targetFile. " " . $convertFile;
		$proc = popen($cmd, "r");
		sleep(5);
		$cmd = "zip -r -9 -j -D " . $convertDir . basename($_FILES["fileUpload"]["tmp_name"][0]) . ".zip" . " " . $convertDir . basename($_FILES["fileUpload"]["tmp_name"][0]);
		$proc = popen($cmd, "r");
		sleep(5);
		// Either the conversion failed or the hard drive failed.
		if (file_exists($convertDir . basename($_FILES["fileUpload"]["tmp_name"][0]) . ".zip")) {
			echo "Complete! <br /> <a href=\"" . $downloadURL . "\" download=\"" . basename($_FILES["fileUpload"]["name"][0]) . ".zip\">" . basename($_FILES["fileUpload"]["name"][0]) . ".zip" . "</a>";
		} else {
			echo "Error: Conversion failed!";
		}
		unlink($targetFile);
		$cmd = "rm -rf " . $convertDir . basename($_FILES["fileUpload"]["tmp_name"][0]);
		$proc = popen($cmd, "r");
		exit;
	} else {
		echo "Error 1!";
		exit;
	}
}
echo "Error 2!";
exit;
