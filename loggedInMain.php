<?php
include_once 'postClass.php';

session_start();
if ($_SESSION["posts"] === NULL) {
	$_SESSION["posts"] = array();
}
//print_r($_SESSION);

for($i=0; $i < count($_SESSION["posts"]); $i++) {
	echo $_SESSION["posts"][$i]->getTitle();
	echo $_SESSION["posts"][$i]->getPrice();
	echo $_SESSION["posts"][$i]->getLocation();
	echo $_SESSION["posts"][$i]->getDescription();
}
?>

<form action="/post.php">
	<input type="submit" value="Create Post">
</form>