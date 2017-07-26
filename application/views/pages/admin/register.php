<div class="container">
	<div class="row">
    <div class="col-md-8" style="margin: 0px 0px 0px 100px">
		<div class="form-main-register">
                <h4 class="heading-register"><strong>Register </strong></h4>
                <div class="form-register">
                <form action="../dashboard/register" method="post" id="registerFrm" name="contactFrm">
					<label class="control-label" for="ktp_number">KTP Number</label>
                    <input type="text" required=""  value="" name="ktp_number" class="txt-register">
					
					<label class="control-label" for="full_name">Nama Lengkap</label>
                    <input type="text" required=""  value="" name="full_name" class="txt-register">
					
					<label class="control-label" for="company">Perusahaan UMKM</label>
                    <input type="text" required=""  value="" name="company" class="txt-register">
										
					<!--<input type="text" required="" placeholder="Please Facilitator" value="" name="facilitator" class="txt-register">
					<div style="position:right;">
					<button type="button" class="button-search-register" data-toggle="modal" data-target="#search-facilitator"> Search</button> */
					-->
					
					
					<label class="control-label" for="facilitator_name">Fasilitator</label>
					<div class="input-group">
                    <input type="text" class="form-control facilitator_name" disabled="true" "placeholder="Cari Fasilitator" name="facilitator_name"/>
					<input type="text" class="form-control facilitator_id" style="display:none" name="facilitator_id"/>
                    <span class="input-group-btn">
                        <button class="btn btn-info" type="button" data-toggle="modal" data-target="#search-facilitator"></button>
                    </span>
					</div>
					
					<label for="filter">Provinsi</label>
					<select class="form-control ddl-prov" name="province_id">
                    </select>
					
					<label for="filter">Kota / Kabupaten</label>
					<select class="form-control ddl-reg" name="regency_id">
                    </select>
					
					<label for="filter">Set Status Group</label>
					<select class="form-control ddl-sets" name="sets_id">
                    </select>
					
                </div>
					
                    <input type="submit" value="submit" name="submit" class="btn btn-success">
                </form>
            </div>
            </div>
            </div
	</div>
</div>

<!-- Create Search Fasilitator -->
<div class="modal fade" id="search-facilitator" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Search Fasilitator</h4>
      </div>

      <div class="modal-body">

            <form data-toggle="validator" action="../dashboard/search_facilitator" method="POST">

                <div class="form-group">                    
                    <input type="text" name="facilitator_name" class="form-control" data-error="Please enter Facilitator." required />
					<div class="help-block with-errors"></div>
					
                </div>                

                <div class="form-group">
                    <button type="submit" class="btn crud-search-fas btn-success">Search</button>
                </div>

            </form>
			<table class="table table-bordered">

				<thead>
					<tr>
					<th>ID</th>
					<th>Nama</th>			  
					<th width="150px">Action</th>
					</tr>
				</thead>
				<tbody>
				</tbody>	
			</table>
      </div>

    </div>
  </div>
</div>
