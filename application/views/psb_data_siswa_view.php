<a style="float:right; margin: 10px;" href="<?php echo base_url('index.php/psb_admin/logout'); ?>">Logout</a>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
					  	<div class="panel panel-info">
							<div class="panel-heading">Data Pendaftar</div>
					    	<div class="panel-body">
									<?php
										$notif = $this->session->flashdata('notif');

										if (!empty($notif)) {
											echo '
												<div class="alert alert-danger">
													'.$notif.'
												</div>
											';
										}
									?>
								<table border="0" cellpadding="4" cellspacing="0" class="datatable table table-striped table-bordered">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Asal SMP</th>
										<th>Nomor Telp</th>
										<th>Aksi</th>
									</tr>
									<?php
										$no=1;
										foreach ($pendaftar as $data) {
											echo '
											<tr>
												<td>'.$no.'</td>
												<td>'.$data->nama.'</td>
												<td>'.$data->asal_smp.'</td>
												<td>'.$data->no_telp.'</td>
												<td>
													<a href="./detil_siswa/'.$data->id.'" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-search"></i> Lihat</a>
													<a href="./hapus/'.$data->id.'" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
												</td>
											</tr>
											';
											$no++;
										}
									?>
								</table>
							</div>
						</div>
					</div>
				</div>
