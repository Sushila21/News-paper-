<?php
	require 'header.php';
?>
<main>
<?php
	require 'leftColumn.php';
?>
			
			<article>
				<h2>Sign Up</h2>
				<form action="signUpcompleted.php" method="POST">
					<p>Please enter the below information in order to set up an account.</p>
				<div class="row">
					<div class="col-3"><label class="form-label">First Name</label></div>
					<div class="col-9"><input type="text" name="fName" class="form-control" /> </div>
				</div>

				<div class="row">
				<div class="col-3">
				<label class="form-label">Surname</label>
						</div>
					<div class="col-9">
					<input type="text" name="sName" class="form-control" />

					</div>
				</div>
				<div class="row">
				<div class="col-3">
				<label class="form-label">Date Of Birth</label>
						</div>
					<div class="col-9">
					<input type="date" name="dob" class="form-control" />
					</div>
				</div>
				<div class="row">
				<div class="col-3">
				<label class="form-label">Email</label>
						</div>
					<div class="col-9">
					<input type="text" name="email" class="form-control"/>
					</div>
				</div>
				<div class="row">
				<div class="col-3">
				<label class="form-label">Password</label>
						</div>
					<div class="col-9">
					<input type="password" name="pass" class="form-control"/>
					</div>
				</div>
					 
					 
					 
					<input type="submit" name="submit" value="Submit" class="btn btn-primary float-end"/>
				</form>

			</article>
		</main>
<?php
	require 'footer.php';
?>