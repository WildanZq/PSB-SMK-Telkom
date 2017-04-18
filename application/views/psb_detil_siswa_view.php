<?php
	if (!$this->session->userdata('logged_in')) {
		redirect('psb_admin');
	}
?>
<a style="float:right; margin: 10px;" href="<?php echo base_url('index.php/psb_admin/logout'); ?>">Logout</a>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
					  	<div class="panel panel-info">
							<div class="panel-heading">Lihat Detil Data Siswa</div>
							<?php foreach ($tampil as $siswa) {?>
					    	<div class="panel-body">
					    		<div class="col-md-9 col-sm-9 col-xs-9 col-lg-9">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" id="nama" name="nama" autofocus placeholder="Nama Lengkap" class="form-control" value="<?php echo $siswa->nama; ?>" disabled />
									</div>
									<br>
						    		<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
										<textarea id="alamat" name="alamat" placeholder="Alamat Lengkap" class="form-control" disabled><?php echo $siswa->alamat; ?></textarea>
									</div>
									<br>
						    		<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
										<input type="number" id="telp" name="telp" autofocus placeholder="Nomor Telepon" class="form-control" value="<?php echo $siswa->no_telp; ?>" disabled />
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
										<input type="text" id="asal_smp" name="asal_smp" autofocus placeholder="Asal SMP" class="form-control" value="<?php echo $siswa->asal_smp; ?>" disabled />
									</div>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
									<div id="foto-siswa">
										<?php
											if ($siswa->foto != "") { ?>
												<img src="../../../uploads/<?php echo $siswa->foto; ?>" width="150px" height="200px">
											<?php } else { ?>
												<img src="../../../uploads/blank_profile.jpg" width="150px" height="200px">
											<?php }
										?>
									</div>
								</div>
								<br>

								<!-- LINK KEMBALI KE TABEL DATA SISWA -->
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12" style="margin-top: 10px;">
									<a href="../" class="btn btn-md btn-primary">Kembali</a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
