<?php 
$title = "Instant MP3 Creator";
require_once("../header.php");
?>
		<div class="content">
			Convert almost any file with an audio track to an MP3 file.
			<br />&nbsp;<br />
			<form action="/toolset.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="toolset" id="toolset" value="InstantMP3" />
				<div style="width: 400px; margin-left: auto; margin-right: auto;">
					<div style="width: 200px; float: left; margin-top: 20%;">
						<input type="file" name="fileUpload" id="fileUpload" class="fileUpload" />
					</div>
					<div style="width: 200px; float: right;">
						<p><b>Options</b></p>
						<p>
							<select name="bitrate" class="dropdown" id="bitrate">
								<optgroup label="Bitrate">
									<option value="8">8 kbps</option>
									<option value="16">16 kbps</option>
									<option value="24">24 kbps</option>
									<option value="32">32 kbps</option>
									<option value="48">48 kbps</option>
									<option value="64" selected>64 kbps</option>
									<option value="80">80 kbps</option>
									<option value="96">96 kbps</option>
									<option value="112">112 kbps</option>
									<option value="128">128 kbps</option>
									<option value="160">160 kbps</option>
									<option value="192">192 kbps</option>
									<option value="224">224 kbps</option>
									<option value="256">256 kbps</option>
									<option value="320">320 kbps</option>
								</optgroup>
							</select>
						</p>
						<p>
							<select name="samplerate" class="dropdown" id="samplerate">
								<optgroup label="Sample rate">
									<option value="8">8 kHz</option>
									<option value="11">11.025 kHz</option>
									<option value="16">16 kHz</option>
									<option value="22">22.050 kHz</option>
									<option value="32">32 kHz</option>
									<option value="37">37.800 kHz</option>
									<option value="44.056">44.056 kHz</option>
									<option value="44.1" selected>44.1 kHz</option>
									<option value="47">47.250 kHz</option>
									<option value="48">48 kHz</option>
									<option value="50">50 kHz</option>
									<option value="50.4">50.4 kHz</option>
									<option value="88.2">88.2 kHz</option>
									<option value="96">96 kHz</option>
									<option value="176">176 kHz</option>
									<option value="192">192 kHz</option>
									<option value="352.8">352.8 kHz</option>
									<option value="2822.4">2822.4 kHz</option>
									<option value="5644.8">5644.8 kHz</option>
								</optgroup>
							</select>
						</p>
					</div>
				</div>
				<br clear="both" />
				<div style="width: 50px; text-align: center; margin-left: auto; margin-right: auto;">
					<p>
						<input type="button" value="Make MP3" onclick="upload_file();" />
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
