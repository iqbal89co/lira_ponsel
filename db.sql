CREATE DATABASE lira_ponsel;

CREATE USER 'lira'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE ON `lira_ponsel`.* TO 'lira'@'localhost';

CREATE TABLE user(
	id INT AUTO_INCREMENT,
	name VARCHAR(40) NOT NULL,
	username VARCHAR(40) NOT NULL,
	password VARCHAR(128) NOT NULL,
	role_id INT(1) DEFAULT 3,
	is_active INT(1) DEFAULT 1,
	PRIMARY KEY(id)
);

CREATE TABLE user_role(
	id INT AUTO_INCREMENT,
	role VARCHAR(40) NOT NULL,
	PRIMARY KEY(id)
);

INSERT INTO user_role VALUES
(NULL, 'admin'),
(NULL, 'manajemen'),
(NULL, 'toko');

CREATE TABLE menu(
	id INT AUTO_INCREMENT,
	menu VARCHAR(40) NOT NULL,
	PRIMARY KEY(id)
);

INSERT INTO menu VALUES
(NULL, 'admin');

CREATE TABLE sub_menu(
	id INT AUTO_INCREMENT,
	menu_id INT NOT NULL,
	title VARCHAR(40) NOT NULL,
	url VARCHAR(60) NOT NULL,
	icon VARCHAR(60) DEFAULT 'fa-edit',
	is_active INT(1) DEFAULT 1,
	PRIMARY KEY(id)
);

INSERT INTO sub_menu VALUES
(NULL, 1, 'dashboard admin', 'admin', 'fa-tachometer-alt', 1);

CREATE TABLE user_access_menu(
	id INT AUTO_INCREMENT,
	role_id INT NOT NULL,
	menu_id INT NOT NULL,
	PRIMARY KEY(id)
);

INSERT INTO user_access_menu VALUES
(NULL, 1, 1);

INSERT INTO menu VALUES
(NULL, 'management'),
(NULL, 'toko');

INSERT INTO sub_menu VALUES
(NULL, 2, 'dashboard manager', 'manager', 'fa-tachometer-alt', 1),
(NULL, 3, 'dashboard toko', 'toko', 'fa-tachometer-alt', 1);

INSERT INTO user_access_menu VALUES
(NULL, 2, 2),
(NULL, 3, 3);

ALTER TABLE user
MODIFY username VARCHAR(40) NOT NULL UNIQUE;

ALTER TABLE menu
MODIFY menu VARCHAR(40) NOT NULL UNIQUE;

INSERT INTO sub_menu VALUES
(NULL, 1, 'menu management', 'admin/menu', 'fa-fw fa-folder', 1);

INSERT INTO user_access_menu VALUES
(NULL, 1, 4);

ALTER TABLE sub_menu
MODIFY title VARCHAR(40) NOT NULL UNIQUE;
