
<div class="row">
  	<div class="col-lg-12 margin-tb">
  	  <div class="pull-left">
  	    <h2>Pengkinian Status Request</h2><br>
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
				<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="" name="q-reqname" placeholder="Nama Requestor / Company">
			</div>
			<div class="col-3 text-right p-1">
				<label class="" for=""> Atau </label>
			</div>
			<div class="col-8">
				<input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="" name="q-facname" placeholder="Nama Fasilitator">
			</div>
			<div class="col-12 text-right">
				<button type="submit" class="btn btn-primary my-2 mr-0">Cari</button>
			</div>
		</form>
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

<!-- Create Item Modal -->
<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Facilitator</h4>
      </div>

      <div class="modal-body">

            <form data-toggle="validator" action="../dashboard/insert_requestor" method="POST">

                <div class="form-group">
                    <label class="control-label" for="title">No KTP</label>
                    <input type="text" name="ktp_number" class="form-control" data-error="Please enter KTP No." required />
					<label class="control-label" for="title">Full Name</label>
					<input type="text" name="full_name" class="form-control" data-error="Please enter full name." required />
					<label class="control-label" for="title">UKM Name/Company</label>
					<input type="text" name="company" class="form-control" data-error="Please enter UKM name." required />
                    <div class="help-block with-errors"></div>
                </div>                

                <div class="form-group">
                    <button type="submit" class="btn crud-submit btn-success">Submit</button>
                </div>

            </form>

      </div>

    </div>
  </div>
</div>

<!-- Edit Item Modal -->
<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Requestor</h4>
      </div>

      <div class="modal-body">

            <form data-toggle="validator" action="" method="put">

                <div class="form-group">
                    <label class="control-label" for="ktp_number">No KTP</label>
                    <input type="text" name="ktp_number" class="form-control" data-error="Please enter KTP No." required />
					<label class="control-label" for="full_name">Full Name</label>
					<input type="text" name="full_name" class="form-control" data-error="Please enter full name." required />
					<label class="control-label" for="company">UKM Name/Company</label>
					<input type="text" name="company" class="form-control" data-error="Please enter UKM name." required />
                    <div class="help-block with-errors"></div>
                </div>                
				
                <div class="form-group">
                    <button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
                </div>

            </form>

      </div>
    </div>
  </div>
</div>