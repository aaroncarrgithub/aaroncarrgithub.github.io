#*********************************************************
# Script to create KidCo database
# Name     Date          Description
# Aaron    1/22/2021     Initial deployment
#
#
#*********************************************************
DROP DATABASE IF EXISTS KidCo;

CREATE DATABASE KidCo;

USE KidCo;

CREATE TABLE IF NOT EXISTS employee
(
	employee_id     INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	first_name	VARCHAR(60) NOT NULL,	
	last_name	VARCHAR(60) NOT NULL
);

CREATE TABLE IF NOT EXISTS visitor 
(
	visitor_id	INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	visitor_name	VARCHAR(225)  NULL,
	visitor_email	VARCHAR(225)  NULL UNIQUE,
	visitor_msg	VARCHAR(500)  NULL,
	visit_date 	DATETIME NOT NULL,
	employee_id	INT NOT NULL,
	FOREIGN KEY (employee_id) REFERENCES employee(employee_id)
);

# Insert test data
INSERT INTO employee
	(first_name, last_name)
VALUES
	('Buster', 'Bronco');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Joe', 'Vandal');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Aubie', 'Tiger');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Ralphie', 'Buffalo');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Bucky', 'Badger');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Cocky', 'Gamecock');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Sparky', 'Spartan');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('CWI', 'Otter');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Gus', 'Gorilla');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Brutus', 'Buckeye');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Pistol', 'Pete');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Archibold', 'Eagle');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Baby', 'Jay');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Boss', 'Hogg');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Benny', 'Bengal');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Fighting', 'Pickle');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Captain', 'Cain');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Duck', 'Dog');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('TVCS', 'Chukars');

INSERT INTO employee
	(first_name, last_name)
VALUES
	('Sebastian', 'Ibis');


INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Mickey', 'mickey@mouse.com','Hello', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Minnie', 'minnie@mouse.com','Hi', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Dasiy', 'dasiy@duck.com','goodbye', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Donald', 'don@me.com','Bye', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Huey', 'Huey@me.com','NICE', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Dewey', 'dewey@me.com','Test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Louie', 'louie@me.com','Have a great weekend', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Elmer', 'elmer@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Goofy', 'goofy@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Winnie', 'winnie@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Pluto', 'pluto@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Chip', 'chip@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Dale', 'dale@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Clarabelle', 'clarabelle@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Scrooge', 'scrooge@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Ludwig', 'ludwig@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('Louie', 'lou@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('bob', 'bob@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('aaron', 'aaron@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('henry', 'henry@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('alex', 'alex@me.com','another test', NOW(), 1);
INSERT INTO visitor
	(visitor_name, visitor_email, visitor_msg, visit_date, employee_id)
VALUES
	('juile', 'juile@me.com','another test', NOW(), 1);

# Add application user
GRANT SELECT, INSERT, UPDATE, DELETE
ON kidco.*
to ac_user
IDENTIFIED BY 'MSPress#1';