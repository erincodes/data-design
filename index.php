<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/style.css">
		<title>Data Design</title>
	</head>
	<body>
		<h1><em>Data Design</em></h1>
		<!--<div class="use-case">Use Case</div>-->
		<div>
		<h2>Persona</h2>
			<p>Andrea is an employee of the CNM STEMulus Center. As part of her job, she is responsible for recruiting new students to the Deep Dive Bootcamp. One way that she markets the program is by blogging on Medium.com. Andrea primarily writes posts from her PC desktop computer using Microsoft Word and the Google Chrome browser. She is well-versed and comfortable with the technology tools that she uses.</p>
		</div>
		<div>
			<h2>User Story</h2>
			<p>As an author user, Andrea wants to publish blog posts to the Deep Dive Coding channel on Medium.</p>
		</div>
		<div>
			<h2>Use Case/Interaction Flow</h2>
			<h4><em>The specific steps the user must take to arrive at their goal, including the system responses for each user-initiated action.</em></h4>
			<h3>Entities & Attributes</h3>
			<ul>
				<li>profile <em>(Andrea must login to her account in order to post)</em>
					<ul>
						<li>Attributes of the profile entity:
							<ul>
								<li>profileName</li>
								<li>profilePassword</li>
								<li>profileEmail</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>article <em>(the content that Andrea wants to post)</em>
					<ul>
						<li>Attributes of the article entity:
							<ul>
								<li>articleName</li>
								<li>articleId</li>
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
				<li>One profile can write many articles (1-to-n)</li>
			</ul>
			</div>
		<br>
	</body>
</html>