<?php 
$title = "InstaZip - Create Zip FIles Instantly";
require_once("../header.php");
?>
		<div class="content">
			<p>Create a zip file.</p>
			<form action="/toolset.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="toolset" id="toolset" value="InstaZip" />
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
