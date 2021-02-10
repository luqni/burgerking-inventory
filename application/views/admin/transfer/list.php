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
					<a href="" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add New</a>
					<div class="panel-body">
						<h4 align="center">MENU <br/> TRANSFER </h4>
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
										<th style="text-align:center" rowspan="2">ID Cabang</th>
										<th style="text-align:center" rowspan="2">Nama Cabang</th>
										<th style="text-align:center" rowspan="2">Item Name</th>
										<th style="text-align:center" rowspan="2">Quantity</th>
										<th style="text-align:center" rowspan="2">Approved</th>
										<th style="text-align:center" rowspan="2" >Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 0;
									 foreach ($data_transfer as $transfer): $no++?>
									<tr>
										<td style="text-align:center" width="50"> <?php echo $no ?> </td>
										<td style="text-align:center" width="150">
											<?php echo $transfer->id_cabang ?>
										</td>
										<td style="text-align:center">
											<?php echo $transfer->nama_cabang ?>
										</td>

										<td style="text-align:center">
											<?php echo $transfer->item_name ?>
										</td>
										
										<td style="text-align:center">
											<?php echo $transfer->qty ?>
										</td>

										<td style="text-align:center">
											<?php echo $transfer->approved ?>
										</td>
										
										<td style="text-align:center" width="250"> 
											<a href=""
											 class="btn btn-small btn-update"  data-toggle="modal" data-target="#addModal" ><i class="fas fa-edit"></i> Update</a>
											
										
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
    <form id="search_form" action="<?php echo base_url('admin/transfer/store_transfer');?>" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Record Data Transfer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

				<div class="form-group">
                    <label>Cabang</label>
                    <select name="id_cabang" class="form-control">
                        <option value="">-Select-</option>
                        <?php foreach($cabang as $row):?>
                        <option value="<?= $row->id;?>"><?= $row->nama_cabang;?></option>
                        <?php endforeach;?>
                    </select>
                </div>

				<div class="form-group">
                    <label>Item Name</label>
                    <input type="text" id="kode" class="form-control " name="item_name" placeholder="Item Name">
                </div>
             
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" class="form-control" name="qty" placeholder="Quantity">
                </div>

				<div class="form-group">
                    <label>Approved</label>
                    <input type="text" class="form-control " name="approved" placeholder="Approved">
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
