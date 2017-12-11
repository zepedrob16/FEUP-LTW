.mode columns
.headers on
.nullvalue NULL

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS List;
DROP TABLE IF EXISTS Tag;
DROP TABLE IF EXISTS Bulletpoint;

CREATE TABLE User (
	username VARCHAR PRIMARY KEY,
	password VARCHAR,
	name VARCHAR,
	email VARCHAR
);

CREATE TABLE List (
	id_list INTEGER PRIMARY KEY,
	username VARCHAR NOT NULL REFERENCES users(username),
	title TEXT NOT NULL,
	creation_date DATE NOT NULL,
	priority INTEGER,
	tags VARCHAR NOT NULL REFERENCES tag(tags)
);

CREATE TABLE Tag (
	id_tag INTEGER REFERENCES lists(id),
	name VARCHAR NOT NULL
);

CREATE TABLE Bulletpoint (
	id_bp INTEGER PRIMARY KEY,
	content VARCHAR NOT NULL,
	checked BIT,
	id_list INTEGER REFERENCES lists(id_list)
);

-- Populate USER table.
INSERT INTO User VALUES ("admin", "admin", "Administrator", "admin@admin.com");
INSERT INTO User VALUES ("temp", "1234", "Beatriz Baldaia", "bibs@gmail.com");

-- Populate LIST table.
INSERT INTO List VALUES (1, "temp", "Quesadilla recipe", "2017/10/28", 2, "food, mexican");
INSERT INTO List VALUES (2, "admin", "The four elements", "2017/10/14", 3, "element");
INSERT INTO List VALUES (3, "temp", "Christmas shopping", "2017/10/20", 3, "nintendo switch, beyblade");
INSERT INTO List VALUES (4, "admin", "Bands I haven't seen", "2017/10/30", 1, "music, band, gig");

-- Populate TAG table.
INSERT INTO Tag VALUES (1, "food");
INSERT INTO Tag VALUES (2, "mexican");
INSERT INTO Tag VALUES (3, "element");
INSERT INTO Tag VALUES (4, "nintendo switch");
INSERT INTO Tag VALUES (5, "beyblade");
INSERT INTO Tag VALUES (6, "music");
INSERT INTO Tag VALUES (7, "band");
INSERT INTO Tag VALUES (8, "gig");

-- Populate Bulletpoint table.
INSERT INTO Bulletpoint VALUES (1, "Boneless chicken", 0, 1);
INSERT INTO Bulletpoint VALUES (2, "Chopped onion", 1, 1);
INSERT INTO Bulletpoint VALUES (3, "Fajita seasoning", 0, 1);
INSERT INTO Bulletpoint VALUES (4, "Earth", 1, 2);
INSERT INTO Bulletpoint VALUES (5, "Wind", 0, 2);
INSERT INTO Bulletpoint VALUES (6, "Water", 1, 2);
INSERT INTO Bulletpoint VALUES (7, "Fire", 0, 2);
INSERT INTO Bulletpoint VALUES (8, "Nintendo Switch", 0, 3);
INSERT INTO Bulletpoint VALUES (9, "Coal", 1, 3);