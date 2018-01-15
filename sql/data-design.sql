ALTER DATABASE escott15 CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE profile (
	-- Our class Style Guide dictates that primary keys are listed first, foreign keys are listed second, and all other attributes are listed alphabetically. Refer to Style Guide here: https://bootcamp-coders.cnm.edu/study-guides/data-design-study-guide.php

	-- The following profileId creates space for the attribute that will become the primary key, but we haven't done anything with it yet:
	profileId BINARY(16) NOT NULL,
	profileActivationToken CHAR(32),
	profileEmail VARCHAR(128) NOT NULL,
	profileHash CHAR(128) NOT NULL,
	profileName VARCHAR(32) NOT NULL,
	profileSalt CHAR(64) NOT NULL,
	-- Creating UNIQUE indexes to ensure duplicate data cannot exist
	UNIQUE(profileEmail),
	UNIQUE(profileName),
	-- The following officially makes the profileId attribute into the primary key:
	PRIMARY KEY(profileId)
);

CREATE TABLE article (
	articleId BINARY(16) NOT NULL,
	-- The following creates an attribute for what we'll later make into a foreign key; it references data from another table (from the profile table in this case):
	articleProfileId BINARY(16) NOT NULL,
	articleContent VARCHAR(200) NOT NULL,
	articleDateTime DATETIME(6) NOT NULL,
	articleTitle VARCHAR(32) NOT NULL,
	-- Create an index before creating a foreign key. All foreign keys MUST be indexed, but don't necessarily have to be unique indexes (depending on the project):
	INDEX(articleProfileId),
	-- The following creates the actual foreign key relationship:
	FOREIGN KEY(articleProfileId) REFERENCES profile(profileId),
	-- Don't include a comma after the last field! It will cause an error message.
	PRIMARY KEY(articleId)
);

-- claps is a weak entity (or a try-hard)
CREATE TABLE `claps` (
	clapId BINARY(16) NOT NULL,
	clapArticleId BINARY(16) NOT NULL,
	clapProfileId BINARY(16) NOT NULL,
	-- Index the foreign keys:
	INDEX(clapArticleId),
	INDEX(clapProfileId),
	-- Create the foreign key relationships below:
	FOREIGN KEY(clapArticleId) REFERENCES article(articleId),
	FOREIGN KEY(clapProfileId) REFERENCES profile(profileId),
	PRIMARY KEY(clapId)
	-- Not sure if the primary key in this case should be a composite? In that case I think it'd be:
	-- PRIMARY KEY(clapArticleId, clapProfileId)
);
