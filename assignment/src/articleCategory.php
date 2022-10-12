<?php
	require 'header.php';
?>
<main>
<?php
	require 'leftColumn.php';
?>
			<article>

			<h2 class="text-center">List of News Categories</h2>
<?php
		if ($_GET['category'] == 'category'){
			$categories = $dbAccessObject-> retrieveCategories();
			foreach ($categories as $row){

				
				echo '<a href="articleCategory.php?category=' . $row['categoryName'] . '">
				<ul class="list-group list-group-flush">
				
				<li class="list-group-item"><h5>' . $row['categoryName'] . '</h5></li>
				</ul>';
				
				echo '<form>';
				echo '</form>';
			}
		}
		else{
		// uses the reetrive article function inorder to grab the categories. 
			$articles = $dbAccessObject->retrieveArticles($_GET['category']);
		// displays the results using a loop. This will show a list of all the categories that are available. 
			if ($articles ->rowCount() == 0) {
				echo '<p> Unfortunately there is no articles for this category. </p>';
			}
			else {
				foreach ($articles as $row){
					echo'
		<div class="row">
<div class="col-2"></div>
<div class="col-8"><div class="card">
  
<div class="card-body">
<a href="article.php?article=' . $row['articleName'] . '" class="link-dark text-monospace"
<h2 class="card-title">' . $row['articleName'] . '</h2>
  <p class="card-text">Written by: ' . $row['articleAuthor'] .'</p>
  <p class="card-text">Created: ' . $row['creationDate'] .'</p>

  <a href="article.php?article=' . $row['articleName'] . '" class="btn btn-primary float-end">Read</a>
</div>
</div></a></div>
<div class="col-2"></div>

</div>
	
		
		
		
		';
					echo '<form>';
					echo '</form>';
				}
			}
		}	
				
							
					
?>		

			</article>
		</main>
<?php
	require 'footer.php';
?>