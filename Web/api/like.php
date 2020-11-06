<?php

session_start();

// Recuperation des identifiants utilisateurs
if (isset($_SESSION["auth"], $_SESSION["userID"]))
{
	$isAuth = $_SESSION["auth"];
	$id_user = $_SESSION["userID"];
}
else
{
	http_response_code(301);
	exit(0);
}

// Recuperation des informations sur l'idee
if (isset($_POST["title"], $_POST["content"], $_POST["like"]))
{
	$title = $_POST["title"];
	$content = $_POST["content"];
	$isLike = $_POST["like"];
}
else
{
	http_reponse_code(301);
	exit(0);
}


// SQL check id
$sql_id_idea_count = "SELECT count(*) FROM ideas where title = :title AND content = :content;";
// SQL get id
$sql_id_idea_get = "SELECT ideaID FROM ideas WHERE title = :title AND content = :content;";
// SQL check if the user like the post
$sql_like_count = "SELECT count(*) FROM likes WHERE user = :id_user AND idea = :id_idea;";
// SQL INSERT
$sql_like_insert = "INSERT INTO likes (user, idea) VALUES (:id_user, :id_idea);";
// SQL DELETE
$sql_like_delete = "DELETE FROM likes WHERE user = :id_user AND idea = :id_idea;";
// Increment like
$sql_idea_like_increment = "UPDATE ideas SET likes = likes + 1 WHERE ideaID = :id_idea;";
// Decrement like
$sql_idea_like_decrement = "UPDATE ideas SET likes = likes - 1 WHERE ideaID = :id_idea;";


// Connexion a la base de donnee
$db = new \PDO('mysql:host=localhost;dbname=PIC', 'pocketinnocity', 'password');
$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

// Get number of lines with content and title
$query = $db->prepare($sql_id_idea_count);
$query->execute(array(":title" => $title, ":content" => $content));
$res = $query->fetchAll();
$query->closeCursor();
$idea_number = intval($res[0][0]);

// If idea exists get id
if ($idea_number)
{
	$query = $db->prepare($sql_id_idea_get);
	$query->execute(array(":title" => $title, ":content" => $content));
	$res = $query->fetchAll();
	$query->closeCursor();
	$id_idea = intval($res[0][0]);
}
else
{
	http_response_code(301);
	exit(0);
}


// Check if the user has already liked the post
$query = $db->prepare($sql_like_count);
$query->execute(array(":id_user" => $id_user, ":id_idea" => $id_idea));
$res = $query->fetchAll();
$query->closeCursor();
$isDBLike = intval($res[0][0]);

// If like exist dislike it
if ($isDBLike)
{
	$query = $db->prepare($sql_like_delete);
}
else
{
	//Like the idea
	$query = $db->prepare($sql_like_insert);
}
// Execute the query
$query->execute(array(":id_user" => $id_user, ":id_idea" => $id_idea));
$query->closeCursor();

// If like exist decrement
if ($isDBLike)
{
	$query = $db->prepare($sql_idea_like_decrement);
}
else
{
	$query = $db->prepare($sql_idea_like_increment);
}
// Execute the query
$query->execute(array(":id_idea" => $id_idea));
$query->closeCursor();

?>
