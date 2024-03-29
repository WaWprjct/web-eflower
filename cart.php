<?php 
include 'functions/data-connect.php';
session_start();
if (isset($_SESSION["user_mail"]) == NULL) {
	header('location: form.php');
	exit;
	
}elseif ($_SESSION["role"] == 'admin') {
	header("location: admin/index.php");
	exit;
}

$sesi_id = $_SESSION['id'];


?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
	<head>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<script src="assets/libs/bootstrap/js/color-modes.js"></script>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />
		<title>Keranjang Belanja</title>

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
								<a href="manage.php" class="dropdown-item">Toko</a>
								<a href="manage-orders.php" class="dropdown-item">Order</a>
								<a href="report.php" class="dropdown-item">Laporan Penjualan</a>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav">
						<li class="nav-item">
							<?php
								$query = "SELECT * FROM cart 
								JOIN detailorder ON cart.orderid = detailorder.orderid
								JOIN produk ON detailorder.id_produk = produk.id_produk WHERE cart.status = 'Cart' AND cart.id_user = '$sesi_id'";

								$query_conn = mysqli_query($connection, $query);
								$jml_array = mysqli_num_rows($query_conn);
							?>
							<a href="cart.php" class="nav-link active"
								><i class="fas fa-shopping-cart"></i>Cart (<span><?= $jml_array; ?></span>)</a
							>
						</li>
						<li class="nav-item dropdown">
							<a
								href="#"
								class="nav-link dropdown-toggle"
								id="dropdown-2"
								data-bs-toggle="dropdown"
								aria-haspopup="true"
								aria-expanded="false"
								>User</a
							>
							<div href="#" class="dropdown-menu" aria-labelledby="dropdown-2">
								<a href="profile.php" class="dropdown-item">Profile</a>
								<a href="orders.php" class="dropdown-item">Orders</a>
								<a onclick="logOut()" class="dropdown-item">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<main role="main" class="container">
			<div class="row">
				<div class="col-md-12 bg-blur">
					<div class="card md-3">
						<div class="card-header">Cart</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">Produk</th>
										<th scope="col" class="text-center">Harga</th>
										<th scope="col" class="text-center">Jumlah</th>
										<th scope="col" class="text-center">Subtotal</th>
										<th scope="col"></th>
									</tr>
								</thead>

								<?php 



								if($jml_array){
									$count_loop = 0;
									$total = 0;
									while($data = mysqli_fetch_array($query_conn)){
									
								?>

								<tbody>
									<tr>
										<td scope="row">
											<p>
												<img src="<?php if(empty($data['gambar'])){
													echo 'https://placeholder.co/100x70';
												}else{
													echo $data['gambar'];
												}
												?>" alt="" width="70" height="70" />
												<strong class="ms-3"><?= $data['nama_produk']; ?></strong>
											</p>
										</td>
										<td class="p-3 text-center">Rp<?=
										$data['harga'];
										?>,-</td>
										<td>
											<form action="">
												<div class="input-group">
													<?php 
													$orderid = $data['orderid'];
													$query3 = mysqli_query($connection, "SELECT * FROM detailorder WHERE orderid = '$orderid'");
													$get_data = mysqli_fetch_array($query3);
													?>
													<input
														type="number"
														class="form-control text-center"
														value="<?php echo $get_data['qty']; ?>" />
													<div class="input-append-clas">
														<button class="btn btn-info" type="submit">
															<i class="fas fa-check"></i>
														</button>
													</div>
												</div>
											</form>
										</td>
										<td class="text-center p-3">Rp<?php
										$harga = $data['harga'];
										$jml_beli = $get_data['qty'];
									
										$subtotal = $harga * $jml_beli;
	
											$total += $subtotal;

										echo $subtotal;
										?>,-</td>
										<td>
											<form action="functions/remove-from-cart.php" method="post">
												<input type="text" style="display: none;" name="id-order" value="<?= $data['orderid']; ?>" >
												<button class="btn btn-danger" type="submit">
													<i class="fas fa-trash-alt"></i>
												</button>
											</form>
										</td>
										<td>
										<a href="checkout.php?id_order=<?= $data['orderid']; ?>" class="btn bg-success float-end text-white">Pembayaran <i class="fas fa-angle-right"></i></a>
										</td>
										<?php $count_loop++; }
										
										 } ?>
                                        <tr>
                                            <td colspan="3"><strong>Total</strong></td>
                                            <td class="text-center"><strong>Rp<?php
										
										echo $total;
										?>
                                        </tr>
									</tr>
								</tbody>
						
							</table>
						</div>
                        <div class="card-footer">
                            
                            <a href="." class="btn btn-warning float-start text-white"><i class="fas fa-angle-left"></i> Beli Lagi</a>
                        </div>
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
