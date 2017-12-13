let upload_profile_pic = document.getElementById('upload_file');

/**
 *	Profile picture upload handler.
**/
upload_profile_pic.addEventListener('change', (event) => {

	let name = upload_button.files[0]['name'];
	let extension = upload_button.files[0]['type'];
	let size = upload_button.files[0]['size'];
	let last_modified = upload_button.files[0]['lastModified'];

	ajax_update({'function': 'upload_file', 'name': name, 'extension': extension, 'size': size, 'last_modified': last_modified});
});

/**
 *	AJAX logic.
**/
function ajax_encode(data) { // Encode data properly for AJAX.
	return Object.keys(data).map(k => {
		return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
	}).join('&');
}

function ajax_update(data) {
	let request = new XMLHttpRequest();
	request.onload = ajax_request_listener;

	request.open('POST', "databases/setter-db.php", true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	request.send(ajax_encode(data));
}

function ajax_request_listener() {
	console.log(this.responseText);
}