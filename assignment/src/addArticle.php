<?php
	require 'header.php';

?>
<main>
<?php
	require 'leftColumn.php';
?>
			<article>
				<h2>Add a new article..</h2>
<?php
			// code runs a validate function for what has been entered. 
			$validationResults = validateFields($_POST);
				if (!isset($_POST['submit']) || empty($_POST['submit'])){



					echo '<div class="row">

					<div class="col-2"></div>
					<div class="col-8"><form action="addArticle.php" method="POST"> 
					<div class="row">
					<div class="col-6"><label class="form-label"> Article name:</label></div>
					<div class="col-6"><input type="text" name="articleName" class="form-control"/></div>

					</div>

					<div class="row">
					<div class="col-6"><label class="form-label"> Article name:</label></div>
					<div class="col-6"><input type="text" name="articleName" class="form-control"/></div>

					</div>

					<div class="row">
					<div class="col-6"><label class="form-label">Article author:</label></div>
					<div class="col-6"><input type="text" name="articleAuthor" class="form-control"/></div>

					</div>
					<div class="row">
					<div class="col-6"><label class="form-label">Article date:</label></div>
					<div class="col-6"><input type="date" name="articleDate" class="form-control"/></div>

					</div>
					<div class="row">
					<div class="col-6"><label class="form-label">Article category:</label></div>
					<div class="col-6"><input type="text" name="articleCategory" class="form-control"/></div>

					</div>
					<div class="row">
					<div class="col-6"><label class="form-label">Article content:</label></div>
					<div class="col-6"><textarea name="articleContent" class="form-control"> </textarea></div>

					</div>
					 
					 
					 
					
					<input type="submit" name="submit" value="Submit" class="btn btn-primary" />
					</form></div>
					<div class="col-2"></div>
					
					</div>';
				}
				
				else{
					// this checks whether the form fields above has been filled out and executes adding an article using the credentials above.
					if ($validationResults['isValid']){
						// pulls through the article name to check the article name hasn't already been used.
						$addArticleVerificationResult = $dbAccessObject->checkArticleName($_POST['articleName']);
						// check that the category used is one that is in the database otherwise will need creating. 
						$checkCategoryName = $dbAccessObject->checkDeleteCategory($_POST['articleCategory']);
						if ($addArticleVerificationResult->rowCount() >= 1){
							echo '<p> Article name already used. </p>';
						}
						if ($checkCategoryName->rowCount() == 0){
							echo '<p> Category name has not been added please type in a category that has been added. </p>';
						}
						else {
							// below line helps keep spaces in text fields. This is done by looking for \n (newline) and changes it to <br>.
							$articleContent=preg_replace("/[\n]/","<br>",$_POST['articleContent']);
							// criteria for the adding article query.
							$articleCriteria = [
												'articleName' => $_POST['articleName'],
												'articleAuthor' => $_POST['articleAuthor'],
												'creationDate' => $_POST['articleDate'],
												'categoryName' => $_POST['articleCategory'],
												'articleContent' => $articleContent];
							// executing the query and storing it in a variable.
							$addArticle = $dbAccessObject->addArticle($articleCriteria); 
							echo '<p> Article has been added.</p>';
						}	
					}
					else{
						echo '<p> please fill out all the boxes. </p>';
					}
					
				}
			
		function validateFields($fields){
	// array for validating the fields if they are false or blank then the field isn't valid	
		$valid = [
			'isValid' => true,
			'invalidField' => ''
		];
		
		if(!isset($fields['articleName']) || empty($fields['articleName'])){
			$valid['isValid'] = false;
			$valid['invalidField'] = 'articleName';
		}
		
		if(!isset($fields['articleAuthor']) || empty($fields['articleAuthor'])){
			$valid['isValid'] = false;
			$valid['invalidField'] = 'articleAuthor';
		}
		
		if(!isset($fields['articleDate']) || empty($fields['articleDate'])){
			$valid['isValid'] = false;
			$valid['invalidField'] = 'articleDate';
		}
		
		if(!isset($fields['articleCategory']) || empty($fields['articleCategory'])){
			$valid['isValid'] = false;
			$valid['invalidField'] = 'articleCategory';
		}
		if(!isset($fields['articleContent']) || empty($fields['articleContent'])){
		
			$valid['isValid'] = false;
			$valid['invalidField'] = 'articleContent';
		}
		
		return $valid;
	}
?>
			</article>
		</main>
<?php
	require 'footer.php';
?>