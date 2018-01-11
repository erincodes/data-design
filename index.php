<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/style.css">
		<title>Data Design</title>
	</head>
	<body>
		<h1><em>Data Design</em></h1>
		<p>Persona</p>
		<p>User Story</p>
		<p>Use Case/Interaction Flow</p>
		<p>Conceptual Model:</p>
		<img src = "images/medium-entity-relationship-diagram.png" alt = "data design markup">
		<br>
		<h2>Profile (entity)</h2>
		<ul>
			<li>profileName</li>
			<li>profilePass</li>
			<li>profileEmail</li>
		</ul>
		<h2>Article (entity)</h2>
		<ul>
			<li>articleName</li>
			<li>articleId</li>
			<li>articleContent</li>
			<li>articleDate</li>
		</ul>
		<h2>Claps (entity)</h2>
		<ul>
			<li>numberOfClaps</li>
			<li>numberOfUsersWhoClapped</li>
		</ul>
		<h2>Relationships</h2>
		<ul>
			<li>One profile can write many articles (1-to-n)</li>
		</ul>
		<br>
	</body>
</html>