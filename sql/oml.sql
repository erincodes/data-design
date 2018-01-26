	-- below are my notes from trying out various MySQL commands in the @localhost

	-- worked:
	INSERT INTO profile(profileId, profileActivationToken, profileEmail, profileHash, profileName, profileSalt)
	VALUES(UNHEX(REPLACE("c74671dc-0789-40ac-9f47-85ce6bd1a474", "-", "")), '012345', 'erinleeannscott@gmail.com', '67890', escott, '19385');

-- worked:
	INSERT INTO profile(profileId, profileActivationToken, profileEmail, profileHash, profileName, profileSalt)
	VALUES(UNHEX(REPLACE("2111d0b1-2e05-44a2-8c05-27ba3f25fa5e", "-", "")), '82418', 'email2@gmail.com', '7837d6f68f04b513e16f3aaa1eb81ee9ec2ae661255c1378f9397d73859e0dd529154b55c910f68d33181fa3a5b5ac66038a84ebf923db63d2c610789671aa6b', 'gkephart', 'f18316747426e903062a6823e9557a5e46553132705f3a5d6696fa9cb2c4468a');

	-- worked:
	SELECT articleId
	FROM article
	WHERE 1 = 1;

	-- worked, didn't give me much info though. The system did not like when I put the string in "double quotes":
	SELECT profileEmail
	FROM profile
	WHERE profileEmail LIKE 'eri_';

-- did not work, got error message about profile id in the string:
	SELECT articleProfileId
	FROM article
	WHERE profileId = "7a419200-b39f-423b-84bc-dbe5641f08bb”;

-- worked:
UPDATE profile
SET profileName = 'Peter'
WHERE profileName = 'gkephart';

-- did not work, got error message that my sytax on the WHERE line was wrong...but not sure why:
DELETE FROM profile
WHERE profileEmail 'erinleeannscott@gmail.com';

-- worked (I think), but I don't have an a clapArticleId with that numerical value that exists as of now in my table. Syntax appears to be correct.
SELECT clapArticleId, clapProfileId
FROM claps
	-- syntax is entity.attribute, used as an expression.
	INNER JOIN article ON article.articleId = `claps`.clapArticleId
WHERE clapArticleId = "d0a6cb6a-078d-4603-93b6-b996c515d7ce";
