<?php
sleep(2.5);
include 'data-connect.php';
if(isset($_POST['data-req'])){
    $requestData = $_POST['data-req'];

    $query = "SELECT * FROM produk JOIN users ON produk.id_user = users.id_user WHERE produk.nama_produk LIKE '%$requestData%' OR users.kota LIKE '%$requestData%' OR users.nama_user LIKE '%$requestData%'";
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
										echo '../'.$row['gambar'];
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
									> <span class="d-flex justify-content-center">STOK : <?= $row['qty'] ?></span>
                                    <p class="float-end"><strong>Kota : <?= $row['kota'] ?></strong></p>
								</div>
								<div class="card-footer bg-leaf text-dark">
                                    Dibuat pada :
									<?= $row['tgl_buat'] ?>
                                    <p class="float-end mt-2 text-dark">
                                        Terakhir Diedit : 
                                        <?= $row['di_edit']; ?>
                                    </p>
								</div>
							</div>
						</div>
<?php	}}else{

	echo '<h1 class="text-center">'.'Produk tidak ditemukan!'.'</h1>';
}?>