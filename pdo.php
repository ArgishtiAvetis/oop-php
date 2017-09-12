<form action="" method="post">
	<input type="text" name="title" placeholder="title" /><br />
	<input type="text" name="overview" placeholder="overview" /><br />
	<textarea name="body"></textarea><br />
	<button type="submit">Add</button>
</form>
<hr />

<?php

try {
	$db = new PDO('mysql:host=localhost;dbname=challer_1.0;', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	print "Successfully connected to the db.";
} catch(PDOException $e) {
	print "An Error occured while trying to connect to the db: ".$e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!empty($_POST['title']) && !empty($_POST['body'])) {
		$title = htmlspecialchars($_POST['title']);
		$overview = htmlspecialchars($_POST['overview']);
		$body = htmlspecialchars($_POST['body']);
		try{
			$db->exec("INSERT INTO challenges (title, overview, body) VALUES ('$title', '$overview', '$body')");
			print "Successfully inserted a new row into the db.";
		} catch(PDOException $e) {
			print "An error occured while trying to insert a row into the db: ".$e->getMessage();
		}
	} else {
		print "<p style='color: red'>Title and Body fields are required!</p>";
	}
}

try {
	$q = $db->query('SELECT * FROM challenges ORDER BY id DESC');
} catch(PDOException $e) {
	print "An error occured while trying to fetch data from the db: ".$e->getMessage();
}

print "<ol>";

while($row = $q->fetch()) {
	print "<li>" . $row['title'] . "</li>";
}

print "</ol>";