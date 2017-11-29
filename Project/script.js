let todo_add_button = document.getElementById('todo_add_button');
let todo_specs = document.getElementById('list_adder');
let todo_title = document.createElement('input');

// When the ENTER key is pressed, a new bulletpoint's created.
let keydown_title_listener = function(event) {
	
	if (event.keyCode == 13) {
		bullet_factory();
		document.getElementById('item').focus();

		todo_title.removeEventListener('keydown', keydown_title_listener, false);
	}
}

/**
	Event listener for when the 'Add a list...' box is clicked.
	Adds a new description.
**/
todo_add_button.addEventListener('click', (event) => {

	// Reset the to-do list by deleting the title and every bullet.
	while (todo_specs.firstChild)
		todo_specs.removeChild(todo_specs.firstChild);

	// Creates a new title element.
	let new_todo_title = document.createElement('input');
	new_todo_title.setAttribute('id', 'title');
	new_todo_title.setAttribute('type', 'text');
	new_todo_title.setAttribute('placeholder', 'Title');

	new_todo_title.addEventListener('keydown', keydown_title_listener, false);

	todo_specs.append(new_todo_title);
	new_todo_title.focus();
	todo_title = new_todo_title;
});

/* Creates a new bullet point element. */
function bullet_factory() {	
	let bullet = document.createElement('input');

	bullet.setAttribute('id', 'item');
	bullet.setAttribute('type', 'text');
	bullet.setAttribute('placeholder', 'Item');

	bullet.addEventListener('keydown', (event) => {

		// A new bulletpoint is created when ENTER's clicked on it.
		if (event.keyCode == 13)
			bullet_factory(); // This recursive call surprisingly works.

		// The current bulletpoint's deleted when end of input is reached.
		else if (event.keyCode == 8 && bullet.value.length == 0) {
			event.preventDefault(); // Prevents deletion of last char of previous bulletpoint.
			bullet.remove();

			let prev_list_item = document.querySelector('#list_adder > input:last-child');
			prev_list_item.focus();

			if (prev_list_item == document.getElementById('title')) // Adds listener to title if backspace brings user from item to it.
				todo_title.addEventListener('keydown', keydown_title_listener, false);
		}

	});

	todo_specs.append(bullet);
	bullet.focus();
} 
