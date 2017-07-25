
<div class="row">
  	<div class="col-lg-12 margin-tb">
  	  <div class="pull-left">
  	    <h2>Facilitator Dashboard</h2><br>
  	  </div>  	  
  	</div>
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item"> Add Facilitator</button>
		</div>
	</div>
</div>

<table class="table table-bordered">

	<thead>
	    <tr>
		      <th>ID</th>
		      <th>Full Name</th>
		      <th width="200px">Action</th>
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

            <form data-toggle="validator" action="../dashboard/insert_facilitator" method="POST">

                <div class="form-group">
                    <label class="control-label" for="title">Full Name:</label>
                    <input type="text" name="full_name" class="form-control" data-error="Please enter full name." required />
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
        <h4 class="modal-title" id="myModalLabel">Edit Facilitator</h4>
      </div>

      <div class="modal-body">

            <form data-toggle="validator" action="" method="put">

                <div class="form-group">
                    <label class="control-label" for="title">Full Name</label>
                    <input type="text" name="full_name" class="form-control" data-error="Please enter full_name." required />
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

<script type="text/javascript">
	//var url = "get_facilitator";
</script>