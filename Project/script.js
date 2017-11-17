
let todo_add_button = document.getElementById('todo_add_button');
let todo_specs = document.getElementById('list_adder');

/**
	Event listener for when the 'Add a list...' box is clicked.
	Adds a new description.
**/
todo_add_button.addEventListener('click', (event) => {

	if (todo_specs.children.length)
		console.log('Deleting unsaved content!');

	// Reset the to-do list by deleting the title and every bullet.
	while (todo_specs.firstChild) {
		todo_specs.removeChild(todo_specs.firstChild);
	}

	let todo_title = document.createElement('input');
	todo_title.setAttribute('type', 'text');
	todo_title.setAttribute('placeholder', 'Title');
	todo_title.addEventListener('keypress', function(event) {bullet_factory(event)});

	todo_specs.append(todo_title);
	todo_title.focus();
});

function bullet_factory(event) {

	// Triggered when the ENTER key is pressed.
	if (event.keyCode == 13) {

		// Creates a new bullet point.
		let todo_bullet = document.createElement('input');
		todo_bullet.setAttribute('type', 'text');
		todo_bullet.setAttribute('placeholder', 'Item');

		todo_specs.append(todo_bullet);
		todo_bullet.focus();
		console.log('New bullet created!');
	} 
} 
