<?php
if (!isset($_FILES["fileUpload"])) {
	echo "Oops, you didn't select a file.";
	exit;
}

$convertFile = $convertDir . basename($_FILES["fileUpload"]["tmp_name"][0]) . ".zip";
$downloadURL = "/conversions/" . basename($_FILES["fileUpload"]["tmp_name"][0]) . ".zip";

for ($i = 0; $i < count($_FILES["fileUpload"]["tmp_name"]); $i++) {
	$targetFile = $targetDir . htmlspecialchars(basename($_FILES["fileUpload"]["name"][$i]));
	if (!file_exists($targetFile)) {
		if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"][$i], $targetFile)) {
			$cmd = "zip -9 -j -D " . $convertFile . " \"" . $targetFile . "\"";
			$proc = popen($cmd, 'r');
			clearstatcache();
			sleep(2);
			unlink($targetFile);
		} else { echo "Error!"; }
	} else { echo "Error!"; }
}
sleep(3);
// Either the conversion failed or the hard drive failed.
if (file_exists($convertFile)) {
	echo "Complete! <br /> <a href=\"" . $downloadURL . "\" download=\"" . basename($_FILES["fileUpload"]["tmp_name"][0]) . ".zip\">" . basename($_FILES["fileUpload"]["tmp_name"][0]) . ".zip" . "</a>";
} else {
	echo "Error: Zip failed!";
}
exit;
