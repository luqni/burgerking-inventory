<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>

	<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
					<a href="<?php echo site_url('admin/siswa/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					<div class="panel-body">
						<h4 align="center">MENU <br/> INVENTORY </h4>
					</div>
					<hr>
						<div class="container">
							<form action="admin/siswa/index/">
								<label for="birthday">Date:</label>
								<input type="date" id="date" name="date">
								<input type="submit" value="Submit">
							</form>
						</div>
					</div>

					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead class="thead-dark">
									<tr>
										<th style="text-align:center" rowspan="2">No</th>
										<th style="text-align:center" rowspan="2">Kode</th>
										<th style="text-align:center" rowspan="2">Item Name</th>
										<th style="text-align:center" style="text-align:center" colspan="3">Unit</th>
										<th style="text-align:center" rowspan="2">Stock of Name</th>
										<th style="text-align:center" rowspan="2">Transfer</th>
										<th style="text-align:center" rowspan="2">End Monhtly</th>
										<th style="text-align:center" rowspan="2">Actual</th>
										<th style="text-align:center" rowspan="2" >Action</th>
									</tr>
									<tr>
										<th style="text-align:center">CV</th>
										<th style="text-align:center">Pack</th>
										<th style="text-align:center">EA</th>	
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 0;
									 foreach ($data_barang as $barang): $no++?>
									<tr>
										<td style="text-align:center" width="50"> <?php echo $no ?> </td>
										<td style="text-align:center" width="150">
											<?php echo $barang->kode ?>
										</td>
										<td style="text-align:center">
											<?php echo $barang->item_name ?>
										</td>
										
										<td style="text-align:center">
											<?php echo $barang->cv ?>
										</td>
										<td style="text-align:center">
											<?php echo $barang->pack ?>
										</td>
										<td style="text-align:center">
											<?php echo $barang->ea ?>
										</td>
										<td style="text-align:center">
											<?php echo $barang->stok_op_name ?>
										</td>
										<td style="text-align:center">
											<?php echo $barang->transfer ?>
										</td>
										<td style="text-align:center">
											<?php echo $barang->endmonthly ?>
										</td>
										
										<td style="text-align:center">
											<?php echo $barang->actual ?>
										</td>
										
										<td style="text-align:center" width="250">
											<a href="<?php echo site_url('admin/siswa/edit/'.$barang->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/siswa/delete/'.$barang->id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
} );
	</script>
</body>

</html>
