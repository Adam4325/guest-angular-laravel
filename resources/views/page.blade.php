<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
	
</head>
<script type="text/javascript" src="{{ URL::asset('js/angular.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<body>
<div ng-app="app" ng-controller="GuestController">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
	        		<label>Search</label>
	        		<input class="form-control" ng-model="searchText" placeholder="Search" type="search" ng-change="search()" />
	        	</div>
				<table class="table table-bordered" style="margin-top:10px">
					<tr>
						<td>ID</td>
						<td>Nama</td>
						<td>E-mail</td>
						<td>Pesan</td>
						<td>Modify</td>
					</tr>
					<tr ng-repeat='x in dataGuest'>
						<td><% x.id %></td>
						<td><% x.nama %></td>
						<td><% x.email %></td>
						<td><% x.pesan %></td>
						<td>
							<a href='#' class="btn btn-warning">Delete</a>
							<a href='#' data='<% x.id %>' class="btn btn-info" ng-click='edit(x.id)' data-toggle="modal" data-target="#myModal">Edit</button>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Guest</h4>
	      </div>
	      <div class="modal-body" style="overflow:hidden">
	        <div class="form-horizontal" style="margin:10px">
	        	<div class="form-group">
	        		<label>Name</label>
	        		<input type="text" ng-model="nama" class="form-control">
	        	</div>
	        	<div class="form-group">
	        		<label>E-mail</label>
	        		<input type="email" ng-model="email" class="form-control">
	        	</div>
	        	<div class="form-group">
	        		<label>Pesan</label>
	        		<textarea ng-model="pesan" class="form-control"></textarea>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" ng-click='editTodo()' data-dismiss="modal">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>

</div>


</body>
<script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</html>