DROP TABLE IF EXISTS SIGNUP;
DROP TABLE IF EXISTS ENTRIES;
DROP TABLE IF EXISTS CONTACTUS;

CREATE TABLE SIGNUP(
	ID	int not null auto_increment,
	FirstName varchar(15) not null,
	LastName	varchar(15) not null,
	Email	varchar(20) not null,
	Password1 	varchar(40) not null,
	Password2	varchar(40) not null,
	College 	varchar(20) not null,
	Major		varchar(2) not null,	
	PRIMARY KEY(ID),
	CHECK (ID > 0),
	CHECK (GradYear >= 1863)
)

CREATE TABLE ENTRIES(
	ID int not null auto_increment,
	City 	varchar(20) not null,
	EatSleepOrSee varchar(20) not null,
	EstablishmentName	varchar(20) not null,
	Stars int not null,
	Comments varchar(60)
)

CREATE TABLE CONTACTUS(
	ID int not null auto_increment,
	FirstName varchar(15) not null,
	LastName	varchar(15) not null,
	Email	varchar(20) not null,
	Comments varchar(60) not null
)



