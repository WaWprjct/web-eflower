<?php
session_start();
if (isset($_SESSION["user_mail"]) == NULL) {
	header('location: form.php');
	exit;
	
}elseif ($_SESSION["role"] == 'admin') {
	header("location: admin/index.php");
	exit;
}
$default_rekening = $_SESSION['no-rek'];
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
	<head>
		<script src="assets/libs/bootstrap/js/color-modes.js"></script>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />
		<title>Confirm Orders - Eflower</title>

		<link
			rel="canonical"
			href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/" />

		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />

		<link
			href="assets/libs/bootstrap/css/bootstrap.min.css"
			rel="stylesheet" />

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

		<div
			class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
			<button
				class="btn btn-success py-2 dropdown-toggle d-flex align-items-center"
				id="bd-theme"
				type="button"
				aria-expanded="false"
				data-bs-toggle="dropdown"
				aria-label="Toggle theme (auto)">
				<svg class="bi my-1 theme-icon-active" width="1em" height="1em">
					<use href="#circle-half"></use>
				</svg>
				<span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
			</button>
			<ul
				class="dropdown-menu dropdown-menu-end shadow"
				aria-labelledby="bd-theme-text">
				<li>
					<button
						type="button"
						class="dropdown-item d-flex align-items-center"
						data-bs-theme-value="light"
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
					<button
						type="button"
						class="dropdown-item d-flex align-items-center"
						data-bs-theme-value="dark"
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
					<button
						type="button"
						class="dropdown-item d-flex align-items-center active"
						data-bs-theme-value="auto"
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

		<nav class="navbar navbar-expand-md fixed-top bg-leaf">
			<div class="container-fluid container">
				<a class="navbar-brand text-leaf fw-bolder" href="#"
					>E<span class="text-white">flower</span></a
				>
				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarCollapse"
					aria-controls="navbarCollapse"
					aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav me-auto mb-2 mb-md-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="#">Home</a>
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
								<a href="manage.php" class="dropdown-item">Toko</a>
                            	<a href="manage-orders.php" class="dropdown-item">Order</a>
                            	<a href="report.php" class="dropdown-item">Laporan Penjualan</a>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav">
						<li class="nav-item">
							<?php
							include 'functions/data-connect.php';
							include 'functions/cart-num.php'; 
							?>
							<a href="cart.php" class="nav-link"
								><i class="fas fa-shopping-cart"></i>Cart (<span><?= $jml_array; ?></span>)</a
							>
						</li>

						<li class="nav-item dropdown">
							<a
								href="#"
								class="nav-link dropdown-toggle active"
								id="dropdown-2"
								data-bs-toggle="dropdown"
								aria-haspopup="true"
								aria-expanded="false"
								>User</a
							>
							<div href="#" class="dropdown-menu" aria-labelledby="dropdown-2">
								<a href="profile.php" class="dropdown-item">Profile</a>
								<a href="orders.php" class="dropdown-item active">Orders</a>
								<a onclick="logOut()" class="dropdown-item">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<main role="main" class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="card mb-3">
						<div class="card-header bg-leaf">Menu</div>
						<div class="list-group list-group-flush">
							<li class="list-group-item">
								<a href="profile.php" class="non-deco">Profile</a>
							</li>
							<li class="list-group-item">
								<a href="orders.php" class="non-deco">Order</a>
							</li>
						</div>
					</div>
				</div>

				<?php
				$id_data_order = $_POST['data_order']; 
				$total_tagihan_get = $_POST['total-tagihan'];
				?>
				<div class="col-md-9">
					<div class="card">
						<div class="card-header bg-leaf">
							Konfirmasi Order #<?= $id_data_order; ?>
							<div class="float-end">
								<span class="badge bg-warning text-dark badge-pill rounded-pill"
									>Menunggu Pembayaran</span
								>
							</div>
						</div>

						<form action="functions/confirm.php" method="post" enctype="multipart/form-data">
							<input type="number" name="total-tagihan-data" style="display: none;" value="<?= $total_tagihan_get; ?>" readonly>
							<div class="card-body">
								<div class="form-group">
									<label for="">Kode Transaksi: </label>
									<input
										type="text"
										name="order-id"
										class="form-control"
										value="<?= $id_data_order; ?>"
										readonly />
								</div>
								<div class="form-group">
									<label for="jenis pemayaran">Metode: </label>
									<select name="payment" class="form-control" id="" required>
										<option value="" disabled selected>Pilih Metode</option>
										<option value="bank">Transfer Bank</option>
										<option value="internet-banking">Internet Banking</option>
										<option value="e-wallet">E-Wallet</option>
										<option value="m-banking">Mobile Banking</option>
									</select>
								</div>
								<div class="form-group">
									<label for="no-rek">No Rekening/VA Pembayar:</label>
									<input type="text" class="form-control" name="no-rek-data" value="<?= $default_rekening; ?>" required>
									<small class="text-danger">EX. 0000000000(DANA)</small>
								</div>
								<div class="form-group">
									<label for="">Tanggal Bayar: </label>
									<input type="date" name="tgl-bayar" class="form-control" required>
								</div>
								<div class="form-group">
									<label for=""
										>Dari Rekening yang melakukan pembayaran:
									</label>
									<input name="atasnama" type="text" value="a/n ..." class="form-control" required/>
								</div>
								<div class="form-group">
									<label for="">Nominal: </label>
									<input name="total" type="number" class="form-control" required/>
								</div>
								<div class="form-group">
									<label for="">Catatan</label>
									<textarea
										name="description"
										id=""
										cols="30"
										rows="5"
										class="form-control"
										required></textarea>
								</div>
								<div class="form-group">
									<label for="set-image">Bukti Transfer: </label>
									<input type="file" class="form-control" name="set-image" required/>
								</div>
							</div>
							<div class="card-footer">
								<a href="orders.php" class="btn btn-warning float-start m-3" onclick="return confirm('Yakin untuk tidak menlanjutkan transaksi?')"><i class="fas fa-angle-left"></i> Kembali</a>
								<button type="submit" class="btn btn-success float-end m-3">
									Konfirmasi Pembayaran <i class="fas fa-clipboard-check"></i>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
		<?php include 'footer.php'; ?>
		<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="assets/libs/jquery/jquery-3.7.1.min.js"></script>
		<script src="assets/js-native/confirm.js"></script>
	</body>
</html>
