<!DOCTYPE html>
<html>
<head>
	<title>Location</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
</head>
<body>

<div class="container">

<div class="row">
  	<div class="col-lg-12 margin-tb">
  	  <div class="pull-left">
  	    <h2>Location Setup</h2>
  	  </div>  	  
  	</div>
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
  	    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item"> Add Provinces</button>
  	  </div>
	</div>
</div>

<table class="table table-bordered">

	<thead>
	    <tr>
		      <th>ID</th>
		      <th>Provinces</th>			  
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
        <h4 class="modal-title" id="myModalLabel">Add Provinces</h4>
      </div>

      <div class="modal-body">

            <form data-toggle="validator" action="insert_provinces" method="POST">

                <div class="form-group">
                    <label class="control-label" for="id">Province</label>
                    <input type="text" name="province_name" class="form-control" data-error="Please enter Province." required />
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
        <h4 class="modal-title" id="myModalLabel">Edit Province</h4>
      </div>

      <div class="modal-body">

            <form data-toggle="validator" action="" method="put">

                <div class="form-group">
                    <label class="control-label" for="province_name">Province Name</label>
                    <input type="text" name="province_name" class="form-control" data-error="Please enter Province Name." required />
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
 
<script src="<?php echo base_url('assets'); ?>/js/custom-js-location.js"></script> 


</body>
</html>