<?php include 'functions/data-connect.php';
session_start();

if (isset($_SESSION["user_mail"]) == NULL) {
	header('location: form.php');
	exit;
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
	<script src="assets/libs/bootstrap/js/color-modes.js"></script>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="" />

	<title>MyInfo</title>

	<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

	<link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<!-- fontawesome CSS -->
	<link rel="stylesheet" href="assets/libs/fontawesome/css/all.min.css" />

	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="assets/css-native/app.css" />
</head>

<body>
	<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
		<symbol id="check2" viewBox="0 0 16 16">
			<path
				d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
		</symbol>
		<symbol id="circle-half" viewBox="0 0 16 16">
			<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
		</symbol>
		<symbol id="moon-stars-fill" viewBox="0 0 16 16">
			<path
				d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
			<path
				d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
		</symbol>
		<symbol id="sun-fill" viewBox="0 0 16 16">
			<path
				d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
		</symbol>
	</svg>

	<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
		<button class="btn btn-success py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
			aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
			<svg class="bi my-1 theme-icon-active" width="1em" height="1em">
				<use href="#circle-half"></use>
			</svg>
			<span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
		</button>
		<ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
			<li>
				<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
					aria-pressed="false">
					<svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
						<use href="#sun-fill"></use>
					</svg>
					Light
					<svg class="bi ms-auto d-none" width="1em" height="1em">
						<use href="#check2"></use>
					</svg>
				</button>
			</li>
			<li>
				<button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
					aria-pressed="false">
					<svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
						<use href="#moon-stars-fill"></use>
					</svg>
					Dark
					<svg class="bi ms-auto d-none" width="1em" height="1em">
						<use href="#check2"></use>
					</svg>
				</button>
			</li>
			<li>
				<button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
					aria-pressed="true">
					<svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
						<use href="#circle-half"></use>
					</svg>
					Auto
					<svg class="bi ms-auto d-none" width="1em" height="1em">
						<use href="#check2"></use>
					</svg>
				</button>
			</li>
		</ul>
	</div>

	<nav class="navbar navbar-expand-md fixed-top <?php if($_SESSION['role'] == 'admin'){ echo 'bg-dark navbar-dark'; } else { echo 'bg-leaf'; } ?>">
		<div class="container-fluid container">
			<a class="navbar-brand text-leaf fw-bolder" href=".">E<span class="text-white">flower</span></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
				aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav me-auto mb-2 mb-md-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href=".">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a
								href="#"
								class="nav-link dropdown-toggle"
								id="dropdown-1"
								data-bs-toggle="dropdown"
								aria-haspopup="true"
								aria-expanded="false"
								>Manage</a
							>
							<div href="#" class="dropdown-menu" aria-labelledby="dropdown-1">
							<?php if($_SESSION['role'] == 'admin'){ ?> 
								<a href="admin/admin-product.php" class="dropdown-item">Produk</a>
								<a href="admin/admin-order.php" class="dropdown-item">Order</a>
								<a href="admin/admin-users.php" class="dropdown-item">Pengguna</a>
							<?php } else { ?>
								<a href="manage.php" class="dropdown-item">Toko</a>
                            	<a href="manage-orders.php" class="dropdown-item">Order</a>
                            	<a href="report.php" class="dropdown-item">Laporan Penjualan</a>
							<?php } ?>
							</div>
						</li>
					</ul>
				<ul class="navbar-nav me-auto mb-2 mb-md-0">
				</ul>
				<ul class="navbar-nav">
					<li class="nav-item dropdown">
						<a href="#" class="nav-link active dropdown-toggle" id="dropdown-2" data-bs-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">User</a>
						<div href="#" class="dropdown-menu" aria-labelledby="dropdown-2">
							<a href="profile.php" class="dropdown-item active">Profile</a>
							<a onclick="logOut()"
								class="dropdown-item point">Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<?php
	$sesi_id = $_SESSION['id'];

	$query = mysqli_query($connection, "SELECT * FROM users WHERE id_user='$sesi_id'");
	$dt_user = mysqli_fetch_array($query);

	$nama_lkp = $dt_user[7] ;
	$telp = $dt_user[6] ;
	$link_poto = $dt_user[5];
	$nmr_rek = $dt_user['no_rek'];

	
	
	?>

	<main role="main" class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="card mb-3">
					<div class="card-header bg-leaf">Menu</div>
					<div class="list-group list-group-flush">
						<li class="list-group-item">
							<a href="profile.php" class="non-deco" active>Profile</a>
						</li>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card" mb-3>
					<div class="card-body">
						<img src="<?php
						if (empty($link_poto)) {
							echo 'assets/img/profile/user-profile.png';
						} else {
							echo $link_poto;
						}
						?>" alt="" width="70px" height="235px" class="card-img-top rounded-pill" />
					</div>
					<div class="card-footer">
						<a href="photo-update.php" class="btn btn-success"><i class="fas fa-user-pen"></i></a>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="card">
					<?php if (isset($_GET["success"])): ?>
						<script>
							alert('Data anda telah diperbarui!');
						</script>
					<?php endif ?>
					<div class="card-header bg-leaf">Profile</div>
					<form action="">
						<div class="card-body">
							<div class="form-group">
								<label for="">Nama: </label>
								<input type="text" class="form-control" value="<?php
								if (!empty($nama_lkp)) {
									echo $nama_lkp;
								} else {
									echo 'NONAME';
								}
								?>" readonly />
							</div>
							<div class="form-group">
								<label for="">Email: </label>
								<input type="email" class="form-control" value="<?php
								if (!empty($_SESSION['user_mail'])) {
									echo $_SESSION['user_mail'];
								} else {
									echo 'NONE';
								}
								?>" readonly />
							</div>
							<div class="form-group">
								<label for="">Telpon: </label>
								<input type="text" class="form-control" value="+62-<?php
								if (!empty($telp)) {
									echo $telp;
								} else {
									echo '0000000000000';
								}
								?>" pattern="[0-9]" readonly />
							</div>
							<div class="form-group">
								<label for="">No Rekening: </label>
								<input type="text" class="form-control" value="<?php
								if (!empty($nmr_rek)) {
									echo $nmr_rek;
								} else {
									echo 'XXXXXXXXXXXXX';
								}
								?>" readonly />
							</div>

						</div>
						<div class="card-footer">
							<a class="btn btn-success" href="profile-update.php">
								Edit <i class="p-1 fas fa-user-pen"></i>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</main>
	
	<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/libs/jquery/jquery-3.7.1.min.js"></script>
	<script src="assets/js-native/confirm.js"></script>
	<?php include 'footer.php'; ?>
</body>
</html>