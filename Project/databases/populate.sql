.mode columns
.headers on
.nullvalue NULL

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Project;
DROP TABLE IF EXISTS List;
DROP TABLE IF EXISTS Tag;
DROP TABLE IF EXISTS Bulletpoint;
DROP TABLE IF EXISTS Image;

CREATE TABLE User (
	username VARCHAR PRIMARY KEY,
	password VARCHAR,
	name VARCHAR,
	email VARCHAR
);

CREATE TABLE Project (
	id_project INTEGER PRIMARY KEY,
	title VARCHAR,
	username VARCHAR NOT NULL REFERENCES User(username)
);

CREATE TABLE List (
	id_list INTEGER PRIMARY KEY AUTOINCREMENT,
	username VARCHAR NOT NULL REFERENCES User(username),
	title TEXT NOT NULL,
	creation_date DATE NOT NULL,
	priority INTEGER,
	tags VARCHAR NOT NULL REFERENCES Tag(tags)
);

CREATE TABLE Tag (
	id_tag INTEGER REFERENCES List(id),
	name VARCHAR NOT NULL
);

CREATE TABLE Bulletpoint (
	id_bp INTEGER PRIMARY KEY AUTOINCREMENT,
	content VARCHAR NOT NULL,
	checked BIT,
	id_list INTEGER REFERENCES List(id_list)
);

CREATE TABLE Image (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	name VARCHAR NOT NULL,
	extension VARCHAR NOT NULL,
	size INTEGER NOT NULL,
	last_modified INTEGER NOT NULL,
	username VARCHAR NOT NULL REFERENCES User(username)
);



-- Populate LIST table.
INSERT INTO List VALUES (1, "diogo", "Quesadilla recipe", "2017/10/28", 2, "food, mexican");
INSERT INTO List VALUES (2, "admin", "The four elements", "2017/10/14", 3, "element");
INSERT INTO List VALUES (3, "diogo", "Christmas shopping", "2017/10/20", 3, "nintendo switch, beyblade");
INSERT INTO List VALUES (4, "admin", "Bands I haven't seen", "2017/10/30", 1, "music, band, gig");
INSERT INTO List VALUES (5, "admin", "Series to watch", "2017/10/30", 1, "music, band, gig");
INSERT INTO List VALUES (6, "miguel", "Work due today", "2017/10/30", 1, "music, band, gig");
INSERT INTO List VALUES (7, "miguel", "Work due tomorrow", "2017/10/30", 1, "music, band, gig");
INSERT INTO List VALUES (8, "admin", "Shopping", "2017/10/30", 1, "music, band, gig");
INSERT INTO List VALUES (9, "miguel", "Homework", "2017/10/30", 1, "music, band, gig");
INSERT INTO List VALUES (10, "ze", "Movies to watch", "2017/10/30", 1, "music, band, gig");
INSERT INTO List VALUES (11, "ze", "Episodes behind", "2017/10/30", 1, "music, band, gig");
INSERT INTO List VALUES (12, "admin", "Exams", "2017/10/30", 1, "music, band, gig");
INSERT INTO List VALUES (13, "ze", "Buy tickets", "2017/10/30", 1, "music, band, gig");
INSERT INTO List VALUES (14, "admin", "Things I love", "2017/10/30", 1, "music, band, gig");


-- Populate TAG table.
INSERT INTO Tag VALUES (1, "food");
INSERT INTO Tag VALUES (2, "mexican");
INSERT INTO Tag VALUES (3, "element");
INSERT INTO Tag VALUES (4, "nintendo switch");
INSERT INTO Tag VALUES (5, "beyblade");
INSERT INTO Tag VALUES (6, "music");
INSERT INTO Tag VALUES (7, "band");
INSERT INTO Tag VALUES (8, "gig");

-- Populate BULLETPOINT table.
INSERT INTO Bulletpoint VALUES (1, "Boneless chicken", 'false', 1);
INSERT INTO Bulletpoint VALUES (2, "Cheese", 'false', 1);
INSERT INTO Bulletpoint VALUES (3, "Tomato", 'false', 1);
INSERT INTO Bulletpoint VALUES (4, "King gizzard", 'true', 4);
INSERT INTO Bulletpoint VALUES (5, "Daft Punk", 'false', 4);
INSERT INTO Bulletpoint VALUES (6 "Earth", 'true', 2);
INSERT INTO Bulletpoint VALUES (7, "Wind", 'false', 2);
INSERT INTO Bulletpoint VALUES (8, "Water", 'true', 2);
INSERT INTO Bulletpoint VALUES (9, "Fire", 'false', 2);
INSERT INTO Bulletpoint VALUES (10, "Nintendo Switch", 'false', 3);
INSERT INTO Bulletpoint VALUES (11, "Coal", 'true', 3);
INSERT INTO Bulletpoint VALUES (12, "LTW", 'true', 9);
INSERT INTO Bulletpoint VALUES (13, "ESOF", 'true', 12);
INSERT INTO Bulletpoint VALUES (14, "Westworld", 'true', 5);
INSERT INTO Bulletpoint VALUES (15, "Stranger Things", 'true', 11);
INSERT INTO Bulletpoint VALUES (16, "Myself", 'true', 14);

-- Populate IMAGE table.
INSERT INTO Image VALUES(1, "default-avatar.png", ".png", 123456, 123456, "admin");
