<?php 
    require("connect.php");
	require("navibar.php");       
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
	<script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
    <title>Registeration</title>
</head>
<style>

	.big {
		margin-top: 200px;
	    width: 1000px;
	    height: 800px;
	}
	body{
		background-color: #F1E6E3;
	}
</style>
<body>
    <div class="container big my-5">
	<?php if(isset($_SESSION['created_acc']) == "false"){ ?>
		<div class="alert alert-danger d-flex align-items-center" role="alert">
			<div>Something went wrong, please try again</div>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php } ?>
        <div class="col-md-5 col-12 shadow bg-white border mx-auto p-4">
            <h2 class="text-center fw-bold mb-3">
                Information Registeration
		</h2>

		<form action="insert.php" method="POST">
				<div class="row">
					<label  class="form-label">First Name</label>
					<input class="form-control" type="text" name="fname" required />
				</div>
				<div class="row">
					<label  class="form-label">Last Name</label>
					<input class="form-control" type="text" name="lname" required />
				</div>
				<div class="row">
					<label  class="form-label">Birthdate</label>
					<input class="form-control" type="text" name="birthdate" placeholder="YYYY-MM-DD"required />
				</div>
				<div class="row">
					<label  class="form-label">Age</label>
					<input class="form-control" type="text" name="age" required />
				</div>
				<div class="row">
					<label  class="form-label">Contact No.</label>
					<input class="form-control" type="text" name="cnum" required />
				</div>
				<div class="row">
					<label  class="form-label">Email Add</label>
					<input class="form-control" type="text" name="email" required />
				</div>
				<div class="row">
					<label  class="form-label">Password</label>
					<input class="form-control" type="password" name="password" required />
				</div>				
				<div class="row">
					<label  class="form-label">Confirm Password</label>
					<input class="form-control" type="password" name="cpassword" required />
				</div>
				<div class="row">
					<input class="mt-3" type="submit" name="registerBtn" value="Register" />
				</div>
		</form>
	</div>
	<div class="conatiner d-flex justify-content-center mt-5">
	<form>
		<span class="iconify" data-icon="bi:arrow-left-circle" data-width="50" data-height="50" type="button" value="Go back!" onclick="history.back()">
		</span>
	</form>
	</div>
</body>

</html>