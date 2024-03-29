<?php
session_start();
$sesi_id = $_SESSION['id'];
sleep(2.5);
include 'data-connect.php';
if(isset($_POST['request'])){
    $request = $_POST['request'];

    $query = "SELECT * FROM produk JOIN users ON produk.id_pemilik = users.id_user WHERE produk.kategori = '$request' AND produk.status = 'aktif' AND produk.id_pemilik != '$sesi_id'";
    $result = mysqli_query($connection, $query);
    $set = mysqli_num_rows($result);
}


?>


<?php if($set){

while($row = mysqli_fetch_assoc($result)){
?>
						<div class="col-md-6">
							<div class="card mb-3">
								<img
									src="<?php if(empty($row['gambar'])){
										echo 'https://placeholder.co/100x70';
									}else{
										echo $row['gambar'];
									}
									?>
									"
									alt=""
									class="card-img-top" width="300px" height="300px"/>
								<div class="card-body bg-blur">
									<h5 class="card-title"><?= $row['nama_produk'] ?></h5>
									<p class="card-text"><strong>Rp <?= $row['harga'] ?>,-</strong></p>
									<p class="card-text"><strong>Penjual : </strong><?= $row['nama_user'] ?></p>
									<p class="card-text">
										<?php echo substr($row['deskripsi'], 0, 100); ?>
									</p>
									<a href="#" class="badge <?php if($row['kategori'] == 'daun'){
                                                    echo 'bg-warning'.' '.'text-dark';
                                                }else if($row['kategori'] == 'diair'){
                                                    echo 'bg-primary';
                                                }else if ($row['kategori'] == 'berduri'){
                                                    echo 'bg-success';
                                                }else if($row['kategori'] == 'bunga'){
                                                    echo 'bg-info';
                                                }else{
                                                    echo 'bg-secondary';
                                                } ?> non-deco"
										><i class="fas fa-tags"></i> <?= $row['kategori'] ?></a
									> <span class="d-flex justify-content-center">STOK : <?php if($row['qty'] <= 0 ){
										echo 'Stok Habis';
									} else {
										echo $row['qty'];
									} ?></span>
                                    <p class="float-end"><strong>Kota : <?= $row['kota'] ?></strong></p>
								</div>
								<div class="card-footer bg-ktg-leaf">
									<form action="functions/insert-to-cart.php" method="get">
										<div class="input-group">
                                            <input type="text" style="display: none;" value="<?= $row['id_produk'] ?>" name="id-produk" id="">
											<input
												type="number"
												name="jumlah"
                                                value="1"
												id=""
												class="form-control"
												pattern="[0-9]" />
											<div class="input-group-append">
											<?php if($row['qty'] <= 0){ ?>
												<button disabled="disabled" class="btn btn-success">
													<i class="fas fa-cart-plus"></i>
												</button>
											<?php } else { ?>
												<button class="btn btn-success">
													<i class="fas fa-cart-plus"></i>
												</button>
											<?php } ?>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
<?php	}}else{
	echo '<h1 class="text-center">'.'Produk tidak ditemukan!'.'</h1>';
}?>
