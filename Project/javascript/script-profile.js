let upload_profile_pic = document.getElementById('upload_file');

/**
 *	Profile picture upload handler.
**/
upload_profile_pic.addEventListener('change', (event) => {

	let name = upload_button.files[0]['name'];
	let extension = upload_button.files[0]['type'];
	let size = upload_button.files[0]['size'];
	let last_modified = upload_button.files[0]['lastModified'];

	// TODO: Add AJAX communication with PHP to provide these parsed args.
});