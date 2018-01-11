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
			<p>Andrea is an employee of the CNM STEMulus Center. As part of her job, she is responsible for recruiting new students to the Deep Dive Bootcamp. One way that she markets the program is by blogging on Medium.com. Andrea primarily writes posts from her PC desktop computer in her office. She is comfortable with the technology tools that she uses.</p>
		</div>
		<div>
			<h2>User Story</h2>
			<p>As an author user, Andrea wants to publish blog post content to the Deep Dive Coding channel on Medium.</p>
		</div>
		<div>
			<h2>Use Case/Interaction Flow</h2>
			<h3><em>The specific steps the user must take to arrive at their goal, including the system responses for each user-initiated action.</em></h3>
			<h2>Profile</h2><!--This is an entity-->
			<ul>
				<li>profileName</li><!--These are attributes-->
				<li>profilePass</li>
				<li>profileEmail</li>
			</ul>
			<h2>Article</h2>
			<ul>
				<li>articleName</li>
				<li>articleId</li>
				<li>articleContent</li>
				<li>articleDate</li>
			</ul>
			<h2>Claps</h2>
			<ul>
				<li>numberOfClaps</li>
				<li>numberOfUsersWhoClapped</li>
			</ul>
			<h2>Relationships</h2>
			<ul>
				<li>One profile can write many articles (1-to-n)</li>
			</ul>
		</div>
		<div>
			<h2>Conceptual Model</h2>
		</div>
		<br>
		<img src = "images/medium-entity-relationship-diagram.png" alt = "data design markup">
		<br>
	</body>
</html>