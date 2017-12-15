let post_it = document.getElementById('new_list');

/* Listener for the title. */
document.getElementById('list_title_add').addEventListener('keydown', (event) => {

	if (event.keyCode == 13) {
		if (document.getElementById('list_title_add').value.length != 0) {
			ajax_update({'function': 'init_list', 'title': document.getElementById('list_title_add').value});
			document.getElementById('list_title_add').value = '';
		}
	}
});

let list_adders = document.getElementsByClassName('single_bulletpoint_add');
for (let i = 0; i < list_adders.length; i++) {

	list_adders[i].addEventListener('keydown', (event) => {

		if (event.keyCode == 13) {
			if (list_adders[i].value != '') {
				let id_list = list_adders[i].parentNode.parentNode.getAttribute('unique_id');
				ajax_update({'function': 'add_bulletpoint', 'content': list_adders[i].value, 'id_list': id_list});
			}
		}

	});
}

document.getElementById('filter').addEventListener('keydown', (event) => {
	if (event.keyCode == 13) {
		let search_term = document.getElementById('filter').value;

		let x = ajax_update({'function': 'search_keyword', 'keyword': search_term});

	}
});

let editables = document.getElementsByClassName('tick_item');
for (let i = 0; i < editables.length; i++) {

	editables[i].addEventListener('click', (event) => {
		console.log(editables[i].checked);
		let isChecked = 1;

		if (editables[i].checked) {
			isChecked = 0;
		}
		else
			isChecked = 1;


		let id_bp = editables[i].getAttribute('unique_id');
		ajax_update({'function': 'update_bulletpoint', 'content': editables[i].value, 'checked': isChecked, 'id_bp': id_bp});
	});
}

editables = document.getElementsByClassName('edit_item');
for (let i = 0; i < editables.length; i++) {

	editables[i].addEventListener('click', (event) => {
		let editable = editables[i];
		editable.removeAttribute('disabled');
		editable.setAttribute('value', '');
		editable.focus();
	});
}

editables = document.getElementsByClassName('delete_item');
for (let i = 0; i < editables.length; i++) {

	editables[i].addEventListener('click', (event) => {
		let id_bp = editables[i].getAttribute('unique_id');
		ajax_update({'function': 'delete_bulletpoint', 'id_bp': id_bp});
		editables[i].previousSibling.remove();
		editables[i].nextSibling.remove();
		editables[i].remove();
	});
}

editables = document.getElementsByClassName('item');
for (let i = 0; i < editables.length; i++) {

	editables[i].addEventListener('focusout', (event) => {
		editables[i].setAttribute('value', editables[i].value);
		let id_bp = editables[i].getAttribute('unique_id');
		ajax_update({'function': 'update_bulletpoint', 'content': editables[i].value, 'checked': 0, 'id_bp': id_bp});
		editables[i].setAttribute('disabled', '');
	});

	editables[i].addEventListener('dblclick', (event) => {
		console.log('this');
	});
}

let deletable = document.getElementsByClassName('delete_list_butt');
for (let i = 0; i < deletable.length; i++) {

	deletable[i].addEventListener('click', (event) => {
		let unique_id = deletable[i].parentNode.parentNode.getAttribute('unique_id');
		ajax_update({'function': 'delete_list', 'id_list': unique_id});
		deletable[i].parentNode.parentNode.remove();
	});
}


let extra_buttons_listener = function() {

	// Creates a HASHTAG input.
	/*let hashtags_input = document.createElement('input');
	hashtags_input.setAttribute('class', 'content');
	hashtags_input.setAttribute('id', 'hashtags');
	hashtags_input.setAttribute('type', 'text');
	hashtags_input.setAttribute('placeholder', 'Add tags...');

	hashtags_input.addEventListener('keydown', (event) => {

		if (event.keyCode == 188) {
			event.preventDefault();

			let hashtag = document.createElement('div');
			hashtag.setAttribute('id', 'list_tags');
			hashtag.innerHTML = hashtags_input.value;
			post_it.appendChild(hashtag);

			hashtags_input.value = ""; // Clear input from the hashtag input.
		}

	});

	post_it.appendChild(hashtags_input);*/

	document.getElementById('list_title_add').removeEventListener('click', extra_buttons_listener); // Only run once.
}

/**
 *	Sends an AJAX request to update a checkbox.
**/
let every_bulletpoint = document.getElementsByClassName('single_bulletpoint');

for (let i = 0; i < every_bulletpoint.length; i++) {
	every_bulletpoint[i].addEventListener('click', (event) => {

		let id_bp = every_bulletpoint[i].getAttribute('unique_id');
		console.log(id_bp);

		ajax_update({'function': 'update_bulletpoint', 'content': every_bulletpoint[i].textContent, 'checked': 'pila', 'id_bp': id_bp});
	});
}

document.getElementById('list_title_add').addEventListener('click', extra_buttons_listener);

/* Creates a new bullet point element. */
function bullet_factory() {
	let bullet = document.createElement('input');

	bullet.setAttribute('id', 'item');
	bullet.setAttribute('type', 'text');
	bullet.setAttribute('placeholder', 'Item');

	bullet.addEventListener('keydown', (event) => {
		if (event.keyCode == 13) { // ENTER key.
			if (bullet.value == '')
				return;

			//ajax_update({'function': 'add_bulletpoint'});

			if (bullet.nextSibling == null)
				bullet_factory();
			else
				bullet.nextSibling.focus(); // If it's behind bulletpoints, focus next.
		}
		else if (event.keyCode == 8 && bullet.value.length == 0) {
			event.preventDefault(); // Prevents deletion of last char of previous bulletpoint.
			bullet.remove();

			let prev_list_item = document.querySelector('#new_list > #item:last-child');

			if (prev_list_item == null)	// Adds listener to title if backspace brings user from item to it.
				document.getElementById('list_title_add').focus();

			else if (prev_list_item.id == 'item')
				prev_list_item.focus();
		}
	});

	post_it.append(bullet);
	bullet.focus();
}

/**
 *	Project/ filters logic.
**/
function switch_filter_tab(event, tab) {
	let tab_content = document.getElementsByClassName('tab_content');
	let tab_links = document.getElementsByClassName('tab_link');

	for (let i = 0; i < tab_content.length; i++)
		tab_content[i].style.display = 'none'; // Hide the content of every tab.

	for (let i = 0; i < tab_links.length; i++)
		tab_links[i].className = tab_links[i].className.replace('_active', '');

	document.getElementById(tab).style.display = 'block';
	event.currentTarget.className += '_active'; // Add active class to button that opened tab.
}





/* AJAX */

// Encode data properly for AJAX.
function ajax_encode(data) {
	return Object.keys(data).map(k => {
		return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
	}).join('&');
}

function ajax_update(data) {
	let request = new XMLHttpRequest();
	request.onload = ajax_request_listener;

	request.open('POST', "setter-db.php", true);
	request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	request.send(ajax_encode(data));
}

function ajax_request_listener() {
	console.log(this.responseText);
	location.reload();
}
