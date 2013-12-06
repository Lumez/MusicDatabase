DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
	`phoneNo` bigint(13) NOT NULL unique,
	`Street1` varchar(40) NOT NULL default '',
	`Street2` varchar(40) NULL,
	`city` varChar(40) NOT NULL,
	`Zip code` varChar(20) NOT NULL,
	PRIMARY KEY  (`phoneNo`)
);

DROP TABLE IF EXISTS `musician`;
CREATE TABLE `musician` (
	`musicianID` int(15) NOT NULL auto_increment,
	`name` varchar(40) NOT NULL default '',
	`phoneNo` bigint NULL,
	PRIMARY KEY  (`musicianID`),
	FOREIGN KEY (phoneNo) REFERENCES address(phoneNo)
);

DROP TABLE IF EXISTS `instrument`;
CREATE TABLE `instrument` (
	`instrumentID` int(15) NOT NULL auto_increment,
	`name` varchar(40) NOT NULL,
	`key:Bflat` boolean default false,
	PRIMARY KEY  (`instrumentID`)
);

DROP TABLE IF EXISTS `musician_instrument`;
CREATE TABLE `musician_instrument` (
	`instrumentID` int(15) NOT NULL auto_increment,
	`musicianID` int(15) NOT NULL,
	PRIMARY KEY  (`instrumentID`,`musicianID`),
	FOREIGN KEY (instrumentID) REFERENCES instrument(instrumentID),
	FOREIGN KEY (musicianID) REFERENCES musician(musicianID)
);

DROP TABLE IF EXISTS `album`;
CREATE TABLE `album` (
	`albumID` int(15) NOT NULL auto_increment,
	`musicianID` int(15) NULL,
	`title` varchar(50) NOT NULL,
	`date` date NOT NULL,
	PRIMARY KEY  (`albumID`),
	FOREIGN KEY (musicianID) REFERENCES musician(musicianID)
);

DROP TABLE IF EXISTS `song`;
CREATE TABLE `song` (
	`songID` int(15) NOT NULL auto_increment,
	`author` int(15) NOT NULL,
	`albumID` int(15) NOT NULL,
	`title` varchar(50) NOT NULL,
	PRIMARY KEY  (`songID`),
	FOREIGN KEY (author) REFERENCES musician(musicianID),
	FOREIGN KEY (albumID) REFERENCES album(albumID)
);

DROP TABLE IF EXISTS `play_list`;
CREATE TABLE `play_list` (
	`musicianID` int(15) NOT NULL unique,
	`songID` int(15) NOT NULL unique,
	`instrumentID` int(15) NOT NULL,
	PRIMARY KEY  (`musicianID`,`songID`),
	FOREIGN KEY (instrumentID) REFERENCES instrument(instrumentID),
	FOREIGN KEY (musicianID) REFERENCES musician(musicianID),
	FOREIGN KEY (songID) REFERENCES song(songID)
);

/* LOGIN -----------------------------------------------------------------------*/
DROP TABLE IF EXISTS `authorisation`;
CREATE TABLE `authorisation` (
	`userID` int(15) NOT NULL auto_increment,
	`username` varchar(20) NOT NULL unique,
	`password` char(32) NOT NULL unique, /* md5 hash contains 32 digits */
	PRIMARY KEY  (`userID`)
);



SELECT * FROM authorisation;

DELETE from authorisation where userID =1;

INSERT INTO authorisation (username,password)
VALUES ("Aaron", MD5("Aaron"));

/* INSERT ROWs ------------------------------------------------------------------ */
DELETE FROM address where phoneNo=07746302219;     
SELECT * FROM address;

INSERT INTO address (`phoneNo`,`Street1`,`Street2`,`city`,`Zip code`)
VALUES(07746302219,"Roll Court", "Glen Eyre Hall", "Hamspire", "SO16 3UF");

/* Add Musician */
INSERT INTO musician (`name`,`phoneNo`)
VALUES("Aaron", 07746302219);

/* Add Album */
INSERT INTO album (	`musicianID`,`title`,`date`)
VALUES(1,"The Hunger Game", NOW());

/* Add Instrument */
INSERT INTO instrument (`name`,`key:Bflat`)
VALUES("Piano", false);

INSERT INTO instrument (`name`,`key:Bflat`)
VALUES("Trumpet", true);

INSERT INTO instrument (`name`,`key:Bflat`)
VALUES("Violin", false);

INSERT INTO instrument (`name`,`key:Bflat`)
VALUES("Vocal", false);

Select * from album;
/* DROP ALL TABLE ----------------------------------------------------------------*/

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE play_list;
DROP TABLE song;
DROP TABLE album;
DROP TABLE musician_instrument;
DROP TABLE instrument;
DROP TABLE musician;
DROP TABLE address;
DROP TABLE authorisation;

SET FOREIGN_KEY_CHECKS = 1;

/* SELECT ALL */

SELECT * FROM play_list;
SELECT * FROM song;
SELECT * FROM album;
SELECT * FROM musician_instrument;
SELECT * FROM instrument;
SELECT * FROM musician;
SELECT * FROM address;
SELECT * FROM authorisation;

