@if(session('success'))
	<div class="row ">
		<div class="col-md-12">
			<div class="alert alert-success alert-dismissible rounded elevation-2 text-light">
		      <button type="button" class="close text-danger" data-dismiss="alert" aria-hidden="true">&times;</button>
		        <i class="icon fa fa-check fa-2x"></i> {{session('success')}}
		    </div>
		</div>
	</div>
@endif
