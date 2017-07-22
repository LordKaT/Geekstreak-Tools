<?php 
$title = "Media Chew - fix your broken media files";
require_once("../header.php");
?>
		<div class="content">
			This program will chew on broken media files and try to output
			a file that may work.<br />Successful results not guaranteed.
			<br />&nbsp;<br />
			<form action="/toolset.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="toolset" id="toolset" value="MediaChew" />
				<input type="file" name="fileUpload" id="fileUpload" class="fileUpload" />
				<br />&nbsp;<br />
				<input type="button" value="Chew File" onclick="upload_file();">
				<br />&nbsp;<br />
				<progress id="progressBar" value="0" max="100"></progress><br />
				<div id="loaded"></div><br />
				<div id="status"></div>
			</form>
		</div>
<?php require_once("../footer.php"); ?>
