let todo_add_button = document.getElementById('todo_add_button');
let todo_specs = document.getElementById('list_adder');

/**
	Event listener for when the 'Add a list...' box is clicked.
	Adds a new description.
**/
todo_add_button.addEventListener('click', (event) => {

	// Alerts the user todo list will be deleted.
	if (todo_specs.children.length)
		console.log('Deleting unsaved content!');

	// Reset the to-do list by deleting the title and every bullet.
	while (todo_specs.firstChild)
		todo_specs.removeChild(todo_specs.firstChild);

	// Creates a new title element.
	let todo_title = document.createElement('input');
	todo_title.setAttribute('type', 'text');
	todo_title.setAttribute('placeholder', 'Title');

	// When the ENTER key is pressed, a new bulletpoint's created.
	todo_title.addEventListener('keydown', (event) => {
		if (event.keyCode == 13)
			bullet_factory();
	});

	todo_specs.append(todo_title);
	todo_title.focus();
});

/* Creates a new bullet point element. */
function bullet_factory() {	
	let bullet = document.createElement('input');
	bullet.setAttribute('type', 'text');
	bullet.setAttribute('placeholder', 'Item');

	bullet.addEventListener('keydown', (event) => {

		// A new bulletpoint is created when ENTER's clicked on it.
		if (event.keyCode == 13)
			bullet_factory(); // This recursive call surprisingly works.

		// The current bulletpoint's deleted when end of input is reached.
		else if (event.keyCode == 8 && bullet.value.length == 0) {
			bullet.remove();
			let prev_bullet = document.querySelector('#list_adder > input:last-child');
			prev_bullet.focus();
		}

	});

	todo_specs.append(bullet);
	bullet.focus();
} 
