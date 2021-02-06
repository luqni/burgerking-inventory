<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/siswa/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/siswa/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $siswa->id?>" />

							<div class="form-group">
								<label for="nis">NIS*</label>
								<input class="form-control <?php echo form_error('nis') ? 'is-invalid':'' ?>"
								 type="text" name="nis" placeholder="NIS Siswa" value="<?php echo $siswa->nis ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nis') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nisn">NISN*</label>
								<input class="form-control <?php echo form_error('nisn') ? 'is-invalid':'' ?>"
								 type="text" name="nisn" placeholder="NISN Siswa" value="<?php echo $siswa->nisn ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nisn') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Nama Siswa*</label>
								<input class="form-control <?php echo form_error('nama_siswa') ? 'is-invalid':'' ?>"
								 type="text" name="nama_siswa" placeholder="Nama Siswa" value="<?php echo $siswa->nama_siswa ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama_siswa') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Tempat Lahir Siswa*</label>
								<input class="form-control <?php echo form_error('tmp_lahir_siswa') ? 'is-invalid':'' ?>"
								 type="text" name="tmp_lahir_siswa" placeholder="Tempat Lahir" value="<?php echo $siswa->tmp_lahir_siswa ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tmp_lahir_siswa') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Tanggal Lahir Siswa*</label>
								<input class="form-control <?php echo form_error('tgl_lahir_siswa') ? 'is-invalid':'' ?>"
								 type="date" name="tgl_lahir_siswa" placeholder="Tanggal Lahir" value="<?php echo $siswa->tgl_lahir_siswa ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_lahir_siswa') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Alamat Siswa*</label>
								<textarea class="form-control <?php echo form_error('alamat_siswa') ? 'is-invalid':'' ?>"
								 type="textarea" name="alamat_siswa" placeholder="<?php echo $siswa->alamat_siswa ?>" ></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('alamat_siswa') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Anak Ke*</label>
								<input class="form-control <?php echo form_error('anak_ke') ? 'is-invalid':'' ?>"
								 type="number" name="anak_ke" placeholder="Ke - " value="<?php echo $siswa->anak_ke ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('anak_ke') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Saudara Kandung*</label>
								<input class="form-control <?php echo form_error('saudara_kandung') ? 'is-invalid':'' ?>"
								 type="number" name="saudara_kandung" placeholder="Jumlah Saudara Kandung" value="<?php echo $siswa->saudara_kandung ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('saudara_kandung') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Nama Ayah*</label>
								<input class="form-control <?php echo form_error('nama_ayah') ? 'is-invalid':'' ?>"
								 type="text" name="nama_ayah" placeholder="Nama Ayah" value="<?php echo $siswa->nama_ayah ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama_ayah') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Tempat Lahir Ayah*</label>
								<input class="form-control <?php echo form_error('tmp_lahir_ayah') ? 'is-invalid':'' ?>"
								 type="text" name="tmp_lahir_ayah" placeholder="Tempat Lahir" value="<?php echo $siswa->tmp_lahir_ayah ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tmp_lahir_ayah') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Tanggal Lahir Ayah*</label>
								<input class="form-control <?php echo form_error('tgl_lahir_ayah') ? 'is-invalid':'' ?>"
								 type="date" name="tgl_lahir_ayah" placeholder="Tanggal Lahir" value="<?php echo $siswa->tgl_lahir_ayah ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_lahir_ayah') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Pendidikan Terakhir Ayah*</label>
								<input class="form-control <?php echo form_error('pendidikan_tinggi_ayah') ? 'is-invalid':'' ?>"
								 type="text" name="pendidikan_tinggi_ayah" placeholder="SMA/D3/S1" value="<?php echo $siswa->pendidikan_tinggi_ayah ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('pendidikan_tinggi_ayah') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Pekerjaan Ayah*</label>
								<input class="form-control <?php echo form_error('pekerjaan_ayah') ? 'is-invalid':'' ?>"
								 type="text" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" value="<?php echo $siswa->pekerjaan_ayah ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('pekerjaan_ayah') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Nomor Handphone Ayah*</label>
								<input class="form-control <?php echo form_error('nomor_hp_ayah') ? 'is-invalid':'' ?>"
								 type="text" name="nomor_hp_ayah" placeholder="+628.." value="<?php echo $siswa->nomor_hp_ayah ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nomor_hp_ayah') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Nama Ibu*</label>
								<input class="form-control <?php echo form_error('nama_ibu') ? 'is-invalid':'' ?>"
								 type="text" name="nama_ibu" placeholder="Nama Ibu" value="<?php echo $siswa->nama_ibu ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nama_ibu') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Tempat Lahir Ibu*</label>
								<input class="form-control <?php echo form_error('tmp_lahir_ibu') ? 'is-invalid':'' ?>"
								 type="text" name="tmp_lahir_ibu" placeholder="Tempat Lahir" value="<?php echo $siswa->tmp_lahir_ibu ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tmp_lahir_ibu') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Tanggal Lahir Ibu*</label>
								<input class="form-control <?php echo form_error('tgl_lahir_ibu') ? 'is-invalid':'' ?>"
								 type="date" name="tgl_lahir_ibu" placeholder="Tanggal Lahir" value="<?php echo $siswa->tgl_lahir_ibu ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tgl_lahir_ibu') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Pendidikan Terakhir Ibu*</label>
								<input class="form-control <?php echo form_error('pendidikan_tertinggi_ibu') ? 'is-invalid':'' ?>"
								 type="text" name="pendidikan_tertinggi_ibu" placeholder="SMA/D3/S1" value="<?php echo $siswa->pendidikan_tertinggi_ibu ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('pendidikan_tertinggi_ibu') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Pekerjaan Ibu*</label>
								<input class="form-control <?php echo form_error('pekerjaan_ibu') ? 'is-invalid':'' ?>"
								 type="text" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" value="<?php echo $siswa->pekerjaan_ibu ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('pekerjaan_ibu') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Nomor Handphone Ibu*</label>
								<input class="form-control <?php echo form_error('nomor_hp_ibu') ? 'is-invalid':'' ?>"
								 type="text" name="nomor_hp_ibu" placeholder="+628.." value="<?php echo $siswa->nomor_hp_ibu ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('nomor_hp_ibu') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Kelompok*</label>
								<input class="form-control <?php echo form_error('kelompok') ? 'is-invalid':'' ?>"
								 type="text" name="kelompok" placeholder="TK A1" value="<?php echo $siswa->kelompok ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('kelompok') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Tahun Ajar*</label>
								<input class="form-control <?php echo form_error('tahun_ajar') ? 'is-invalid':'' ?>"
								 type="text" name="tahun_ajar" placeholder="2019/2020" value="<?php echo $siswa->tahun_ajar ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('tahun_ajar') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
