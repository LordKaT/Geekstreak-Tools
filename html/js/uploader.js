var g_ready = true;
function _(l) { return document.getElementById(l); }
function get_tag_data(tag, formdata) {
	var inputs = document.getElementsByTagName(tag);
	for (var i = 0; i < inputs.length; i++) {
		if (inputs[i].name !== "fileUpload") {
			formdata.append(inputs[i].name, inputs[i].value);
		}
	}
}
function reset(msg) {
	_("status").innerHTML = msg;
	_("progressBar").value = 0;
	//_("fileName").innerHTML = "";
	g_ready = true;
}
function upload_file() {
	var file = _("fileUpload").files[0];
	if (file === undefined || file === null) {
		_("status").innerHTML = "Oops, you didn't select a file!";
		return;
	}
	if (g_ready === false) { return; }
	g_ready = false;
	var formdata = new FormData();
	get_tag_data("input", formdata);
	get_tag_data("select", formdata);
	for (var i = 0; i < _("fileUpload").files.length; i++) {
		formdata.append("fileUpload[]", _("fileUpload").files[i]);
	}
	_("progressBar").style.visibility = "visible";
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", handler_progress, false);
	ajax.addEventListener("load", handler_complete, false);
	ajax.addEventListener("error", handler_error, false);
	ajax.addEventListener("abort", handler_abort, false);
	ajax.open("POST", "/toolset.php");
	ajax.send(formdata);
	return;
}
function handler_progress(event) {
	_("loaded").innerHTML = "Uploaded " + Math.round(event.loaded/1000) +" KB of " + Math.round(event.total/1000) + " KB";
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	if (Math.round(percent) < 100) {
		_("status").innerHTML = "Uploading";
	} else {
		_("loaded").innerHTML = "Upload complete.";
		if (_("toolset").value === "InstantMP3") {
			_("status").innerHTML = 'Converting';
		} else if (_("toolset").value === "MediaChew") {
			_("status").innerHTML = 'Chewing';
		} else if (_("toolset").value === "TransFormat") {
			_("status").innerHTML = 'Transcoding';
		} else if (_("toolset").value === "InstaZip") {
			_("status").innerHTML = "Zipping";
		} else if (_("toolset").value === "NoMorePDF") {
			_("status").innerHTML = "De-PDFing";
		} else { }
		_("status").innerHTML += '<br /><img src="/img/loader.gif" />';
	}
}
function handler_complete(event) { reset(event.target.responseText); }
function handler_error(event) { reset("Upload Failed!"); }
function handler_abort(event) { reset("Upload Aborted!"); }
