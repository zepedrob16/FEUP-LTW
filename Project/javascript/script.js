let todo_add_button = document.getElementById('todo_add_button');
let post_it = document.getElementById('list_adder');
let todo_title = document.createElement('input');

window.onload = function() {
	ajax_update({'function': 'init_list'});
}

/* Listener for the title. */
let keydown_title_listener = function(event) {
	
	if (event.keyCode == 13) {
		let first_item = document.getElementById('item'); // First element item sibling.

		if (first_item == null) {
			bullet_factory();
			document.getElementById('item').focus();
		}
		else
			first_item.focus();
	}
}

todo_add_button.addEventListener('click', (event) => {

	// Reset the to-do list by deleting the title and every bullet.
	while (post_it.firstChild)
		post_it.removeChild(post_it.firstChild);

	// Creates a new title element.
	let new_todo_title = document.createElement('input');
	new_todo_title.setAttribute('class', 'content');
	new_todo_title.setAttribute('id', 'list_title');
	new_todo_title.setAttribute('type', 'text');
	new_todo_title.setAttribute('placeholder', 'Title');

	new_todo_title.addEventListener('keydown', keydown_title_listener, false);

	post_it.append(new_todo_title);
	new_todo_title.focus();
	todo_title = new_todo_title;

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
});

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

			let prev_list_item = document.querySelector('#list_adder > #item:last-child');
			console.log(prev_list_item);
			
			if (prev_list_item == null) { // Adds listener to title if backspace brings user from item to it.
				document.getElementById('list_title').focus();
			}

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




// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("todo_add_button");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
} 