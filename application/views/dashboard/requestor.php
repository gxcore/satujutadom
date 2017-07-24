<!DOCTYPE html>
<html>
<head>
	<title>Requestor</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
</head>
<body>

<div class="container">

<div class="row">
  	<div class="col-lg-12 margin-tb">
  	  <div class="pull-left">
  	    <h2>Requestor Master Data</h2>
  	  </div>
  	  <div class="pull-right">
  	    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item"> Add Requestor</button>
  	  </div>
  	</div>
</div>

<table class="table table-bordered">

	<thead>
	    <tr>
		      <th>ID</th>
		      <th>No KTP</th>
			  <th>Full Name</th>
			  <th>UKM Name/Company</th>
		      <th width="200px">Action</th>
	    </tr>
	</thead>

	<tbody>
	</tbody>

</table>

<ul id="pagination" class="pagination-sm"></ul>

<!-- Create Item Modal -->
<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Facilitator</h4>
      </div>

      <div class="modal-body">

            <form data-toggle="validator" action="insert_requestor" method="POST">

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

</div>

<!--<script src="<?php echo base_url('assets'); ?>/js/jquery-3.2.1.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<script type="text/javascript">
	//var url = "get_facilitator";
</script>
 
<script src="<?php echo base_url('assets'); ?>/js/custom-js-requestor.js"></script> 


</body>
</html>