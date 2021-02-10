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

							<input type="hidden" name="id_transaksi" value="<?php echo $siswa->id_transaksi?>" />

							<div class="form-group">
								<label for="nis">CV</label>
								<input class="form-control <?php echo form_error('cv') ? 'is-invalid':'' ?>"
								 type="text" name="cv" placeholder="CV" value="<?php echo $siswa->cv ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('cv') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nis">Pack</label>
								<input class="form-control <?php echo form_error('pack') ? 'is-invalid':'' ?>"
								 type="text" name="pack" placeholder="CV" value="<?php echo $siswa->pack ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('pack') ?>
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
