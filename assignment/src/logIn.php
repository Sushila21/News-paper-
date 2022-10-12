<?php
	require 'header.php';

?>
<main>
	<?php
	require 'leftColumn.php';
?>
	<article>
		<h2 class="text-center">Log In</h2>
		<form action="logInCompleted.php" method="POST">
			<div class="row">
				<div class="col-3"></div>
				<div class="col-6">
					<div class="row">
						<div class="col-3"><label class="form-label">Email</label></div>
						<div class="col-9"><input type="text" name="email" class="form-control" /></div>

					</div>
					<div class="row">
						<div class="col-3"><label class="form-label">Password</label></div>
						<div class="col-9"><input type="password" name="pass" class="form-control" /></div>

					</div>
					<input type="submit" name="submit" value="Submit" class="btn btn-primary float-end" />
				</div>
				<div class="col-3"></div>


			</div>


			
		</form>

	</article>
</main>
<?php
	require 'footer.php';
?>