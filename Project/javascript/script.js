let post_it = document.getElementById('new_list');

window.onload = function() {
	ajax_update({'function': 'init_list'});
}

/* Listener for the title. */
document.getElementById('list_title_add').addEventListener('keydown', (event) => {
	
	if (event.keyCode == 13) {
		let first_item = document.getElementById('item'); // First element item sibling.

		let title_unique_id = document.getElementById('new_list').getAttribute('unique_id');
		let title_content = document.getElementById('list_title_add').value;
		ajax_update({'function': 'update_title', 'title': title_content, 'id_list': title_unique_id});

		if (first_item == null) {
			bullet_factory();
			document.getElementById('item').focus();
		}
		else
			first_item.focus();
	}
});

let extra_buttons_listener = function() {

	// Creates a DONE button.
	let save_button = document.createElement('button');
	save_button.setAttribute('id', 'save_button');
	save_button.setAttribute('type', 'submit');
	save_button.innerHTML = "Done";
	post_it.appendChild(save_button);

	// Creates a HASHTAG input.
	let hashtags_input = document.createElement('input');
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

	post_it.appendChild(hashtags_input);

	document.getElementById('list_title_add').removeEventListener('click', extra_buttons_listener); // Only run once.
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
}