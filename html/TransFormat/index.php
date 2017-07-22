<?php 
$title = "TransFormat - Transcode Media Files";
require_once("../header.php");
?>
		<div class="content">
			<p>This program will transcode a media file to the selected format.</p>
			<form action="/toolset.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="toolset" id="toolset" value="TransFormat" />
				<div style="width: 400px; margin-left: auto; margin-right: auto;">
					<div style="width: 200px; float: left; margin-top: 10%;">
						<input type="file" name="fileUpload" id="fileUpload" class="fileUpload" />
					</div>
					<div style="width: 200px; float: right;">
						<p><b>End Format</b></p>
						<p>
							<select name="ext" class="dropdown" id="ext">
								<optgroup label="Video">
									<option value="asf">asf</option>
									<option value="avi">avi</option>
									<option value="dvd">dvd</option>
									<option value="flv">flv</option>
									<option value="mkv">mkv</option>
									<option value="m4v">m4v</option>
									<option value="mp4" selected>mp4</option>
									<option value="mpeg">mpeg</option>
									<option value="ogg">ogg video</option>
									<option value="webm">webm</option>
								</optgroup>
								<optgroup label="Audio">
									<option value="aiff">aiff</option>
									<option value="flac">flac</option>
									<option value="mp2">mp2</option>
									<option value="mp3">mp3</option>
                                                                        <option value="m4a">m4a</option>
									<option value="oga">ogg audio</option>
									<option value="opus">opus</option>
								</optgroup>
								<optgroup label="Image">
									<option value="bmp">bmp</option>
									<option value="gif">gif</option>
									<option value="jpg">jpg</option>
									<option value="png">png</option>
									<option value="tiff">tiff</option>
								</optgroup>
							</select>
						</p>
					</div>
				</div>
				<br clear="both" />
				<div style="width: 50px; text-align: center; margin-left: auto; margin-right: auto;">
					<p>
						<input type="button" value="Transcode File" class = "submit" onclick="upload_file();" />
					</p>
				</div>
			</form>
			<p>
				<progress id="progressBar" value="0" max="100"></progress><br />
				<div id="loaded"></div><br />
				<div id="status"></div>
			</p>
		</div>
<?php require_once("../footer.php"); ?>
