drop table if exists users;
drop table if exists lists;
drop table if exists tag;
drop table if exists bulletPoint;

CREATE TABLE users (
	username VARCHAR PRIMARY KEY,
	password VARCHAR
);

CREATE TABLE lists(
	id_list INTEGER PRIMARY KEY,
	title TEXT NOT NULL,
	creation_date DATE NOT NULL,
	username VARCHAR NOT NULL REFERENCES users(username),
	tags VARCHAR NOT NULL REFERENCES tag(tags)
);

CREATE TABLE tag(
	name VARCHAR NOT NULL,
	id_tag INTEGER REFERENCES lists(id)
);

CREATE TABLE bulletPoint(
	id_bp INTEGER PRIMARY KEY,
	content VARCHAR NOT NULL,
	checked BIT,
	id_list INTEGER REFERENCES lists(id_list)
);