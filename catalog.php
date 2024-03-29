<?php
					$batas = 6;
					$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
					$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
					$katalog = mysqli_query($connection, "SELECT * FROM users JOIN produk WHERE users.id_user = produk.id_pemilik AND produk.status = 'aktif' AND produk.id_pemilik != '$sesi_id' LIMIT $halaman_awal, $batas");
					$row = mysqli_num_rows($katalog);
					$previous = $halaman - 1;
					$next = $halaman + 1;
					$data_conn = mysqli_query($connection,"SELECT * FROM users JOIN produk WHERE users.id_user = produk.id_pemilik AND produk.status = 'aktif' AND produk.id_pemilik != '$sesi_id'");
					$jumlah_data = mysqli_num_rows($data_conn);
					$total_halaman = ceil($jumlah_data / $batas);
					?>
					<div class="row">
						<?php if($row > 0){
							while($data = mysqli_fetch_array($katalog)){
								?>
						<div class="col-md-6">
							<div class="card mb-3">
								<img
									src="<?php if(empty($data['gambar'])){
										echo 'https://placeholder.co/100x70';
									}else{
										echo $data['gambar'];
									}
									?>
									"
									alt=""
									class="card-img-top" width="300px" height="300px"/>
								<div class="card-body bg-blur">
									<h5 class="card-title"><?= $data['nama_produk'] ?></h5>
									<p class="card-text"><strong>Rp <?= $data['harga'] ?>,-</strong></p>
									<p class="card-text"><strong>Penjual : </strong><?= $data['nama_user'] ?></p>
									<p class="card-text">
										<?php echo substr($data['deskripsi'], 0, 100); ?>
									</p>
									<a href="#" class="badge <?php if($data['kategori'] == 'daun'){
                                                    echo 'bg-warning'.' '.'text-dark';
                                                }else if($data['kategori'] == 'diair'){
                                                    echo 'bg-primary';
                                                }else if ($data['kategori'] == 'berduri'){
                                                    echo 'bg-success';
                                                }else if($data['kategori'] == 'bunga'){
                                                    echo 'bg-info';
                                                }else{
                                                    echo 'bg-secondary';
                                                } ?> non-deco"
										><i class="fas fa-tags"></i> <?= $data['kategori'] ?></a
									> <span class="d-flex justify-content-center">STOK : <?php if($data['qty'] <= 0 ){
										echo 'Stok Habis';
									} else {
										echo $data['qty'];
									} ?></span>
                                    <p class="float-end"><strong>Kota : <?= $data['kota'] ?></strong></p>
								</div>
								<div class="card-footer bg-ktg-leaf">
									<form action="functions/insert-to-cart.php" method="get">
										<div class="input-group">
                                            <input type="text" style="display: none;" value="<?= $data['id_produk'] ?>" name="id-produk" id="">
											<input
												type="number"
												name="jumlah"
                                                value="1"
												id=""
												class="form-control"
												pattern="*[1-9]" />
											<div class="input-group-append">
											<?php if($data['qty'] <= 0){ ?>
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
						<?php	}}?>
						
					</div>