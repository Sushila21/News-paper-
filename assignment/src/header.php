<?php
	// this is to run session start on all the pages. 
	session_start();
	// this checks to see if someone is logged in or not.
	if(!isset($_SESSION['loggedIn'])){
		$_SESSION['loggedIn'] = false;
	}
	// this connects to the database. 
	require 'dbAccessObject.php';
	// sets the variables for connecting with the database. 
	$server = 'db';
	$username = 'root';
	$password = 'root';
	$schema = 'assignment';
	// connects to the database functions and passes it the variables. 
	$dbAccessObject = new DbAccessObject($server, $username, $password, $schema);
	$pdo = $dbAccessObject->getPdo();
	// this pulls through the categories.
	$Categories = $dbAccessObject->retrieveCategories();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"/>

    <title>Northampton News</title>
  </head>
  <body>
		<header>
			<section>
					<h1>Northampton News</h1>
			</section>
		</header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="latestArticle.php">Articles</a></li>
				<li><a href="articleCategory.php?category=category">Categories</a>
				<ul>
<?php
// this pulls the categories through. 
	foreach ($Categories as $row){
			echo '<li><a href="articleCategory.php?category=' . $row['categoryName'] . '">' . $row['categoryName'] . '</a></li>';
		
	} 

?>
				</ul>
				</li>
				<li><a href="contact.php">Contact us</a></li>
			</ul>
		</nav>
		<img src="images/banners/randombanner.php" />
		