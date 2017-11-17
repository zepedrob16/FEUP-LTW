
let todo_add_button = document.getElementById('todo_add_button');
let todo_specs = document.getElementById('list_adder');

/**
	Event listener for when the 'Add a list...' box is clicked.
	Adds a new description.
**/
todo_add_button.addEventListener('click', (event) => {

	if (todo_specs.children.length)
		console.log('Deleting unsaved content!');

	while (todo_specs.firstChild) {
		todo_specs.removeChild(todo_specs.firstChild);
	}

	let todo_title = document.createElement('input');
	todo_title.setAttribute('type', 'text');
	todo_title.setAttribute('placeholder', 'Title');

	todo_title.addEventListener('keypress', (event) => {

		if (event.keyCode == 13) {
			let todo_description = document.createElement('input');
			todo_description.setAttribute('type', 'text');
			todo_description.setAttribute('placeholder', 'Item');

			todo_specs.append(todo_description);
		}

	});

	todo_specs.append(todo_title);
});
