<?php 
$title = "NoMorePDF - Turn that PDF into a PNG!";
require_once("../header.php");
?>
		<div class="content">
			<p>
				Create a zip of png images from a pdf.<br />
				Some PDF's make look terrible because of protections. Sorry.
			</p>
			<form action="/toolset.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="toolset" id="toolset" value="NoMorePDF" />
				<input type="file" name="fileUpload" id="fileUpload" class="fileUpload" />
				<br />&nbsp;<br />
				<input type="button" value="Upload File" class = "submit" onclick="upload_file();">
				<br />&nbsp;<br />
				<progress id="progressBar" value="0" max="100"></progress><br />
				<div id="loaded"></div><br />
				<div id="status"></div>
			</form>
		</div>
<?php require_once("../footer.php"); ?>
