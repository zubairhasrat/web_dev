<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5.5 Ajax CRUD Example</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
  
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
    
</head>
<body>
	<div class="container">
		{{--  <div class="form-group row add">
            <div class="col-md-8">
			
                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter some title" required>
                <p class="error text-center alert alert-danger hidden"></p>
				<input type="text" class="form-control" id="body" name="body"
                                    placeholder="Enter some body" required>
                <p class="error text-center alert alert-danger hidden"></p>
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary" type="submit" id="add">
                <span class="glyphicon glyphicon-plus"></span> ADD
                </button>
             </div>
       </div>  --}}
       <div class="row">
		    <div class="col-lg-12 margin-tb">					
		        <div class="pull-left">
		            <h2>Laravel Ajax CRUD Example</h2>
		        </div>
		        <div class="pull-right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
					  Create Item
				</button>
		        </div>
		    </div>
		</div>
	<div class="table-responsive text-center">
    <table class="table table-borderless" id="records_table">
        <thead>
            <tr>
                <th class="text-center">Title</th>
				<th class="text-center">Body</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody id="tablebody"></tbody>
    </table>
    
    <ul id="pagination" class="pagination-sm"></ul>
    </div>

 <!-- Create Item Modal -->
	<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Create Item</h4>
		      </div>
		      <div class="modal-body">

		      		<form data-toggle="validator" action="addItem" method="POST">
						<input name="_token" type="hidden" value="{{ csrf_token() }}" />

		      			<div class="form-group">
							<label class="control-label" for="title">Title:</label>
							<input type="text" name="title" class="form-control" data-error="Please enter title." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="body">Description:</label>
							<input type="text" name="body" class="form-control" data-error="Please enter description." required></textarea>
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
		        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
		      </div>
		      <div class="modal-body">

		      		<form data-toggle="validator" action="" method="PUT">
		      			<div class="form-group">
							<label class="control-label" for="title">Title:</label>
							<input type="text" name="title" class="form-control" data-error="Please enter title." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Description:</label>
							<input type="text" name="body" class="form-control" data-error="Please enter description." required></textarea>
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
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
	<script src="/js/posts_ajax.js"></script> 

</body>
</html>