<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="/css/style.css"> <!--I'm having issues with my CSS and I'm not sure why...need to come back to this (1/11).-->
		<title>Data Design</title>
	</head>
	<body>
		<h1><em>Data Design</em></h1>
		<div class="persona"><h2>Persona</h2>
			<p>Andrea is an employee of the CNM STEMulus Center. As part of her job, she is responsible for recruiting new students to the Deep Dive Bootcamp. One way that she markets the program is by blogging on Medium.com. Andrea primarily writes posts from her Microsoft Surface using Google Chrome as her browser. She is well-versed and comfortable with the technology tools that she uses.</p>
		</div>
		<div>
			<h2>User Story</h2>
			<p>As an author user, Andrea wants to publish blog posts to the Deep Dive Coding channel on Medium.</p>
		</div>
		<div>
			<h2>Use Case/Interaction Flow</h2>
			<h4><em>The specific steps the user must take to arrive at their goal, including the system responses for each user-initiated action.</em></h4>
			<p>Precondition: Andrea is a contributor for the "Deep Dive Coding" publication and has copied her article content to her clipboard.</p>
			<ol>
				<li>Andrea navigates to Medium.com in the browser</li>
				<li>Clicks login button</li>
				<li>Enters username</li>
				<li>Enters password</li>
				<li>Clicks submit button</li>
				<li>Site navigates to Andrea's profile welcome page</li>
				<li>From profile welcome page, Andrea clicks publish article button</li>
				<li>In WYSIWYG editor, pastes in article content</li>
				<li>Clicks save button</li>
				<li>Site generates a pop-up saying the article content was successfully saved</li>
				<li>Andrea clicks preview article button</li>
				<li>Site generates a preview of the final article content and layout</li>
				<li>Andrea reviews preview for accuracy</li>
				<li>Clicks publish article button</li>
				<li>System generates a pop-up asking for yes/no confirmation to post article</li>
				<li>Andrea confirms yes to post article</li>
				<li>Navigates to live URL of article on Medium.com and shares with friends!</li>
			</ol>
			<!--<p>Postcondition: Anything to include??</p>-->
			<div>
				<h2>Conceptual Model</h2>
				<img src = "images/medium-entity-relationship-diagram.png" alt = "data design markup"><!--I might need to redo this image with the same verbiage I end up using as the labels of the boxes.-->
			</div>
			<h3>Entities &amp; Attributes</h3>
			<ul>
				<li>profile <em>(Andrea must login to her account in order to post)</em>
					<ul>
						<li>Attributes of the profile entity:
							<ul>
								<li>profileId <strong>(this is a primary key)</strong></li><!--Primary keys are a type of unique keys. Index is the outermost circle, with unique keys inside, and primary keys inside of unique keys.-->
								<li>profileName <strong>(this is a unique key)</strong></li>
								<li>profileEmail</li>
								<li>profileActivationToken</li>
								<li>profileSalt</li> <!--In cryptography, a salt is random data that is used as an additional input to a one-way function that "hashes" data, a password or passphrase-->
								<li>profileHash</li> <!--Hashing is saving passwords-->
							</ul>
						</li>
					</ul>
				</li>
				<li>article <em>(the content that Andrea wants to post)</em>
					<ul>
						<li>Attributes of the article entity:
							<ul>
								<li>articleId</li>
								<li>articleAuthorId</li>
								<li>articleTitle</li>
								<li>arcticleDateTime</li>
								<li>articleContent</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>claps <em>(interaction on Andrea's published post by other Medium users)</em>
					<ul>
						<li>Attributes of the claps entity <strong>(claps is a weak/try hard entity)</strong>:
							<ul>
								<li>clapId</li> <!--this is the id that is generated for each indiv clap action.-->
								<li>clapProfileId</li>
								<li>clapArticleId</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
			<div>
			<h2>Relationships</h2>
				<ul>
					<!--<li>A unique, logged-in user claps Andrea's post (1-to-1)
					<ul>
						<li>This relationship occurs 0 or 1 times.</li>
					</ul>
					I need to come up with a different 1-to-1 example
				</li> -->
				<li>Andrea posts articles to the Deep Dive Coders Medium channel (1-to-n)
					<ul>
						<li>This relationship can occur more than once.</li>
					</ul>
				</li>
				<li>Numerous visitors to Medium.com read Andrea's article (m-to-n, also known as many-to-many)
					<ul>
						<li>This relationship occurs multiple times with multiple actors.</li>
					</ul>
				</li>
			</ul>
			</div>
		<br>
	</body>
</html>