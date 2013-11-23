DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
	`phoneNo` bigint NOT NULL unique,
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
	`name:vocal` varchar(40) NOT NULL default '',
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
	`albumID` int(15) NOT NULL unique,
	`title` varchar(15) NOT NULL,
	PRIMARY KEY  (`songID`),
	FOREIGN KEY (author) REFERENCES musician(musicianID),
	FOREIGN KEY (albumID) REFERENCES album(albumID)
);

DROP TABLE IF EXISTS `play_list`;
CREATE TABLE `play_list` (
	`musicianID` int(15) NOT NULL unique,
	`songID` int(15) NOT NULL unique,
	PRIMARY KEY  (`musicianID`,`songID`),
	FOREIGN KEY (musicianID) REFERENCES musician(musicianID),
	FOREIGN KEY (songID) REFERENCES song(songID)
);


DROP TABLE play_list;
DROP TABLE song;
DROP TABLE album;
DROP TABLE musician_instrument;
DROP TABLE instrument;
DROP TABLE musician;
DROP TABLE address;
