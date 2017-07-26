
<div class="row">
  	<div class="col-lg-12 margin-tb">
  	  <div class="pull-left">
  	    <h2>Check Status Request</h2><br>
  	  </div>  	  
  	</div>
	<div class="col-lg-12 margin-tb">
		<!--div class="pull-right p-2">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item"> Add Requestor</button>
			<span class="badge badge-pill badge-success">Status Saat ini</span>
			<span class="badge badge-pill badge-warning"><i class="fa fa-arrow-right" aria-hidden="true"></i> Selanjutnya</span>
		</div-->
		<form action="../dashboard/view_request" method="post" id="lookupreq" name="lookuprequest" class="row mb-3">
			<div class="col-3 text-right p-1">
				<label class="" for="">Cari berdasarkan </label>
			</div>
			<div class="col-8">
				<input type="text" class="form-control" id="" name="q-reqid" placeholder="Request ID">
			</div>
			<div class="col-3 text-right p-1">
				<label class="" for=""> Atau </label>
			</div>
			<div class="col-8">
				<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="" name="q-reqname" placeholder="Nama Requestor / Company" value="<?php echo ( isset($_GET['nama']) && $_GET['nama'] !== '') ? $_GET['nama'] : ''; ?>">
			</div>
			<div class="col-3 text-right p-1">
				<label class="" for=""> Atau </label>
			</div>
			<div class="col-8">
				<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="" name="q-facname" placeholder="Nama Fasilitator" value="<?php echo ( isset($_GET['fasil']) && $_GET['fasil'] !== '') ? $_GET['fasil'] : ''; ?>">
			</div>
			<div class="col-12 text-right">
				<button type="reset" class="btn btn-danger my-2 mr-0">Reset</button>
				<button type="submit" class="btn btn-primary my-2 mr-0">Cari</button>
			</div>
		</form>
		<?php if ( ( isset($_GET['nama']) && $_GET['nama'] !== '') || ( isset($_GET['nama']) && $_GET['nama'] !== '') ) : ?>
			<script>
				var startlook = true;
				console.log(startlook);
			</script>
		<?php endif; ?>
	</div>
</div>

<table class="table table-bordered table-responsive">

	<thead>
	    <tr>
		      <th>Req. ID</th>
		      <th>Requestor Name / Company</th>
			  <th>Facilitator Name</th>
			  <th>Propinsi / Kota</th>
		      <th width="220px">
		<span class="badge badge-pill badge-success">Status Saat ini</span>
        <span class="badge badge-pill badge-warning"><i class="fa fa-arrow-right" aria-hidden="true"></i> Selanjutnya</span></th>
	    </tr>
	</thead>

	<tbody>
	</tbody>

</table>

<nav aria-label="Page navigation example">
  <ul class="pagination"></ul></nav>

<!-- View Status Modal -->
<div class="modal fade" id="view-stat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Detil Status untuk <span></span></h4>
      </div>

      <div class="modal-body">
	  
			

      </div>

    </div>
  </div>
</div>
