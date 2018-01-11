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
			<p>Andrea is an employee of the CNM STEMulus Center. As part of her job, she is responsible for recruiting new students to the Deep Dive Bootcamp. One way that she markets the program is by blogging on Medium.com. Andrea primarily writes posts from her PC desktop computer using Microsoft Word and the Google Chrome browser. She is well-versed and comfortable with the technology tools that she uses.</p>
		</div>
		<div>
			<h2>User Story</h2>
			<p>As an author user, Andrea wants to publish blog posts to the Deep Dive Coding channel on Medium.</p>
		</div>
		<div>
			<h2>Use Case/Interaction Flow</h2>
			<h4><em>The specific steps the user must take to arrive at their goal, including the system responses for each user-initiated action.</em></h4>
			<h3>Entities &amp; Attributes</h3>
			<ul>
				<li>profile <em>(Andrea must login to her account in order to post)</em>
					<ul>
						<li>Attributes of the profile entity:
							<ul>
								<li>profileID <strong>(this is a primary, unique key)</strong></li>
								<li>profileEmail</li>
								<li>profilePassword</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>article <em>(the content that Andrea wants to post)</em>
					<ul>
						<li>Attributes of the article entity:
							<ul>
								<li>articleId <strong>(this is a primary, unique key)</strong></li>
								<li>articleName</li>
								<li>arcticleDate</li>
								<li>arcticleContent</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>claps <em>(interaction on Andrea's post by other Medium users)</em>
					<ul>
						<li>Attributes of the claps entity:
							<ul>
								<li>clapId <strong>(this is a primary, unique key)</strong></li>
								<li>numberOfClaps</li>
								<li>numberOfUsersWhoClapped</li>
							</ul>
						</li>
					</ul>
				</li>
			</ul>
		<div>
			<h2>Conceptual Model</h2>
			<img src = "images/medium-entity-relationship-diagram.png" alt = "data design markup"><!--I might need to redo this image with the same verbiage I end up using as the labels of the boxes.-->
		</div>
			<div>
			<h2>Relationships</h2>
			<ul>
				<li>A unique, logged-in user claps Andrea's post (1-to-1)
				<ul>
					<li>This relationship occurs 0 or 1 times.</li>
				</ul>
				</li>
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