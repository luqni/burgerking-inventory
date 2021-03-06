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
					
					<div class="panel-body">
						<h4 align="center">MENU <br/>WEEKLY INVENTORY </h4>
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
										<th style="text-align:center" rowspan="2" >Tanggal</th>
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
											<?php echo $barang->date ?>
										</td>
										
										<td style="text-align:center" width="250">
											<?php if($barang->cv === null){ ?>
											<a href=""
											 class="btn btn-small text-danger btn-record"  data-id ="<?= $barang->id ?>"  data-name ="<?= $barang->item_name ?>"  data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Record</a>
											 <?php }else{ ?>
											<a href="<?php echo site_url('admin/siswa/edit/'.$barang->id_transaksi) ?>"
											 class="btn btn-small btn-update" data-id2 ="<?= $barang->id ?>" data-id ="<?= $barang->id_transaksi ?>"  data-name ="<?= $barang->item_name ?>" data-cv ="<?= $barang->cv ?>"  data-pack ="<?= $barang->pack ?>" data-ea ="<?= $barang->ea ?>" data-stok ="<?= $barang->stok_op_name ?>" data-transfer ="<?= $barang->transfer ?>" data-endmonthly ="<?= $barang->endmonthly ?>" data-actual ="<?= $barang->actual ?>"  data-toggle="modal" data-target="#editModal" ><i class="fas fa-edit"></i> Update</a>
											
										<?php } ?>
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

	<!-- Modal Add Transaksi-->
    <form id="search_form" action="<?php echo base_url('admin/siswa/store');?>" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Record Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

				<div class="form-group">
                    <label>ID</label>
                    <input type="number" class="form-control id_barang" name="id_barang" value="4" disabled >
					<!-- <input type="number" class="form-control cv" name="id_barang" placeholder="Product CV"> -->
                </div>
             
                <div class="form-group">
                    <label>Item Name</label>
                    <input type="text" class="form-control item_name" name="item_name" placeholder="Product Name" disabled>
                </div>
                 
                <div class="form-group">
                    <label>CV</label>
                    <input type="number" id="cv" class="form-control " name="cv" placeholder="Product CV">
                </div>

				<div class="form-group">
                    <label>Pack</label>
                    <input type="number" id="pack" class="form-control " name="pack" placeholder="Product Pack">
                </div>
 
                <div class="form-group">
                    <label>EA</label>
                    <input type="number" id="ea" class="form-control " name="ea" placeholder="Product EA">
                </div>
				<div class="form-group">
                    <label>Stok Op Name</label>
                    <input type="number" id="stok_op_name" class="form-control " name="stok_op_name" placeholder="stok op name">
                </div>
				<div class="form-group">
                    <label>EndMonthly</label>
                    <input type="number" id="endmonthly" class="form-control " name="endmonthly" placeholder="endmonthly">
                </div>
				<div class="form-group">
                    <label>Transfer</label>
                    <input type="number" id="transfer" class="form-control " name="transfer" placeholder="Transfer">
                </div>
             
            </div>
            <div class="modal-footer">
				<input type="hidden" name="id_barang" class="id_barang">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit"  id="btn-submit2" class="btn btn-primary">Record</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Transaksi-->

	<!-- Modal Edit Transaksi-->
    <form action="<?php echo base_url('admin/siswa/update');?>" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<input type="number" class="form-control id_barang" name="id_barang" value="4" disabled >
                <div class="form-group">
                    <label>Item Name</label>
                    <input type="text" class="form-control item_name" name="item_name" placeholder="Product Name">
                </div>
                 
                <div class="form-group">
                    <label>CV</label>
                    <input type="text" class="form-control cv" name="cv" placeholder="Product Price">
                </div>
 
                <div class="form-group">
                    <label>Pack</label>
                    <input type="text" class="form-control pack" name="pack" placeholder="Product Price">
                </div>

				<div class="form-group">
                    <label>EA</label>
                    <input type="text" class="form-control ea" name="ea" placeholder="Product Price">
                </div>

				<div class="form-group">
                    <label>Stok Op Name</label>
                    <input type="text" class="form-control stok-op-name" name="stok_op_name" placeholder="Product Price">
                </div>

				<div class="form-group">
                    <label>Transfer</label>
                    <input type="text" class="form-control transfer" name="transfer" placeholder="Product Price">
                </div>

				<div class="form-group">
                    <label>End Monthly</label>
                    <input type="text" class="form-control endmonthly" name="endmonthly" placeholder="Product Price">
                </div>

				<div class="form-group">
                    <label>Actual</label>
                    <input type="text" class="form-control actual" name="actual" placeholder="Product Price" disabled>
                </div>
             
            </div>
            <div class="modal-footer">
				<input type="hidden" name="id_transaksi" class="id_transaksi">
				<input type="hidden" name="id_barang" class="id_barang">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>

	function form_submit() {
    document.getElementById("search_form").submit();
   } 

  
 
	
	$(document).ready(function(){
 
	 // get Edit Product
 	$('.btn-record').on('click',function(){
	 // get data from button edit
	 const id = $(this).data('id');
	 const name = $(this).data('name');
	
	 // Set data to Form Edit
	 $('.item_name').val(name);
	 $('.id_barang').val(id);
	 // Call Modal Edit
	
 	});

	 $('.btn-update').on('click',function(){
	 // get data from button edit
	 const id = $(this).data('id');
	 const id2 = $(this).data('id2');
	 const name = $(this).data('name');
	 const cv = $(this).data('cv');
	 const pack = $(this).data('pack');
	 const ea = $(this).data('ea');
	 const stok = $(this).data('stok');
	 const transfer = $(this).data('transfer');
	 const endmonthly = $(this).data('endmonthly');
	 const actual = $(this).data('actual');
	
	 // Set data to Form Edit
	 $('.item_name').val(name);
	 $('.id_transaksi').val(id);
	 $('.id_barang').val(id2);
	 $('.cv').val(cv);
	 $('.pack').val(pack);
	 $('.ea').val(ea);
	 $('.stok-op-name').val(stok);
	 $('.transfer').val(transfer);
	 $('.endmonthly').val(endmonthly);
	 $('.actual').val(actual);
	 // Call Modal Edit
	
 	});

 // get Delete Product
 	$('.btn-delete').on('click',function(){
	 // get data from button edit
	 const id = $(this).data('id');
	 // Set data to Form Edit
	 $('.productID').val(id);
	 // Call Modal Edit
	 $('#deleteModal').modal('show');
 	});
  
});

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
